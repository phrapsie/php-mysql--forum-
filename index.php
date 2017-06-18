<?php
    include('include/connNsession.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The ultimate website &copy; DF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">

    <style>

@media screen and (min-width: 768px){
    .befixed-sm {
        position: fixed;
        width: 35%;
        min-width: 330px;
        max-width: 550px;
        top: 50%;
        transform: translateY(-50%);
    }
    .next-to-fixed {
        margin-left: 50%;
        width: 40%;
        padding-left: 20px;
        border-top-width: 0px !important;
        border-left: 2px solid #999 !important;
        padding-top: 0px !important;
    }
}

.next-to-fixed {
    border-radius: 0px;
    background: transparent;
    border-width: 0px;
    border-top: 2px solid #999;
    padding-top: 15px;
}

.post {
    background: white;
    margin: 10px 0;
    border: 1px solid rgba(0,0,0,0.4);
    border-radius: 5px;
    padding: 15px;
    padding-bottom: 0px;
    font-size: 1.4rem;
    word-break: break-all;
}

.post footer {
    font-size: 0.9rem;
}

.post footer .left {
    width: 50%;
    float: left;
}

.post footer .right{
    width: 50%;
    float: left;
    text-align: right;
}

}
 body {
        height: 200vh;
    }
        html,
        body {
            background: #eee;
            color: #333;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

            header {
                background: #333;
                color: white;
                box-shadow: 0 5px 12px -2px rgba(0,0,0, .7);
            }

        form.login-form {
            width: auto;
            display: table;
        }

        button {
            color: white;
        }
        .logged > * {
                margin: 0 1em;
        }
        input {transition: .4s !important;}
        input:focus {
            box-shadow: 0 0 5px #d9534f;
            color: #d9534f !important;
        }
        textarea:hover, 
input:hover, 
textarea:active, 
input:active, 
textarea:focus, 
input:focus,
button:focus,
button:active,
button:hover,
label:focus,
.btn:active,
.btn.active
{
    border-color: rgba(200,100,100, 1) !important;
}
    </style>

</head>

<body>

    <header class='p-3'>
        <?php
        // if logged in acion log out
        if ( isset($_SESSION['logged_as']) )
        {
            if($_SESSION['logged_as'] == 'Unauthorized')
            {
                $showregisterform = 'set';
                include('include/login-form.php');
                echo "<span class='mt-1' style='display:inline-block; position: relative; left: 100%; transform: translate(-100%);'> Wrong password/username </span>";
            } else {
                echo "<div class='logged d-flex align-items-center justify-content-end'>Hello ".$_SESSION['logged_as']['username'].", how is it going?
                <form action='log-out.php' method='post'>
                    <button type='submit' class='btn btn-danger'>Log out</button></div>
                </form>";
            }
        } else {
            include('include/login-form.php');
        }
        ?>
    </header>

<div class="container">

<div class="row">
    
</div>

</div>

<?php

if ( !isset($_SESSION['logged_as']) || isset($showregisterform) )
{

include('include/sign-up-form.php');

        if(!empty($_SESSION['alert']) && isset($_SESSION['alert']))
        {

           echo "<div class='container'><div class='alert alert-danger my-4' role='alert'>"
                .$_SESSION['alert']. "</div></div>";
            
        }

} else if (!($_SESSION['logged_as'] == 'Unauthorized')) {

include('include/post-add-form.php');

}

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
</body>

</html>