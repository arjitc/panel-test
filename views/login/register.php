<?php include('views/header/header.php'); ?>

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

    <div class="container">
                <form method="post" class="form-signin" action="index.php" name="loginform" id="loginform">

    <?php

    if ($login->errors) {
        foreach ($login->errors as $error) {
            
    ?>              
    <div class="login_message error">
        <?php echo $error; ?>
    </div>
    <?php
    
        }
    }
    
    if ($login->messages) {
        foreach ($login->messages as $message) {
    ?>
    <div class="login_message success">
       Your account was successfully created.
    </div>              
    <?php
    
        }
    }

    ?>    
    
    <?php if (!$login->registration_successful) { ?>
    
    <form method="post" action="index.php?register" name="registerform" id="registerform">
 					<center><h2 class="form-signin-heading">CrownCloud Dedicated Panel</h2>
                <input id="login_input_username" class="login_input" type="text" name="user_name" value="Username" />
			<br>
                <input id="login_input_email" class="login_input" type="text" name="user_email" value="eMail" />
			<br>
                <input id="login_input_password_new_label" class="login_input" type="text" value="Password" />
                <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" autocomplete="off" />
           		<br>
                <input id="login_input_password_repeat_label" class="login_input" type="text" value="Repeat Password" />
                <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" autocomplete="off" />
			<br>        
                <input type="submit"  class="btn btn-primary" name="register" value="Register" />            
			<br><br>
        <a class="login_link" href="index.php">< Back to Login Page</a>

    </form>
    
    <?php } ?>
    
</div>
    </form>

<?php include('views/footer/footer.php'); ?>