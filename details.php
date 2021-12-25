
<?php include("./header.php");









include("./includes/init.php");

include_once('ecart/includes/functions.php');
include_once('ecart/includes/custom-functions.php');

include_once('ecart/includes/functions.php');
include_once('ecart/includes/custom-functions.php');
session_start();
$fn = new custom_functions;
// include_once('includes/crud.php');
$function = new Functions;
// $db = new Database();
if (isset($_GET['id'])) {
    $ID = $db->escapeString($fn->xss_clean($_GET['id']));
} else {
    // $ID = "";
    return false;
    exit(0);
}




// create array variable to store category data

$category_data = array();
$product_status = "";
$sql = "select id,name from category order by id asc";
$db->sql($sql);
$category_data = $db->getResult();
$sql = "select * from subcategory";
$db->sql($sql);
$subcategory = $db->getResult();
$sql = "SELECT image, other_images FROM products WHERE id =" . $ID;
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row) {
    $previous_menu_image = $row['image'];
    $other_images = $row['other_images'];
}



   
$category_data = array();
$product_status = "";
$sql = "select id,name from category order by id asc";
$db->sql($sql);
$category_data = $db->getResult();
$sql = "select * from subcategory";
$db->sql($sql);
$subcategory = $db->getResult();
$sql = "SELECT image, other_images FROM products WHERE id =" . $ID;
$db->sql($sql);
$res = $db->getResult();
foreach ($res as $row) {
    $previous_menu_image = $row['image'];
    $other_images = $row['other_images'];
}

        $id = $db->escapeString($fn->xss_clean($_GET['id']));
        $sql = "SELECT slug FROM products where id!=" . $id;
        $db->sql($sql);
        $res = $db->getResult();
        $i = 1;
       

        $subcategory_id = (isset($_POST['subcategory_id']) && $_POST['subcategory_id'] != '') ? $db->escapeString($fn->xss_clean($_POST['subcategory_id'])) : 0;
       
        $manufacturer = (isset($_POST['manufacturer']) && $_POST['manufacturer'] != '') ? $db->escapeString($fn->xss_clean($_POST['manufacturer'])) : '';
        $made_in = (isset($_POST['made_in']) && $_POST['made_in'] != '') ? $db->escapeString($fn->xss_clean($_POST['made_in'])) : '';
        $indicator = (isset($_POST['indicator']) && $_POST['indicator'] != '') ? $db->escapeString($fn->xss_clean($_POST['indicator'])) : '0';
        $return_status = (isset($_POST['return_status']) && $_POST['return_status'] != '') ? $db->escapeString($fn->xss_clean($_POST['return_status'])) : '0';
        $cancelable_status = (isset($_POST['cancelable_status']) && $_POST['cancelable_status'] != '') ? $db->escapeString($fn->xss_clean($_POST['cancelable_status'])) : '0';
        $till_status = (isset($_POST['till_status']) && $_POST['till_status'] != '') ? $db->escapeString($fn->xss_clean($_POST['till_status'])) : '';

        $tax_id = (isset($_POST['tax_id']) && $_POST['tax_id'] != '') ? $db->escapeString($fn->xss_clean($_POST['tax_id'])) : 0;

?>

<?php

?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<link rel="stylesheet" href="./plugin/1/css/normalize.css" />


    <link rel="stylesheet" href="./plugin/1/css/foundation.css" />

    
    <link rel="stylesheet" href="./plugin/1/css/demo.css" /> 
    <script src="./plugin/1/js/vendor/modernizr.js"></script>
    <script src="./plugin/1/js/vendor/jquery.js"></script>
  <!-- xzoom plugin here -->
  <script type="text/javascript" src="./plugin/1/dist/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./plugin/1/dist/xzoom.css" media="all" /> 
  <!-- hammer plugin here -->
  <script type="text/javascript" src="./plugin/1/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link type="text/css" rel="stylesheet" media="all" href="./plugin/1/fancybox/source/jquery.fancybox.css" />
  <link type="text/css" rel="stylesheet" media="all" href="./plugin/1/magnific-popup/css/magnific-popup.css" />
  <script type="text/javascript" src="./plugin/1/fancybox/source/jquery.fancybox.js"></script>
  <script type="text/javascript" src="./plugin/1/magnific-popup/js/magnific-popup.js"></script>       




  <script src="./plugin/1/js/foundation.min.js"></script>
    <script src="./plugin/1/js/setup.js"></script>

<?php

if (isset($_POST['add'])){


    echo "<script>alert('Product is already added in the cart..!')</script>";
    print_r($_POST['product_id']);
    /// print_r($_POST['product_id']);
   }

if (isset($_POST['add'])){


    echo "<script>alert('Product is already added in the cart..!')</script>";
    print_r($_POST['product_id']);
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
        echo ("cart");
        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<script>
    $(function () {
        $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 150,
            tint: "#333",
            Xoffset: 6,
        });
    });
    </script>
<?php
	
    $db = new Database();
    $db->connect();
    $id= $_GET["id"];
    $sql="SELECT * FROM `products` WHERE id = ". $id;
    $db->sql($sql);
    $res = $db->getResult();
   


 
				
            foreach ($res as $res) {		?>							
		
    <section id="default" class="padding-top0 containerx">
        
            <!-- <div class="large-12 column"><h3>Details <?php echo $res['name'];?> </h3></div> -->
            <div class="large-6 column">
                <div class="xzoom-container">
                    <img class="xzoom" id="xzoom-default" 
                    src="./ecart/<?php echo $res['image'];?>"
                         xoriginal="./ecart/<?php echo $res['image'];?>"/>
                        
                    <div class="xzoom-thumbs">
                      
                    <?php 
   $data = array();
   $sql_query = "SELECT v.*,p.*,v.id as product_variant_id FROM product_variant v JOIN 
   products p ON p.id=v.product_id WHERE p.id=" . $ID;
   $db->sql($sql_query);
   $res = $db->getResult();
   $product_status = $res[0]['status'];
   foreach ($res as $row)
       $data = $row;
   function isJSON($string)
   {
       return is_string($string) && is_array(json_decode($string, true)) 
       && (json_last_error() == JSON_ERROR_NONE) ? true : false;
   }
    if (!empty($data['other_images'])) {
        $other_images = json_decode($data['other_images']);

        for ($i = 0; $i < count($other_images); $i++) { ?>

        <a href="./ecart/<?= $other_images[$i]; ?>">
                            <img class="xzoom-gallery" width="80"
                             src="./ecart/<?= $other_images[$i]; ?>"
                                 xpreview="./cart/<?= $other_images[$i]; ?>"
                                  title="The description goes here"> 
                        </a>
        <?php }
    } ?>

                    </div>
                </div>
            </div>
         


            <div class="large-4 column">
                <div class="Piccontainer">

                    <div class="description">
                        <h1><?php echo $row["name"] ?></h1>
                      
                        <div id="rating">
                            <span>★</span>
                             <span>★</span>
                             <span>★</span>
                             <span>★</span>
                             <span>★</span>

                        </div>
                        <p>
                        <h2>supplyer:</h2> 
                        </p>
                        <p>
                        <?php echo $row["description"] ?>
                        </p>
                        <span><?php echo $row["price"] ?></span>
                        <input type="hidden" name="id"
                             value="<?php echo $row["id"] ?>">
                        <div>
                            <!-- <button type="submit" name="buy" class="buy">Buy</button> -->
                            <button type="submit" name="add" class="cart" > 
                                Add to Cart
                            </button>
                            <input type="hidden" name="product_id"
                             value="<?php echo $row["id"] ?>">
                        </div>
                       
                        <?php echo $row["id"] ?>



                    </div>

                </div>
            </div>
        
<?php  $data = array();
   $sql_query = "SELECT v.*,p.*,v.id as product_variant_id FROM product_variant v JOIN 
   products p ON p.id=v.product_id WHERE p.id=" . $ID;
   $db->sql($sql_query);
   $resV = $db->getResult();
   foreach ($resV as $row){

   ?>
            <div class="large-2 column">
                <div class="pricContainer">

                    <div class="description">
                        <h1><?php echo $row["price"] ?></h1>
                        <p>
                        Measurement :<?php echo $row["measurement"] ?>
                        </p>
                        <span>Manufacturer : <?php echo $row["manufacturer"] ?></span><br>
                        <span>Made in : <?php echo $row["made_in"] ?></span>
                        <span>Suppler : <?php echo $row["made_in"] ?></span>
                        <p>
                        $18.28 Shipping & Import Fees Deposit to United Arab Emirates Details 
Delivery Friday, December 31. Order within 23 hrs 23 mins
Or fastest delivery Friday, December 24
Deliver to United Arab Emirates


                        </p>
                        <div>
                            

                        </div>
                    </div>
                    <div class="container">  
   <button class="add-to-cart-button">  
     <svg class="add-to-cart-box box-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="2" fill="#ffffff"/></svg>  
     <svg class="add-to-cart-box box-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" rx="2" fill="#ffffff"/></svg>  
     <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>  
     <svg class="tick" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path fill="#ffffff" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM9.29 16.29L5.7 12.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l6.88-6.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-7.59 7.59c-.38.39-1.02.39-1.41 0z"/></svg>  
     <span class="add-to-cart">Add to cart</span>  
     <span class="added-to-cart">Added to cart</span>  
   </button>  
 </div>  
                </div>
            </div>
<?php } ?>
    </section>

    <?php


?>
<section class="section-1">


    <div class="cube-wrapper">
        <div class="cube">
            <div class="front-side fill">
                <img src="ecart/<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>" class="ImgItemDetais">
            </div>

            <div class="back-side center fill">
                <img src="ecart/<?php echo $row["image"]  ?>" alt="<?php echo $row["name"] ?>" class="ImgItemDetais">
            </div>
        </div>
   
      
        <div class="controls">
            <a href="#" class="top-x-control">
                <i class="fas fa-arrow-up "></i>
            </a>
            <a href="#" class="bottom-x-control">
                <i class="fas fa-arrow-down "></i>
            </a>
            <a href="#" class="left-y-control">
                <i class="fas fa-arrow-left "></i>
            </a>
            <a href="#" class="right-y-control">
                <i class="fas fa-arrow-right "></i>
            </a>
            <a href="#" class="top-z-control">
                <i class="fas fa-arrow-down "></i>
            </a>
            <a href="#" class="bottom-z-control">
                <i class="fas fa-arrow-up "></i>
            </a>
        </div>
      
    </div>

    <div class="section-1-banner centerx">
        <h1>&#8592;<?php echo $row["name"] ?></h1>
        <p><?php echo $row["description"] ?></p>
        <span> - <?php echo $row["price"] ?></span>
        <button type="button">Buy Now</button>
    </div>

</section>

<div class="container">
    <div class="row">
        <div class="col-6">
         

        </div>
        <div class="col-6">

        </div>
    </div>
</div>
<section class="comper">

    <div class="comparisontable">

        <ul class="row">
            <li class="legend">BuyerSupplers</li>
            <li><img src="~/images/logo1.png" /><br />company1</li>
            <li><img src="~/images/logo1.png" /><br />company2</li>
            <li><img src="~/images/logo1.png" /><br />company3</li>
            <li><img src="~/images/logo1.png" /><br />company14</li>
        </ul>

        <ul class="row">
            <li class="legend">Weight</li>
            <li>25kg</li>
            <li>13kg</li>
            <li>17kg</li>
            <li>28kg</li>
        </ul>

        <ul class="row">
            <li class="legend">Cost</li>
            <li>$$</li>
            <li>$</li>
            <li>$$</li>
            <li>$</li>
        </ul>

        <ul class="row">
            <li class="legend">Delivery</li>
            <li>Dubai</li>
            <li>Abou daibe</li>
            <li>Al3en</li>
            <li>um </li>
        </ul>

        <ul class="row">
            <li class="legend">Cap paper </li>
            <li>Best Chair for Back Pain</li>
            <li>Best budget chair</li>
            <li>All Mesh for Cooling</li>
            <li>Only Chair with Top Grain Leather</li>
        </ul>
        
        <ul class="row">
            <li class="legend"></li>
            <li><a href="" class="calltoaction">Buy Now</a></li>
            <li><a href="" class="calltoaction">Buy Now</a></li>
            <li><a href="" class="calltoaction">Buy Now</a></li>
            <li><a href="" class="calltoaction">Buy Now</a></li>
        </ul>

    </div>
</section>

<section  class="AllImgSection" >
    <?php



$data = array();
$sql_query = "SELECT v.*,p.*,v.id as product_variant_id FROM product_variant v JOIN 
products p ON p.id=v.product_id WHERE p.id=" . $ID;
$db->sql($sql_query);
$res = $db->getResult();
$product_status = $res[0]['status'];
foreach ($res as $row)
    $data = $row;
function isJSONs($string)
{
    return is_string($string) && is_array(json_decode($string, true)) 
    && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
 if (!empty($data['other_images'])) {
     $other_images = json_decode($data['other_images']);

     for ($i = 0; $i < count($other_images); $i++) { ?>
 <div class=" allImg">
 <img  src="ecart/<?= $other_images[$i]; ?>" title="The description goes here"> 
 </div>
     
                         
                     
     <?php }
 } ?>




</section>




<div class="container-fluid mrg100 momo10">
    <div class="row">
        <div class="col-lg-6 text-center momo5">
            <h2>WHAT &#8592;<?php echo $row["name"] ?>Is DIFFERENT?</h2>
            <div class="line2"></div>
            <h5></h5>
            <p>
            <?php echo $row["description"] ?>
            </p>
            <a href="#" class="btn">Ask for Qutation  </a>
        </div>
        <div class="col-lg-6 text-center momo5">
            <img src="ecart/<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>">
        </div>
    </div>
    <div class="row mrg100">
        <div class="col-lg-6 text-center momo5">
            <img src="ecart/<?php echo $row["image"] ?>" alt="<?php echo $row["name"] ?>">
        </div>
        <div class="col-lg-6 text-center momo5">
            <h2>WE ARE provder  EVERYWHERE</h2>
            <div class="line2"></div>
            <p>

            </p>
            <a href="#" class="btn">MEET THE Realtid Product </a>
        </div>
    </div>
</div>


<section class="suggest container-fluid mrg100 momo10">

    <h1> Sugeest product </h1>

    <section class="newItem">

        <div class="container-fluid">
           
                <div class="row " style="padding-top:20px;">
                   
                  
                        <div class="TopItem"></div>
                        
                           <?php  

                           $sql =  "SELECT * from products,subcategory  JOIN products p 
                           on p.subcategory_id =subcategory.id  WHERE 
                           products.id =". $id  ;
                           $db->sql($sql);
                           $subcategory = $db->getResult();
                          
                           ?>

                            <div class="col-12  ">
                                <div class="row container1">
                                   
<?php  foreach ($subcategory as $rowv){  ?>

                                        <div class="col-lg-2 item" id="itemess">

                                            <h5 class="name"><?php echo $rowv["name"] ?> 
</h5>
                                            <div class="cricle"></div>
                                            <a class="buy"href="<?php echo $rowv["id"] ?> ">
                                            Buy Now</a>
                                            <img src="ecart/<?php echo $rowv["image"] ?> 
                                            " height="100px" width="100px" alt="@itemxx.Name" class="imgProduct">
                                        </div>

                                   <?php } ?>

                                </div>
                            </div>
                         

                   
                </div>
            
            
        </div>
    </section>



</section>


<section class="suggest container-fluid mrg100 momo10">

    <h1> Related  product </h1>

    <section class="newItem">

        <div class="container-fluid">
           
                <div class="row " style="padding-top:20px;">
                   
                  
                        <div class="TopItem"></div>
                        
                       
               
                           <?php  


                           $sql =  "SELECT * from products,subcategory  JOIN products p on p.subcategory_id = subcategory.id WHERE products.id =". $id ;
                           $db->sql($sql);
                           $subcategory = $db->getResult();
                          
                           ?>

                            <div class="col-12  ">
                                <div class="row container1">
                                   
<?php  foreach ($subcategory as $rowv){  ?>

                                        <div class="col-lg-2 item" id="itemess">

                                            <h5 class="name"><?php echo $rowv["name"] ?> 
</h5>
                                            <div class="cricle"></div>
                                            <a class="buy"href="<?php echo $rowv["id"] ?> ">
                                            Buy Now</a>
                                            <img src="ecart/<?php echo $rowv["image"] ?> 
                                            " height="100px" width="100px" alt="@itemxx.Name" class="imgProduct">
                                        </div>

                                   <?php } ?>

                                </div>
                            </div>
                         

                   
                </div>
            
            
        </div>
    </section>



</section>


<!-- End of Banner -->

<?php  	} ?>

<?php include('./footer.php');?>