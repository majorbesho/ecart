<?php 
include("./header.php");
include_once('./ecart/includes/crud.php');
$db = new Database();
$db->connect();
$db->sql("SET NAMES 'utf8'");
include_once('ecart/includes/functions.php');
include('./ecart/includes/variables.php');
include_once 'ecart/includes/custom-functions.php';
include ('./ecart/api-firebase/send-sms.php');
session_start();

?>

<style>

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<?php
 include_once('ecart/includes/functions.php');
 $function = new functions;
 include_once('ecart/includes/custom-functions.php');
 $fn = new custom_functions;

 
    $name          = (isset($_POST['name'])) ? $db->escapeString($fn->xss_clean($_POST['name'])) : "";
    $mobile      = (isset($_POST['mobile'])) ? $db->escapeString($fn->xss_clean($_POST['mobile'])) : "";
    $country_code      = (isset($_POST['country_code'])) ? $db->escapeString($fn->xss_clean($_POST['country_code'])) : "";
    $fcm_id      = (isset($_POST['fcm_id'])) ? $db->escapeString($fn->xss_clean($_POST['fcm_id'])) : "";
    $dob      = (isset($_POST['dob'])) ? $db->escapeString($fn->xss_clean($_POST['dob'])) : "";
    $email      = (isset($_POST['email']) && !empty($_POST['email'])) ? $db->escapeString($fn->xss_clean($_POST['email'])) : "";
    $password     = md5($db->escapeString($fn->xss_clean($_POST['password'])));
    $city         = (isset($_POST['city_id'])) ? $db->escapeString($fn->xss_clean($_POST['city_id'])) : "";
    $area         = (isset($_POST['area_id'])) ? $db->escapeString($fn->xss_clean($_POST['area_id'])) : "";
    $street     = (isset($_POST['street'])) ? $db->escapeString($fn->xss_clean($_POST['street'])) : "";
    $pincode     = (isset($_POST['pincode'])) ? $db->escapeString($fn->xss_clean($_POST['pincode'])) : "";
    $latitude     = (isset($_POST['latitude'])) ? $db->escapeString($fn->xss_clean($_POST['latitude'])) : "0";
    $longitude     = (isset($_POST['longitude'])) ? $db->escapeString($fn->xss_clean($_POST['longitude'])) : "0";
    $status     = 1;
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $referral_code  = "";


    for ($i = 0; $i < 10; $i++) {
      $referral_code .= $chars[mt_rand(0, strlen($chars) - 1)];
  }
  if (isset($_POST['friends_code']) && $_POST['friends_code'] != '') {
      $friend_code = $db->escapeString($fn->xss_clean($_POST['friends_code']));
      $sql = "SELECT id FROM users WHERE referral_code='" . $friend_code . "'";
      $db->sql($sql);
      $result = $db->getResult();
      $num_rows = $db->numRows($result);
      if ($num_rows > 0) {
          $friends_code = $db->escapeString($fn->xss_clean($_POST['friends_code']));
      } else {
          $response["error"]   = true;
          $response["message"] = "Invalid friends code!";
          echo json_encode($response);
          return false;
      }
  } else {
      $friends_code = '';
  }

  if (!empty($mobile)) {
      $sql = "select mobile from users where mobile='" . $mobile . "'";
      $db->sql($sql);
      $res = $db->getResult();
      $num_rows = $db->numRows($res);
      if ($num_rows > 0) {

          $response["error"]   = true;
          $response["message"] = "This mobile $mobile is already registered. Please login!";

          echo json_encode($response);
      } else if ($num_rows == 0) {
          if (isset($_FILES['profile']) && !empty($_FILES['profile']) && $_FILES['profile']['error'] == 0 && $_FILES['profile']['size'] > 0) {
              $profile = $db->escapeString($fn->xss_clean($_FILES['profile']['name']));
              if (!is_dir('../upload/profile/')) {
                  mkdir('../upload/profile/', 0777, true);
              }
              $extension = pathinfo($_FILES["profile"]["name"])['extension'];
              $mimetype = mime_content_type($_FILES["profile"]["tmp_name"]);
              if (!in_array($mimetype, array('image/jpg', 'image/jpeg', 'image/gif', 'image/png'))) {
                  $response["error"]   = true;
                  $response["message"] = "Image type must jpg, jpeg, gif, or png!";
                  echo json_encode($response);
                  return false;
              }

              $filename = microtime(true) . '.' . strtolower($extension);
              $full_path = '../upload/profile/' . "" . $filename;
              if (!move_uploaded_file($_FILES["profile"]["tmp_name"], $full_path)) {
                  $response["error"]   = true;
                  $response["message"] = "Invalid directory to load profile!";
                  echo json_encode($response);
                  return false;
              }
          } else {
              $filename = 'default_user_profile.png';
              $full_path = '../upload/profile/' . "" . $filename;
          }
          //user is not registered, insert the data to the database  
          $sql = "INSERT INTO `users`(`name`, `email`,`profile`, `mobile`,`dob`, `city`,`area`, `street` , `pincode`, `password`,`referral_code`,`friends_code`,`fcm_id`,`latitude`,`longitude`,`status`,`country_code`) VALUES 
    ('$name','$email','$filename','$mobile','$dob','$city','$area','$street','$pincode','$password','$referral_code','$friends_code','$fcm_id','$latitude','$longitude',$status,'$country_code')";
          $data = array(
              'name' => $name,
              'email' => $email,
              'profile' => DOMAIN_URL . 'upload/profile/' . "" . $filename,
              'mobile' => $mobile,
              'country_code' => $country_code,
              'fcm_id' => $fcm_id,
              'dob' => $dob,
              'city' => $city,
              'area' => $area,
              'street' => $street,
              'pincode' => $pincode,
             
              'password' => $password,
              'referral_code' => $referral_code,
              'friends_code' => $friends_code,
            
              'status' => $status
          );
          $db->sql($sql);
          $res = $db->getResult();
          $usr_id = $fn->get_data($columns = ['id'], 'mobile = "' . $mobile . '"', 'users');

          $sql = "DELETE FROM devices where fcm_id = '$fcm_id' ";
          $db->sql($sql);
          $res = $db->getResult();

          $response["error"]   = false;
          $response["message"] = "User registered successfully";
          $response["user_id"] = $usr_id[0]['id'];
          $response['name'] = $data['name'];
          $response['email'] = $data['email'];
          $response['profile'] = $data['profile'];
          $response['mobile']  = $data['mobile'];
          $response['password']  = $data['password'];
          $response['referral_code']     = $data['referral_code'];
          echo json_encode($response);
      }
  } else {
      echo "Email is required.";
  }

?>

<section class="content-header">
    <h1>Add User <small><a href='register.php'> 
      </a></small></h1>
    <hr />
</section>
<section class="content">
    <div class="row">
       
            <!-- general form elements -->
           <div class="container">
             <div class="row">  
                 <form method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User Name</label>
                            <?php echo isset($error['name']) ? $error['name'] : ''; ?>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">email</label><?php echo isset($error['email']) ?
                             $error['email'] : ''; ?>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">country code</label><?php echo isset($error['country_code']) ?
                             $error['country_code'] : ''; ?>
                            <input type="number" class="form-control" name="country_code" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">mobile</label><?php echo isset($error['mobile']) ?
                             $error['mobile'] : ''; ?>
                            <input type="mobile" class="form-control" name="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label><?php echo isset($error['dob']) ?
                             $error['dob'] : ''; ?>
                            <input type="date" class="form-control" name="dob" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">city</label><?php echo isset($error['city']) ?
                             $error['city'] : ''; ?>
                            <input type="text" class="form-control" name="city" >
                        </div>

                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">area</label><?php echo isset($error['area']) ?
                             $error['area'] : ''; ?>
                            <input type="text" class="form-control" name="area" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">street</label><?php echo isset($error['street']) ?
                             $error['street'] : ''; ?>
                            <input type="text" class="form-control" name="street" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">referral code</label><?php echo isset($error['referral_code']) ?
                             $error['referral_code'] : ''; ?>
                            <input type="text" class="form-control" name="referral_code" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">friends code</label><?php echo isset($error['friends_code']) ?
                             $error['text'] : ''; ?>
                            <input type="text" class="form-control" name="friends_code" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label><?php echo isset($error['password']) ?
                             $error['password'] : ''; ?>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">password Confirm</label><?php echo isset($error['referral_code']) ?
                             $error['referral_code'] : ''; ?>
                            <input type="text" class="form-control" name="password Confirm" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image&nbsp;&nbsp;&nbsp;*Please choose square image of larger than 350px*350px & smaller than 550px*550px.</label><?php echo isset($error['category_image']) ? $error['category_image'] : ''; ?>
                            <input type="file" name="category_image" id="category_image"  />
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" class="btn-warning btn" value="Clear" />

                    </div>

                </form>
             </div>
           </div>
              

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>




 <?php include("./footer.php");?>