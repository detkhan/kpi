<?php
require_once("database.php");
class criteria
{
  public function countCriteria($type)
  {
    $employee_id = $_SESSION['employee_id'];
    if ($type=="all") {
    $sql="and status = 'Well Done'";
  }else {
  $sql="";
  }
    $clsMyDB = new MyDatabase();
    $sqlCondition = "SELECT count(*) as count FROM criteria WHERE employee_id ='$employee_id'".$sql;
    $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
    //echo $sqlCondition."</br>";
    //exit();
    if(!$objSelect)
    {
    $data="0";
    }
    else{
    $data=$objSelect[0][count];
    }
    return $data;
  }//function countCriteria($type)

  public function listCriteria()
  {
$employee_id = $_SESSION['employee_id'];
$clsMyDB = new MyDatabase();
$sqlCondition = "SELECT c.id,c.criteria,c.approver_id,c.progress,c.status,c.color, a.name FROM criteria c LEFT JOIN account a ON c.employee_id=a.employee_id WHERE c.employee_id ='$employee_id'";
$objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
//echo $sqlCondition."</br>";
//exit();
if(!$objSelect)
{
$data="No data";
}
else{
$data=$objSelect;
}
return $data;
  }


public function addCriteria($criteria,$status,$color,$employee_id)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  criteria(employee_id,criteria,approver_id,progress,status,color) VALUES ('$employee_id','$criteria','1','0','$status','$color')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function calculateKpi($data_criteria,$data_criteria_all)
{
if ($data_criteria_all==0) {
$data=0;
}else {
$data=$data_criteria/$data_criteria_all;
}
return $data;
}

}//class



 ?>
