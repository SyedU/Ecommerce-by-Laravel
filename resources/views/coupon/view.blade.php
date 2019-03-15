
@extends('layouts.dashboard')

@section('Add Coupon-Page')
  active
@endsection
@section('content')

<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ '/home' }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Coupon</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Coupon</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Coupon List
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>

                      <th>Coupon</th>
                      <th>Percentage(%)</th>

                    </thead>


                    @foreach ($coupons as $coupon)
                    <tr>

                      <td>{{ $coupon->coupon }}</td>
                      <td>{{ $coupon->percentage }}%</td>

                    </tr>
                    @endforeach

                  </table>
                </div>
          </div>


    </div>
    <div class="col-md-4">


          <div class="panel panel-success">

            <div class="panel-heading">

              @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
              @endif

              Add Coupon</div>

              <div class="panel-body">
                <form action="{{ url('/coupon/insert') }}" method="post">
                  @csrf
                  <div class="form-group">
                  <label>Percentage</label>
                    <input type="number" class="form-control" placeholder="Enter Percentage" name="percentage" value="{{ old('percentage') }}">

                    @if ($errors->has('percentage'))

                            <strong style="color:red">{{ $errors->first('percentage') }}</strong>
                        </span>
                    @endif

                  </div>

                  {{-- <div class="form-group">
                  <label>Product Description</label>
                    <input type="text" class="form-control" placeholder="Enter Product Description" name="product_des" value="{{ old('product_des') }}">

                    @if ($errors->has('product_des'))

                            <strong style="color:red">{{ $errors->first('product_des') }}</strong>
                        </span>
                    @endif

                  </div> --}}

                  {{-- <div class="form-group">
                  <label>Product Price</label>
                    <input type="text" class="form-control" placeholder="Enter Product Price" name="product_price" value="{{ old('product_price') }}">

                    @if ($errors->has('product_price'))
                        <strong style="color:red">{{ $errors->first('product_price') }}</strong>
                        </span>
                    @endif



                  </div> --}}

                  <button type="submit" class="btn btn-primary">Add Coupon</button>
                </form>

              </div>
          </div>

    </div>
  </div>

  <!--/.row-->
</div>



@endsection
