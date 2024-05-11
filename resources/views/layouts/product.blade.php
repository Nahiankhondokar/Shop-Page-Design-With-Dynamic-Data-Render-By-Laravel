@extends('app')
@section('content')
    {{-- Product form --}}
    <section class="container">
        <div class="product-add-form my-5">
            <form action="{{route('product.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if (\Session::has('product'))
                    <div class="alert alert-success">
                        <div class="text-success">{!! \Session::get('product') !!}</div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" width="75">
                            <div class="card-body">
                                <h4>Product Informations</h4>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" name="product_name">
                                    @error('product_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product SKU</label>
                                    <input type="text" class="form-control" id="" name="sku">
                                    @error('sku')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Selling Price</label>
                                    <input type="number" class="form-control" id="" name="selling_price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Purchase Price</label>
                                    <input type="number" class="form-control" id="" name="regular_price">
                                    @error('regular_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discount (%)</label>
                                    <input type="number" class="form-control" id="" name="discount">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tax (%)</label>
                                    <input type="number" class="form-control" id="" name="tax">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product image</label>
                                    <input type="file" class="form-control" id="" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" width="75">
                            <div class="card-body">
                                <h4>Product Variants Select</h4>
                                <br>
                                @if (\Session::has('variants'))
                                    <div class="alert alert-error">
                                        <div class="text-danger">{!! \Session::get('variants') !!}</div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Unit</label>
                                    <div class="product-unit-details">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <select name="product_unit" id="prudctUnit" class="custom-select prudctUnit">
                                                    <option value="" >-- Select Product Unit --</option>
                                                    @foreach ($variations as $index => $product_unit)
                                                        <option value="{{ $product_unit->id }}">{{ $product_unit->key }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-primary float-right"
                                                    data-toggle="modal" data-target="#productUnit">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Unit Value</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select name="product_unit_value[]" id="prudctUnitValue"
                                                class="custom-select prudctUnitValue">
                                                
                                            </select>

                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                                data-target="#productUnitValue">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Unit Value Price </label>
                                    <input type="text" class="form-control" name="variat_price">
                                    <small id="emailHelp" class="form-text text-muted">(Ex: 100, 200, 300)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-info w-100 font-weight-bold">Submit</button>
        <br>
        <br>


        </form>
        </div>
    </section>

    <!-- Product Unit Modal -->
    <div class="modal fade" id="productUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('product-unit.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Unit Key</label>
                            <input type="text" class="form-control" name="product_unit"
                                placeholder="product unit key">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Product Unit Value Modal -->
    <div class="modal fade" id="productUnitValue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('product-unit-value.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product Unit Value</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Unit</label>
                            <select name="product_unit_id" id="" class="custom-select">
                                <option value="" selected disabled>Product unit</option>
                                @foreach ($variations as $index => $product_unit)
                                    <option value="{{ $product_unit->id }}">{{ $product_unit->key }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Unit Value</label>
                            <input type="text" class="form-control" name="product_unit_value[]"
                                placeholder="product unit value">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>

@endsection
