<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Bike Rental Portal</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.bikeousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content">
            <h1>&nbsp;</h1>
            <p>&nbsp; </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 


<!-- Resent Cat-->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span>BikeForYou</span></h2>
      <p>Rent a Bike & Ride Freely!

Explore hassle-free bike rentals with top-quality service and affordable pricing. Whether for travel or daily commutes, we’ve got the perfect ride for you. Book now and enjoy the journey! 🚴‍♂️✨</p>
    </div>
    <div class="row"> 
      
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewbike" role="tab" data-toggle="tab">New bike</a></li>
        </ul>
      </div>
      

<!-- Recently Listed New Bikes -->
<section>
  <div class="container">
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="resentnewbike">
        <div class="row">
          <?php 
          $sql = "SELECT tblvehicles.VehiclesTitle, tblbrands.BrandName, tblvehicles.PricePerDay, 
                  tblvehicles.FuelType, tblvehicles.ModelYear, tblvehicles.id, 
                  tblvehicles.SeatingCapacity, tblvehicles.VehiclesOverview, tblvehicles.Vimage1 
                  FROM tblvehicles 
                  JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand 
                  LIMIT 9";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          
          if ($query->rowCount() > 0) {
              foreach ($results as $result) {  
          ?>  

          <div class="col-list-3"> <!-- Ensuring compatibility with your existing layout -->
            <div class="recent-bike-list" style="
                background-color: #1e1e1e; 
                color: #fff; 
                padding: 15px; 
                border-radius: 10px; 
                margin-bottom: 20px; 
                transition: all 0.3s ease-in-out; 
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            " 
            onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0px 6px 15px rgba(255, 255, 0, 0.6)';" 
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0px 4px 10px rgba(0, 0, 0, 0.5)';">
              
              <div class="bike-info-box">
                <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                  <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" 
                       class="img-responsive" alt="image" 
                       style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px; transition: all 0.3s ease-in-out;"
                       onmouseover="this.style.transform='scale(1.08)';" 
                       onmouseout="this.style.transform='scale(1)';">
                </a>
                <ul style="list-style: none; padding: 0; margin-top: 10px; display: flex; justify-content: space-between;">
                  <li><i class="fa fa-motorcycle" aria-hidden="true"></i> <?php echo htmlentities($result->FuelType); ?></li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlentities($result->ModelYear); ?> Model</li>
                </ul>
              </div>

              <div class="bike-title-m" style="margin-top: 10px;">
                <h6>
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" 
                     style="color: #fff; text-decoration: none; transition: color 0.3s ease-in-out;"
                     onmouseover="this.style.color='#ffcc00';" 
                     onmouseout="this.style.color='#fff';">
                    <?php echo htmlentities($result->VehiclesTitle); ?>
                  </a>
                </h6>
                <span class="price" style="color: #ffcc00; font-weight: bold;">₹<?php echo htmlentities($result->PricePerDay); ?> /Day</span> 
              </div>

              <div class="inventory_info_m" style="margin-top: 10px;">
                <p style="color: #ccc;"><?php echo substr($result->VehiclesOverview, 0, 70); ?>...</p>
              </div>

            </div>
          </div>

          <?php 
              } // End foreach
          } // End if 
          ?>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- /Resently Listed New Bikes --> 

    </div>
  </div>
<!-- /Resent Cat --> 

<!-- Fun Facts-->
<section class="fun-facts-section">
  <div class="container div_zindex">
    <div class="row">
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-calendar" aria-hidden="true"></i>25+</h2>
            <p>Years In Business</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-motorcycle" aria-hidden="true"></i>700+</h2>
            <p>New Bike For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-motorcycle" aria-hidden="true"></i>1000+</h2>
            <p>Used Bike For Sale</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
          <div class="cell">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>400+</h2>
            <p>Satisfied Customers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Fun Facts--> 


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2> <span></span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid limit 4";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        
        <?php }} ?>
        
       
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.bikeousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/bikeforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>