@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">

            <div class="col-8">
              @if (session('deletestatus'))
                <div class="alert alert-danger">
                    {{ session('deletestatus') }}
                </div>
              @endif
               <table class="table">
                 <thead class="thead-dark">
                   <tr>
                     <th>Product Name</th>
                     <th>Product Description</th>
                     <th>Product Price</th>
                     <th>Product Quantity</th>
                     <th>Alert Quantity</th>
                     <th>Action</th>
                     <th>SL NO</th>
                   </tr>
                 </thead>
                 <tbody>
                   @forelse ($all_products as $product)
                     <tr>
                       <td>{{$loop->index + 1 }}</td>
                       <td>{{$product->product_name}}</td>
                       <td>{{$product->product_description}}</td>
                       <td>{{$product->product_price}}</td>
                       <td>{{$product->product_quantity}}</td>
                       <td>{{$product->product_quantity}}</td>

                       <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('/delete/product') }}/{{ $product->id }}" class="btn btn-danger">Delete</a>
                              <a href="{{ url('/edit/product') }}/{{ $product->id }}" class="btn btn-primary">Edit</a>
                          </div>
                       </td>

                     </tr>
                   @empty
                     <tr class="text-center text-danger">
                       <td colspan="6">
                         No Data Available
                       </td>
                     </tr>



                   @endforelse

                 </tbody>
               </table>
               {{ $all_products->links() }}
            </div>


        <div class="col-4 ">
            <div class="card">
                <div class="card-header bg-success">
                   <h3>Add Product List</h3>
                </div>
                <div class="card-body">

                    @if ($errors->all())
                      <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                      </div>
                    @endif

                      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                      @endif
                    <form action="{{ url('/add/product/insert') }}" method="post">
                      @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" placeholder="Product Name" name="product_name" value="{{ old('product_name') }}">
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                           <textarea type="text" class="form-control" rows="2" name="product_description">{{ old('product_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="text" class="form-control" placeholder="Product Price" name="product_price" value="{{ old('product_price') }}">
                        </div>
                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="text" class="form-control" placeholder="Product Quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                        </div>
                        <div class="form-group">
                            <label>Alert Quantity</label>
                            <input type="text" class="form-control" placeholder="Alert Quantity" name="alert_quantity" value="{{ old('alert_quantity') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
