

<h1>Invoice ID : {{ $sale_id }} </h1>

@php
  $orders = App\Order::where('sale_id' , $sale_id)->get();
@endphp
<table style="border: 1px solid blue" class="table table-bordered">
  <tr>
    <th>Product Name</th>
    <th>Product Quantity</th>

  </tr>
  @foreach ($orders as $order)
    <tr>
      <td>{{ App\Product::find($order->product_id)->product_name }}</td>
      <td>{{ $order->product_quantity }}</td>

    </tr>
  @endforeach
</table>
