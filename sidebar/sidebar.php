<?php
require_once('./assets/includes/head.php');
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<body>
    <div class="sidebar-wraper">
        <div class="logo">
            <img src="./assets/images/logo.png" class="sidebar-logo">
        </div>
        <div class="nav-manu mt-5">
            <ul class="p-0">
                <li class="<?= $page == 'index.php' ? 'active' : '' ?>"><a href="index.php"><i class=" fa fa-upload me-4" aria-hidden="true"></i>Upload</a></li>
                <li class="<?= $page == 'manage-doctor.php' ? 'active' : '' ?>"><a href="manage-doctor.php"><i class="fas fa-user-md me-4"></i>Manage Doctors</a></li>
                <li class="<?= $page == 'manage-clinics.php' ? 'active' : '' ?>"><a href="manage-clinics.php"><i class="fas fa-clinic-medical me-4"></i>Manage Clinics</a></li>
                <li class="<?= $page == 'manage-pharmacy.php' ? 'active' : '' ?>"><a href="manage-pharmacy.php"><i class="fad fa-user-injured me-4"></i>Manage Pharmacy</a></li>

            </ul>
        </div>
        <div class="nav-footer mt-auto">
            <ul class="p-0">
                <li><a href="logout.php"><i class="fa fa-sign-out me-4"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>