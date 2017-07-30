<?php
require_once("controller/position.php");
 ?>
 <div class="header">
     <h2>Edit Position</h2>
 </div>
 <div class="body">
   <form class="form-horizontal" action="controller/edit_position.php" id="edit_position" method="POST">
     <div class="form-group">
         <label class="col-sm-2 control-label">Position Name</label>
         <div class="col-sm-10">
         <input type="text" class="form-control" id="position_name" name="position_name" value="<?= $get_position ?>" placeholder="">
         <input type="hidden" class="form-control" id="position_id" name="position_id" value="<?= $position_id  ?>">
       </div>
       </div>

       <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
     </form>

 </div><!-- body   -->
