<?php
$employee_id = $_SESSION['employee_id'];
$data_list_trainning_course=$obj_trainning->listTrainningCourse($employee_id);
$totaldata=count($data_list_trainning_course);
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
                  <th>course name</th>
                  <th>date</th>
                  <th>cost</th>
              </tr>
          </thead>
          <tbody>
          <?php
          for ($i=0; $i <$totaldata ; $i++) {
            ?>
            <tr>
                <td><?= ($i+1) ?></td>
                <td><?=$data_list_trainning_course[$i]["train_course_name"]?></td>
                <td><?=$data_list_trainning_course[$i]["train_course_day"]?></td>
                <td><div class="number"><?=number_format($data_list_trainning_course[$i]["train_course_cost"])?></div></td>
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
