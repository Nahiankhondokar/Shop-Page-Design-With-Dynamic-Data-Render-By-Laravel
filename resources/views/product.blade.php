<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/') }}/style.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>



    <section>
        {{-- Header section --}}
        <nav class="navbar navbar-expand-lg navbar-light " style="background: #6ac88a">
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold text-white" href="#">Product</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold text-white" href="#">Shop</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
                                                    <select name="" id="prudctUnit"
                                                        class="custom-select prudctUnit">
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
                                                <button type="button" class="btn btn-primary float-right"
                                                    data-toggle="modal" data-target="#productUnitValue">Add</button>
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
        <div class="modal fade" id="productUnitValue" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>



    <script>
        $(document).ready(function() {
            $('.prudctUnit').select2({
                multiple: true
            });

            $('.prudctUnitValue').select2({
                multiple: true
            });
        });
    </script>
</body>

</html>
