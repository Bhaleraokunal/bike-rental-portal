<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from tblvehicles  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Vehicle  record deleted successfully";
}


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Bike Rental Portal |Admin Manage Vehicles   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
<?php 
include('includes/header.php');
?>

<div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <h2 class="page-title">Manage Vehicles</h2>

                    <!-- Notification Messages -->
                    <?php if ($error) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>ERROR: </strong> <?php echo htmlentities($error); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } elseif ($msg) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>SUCCESS: </strong> <?php echo htmlentities($msg); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                    <!-- Table Panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-car"></i> Vehicle Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="vehicleTable" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Vehicle Title</th>
                                            <th>Brand</th>
                                            <th>Price Per Day (INR)</th>
                                            <th>Fuel Type</th>
                                            <th>Model Year</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $sql = "SELECT tblvehicles.VehiclesTitle, tblbrands.BrandName, tblvehicles.PricePerDay, tblvehicles.FuelType, tblvehicles.ModelYear, tblvehicles.id 
                                                FROM tblvehicles 
                                                JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;

                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {
                                        ?>  
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($result->VehiclesTitle); ?></td>
                                            <td><?php echo htmlentities($result->BrandName); ?></td>
                                            <td>₹<?php echo number_format($result->PricePerDay, 2); ?></td>
                                            <td><?php echo htmlentities($result->FuelType); ?></td>
                                            <td><?php echo htmlentities($result->ModelYear); ?></td>
                                            <td>
                                                <a href="edit-vehicle.php?id=<?php echo $result->id; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Vehicle">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="manage-vehicles.php?del=<?php echo $result->id; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete Vehicle" onclick="return confirm('Are you sure you want to delete this vehicle?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                            $cnt++;
                                            }
                                        } 
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- End Table Panel -->

                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS Enhancements -->
<script>
    $(document).ready(function() {
        $('#vehicleTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });

        // Tooltip initialization
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>


	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
