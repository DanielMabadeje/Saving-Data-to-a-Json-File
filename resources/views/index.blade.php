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
                
                <div class="container">
                    <div class="col-md-12">
                        <form>




                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="formGroupExampleInput">Product Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="formGroupExampleInput2">Another label</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="formGroupExampleInput2">Another label</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                                  </div>
                              </div>

                            
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
