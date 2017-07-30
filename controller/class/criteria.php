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
$sqlCondition = "SELECT c.id,c.position_criteria_id,c.criteria_detail,c.approver_id,c.progress,c.status,c.color, a.name FROM criteria c LEFT JOIN account a ON c.employee_id=a.employee_id WHERE c.employee_id ='$employee_id'";
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


public function addCriteria($employee_id,$criteria_detail_add,$position_criteria_id_add,$status,$color,$approver_id_add)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  criteria(employee_id,position_criteria_id,criteria_detail,approver_id,progress,status,color) VALUES ('$employee_id','$position_criteria_id_add','$criteria_detail_add','$approver_id_add','0','$status','$color')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function addPositionCriteria($position_id,$criteria_detail,$approver_id)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  position_criteria (position_id,criteria_detail,approver_id) VALUES ('$position_id','$criteria_detail','$approver_id')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function delPositionCriteria($position_criteria_id)
{
  $clsMyDB = new MyDatabase();
  $strDelete ="DELETE FROM  position_criteria where  position_criteria_id='$position_criteria_id'";
  $objDelete = $clsMyDB->fncDeleteRecord($strDelete);
}

public function calculateKpi($data_criteria,$data_criteria_all)
{
if ($data_criteria_all==0 || $data_criteria==0) {
$data=0;
}else {
$data=($data_criteria)/$data_criteria_all;
}
return $data;
}


public function getCriteriaDetail($position_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM position_criteria WHERE position_id = '$position_id'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data[0][criteria_detail]="No data";
  }
  else{
  $data=$objSelect;
  }
  return $data;
}

public function calSum()
{
  $employee_id = $_SESSION['employee_id'];
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT sum(progress) as sum_progress FROM criteria WHERE employee_id = '$employee_id'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data[0][sum_progress]=0;
  }
  else{
  $data=$objSelect;
  }
  return $data;
}


public function listCriteriaOne($employee_id)
{

$clsMyDB = new MyDatabase();
$sqlCondition = "SELECT c.id,c.position_criteria_id,c.criteria_detail,c.approver_id,c.progress,c.status,c.color, a.name FROM criteria c LEFT JOIN account a ON c.employee_id=a.employee_id WHERE c.employee_id ='$employee_id'";
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


public function getCriteria($criteria_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM criteria WHERE id = '$criteria_id'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data="false";
  }
  else{
  $data=$objSelect;
  }
  return $data;
}

public function editCriteria($criteria_id,$status,$progress)
{
  $clsMyDB = new MyDatabase();
  $strupdate ="UPDATE  criteria SET progress='$progress',status='$status' where  id='$criteria_id'";
  $objupdate = $clsMyDB->fncUpdateRecord($strupdate);
}

}//class



 ?>
