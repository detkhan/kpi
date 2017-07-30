<?php
include("controller/position_promote.php");
 ?>
<div class="body">
  <label class="col-sm-12 control-label">Add Position Promote</label>
<form class="form-horizontal" action="controller/add_position_promote.php" id="add_position_promote" method="POST">
  <div class="form-group">
      <label class="col-sm-2 control-label">Position Name</label>
      <div class="col-sm-10">
      <label class="control-label"><?= $get_position   ?></label>
      <input type="hidden" class="form-control" id="position_id" name="position_id" value="<?= $position_id  ?>">
    </div>
    </div>

  <div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">Position Promote</label>
  <div class="col-sm-10">
    <select class="form-control" name="position_id_out">
      <?php
    for ($i=0; $i < sizeof($position_list) ; $i++) {

       ?>
      <option value="<?=  $position_list[$i]['position_id']   ?>|<?=  $position_list[$i]['position_name']   ?>"><?=  $position_list[$i]['position_name']   ?></option>
      <?php
    }
      ?>
</select>
  </div>
</div>


  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-default">Add</button>
   </div>
 </div>
</form>
</div>
