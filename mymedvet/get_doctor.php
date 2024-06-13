<?php
include('include/config.php');
if(!empty($_POST["specializationid"])) 
{

 $sql=mysqli_query($con,"select vetdocName, id from vetdoc where specialization='".$_POST['specializationid']."'");?>
 <option selected="selected">Selectează Doc. Veterinar </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['vetdocName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($con,"select vetdocFees from vetdoc where id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['vetdocFees']); ?>"><?php echo htmlentities($row['vetdocFees']); ?></option>
  <?php
}
}

?>

