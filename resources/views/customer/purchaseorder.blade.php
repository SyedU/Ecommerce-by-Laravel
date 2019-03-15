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
    <h1 class="page-header">Your Purchase Order</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <th>Sale ID</th>
          <th>Subtotal</th>
          <th>Shipping</th>
          <th>Discount</th>
          <th>Grand Total</th>
          <th>Details</th>
        </thead>
        @foreach ($purchaseorders as $purchaseorder)
        <tr>
          <td>{{ $purchaseorder->id }}</td>
          <td>{{ $purchaseorder->cart_subtotal }}</td>
          <td>{{ $purchaseorder->shipping }}</td>
          <td>{{ $purchaseorder->discount }}</td>
          <td>{{ $purchaseorder->grand_total }}</td>
          <td>
            <a href="{{ url('purchase/order') }}/{{ $purchaseorder->id }}">View More</a>
          </td>

        </tr>
        @endforeach
      </table>

    </div>
  </div>
</div>



@endsection
