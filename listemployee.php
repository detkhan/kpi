<?php
include("controller/listemployee.php");
 ?>
 <div class="header">
     <h2>EMPLOYEE</h2>
 </div>
 <div class="body">
   <div class="row">
  <div class="col-md-12"><a class="btn btn-primary" href="dashboard.php?page=add_employee" role="button">Add Employee</a></div>
</div>
   <?php
   for ($i=0; $i <sizeof($user_list) ; $i++) {
    ?>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



     <div class="panel panel-default">
       <div class="panel-heading" role="tab" id="headingOne">
         <h4 class="panel-title">
           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"  <?= ($i==0)?'aria-expanded="true" ':' class="collapsed" aria-expanded="false"' ?>  aria-controls="collapse<?= $i ?>">
             <?=  $user_list[$i]['name'] ?>  (<?= $ojb_position->getPosition($user_list[$i][position_id]) ?>)
           </a>
         </h4>
       </div>
       <div id="collapse<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $i ?>">
     <div class="panel-body">
<?php
$check_promote=$promote->checkPromotePosition($user_list[$i][employee_id]);
 ?>
       <!-- List group -->
       <ul class="list-group">
         <li class="list-group-item active">Promote to</li>
         <li class="list-group-item">
           <div class="row">
          <div class="col-md-10">
           <?=  $check_promote[0]['position_name'] ?>
           </div>
           <div class="col-md-2 text-center">
          <?php
          if($check_promote[0][position_name] != "No data"){
           ?>
           <a class="btn btn-info btn-sm" href="controller/edit_promote.php?ppromote_id=<?= $check_promote[0]['promote_id'] ?>" role="button">Edit</a>
           <?php
         }
            ?>
           </div>
           </div>
           </li>
       </ul>
       <!-- List group -->
       <?php
       if($check_promote[0][position_name] != "No data"){
       $data_criteria_list_One=$obj_criteria->listCriteriaOne($user_list[$i][employee_id]);
       if($data_criteria_list_One !="No data"){
        ?>
       <div class="table-responsive">
           <table class="table table-hover dashboard-task-infos">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>Criteria</th>
                       <th>Status</th>
                       <th>Progress</th>
                       <th>Edit</th>
                   </tr>
               </thead>
               <tbody>
               <?php
               for ($ii=0; $ii <sizeof($data_criteria_list_One) ; $ii++) {
                 ?>
                 <tr>
                     <td><?= ($ii+1) ?></td>
                     <td><?=$data_criteria_list_One[$ii]["criteria_detail"]?></td>
                     <td><span class="label <?=$data_criteria_list_One[$ii]["color"]?>"><?=$data_criteria_list_One[$ii]["status"]?></span></td>
                     <td>
                         <div class="progress">
                             <div class="progress-bar <?=$data_criteria_list_One[$ii]["color"]?>" role="progressbar" aria-valuenow="<?=$data_criteria_list_One[$ii]["progress"];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$data_criteria_list_One[$ii]["progress"];?>%"></div>
                         </div>
                     </td>
                     <td>
                       <a class="btn btn-info btn-sm" href="dashboard.php?page=edit_criteria&id=<?= $data_criteria_list_One[$ii]["id"] ?>" role="button">Edit</a>
                      </td>
                 </tr>
                 <?php
}//for2
}//if have promote
                  ?>
               </tbody>
           </table>

       </div>

       <?php
     }
        ?>

     <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success" href="dashboard.php?page=edit_employee&employee_id=<?= $user_list[$i]['employee_id'] ?>" role="button">Edit Employee</a>
    <a class="btn btn-danger" href="controller/delete_employee.php?employee_id=<?= $user_list[$i]['employee_id'] ?>" role="button">Delete Employee</a>
  </div>
  </div>
   </div><!-- panel-body   -->
   </div><!-- collapseOne   -->
   </div><!-- panel panel-default  -->
 <?php
 }//end for
 ?>

   </div><!-- panel-group   -->

 </div><!-- card   -->
