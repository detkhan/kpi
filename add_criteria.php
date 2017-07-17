
<div class="body">
<form class="form-horizontal" action="controller/add_criteria.php" id="add_criteria" method="POST">
  <div class="form-group">
      <label class="col-sm-2 control-label">Criteria</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="criteria" name="criteria" placeholder="criteria">
    </div>
    </div>

    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">status</label>
    <div class="col-sm-10">
      <select class="form-control" name="status">
  <option value="You can Do it">You can Do it</option>
  <option value="Trying">Trying</option>
  <option value="Well Done">Well Done</option>
</select>
    </div>
  </div>

  <div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">color</label>
  <div class="col-sm-10">
    <select class="form-control" name="color">
<option value="col-yellow">col-yellow</option>
<option value="col-red">col-red</option>
<option value="col-green">col-green</option>
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
