@extends('app')
@section('content')
    {{-- Product form --}}
    <section class="container">
        <div class="product-add-form my-5">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" width="75">
                            <div class="card-body">
                                <h4>Product Informations</h4>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email
                                        with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product SKU</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Selling Price</label>
                                    <input type="number" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Purchase Price</label>
                                    <input type="number" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Discount (%)</label>
                                    <input type="number" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tax (%)</label>
                                    <input type="number" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product image</label>
                                    <input type="file" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" width="75">
                            <div class="card-body">
                                <h4>Product Variants Select</h4>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Unit</label>
                                    <div class="product-unit-details ">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <select name="" id="prudctUnit" class="custom-select prudctUnit">
                                                    <option value="" disabled>Product Unit Select</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
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
                                            <select name="" id="prudctUnitValue"
                                                class="custom-select prudctUnitValue">
                                                <option value="" disabled>Product Unit Value Select</option>
                                                <option value="">2</option>
                                                <option value="">8</option>
                                                <option value="">7</option>
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
                                    <input type="text" class="form-control">
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Unit Value Modal -->
    <div class="modal fade" id="productUnitValue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Unit Value </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
