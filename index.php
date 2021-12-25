
<?php include("./header.php");?>

<?php

$db = new Database();
$db->connect();
$sql="SELECT * FROM `slider` ";
$db->sql($sql);
$res = $db->getResult();
// print_r($res);

?>

<div class="container-flude my-3">
  <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
  
        <?php
		$db = new Database();
        $db->connect();
        $sql="SELECT * FROM `slider` ORDER BY `id` DESC ";
        $db->sql($sql);
        $res = $db->getResult();
        // print_r($res);
			$setActive = 0;				
			$sliderHtml = '';	
            foreach ($res as $res) {			
				$activeClass = "";			
				if(!$setActive) {
					$setActive = 1;
					$activeClass = 'active';						
				}						
				$sliderHtml.= "<div class='carousel-item ".$activeClass."'>";
				$sliderHtml.= "<div class='col-xs-4'>";
				$sliderHtml.= "<img src='./ecart/".$res['image']."' class='ground1 carImg img-responsive'>";
				$sliderHtml.= "</div></div>";	
                		
			}
			echo $sliderHtml;
          
		 ?>	  
        </div>
    </div>
  </div>
   
  
  <div class="container-flude myCarousel2 ">
      <div class="row ">
        <div id="myCarousel" class="carousel slide " data-ride="carousel">
          <div class="carousel-inner2" >
     


          <?php
		$db = new Database();
        $db->connect();
        $sql="SELECT * FROM `category` ORDER BY `id` DESC ";
        $db->sql($sql);
        $res = $db->getResult();
        // print_r($res);
			$setActive = 0;				
			$sliderHtml = '';	
            foreach ($res as $res) {			
				$activeClass = "";			
				if(!$setActive) {
					$setActive = 1;
					$activeClass = 'active';						
				}						
				$sliderHtml.= "<div class='carousel-item py-5 ".$activeClass."'>";
				
           ?>     		
			  
              <div class="row">
                <div class="col-sm-3">

                  <div class="card h-100 new">
                    <div class="flip-card">
                      <div class="flip-card-inner">
                        <div class="flip-card-front">
                          <div class="p-3">
                            <img class="rounded-circle img-fluid w-75" 
                            src="./ecart/<?php  echo ($res['image']); ?>">
                          </div>

                          <h5 class="card-title"><?php  echo ($res['name']); ?></h5>
                          <p class="card-text"><?php  echo ($res['subtitle']); ?></p>
                          <a href="#" class="btn btn-warning">Book Now</a>
                        </div>
                        <div class="flip-card-back">
                          <div class="p-5 pt-10">
                            <h1><?php  echo ($res['name']); ?></h1>
                            <p class="card-text"><?php  echo ($res['subtitle']); ?></p>
                            <a href="#" class="btn btn-warning">Book Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
         
           
<?php	} ?> 
            <!-- final sc -->
          </div>
          
        </div>
      </div>
      </div>
</div>
<!--- start of item -->





  
      <?php
		    $db = new Database();
        $db->connect();
        $sql="SELECT * FROM `category` ORDER BY `id` DESC ";
        $db->sql($sql);
        $res2 = $db->getResult();
        // print_r($res);
		  	$setActive = 0;				
		  	$sliderHtml = '';	
            foreach ($res2 as $res2) {									
			}
 
		?>
          <?php
	
        $sql="select * FROM category,subcategory 
         where category.id = subcategory.category_id";
        $db->sql($sql);
        $res3 = $db->getResult();
        // print_r($res);
			$setActive = 0;				
			$sliderHtml = '';	
            foreach ($res3 as $res3) {									
			} ?>
    <div class="container-flude  ">
      <div class="row">
     <?php
		$db = new Database();
        $db->connect();
        $sql="SELECT * FROM category  ";
        $db->sql($sql);
        $respro = $db->getResult();
        
			$setActive = 0;				
			$sliderHtml = '';		
             foreach ($respro as $respro) {?>	
             
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card card-body area--yellow h-100">
            <h1><?php  echo ($respro['name']); ?></h1>
            <img src="./ecart/<?php  echo ($respro['image']); ?>"/>
            <p>
            <?php  echo ($respro['subtitle']); ?>
            </p>
            <button class="btn btn-dark">Buy Now</button>
          </div>
        </div>
         <div class="col-lg-3">
          <div class="card card-body h-100">

          <div class="row titel ">
              <div class="col-lg-6">
                <p class="font-weight-bold">Shop by Category</p>
              </div>
              <div class="col-lg-6">
                <a href="#" class="text-decoration-none">
                  <p class="text-muted">Show all</p>
                </a>
              </div>
            </div>
            <div class="row">
              
          <?php
		// $db = new Database();
    //     $db->connect();
        $sql="select * FROM subcategory  where subcategory.category_id =".$respro['id'];
        $db->sql($sql);
        $res3 = $db->getResult();
        // print_r($res);
			$setActive = 0;				
			$sliderHtml = '';	
            foreach ($res3 as $res3) {		?>							
		
          <div class="col-sm-6">
                <div class="h-50">
                  <a href="#" class="text-decoration-none"><img class="rounded img-fluid"
                   src="./ecart/<?php  echo ($res3['image']); ?>" class="subcategory">
                    <p class="text-center text-muted"><?php  echo ($res3['name']); ?></p>
                  </a>
                </div>
              </div>
              
            <?php  	} ?>
          
            
            </div>
          </div>
        </div>   
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="card card-body h-40 mb-4 ">
            <p class="font-weight-bold">New Arrivals</p> 
             <div class="row">
        <?php
		// $db = new Database();
    //     $db->connect();
        $sql="select * FROM products  where category_id =".$respro['id'];
        $db->sql($sql);
        $resPeoduct = $db->getResult();
        // print_r($res);
       
			$setActive = 0;				
			$sliderHtml = '';	
            foreach ($resPeoduct as $resPeoduct) {		?>		
     
        
              <div class="col-sm-2">
                <div class="" style="height: 175px;;">
                  <a href="./details.php?id=<?php echo $resPeoduct['id']; ?>" class="text-decoration-none">
                    <img class="img-fluid itemHE" 
                    src="./ecart/<?php  echo ($resPeoduct['image']); ?>">
                    <p class="text-center text-muted cartText">
                      <?php  echo ($resPeoduct['name']); ?></p>
                  </a>
                </div>
               </div>

             <?php } ?>
            
          
           
            </div>
          </div>
          <div class="card card-body h-30">
            <p class="font-weight-bold">Top Offers</p>
            <div class="row">
              <?php
		// $db = new Database();
    //     $db->connect();
        $sql="select * FROM offers ORDER BY `id` DESC LIMIT 6 ";
        $db->sql($sql);
        $resOffers = $db->getResult();
        // print_r($res);
       
			$setActive = 0;				
			$sliderHtml = '';	
            foreach ($resOffers as $resOffers) {		?>		
     
        
              <div class="col-sm-2">
                <div class="h-100">
                  <a href="#" class="text-decoration-none">
                    <img class="img-fluid" 
                    src="./ecart/<?php  echo ($resOffers['image']); ?>">
                    
                  </a>
                </div>
               </div>

             <?php } ?>
            </div>
          </div>
        </div>


           <?php } ?>			
       
      </div> 
    </div>
       </div>


        </div>
</div>




  
    

    <div class="container my-2">
      <div class="row">
        <div class="col-sm-3">
          <div class="h-100">
            <img class="img-fluid rounded-circle" src="./images/images/download.png">
            <div class="card-body text-center">
              <div class="card-title text-center card-title font-weight-bold">
                <h1>01</h1>
              </div>
              <p class="card-text text-justify">Download the app.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="h-100">
            <img class="img-fluid rounded-circle" src="./images/images/booking.png">
            <div class="card-body text-center">
              <div class="card-title text-center card-title font-weight-bold">
                <h1>02</h1>
              </div>
              <p class="card-text text-justify">Make Booking.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="h-100">
            <img class="img-fluid rounded-circle" src="./images/images/track.jfif">
            <div class="card-body text-center">
              <div class="card-title text-center card-title font-weight-bold">
                <h1>03</h1>
              </div>
              <div class="text-justify">Track your Request.</div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="h-100">
            <img class="img-fluid rounded-circle" src="./images/images/like.jpg">
            <div class="card-body text-center">
              <div class="card-title text-center card-title font-weight-bold">
                <h1>04</h1>
              </div>
              <p class="card-text text-justify">Make give us like</p>
            </div>
          </div>
        </div>
      </div>
    </div>



    <?php include('./footer.php');?>