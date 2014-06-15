<?php
include 'db_connect.php';
?>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="content-type" content="text/json; charset=utf-8">
        <title>Dashboard &gt; Dashboard &gt; FOG &gt; Open Source Computer Cloning Solution</title>
        <link rel="stylesheet" type="text/css" href="css/calendar/calendar-win2k-1.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.organicTabs.css">
        <!--<link rel="stylesheet" type="text/css" href="css/FOG_THEME" />-->
        <link rel="stylesheet" type="text/css" href="css/fog.css">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div id="header">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container center">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/fog/management/index.php"><img src="images/fog-logo.png" original-title="Home"><sup>1.0.1</sup></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/fog/management/index.php?node=home" title=""><span class="nav-label">Home</span><img src="images/icon-home.png" alt="Home"></a></li>
                        <li><a href="/fog/management/index.php?node=users" title=""><span class="nav-label">User Management</span><img src="images/icon-users.png" alt="User Management"></a></li>
                        <li><a href="/fog/management/index.php?node=host" title=""><span class="nav-label">Host Management</span><img src="images/icon-host.png" alt="Host Management"></a></li>
                        <li><a href="/fog/management/index.php?node=group" title=""><span class="nav-label">Group Management</span><img src="images/icon-group.png" alt="Group Management"></a></li>
                        <li><a href="/fog/management/index.php?node=images" title=""><span class="nav-label">Image Management</span><img src="images/icon-images.png" alt="Image Management"></a></li>
                        <li><a href="/fog/management/index.php?node=storage" title=""><span class="nav-label">Storage Management</span><img src="images/icon-storage.png" alt="Storage Management"></a></li>
                        <li><a href="/fog/management/index.php?node=snapin" title=""><span class="nav-label">Snapin Management</span><img src="images/icon-snapin.png" alt="Snapin Management"></a></li>
                        <li><a href="/fog/management/index.php?node=printer" title=""><span class="nav-label">Printer Management</span><img src="images/icon-printer.png" alt="Printer Management"></a></li>
                        <li><a href="/fog/management/index.php?node=service" title=""><span class="nav-label">Service Management</span><img src="images/icon-service.png" alt="Service Management"></a></li>
                        <li><a href="/fog/management/index.php?node=tasks" title=""><span class="nav-label">Task Management</span><img src="images/icon-tasks.png" alt="Task Management"></a></li>
                        <li><a href="/fog/management/index.php?node=report" title=""><span class="nav-label">Reports</span><img src="images/icon-report.png" alt="Reports"></a></li>
                        <li><a href="/fog/management/index.php?node=about" title=""><span class="nav-label">FOG Configuration</span><img src="images/icon-about.png" alt="FOG Configuration"></a></li>
                        <li><a href="/fog/management/index.php?node=logout" title=""><span class="nav-label">Logout</span><img src="images/icon-logout.png" alt="Logout"></a></li>
                        <li><a href="/fog/management/it350/checkout_view.php"  class="btn btn-default btn-sm active" role="button">Checkout Devices</a>
                        <li><a href="/fog/management/it350/user_view.php"  class="btn btn-default btn-sm active" role="button">Users</a></li>
                        <li><a href="/fog/management/it350/purchase_record_view.php" class="btn btn-default btn-sm active" role="button">Purchase Records</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php?>