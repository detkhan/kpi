<?php
session_start();
include("controller/promote.php");
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

     <!-- Waves Effect Css -->
     <link href="plugins/node-waves/waves.css" rel="stylesheet" />

     <!-- Animation Css -->
     <link href="plugins/animate-css/animate.css" rel="stylesheet" />

     <!-- Morris Chart Css-->
     <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

     <!-- Custom Css -->
     <link href="css/style.css" rel="stylesheet">

     <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
     <link href="css/themes/all-themes.css" rel="stylesheet" />
 </head>

 <body class="theme-red">
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
                         <div class="header">
                             <h2>UPGRADE YOUR LEVEL</h2>
                         </div>
                         <div class="body">
                           <div class="row">
  <div class="col-md-12"><form action="controller/add_promote.php" id="add_promote" method="POST">
    <select name="position">
      <option value="" disabled selected>Choose your promote</option>
      <option value="Manager">Manager</option>
      <option value="Develop">Develop</option>
      <option value="SEO">SEO</option>
    </select></div>
  <div class="col-md-12"><div class="col-xs-4">
      <button class="btn btn-block bg-orange waves-effect" type="submit">SUBMIT</button>
  </div>
  </form></div>
</div>


                         </div>
                     </div>
                 </div>
                 <!-- #END# Task Info -->

             </div>



           </div>
       </section>

       <!-- Jquery Core Js -->
       <script src="plugins/jquery/jquery.min.js"></script>

       <!-- Bootstrap Core Js -->
       <script src="plugins/bootstrap/js/bootstrap.js"></script>

       <!-- Select Plugin Js -->
       <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

       <!-- Slimscroll Plugin Js -->
       <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

       <!-- Waves Effect Plugin Js -->
       <script src="plugins/node-waves/waves.js"></script>

       <!-- Jquery CountTo Plugin Js -->
       <script src="plugins/jquery-countto/jquery.countTo.js"></script>

       <!-- Morris Plugin Js -->
       <script src="plugins/raphael/raphael.min.js"></script>
       <script src="plugins/morrisjs/morris.js"></script>

       <!-- ChartJs -->
       <script src="plugins/chartjs/Chart.bundle.js"></script>

       <!-- Flot Charts Plugin Js -->
       <script src="plugins/flot-charts/jquery.flot.js"></script>
       <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
       <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
       <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
       <script src="plugins/flot-charts/jquery.flot.time.js"></script>

       <!-- Sparkline Chart Plugin Js -->
       <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

       <!-- Custom Js -->
       <script src="js/admin.js"></script>
       <script src="js/pages/index.js"></script>

       <!-- Demo Js -->
       <script src="js/demo.js"></script>
   </body>

   </html>
