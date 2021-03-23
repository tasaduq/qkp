<table bordercolor="#ccc" width="100%" border="1" cellspacing="0" cellpadding="4">
    <tbody>
      <tr>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" width="75%">Image</td>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" width="75%">Title</td>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" align="center" width="25%">Amount</td>
      </tr>

@foreach ($order->products as $orderedProduct)
    <tr>
    <td><img class="img-fluid" src="{{Request::root().$orderedProduct->product->images()[0]->thumb}}"></td>
    <td>{{$orderedProduct->product->name}}</td>
    <td align="right">{{number_format($orderedProduct->product_then_price)}}/-</td>
    </tr>
@endforeach
</tbody>
</table>



<table bordercolor="#ccc" width="100%" border="1" cellspacing="0" cellpadding="4">
    <tbody>
      <tr>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" width="75%">Particulars</td>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" align="center" width="25%">Amount</td>
      </tr>
      <tr>
        <td>Advance Payment</td>
        <td align="right">{{number_format($order->upfront)}}/-</td>
      </tr>
      <tr>
        <td><strong>Total Upfront Payment</strong></td>
        <td align="right"><strong>{{number_format($order->upfront)}}/-</strong></td>
      </tr>
    </tbody>
  </table>
