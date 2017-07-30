<?php

 ?>
 <div class="header">
     <h2>Add Position</h2>
 </div>
 <div class="body">
   <form class="form-horizontal" action="controller/add_position.php" id="add_position" method="POST">
     <div class="form-group">
         <label class="col-sm-2 control-label">Position Name</label>
         <div class="col-sm-10">
         <input type="text" class="form-control" id="position_name" name="position_name" placeholder="Position Name">
       </div>
       </div>

       <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
     </form>

 </div><!-- body   -->
