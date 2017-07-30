<?php
$employee_id = $_SESSION['employee_id'];
$data_list_in_house=$obj_trainning->listInHouse($employee_id);
$totaldata=count($data_list_in_house);
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
                  <th>train name</th>
                  <th>date</th>
              </tr>
          </thead>
          <tbody>
          <?php
          for ($i=0; $i <$totaldata ; $i++) {
            ?>
            <tr>
                <td><?= ($i+1) ?></td>
                <td><?=$data_list_in_house[$i]["in_house_train_name"]?></td>
                <td><?=$data_list_in_house[$i]["in_house_train_day"]?></td>
            </tr>
            <?php

          }
?>

          </tbody>
      </table>

  </div>
   </div>
  <?php
}else{
  echo "no data";
}
   ?>
