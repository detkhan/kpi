<?php
include("controller/position.php");
 ?>
<div class="body">
  <label class="col-sm-12 control-label">Add Position Criteria</label>
<form class="form-horizontal" action="controller/add_position_criteria.php" id="add_position_criteria" method="POST">
  <div class="form-group">
      <label class="col-sm-2 control-label">Position Name</label>
      <div class="col-sm-10">
      <label class="control-label"><?= $get_position   ?></label>
      <input type="hidden" class="form-control" id="position_id" name="position_id" value="<?= $position_id  ?>">
    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Criteria Detail</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="criteria_detail" name="criteria_detail" placeholder="Criteria Detail">
      </div>
      </div>

      <div class="form-group">
      <label for="position" class="col-sm-2 control-label">Approver</label>
      <div class="col-sm-10">
        <select class="form-control" name="approver_id">
          <?php
        for ($i=0; $i < sizeof($list_user) ; $i++) {
           ?>
          <option value="<?=  $list_user[$i]['employee_id']   ?>"><?=  $list_user[$i]['name']   ?></option>
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
