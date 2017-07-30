<?php
require_once("database.php");
class promote
{
public function checkPromote($employee_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM promote WHERE employee_id = '$employee_id' and status='not' " ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data="false";
  }
  else{
  $data="true";
  }
  return $data;
}


public function checkPromotePosition($employee_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM promote a inner join position b on a.position_id=b.position_id WHERE employee_id = '$employee_id' and status='not' " ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data[0][position_name]="No data";
  }
  else{
  $data=$objSelect;
  }
  return $data;
}



public function addPromote($employee_id,$position_id)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  promote(employee_id,position_id,status) VALUES ('$employee_id','$position_id','not')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function checkPositionPromote($position_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT position_promote_id,b.position_id,b.position_name FROM position_promote a inner join position b on a.position_id_out=b.position_id WHERE a.position_id ='$position_id'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data[0][position_name]="No data";
  }
  else{
  $data=$objSelect;
  }
  return $data;
}


public function addPositionPromote($position_id,$position_id_out)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  position_promote(position_id,position_id_out) VALUES ('$position_id','$position_id_out')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}



public function delPositionPromote($position_promote_id)
{
  $clsMyDB = new MyDatabase();
  $strDelete ="DELETE FROM  position_promote where  position_promote_id='$position_promote_id'";
  $objDelete = $clsMyDB->fncDeleteRecord($strDelete);
}

}


 ?>
