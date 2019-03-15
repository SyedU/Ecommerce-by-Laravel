@extends('layouts.dashboard')


@section('content')

<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ '/home' }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Purchase Details</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Individual Purchase Order</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-12">
      @php
        $orders = App\Order::where('sale_id' , $sale->id)->get();
      @endphp
      <table class="table table-bordered">
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


    </div>
  </div>
</div>



@endsection
