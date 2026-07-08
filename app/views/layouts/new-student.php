<?php
	require_once 'app/controllers/studentcontroller.php';
	require_once __DIR__.'/../../../public/library/language.php';
?>
<div class="row <?php echo LANG::data('dir'); ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo LANG::data('AddNewStudent'); ?> </h5>
                <!-- Multi Columns Form -->
                <form class="row g-3 needs-validation was-validated" novalidate>
                    <div class="col-md-12">
                        <label for="TxtStudentName" class="form-label"><?phph echo LANG::data('AddNewStudent'); ?></label>
                        <input type="text" class="form-control" id="TxtStudentName" required>
                    </div>
                    <div class="col-md-12">
                        <label for="TxtFatherName" class="form-label">Father Name</label>
                        <input type="text" class="form-control" id="TxtFatherName">
                    </div>
                    <div class="col-md-12">
                        <label for="TxtStudentState" class="form-label"> Class </label>
                        <select id="TxtStudenttate" class="form-select">
                            <option selected=""> Choose... </option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="TxtStudentEmail" class="form-label">Student Email</label>
                        <input type="email" class="form-control" id="TxtStudentEmail">
                    </div>
                    <div class="col-12">
                        <label for="TxtStudentAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="TxtStudentAddress" placeholder="1234 Main St">
                    </div>
                    <div class="col-12">
                        <label for="TxtStudentAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="TxtStudentAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="col-md-6">
                        <label for="TxtStudentCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="TxtStudentCity">
                    </div>
                    <div class="col-md-4">
                        <label for="TxtStudentState" class="form-label">State</label>
                        <select id="TxtStudenttate" class="form-select">
                            <option selected="">Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <!--div class="col-md-2">
                        <label for="TxtStudentZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div><!--card-body -->
        </div><!--card -->
    </div><!--columns -->
</div><!-- row -->