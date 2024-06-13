<?php 
require_once("include/config.php");
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	
		$result =mysqli_query($con,"SELECT vetdocEmail FROM vetdoc WHERE vetdocEmail='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> E-mailul există deja.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> E-mail este disponibil pentru înregistrare. </span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
