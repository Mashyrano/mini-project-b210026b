<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{

$BirthRecordNo = $_SESSION['BirthRecord'];
#unset($_SESSION['BirthRecord']);

  ?> 
<!doctype html>
<html class="no-js" lang="en">

<head>
  
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
.bold {font-weight: bold;}
</style>

    <title>Manage Application Form | Online Certificate System</title>
  
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">
  
    <div class="wrapper-pro">
      <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
       
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Birth record </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->

            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1><span class="table-project-n">Detail of</span> Birth Record</h1>
                                        <div class="sparkline13-outline-icon">
                                            <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                       
                                         <?php
                               $vid=$_GET['viewid'];

$sql="SELECT * from  birth_record  where BirthRecordNo=:BirthRecordNo";
$query = $dbh -> prepare($sql);
$query-> bindParam(':BirthRecordNo', $BirthRecordNo, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

<table style="width:100%" border="1" class="table table-bordered">
 <tr>
    <th rowspan="5">Child</th>

       
        <tr><td colspan="2"><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row->PlaceOfBirth;?></td></tr>
        <tr><td colspan="2"><span class='bold'>Date Of Birth:&#160;&#160;</span><?php  echo $row->DateOfBirth;?></td></tr>
        <tr><td colspan="2"><span class='bold'>BirthWeight:&#160;&#160;</span><?php  echo $row->BirthWeight;?></td></tr>
        <tr><td colspan="2"><span class='bold'>Sex:&#160;&#160;</span><?php  echo $row->Sex;?></td></tr>
  
 </tr>
   <tr>
    <th rowspan="3">Maiden</th>
    <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row->FirstName;?></td> <td><span class='bold'>Maiden Surname:&#160;&#160;</span><?php  echo $row->MaidenSurname;?></td></tr>

    <tr><td><span class='bold'>Married Surname:&#160;&#160;</span><?php  echo $row->MarriedSurname;?></td> <td><span class='bold'>ID Number:&#160;&#160;</span><?php  echo $row->IDNumber;?></td></tr>
  </tr>

  <tr>
    <th rowspan="2">Officer</th>
    <tr><td><span class='bold'>Full Name:&#160;&#160;</span><?php  echo $row->OfficerFullName;?></td> <td><span class='bold'>Designation:&#160;&#160;</span><?php  echo $row->OfficerDesignation;?></td></tr>

   
  </tr>
  
  <tr>
    <th rowspan="3"> . </th>
    <tr>
        <td colspan="2"><span class='bold'>Birth Record Number:&#160;&#160;</span><?php  echo $row->BirthRecordNo;?></td>

  </tr>
  <tr>
        <?php if($row->DeliveredByTrained=="true"){ ?>
             <td colspan="2"><span class='bold'>If delivered at Home:&#160;&#160; Delivered by &#160;</span> <?php echo "Trained"; ?></td>

        <?php } elseif($row->DeliveredByTrained=="false"){ ?>
            <td colspan="2"><span class='bold'>If delivered at Home:&#160;&#160; Delivered by &#160;</span> <?php echo "UnTrained"; ?></td>

        <?php } else { ?> <td colspan="2"><span class='bold'>If delivered at Home:&#160;&#160; Delivered by &#160;</span> <?php echo "Not Delivered at Home"; ?></td>
              
  </tr>
  
 
  <?php }}?>
 <?php }

else {
    echo '<script>alert("BirthRecord Not Found")</script>';
    }?>

</table>
<!-- ########################################-->
      <?php 
      $sql= "Select * from tblapplication where BirthRecordNo=:BirthRecordNo";
    $query=$dbh->prepare($sql);
    $query->bindParam(':BirthRecordNo',$BirthRecordNo,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
    foreach($results as $row){?>

    <a href="view-application-detail.php?viewid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary">Go back</a><td> <?php
    }}?>
<!--##########################-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
        </div>
    </div>
  <?php include_once('includes/footer.php');?>



    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>


</body>

</html><?php }  ?>
