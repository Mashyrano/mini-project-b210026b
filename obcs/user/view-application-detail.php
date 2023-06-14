<?php
session_start();
$_SESSION['BirthRecord'] = null;
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{


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
                                            <li><span class="bread-blod">Application Form</span>
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
                                        <h1>View <span class="table-project-n">Detail of</span> Application</h1>
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

$sql="SELECT tblapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  tblapplication join  tbluser on tblapplication.UserID=tbluser.ID where tblapplication.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);


$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row)
{    $_SESSION['BirthRecord'] = $row->BirthRecordNo;?>
                                <table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 User Details</td></tr>
<tr align="center">
<td colspan="4" style="font-size:20px;color:red">
 Application Number:   <?php  echo $row->ApplicationID;?></td></tr>
    <tr>
    <th scope>First Name</th>
    <td><?php  echo $row->FirstName;?></td>
    <th scope>Last Name</th>
    <td><?php  echo $row->LastName;?></td>
  </tr>
  <tr>
    <th scope>Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
    <th>Address</th>
    <td><?php  echo $row->Address;?></td>
  </tr>
<tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Application Details</td></tr>
</table>

<table style="width:100%" border="1" class="table table-bordered">
 <tr>
    <th rowspan="5">Child</th>

        <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row->ChildFirstNames;?></td> <td><span class='bold'>Last Name:&#160;&#160;</span><?php  echo $row->childLastName;?></td></tr>
        <tr><td colspan="2"><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row->PlaceofBirth;?></td></tr>
        <tr><td colspan="2"><span class='bold'>Date Of Birth:&#160;&#160;</span><?php  echo $row->DateofBirth;?></td></tr>
        <tr><td colspan="2"><span class='bold'>Sex:&#160;&#160;</span><?php  echo $row->Gender;?></td></tr>
  
 </tr>
 <tr>
    <th rowspan="3">Father</th>
    <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row->FatherFirstNames;?></td> <td><span class='bold'>Last Name:&#160;&#160;</span><?php  echo $row->FatherLastName;?></td></tr>

    <tr><td><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row->FatherPob;?></td> <td><span class='bold'>ID Number:&#160;&#160;</span><?php  echo $row->FatherID;?></td></tr>
  </tr>
   <tr>
    <th rowspan="3">Mother</th>
    <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row->MotherFirstNames;?></td> <td><span class='bold'>Last Name:&#160;&#160;</span><?php  echo $row->MotherLastName;?></td></tr>

    <tr><td><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row->MotherPob;?></td> <td><span class='bold'>ID Number:&#160;&#160;</span><?php  echo $row->MotherID;?></td></tr>
  </tr>

  <tr>
    <th rowspan="3">Informant</th>
    <tr><td><span class='bold'>Full name:&#160;&#160;</span><?php  echo $row->InformantName;?></td> <td><span class='bold'>Qualification:&#160;&#160;</span><?php  echo $row->InformantQualification;?></td></tr>

    <tr><td colspan="2"><span class='bold'>Address:&#160;&#160;</span><?php  echo $row->InformantAddress;?></td></tr>
  </tr>
  
  <tr>
    <th rowspan="3"> . </th>
    <tr>
        <td><span class='bold'>Birth Record Number:&#160;&#160;</span><?php  echo $row->BirthRecordNo;?></td>
        <td class="datatable-ct"><a href="view-birth-record-detail.php?viewid=<?php echo htmlentities ($row->ID);?>" class='btn btn-primary'>View Birth Record</a>
                                                    </td>
  </tr>
    <tr>
    <?php if($row->Remark==""){ ?>

                     <td><span class='bold'>Remark:&#160;&#160;</span><?php echo "Your apllication still pending"; ?></td>
<?php } else { ?>                  <td><span class='bold'>Remark:&#160;&#160;</span><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?>
    <?php if($row->Status==""){ ?>

                     <td><span class='bold'>Status:&#160;&#160;</span><?php echo "Pending"; ?></td>
<?php } else { ?>                  <td><span class='bold'>Status:&#160;&#160;</span><?php  echo htmlentities($row->Status);?>
                  </td></tr></tr>
                  <?php } ?>

 
  <?php }}?>
</table>
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
