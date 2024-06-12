<?php
session_start();
include('include/config.php');
$_SESSION['dlogin']=="";
date_default_timezone_set('Europe/Bucharest');
$ldate=date( 'd-m-Y h:i:s A', time () );
$did=$_SESSION['id'];
mysqli_query($con,"UPDATE vetdoclog  SET logout = '$ldate' WHERE uid = '$did' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy();
$_SESSION['errmsg']="V-ați deconectat cu succes";
?>
<script language="javascript">
document.location="../../index.php";
</script>
