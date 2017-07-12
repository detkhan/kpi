<?php
$totaldata=count($data_criteria_list);
if($totaldata>0){
 ?>
 <div class="header">
     <h2>UPGRADE YOUR LEVEL</h2>
 </div>
 <div class="body">


  <div class="table-responsive">
      <table class="table table-hover dashboard-task-infos">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Criteria</th>
                  <th>Status</th>
                  <th>Approver</th>
                  <th>Progress</th>
              </tr>
          </thead>
          <tbody>
          <?php
          for ($i=0; $i <$totaldata ; $i++) {
            ?>
            <tr>
                <td><?= ($i+1) ?></td>
                <td><?=$data_criteria_list[$i]["criteria"]?></td>
                <td><span class="label <?=$data_criteria_list[$i]["color"]?>"><?=$data_criteria_list[$i]["status"]?></span></td>
                <td><?=$data_criteria_list[$i]["approver"]?><?=$data_criteria_list[$i]["name"]?></td>
                <td>
                    <div class="progress">
                        <div class="progress-bar <?=$data_criteria_list[$i]["color"]?>" role="progressbar" aria-valuenow="<?=$data_criteria_list[$i]["progress"];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$data_criteria_list[$i]["progress"];?>%"></div>
                    </div>
                </td>
            </tr>
            <?php

          }
          /*
          $sql = "SELECT c.id,c.criteria,c.approver_id,c.progress,c.status,c.color, a.name FROM criteria c LEFT JOIN account a ON c.employee_id=a.employee_id WHERE c.employee_id = $_SESSION[mysession_employee_id]";
          $query = mysql_query($sql) or die ("ไม่สามารถ Query ข้อมูลได้ 101");
          $i=1;
          WHILE($row = mysql_fetch_array($query)){ ?>
              <tr>
                  <td><?=$i?></td>
                  <td><?=$row["criteria"]?></td>
                  <td><span class="label <?=$row["color"]?>"><?=$row["status"]?></span></td>
                  <td><?=$row["approver"]?><?=$row["name"]?></td>
                  <td>
                      <div class="progress">
                          <div class="progress-bar <?=$row["color"]?>" role="progressbar" aria-valuenow="<?=$row["progress"];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$row["progress"];?>%"></div>
                      </div>
                  </td>
              </tr>
          <?php $i++;} */?>

          </tbody>
      </table>

  </div>
   </div>
  <?php
}else{
  echo "no data";
}
   ?>
