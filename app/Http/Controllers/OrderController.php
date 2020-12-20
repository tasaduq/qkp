<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Response;
use Session;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderStatus;
use App\Models\OrderProducts;
use App\Models\OrderInstallments;
use App\Models\OrderInstallmentsStatus;
// use App\Models\Categories;
use DB;


class OrderController extends Controller
{
    public function cancel_order_animal(Request $request){
        
        $this->validate($request, array(
            'orderanimalno' => 'required|integer',
        ));
        
        $response = array(
            "code" => 200,
            "message" => ""
        );

           
        $productOrderId = $request->get("orderanimalno");
        $message = $request->get("message");

        $user = Auth::user();
        $user_id = $user->id;
        
        $orderProduct = OrderProducts::where([
            "id" => $productOrderId,
            // "user_id" => $user_id
        ])->first();

        
        if( ! $orderProduct->is_user($user_id) ){
            $response = array(
                "code" => 404,
                "message" => "Something is not right, please refresh and retry.."
            );
            return Response::json($response);

        }
        
        // dd($orderProduct);
        $response = array(
            "code" => 201,
            "message" => "Coudn't cancel, please try again."
        );


        if( $orderProduct->is_confirmed() ){
            //if payment is made, submit a cancellation request
            if($orderProduct->request_cancel($message)){
                $response["code"] = 200;
                $response["message"] = "Request for cancellation has been submitted";
            }

        }
        else {
            //check if payment has been made
            //if no payment is made, cancel this order
            //make the animal available in the market again

            // If this is the only animal, also cancel the order.
            // if the order is confirmed and this is the only animal, then dont immediately cancel
            // TODO: this should never happened, because on order confirmation, the animal is also to be marked as confirmed.


            if($orderProduct->immediate_cancel($message)){
                if($orderProduct->restock()){

                    
                    $response["code"] = 200;
                    $response["message"] = "Animal has been cancelled successfully";
                }
            }
        }
        
        return Response::json($response);
    }

    public function cancel_order(Request $request){
        
        $this->validate($request, array(
            'orderno' => 'required|integer',
        ));
        
        $order_number = $request->get("orderno");
        $message = $request->get("message");

        $user = Auth::user();
        $user_id = $user->id;
        
        $order = Orders::where([
            "order_number" => $order_number,
            "user_id" => $user_id
        ])->first();
        
        
        $response = array(
            "code" => 201,
            "message" => "Coudn't cancel, please try again."
        );


        if( $order->is_confirmed() ){
            //if payment is made, submit a cancellation request
            if($order->request_cancel($message)){
                $response["code"] = 200;
                $response["message"] = "Request for cancellation has been submitted";
            }

        }
        else {
            //check if payment has been made
            //if no payment is made, cancel this order
            //make the animal available in the market again
            if($order->immediate_cancel($message)){
                if($order->restock()){
                    $response["code"] = 200;
                    $response["message"] = "Order has been cancelled successfully";
                }
            }
        }
        
        return Response::json($response);

    }
    
    public function installment_payment($installment_id = null, Request $request){
        // session::put("order_id", 81 );

        $user = Auth::user();
        $user_id = $user->id;
        
    
        if( $installment_id != null){
            
            $installment = OrderInstallments::find($installment_id);
            if($installment){

                if( ! $installment->is_user($user_id) ){
                    abort(404);
                }
                if( $installment->get_status->id == "8" ){
                    return view('installment-payment')->with("installment", $installment)->with("user", $user);
                }
            }
            else {
                abort(404);           
            }   
            
        }
        else {
            abort(404);           
        }   
        
    }

    public function payment($installment_id = null, Request $request){
        // session::put("order_id", 81 );

        $user = Auth::user();
        $user_id = $user->id;
        

        if( $order_no != null){
            $where = ["order_number"=>$order_no, "user_id"=>$user_id];
        }
        else {
            
            $order_id = session::get("order_id");
            $where = ["id"=>$order_id, "user_id"=>$user_id];
        }   
        
        $order = Orders::where($where)->first();

        session::put("order_id",$order->id);

        return view('payment')->with("order", $order)->with("user", $user);
    }

    public function instalment_payment($order_no = null, Request $request){
        // session::put("order_id", 81 );

        $user = Auth::user();
        echo $user_id = $user->id;
        
        
        // if( $order_no != null){
        //     $where = ["order_number"=>$order_no, "user_id"=>$user_id];
        // }
        // else {
            
        //     $order_id = session::get("order_id");
        //     $where = ["id"=>$order_id, "user_id"=>$user_id];
        // }   
        
        // $order = Orders::where($where)->first();

        // session::put("order_id",$order->id);

        // return view('payment')->with("order", $order)->with("user", $user);
    }
    public function upload_installment_receipt(Request $request){

        $this->validate($request, array(
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'installment' => 'required|integer',
        ));
        //TODO: get me from somewhere else
        // $order_id = session::get("order_id");
        // dump($order_id);
        $user = Auth::user();
        $user_id = $user->id;

        $installment_id = $request->get('installment');
        // $order = Orders::where(["id"=>$order_id, "user_id"=>$user_id])->first();
        $installment = OrderInstallments::find($installment_id);

        if( ! $installment->is_user($user_id) ){
            $response = array(
                "code" => 404,
                "message" => "Something is not right, please refresh and retry.."
            );
            return Response::json($response);

        }

        $response = array(
            "code" => 100,
            "message" => "Something went wrong, please try again"
        );

        //save the data to the database
        if($request->hasFile('receipt')){
            
            $receiptFile = $request->file('receipt');
            $receiptMime = $receiptFile->getMimeType();
            $receiptFile = file_get_contents($receiptFile);
            $base64_receipt = base64_encode($receiptFile);

            $receipt = 'data: '.$receiptMime.';base64,'.$base64_receipt;
            // dd($receipt);
            // echo "<img src=\"$receipt\" alt=\"\" />";

            $installment->status = "3";
            $installment->receipt = $receipt;
            if($installment->save()){
                $response = array(
                    "code" => 200,
                    "message" => "Receipt saved"
                );
            }
        }
        return Response::json($response);
    }
    public function upload_receipt(Request $request){

        $this->validate($request, array(
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ));
        //TODO: get me from somewhere else
        $order_id = session::get("order_id");
        // dump($order_id);
        $user = Auth::user();
        $user_id = $user->id;
        
        $order = Orders::where(["id"=>$order_id, "user_id"=>$user_id])->first();

        $response = array(
            "code" => 100,
            "message" => "Something went wrong, please try again"
        );

        //save the data to the database
        if($request->hasFile('receipt')){
            
            $receiptFile = $request->file('receipt');
            $receiptMime = $receiptFile->getMimeType();
            $receiptFile = file_get_contents($receiptFile);
            $base64_receipt = base64_encode($receiptFile);

            $receipt = 'data: '.$receiptMime.';base64,'.$base64_receipt;
            // dd($receipt);
            // echo "<img src=\"$receipt\" alt=\"\" />";

            $order->status = "1";
            $order->receipt = $receipt;
            if($order->save()){
                $response = array(
                    "code" => 200,
                    "message" => "Receipt saved"
                );
            }
        }
        return Response::json($response);
    }

    public function get_orders(Request $request)
    {
        //echo $request->input('status');die;

        $paginate = config("site.pagination");

        $OrderStatus = OrderStatus::get();

        $selectedOrder = 0;
        if(is_numeric($request->input('order')) && trim($request->input('order')) > 0) {
            $selectedOrder = $request->input('order');
        }

        $customerName = '';
        if(trim($request->input('name')) != '') {
            $customerName = $request->input('name');
        }

        $dateFrom = '';
        if(trim($request->input('date_from')) != '') {
            $dateFrom = $request->input('date_from');
        }

        $dateTo = '';
        if(trim($request->input('date_to')) != '') {
            $dateTo = $request->input('date_to');
        }

        $selectedStatus = 0;
        if(is_numeric($request->input('status')) && trim($request->input('status')) > 0) {
            $selectedStatus = $request->input('status');
        }

        $data = Orders::select('orders.id', 'orders.order_number', 'orders.upfront', 'orders.status', 'orders.payment_method', 'orders.created_at', 'users.name', 'order_status.name AS status_name')->leftJoin('users', 'orders.user_id', '=', 'users.id')->leftJoin('order_status', 'orders.status', '=', 'order_status.id')
            ->where(function ($query) use ($selectedOrder, $customerName, $dateFrom, $dateTo, $selectedStatus) {
                if(is_numeric($selectedOrder) && trim($selectedOrder) > 0)
                {
                    $query->where('orders.order_number', $selectedOrder);
                }
                if(trim($customerName) != '')
                {
                    $query->where('users.name', 'LIKE', "%{$customerName}%");
                }
                if(trim($dateFrom) != '')
                {
                    $query->whereDate('orders.created_at', '>=', date('Y-m-d', strtotime($dateFrom)));
                }
                if(trim($dateTo) != '')
                {
                    $query->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime($dateTo)));
                }
                if(is_numeric($selectedStatus) && trim($selectedStatus) > 0)
                {
                    $query->where('orders.status', $selectedStatus);
                }
            })
            ->latest()->paginate($paginate);

        return view('admin/orders', compact('data', 'OrderStatus', 'selectedStatus', 'selectedOrder', 'customerName', 'dateFrom', 'dateTo'))->with('i', (request()->input('page', 1) - 1) * $paginate);
    }

    public function order_detail($id)
    {
        $data = Orders::findOrFail($id);

        $OrderStatus = OrderStatus::get();

        $order_details = Orders::select('orders.id', 'orders.status', 'orders.order_number', 'orders.receipt', 'orders.upfront', 'orders.payment_method', 'orders.created_at', 'users.name', 'users.phone', 'users.city', 'users.email', 'users.address', 'order_status.name AS status_name')->leftJoin('users', 'orders.user_id', '=', 'users.id')->leftJoin('order_status', 'orders.status', '=', 'order_status.id')->where([['orders.id', '=', $id]])->first();
        //print_r($order_details->toArray());die;

        $order_products = OrderProducts::select('order_products.id', 'order_products.no_of_installments', 'order_products.shipping', 'order_products.product_upfront', 'order_products.product_then_price', 'order_products.status', 'products.product_id', 'products.name', 'order_products_status.name AS order_products_status_name')->leftJoin('products', 'products.product_id', '=', 'order_products.product_id')->leftJoin('order_products_status', 'order_products_status.id', '=', 'order_products.status')->where([['order_products.order_id', '=', $id]])->get();

        if($order_products) {
            foreach($order_products as $key => $order_product) {
                $product_installments = OrderInstallments::select('order_installments.*', 'order_installments_status.name')->leftJoin('order_installments_status', 'order_installments_status.id', '=', 'order_installments.status')->where([['order_product_id', '=', $order_product->id]])->orderBy('instalment_number', 'ASC')->get();
                //print_r($product_installments);die;
                if($product_installments) {
                    $order_products[$key]['installments'] = $product_installments;
                }
            }
        }

        //$products = OrderProducts::where([['order_id', '=', $id]])->get();

        //return response()->json($order_details);

        //print_r($order_products);die;

        return view('admin/order_details', compact('order_details', 'order_products', 'OrderStatus'));
    }

    public function get_installments(Request $request)
    {
        $paginate = config("site.pagination");

        $OrderInstallmentsStatus = OrderInstallmentsStatus::get();

        $selectedOrder = 0;
        if(is_numeric($request->input('order')) && trim($request->input('order')) > 0) {
            $selectedOrder = $request->input('order');
        }

        $dateFrom = '';
        if(trim($request->input('date_from')) != '') {
            $dateFrom = $request->input('date_from');
        }

        $dateTo = '';
        if(trim($request->input('date_to')) != '') {
            $dateTo = $request->input('date_to');
        }

        $selectedStatus = 0;
        if(is_numeric($request->input('status')) && trim($request->input('status')) > 0) {
            $selectedStatus = $request->input('status');
        }

        $data = OrderInstallments::select('order_installments.*', 'orders.order_number', 'order_installments_status.name')->leftJoin('order_products', 'order_products.id', '=', 'order_installments.order_product_id')->leftJoin('order_installments_status', 'order_installments_status.id', '=', 'order_installments.status')->leftJoin('orders', 'orders.id', '=', 'order_products.order_id')
            ->where(function ($query) use ($selectedOrder, $selectedStatus, $dateFrom, $dateTo) {
                if(is_numeric($selectedOrder) && trim($selectedOrder) > 0)
                {
                    $query->where('orders.order_number', $selectedOrder);
                }
                if(trim($dateFrom) != '')
                {
                    $query->whereDate('order_installments.due_date', '>=', date('Y-m-d', strtotime($dateFrom)));
                }
                if(trim($dateTo) != '')
                {
                    $query->whereDate('order_installments.due_date', '<=', date('Y-m-d', strtotime($dateTo)));
                }
                if(is_numeric($selectedStatus) && trim($selectedStatus) > 0)
                {
                    $query->where('order_installments.status', $selectedStatus);
                }
            })
            ->orderBy('order_installments.id', 'DESC')->paginate($paginate);

        return view('admin/installments', compact('data', 'OrderInstallmentsStatus', 'selectedStatus', 'selectedOrder', 'dateFrom', 'dateTo'))->with('i', (request()->input('page', 1) - 1) * $paginate);
    }

    public function vrfy_order($status, $id)
    {
        $statusId = 0;
        if($status == 'confirmation') {
            $statusId = 1;
        } if($status == 'cancellation') {
            $statusId = 8;
        }

        $order_details = Orders::select('id', 'receipt')->where([['id', '=', $id], ['status', '=', $statusId]])->first();

        if($order_details) {
            $response = array(
                "code" => 200,
                "receiptImg" => $order_details->receipt,
                "message" => ""
            );
        } else {
            $response = array(
                "code" => 404,
                "message" => ""
            );
        }

        return Response::json($response);
    }

    public function update_order_sts(Request $request, $status, $id)
    {
        $order_details = Orders::where([['id', '=', $id]])->first();

        if($order_details) {

            if($status == 'updstatus') {
                if(trim($request->order_status) != '' && $request->order_status > 0) {
                    $orderStatus = $request->order_status;

                    if($orderStatus == 6 || $orderStatus == 5) {
                        $order_details->restock();
                    }
                    Orders::where([['id', '=', $id]])->update(['status' => $orderStatus]);

                    $response = array(
                        "code" => 200,
                        "message" => ""
                    );
                } else {
                    $response = array(
                        "code" => 404,
                        "message" => ""
                    );
                }
            } elseif($status == 'reject') {
                if(trim($request->order_note) != '') {
                    $orderNote = $request->order_note;
                } else {
                    $orderNote = NULL;
                }

                if($order_details->status == 1) {
                    $state = 6;
                    $order_details->restock();
                } else if($order_details->status == 8) {
                    $state = 2;
                }
                Orders::where([['id', '=', $id]])->update(['status' => $state, 'receipt_verify_note' => $orderNote]);

                $response = array(
                    "code" => 200,
                    "message" => ""
                );
            } elseif($status == 'approve') {
                if(trim($request->order_note) != '') {
                    $orderNote = $request->order_note;
                } else {
                    $orderNote = NULL;
                }

                if($order_details->status == 1) {
                    $state = 2;
                } else if($order_details->status == 8) {
                    $state = 5;
                    $order_details->restock();
                }

                Orders::where([['id', '=', $id]])->update(['status' => $state, 'receipt_verify_note' => $orderNote]);

                $response = array(
                    "code" => 200,
                    "message" => ""
                );
            } else {
                $response = array(
                    "code" => 404,
                    "message" => ""
                );
            }
        } else {
            $response = array(
                "code" => 404,
                "message" => ""
            );
        }

        return Response::json($response);
    }

    public function update_orders_sts(Request $request)
    {
        if((isset($request->status_update) && trim($request->status_update) > 0) && (isset($request->selectedOrderIds) && is_array($request->selectedOrderIds) && !empty($request->selectedOrderIds))) {

            Orders::whereIn('id', $request->selectedOrderIds)->update(['status' => $request->status_update]);

            return redirect()->back()->with("success","Order(s) status updated successfully!");
        } else {
            return redirect()->back()->withErrors("Something went wrong, please try again!");
        }
    }

    public function vrfy_install($id)
    {
        $installment_details = OrderInstallments::select('id', 'receipt')->where([['id', '=', $id]])->first();

        if($installment_details) {
            $response = array(
                "code" => 200,
                "receiptImg" => $installment_details->receipt,
                "message" => ""
            );
        } else {
            $response = array(
                "code" => 404,
                "message" => ""
            );
        }

        return Response::json($response);
    }

    public function update_install_sts(Request $request, $status, $id)
    {
        $installment_details = OrderInstallments::where([['id', '=', $id]])->first();

        if($installment_details) {

            if(trim($request->installment_note) != '') {
                $orderNote = $request->installment_note;
            } else {
                $orderNote = NULL;
            }
            if($status == 'reject') {
                $state = 4;

                OrderInstallments::where([['id', '=', $id]])->update(['status' => $state, 'receipt_verify_note' => $orderNote]);

                $response = array(
                    "code" => 200,
                    "message" => ""
                );
            } elseif($status == 'approve') {
                $state = 3;

                OrderInstallments::where([['id', '=', $id]])->update(['status' => $state, 'receipt_verify_note' => $orderNote]);

                $response = array(
                    "code" => 200,
                    "message" => ""
                );
            } else {
                $response = array(
                    "code" => 404,
                    "message" => ""
                );
            }
        } else {
            $response = array(
                "code" => 404,
                "message" => ""
            );
        }

        return Response::json($response);
    }

    public function update_installs_sts(Request $request)
    {
        if((isset($request->status_update) && trim($request->status_update) > 0) && (isset($request->selectedInstallmentsIds) && is_array($request->selectedInstallmentsIds) && !empty($request->selectedInstallmentsIds))) {

            OrderInstallments::whereIn('id', $request->selectedInstallmentsIds)->update(['status' => $request->status_update]);

            return redirect()->back()->with("success","Installment(s) status updated successfully!");
        } else {
            return redirect()->back()->withErrors("Something went wrong, please try again!");
        }
    }
}


