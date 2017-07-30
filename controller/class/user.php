<?php
require_once("database.php");
//require_once("position.php");
class user
{
public function login($username,$password)
{

  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM account a,position b WHERE a.position_id=b.position_id and username='$username' and password='$password' and status='pass'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  //$ojb_position=new position;
  if(!$objSelect)
  {
  $data="fail";
  }
  else{
  $_SESSION['employee_id']=$objSelect[0]['employee_id'];
  $_SESSION['name']=$objSelect[0]['name'];
  $_SESSION['username']=$objSelect[0]['username'];
  $_SESSION['status']=$objSelect[0]['status'];
  $_SESSION['account_type']=$objSelect[0]['account_type'];
  $_SESSION['position_id']=$objSelect[0]['a.position_id'];
  $_SESSION['position_name']=$objSelect[0]['position_name'];
  //$_SESSION['position_name']=$ojb_position->getPosition($objSelect[0]['position_id']);
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


public function listUser()
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM account order by employee_id ASC" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data="false";
}else{
  $data=$objSelect;
}
return $data;
}


public function getUser($employee_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM account where employee_id='$employee_id'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data="false";
}else{
  $data=$objSelect;
}
return $data;
}

public function addUser($name,$username,$password,$position_id)
{
  $date_login=date("Y-m-d H:i:s");
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  account (name,username,password,status,date_login,position_id,account_type) VALUES ('$name','$username','sha1($password)','pass','$date_login','$position_id','user')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function delUser($employee_id)
{
  $clsMyDB = new MyDatabase();
  $strDelete ="DELETE FROM  account where  employee_id='$employee_id'";
  $objDelete = $clsMyDB->fncDeleteRecord($strDelete);
}

public function editUser($employee_id,$name,$username,$position_id)
{
  $clsMyDB = new MyDatabase();
  $strupdate ="UPDATE  account SET name='$name',username='$username',position_id='$position_id' where  employee_id='$employee_id'";
  $objupdate = $clsMyDB->fncUpdateRecord($strupdate);
}

}//class


 ?>
