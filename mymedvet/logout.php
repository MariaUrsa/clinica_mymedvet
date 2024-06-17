<?php
// Începe o sesiune PHP pentru a gestiona variabilele sesiunii
session_start();

// Include fișierul de configurare care stabilește conexiunea cu baza de date și alte setări necesare
include('include/config.php');

// Se resetează variabila de sesiune 'login'; 
$_SESSION['login']="";

// Se setează fusul orar implicit pentru București
date_default_timezone_set('Europe/Bucharest');

// Se generează data și ora curentă în formatul specificat
$ldate=date( 'd-m-Y h:i:s A', time () );

// Se actualizează înregistrarea de logout în tabela 'userlog' pentru utilizatorul curent
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");

// Se elimină toate variabilele de sesiune
session_unset();
//session_destroy();

// Se setează o variabilă de sesiune pentru mesajul de succes la deconectare
$_SESSION['errmsg']="V-ați deconectat cu succes!";
?>
<script language="javascript">

// Se folosește JavaScript pentru a redirecționa utilizatorul către pagina principală ('../index.php')
document.location="../index.php";
</script>
