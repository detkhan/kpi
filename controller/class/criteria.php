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

}



 ?>
