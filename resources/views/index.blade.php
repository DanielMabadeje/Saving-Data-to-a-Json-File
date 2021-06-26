<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
       
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content bg-light">
                
                <div class="container pt-5">
                    <div class="col-md-12 pt-5">
                        <div class="card  col-md-12">
                            <h2 class="pt-5">Add Product</h2>
                            <div class="form mt-5 ">
                                <form class="">
                                    <div class="form-row">
                                       <div class="form-group col-md-4">
                                           <label for="formGroupExampleInput">Product Name</label>
                                           <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name Of Product">
                                         </div>
                                         <div class="form-group col-md-3">
                                           <label for="formGroupExampleInput2">Quantity In Stock</label>
                                           <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Quantity...">
                                         </div>
       
                                         <div class="form-group col-md-3">
                                           <label for="formGroupExampleInput2">Price Per Item</label>
                                           <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price..">
                                         </div>
       
                                         <div class="form-group col-md-1 mt-4">
                                           <button type="submit" class="btn btn-primary mt-2">Add Product</button>
                                           
                                         </div>
                                     </div> 
                                 </form>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
