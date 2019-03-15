@extends('layouts.dashboard')

@section('Add Category-Page')
  active
@endsection
@section('content')

<div class="row">
  <ol class="breadcrumb">
    <li><a href="{{ '/home' }}">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Add Category</li>
  </ol>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Add Category</h1>
  </div>
</div><!--/.row-->

<div class="panel panel-container">
  <div class="row">
    <div class="col-md-8">

        <div class="panel panel-info">

            <div class="panel-heading">

              Category list ( {{ App\Category::count() }} )
            </div>

                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>

                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Created At</th>
                      <th>Last Updated At</th>
                      <th>Status</th>
                      <th>Action</th>
                    </thead>

                    @php
                      $flag=1;
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{ $flag++ }}</td>
                      <td>{{ $category->category_name }}</td>
                      <td>{{ $category->created_at->format('d-m-y h:i:s a') }} <br>{{ $category->created_at->diffforhumans() }} </td>
                      <td>{{ $category->updated_at ? $category->updated_at->diffforhumans():"Not Yet"}}</td>
                      <td>

                        @if ($category->status == 1)
                          <span style="background:green; color:white; padding: 5px; border-radius: 3px;">Active</span>

                        @else
                          <span style="background:red; color:white; padding: 5px; border-radius: 3px;">Deactive</span>
                        @endif
                      </td>
                      <td>

                        <a class="btn btn-sm btn-warning" href="{{ url('change/status/category') }}/{{ $category->id }}"><span style="color:white">Change Status</span></a><br><br>

                      </td>
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

              Add Category</div>

              <div class="panel-body">
                <form action="{{ url('/category/insert') }}" method="post">
                  @csrf
                  <div class="form-group">
                  <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" value="{{ old('category_name') }}">

                    @if ($errors->has('category_name'))

                            <strong style="color:red">{{ $errors->first('category_name') }}</strong>
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

                  <button type="submit" class="btn btn-primary">Add</button>
                </form>

              </div>
          </div>

    </div>
  </div>

  <!--/.row-->
</div>



@endsection
