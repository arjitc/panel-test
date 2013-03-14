    <link href="http://crowncloud.net/bootstrap.css" rel="stylesheet">
<div class = "well">
<?php

if($_POST['password']) {
 
// Set the password
$password = $_POST['password'];
 
// Get the hash, letting the salt be automatically generated
$hash = crypt($password);
echo "Your password hash : ";
echo $hash;
}
echo"<br><br><form action=passgen.php method=post>";
echo"Enter the password <br> <input type=text placeholder=Password name=password>";
echo"<br><input class=btn-primary type=submit>";
echo"</form>";
 
?>
</div>