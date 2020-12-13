<?php
include('layouts/panel_top.php');
?>
<style type="text/css">

</style>
<script type="text/javascript">
  let orderData=null;
  
  var orderID=<?php
echo $_GET['ID'];
?>;

$('#document').ready(function(){
  // setTimeout(
  $('#order_id').val(orderID);

// ,2000);
});


callMe();
function callMe(){
  $('document').ready(function(){
$.ajax({
  url:"scripts/edit_orders.php",
  type:"Get",
  data:'ID='+orderID,
  success:function(data){
    orderData=orderData;
    update(data);

    // set_ingredients(data);
  }
});
$('#TA').html(""+getTotalByMasterOrder(orderID));
});
}
function db(){
  // return orderData;
  let xxx="input[id='Onion13']"
$(xxx).prop("checked",true)
}

function update(data){
  data=JSON.parse(data);
   $('#items').html("");
   $('#modals').html("");
  data.forEach(y=>{
    // console.log(y);
  $('#items').append(`<tr>
                <td>
                    <label class="checkbox-inline mx-2">
                      <a data-toggle="modal" data-target="#modal`+y['Order ID']+`">`+y['Item Name']+`</a>
                    </label>
                </td>
                <td>
                  <input type="number" class="form-control " value="`+y['Quantity']+`" readonly>
                </td>
                <td>
                   Rs`+(y['Amount']*y['Quantity']*1.18).toFixed(2)+`
                </td>
              </tr>
         

              `);
  $('#modals').append(`    
  <div class="modal fade" id="modal`+y['Order ID']+`" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">`+y['Item Name']+`</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="form-group">
              <label for="sel1">Change Order:</label>
              <select class="form-control" id="sel1" disabled>
                <option>`+y['Item Name']+`</option>
              </select>
            </div>
`+(y.Pizza=='Pizza'?'<div class="form-group"><p class="lead">Ingredents</p><div id=\'vegTopping'+y['Order ID']+'\'>Veg Section </div><div id=\'nonVegTopping'+y['Order ID']+'\'><br>Non-Veg Section</div>':'')+`
<div>
<label>Quantity</label> <input type="number"  id='quantity`+y['Order ID']+`' value="`+y['Quantity']+`">
</div>
</div>
          <div class="modal-footer">

            <button type="button" class="btn btn-primary" onclick="save_changes_orderID(`+y['Order ID']+`)">Save changes</button>
          </div>
        </div>
      </div>
              end`);
  get_ingredients(y['Order ID']);
  // set_ingredients();

}
  );

  set_ingredients(data);

}
function set_ingredients(data){
  // console.log(data);
  data.forEach(x=>{
    // console.log(x);
    // console.log(x['Ingredients']);

   let ing=x['Ingredients'].split(',');
    // console.log(ing);
    ing.forEach(z=>{
      // $('#'+z
let radioSelector="input[id='"+z+x['Order ID']+"']";
// console.log(radioSelector);
setTimeout(function(){
$(radioSelector).prop("checked",true);
},1000);
// consosle.log("checked");
// console.log('$(radioSelector).prop("checked",true);');
      // $("[id='"+z+x['Order ID']+"']").attr("checked",true);
      // $().attr("checked",true);

      // console.log("[id='"+z+x['Order ID']+"']");
    });
  //   // $('#nonVegTopping'+x['Order ID']).val();
  //   console.log('#nonVegTopping'+x['Order ID']+': input');

  //   console.log($('#nonVegTopping'+x['Order ID']+': input').val());
  });

}
function getTotalByMasterOrder(id){
  let da=0;
  $.ajax({
  url:"scripts/get_total_amount_masterorder.php",
    type:"GET",
    data:"ID="+id,
    async:false,
    success:function(data){
      // console.log(data);
         data=JSON.parse(data);
      // console.log(data[0].Price);
      // alert(data[0].Price);
      da= data[0].Price;
      return parseFloat(da).toFixed(2);


    }
  });
return parseFloat(da).toFixed(2);
}

function save_changes_orderID(id){
  // let ob={ID:id,Ingredients:ing};
  // ob=JSON.stringify(ob);
  // console.log(ob);
  // console.log(id); 
  // id=13;
  // console.log(get_all_checkbox("vegTopping"+id));

  let a=get_all_checkbox("vegTopping"+id);
 let b=get_all_checkbox("nonVegTopping"+id);
a=a.concat(b);
//update the price

let totalAmount=get_prince_of_base_pizza(id);

 a.forEach(x=>{
  if(x!=undefined){
  x=x.replace(/[0-9]/g,'');
  totalAmount+=get_prince_of_ingredients(x);

}
});
 a=a.join(',');
 let q=$('#quantity'+id).val();
 let obj={Ingredients:a,Amount:totalAmount,Quantity:q,ID:id};
 obj=JSON.stringify(obj);
 // console.log(obj);
 //update db

 $.ajax({
  url:"scripts/admin_edit_order.php",
  type:"GET",
  data:"obj="+obj,
  async:false,
  success:function(data){
  // alert(data);
  }

 });

 
 //close modal and update data in UI
  $('#modal'+id).modal().hide();
  $('.modal-backdrop').remove()
callMe();
}
function get_prince_of_base_pizza(id){
  // console.log(id);
   let da=0;
  $.ajax({
    url:"scripts/get_item_price.php",
    type:"GET",
    data:"ID="+id,
    async:false,
    success:function(data){
      // console.log(d)
      // alert(data);
      data=JSON.parse(data);
      // console.log(data[0].Price);
      // alert(data[0].Price);
      da= data[0].Price;
      return parseFloat(da);

    }

  });
  return parseFloat(da);

}
function get_prince_of_ingredients(name){
  let da=0;
  $.ajax({
    url:"scripts/get_ingredients_price.php",
    type:"GET",
    data:"Name="+name,
    async:false,
    success:function(data){
      // console.log(d)
      // alert(data);
      data=JSON.parse(data);
      // console.log(data[0].Price);
      // alert(data[0].Price);
      da= data[0].Price;
      return parseInt(da);

    }

  });
  return parseInt(da);

}
function get_all_checkbox(name){
  // console.log(name);
   // $(document).ready(function() {
  let d=[];

       $('#'+name+' :input:checked').each(function(){
        // console.log($(this).attr("id"));
        d.push($(this).attr("id"));});
   return d;

// });
}


function get_ingredients(id){
   $.ajax({
    url:"scripts/get_veg_toppings.php",
    type:"GET",
    success:function(data){
      try{
        var s=JSON.parse(data);
        s.forEach(x=>{
          // console.log(x);
          // console.log('id="'+x["Item Name"]+''+id);
          if(x.Type=='Veg'){
                    $('#vegTopping'+id).append('<label class="checkbox-inline mx-2"><input id="'+x["Item Name"]+id+'" type="checkbox" value="1">'+x["Item Name"]+'</label>');
           
                  } 
          else{
                    $('#nonVegTopping'+id).append('<label class="checkbox-inline mx-2"><input id="'+x["Item Name"]+id+'" type="checkbox" value="1">'+x["Item Name"]+'</label>');
          }

      });
      }catch(e){
      }
    }

  });
}

</script>
<body>
  <section id="list">
    <div class="container">
    <br>
    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
    <hr>
    <br>
    <h4 class="text-center text-primary">Edit Order</h4>
    <form class="border p-4">
      <div class="form-group">
        <label for="order_id">Order id:</label>
        <input type="text" class="form-control" id="order_id" value="" readonly>
      </div>
      <div class="form-group">
        <p class="lead">Items :</p>
        <table class="table">
            <thead>
              <tr >
                <td class="col-md-6">
                  Item
                </td>
                <td class="col-md-3">
                  Quantity
                </td>
                <td class="col-md-3">
                  Price
                </td>
              </tr>
            </thead>
            <tbody id="items">
              <tr>
              <!--   <td>
                    <label class="checkbox-inline mx-2">
                      <input type="checkbox" value="1">
                      <a data-toggle="modal" data-target="#exampleModal">Option 2</a>
                    </label>
                </td>
                <td>
                  <input type="number" class="form-control " value="1">
                </td>
                <td>
                   $35435
                </td> -->
              </tr>
            </tbody>
        </table>
        <!-- <a class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModal">Add More</a> -->
      
    </div>
       
     
      <div class="form-group text-right font-weight-bold">
        <label for="price">Total Price: Rs
      
        </label>  <span id="TA"></span>
      </div>
    <!--   <div class="form-group">
        <label for="deliver">Deliver to:</label>
        <textarea class="form-control" rows="5" id="deliver"></textarea>
      </div> -->
      <!-- <button class="btn btn-primary">Submit</button> -->
    </form>
      </div>
</section>
<div id="modals">
  
</div>

</body>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

</body>
</html>