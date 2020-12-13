
<?php
include('layouts/panel_top.php');
if(!isset($_GET['Price'],$_GET['ID'])){
	header("Location: error.php");
}
?>
<script type="text/javascript">
	var tem=`<?php
	    	echo $_GET['Price'];?>`;
	    	// tem=parseFloat(tem).toFixed(2);
	    	console.log(tem);
	    	$('#document').ready(function(){
	    			$('#pcs').html(tem);

	    				});

</script>
<body>
  <section id="order_placed">
    <div class="container">
	    <br>
	    <h1 class="display-4 text-center text-primary"> <img src="Image/pizza-slice.png" width="60px">Pizzeria</h1>
	    <hr>
	    <br>
	    <div class="text-center border">
	    	<img src="Image/success.png" width="80px" height="80px" class="img-fluid mt-2">
	    	<h4 class="display-4 text-success">Thank You</h4>
	    	<p class="lead">We've received your order </p>
	    		<p class="lead">Your <b>order id : OD<?php echo $_GET['ID']?></b> and amount paid is <span>&#8377</span><b id='pcs'>
	    			
	    		</b>.</p>
	    	<button class="btn btn-primary m-3" onclick="location.href='index.php'">Home page</button>
	    </div>
  	</div>
</section>

</body>
 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  <script>
    $('#year').text(new Date().getFullYear());

  </script>
</body>
</html>