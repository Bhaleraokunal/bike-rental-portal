
<header>
<div class="default-header" style="background: #1e1e1e; padding: 15px 0; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
  <div class="container">
    <div class="row align-items-center">
      <!-- Logo Section -->
      <div class="col-sm-3 col-md-2">
  <div class="logo" style="text-align: center; padding: 5px;">
    <a href="index.php" style="display: inline-block; position: relative;">
      <img src="assets/images/logo.png" alt="Bike Rental" 
           style="width: 110px; transition: all 0.3s ease-in-out; border-radius: 8px; box-shadow: 0px 4px 8px rgba(255, 255, 255, 0.1);"
           onmouseover="this.style.transform='scale(1.15)'; this.style.boxShadow='0px 6px 12px rgba(255, 204, 0, 0.5)';"
           onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0px 4px 8px rgba(255, 255, 255, 0.1)';">
    </a>
  </div>
</div>


      <!-- Contact Info & Login -->
      <div class="col-sm-9 col-md-10">
        <div class="header_info" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">

          <?php
          $sql = "SELECT EmailId, ContactNo FROM tblcontactusinfo";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $result) {
              $email = $result->EmailId;
              $contactno = $result->ContactNo;
          }
          ?>   

          <!-- Email Widget -->
          <div class="header_widgets" style="display: flex; align-items: center; color: #fff;">
            <div class="circle_icon" style="background: #ffcc00; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
              <i class="fa fa-envelope" aria-hidden="true" style="color: #1e1e1e; font-size: 18px;"></i>
            </div>
            <div style="margin-left: 10px;">
              <p class="uppercase_text" style="margin: 0; font-size: 12px;"></p>
              <a href="mailto:<?php echo htmlentities($email); ?>" 
                 style="color: #ffcc00; text-decoration: none; transition: color 0.3s ease-in-out;" 
                 onmouseover="this.style.color='#fff';" 
                 onmouseout="this.style.color='#ffcc00';">
                <?php echo htmlentities($email); ?>
              </a>
            </div>
          </div>

          <!-- Phone Widget -->
          <div class="header_widgets" style="display: flex; align-items: center; color: #fff;">
            <div class="circle_icon" style="background: #ffcc00; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; border-radius: 50%;">
              <i class="fa fa-phone" aria-hidden="true" style="color: #1e1e1e; font-size: 18px;"></i>
            </div>
            <div style="margin-left: 10px;">
              <p class="uppercase_text" style="margin: 0; font-size: 12px;">:</p>
              <a href="tel:<?php echo htmlentities($contactno); ?>" 
                 style="color: #ffcc00; text-decoration: none; transition: color 0.3s ease-in-out;" 
                 onmouseover="this.style.color='#fff';" 
                 onmouseout="this.style.color='#ffcc00';">
                <?php echo htmlentities($contactno); ?>
              </a>
            </div>
          </div>

          <!-- Login/Register Button -->
          <?php if(strlen($_SESSION['login']) == 0) { ?>
            <div class="login_btn">
              <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal" 
                 style="background: #ffcc00; color: #1e1e1e; padding: 5px 15px; border-radius: 20px; transition: all 0.3s ease-in-out;"
                 onmouseover="this.style.background='#fff'; this.style.color='#ffcc00';"
                 onmouseout="this.style.background='#ffcc00'; this.style.color='#1e1e1e';">
                Login / Register
              </a>
            </div>
          <?php } else { ?>
            <p style="color: #ffcc00; font-size: 14px; font-weight: bold; margin: 0;">
              Welcome To Bike Rental Portal
            </p>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</div>

  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?>
   <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
          <li><a href="my-testimonials.php">My Testimonial</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
            <input type="text" placeholder="Search..." name="searchdata" class="form-control" required="true">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>
          	 
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="bike-listing.php">Bike Listing</a>
          
          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>