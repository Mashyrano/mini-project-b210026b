<?php
session_start();

error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{
       if(isset($_POST['submit']))
  {


$BirthRecordNo = $_SESSION['BirthRecord'];
unset($_SESSION['BirthRecord']);

#$BirthRecordNo = $_POST['BirthRecordNo'];


#Maiden

$MaidenSurname=$_POST['MaidenSurname'];
$FirstName=$_POST['FirstName'];
$IDNumber=$_POST['IDNumber'];
$MarriedSurname=$_POST['MarriedSurname'];


#Child
$DateOfBirth=$_POST['DateOfBirth'];
$BirthWeight=$_POST['BirthWeight'];
$Sex=$_POST['Sex'];
$PlaceOfBirth=$_POST['PlaceOfBirth'];

#Issuing Officer
$OfficerFullName=$_POST['OfficerFullName'];
$OfficerDesignation=$_POST['OfficerDesignation'];

#other
$DeliveredByTrained=$_POST['DeliveredByTrained'];




$ret="select DateOfBirth from birth_record where BirthRecordNo=:BirthRecordNo";
 $query= $dbh -> prepare($ret);
$query->bindParam(':BirthRecordNo',$BirthRecordNo,PDO::PARAM_STR);


$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
     if($query -> rowCount() == 0)
{


    $sql="insert into birth_record(BirthRecordNo,MaidenSurname,FirstName,IDNumber,MarriedSurname,DateOfBirth,BirthWeight,Sex,PlaceOfBirth,DeliveredByTrained,OfficerFullName,OfficerDesignation)values(:BirthRecordNo,:MaidenSurname,:FirstName,:IDNumber,:MarriedSurname,:DateOfBirth,:BirthWeight,:Sex,:PlaceOfBirth,:DeliveredByTrained,:OfficerFullName,:OfficerDesignation)";
    $query=$dbh->prepare($sql);

    #Maiden
    #---------------
    $query->bindParam(':MaidenSurname',$MaidenSurname,PDO::PARAM_STR);
    $query->bindParam(':FirstName',$FirstName,PDO::PARAM_STR);
    $query->bindParam(':IDNumber',$IDNumber,PDO::PARAM_STR);
    $query->bindParam(':MarriedSurname',$MarriedSurname,PDO::PARAM_STR);

    #child
    #---------------
    $query->bindParam(':DateOfBirth',$DateOfBirth,PDO::PARAM_STR);
    $query->bindParam(':BirthWeight',$BirthWeight,PDO::PARAM_STR);
    $query->bindParam(':Sex',$Sex,PDO::PARAM_STR);
    $query->bindParam(':PlaceOfBirth',$PlaceOfBirth,PDO::PARAM_STR);


    #issuing officer
    #---------------
    $query->bindParam(':OfficerFullName',$OfficerFullName,PDO::PARAM_STR);
    $query->bindParam(':OfficerDesignation',$OfficerDesignation,PDO::PARAM_STR);

    #other
    #---------------
    $query->bindParam(':DeliveredByTrained',$DeliveredByTrained,PDO::PARAM_STR);
    $query->bindParam(':BirthRecordNo',$BirthRecordNo,PDO::PARAM_STR);

    $query->execute();

    echo '<script>alert("Birth Record Added succesfully")</script>';
    echo "<script>window.location.href ='manage-forms.php'</script>";
}

else
{

echo "<script>alert('Birth Record Number Already Exists');</script>";
  
}}
  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Birth Certificate Form | Online Birth Certificate System</title>
   
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
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
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
                                            <li><span class="bread-blod">Birth Record Form</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- Basic Form Start -->
            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline12-list shadow-reset mg-t-30">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1>Birth Record Form</h1>
                                        <div class="sparkline12-outline-icon">
                                            <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="all-form-element-inner">
                                                    
                                                    <form id="myForm" method="post" onsubmit="return validate()">
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Birth Record Number</label>
                                                                </div>
                                                                <div class="col-lg-9">

                                                                    <input type="number" class="form-control" name="BirthRecordNo" value="" required="true" placeholder="<?php echo htmlentities($_SESSION['BirthRecord']); ?>" disabled/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                                                                    <label class="login2 pull-right pull-right-pro"><span class="basic-ds-n">Child's Sex</span></label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                                                                    <div class="bt-df-checkbox">
                                                                       <p style="text-align: left;"> <input type="radio"  name="Sex" id="Sex" value="Female" checked="true">Female</p>
             
                                                                   <p style="text-align: left;"> <input type="radio" name="Sex" id="Sex" value="Male">Male</p>
             
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Date Of Birth</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="date" class="form-control" name="DateOfBirth" value="" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Birth Weight</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="number" class="form-control" name="BirthWeight" value="" placeholder="In kilograms" required="true" min="0" value="10" step="0.1"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Place of Birth</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="PlaceOfBirth" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Maiden Surname</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="MaidenSurname" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Maiden's First Names</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="FirstName" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Maiden's ID Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="IDNumber" value="" required="true" /></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Maiden's Married Surname</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="MarriedSurname" value="" required="true"/></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Issuing Officer's FullName</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                   <input type="text" class="form-control" required="true" value="" name="OfficerFullName" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Issuing Officer's Designation</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="OfficerDesignation" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">If deliverd at Home ->Delivered By</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <p style="text-align: left;"> <input type="radio"  name="DeliveredByTrained" id="DeliveredByTrained" value="true" checked="true">Trained</p>
             
                                                                   <p style="text-align: left;"> <input type="radio" name="DeliveredByTrained" id="DeliveredByTrained" value="false">Untrained</p>

                                                                   <p style="text-align: left;"> <input type="radio" name="DeliveredByTrained" id="DeliveredByTrained" value="Not">Not Delivered at home</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                                                                       
                                                    
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left">
                                                                            
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Add Details</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Form End-->

        </div>
    </div>
  <?php include_once('includes/footer.php');?>

  
<!-- Form Validation
        ============================================ -->
    <script src="javaScript/formValidation.js"></script>

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
    <!-- modal JS
		============================================ -->
    <script src="js/modal-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html><?php }  ?>