<?php
include("controller/listposition.php");
 ?>
 <div class="header">
     <h2>Position</h2>
 </div>
 <div class="body">
   <div class="row">
  <div class="col-md-12"><a class="btn btn-primary" href="dashboard.php?page=add_position" role="button">Add Position</a></div>
</div>
   <?php
   for ($i=0; $i <sizeof($position_list) ; $i++) {
    ?>
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



     <div class="panel panel-default">
       <div class="panel-heading" role="tab" id="headingOne">
         <h4 class="panel-title">
           <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"  <?= ($i==0)?'aria-expanded="true" ':' class="collapsed" aria-expanded="false"' ?>  aria-controls="collapse<?= $i ?>">
             <?=  $position_list[$i]['position_name'] ?>
           </a>
         </h4>
       </div>
       <div id="collapse<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $i ?>">
     <div class="panel-body">

       <?php
       $check_criteria=$obj_criteria->getCriteriaDetail($position_list[$i]['position_id']);

        ?>
       <!-- List group -->
       <ul class="list-group">
         <li class="list-group-item active">Criteria <a class="btn btn-warning" href="dashboard.php?page=add_position_criteria&position_id=<?= $position_list[$i][position_id]    ?>" role="button">Add Criteria</a></li>
         <?php
         for ($iii=0; $iii <sizeof($check_criteria) ; $iii++) {
          ?>
         <li class="list-group-item">
           <div class="row">
          <div class="col-md-10">
           <?=  $check_criteria[$iii]['criteria_detail'] ?>
           </div>
           <div class="col-md-2 text-center">
             <?php
             if($check_criteria[$iii][criteria_detail]!="No data"){
              ?>
           <a class="btn btn-danger" href="controller/delete_position_criteria.php?position_criteria_id=<?= $check_criteria[$iii][position_criteria_id] ?>" role="button">Delete</a>
           <?php
            }
            ?>
           </div>
           </div>
           </li>
         <?php
       }//for2
          ?>
       </ul>
       <!-- List group -->

     <?php
     $check_position=$promote->checkPositionPromote($position_list[$i]['position_id']);

      ?>
     <!-- List group -->
     <ul class="list-group">
       <li class="list-group-item active">Promote to <a class="btn btn-warning" href="dashboard.php?page=add_position_promote&position_id=<?= $position_list[$i][position_id]    ?>" role="button">Add Promote</a></li>
       <?php
       for ($ii=0; $ii <sizeof($check_position) ; $ii++) {
        ?>
       <li class="list-group-item">
         <div class="row">
        <div class="col-md-10">
         <?=  $check_position[$ii]['position_name'] ?>
         </div>
         <div class="col-md-2 text-center">
           <?php
           if($check_position[$ii][position_name]!="No data"){
            ?>
         <a class="btn btn-danger" href="controller/delete_position_promote.php?position_promote_id=<?= $check_position[$ii][position_promote_id] ?>" role="button">Delete</a>
         <?php
          }
          ?>
         </div>
         </div>
         </li>
       <?php
     }//for2
        ?>
     </ul>
     <!-- List group -->
     <div class="row">
    <div class="col-md-12">
      <a class="btn btn-success" href="dashboard.php?page=edit_position&position_id=<?= $position_list[$i]['position_id'] ?>" role="button">Edit Position</a>
    <a class="btn btn-danger" href="controller/delete_position.php?position_id=<?= $position_list[$i]['position_id'] ?>" role="button">Delete Position</a>
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
