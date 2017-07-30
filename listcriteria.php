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
                  <th>Approve</th>
                  <th>Progress</th>
              </tr>
          </thead>
          <tbody>
          <?php
          for ($i=0; $i <$totaldata ; $i++) {
            ?>
            <tr>
                <td><?= ($i+1) ?></td>
                <td><?=$data_criteria_list[$i]["criteria_detail"]?></td>
                <td><span class="label <?=$data_criteria_list[$i]["color"]?>"><?=$data_criteria_list[$i]["status"]?></span></td>
                <td><?=$data_criteria_list[$i]["name"]?></td>
                <td>
                    <div class="progress">
                        <div class="progress-bar <?=$data_criteria_list[$i]["color"]?>" role="progressbar" aria-valuenow="<?=$data_criteria_list[$i]["progress"];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$data_criteria_list[$i]["progress"];?>%"></div>
                    </div>
                </td>
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
