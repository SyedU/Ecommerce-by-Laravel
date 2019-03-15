@extends('layouts.dashboard')


@section('content')

<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ '/home' }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Purchase</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Your Statistics</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">

    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
              Total Purchase
              </div>

              <div class="panel-body">


                <h1>{{ $total_sale }}</h1>

              </div>
          </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
              Total Product Purchase
              </div>

              <div class="panel-body">
                <h1>{{ $total_products }}</h1>
              </div>
          </div>
    </div>




  </div>

  <!--/.row-->
</div>



@endsection
