<?php
  include('layouts/head_nav.php');
  // include('scripts/utilities.php');

  // echo session_id 
  if(!isset($_GET["Item_Name"])){
    header("Location:error.php");
  }
?>
<style type="text/css">
      .pizza
      {
        position: relative;
          top: 0;
      }
      .toppings
      {
          position: absolute;
          top: 0;
          left: 0;
      }
      .disable{
        display: none;
      }
      .toppingAdd {
        position: absolute;
        left: -10%;
        top: 0;
        width: 100%;
        height: 100%;
    }

    </style>
<body>
  <?php
   include('layouts/nav.php')
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  var price=<?php  echo $_GET['Price'];?>;
  var name=<?php echo "\"".$_GET['Item_Name']."\""; ?>;
  var email=<?php echo "\"".$_SESSION['EmailId']."\""; ?>;

  var crustDetails;
  var ingredientsDetails;
  var selectedObjects={ingredients:{},Size:"R"};
  var sessionID=<?php  echo '"'.session_id().'"';?>;
// $('#price').html("12345");
// console.log("tsss"+$('#price').val());
var previousCrust="";
var previousSize=0;

function updatePrice(){
$('#price').html(price.toString());
}

$(document).ready(function(){
updatePrice();


  $.ajax({
    url:"scripts/get_crusts.php?Pizza Name=<?php echo $_GET['Item_Name'];?>",
    type:"GET",
    success:function(data){
      try{
        var s=JSON.parse(data);
        crustDetails=s;
       var index=0;       
        s.forEach(x=>{
          $('#crusts').append('<li><input  type="radio" onchange="setCrust('+(index++)+',\''+x["Crust Name"]+'\')" name="selectedCrust" value="'+x["Price"]+'" > '+x["Crust Name"]+'</li>');});

      }catch(e){
        console.log(e);
      }

      $("input:radio[name=selectedCrust]:first").prop("checked",true);
      $("input:radio[name=selectedSize]:first").prop("checked",true);

      


    }

  });


    $.ajax({
    url:"scripts/get_veg_toppings.php",
    type:"GET",
    success:function(data){
      try{
        var s=JSON.parse(data);
        // console.log(data);
        ingredientsDetails=s;
        s.forEach(x=>{
          $('#pizzaImages').append('<img src="PizzaImages/ingredients/'+x.Image+'" class="toppingAdd mt-1 ml-3 disable" id="'+x["Item Name"]+'" >');
          if(x.Type=='Veg'){

                    $('#vegTopping').append(' <button onclick="toggle(\''+x["Item Name"]+'\')" class="btn btn-none btn-sm border-primary">'+x["Item Name"]+'</button>');} 
          else{
                    $('#nonVegTopping').append(' <button onclick="toggle(\''+x["Item Name"]+'\')" class="btn btn-none btn-sm border-primary">'+x["Item Name"]+'</button>');
          }

      });
      }catch(e){
        console.log(e);
    }
    }

  });

    $('#addToCart').click(function(e){
  //send data
    $.ajax({
    url:"scripts/save_order_details.php",
    type:"POST",
    data:"Object="+getObject(),
    success:function(data){
      // document.write(getObject());
      window.location.href="user_details.php";
    }

  });

  //end

});

}

);


function get_ingredient_price(item){
  // console.log("FInding "+item+"  ");
  let pc=0;
  ingredientsDetails.forEach(x=>
  {
    // console.log(x['Item Name']);
    if(x['Item Name']==item){
      pc=x.Price;
      // break;
      // return x.Price;
    }


  }

    );
  return pc;
  // return "Not found";
}
let co=1;
// let selectedDetails={};
let selectedIngredients=new Set();
let selectedSize='Regular';
let selectedCrust="";
function toggle(Item){
  if(Item=="Add Cheese"){
// let t='#'+Item;
price=(co%2==0)?price+20:price-20;
co++;
  }else{
  let t='#'+Item;
  t="[id='"+Item+"']";
  $(t).toggle();
  if($(t).is(":visible")){
    // save value and update price
    // selectedDetails
    price+=parseInt(get_ingredient_price(Item));
    selectedIngredients.add(Item);
    console.log(selectedIngredients);
  }else{
    selectedIngredients.delete(Item);

    //delete value and update price
    price-=parseInt(get_ingredient_price(Item));
  }
}
  updatePrice();
}


function setCrust(id,name){
  selectedCrust=name;
    price+=parseInt(crustDetails[id].Price);
  if(previousCrust==""){
    price-=parseInt(crustDetails[0].Price);
  }else{
    price-=parseInt(previousCrust);
  }
previousCrust=crustDetails[id].Price;
  updatePrice();

}

function setSize(id){
  price+=parseInt(id);
  price-=previousSize;
  previousSize=parseInt(id);
  updatePrice();
  if(id==0){
    selectedSize="Regular";
  }else if(id==1){
    selectedSize="Medium";
  }else{
    selectedSize="Large";
  }
}
function getObject(){
  var tem=co%2==0;
  selectedIngredients=Array.from(selectedIngredients);
  let obs={Ingredients:selectedIngredients,Size:selectedSize,Crust:selectedCrust,ExtraCheese:tem,SessionID:sessionID,ItemName:name,Amount:price,Email:email};
return  JSON.stringify(obs);
  // return JSON.stringify(obs);
}
</script>
  <br>
  <section id="buy_pizza" class="mt-3">
    <div class="container border my-4">
      <h3 class="display-4 text-center text-primary"> <?php echo $_GET['Item_Name']; ?></h3>
      <div class="row">
        <div class="col-lg-6 col-md-6  ">
         
          <div class="container" style="position: absolute; top:0; left: 0;" id="pizzaImages">
    <img style="width: 500px;" src="<?php if(isset($_GET['Image'])){echo $_GET['Image'];}else echo "Image/demo.jpg";?>" class="pizza">
    
  </div>
          <!-- <div class="row">
             
            <div class="col-md-6 text-center">
              <h4 class="text-primary mt-3 custom_price"><span>&#8377</span>

            <div  id="price"></div>  

            </h4>
            </div>
            <div class="col-md-6 text-center">
              <button class="btn btn-primary mt-3" id="addToCart">Add To Cart</button>
            </div>
          </div> -->
        </div>
        <div class="col-lg-5 col-md-6 ">
          <!-- start -->
<div class="row">
            <div class="col-md-6">
              <h4 class="text-primary  custom_price"><span>₹</span><span id="price"></span> </h4>
            </div>
            <div class="col-md-6">
              <button class="btn btn-danger mt-1" id="addToCart">Add To Cart</button>
            </div>
          </div>
          <!-- end -->
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header border-rounded" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Choose Your Crust
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body border-rounded" >
                  <div class="radio-toolbar">
                    <!-- style='list-style-type:none' -->
                  <ul id="crusts" style="list-style-type: none; display: contents;">

                  </ul>
            
            </div>
                </div>
  <div class="card-body border-rounded" >
                

                  <p class="lead  ">Size of Crust</p>
                  <hr>
    <input type="radio" class="btn btn-primary" onchange="setSize(0)" name="selectedSize" value="0" checked>
    <label>Regular</label>

        <input type="radio" class="btn btn-primary" onchange="setSize(40)" name="selectedSize" value="40">
    <label>Medium</label>

        <input type="radio" class="btn btn-primary" onchange="setSize(60)" name="selectedSize" value="60">
    <label>Large</label>


                </div>

              </div>
            </div>
            <br>
            <div class="card">
              <div class="card-header border-rounded" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Add extra toppings
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body border-rounded">
                  <p class="lead mt-1 ">Veg</p>
                  <hr>
                  <div id="vegTopping">
               
                </div>
                  <p class="lead mt-1 ">Non Veg</p>
                  <hr>
                  <div id="nonVegTopping">
              
                </div>
                  <p class="lead mt-1 ">Extra Cheese</p>
                  <hr>
                  <button class="btn btn-none btn-sm border-primary" id="Add_Cheese" onclick="toggle('Add Cheese')">Add Cheese</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
      <br>  <br>    
      <br>  <br>    
    </div>
  </section>
  <br><br>  <br>  
 <footer id="main-footer" class="py-5 bg-primary text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-6 ml-auto">
          <p class="lead">
            Copyright &copy;<span id="year"></span>
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    $('#year').text(new Date().getFullYear());
      $(document).ready(function(){
        $('.count').prop('disabled', true);
        $(document).on('click','.plus',function(){
        $('.count').val(parseInt($('.count').val()) + 1 );
        });
          $(document).on('click','.minus',function(){
          $('.count').val(parseInt($('.count').val()) - 1 );
            if ($('.count').val() == 0) {
            $('.count').val(1);
          }
            });
    });
  </script>
</body>
</html>