<?php
session_start();
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
if (!$db_link = mysqli_connect("localhost", "root", "", "jdrozd")) {
    echo 'Błąd podczas próby połączenia z serwerem MySQL...<br>';
    exit;
}
//Tutaj instrukcje wykonujące operacje na bazie danych
$login = $_SESSION['login'];
$password = $_SESSION['password'];

$query = "SELECT id, grupa FROM users WHERE login = '$login' AND password = '$password';";
$queryRes = mysqli_query($db_link, $query);
$results = mysqli_fetch_all($queryRes);

if(isset($results[0][0])){
    if($results[0][1] == "admin" || $results[0][1] == "superadmin"){
        header('Location: edit.php');
        exit();
    }else if($results[0][1] == "user"){
        header('Location: mainSite.php');
        exit();
    }
        
}else{
    echo "Zły login lub haslo <br>
    <a href='index.html'>Spróbuj ponownie</a>";
}

mysqli_close($db_link)

?>