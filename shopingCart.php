

<?php include("./header.php");



include_once('ecart/includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");

include('./ecart/includes/variables.php');
include_once('./ecart/includes/custom-functions.php');
include('./ecart/api-firebase/send-sms.php');


include_once('./ecart/includes/variables.php');
include_once('./ecart/includes/custom-functions.php');

$fn = new custom_functions;
include_once('ecart/api-firebase/verify-token.php');
$db = new Database();
$db->connect();

$response = array();

$product_id = (isset($_POST['id']));
print $product_id;
    $user_id = (isset($_POST['user_id']) && !empty($_POST['user_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['user_id'])) : "";
    $product_id = (isset($_POST['product_id']) && !empty($_POST['product_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['product_id'])) : "";
    $product_variant_id  = (isset($_POST['product_variant_id']) && !empty($_POST['product_variant_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['product_variant_id'])) : "";
    $qty = (isset($_POST['qty']) && !empty($_POST['qty'])) ? $db->escapeString($fn->xss_clean_array($_POST['qty'])) : "";
    if (!empty($user_id) && !empty($product_id)) {
        if (!empty($product_variant_id)) {
            if ($fn->is_item_available($product_id, $product_variant_id)) {
              
                if ($fn->is_item_available_in_user_cart($user_id, $product_variant_id)) {
                    /* if item found in user's cart update it */
                    if (empty($qty) || $qty == 0) {
                        $sql = "DELETE FROM cart WHERE user_id = $user_id AND product_variant_id = $product_variant_id";
                     
                      
                    }
                    $data = array(
                        'qty' => $qty
                    );
                    if ($db->update('cart', $data, 'user_id=' . $user_id . ' AND product_variant_id=' . $product_variant_id)) {
                        $response['error'] = false;
                        $response['message'] = 'Item updated in user\'s cart successfully';
                    } 
                } else {
                    /* if item not found in user's cart add it */
                    $data = array(
                        'user_id' => $user_id,
                        'product_id' => $product_id,
                        'product_variant_id' => $product_variant_id,
                        'qty' => $qty
                    );
                    if ($db->insert('cart', $data)) {
                        $response['error'] = false;
                        $response['message'] = 'Item added to user\'s cart successfully';
                    } else {
                        $response['error'] = true;
                        $response['message'] = 'Something went wrong please try again!';
                    }
                }
              
              } else {
                $response['error'] = true;
                $response['message'] = 'No such item available!';
            }
        } 
    } 


    ?>


<?php
/*
2.add_multiple_items_to_cart
    accesskey:90336
    add_multiple_items:1
    user_id:3
    product_variant_id:203,198,202
    qty:1,2,1
*/
if ((isset($_POST['add_multiple_items'])) && ($_POST['add_multiple_items'] == 1)) {
    $user_id = (isset($_POST['user_id']) && !empty($_POST['user_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['user_id'])) : "";
    $product_variant_id  = (isset($_POST['product_variant_id']) && !empty($_POST['product_variant_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['product_variant_id'])) : "";
    $qty = (isset($_POST['qty']) && !empty($_POST['qty'])) ? $db->escapeString($fn->xss_clean_array($_POST['qty'])) : "";
    $empty_qty = false;
    $empty_qty_1 = false;
    $item_exists = false;
    if (!empty($user_id)) {
        if (!empty($product_variant_id)) {
            $product_variant_id = explode(",", $product_variant_id);
            $qty = explode(",", $qty);
            for ($i = 0; $i < count($product_variant_id); $i++) {
                $product_id = $fn->get_product_id_by_variant_id($product_variant_id[$i]);
                if ($fn->is_item_available($product_id, $product_variant_id[$i])) {
                    $item_exists = true;
                    if ($fn->is_item_available_in_user_cart($user_id, $product_variant_id[$i])) {
                        /* if item found in user's cart update it */
                        if (empty($qty[$i]) || $qty[$i] == 0) {
                            $empty_qty = true;
                            $sql = "DELETE FROM cart WHERE user_id = $user_id AND product_variant_id = $product_variant_id[$i]";
                            $db->sql($sql);
                        } else {
                            $data = array(
                                'qty' => $qty[$i]
                            );
                            $db->update('cart', $data, 'user_id=' . $user_id . ' AND product_variant_id=' . $product_variant_id[$i]);
                        }
                    } else {
                        /* if item not found in user's cart add it */
                        if (!empty($qty[$i]) && $qty[$i] != 0) {
                            $data = array(
                                'user_id' => $user_id,
                                'product_id' => $product_id,
                                'product_variant_id' => $product_variant_id[$i],
                                'qty' => $qty[$i]
                            );
                            $db->insert('cart', $data);
                        } else {
                            $empty_qty_1 = true;
                        }
                    }
                }
            }
            $response['error'] = true;
            $response['message'] = $item_exists = true ? 'Cart Updated successfully!' : 'Items Added Successfully';
            $response['message'] .= $empty_qty == true ? 'Some items removed due to 0 quantity' : '';
            $response['message'] .= $empty_qty_1 == true ? 'Some items not added due to 0 quantity' : '';
        } else {
            $response['error'] = true;
            $response['message'] = 'Please choose atleast one item!';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Please pass all the fields!';
    }

    print_r(json_encode($response));
    return false;
}

/*
3.remove_from_cart
    accesskey:90336
    remove_from_cart:1
    user_id:3
    product_variant_id:4 {optional}
*/
if ((isset($_POST['remove_from_cart'])) && ($_POST['remove_from_cart'] == 1)) {
    $user_id  = (isset($_POST['user_id']) && !empty($_POST['user_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['user_id'])) : "";
    $product_variant_id = (isset($_POST['product_variant_id']) && !empty($_POST['product_variant_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['product_variant_id'])) : "";
    if (!empty($user_id)) {
        if ($fn->is_item_available_in_user_cart($user_id, $product_variant_id)) {
            /* if item found in user's cart remove it */
            $sql = "DELETE FROM cart WHERE user_id=" . $user_id;
            $sql .= !empty($product_variant_id) ? " AND product_variant_id=" . $product_variant_id : "";
            if ($db->sql($sql) && !empty($product_variant_id)) {
                $response['error'] = false;
                $response['message'] = 'Item removed from user\'s cart successfully';
            } elseif ($db->sql($sql) && empty($product_variant_id)) {
                $response['error'] = false;
                $response['message'] = 'All items removed from user\'s cart successfully';
            } else {
                $response['error'] = true;
                $response['message'] = 'Something went wrong please try again!';
            }
        } else {
            $response['error'] = true;
            $response['message'] = 'Item not found in user\'s cart!';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Please pass all the fields!';
    }

    print_r(json_encode($response));
    return false;
}

/*
4.get_user_cart
    accesskey:90336
    get_user_cart:1
    user_id:3
    offset:0 {optional}
    limit:5 {optional}
*/
if ((isset($_POST['get_user_cart'])) && ($_POST['get_user_cart'] == 1)) {
    $ready_to_add = false;
    $user_id  = (isset($_POST['user_id']) && !empty($_POST['user_id'])) ? $db->escapeString($fn->xss_clean_array($_POST['user_id'])) : "";
    if (!empty($user_id)) {
        if ($fn->is_item_available_in_user_cart($user_id)) {
            /* if item found in user's cart return data */
            $sql = "SELECT count(id) as total from cart where user_id=" . $user_id;
            $db->sql($sql);
            $total = $db->getResult();
            $sql = "select * from cart where user_id=" . $user_id . " ORDER BY date_created DESC ";
            $db->sql($sql);
            $res = $db->getResult();
            $i = 0;
            $j = 0;
            $total_amount = 0;
            $sql = "select qty,product_variant_id from cart where user_id=" . $user_id;
            $db->sql($sql);
            $res_1 = $db->getResult();
            foreach ($res_1 as $row_1) {
                $sql = "select price,discounted_price from product_variant where id=" . $row_1['product_variant_id'];
                $db->sql($sql);
                $result_1 = $db->getResult();
                $price = $result_1[0]['discounted_price'] == 0 ? $result_1[0]['price'] * $row_1['qty'] : $result_1[0]['discounted_price'] * $row_1['qty'];
                $total_amount += $price;
            }
            foreach ($res as $row) {

                $sql = "select pv.*,p.name,p.slug,p.image,p.other_images,t.percentage as tax_percentage,t.title as tax_title,pv.measurement,(select short_code from unit u where u.id=pv.measurement_unit_id) as unit from product_variant pv left join products p on p.id=pv.product_id left join taxes t on t.id=p.tax_id where pv.id=" . $row['product_variant_id'];
                $db->sql($sql);
                $res[$i]['item'] = $db->getResult();

                for ($k = 0; $k < count($res[$i]['item']); $k++) {
                    $res[$i]['item'][$k]['other_images'] = json_decode($res[$i]['item'][$k]['other_images']);
                    $res[$i]['item'][$k]['other_images'] = empty($res[$i]['item'][$k]['other_images']) ? array() : $res[$i]['item'][$k]['other_images'];
                    $res[$i]['item'][$k]['tax_percentage'] = empty($res[$i]['item'][$k]['tax_percentage']) ? "0" : $res[$i]['item'][$k]['tax_percentage'];
                    $res[$i]['item'][$k]['tax_title'] = empty($res[$i]['item'][$k]['tax_title']) ? "" : $res[$i]['item'][$k]['tax_title'];
                    if ($res[$i]['item'][$k]['stock'] <= 0 || $res[$i]['item'][$k]['serve_for'] == 'Sold Out') {
                        $res[$i]['item'][$k]['isAvailable'] = false;
                        $ready_to_add = true;
                    } else {
                        $res[$i]['item'][$k]['isAvailable'] = true;
                    }
                    for ($l = 0; $l < count($res[$i]['item'][$k]['other_images']); $l++) {
                        $other_images = DOMAIN_URL . $res[$i]['item'][$k]['other_images'][$l];
                        $res[$i]['item'][$k]['other_images'][$l] = $other_images;
                    }
                }
                for ($j = 0; $j < count($res[$i]['item']); $j++) {
                    $res[$i]['item'][$j]['image'] = !empty($res[$i]['item'][$j]['image']) ? DOMAIN_URL . $res[$i]['item'][$j]['image'] : "";
                }
                $i++;
            }
            if (!empty($res)) {
                $response['error'] = false;
                $response['total'] = $total[0]['total'];
                $response['ready_to_cart'] = $ready_to_add;
                $response['total_amount'] = number_format($total_amount, 2, '.', '');
                $response['data'] = array_values($res);
            } else {
                $response['error'] = true;
                $response['message'] = "No item(s) found in user\'s cart!";
            }
        } else {
            $response['error'] = true;
            $response['message'] = 'No item(s) found in user\'s cart!';
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Please pass all the fields!';
    }

    print_r(json_encode($response));
    return false;
}




?>


<?php 

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
} 


$total = 0;
    if (isset($_SESSION['cart'])){
        $product_id = array_column($_SESSION['cart'], 'products_id');

        $result = $db->getResult();
       
            foreach ($products_id as $id){
                if ($row['id'] == $id){
                    print_r ($row['product_image'],
                     $row['product_name'],
                     $row['product_price'], 
                     $row['id']);
                    $total = $total + (int)$row['product_price'];








                }
            }
        
    }else{
        echo "<h5>Cart is Empty</h5>";
    }



?>



<h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">Dingo Dog Bones</div>
      <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
    </div>
    <div class="product-price">12.99</div>
    <div class="product-quantity">
      <input type="number" value="2" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">25.98</div>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
    </div>
    <div class="product-details">
      <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
      <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
    </div>
    <div class="product-price">45.99</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">45.99</div>
  </div>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>






 <?php include("./footer.php");?>