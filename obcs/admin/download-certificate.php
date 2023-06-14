<?php
namespace Dompdf;
session_start();
require_once 'dompdf/autoload.inc.php';
ob_start();
$userid = $_SESSION['obcsaid'];
$con=mysqli_connect("localhost", "root", "", "obcsdb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}


?>
<!DOCTYPE html>
<html>
<head>
   
    <title>Birth Certificate</title>
    <style type="text/css">
        .bold {font-weight: bold;}
        .bold1 {font-weight: bold; font-size: 1.5em;}
        table {
            border-collapse: collapse;
           
        }
        tr {
            border-collapse: collapse;
        }
        tr > th {
            padding: 0; margin: 0;
        }
        tr > tr {
            margin: 2px; padding: 5px;
        }
        td, th {
            padding: 5px;

        }
        
  </style>

</head>

<body>
<h2 align="center">Birth Certificate  Details</h2>

	<?php 

$cid=intval($_GET['cid']);
	$ret=mysqli_query($con,"SELECT * from  tblapplication where ApplicationID='$cid'");

while ($row=mysqli_fetch_array($ret)) { ?>
<h3>Application / Certificate Number: <?php  echo $row['ApplicationID'];?></h3>
<table style="width:100%" border="1" class="table table-bordered">
 <tr>
    <th rowspan="5">Child</th>

        <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row['ChildFirstNames'];?></td> <td><span class='bold'>Last Name:&#160;&#160;</span><?php  echo $row['childLastName'];?></td></tr>
        <tr><td colspan="2"><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row['PlaceofBirth'];?></td></tr>
        <tr><td colspan="2"><span class='bold'>Date Of Birth:&#160;&#160;</span><?php  echo $row['DateofBirth'];?></td></tr>
        <tr><td colspan="2"><span class='bold'>Sex:&#160;&#160;</span><?php  echo $row['Gender'];?></td></tr>
  
 </tr>
 <tr>
    <th rowspan="3">Father</th>
    <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row['FatherFirstNames'];?></td> <td><span class='bold'>Last Name:&#160;&#160;</span><?php  echo $row['FatherLastName'];?></td></tr>

    <tr><td><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row['FatherPob'];?></td> <td><span class='bold'>ID Number:&#160;&#160;</span><?php  echo $row['FatherID'];?></td></tr>
  </tr>
   <tr>
    <th rowspan="3">Mother</th>
    <tr><td><span class='bold'>First Names:&#160;&#160;</span><?php  echo $row['MotherFirstNames'];?></td> <td><span class='bold'>Last Name:&#160;&#160;</span><?php  echo $row['MotherLastName'];?></td></tr>

    <tr><td><span class='bold'>Place Of Birth:&#160;&#160;</span><?php  echo $row['MotherPob'];?></td> <td><span class='bold'>ID Number:&#160;&#160;</span><?php  echo $row['MotherID'];?></td></tr>
  </tr>

  <tr>
    <th rowspan="3">Informant</th>
    <tr><td><span class='bold'>Full name:&#160;&#160;</span><?php  echo $row['InformantName'];?></td> <td><span class='bold'>Qualification:&#160;&#160;</span><?php  echo $row['InformantQualification'];?></td></tr>

    <tr><td colspan="2"><span class='bold'>Address:&#160;&#160;</span><?php  echo $row['InformantAddress'];?></td></tr>
  </tr>
  
  <tr>
    <th rowspan="3"> . </th>
    <tr>
        <td colspan="2"><span class='bold'>Birth Record Number:&#160;&#160;</span><?php  echo $row['BirthRecordNo'];?></td>        
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

<?php 
    $query= "Select * from tbladmin where ID='$userid'";
    
    $results=mysqli_query($con,$query);
    if(!$results) print_r($con->error);
    $row=$results->fetch_assoc();
    $certifier = $row['AdminName'];

    ?> <p>I <span class='bold1'>  <?php echo htmlentities($certifier) ?></span> certify that the above is a true copy of an entry of the above particulars in the register of births kept</p>
    

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
$dompdf->stream("Birth-Certificate.pdf");
?>