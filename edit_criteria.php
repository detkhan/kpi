<?php
require_once("controller/criteria.php");

 ?>
 <div class="header">
     <h2>Edit Criteria</h2>
 </div>
 <div class="body">
   <form class="form-horizontal" action="controller/edit_criteria.php" id="edit_criteria" method="POST">

     <div class="form-group">
         <label class="col-sm-2 control-label">Progress</label>
         <div class="col-sm-10">
         <input type="text" class="form-control" id="progress" name="progress" value="<?= $get_criteria[0]['progress'] ?>">
         <input type="hidden" class="form-control" id="criteria_id" name="criteria_id" value="<?= $criteria_id ?>">
       </div>
       </div>



             <div class="form-group">
             <label for="position" class="col-sm-2 control-label">Position</label>
             <div class="col-sm-10">
               <select class="form-control" name="status">
                 <?php
                 $statuslist[] = array('name' =>'You can Do it');
                  $statuslist[] =array('name' =>'Trying');
                  $statuslist[] =array('name' =>'Well Done');
               for ($i=0; $i < sizeof($statuslist) ; $i++) {
$status_list=$get_criteria[0]['status'];
$status_array=$statuslist[$i]['name'];
//var_dump($status_array);
if($status_list==$status_array){
  $select="selected";
}else{
  $select="";
}
                  ?>

                 <option value="<?=  $status_array   ?>" <?= $select ?>><?=  $status_array   ?></option>
                 <?php
               }
                 ?>
           </select>
             </div>
           </div>

       <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
     </form>

 </div><!-- body   -->
