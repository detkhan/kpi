
<div class="body">
<form class="form-horizontal" action="controller/add_in_hourse_trainning.php" id="add_in_hourse_trainning" method="POST">
  <div class="form-group">
      <label class="col-sm-2 control-label">Trainning Name</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="in_house_train_name" name="in_house_train_name" placeholder="Trainning Name">
    </div>
    </div>


              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Trainning Date</label>
                  <div class='col-sm-3'>
                  <div class='input-group date' id='datetimepicker1'>
                      <input type='text' class="form-control" name="in_house_train_day"/>
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
