<?php
session_start();
require_once('assets/includes/head.php');
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
}
?>

<body>
    <div class="wraper d-flex">
        <div class="sidebar">
            <?php require_once('sidebar/sidebar.php') ?>
        </div>
        <div class="main-content">
            <button _ngcontent-jbe-c128="" id="sidebar-toggle-inner" class="sidebar-collaps-btn-inner d-lg-none"><i class="fas fa-bars"></i></button>
            <div class="col-md-11 col-sm-11 col-11  m-auto">
                <div class="manage-page">
                    <h2 class="mb-4">Manage Doctors Records</h2>
                    <div class="table-responsive">
                        <table id="manage-doctor-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Specialties</th>
                                    <th>RegNumber</th>
                                    <th>clinicId</th>
                                    <th></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal Start -->
        <div class="modal fade" id="edit-doctor-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-color">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Doctor</h5>
                        <button type="button" class="custom-close border-0" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times btn-close-i"></i>
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label cust-labl">Doctor Name :</label>
                                        <input type="text" name="p-name" placeholder="Name" class="form-control custom-form-control" id="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label cust-labl">Speciality :</label>
                                            <input type="text" name="Speciality" placeholder="Speciality" class="form-control custom-form-control" id="speciality">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label cust-labl">Registration Number</label>
                                        <input type="text" name="RegistrationNumber" placeholder="Registration Number" class="form-control custom-form-control" id="regNumber">
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-save" onclick="updateDoctor()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Modal End -->
    </div>
    <script src="assets/js/doctors.js"></script>
</body>

</html>