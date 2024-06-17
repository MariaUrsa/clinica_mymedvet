<?php

// include fișierul de configurare pentru conexiunea la bază de date
include('include/config.php');
if(!empty($_POST["specializationid"])) 
{

//interogare SQL pentru a selecta numele veterinarului (vetdocName) și ID-ul (id) din tabela vetdoc pentru specializarea specificată în $_POST["specializationid"].
 $sql=mysqli_query($con,"select vetdocName, id from vetdoc where specialization='".$_POST['specializationid']."'");?>
 <option selected="selected">Selectează Doc. Veterinar </option>
 <?php

 //Parcurge fiecare rând din rezultatul interogării SQL și afișează opțiuni pentru un element <select> în HTML, utilizând vetdocName pentru eticheta opțiunii și id pentru valoarea opțiunii.
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['vetdocName']); ?></option>
  <?php
}
}

//Verifică dacă variabila $_POST["doctor"] nu este goală. Aceasta ar trebui să fie o valoare trimisă de la client (de exemplu, printr-un formular).
if(!empty($_POST["doctor"])) 
{

//Realizează o interogare SQL pentru a selecta taxa (vetdocFees) din tabela vetdoc pentru doctorul veterinar specificat în $_POST["doctor"].
 $sql=mysqli_query($con,"select vetdocFees from vetdoc where id='".$_POST['doctor']."'");

//Parcurge fiecare rând din rezultatul interogării SQL și afișează o opțiune pentru un element <select> în HTML, utilizând vetdocFees pentru eticheta opțiunii și valoarea opțiunii.
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['vetdocFees']); ?>"><?php echo htmlentities($row['vetdocFees']); ?></option>
  <?php
}
}

?>

