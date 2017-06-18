<?php

include('include/connNsession.php');
// includes

$name = $_POST['name'];
$password = $_POST['password'];

// decode pwd

$query_selectAll_decodePassword = "SELECT * FROM `users` WHERE alias = '$name'";
$result_decodePassword = $conn->query($query_selectAll_decodePassword);
$row_decodePassword = $result_decodePassword->fetch_assoc();
$encodedpwd = $row_decodePassword['pwd'];
$decodedpwd = password_verify($password, $encodedpwd);
// ^ pierwszy parametr jest haslem ktore wyszukujemy ze WSZYSTKICH hasel, zwraca boolean
// w skrocie: query na userow wszystkich = $query, $result zapytania - wszyscy co matchuja cos co nie moze sie powtarzac, potem robimy z tego cool associative array, dekodujemy i funkcja weryfikacyjna gdzie podajemy input hasla uzytkownika i zdekodowane haslo

if($decodedpwd)
{
$query = "SELECT * FROM `users` WHERE alias = '$name'";
echo $query;
$result = $conn->query($query);

if($row = $result->fetch_assoc())
{
    $_SESSION['logged_as'] = array('username'=>$row['alias']);
} 
} 
else 
{
    $_SESSION['logged_as'] = 'Unauthorized';
}

header('location: index.php');