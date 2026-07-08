<?php
	require_once 'app/controllers/studentcontroller.php';
	require_once __DIR__.'/../../../public/library/language.php';
?>
<section class="section">
	<div class="row <?php echo LANG::data('dir'); ?>">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				  <h5 class="card-title"> <?php echo LANG::data('AdmissionList'); ?></h5>
				  <div class="row p-1"><!-- Search Input -->
					  <div class="col-md-2">
						<input type="text" id="TxtAdmissionNo" class="form-control"
							   placeholder="<?php echo LANG::data('AdmissionNo'); ?>">
					  </div>
					  <div class="col-md-2">
						<input type="text" id="TxtClassCode" class="form-control"
							   placeholder="<?php echo LANG::data('ClassCode'); ?>">
					  </div>
					</div>
				  <?php
					$AL = new StudentController();
					echo $AL->display_admission_list(); 
				  ?>
				</div>
			</div>
		</div>
	</div>
  <style>
    .table-responsive {
      max-height: 400px;
      overflow-y: auto;
    }

    .table thead th {
      position: sticky;
      top: 0;
      background-color: #fff;
      z-index: 2;
    }
  </style>
  <script>
    document.getElementById("TxtAdmissionNo").addEventListener("keyup", function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll("#TxtAdmissionListTable tbody tr");

      rows.forEach(row => {
        const className = row.cells[1].textContent.toLowerCase();
        if (className.includes(filter)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
	document.getElementById("TxtClassCode").addEventListener("keyup", function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll("#TxtAdmissionListTable tbody tr");

      rows.forEach(row => {
        const className = row.cells[2].textContent.toLowerCase();
        if (className.includes(filter)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
  </script>
</section>