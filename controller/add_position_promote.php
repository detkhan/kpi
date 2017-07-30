<?php
session_start();
include("class/promote.php");
$position_id1 = explode('|',$_POST["position_id"]);
$position_id=$position_id1[0];
$position_name=$position_id1[1];
$position_id_out1 = explode('|',$_POST["position_id_out"]);
$position_id_out=$position_id_out1[0];
$position_name2=$position_id_out1[1];
$promote= new promote;
$add_promote=$promote->addPositionPromote($position_id,$position_id_out);
$textadd=urlencode('<h1 class="text-center"><span class="label label-danger">position  '. $position_name.' to '.$position_name2.'</span><h1>');
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
