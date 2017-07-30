<?php
require_once("controller/employee.php");

 ?>
 <div class="header">
     <h2>Edit Employee</h2>
 </div>
 <div class="body">
   <form class="form-horizontal" action="controller/edit_employee.php" id="edit_employee" method="POST">

     <div class="form-group">
         <label class="col-sm-2 control-label">Employee Name</label>
         <div class="col-sm-10">
         <input type="text" class="form-control" id="name" name="name" value="<?= $get_user[0]['name'] ?>" placeholder="Employee Name">
         <input type="hidden" class="form-control" id="employee_id" name="employee_id" value="<?= $employee_id ?>">
       </div>
       </div>

       <div class="form-group">
           <label class="col-sm-2 control-label">Username</label>
           <div class="col-sm-10">
           <input type="text" class="form-control" id="username" name="username" value="<?= $get_user[0]['username'] ?>" placeholder="Username">
         </div>
         </div>



             <div class="form-group">
             <label for="position" class="col-sm-2 control-label">Position</label>
             <div class="col-sm-10">
               <select class="form-control" name="position_id">
                 <?php
                 $position_list=$position->listPosition();
               for ($i=0; $i < sizeof($position_list) ; $i++) {
$position_id_list=$position_list[$i]['position_id'];
$position_id_user=$get_user[0]['position_id'];
if($position_id_list==$position_id_user){
  $select="selected";
}else{
  $select="";
}
                  ?>

                 <option value="<?=  $position_list[$i]['position_id']   ?>" <?= $select ?>><?=  $position_list[$i]['position_name']   ?></option>
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
