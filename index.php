<?php
session_start();
require_once('assets/includes/head.php');
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
}
?>

<body>
    <!-- <div class="container-fluid"> -->
    <div class="wraper">
        <!-- <div class="row"> -->
        <div class="sidebar">
            <?php include('./sidebar/sidebar.php') ?>
        </div>
        <div class="main-content">
            <button _ngcontent-jbe-c128="" id="sidebar-toggle-inner" class="sidebar-collaps-btn-inner d-lg-none"><i class="fas fa-bars"></i></button>
            <div class="col-lg-6 col-md-8 col-sm-10 col-10  m-auto">
                <div class="indexSec ">
                    <!-- <a class="btn btn-danger float-end" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a> -->
                    <div class="col-md-12 border rounded p-4">
                        <form id="uploadPdfForm">
                            <h2>Upload Pdf</h2>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input class="form-control" type="file" id="file" name="file" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="uploadBtn"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                                <button type="submit" class="btn btn-success float-end d-none" id="downloadBtn"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

    </div>
    <!-- <div class="col-md-6 m-auto">
            <div class="indexSec ">
                <a class="btn btn-danger float-end" href="logout.php"><i class="fa fa-sign-out"
                        aria-hidden="true"></i></a>
                <div class="col-md-12 border rounded p-4">
                    <form id="uploadPdfForm">
                        <h2>Upload Pdf</h2>
                        <div class="form-group">
                            <label for="formFile" class="form-label">Upload File</label>
                            <input class="form-control" type="file" id="file" name="file" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="uploadBtn"><i class="fa fa-upload"
                                    aria-hidden="true"></i> Upload</button>
                            <button type="submit" class="btn btn-success float-end d-none" id="downloadBtn"><i
                                    class="fa fa-download" aria-hidden="true"></i> Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->
    <!-- </div> -->
    <script src="assets/js/main.js"></script>
</body>

</html>