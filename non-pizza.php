<?php
   include('layouts/head_nav.php');
  isCustomerLoggedIn();

?>
<body>
  <?php
   include('layouts/nav.php')
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $.ajax({
        url:'scripts/get_item.php',
        type:'GET',
        data:"type=Veg&&category=Non-Pizza",
        beforeSend:function(){
          $('#nvp').append("<div class='text-center' id='te'>Loading...</div>");
        },
        success:function(data){
          try{
          var s=JSON.parse(data);
          $('#te').remove();
          var x=0;
          s.forEach(x=>{
            if(x==0)$('#nvp').append('<div class="row">')
            $('#nvp').append('<div class="col-md-3"><div class="card my-2" style="width: 15rem; height: 16rem;"><img class="card-img-top w-75 mx-4 mt-1"  src="PizzaImages/'+x.link+'" style="height:130px;" alt="Card image cap"><div class="card-body text-center"><h5 class="card-title  text-primary">'+x.ItemName+'</h5><a href="scripts/order_non_pizza.php?ItemName='+x.ItemName+'&&Price='+x.Price+'&&Image=PizzaImages/'+x.link+'&&Type=Non-Pizza&&Amount='+x.Price+'" class="btn btn-primary ">Add to cart</a></div></div></div>');
       x++;
       if(x==4){
        x=0;
            if(x==0)$('#nvp').append('</div>');

       }
        });
          if(x!=0){
            if(x==0)$('#nvp').append('</div>');

          }

        }catch(e){
        }
        }
      });


  });
</script>
<body>
   <br>
  <section >
    <div class="container border">
      <h1 class="display-4 text-center text-primary">Non-Pizza</h1>
      <div class="row" id="nvp">
        <!-- <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
       <!--  <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
<!--         <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
<!--         <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
      <!-- </div> -->
      <!-- <div class="row"> -->
 <!--        <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
       <!--  <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
       <!--  <div class="col-md-3">
          <div class="card my-2" style="width: 15rem;">
            <img class="card-img-top w-75 mx-4 mt-1" src="Image/demo.jpg" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title  text-primary">AFRICAN PERI PERI CHICKEN</h5>
              <a href="#" class="btn btn-primary ">Customize</a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <br>
  
 <?php
   include('layouts/footer.php')
 ?>