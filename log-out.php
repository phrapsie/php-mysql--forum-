<?php

include('include/connNsession.php');
// includes

session_destroy();

header('location: index.php');