<!DOCTYPE html>
<html>

<head>
   <title>Shopping Cart</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" />
   <link href="assets/css/cart_style.css" rel="stylesheet">
</head>

<body>

   <section>
      <div class="container">
         <h2 class="px-5 p-2">My shopping cart</h2>
         <div class="cart">
            <div class="col-md-12 col-lg-10 mx-auto">
               <div class="cart-item">
                  <div class="row">
                     <div class="col-md-7 center-item">
                        <img src="assets/images/kitkat.png" alt="">
                        <h5>Product 1( PHP1219 )</h5>
                     </div>

                     <div class="col-md-5 center-item">
                        <div class="input-group number-spinner">
                           <button id="phone-minus" class="btn btn-default"><i class="fas fa-minus"></i></button>
                           <input id="phone-number" type="number" min="0" class="form-control text-center" value="1">
                           <button id="phone-plus" class="btn btn-default"><i class="fas fa-plus"></i></button>
                        </div>
                        <h5>$ <span id="phone-total">1219</span> </h5>
                        <img src="assets/images/remove.png" alt="" class="remove-item">
                     </div>
                  </div>
               </div>

               <div class="cart-item">
                  <div class="row">
                     <div class="col-md-7 center-item mx-auto">
                        <img src="assets/images/sneakers.png" alt="">
                        <h5>Product 2( PHP59 )</h5>
                     </div>
                     <div class="col-md-5 center-item">
                        <div class="input-group number-spinner">
                           <button id="case-minus" class="btn btn-default"><i class="fas fa-minus"></i></button>
                           <input id="case-number" type="number" min="0" class="form-control text-center" value="1">
                           <button  id="case-plus" class="btn btn-default"><i class="fas fa-plus"></i></button>

                        </div>
                        <h5>$ <span id="case-total">59</span> </h5>
                        <img src="assets/images/remove.png" alt="" class="remove-item">
                     </div>
                  </div>
               </div>

               <div class="cart-item">
                  <div class="row g-2">

                     <div class="col-6">
                        <h5>Subtotal: </h5>
                        <h5>Tax:</h5>
                        <h5>Total:</h5>
                     </div>

                     <div class="col-6 status">
                        <h5>PHP<span id="sub-total">1,278</span></h5>
                        <h5>PHP<span id="tax-amount">0</span></h5>
                        <h5>PHP<span id="total-price">1,278</span></h5>
                     </div>
                     
                  </div>
               </div>
               <div class="col-md-12 pt-4 pb-4">
                  <button type="button" class="btn btn-success check-out">Check Out</button>
               </div>
            </div>
         </div>
      </div>
   </section>
   <script src="assets/js/cart_script.js"></script>
</body>
</html>