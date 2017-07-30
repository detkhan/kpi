<?php
require_once("database.php");
class position
{
public function getPosition($position_id)
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT position_name FROM position WHERE position_id = '$position_id'" ;
  $objSelect = $clsMyDB->fncSelectRecord($sqlCondition);
  if(!$objSelect)
  {
  $data="false";
  }
  else{
  $data=$objSelect[0]['position_name'];
  }
  return $data;
}

public function listPosition()
{
  $clsMyDB = new MyDatabase();
  $sqlCondition = "SELECT * FROM position order by position_id ASC" ;
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

  public function listgetPosition($position_id)
  {
    $clsMyDB = new MyDatabase();
    $sqlCondition = "SELECT * FROM position where position_id !='$position_id' order by position_id ASC" ;
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
public function addPosition($position_name)
{
  $clsMyDB = new MyDatabase();
  $strinsert ="INSERT INTO  position (position_name) VALUES ('$position_name')";
  $objInsert = $clsMyDB->fncInsertRecord($strinsert);
}

public function editPosition($position_id,$position_name)
{
  $clsMyDB = new MyDatabase();
  $strupdate ="UPDATE  position SET position_name='$position_name' where  position_id='$position_id'";
  $objupdate = $clsMyDB->fncUpdateRecord($strupdate);
}

public function delPosition($position_id)
{
  $clsMyDB = new MyDatabase();
  $strDelete ="DELETE FROM  position where  position_id='$position_id'";
  $objDelete = $clsMyDB->fncDeleteRecord($strDelete);

}


}


 ?>
