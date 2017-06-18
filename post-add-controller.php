<?php

include('include/connNsession.php');

$author = $_SESSION['logged_as']['username'];
$title = $_GET['title'];
$content = $_GET['post-content'];
$date = $_GET['date'];

$query = "INSERT INTO `comments` (`cid`, `author`, `date`, `content`, `title`) VALUES (NULL, 
'$author', 
'$date', 
'$content', 
'$title')";

$conn->query($query);

header('location: index.php');