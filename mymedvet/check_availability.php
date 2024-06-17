<?php
// fișierul config.php care conține conexiunea la baza de date sau alte configurări 
require_once("include/config.php");

//Verifică dacă variabila $_POST["email"] nu este goală, adică a fost trimisă dintr-un formular
if(!empty($_POST["email"])) {

//Stochează valoarea introdusă în câmpul email din formular în variabila $email.
    $email = $_POST["email"];

    // Verifică dacă există deja un utilizator cu acest email în baza de date
    $result = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
    $count = mysqli_num_rows($result);

    if($count > 0) {
        // Dacă există înregistrări, se afișează un mesaj roșu că emailul există deja
        echo "<span style='color:red'> E-mailul există deja. </span>";
        // Dezactivăm butonul de submit utilizând jQuery
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        // Dacă nu există înregistrări, se afișează un mesaj verde că emailul este disponibil
        echo "<span style='color:green'> E-mail disponibil pentru Înregistrare. </span>";

        // Se activează butonul de submit utilizând jQuery
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}
?>