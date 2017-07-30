<?php
require_once("database.php");
class trainning
{

public function countInHouse()
{
  $employee_id = $_SESSION['employee_id'];
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT count(*) as count  FROM in_house_train WHERE employee_id ='$employee_id' ";
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
}


public function listInHouse($employee_id)
{
  $year=date("Y");
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT *  FROM in_house_train WHERE employee_id ='$employee_id' and year(in_house_train_day)='$year'";
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

public function addInHourse($in_house_train_name,$in_house_train_day,$employee_id)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  in_house_train(in_house_train_name,employee_id,in_house_train_day) VALUES ('$in_house_train_name','$employee_id','$in_house_train_day')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function countTrainningCourse()
{
  $employee_id = $_SESSION['employee_id'];
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT count(*) as count  FROM train_course WHERE employee_id ='$employee_id'";
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
}

public function listTrainningCourse($employee_id)
{
  $year=date("Y");
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT *  FROM train_course WHERE employee_id ='$employee_id' and year(train_course_day)='$year'";
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

public function TrainningRemaining()
{
  $employee_id = $_SESSION['employee_id'];
  $year=date("Y");
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT sum(train_course_cost) as cost  FROM train_course WHERE employee_id ='$employee_id' and year(train_course_day)='$year' ";
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  //echo $sqlCondition."</br>";
  //exit();
  if(!$objSelect)
  {
  $data="10000";
  }
  else{
  $data=(10000-$objSelect[0][cost]);
  }
  return $data;
}

public function addTrainningCourse($train_course_name,$employee_id,$train_course_cost,$train_course_day)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  train_course(train_course_name,employee_id,train_course_cost,train_course_day) VALUES ('$train_course_name','$employee_id','$train_course_cost','$train_course_day')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}
}//class





 ?>
