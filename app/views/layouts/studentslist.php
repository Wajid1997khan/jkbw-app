<?php
	require_once 'app/controllers/studentcontroller.php';
	require_once __DIR__.'/../../../public/library/language.php';
?>
<style>
	.table-responsive { max-height:700px; overflow-y: auto;}
	.table thead th {
		position: sticky;
		top: 0;
		background-color: #fff;
		z-index: 2;
	}
</style>
<section class="section">
	<div class="row <?php echo LANG::data('dir'); ?>">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><?php echo LANG::data('AllStudents'); ?></div>
				<div class="card-body">
					<div class="row p-3">
						<div class="col-md-3">
							<input type="text" id="searchClassInput" class="form-control" 
								   placeholder="<?php echo LANG::data('EnterStudentCode'); ?>" />
						</div>
						<div class="col-md-3">
							<input type="text" id="searchClassInput2" class="form-control"
									placeholder="<?php echo LANG::data('EnterClassCode'); ?>" />
						</div>
					</div>
					<?php
						$std = new StudentController();
						echo $std->display_student_list(); 
					?>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
	<script>
		document.getElementById("searchClassInput").addEventListener("keyup", function () {
			const filter = this.value.toLowerCase();
			const rows = document.querySelectorAll("#TxtbooksTable tbody tr");

			rows.forEach(row => {
				const className = row.cells[1].textContent.toLowerCase();
				if (className.includes(filter)) {
				  row.style.display = "";
				} else {
				  row.style.display = "none";
				}
			});
		});
		
		document.getElementById("searchClassInput2").addEventListener("keyup", function () {
			const filter = this.value.toLowerCase();
			const rows = document.querySelectorAll("#TxtbooksTable tbody tr");

			rows.forEach(row => {
				const className = row.cells[4].textContent.toLowerCase();
				if (className.includes(filter)) {
				  row.style.display = "";
				} else {
				  row.style.display = "none";
				}
			});
		});
	</script>
</section>