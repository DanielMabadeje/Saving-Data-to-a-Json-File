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
                


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form ">
          <form action=""class="" method="post" id="modalForm">
            <div class="form-group col-md-12">
              <label for="formGroupExampleInput">Product Name</label>
              <input type="text" class="form-control" name="product_name" id="formGroupExampleInputproduct" placeholder="Name Of Product">
            </div>

            <div class="form-group col-md-12">
              <label for="formGroupExampleInput">Quantity In Stock</label>
              <input type="text" class="form-control" name="quantity" id="formGroupExampleInputquantity" placeholder="Name Of Product">
            </div>


            <div class="form-group col-md-12">
              <label for="formGroupExampleInput">Price Per Item</label>
              <input type="text" class="form-control" name="price" id="formGroupExampleInputprice" placeholder="Name Of Product">
            </div>

          {{-- </form> --}}
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        <input type="submit" value="Save changes" class="btn btn-primary">
      </form>
      </div>
    </div>
  </div>
</div>


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


                        
                            <table class="table">
                                <thead>
                                  <tr>
                                    
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity In Stock</th>
                                    <th scope="col">Price Per Item</th>
                                    <th scope="col">Datetime Submitted</th>
                                    <th scope="col">Total Value Number</th>
                                  </tr>
                                </thead>
                                <tbody class="" id="products">


                                    <?php $total_total=0;?>
                                    @foreach($data->products as $product):
                                    <tr class="productvalue">
                                      
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
        var no =document.getElementsByClassName("no")
        var modal=document.getElementsByClassName("modal")[0]

        var formerTotalValue=""
            


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

                
                // productsData.push(newObject);
                productsData.unshift(newObject)
                sendData(data);
                addProductHtml(data)
            }

            function addProductHtml(data) {
                

                var tdHTML=``

                // console.log(data)
                var totalValue=parseInt(data[1])*parseInt(data[2])

                var totalno= parseInt(no.length)+1
                // tdHTML+=`<td>${totalno}</td>`
                data.forEach(function(product) {
                    // console.log(product);
                    tdHTML+=`<td>${product}</td>`
                });
                // tdHTML+=``
                

                console.log(data.quantity)
                tdHTML+=`<td>${totalValue}</td>`


                total_total.innerHTML=parseInt(total_total.innerHTML)+totalValue
                var tr=document.createElement("tr");
                tr.class="productvalue"
                // tr.appendChild(tdHTML);

                // productsTable.appendChild(tr)
                productsTable.insertBefore(tr, productsTable.childNodes[0]);
                tr.innerHTML=tdHTML;

                addListeners()
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
                        if (data != "" || data!=null){
                          // addProductHtml(data)
                        }  else {

                        }
                        addListeners()
                    } else {
                        console.log(response);
                    }
            }
            });
            }








            var eachproduct=document.getElementsByClassName("productvalue");

            function addListeners() { 
              for (let index = 0; index < eachproduct.length; index++) {
                // eachproduct[index].addEventListener("click", openModal);
                eachproduct[index].addEventListener("click", event => {
                  openModal(event, index)
              })
            }
             }

            function openModal(e, index) { 
              console.log(e, index);
              let currentIndex=index

              // eachproduct[index]
              let productData=productsData[index]

              modal.style.display="block"
              modal.classList.remove("fade")

              let closebtn=modal.getElementsByClassName("close")

              for (let index = 0; index < closebtn.length; index++) {
                closebtn[index].addEventListener("click", closemodal);
                
              }



              productInput=document.getElementById("formGroupExampleInputproduct")
              quantityInput=document.getElementById("formGroupExampleInputquantity")
              priceInput=document.getElementById("formGroupExampleInputprice")
              productInput.value=productData.product_name
              quantityInput.value=productData.quantity
              priceInput.value=productData.price


              formerTotalValue=parseInt(productData.quantity)*parseInt(productData.price)




              
                $("#modalForm").submit(function(event){
                    event.preventDefault();
                    var formdata=$('#modalForm').serializeArray()
                    
                    let data=[]
                    
                    for (let index = 0; index < formdata.length; index++) {
                        data[index]=formdata[index].value
                        
                    }
                    // addProductToArray(data)
                    updateProductinArray(currentIndex, data)

                    
                })
            
             }


             function updateProductinArray(index, data) {

              // console.log("hi")
              // console.log(data)
              productsData[index].product_name=data[0]
              productsData[index].quantity=data[1]
              productsData[index].price=data[2]



              
              sendData();

              eachproduct[index].getElementsByTagName("td")[0].innerHTML=data[0]
                    eachproduct[index].getElementsByTagName("td")[1].innerHTML=data[1]
                    eachproduct[index].getElementsByTagName("td")[2].innerHTML=data[2]



                    var newTotalValue=parseInt(data[1])*parseInt(data[2])
                    eachproduct[index].getElementsByTagName("td")[4].innerHTML=newTotalValue


                    total_total.innerHTML=parseInt(total_total.innerHTML)-formerTotalValue+newTotalValue
                    closemodal()
             }


             function closemodal(){
              modal.style.display="none"
              modal.classList.add("fade")
             }





           

             addListeners()

      </script>
    </body>
</html>
