<?php
require_once("class/database.php");
class criteria
{
  public function countCriteria($type)
  {
    if ($type="all") {
    $sql="and status = 'Well Done'";
  }else {
  $sql="";
  }
    $clsMyDB = new MyDatabase();
    $sqlCondition = "SELECT count(*) as count FROM criteria WHERE employee_id = $_SESSION[mysession_employee_id]".$sql;
    $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
    if(!$objSelect)
    {
    $data="nodata";
    }
    else{
    $data=$objSelect[0][count];
    }
    return $data;
  }

}



 ?>
