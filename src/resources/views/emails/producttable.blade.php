<table bordercolor="#ccc" width="100%" border="0" cellspacing="0" cellpadding="4">
    <tbody>
      {{-- <tr>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" width="75%">Image</td>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" width="75%">Title</td>
        <td height="25" bgcolor="#679f1a" style="color: #fff; font-weight: bold;" align="center" width="25%">Amount</td>
      </tr> --}}
<?php
  $upfront = 0;
  $shipping_fee_total = 0;
?>
@foreach ($order->products as $orderedProduct)
    <tr>

      <?php
       $upfront += $orderedProduct->product_upfront; 
       $shipping_fee_total += $orderedProduct->shipping; 
      ?>

    <td valign="top" width="10%"><img width="100" src="{{Request::root().$orderedProduct->product->images()[0]->thumb}}"></td>
    <td valign="top" width="90%">
      <table width="100%" border="0" cellspacing="4">
        <tr>
          <td width="25%"><Strong>Product Name:</Strong></td>
          <td width="75%">{{$orderedProduct->product->name}}</td>
        </tr>
        <tr>
          <td><Strong>Amount:</Strong></td>
          <td>{{number_format($orderedProduct->product_then_price)}}/-</td>
        </tr>
      </table>
    </td>
    </tr>
    <tr>
      <td height="15" colspan="2"></td>
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
        <td align="right">{{number_format($upfront-$shipping_fee_total)}}/-</td>
      </tr>
      <tr>
        <td>Delivery Charges</td>
        <td align="right">{{number_format($shipping_fee_total)}}</td>
      </tr>
      @if(\SETTINGS::get("enable_tax"))
      <tr>
        <td>Sales Tax</td>
        <td align="right"> </td>
      </tr>
      @endif
      <tr>
        <td><strong>Total Upfront Payment</strong></td>
        <td align="right"><strong>{{number_format($upfront)}}/-</strong></td>
      </tr>
    </tbody>
  </table>
  <br />
