<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">

                    <div class="name"><?= $_SESSION['name'] ?></div>
                    <div class="email"><?= $_SESSION['username'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="controller/take_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">YOUR WAY YOU CAN SEE IT.</li>
                    <li class="active">
                        <a href="../dashboard.php?page=listcriteria">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?page=add_criteria">
                            <i class="material-icons">assignment</i>
                            <span>Add Criteria</span>
                        </a>
                    </li>

                    <li>
                        <a href="dashboard.php?page=add_in_hourse_trainning">
                          <i class="material-icons">local_library</i>
                            <span>Add In-Hourse Trainning</span>
                        </a>
                    </li>

                    <li>
                        <a href="dashboard.php?page=add_trainning_course">
                          <i class="material-icons">school</i>
                            <span>Add Trainning Course</span>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">REVOLUTION IT AND MARKETING</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0 KPI & CRITERIA
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
