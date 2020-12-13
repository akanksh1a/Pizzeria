 <?php
  include('layouts/head_nav.php');
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
  $('document').ready(function(){
    $('#subscriberSubmit').click(function(){
      var n=$('#subscriberName').val();
      var e=$('#subscriberEmail').val();
      const n_pattern = /^[a-zA-Z]{2,20}$/;
      if(n.length > 2 && e.length > 4)
      {
        if (n_pattern.test(n)) 
        {
              $.ajax({
                      url:"scripts/saveSubscribers.php",
                      type:"POST",
                      data:"Name="+n+"&&Email="+e,
                      success:function(data){
                        alert("Subscribed Succesfully"+data);
                      }
                });
          }
          else
          {
            alert("Wrong Name");
          }
      }
      else
      {
        alert("Wrong Input");
      }
      
    })
  });
  // saveFeedbacks.php
   $('document').ready(function(){
    $('#feedbackSubmit').click(function(){
      var n=$('#feedbackName').val();
      var e=$('#feedbackEmail').val();
      var m=$('#feedbackMsg').val();
      const n_pattern = /^[a-zA-Z]{2,20}$/;
      if((n.length > 2 ) && (e.length > 4 ) && (m.length > 10 ))
      {
        if(n_pattern.test(n))
        {
          $.ajax({
            url:"scripts/saveFeedbacks.php",
            type:"POST",
            data:"Name="+n+"&&Email="+e+"&&Msg="+m,
            success:function(data){
              alert("Feedback Saved Succesfully"+data);
              $('#feedbackName').html("");
                $('#feedbackEmail').html("");
                $('#feedbackMsg').html("");
            }
          });
        }
        else
        {
          alert("Wrong Input");
        }
      }
      else
      {
        alert('Wrong Input, Message should be more than 10 character');
      }
      
    });
  });
</script>


<body id="home" >
 <?php
   include('layouts/nav.php')
?>
  <section id="showcase" class="py-5">
    <div class="primary-overlay text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center">
            <h1 class="text-capitalize display-2 mt-5 pt-5">
              Order Your own custom pizza
            </h1>
            <p class="lead">
              We cooked your desired pizza recipe.
            </p>
           
          </div>
          <div class="col-lg-6">
            <img src="Image/main_pizza.png" class="img-fluid d-none d-lg-block my-2">
          </div>
        </div>
      </div>
      
    </div>
  </section>

  <section id="newsletter" class="bg-dark text-white py-5">
    <div class="container">
      <form>
      <div class="row">
        <div class="col-md-4">
          <input type="text" class="form-control form-control-lg mb-resp" placeholder="Enter Name" id="subscriberName" required min=" required ">
        </div>
        <div class="col-md-4">
          <input type="email" class="form-control form-control-lg mb-resp" placeholder="Enter Email" id="subscriberEmail" required min=" required ">
        </div>
        <div class="col-md-4">
          <button class="btn a1 btn-primary btn-lg btn-block" id="subscriberSubmit"><i class="fas fa-enelope-open-o"></i>
            Subscribe
          </button>
        </div>
      </div>
      </form>
    </div>
    
  </section>



  <section id="box" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card text-center border-primary mb-resp">
            <div class="card-body">
              <h1 class="text-primary text-capitalize">Fresh Menu</h1>
              <p class="text-muted">
                We always regularly update our menu, to serve you best and various new food item everytime. 
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center bg-primary text-white mb-resp">
            <div class="card-body">
              <h1 class="text-capitalize">Hygienic</h1>
              <p >
                Safe food handling practices are required in our commercial kitchen to prevent the spread of bacteria and disease.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center border-primary mb-resp">
            <div class="card-body">
              <h1 class="text-primary text-capitalize">Healthy</h1>
              <p class="text-muted">
                Everyday choose fresh and healthy vegitables to prepare delicious and healthy food for you.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center bg-primary text-white">
            <div class="card-body">
              <h1 class="text-capitalize" >Tasty</h1>
              <p >
                We always tries to give healthy and tasty food so that whenever you think about pizza you think about Pizzeria. 
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section>

  <section id="authors" class="my-5 text-center">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="info-header mb-5">
              <h1 class="text-primary pb-3 ">
                Meet The Creator
              </h1>
              <p class="lead">
                A perfect blend of creativity and technical wizardry. <br> The best people formula for great website.
              </p>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-lg-4 col-md-6" >
            <div class="card ">
              <div class="card-body">
                <img src="Image/person.jpg" class="img-fluid rounded-circle w-50 mb-3">
                <h3>Akansha</h3>
                <h5 class="text-muted">Developer</h5>
                <!-- <p>Lorem ipsum dolor sit amet, eum nostrum menandri definitiones et, suas volutpat mea id. Ex qui magna autem, ad vel accusamus mediocritatem </p> -->
                <div class="d-flex justify-content-center">
                  <div class="p-4">
                    <a href="https://www.facebook.com/Akanksha5629">
                      <i class="fab fa-facebook"></i>
                    </a>
                  </div>
                  <div class="p-4">
                    <a href="https://www.linkedin.com/in/akanksha-yadav-a43068140">
                      <i class="fab fa-linkedin"></i>
                    </a>
                  </div>
                  <div class="p-4">
                    <a href="https://www.instagram.com/akanksha7997/">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body">
                <img src="Image/person.jpg" class="img-fluid rounded-circle w-50 mb-3">
                <h3>Swetha</h3>
                <h5 class="text-muted">Developer</h5>
               <!--  <p>Lorem ipsum dolor sit amet, eum nostrum menandri definitiones et, suas volutpat mea id. Ex qui magna autem, ad vel accusamus mediocritatem </p> -->
                <div class="d-flex justify-content-center">
                  <div class="p-4">
                    <a href="https://www.facebook.com/profile.php?id=100013318021670">
                      <i class="fab fa-facebook"></i>
                    </a>
                  </div>
                  <div class="p-4">
                    <a href="https://www.linkedin.com/in/swethareddy-choodi-a9910814b">
                      <i class="fab fa-linkedin"></i>
                    </a>
                  </div>
                  <div class="p-4">
                    <a href="https://www.instagram.com/killer_baby_reddy">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card">
              <div class="card-body">
                <img src="Image/person.jpg" class="img-fluid rounded-circle w-50 mb-3">
                <h3>Ria</h3>
                <h5 class="text-muted">Developer</h5>
                <!-- <p>Lorem ipsum dolor sit amet, eum nostrum menandri definitiones et, suas volutpat mea id. Ex qui magna autem, ad vel accusamus mediocritatem </p> -->
                <div class="d-flex justify-content-center">
                  <div class="p-4">
                    <a href="https://www.facebook.com/ria2908">
                      <i class="fab fa-facebook"></i>
                    </a>
                  </div>
                  <div class="p-4">
                    <a href="https://www.linkedin.com/in/ria-singh-256a33133">
                      <i class="fab fa-linkedin"></i>
                    </a>
                  </div>
                  <div class="p-4">
                    <a href="https://www.instagram.com/">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <section id="contact" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h3 class="text-capitalize">Feedback</h3>
          <p class="lead">
            We want 2 minutes of your's 
            <br>
            Give your valueable feedback to us that will help us to improve our services.
          </p>
          <form>
            <div class="input-group input-group-lg mb-2" >
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
                
              </div>
              <input type="text" class="form-control" placeholder="Name" name="" id="feedbackName" required >
            </div>
             <div class="input-group input-group-lg mb-2" >
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
                
              </div>
              <input type="email" class="form-control" placeholder="Email" name="" id="feedbackEmail" required >
            </div>
            <div class="input-group input-group-lg mb-2" >
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-pencil-alt"></i>
                </span>
                
              </div>
              <textarea required  class="form-control" placeholder="Message..." rows="5" name="" id="feedbackMsg"></textarea>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg" name="" id="feedbackSubmit">
          </form>
          
        </div>
        <div class="col-lg-3 align-self-center">
            <img src="Image/pizza-slice.png" class="img-fluid">
        </div>
      </div>
    </div>
    
  </section>

 <?php
   include('layouts/footer.php')
 ?>