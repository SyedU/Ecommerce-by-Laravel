@extends('layouts.dashboard')

@section('Add Banner-Page')
  active
@endsection
@section('content')

<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ '/home' }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Banner</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Banner</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Banner list
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>


                      <th>Heading</th>
                      <th>Sub-Heading</th>
                      <th>Details</th>


                    </thead>


                    {{-- @foreach ($banners as $banner)
                    <tr>

                      <td>{{ $banner->heading }}</td>
                      <td>{{ $banner->sub_heading }}</td>
                      <td>{{ $banner->details }}</td>

                    </tr>
                    @endforeach --}}

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

              Add Banner</div>

              <div class="panel-body">
                <form action="{{ url('/banner/insert') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                  <label>Heading</label>
                    <input type="text" class="form-control" placeholder="Enter Heading Name" name="heading" value="{{ old('heading') }}">
                  </div>

                  <div class="form-group">
                  <label>Sub Heading</label>
                    <input type="text" class="form-control" placeholder="Enter Sub-Heading Name" name="sub_heading" value="{{ old('sub_heading') }}">
                  </div>


                  <div class="form-group">
                  <label>Details</label>
                    <textarea class="form-control" name="details" value="{{ old('details') }}" ></textarea>
                  </div>

                  <div class="form-group">
                  <label>Banner image</label>
                    <input type="file" class="form-control" name="banner_image">

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

                  <button type="submit" class="btn btn-primary">Add</button>
                </form>

              </div>
          </div>

    </div>
  </div>

  <!--/.row-->
</div>



@endsection
