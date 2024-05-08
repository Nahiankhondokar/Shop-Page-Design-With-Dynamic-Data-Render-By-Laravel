<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('/')}}/style.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    </head>
    <body>

        {{-- Header section --}}
       <section>
        <nav class="navbar navbar-expand-lg navbar-light " style="background: #6ac88a">
           <div class="container-fluid">
            <a class="navbar-brand font-weight-bold" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
                                                    <option value="" disabled >Product Unit Select</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                </select>
                                               
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary float-right">Add</button>
                                            </div>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Unit Value</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <select name="" id="prudctUnitValue" class="custom-select prudctUnitValue">
                                                    <option value="">Product Unit Value Select</option>
                                                    <option value="">2</option>
                                                    <option value="">8</option>
                                                    <option value="">7</option>
                                                </select>
                                               
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary float-right">Add</button>
                                            </div>
                                           </div>
                                    </div>
                                </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info m-auto">Submit</button>
                    <br>
                    <br>

                    
                </form>
            </div>
        </section>
   </section>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script>
    $(document).ready(function(){
        $('.prudctUnit').select2({
            multiple : true
        });

        $('.prudctUnitValue').select2({
            multiple : true
        });
    });

   </script>
    </body>
</html>
