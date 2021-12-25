
<?php include("./header.php");?>



<h1>Talk To Us</h1>

<script src="./plugin/js/jquery-2.2.4.min.js"></script>
<script src="./plugin/js/plugins.js"></script>
<style type="text/css">


    .grow {
        transition: 1s ease;
        border-color: transparent;
    }

        .grow:hover {
            -webkit-transform: scale(1.5);
            -ms-transform: scale(1.5);
            transform: scale(1.5);
            transition: 1s ease;
        }

            .grow:hover p {
                color: #ffffff;
            }
</style>

<section class="" style="margin-top:80px; background-color:transparent;margin-bottom:30px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-10  h-100 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-2">
                        <div class="text-center grow" style="padding:10px;margin-right: 30px;cursor:pointer" onclick="GoToFAQ()">
                        <img src="./images/Images/icon-faq.svg" style="width: 56px;height: 56px;" />
                            <p style="font-size: 18px;color: #000;font-weight: 700;width: 100px;">PRODUCT FAQs</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="text-center grow" style="padding:10px;margin-right: 30px;cursor:pointer" onclick="GoToShipping()">
                        <img src="./images/Images/icon-shipping.svg" style="width: 56px;height: 56px;" />
                            <p style="font-size: 18px; color: #000; font-weight: 700; width: 100px;">SHIPPING & RETURNS</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="text-center grow" style="padding:10px;margin-right: 30px;cursor:pointer" onclick="GoToTermAndCondition()">
                        <img src="./images/Images/icon-warranty.svg" style="width: 56px;height: 56px;" />
                            <p style="font-size: 18px; color: #000; font-weight: 700; width: 100px;">WARRANTY</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="text-center grow" style="padding:10px;margin-right: 30px;cursor:pointer" onclick="GoToPrivacyPolicy()">
                        <img src="./images/Images/icon-registration.svg" style="width: 56px;height: 56px;" />
                            <p style="font-size: 18px; color: #000; font-weight: 700; width: 100px;">PRIVACY POLICY</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="text-center grow" style="padding:10px;margin-right: 30px;cursor:pointer" onclick="GoToAntiFraudDisclaimer()">
                        <img src="./images/Images/privacy.svg" style="width: 56px;height: 56px;" />
                            <p style="font-size: 18px; color: #000; font-weight: 700; width: 107px;">ANTI FRAUD DISCLAIMER</p>
                        </div>
                        </div>
                        <div class="col-2">
                            <div class="text-center grow" style="padding:10px;cursor:pointer">
                            <img src="./images/Images/quote.png" style="width: 56px;height: 56px;" onclick="GoToDisclaimerPolicy();" />
                                <p style="font-size: 18px; color: #000; font-weight: 700; width: 107px;">DISCLAIMER POLICY</p>
                            </div>
                            </div>
                        </div>
                    </div>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-10" style="    background-color: transparent;border-radius: 50px;" id="divAboutUs">
                <div class="row" style="margin-top:40px;">

                    <div class="col-lg-12 col-sm-12 col-md-12 text-left">
                        <p>
                            <span style="font-size: 50px;color: black;font-weight: 900;">CONTACT</span>
                            <span style="font-size: 25px;color: black;font-weight: 600;">US</span>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
        </div>

        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
                
                    <div class="col-md-12">
                        <div class="row">
                            <div id="map" class="col-md-12 col-sm-12 col-lg-12" 
                                 style="width:100%;height:705px"></div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
        
   
</section>




<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading text-center pb-5">
                    <h2 class="font-weight-bold">Lets Talk</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                    <div class="package-content-heading border-bottom">
                    <img src="./images/ProductImages/time.png" style="height:100px;" />
                        <h2>Opening Time</h2>

                    </div>
                    <ul>
                        <li class="my-4" style="text-align: left;">
                        <i class="fa fa-check-circle"></i>Mon to Thurs: 8am – 10pm</li>
                        <li class="my-4" style="text-align: left;">
                        <i class="fa fa-check-circle"></i>Saturday: 8am – 10pm</li>
                        <li class="my-4" style="text-align: left;"> 
                        <i class="fa fa-check-circle"></i>Friday: 5pm – 10pm</li>

                    </ul>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="package-content bg-light border text-center my-2 my-lg-0 p-5">
                    <div class="package-content-heading border-bottom">
                    <img src="./images/ProductImages/location.png" style="height:100px;" />
                        <h2>ADDRESS</h2>

                    </div>
                    <ul>
                        <li class="my-4" style="text-align: left;">
                            <i class="fa fa-check-circle"></i>
                            Plot No. 13, Unit No. 1, Umm Thaob 7, New Industrial Area, Umm Al Quwain, UAE-1111
                        </li>
                        <li class="my-4" style="text-align: left;">
                        <i class="fa fa-check-circle"></i>Dubai silicon oasis, UAE</li>

                    </ul>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 mx-sm-auto">
                <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                    <div class="package-content-heading border-bottom">
                    <img src="./images/ProductImages/phone_icon.png" style="height:100px;" />
                        <h2>PHONE &amp; EMAIL</h2>

                    </div>
                    <ul style="text-align: left;">

                        <li class="my-4">
                            <i class="fa fa-check-circle"></i>Phone- +971 5 666 05 202
                        </li>

                        <li class="my-4">
                            <i class="fa fa-check-circle"></i>Email- hello@buyersuppliers.com
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function () {

        $.each($(".nav-item"), function () {
            $(this).removeClass("active");
            if ($(this).text().trim() == "Talk To Us") {
                $(this).addClass("active");
            }
        });
    });

    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: {
                lat: 25.418394,
                lng: 55.445484
            },
        });

        var icon = {
            url: "http://powerpunchprotienhouse.com/img/MyLocation.png",
            scaledSize: new google.maps.Size(30, 40),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(15, 40)
        };
        var marker = new google.maps.Marker({
            position: {
                lat: 25.3927145,
                lng: 55.4336329
            },
            map: map,
            animation: google.maps.Animation.DROP,
            icon: icon
        })

        var infowindow = new google.maps.InfoWindow({
            content: "<img src='https://www.buyersuppliers.com/Content/Classimax/images/ProjectImg/logo1.png' style='height:50px;width:50px'/>"
        });
        marker.addListener("click", () => {
            infowindow.open(marker.get("map"), marker);
        });
        infowindow.open(map, marker);

        var marker2 = new google.maps.Marker({
            position: {
                lat: 25.26211297,
                lng: 55.3003730
            },
            map: map,
            animation: google.maps.Animation.DROP,
            icon: icon
        });
        var infowindow2 = new google.maps.InfoWindow({
            content: "<img src='https://www.buyersuppliers.com/Content/Classimax/images/ProjectImg/logo1.png' style='height:30px;width:30px'/>"
        });
        marker2.addListener("click", () => {
            infowindow2.open(marker2.get("map"), marker2);
        });
        infowindow2.open(map, marker2);

        var marker3 = new google.maps.Marker({
            position: {
                lat: 23.243572,
                lng: 77.414303
            },
            map: map,
            animation: google.maps.Animation.DROP,
            icon: icon
        });
        var infowindow2 = new google.maps.InfoWindow({
            content: "<img src='https://www.buyersuppliers.com/Content/Classimax/images/ProjectImg/logo1.png' style='height:50px;width:50px'/>"
        });
        marker3.addListener("click", () => {
            infowindow2.open(marker3.get("map"), marker3);
        });
        infowindow2.open(map, marker3);

    }

    function GoToFAQ() {
        window.location.href = "/Home/FAQ";
    }

    function GoToShipping() {
        window.location.href = "/Home/Shipping";
    }

    function GoToTermAndCondition() {
        window.location.href = "/Home/TermAndCondition";
    }

    function GoToAntiFraudDisclaimer() {
        window.location.href = "/Home/AntiFraudDisclaimer";
    }


    function GoToAntiFraudDisclaimer() {
        window.location.href = "/Home/AntiFraudDisclaimer";
    }

    function GoToPrivacyPolicy() {
        window.location.href = "/Home/PrivacyPolicy";
    }

    function GoToDisclaimerPolicy() {
        window.location.href = "/Home/DisclaimerPolicy";
    }
</script>

<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBA-500QirFQPbMZVrNSj4YH5NDZX94tIs&callback=initMap"></script>





<?php include('./footer.php');?>