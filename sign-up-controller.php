<?php

include('include/connNsession.php');
// includes

$first = $_POST['first'];
$last = $_POST['last'];
$alias = $_POST['alias'];
$pwd = $_POST['pwd'];
$_SESSION['alert'] = '';

// is first name already in use? hmm...

$query_first_name = "SELECT * FROM `users` WHERE `alias` = '$alias'";
echo $query_first_name;

$result_first_name = $conn->query($query_first_name);

// while($row = $result_first_name->fetch_assoc()){
//     print_r($row);
// }

$repeats = mysqli_num_rows($result_first_name) > 0;

if($repeats){
    $_SESSION['alert'] .= '<strong>Username</strong> is already in use! <br>';
    $exit = 'set';
}

// encrypt password

foreach($_POST as $key => $value) {
    if($key == 'singup-submit'){
        continue;
    }
  if (empty($value)){
      $_SESSION['alert'] .= "<b> ".strtoupper($key)." </b> field cannot be empty!<br>";
      $exit = 'set';
  }
}

if(isset($exit)){
    header('location: index.php');
    exit(1);
}

$query = "INSERT INTO `users` (`id`, `first`, `last`, `alias`, `pwd`) 
VALUES (NULL, 
'$first', 
'$last', 
'$alias', '".password_hash($pwd, PASSWORD_DEFAULT)."')";

$result = $conn->query($query);

header('location: index.php');