<?php include('views/header/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CrownCloud Dedicated Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 600px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">
                <form method="post" class="form-signin" action="index.php" name="loginform" id="loginform">
		<center><h2 class="form-signin-heading">CrownCloud Dedicated Panel</h2>
                 <input id="login_input_username" class="login_input" type="text" name="user_name" value="<?php echo $login->view_user_name; ?>" />
                <?php //if (empty($login->view_user_name)) { ?>
                <input id="login_input_password_label" class="login_input" type="text" value="Password" />
                <?php //} ?>
                <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" />
		  <br>
                <input class="btn btn-primary"  type="submit"  name="login" value="Submit" />             
                <a class="btn btn-primary" href="index.php?register">Create new Account</a>
<br><br>
<?php

    if ($login->errors) {
        foreach ($login->errors as $error) {
            
    ?>       
   
    <div class="alert alert-error">
        <?php echo $error; ?>
    </div>            
    <?php
    
        }
    }
    
    if ($login->messages) {
        foreach ($login->messages as $message) {
    ?>
    <div class="login_message success">
        <?php echo $message; ?>
    </div>              
    <?php
    
        }
    }

    ?>  </center>           
    </form>
    </div> <!-- /container -->