<?php
namespace Dompdf;
require_once '../admin/dompdf/autoload.inc.php';
ob_start();
$con=mysqli_connect("localhost", "root", "", "obcsdb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Death Certificate</title>
<style>
table, th, td {
  border: 1px solid;
}
</style>
</head>
<body>
<h2 align="center">Death Certificate  Details</h2>

	<?php 

$cid=intval($_GET['cid']);
	$ret=mysqli_query($con,"SELECT dthapplication.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Address from  dthapplication join  tbluser on dthapplication.UserID=tbluser.ID where dthapplication.ApplicationID='$cid'");

while ($row=mysqli_fetch_array($ret)) { ?>
<h3>Application / Certificate Number: <?php  echo $row['ApplicationID'];?></h3>
<table  align="center" border="1" width="100%">

<tr>
    <th width="150">Full Name</th>
    <td width="250"><?php  echo $row['FullName'];?></td>
    <th width="150">Gender</th>
    <td><?php  echo $row['Gender'];?></td>
  </tr>
   <tr>
    <th scope>Date of Birth</th>
    <td><?php  echo $row['DateofBirth'];?></td>
    <th scope>Marital Status</th>
    <td><?php  echo $row['MaritalStatus'];?></td>
  </tr>
</table>

  <table  align="center" border="1" width="100%" style="margin-top:3%;">
  <tr>
    <th width="150">Occupation</th>
    <td width="250"><?php  echo $row['Occupation'];?></td>
       <th width="150">Date of Death</th>
    <td><?php  echo $row['DateofDeath'];?></td>

  </tr>
   <tr>
<th scope>Permanent Address</th>
    <td><?php  echo $row['PermanentAdd'];?></td>
    <th scope>Place of Death</th>
    <td><?php  echo $row['PlaceofDeath'];?></td>

  </tr>
   <tr>
        <th scope>Cause of Death</th>
    <td><?php  echo $row['CauseOfDeath'];?></td>
    <th scope>Certifier</th>
    <td><?php  echo $row['Certifier'];?></td>

  </tr>


</table>

<table  align="center" border="1" width="100%" style="margin-top:3%;">
<tr>
	    <th width="150">Certificate Number</th>
    <td><?php  echo $row['ApplicationID'];?></td>
    <th >Apply Date</th>
    <td><?php  echo $row['Dateofapply'];?></td>

  </tr>
   <tr>
    <th width="150">Issued Date</th>
    <td><?php  echo $row['UpdationDate'];?></td>
  </tr>
</table>

<?php } ?>

<p>THIS IS A COMPUTER GENERATED CERTIFICATE. </p>
</body>
</html>
<?php
$html = ob_get_clean();
$dompdf = new DOMPDF();
$dompdf->setPaper('A4', 'landscape');
$dompdf->load_html($html);
$dompdf->render();
//For view
//$dompdf->stream("",array("Attachment" => false));
// for download
$dompdf->stream("Death-Certificate.pdf");
?>