<?php
session_start();
require_once('class/user.php');


$username = $_POST["username"];
$password = SHA1($_POST["password"]);
$user= new user;
$user_login=$user->login($username,$password);
if ($user_login=="success") {
  ?>
  <script type="text/javascript">
    window.location="../promote.php";
  </script>
  <?php
} else {
  ?>
  <script type="text/javascript">
    window.location="../index.php?error=1";
  </script>
  <?php
}
 ?>
