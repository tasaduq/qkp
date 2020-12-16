<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Response;
use Session;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderProducts;
use App\Models\OrderInstallments;
// use App\Models\Categories;
use DB;


class OrderController extends Controller
{
    public function cancel_order_animal(Request $request){
        $response = array(
            "code" => 200,
            "message" => ""
        );

        //check if payment has been made
        //if no payment is made, cancel this order
        //make the animal available in the market again
        //if payment is made, submit a cancellation request


        return Response::json($response);

    }
    public function payment(){
        // session::put("order_id", 81 );
        //TODO: get me from somewhere else
        $order_id = session::get("order_id");
        
        $user = Auth::user();
        $user_id = $user->id;
        
        $order = Orders::where(["id"=>$order_id, "user_id"=>$user_id])->first();

        // session::flash("order_id",$order_id);

        return view('payment')->with("order", $order)->with("user", $user);
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_orders()
    {
        $paginate = config("site.pagination");

        $data = Orders::select('orders.id', 'orders.order_number', 'orders.upfront', 'orders.status', 'orders.payment_method', 'orders.created_at', 'users.name', 'order_status.name AS status_name')->leftJoin('users', 'orders.user_id', '=', 'users.id')->leftJoin('order_status', 'orders.status', '=', 'order_status.id')->latest()->paginate($paginate);
        return view('admin/orders', compact('data'))->with('i', (request()->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_detail($id)
    {
        $data = Orders::findOrFail($id);

        $order_details = Orders::select('orders.id', 'orders.status', 'orders.order_number', 'orders.upfront', 'orders.payment_method', 'orders.created_at', 'users.name', 'users.phone', 'users.city', 'users.email', 'users.address', 'order_status.name AS status_name')->leftJoin('users', 'orders.user_id', '=', 'users.id')->leftJoin('order_status', 'orders.status', '=', 'order_status.id')->where([['orders.id', '=', $id]])->first();
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

        return view('admin/order_details', compact('order_details', 'order_products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_installments()
    {
        $paginate = config("site.pagination");

        $data = OrderInstallments::select('order_installments.*', 'orders.order_number', 'order_installments_status.name')->leftJoin('order_products', 'order_products.id', '=', 'order_installments.order_product_id')->leftJoin('order_installments_status', 'order_installments_status.id', '=', 'order_installments.status')->leftJoin('orders', 'orders.id', '=', 'order_products.order_id')->orderBy('order_installments.id', 'DESC')->paginate($paginate);
        return view('admin/installments', compact('data'))->with('i', (request()->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vrfy_order($id)
    {
        $order_details = Orders::select('id', 'receipt')->where([['id', '=', $id]])->first();

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  string  $status
     * @return \Illuminate\Http\Response
     */
    public function update_order_sts(Request $request, $status, $id)
    {
        $order_details = Orders::where([['id', '=', $id]])->first();

        if($order_details) {

            if(trim($request->order_note) != '') {
                $orderNote = $request->order_note;
            } else {
                $orderNote = NULL;
            }
            if($status == 'reject') {
                $state = 6;

                Orders::where([['id', '=', $id]])->update(['status' => $state, 'receipt_verify_note' => $orderNote]);

                $response = array(
                    "code" => 200,
                    "message" => ""
                );
            } elseif($status == 'approve') {
                $state = 2;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  string  $status
     * @return \Illuminate\Http\Response
     */
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
}


