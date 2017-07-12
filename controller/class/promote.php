<?php
require_once("database.php");
class promote
{
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
public function addPromote($employee_id,$position)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  promote(employee_id,position,status) VALUES ('$employee_id','$position','not')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

}


 ?>
