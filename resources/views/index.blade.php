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
                        <div class="card  col-md-12 pb-4">
                            <h2 class="pt-5">Add Product</h2>
                            <div class="form mt-5 ">
                                <form action=""class="" id="myForm" method="post">
                                    <div class="form-row">
                                       <div class="form-group col-md-4">
                                           <label for="formGroupExampleInput">Product Name</label>
                                           <input type="text" class="form-control" name="product_name" id="formGroupExampleInput" placeholder="Name Of Product">
                                         </div>
                                         <div class="form-group col-md-3">
                                           <label for="formGroupExampleInput2">Quantity In Stock</label>
                                           <input type="number" class="form-control" name="quantity" id="formGroupExampleInput2" placeholder="Quantity...">
                                         </div>
       
                                         <div class="form-group col-md-3">
                                           <label for="formGroupExampleInput2">Price Per Item</label>
                                           <input type="number" class="form-control" name="price" id="formGroupExampleInput2" placeholder="Price..">
                                         </div>
       
                                         <div class="form-group col-md-1 mt-4">
                                           <button type="submit" id="submitBtn" class="btn btn-primary mt-2">Add Product</button>
                                           
                                         </div>
                                     </div> 
                                 </form>   
                            </div>
                        </div>



                        <div class="col-md-12 card mt-5">


                        {{--  <?php var_dump($data->products) ?>  --}}
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity In Stock</th>
                                    <th scope="col">Price Per Item</th>
                                    <th scope="col">Datetime Submitted</th>
                                    <th scope="col">Total Value Number</th>
                                  </tr>
                                </thead>
                                <tbody class="" id="products">


                                    <?php $total_total=0 ?>
                                    @foreach($data->products as $product):
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>{{ $product->product_name }}</td>
                                      <td>{{ $product->quantity }}</td>
                                      <td>{{ $product->price }}</td>
                                      <td>{{ $product->datetime }}</td>
                                      <td>{{ $product->quantity*$product->price }}</td>
                                    </tr>
  
                                    <?php $total_total=$total_total+( $product->quantity*$product->price ) ?>
                                  @endforeach;

                                  <tr>
                                      <td id="total_total">{{  $total_total }}</td>
                                  </tr>
                                {{--  @foreach($data->products as $product):
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $product['product_name'] }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['quantity']*$product['price'] }}</td>
                                  </tr>

                                @endforeach;  --}}
                                  
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" defer></script>

        <script>
        
        
        var productsData=<?php echo json_encode($data->products) ?>

        var productsTable=document.getElementById("products");
        var total_total=document.getElementById("total_total")
            


            $(document).ready(function(){
                $("#myForm").submit(function(event){
                    event.preventDefault();
                    var formdata=$('#myForm').serializeArray()
                    console.log(formdata);
                    let data=[]
                    
                    for (let index = 0; index < formdata.length; index++) {
                        data[index]=formdata[index].value
                        
                    }
                    addProductToArray(data)
                })
            });


            function addProductToArray(data) {
                var newObject={
                    "product_name":data[0],
                    "quantity":data[1],
                    "price":data[2],
                    "datetime":"{{ date('Y-m-d H:i:s') }}"
                }

                data.push(newObject.datetime);

                
                productsData.push(newObject);
                // sendData(data);
                addProductHtml(data)
            }

            function addProductHtml(data) {
                

                var tdHTML=``

                // console.log(data)
                var totalValue=parseInt(data[1])*parseInt(data[2])

                tdHTML+=`<td>1</td>`
                data.forEach(function(product) {
                    // console.log(product);
                    tdHTML+=`<td>${product}</td>`
                });
                // tdHTML+=``
                

                console.log(data.quantity)
                tdHTML+=`<td>${totalValue}</td>`


                total_total.innerHTML=parseInt(total_total)+totalValue
                var tr=document.createElement("tr");
                // tr.appendChild(tdHTML);

                // productsTable.appendChild(tr)
                productsTable.insertBefore(tr, productsTable.childNodes[0]);
                tr.innerHTML=tdHTML;
            }


            function sendData(data) {

                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST", 
                    dataType: "json", 
                    url: "{{ url('api/') }}",
                    data: {
                    product: productsData,
                    _token: token
                    },
                success: function(response) {
                    if (response.status == "success") {
                        addProductHtml(data)
                    } else {
                        console.log(response);
                    }
        }
      });
            }


        </script>
    </body>
</html>
