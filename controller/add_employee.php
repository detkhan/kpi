<?php
session_start();
include("class/user.php");
$name=$_POST["name"];
$username=$_POST["username"];
$password=$_POST["password"];
$confirm_password=$_POST["confirm_password"];
$position_id=$_POST["position_id"];

if($name ==''|| $username ==''|| $password  =='' || $confirm_password =='' ){
$text=urlencode('<h1 class="text-center"><span class="label label-danger">Fill Data</span><h1>');

?>
<script type="text/javascript">
  window.location="../dashboard.php?page=add_employee&text=<?= $text ?>";
</script>
<?php
}else if($password!=$confirm_password){
  $text=urlencode('<h1 class="text-center"><span class="label label-danger">password not match confirm password</span><h1>');
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=add_employee&text=<?= $text ?>";
  </script>
<?php
}else {
  $user= new user;
  $add_user=$user->addUser($name,$username,$password,$position_id);
    ?>
    <script type="text/javascript">
      window.location="../dashboard.php?page=listemployee";
    </script>
<?php
}
 ?>
