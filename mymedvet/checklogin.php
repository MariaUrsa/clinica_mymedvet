<?php

//Funcția PHP check_login() are rolul de a verifica dacă utilizatorul este autentificat
function check_login()
{

//Verifică dacă lungimea (numărul de caractere) a valorii din $_SESSION['login'] este zero. Acest lucru indică faptul că utilizatorul nu este autentificat.
if(strlen($_SESSION['login'])==0)
	{	

//Stochează numele gazdei (numele domeniului) în care rulează scriptul PHP.
		$host = $_SERVER['HTTP_HOST'];

//Stochează calea directorului în care se află scriptul curent, eliminând orice caractere de slash la sfârșitul acesteia.
//specifică locația către care utilizatorul va fi redirecționat în cazul în care nu este autentificat.
//Folosește funcția header() pentru a redirecționa utilizatorul către pagina admin.php folosind locația completă calculată din variabilele $host, $uri, și $extra.
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="../admin.php";		
		$_SESSION["login"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>