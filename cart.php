<?php
include('layouts/panel_top.php');
isCustomerLoggedIn();
?>
<style type="text/css">
* {
  box-sizing: border-box;
}
  

#cart .shopper {
  text-transform: lowercase;
  font: 2em 'Shopper', sans-serif;
  line-height: 0.5em;
  display: inline-block;
}

#cart h1 {
  text-transform: uppercase;
  font-weight: bold;
}

#cart p {
  color: #8a8a8a;
}

#cart input {
  border: 0.2em solid #bbc3c6;
  padding: 0.5em 0.3em; 
  font-size: 1.0em;
  color: #8a8a8a;
  text-align: center;
}

#cart a {
  text-decoration: none;
}

#cart .container {
  max-width: 100em;
  width: 100%;
  margin: 40px auto;  
  overflow: hidden;
  position: relative;
}

#cart .table {
  border-radius: 0.6em;
  overflow: hidden;
  clear: both;
}


#cart .layout-inline > * {
  display: inline-block;
}

#cart .align-center {
  text-align: center;
}

#cart .th {
  background: #43ACE3;
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  margin: 5px;
}

#cart .tf {
  text-transform: uppercase;
  text-align: right; 
}

#cart .col {
  padding: 1em;
  width: 12%;
}

#cart .col-pro {
  width: 44%;
}

#cart .col-pro > * {
  vertical-align: middle;
}

#cart .col-qty {
  text-align: center;
  width: 17%;
}

#cart .col-numeric p {
  font: bold 1.2em helvetica;
}

#cart .col-total p {
  color: #12c8b1;
}

#cart .tf .col {
  width: 20%;
}

#cart .row > div {
  vertical-align: middle;
}

#cart .row-bg2 {
  background: #f7f7f7;
}

#cart .visibility-cart {
  position: absolute;
  color: #fff;
  top: 0.5em;
  right: 0.5em;
  font:  bold 2em arial;
  border: 0.16em solid #fff;
  border-radius: 2.5em;
  padding: 0 0.22em 0 0.25em ;
}

#cart .col-qty > * {
  vertical-align: middle; 
}

#cart .col-qty > input {
  max-width: 2.4em;
}


#cart a.qty {
  width: 1em;
  line-height: 1em;
  border-radius: 2em;
  font-size: 2.0em;
  font-weight: bold;
  text-align: center;
  background: #43ace3;  
  color: #fff;
}

#cart a.qty:hover {
  background: #3b9ac6;
}





#cart .transition {
  transition: all 0.3s ease-in-out;
}

@media screen and ( max-width: 755px) {
  .container {
    width: 98%;
  }
  
  .col-pro {
    width: 35%;
  }
  
  .col-qty {
    width: 22%;
  }
  
}

@media screen and ( max-width: 591px) {
  
}
</style>
<script type="text/javascript">
        let totl=0;

            var objs=[];
            function updateData(data){
 $('document').ready(function(){
              $.ajax({
                url:'scripts/get_cart.php',
                type:'GET',
                success:function(data){
                   totl=0;
                  data=JSON.parse(data);
                  $('#addData').html("");
                  data.forEach(x=>{
                    if(x['Item Name'] !=undefined){
            var models={Name:x['Item Name'],Price:x['Amount'],Quantity:x['Quantity'],GST:0.18,OID:x['Order ID']};
                    $('#addData').append(makeModel(models));
                    totl=totl+(parseInt(models.Price)*parseInt(models.Quantity))*(1+parseFloat(models.GST));
                }

                  });
                  $('#totalAmount').html(totl.toFixed(2));
                }

              });
            });
            }

          function  makeModel(data){
              return ` <div class="layout-inline row">
              <div class="col col-pro layout-inline">
                <p>`+data.Name+`</p>
              </div>
              
              <div class="col col-price col-numeric align-center ">
                <p><span>&#8377</span>`+data.Price+`</p>
              </div>

              <div class="col col-qty layout-inline">
                <a onclick="ch('`+data.OID+`',`+(parseInt(data.Quantity)-1)+`)" class="qty qty-minus">-</a>
                  <input type="numeric" value="`+data.Quantity+`" />
                <a onclick="ch('`+data.OID+`',`+(parseInt(data.Quantity)+1)+`)" href="#" class="qty qty-plus">+</a>
              </div>
              
              <div class="col col-vat col-numeric">
                <p><span>&#8377</span>`+((parseInt(data.Price)*parseInt(data.Quantity))*(parseFloat(data.GST))).toFixed(2)+`</p>
              </div>
              <div class="col col-total col-numeric"><p><span>&#8377</span>`+((parseInt(data.Price)*parseInt(data.Quantity))*(1+parseInt(data.GST))).toFixed(2)+`</p>
              </div>
            </div>`;

            }
            updateData();

            function ch(id,value){
              $.ajax({
                url:'scripts/cart_update.php',
                type:'POST',
                data:'ID='+id+'&&Value='+value,
                success:function(data){

                  updateData();
                }
              });

            }
            $('document').ready(function(){
            $('#checkOut').click(function(){

              // $.ajax({
              //   url:'scripts/make_order.php',
              //   type:'GET',
              //   success:function(data){
              //     if(data=="No Item in Cart"){
              //      alert(data);
              //   }else{
              //     // window.location.href='order_place.php?Price='+totl+'&&ID='+data;
                   window.location.href='otp.php';
              //     }
              //   }
              // })
              
            });
          }
           );

</script>
<body>
  <section >
    <div class="container">
      <br>
      <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
      <hr>
      <br>
      <h4 class=" text-primary text-center">Cart</h4>
      <section id="cart">
          <div class="container">
       
        
        <div class="cart transition is-open">
          <div class="table">
            <div class="layout-inline row th">
              <div class="col col-pro">Product</div>
              <div class="col col-price align-center "> 
                Price
              </div>
              <div class="col col-qty align-center">QTY</div>
              <div class="col">GST</div>
              <div class="col">Total</div>
            </div>
            <div id="addData">

            </div>
            
           
            
            
          
        
             <div class="tf">
            <!--    <div class="row layout-inline">
                 <div class="col">
                   <p>GST</p>
                 </div>
                 <div class="col lead font-weight-bold">
                   65665 
                 </div>
               </div> -->
              <!--  <div class="row layout-inline">
                 <div class="col">
                   <p>Shipping</p>
                 </div>
                 <div class="col lead font-weight-bold">
                   5661
                 </div>
               </div> -->
                <div class="row layout-inline">
                 <div class="col">
                   <p>Total</p>
                 </div>
                 <div class="col lead font-weight-bold" id="totalAmoun1t">
                  ₹<span id="totalAmount"></span>
                   <!-- 5656656 -->
                 </div>
               </div>
             </div>         
        </div>
        <div class="text-right">
          <button class="btn btn-primary" onclick="location.href='index.php'">Continue Shopping</button>
          <button class="btn btn-primary" id='checkOut'>Checkout</button>
        </div>
        </div>
      </section>
    </div>
  </section>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script type="text/javascript">
      
    </script>
</body>
</html>