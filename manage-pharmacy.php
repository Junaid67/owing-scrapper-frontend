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
                    <h2 class="mb-4">Manage Pharmacies Records</h2>
                    <div class="table-responsive">
                        <table id="manage-pharmacy-table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Url</th>
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
        <div class="modal fade" id="edit-pharmacy-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-color">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pharmacies</h5>
                        <button type="button" class="custom-close border-0" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times btn-close-i"></i>
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label cust-labl">Pharmacy Name :</label>
                                        <input type="text" name="p-name" placeholder="Name" class="form-control custom-form-control" id="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label cust-labl">Address :</label>
                                            <input type="text" name="address" placeholder="lahore" class="form-control custom-form-control" id="address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label cust-labl">Phone</label>
                                        <input type="text" name="phone" placeholder="12345678" class="form-control custom-form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label cust-labl">Fax</label>
                                            <input type="text" name="fax" placeholder="1234" class="form-control custom-form-control" id="fax">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label cust-labl">Email :</label>
                                        <input type="text" name="email" placeholder="ph@gmail.com" class="form-control custom-form-control" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label cust-labl">Url :</label>
                                        <input type="text" name="p-url" placeholder="https/:pharmacy.com" class="form-control custom-form-control" id="url">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-save" onclick="updatePharmacy()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Modal End -->
    </div>
    <script src="assets/js/pharmacy.js"></script>
</body>

</html>