<?php
require_once("database.php");
class user
{
public function login($username,$password)
{

  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM account WHERE username='$username' and password='$password' and status='pass'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data="fail";
  }
  else{
  $_SESSION['employee_id']=$objSelect[0]['employee_id'];
  $_SESSION['name']=$objSelect[0]['name'];
  $_SESSION['username']=$objSelect[0]['username'];
  $_SESSION['status']=$objSelect[0]['status'];
  $data="success";
  }
  return $data;
}

public function checkPromote($employee_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM promote WHERE employee_id = '$employee_id' and status='not' " ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  echo $sqlCondition;
  if(!$objSelect)
  {
  $data="false";
  }
  else{
  $data="true";
  }
  return $data;
}

}


 ?>
