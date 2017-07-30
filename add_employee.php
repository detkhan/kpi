<?php
include("controller/position.php");
 ?>
 <div class="header">
     <h2>Add Employee</h2>
 </div>
 <div class="body">
   <form class="form-horizontal" action="controller/add_employee.php" id="add_employee" method="POST">

     <div class="form-group">
         <label class="col-sm-2 control-label">Employee Name</label>
         <div class="col-sm-10">
         <input type="text" class="form-control" id="name" name="name" placeholder="Employee Name">
       </div>
       </div>

       <div class="form-group">
           <label class="col-sm-2 control-label">Username</label>
           <div class="col-sm-10">
           <input type="text" class="form-control" id="username" name="username" placeholder="Username">
         </div>
         </div>

         <div class="form-group">
             <label class="col-sm-2 control-label">Password</label>
             <div class="col-sm-10">
             <input type="password" class="form-control" id="password" name="password" placeholder="password">
           </div>
           </div>

           <div class="form-group">
               <label class="col-sm-2 control-label">Confirm Password</label>
               <div class="col-sm-10">
               <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
             </div>
             </div>


             <div class="form-group">
             <label for="position" class="col-sm-2 control-label">Position</label>
             <div class="col-sm-10">
               <select class="form-control" name="position_id">
                 <?php
                 $position_list=$position->listPosition();
               for ($i=0; $i < sizeof($position_list) ; $i++) {

                  ?>
                 <option value="<?=  $position_list[$i]['position_id']   ?>"><?=  $position_list[$i]['position_name']   ?></option>
                 <?php
               }
                 ?>
           </select>
             </div>
           </div>

       <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
     </form>

 </div><!-- body   -->
