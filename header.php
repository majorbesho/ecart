

<?php

    ob_start(); 


    include_once('./ecart/includes/crud.php');

    $db = new Database;
    include_once('./ecart/includes/custom-functions.php');
    $fn = new custom_functions();
    $db->connect();
    date_default_timezone_set('Asia/Dubai');
    $sql = "SELECT * FROM settings";
    $db->sql($sql);
    $res = $db->getResult();
    $settings = json_decode($res[5]['value'],1);
    $logo = $fn->get_settings('logo');
    

include('./ecart/includes/variables.php');
include_once('./ecart/includes/functions.php');

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> buyersuppliers Services</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    
    <link rel="stylesheet" href="./plugin/css/site.css" />
    <link rel="stylesheet" href="./plugin/css/wow.css">
    <link rel="stylesheet" href="./plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./plugin/css/owl.theme.default.min.css">


    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="plugin/css/main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/oov2wcw.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&family=Josefin+Slab:ital,wght@0,400;0,600;1,300;1,400;1,600&family=Muli:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
          rel="stylesheet" />
    <link href="https://www.dafontfree.net/embed/Y2VudHVyeS1nb3RoaWMtcmVndWxhciZkYXRhLzQwL2MvMTAxOTUwL0dPVEhJQy5UVEY" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/615adf7725797d7a89022c93/1fh5fhrj2';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
 <script>
     

 </script>
    <!--End of Tawk.to Script-->

    <style type="text/css">
        .box1 {
            border-top: 90px solid #f6a41d;
            border-bottom: 90px solid;
            border-right: 34px solid transparent;
            width: 129px;
            /* top: 4px; */
            /* height: 198px; */
            display: flex;
            justify-content: left;
            justify-items: left;
            position: absolute;
            left: 0;
        }

        .footer a {
            color: #ffffff !important;
        }

            .footer a :hover {
                color: #ffffff !important;
            }

        .growanchor a {
            transition: 0.5s ease;
        }

            .growanchor a:hover {
                -webkit-transform: scale(1.2);
                -ms-transform: scale(1.2);
                transform: scale(1.2);
                transition: 1s ease;
            }



        .box2 {
            border-top: 78px solid #f6a41d;
            transform: skew( 0.321rad);
            border-bottom: 89px solid;
            border-right: 92px solid transparent;
            border-left: 69px solid transparent;
        }

        .toplogoContainer {
            margin-left: -26px;
        }

        .footer a {
            color: #ffffff !important;
        }

            .footer a :hover {
                color: #ffffff !important;
            }

        .growanchor a {
            transition: 0.5s ease;
        }

            .growanchor a:hover {
                -webkit-transform: scale(1.2);
                -ms-transform: scale(1.2);
                transform: scale(1.2);
                transition: 1s ease;
            }

        .navbarcustom {
            font-weight: bold !important;
            font-size: 20px !important;
        }

        .main-nav .nav-item.active .nav-link {
            color: #000!important;
        }
        .nav-item .nav-link {
            color: #000!important;
        }
        .Sepreted {
            border-left: 4px solid #f6a41d;
            border-radius: 5px;
        }
        .main-nav il{
            margin-right: 40px;
        }

        .fullscreen-bg {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow: hidden;
            z-index: -100;
        }

        .fullscreen-bg__video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        /*.card-body {
            background-color: #f6a41c !important;
        }*/
      

        .input-field {
            width: 88%;
            padding: 17px;
            text-align: center;
            box-shadow: 0 10px 15px rgb(0 0 0 / 17%);
        }

        .input-icons i {
            position: absolute;
        }

        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }

        .icon {
            padding: 20px;
            min-width: 40px;
        }

        .navbarcustom {
            color: #f6a41d !important;
            font-size: 16px !important;
        }

        .imgSeperator {
             width: 20px;
            height: 27px;
            width: 4px;
            height: 23px;
            margin-top: 8px;
            border-radius: 10px;
            background-color: black;
        }

        .imgSeperatorLogin {
            width: 20px;
            height: 27px;
            width: 4px;
            height: 23px;
            margin-top: 0px;
            border-radius: 10px;
        }

        .Pager > span {
            background-color: #f6a518 !important;
        }

        .page {
            background-color: #000000 !important;
        }

        #particles-js {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: 50% 50%;
            background-repeat: no-repeat;
            position: absolute;
        }

        canvas {
            display: block;
            vertical-align: bottom;
        }

        .carImg {
            width: 100%;
            height: 400px;
            margin-bottom: 7%;
        }
        .carousel-inner > .item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 500px;
        }
        .carousel-caption {
            position: absolute;
            top: 3%;
            left: 12%;
        }

            .carousel-caption h2 {
                font-weight: 300;
                font-size: 35px;
                color: #fff;
            }

            .carousel-caption h1 {
                font-family: century-gothic, sans-serif;
                font-size: 4rem;
                font-weight: 300;
                color: #000;
                width: 21%;
                line-height: 4rem;
                letter-spacing: 0.2rem;
                text-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.4);
                animation: moveBanner 1s 0.5s forwards;
            }

            .carousel-caption h4 {
                font-family: century-gothic, sans-serif;
                font-size: 3.5rem;
                color: #000;
                width: 21%;
                letter-spacing: 0.1rem;
                margin-bottom: 3rem;
                text-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.4);
                animation: moveBanner 1s 0.7s forwards;
                word-wrap: break-word;
            }

            .carousel-caption button {
                width: 15rem;
                height: 4rem;
                background-color: #f6a518;
                border: none;
                font-family: century-gothic, sans-serif;
                font-size: 2rem;
                text-transform: uppercase;
                color: #000;
                text-shadow: 0 0.2rem 0.4rem rgba(0, 0, 0, 0.2);
                box-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.4);
                cursor: pointer;
                animation: moveBanner 1s 0.9s forwards;
            }
    </style>

</head>
<body>
    <section class="search-flat">
        <div class='containerxx' tabindex='1'>
            <div class='search-containerxx' tabindex='1'>
                <input placeholder='search' type='text' class="inputhome">
                <a class='buttonxx'>
                    <i class='fas fa-search'></i>
                </a>
            </div>
        </div>
    </section>
    <div class="main">
        <!-- remove ChangeBackground22 line 172, remove fluid -->
        <div class="container-flude">
           
                <div class="container-flude">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <a class="navbar-brand" href="index.php">
                                <img src="images/img/logo1.png" alt="" class="logoimg">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-8 search">
                            <div class="form-row">
                                <div class="form-group col-md-8 input-icons" >
                                    <input type="text" class="form-control my-2 my-lg-1 input-field" id="inputtext4" placeholder="What are you looking for" style="border-radius: 30px;" />
                                </div>
                            </div>
                        </div>
                    
                    <div class="col-lg-3  col-md-12 col-sm-12 top-navbr">
                    <ul>
                   <?php   
                   if(isset($_SESSION['user']))
                   {

  $_SESSION['status'] = 1;
                   }else{
                    $_SESSION['status'] = 0; 
                   }
              
                   ?>

                            <li>
                                <a href="./login.php" <?php echo ($_SESSION['status'] == 1) ? 
                                'style="display:none;"' : '' ?>
                                 data-toggle="tooltip" title="Login" id="btnSignIn" onclick="ShowLoginPopup()"
                                   style="color: #fff;"
                                   onmouseover="this.style.color='black'"
                                   onmouseout="this.style.color='#fff'">
                                    <i class="fas fa-user-circle" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href= "./logout.php"<?php echo ($_SESSION['status'] == 0) ?
                                 'style="display:none;"' : '' ?> data-toggle="tooltip" title="logout" 
                                id="btnlogout" onclick="ShowlogoutPopup()"
                                   style="color: #fff;"
                                   onmouseover="this.style.color='black'"
                                   onmouseout="this.style.color='#fff'">
                                    <i class="fas fa-user-circle" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li>
                                <a href="./register.php" <?php echo ($_SESSION['status'] == 1) ? 
                                'style="display:none;color: #fff;"' : '' ?> style="color: #fff;" 
                                   onmouseover="this.style.color='black'"
                                    onmouseout="this.style.color='#fff'"
                                    title="Register" >
                                    <i class="fas fa-user-plus" aria-hidden="true">
                                    </i>
                                </a>
                            </li>
                            <li>
                            <a <?php echo ($_SESSION['status'] == 0) ? 
                                'style="display:none;"' : '' ?> style="color: #fff;"
                               onmouseover="this.style.color='black'" onmouseout="this.style.color='#fff'">
                                <i class="fas fa-wallet" aria-hidden="true">
                                </i>
                            </a>
                            </li>
                            <li>
                            <a href="../" <?php echo ($_SESSION['status'] == 0) ? 
                                 : '' ?> style="color: #fff;" 
                                  onmouseover="this.style.color='black'"
                                  onmouseout="this.style.color='#fff'">
                                <i class="fas fa-shopping-cart" aria-hidden="true">
                                        <?php if (isset($_SESSION['cart'])){ $count = count($_SESSION['cart']);
                                          echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                          }else{
                                          echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";}?>
                      
                                </i>
                                 </a>
                                </li>
                    </ul>
                </div>
                </div>
               
        </div>
    </div>
</div> 



    <div class="row cites">

        <select id="country" class='form-control citycss'><option value="">-- Country --</option></select>


        <select id="region" class='form-control citycss'><option value="">-- City --</option></select>

        <div id='location'>
        </div>
    </div>

    <section class="navbarSection">
        <div class="container-flude">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation" style="color:#000000;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse navbar-dark  " id="navbarSupportedContent"
                             style="letter-spacing: 3px; letter-spacing: 3px; ">
                            <div class="Sepreted"></div>

                            <ul class="navbar-nav ml-auto main-nav nav-fill w-100" style="padding-top:10px;padding-bottom:10px;    padding-left: 1%;
    padding-right: 1%;">
                                <li class="nav-item active">
                                    <a class="nav-link navbarcustom"
                                       href="index.php">Home</a>
                                </li>

                                <div class="Sepreted"></div>
                                <li class="nav-item dropdown dropdown-slide">
                                    <a class="nav-link navbarcustom" href="AboutUs.php">Get To Know Us</a>
                                </li>
                                <div class="Sepreted"></div>
                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public" asp-controller="Product" asp-action="Index">Shop</a>
                                </li>

                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public"
                                       asp-controller="Home" asp-action="indexServices">
                                        Services
                                    </a>
                                </li>


                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public" asp-action="Career"
                                       asp-controller="Home">Career</a>
                                </li>

                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public" asp-action="ItSoutlion"
                                       asp-controller="Home">IT Solution</a>
                                </li>

                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public" asp-action="GlobalTender"
                                       asp-controller="Home">Global Tender</a>
                                </li>
                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public" asp-action="MillonairesClub"
                                       asp-controller="Home">Millonaires Club</a>
                                </li>
                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" asp-area="public" asp-action="ESkills"
                                       asp-controller="Home">E-Skills</a>
                                </li>

                                <div class="Sepreted"></div>

                                <li class="nav-item">
                                    <a class="nav-link navbarcustom" href="TalkToUs.php">Talk To Us</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10" style="display:none;">
                              
                               
                              
                              
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>


           
        </div>
    </section>


