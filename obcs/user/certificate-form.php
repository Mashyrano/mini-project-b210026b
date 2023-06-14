<?php
session_start();
$_SESSION['BirthRecord'] = null;
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid']==0)) {
  header('location:logout.php');
  } else{
       if(isset($_POST['submit']))
  {


$uid=$_SESSION['obcsuid'];

#child

$dob=$_POST['dob'];
$gender=$_POST['gender'];
$ChildFirstNames=$_POST['ChildFirstNames'];
$childLastName=$_POST['childLastName'];
$pob=$_POST['pob'];

#father
$FatherFirstNames=$_POST['FatherFirstNames'];
$FatherLastName=$_POST['FatherLastName'];
$FatherPob=$_POST['FatherPob'];
$FatherID=$_POST['FatherID'];

#mother
$MotherFirstNames=$_POST['MotherFirstNames'];
$MotherLastName=$_POST['MotherLastName'];
$MotherPob=$_POST['MotherPob'];
$MotherID=$_POST['MotherID'];

#informant
$InformantFullname=$_POST['InformantFullname'];
$InformantQualification=$_POST['InformantQualification'];
$InformantAddress=$_POST['InformantAddress'];

#other
$appnumber=mt_rand(100000000, 999999999);
$BirthRecordNo = $_POST['BirthRecordNo'];


$ret="select * from tblapplication where BirthRecordNo=:BirthRecordNo";
 $query= $dbh -> prepare($ret);
$query->bindParam(':BirthRecordNo',$BirthRecordNo,PDO::PARAM_STR);

$query-> execute();
     $results = $query -> fetchAll(PDO::FETCH_OBJ);
     if($query -> rowCount() == 0)
{


    $sql="insert into tblapplication(UserID,ApplicationID,DateofBirth,Gender,ChildFirstNames,childLastName,PlaceofBirth,FatherFirstNames,FatherLastName,FatherPob,FatherID,MotherFirstNames,MotherLastName,MotherID,MotherPob,InformantName,InformantQualification,InformantAddress,BirthRecordNo)values(:uid,:appnumber,:dob,:gender,:ChildFirstNames,:childLastName,:pob,:FatherFirstNames,:FatherLastName,:FatherPob,:FatherID,:MotherFirstNames,:MotherLastName,:MotherID,:MotherPob,:InformantFullname,:InformantQualification,:InformantAddress,:BirthRecordNo)";
    $query=$dbh->prepare($sql);

    #other
    #---------------
    $query->bindParam(':uid',$uid,PDO::PARAM_STR);
    $query->bindParam(':appnumber',$appnumber,PDO::PARAM_STR);
    $query->bindParam(':BirthRecordNo',$BirthRecordNo,PDO::PARAM_STR);

    #child
    #---------------
    $query->bindParam(':dob',$dob,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':pob',$pob,PDO::PARAM_STR);
    $query->bindParam(':ChildFirstNames',$ChildFirstNames,PDO::PARAM_STR);
    $query->bindParam(':childLastName',$childLastName,PDO::PARAM_STR);

    #Father
    #---------------
    $query->bindParam(':FatherFirstNames',$FatherFirstNames,PDO::PARAM_STR);
    $query->bindParam(':FatherLastName',$FatherLastName,PDO::PARAM_STR);
    $query->bindParam(':FatherPob',$FatherPob,PDO::PARAM_STR);
    $query->bindParam(':FatherID',$FatherID,PDO::PARAM_STR);

    #Mother
    #---------------
    $query->bindParam(':MotherFirstNames',$MotherFirstNames,PDO::PARAM_STR);
    $query->bindParam(':MotherLastName',$MotherLastName,PDO::PARAM_STR);
    $query->bindParam(':MotherPob',$MotherPob,PDO::PARAM_STR);
    $query->bindParam(':MotherID',$MotherID,PDO::PARAM_STR);

    #informant
    #---------------
    $query->bindParam(':InformantFullname',$InformantFullname,PDO::PARAM_STR);
    $query->bindParam(':InformantQualification',$InformantQualification,PDO::PARAM_STR);
    $query->bindParam(':InformantAddress',$InformantAddress,PDO::PARAM_STR);


    $query->execute();


   $LastInsertId=$dbh->lastInsertId();
   
   if ($LastInsertId>0) {
     $_SESSION['BirthRecord'] =  $BirthRecordNo;
    echo '<script>alert("Birth Certificate applied succesfully")</script>';
    echo "<script>window.location.href ='birth-record-forms.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
else
{

echo "<script>alert('Birth Record Number already exist. Please try again');</script>";
  
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
                                            <li><span class="bread-blod">Birth Registration Form</span>
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
                                        <h1>Application Form</h1>
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
                                                                    <label class="login2 pull-right pull-right-pro">Date of Birth</label>
                                                                </div>
                                                                <div class="col-lg-9">

                                                                    <input type="date" class="form-control" name="dob" value="" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                                                                    <label class="login2 pull-right pull-right-pro"><span class="basic-ds-n">Gender</span></label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                                                                    <div class="bt-df-checkbox">
                                                                       <p style="text-align: left;"> <input type="radio"  name="gender" id="gender" value="Female" checked="true">Female</p>
             
                                                                   <p style="text-align: left;"> <input type="radio" name="gender" id="gender" value="Male">Male</p>
             
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">First Names</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="ChildFirstNames" value="" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Last Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="childLastName" value="" required="true" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Place of Birth</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="pob" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Father's First Names</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="FatherFirstNames" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Father's Last Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" value="" name="FatherLastName" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Father's Place of birth</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="FatherPob" value="" required="true" /></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Father's ID Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="FatherID" value="" required="true"/></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Mother's First Names</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                   <input type="text" class="form-control" required="true" value="" name="MotherFirstNames" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Mother's Last Name</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="MotherLastName" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Mother's ID Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="MotherID" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Mother's Place of  Birth</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="MotherPob" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Informant's FullName</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="InformantFullname" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Informant's Qualification</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="InformantQualification" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Informant's Address</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="InformantAddress" value="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <label class="login2 pull-right pull-right-pro">Birth Record Number</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" required="true" name="BirthRecordNo" value="" />
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