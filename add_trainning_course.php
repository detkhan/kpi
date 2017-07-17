
<div class="body">
<form class="form-horizontal" action="controller/add_trainning_course.php" id="add_trainning_course" method="POST">
  <div class="form-group">
      <label class="col-sm-2 control-label">Trainning Name</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="train_course_name" name="train_course_name" placeholder="Trainning Course Name">
    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Trainning Cost</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="train_course_cost" name="train_course_cost" placeholder="Trainning Cost">
      </div>
      </div>

              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Trainning Course Date</label>
                  <div class='col-sm-3'>
                  <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" name="train_course_day"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
          </div>
          <script type="text/javascript">
              $(function () {
                  $('#datetimepicker1').datetimepicker({
                 format: 'YYYY/MM/DD'
           });
              });
          </script>

  <div class="form-group">
   <div class="col-sm-offset-2 col-sm-10">
     <button type="submit" class="btn btn-default">Add</button>
   </div>
 </div>
</form>
</div>
