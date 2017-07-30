<?php
session_start();
require_once("controller/check_session.php");
require_once("controller/promote.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome My team</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php include("include/navbar-header.php");?>
    <!-- #Top Bar -->
    <?php include("include/leftsidebar.php");?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Promote</h2>
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                      <?php
                      for ($i=0; $i <sizeof($check_position) ; $i++) {
                       ?>
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"  <?= ($i==0)?'aria-expanded="true" ':' class="collapsed" aria-expanded="false"' ?>  aria-controls="collapse<?= $i ?>">
                                <?=  $check_position[$i]['position_name'] ?>
                              </a>
                            </h4>
                          </div>
                          <div id="collapse<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $i ?>">
                        <div class="panel-body">
                        <?php
                        $dataCriteriaDetail=$criteria->getCriteriaDetail($check_position[$i]['position_id']);

                         ?>
                        <!-- List group -->
                        <ul class="list-group">
                          <?php
                          for ($ii=0; $ii <sizeof($dataCriteriaDetail) ; $ii++) {
                           ?>
                          <li class="list-group-item"><?=  $dataCriteriaDetail[$ii]['criteria_detail'] ?></li>
                          <?php
                          $position_criteria_id[]=$dataCriteriaDetail[$ii]['position_criteria_id'];
                          $criteria_detail[]=$dataCriteriaDetail[$ii]['criteria_detail'];
                          $approver_id[]=$dataCriteriaDetail[$ii]['approver_id'];
                        }//for2
                           ?>
                        </ul>
                        <div class="panel-footer"><a class="btn btn-default" href="controller/add_promote.php?position_id=<?= $check_position[$i]['position_id'] ?>&position_criteria_id=<?= urlencode(serialize($position_criteria_id)) ?>&criteria_detail=<?= urlencode(serialize($criteria_detail)) ?>&approver_id=<?= urlencode(serialize($approver_id)) ?>" role="button">Promote</a></div>
                      </div><!-- panel-body   -->
                      </div><!-- collapseOne   -->
                      </div><!-- panel panel-default  -->
<?php
}//end for
 ?>

                      </div><!-- panel-group   -->

      </div><!-- card   -->
  </div>
  <!-- #END# Task Info -->

</div>
</div>
</section>



<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>



<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>



<!-- Custom Js -->
<script src="js/admin.js"></script>

<script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

</body>

</html>
