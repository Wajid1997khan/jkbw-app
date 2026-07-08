<?php 
    require_once __DIR__.'/../../../public/library/language.php';
    require_once 'app/controllers/classcontraoller.php';
?>
<div class="row <?php echo LANG::data('dir'); ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> <?php echo LANG::data('CreateResults'); ?> </h2>
                <!-- Multi Columns Form -->
                <form id="TxtBookResultFormCtreate" class="row g-3 needs-validation was-validated" method="POST" novalidate>
					<div class="col-md-2">
                        <label for="TxtmonthYear" class="form-label"><?php echo LANG::data('Date'); ?></label>
                        <input type="month" id="TxtmonthYear" class="form-control" value="<?php echo date('Y-m'); ?>">
                    </div>
					
					<div class="col-md-2">
                        <label for="TxtExamType" class="form-label"><?php echo LANG::data('ExamType'); ?></label>
                        <select class="form-select" name="ExamType" id="TxtExamType" required="">
							<option value=""><?php echo LANG::data('Choose'); ?></option>
							<option value="BiMonthlyExam"><?php echo LANG::data('BiMonthlyExam'); ?></option>
							<option value="QuarterlyExam"><?php echo LANG::data('QuarterlyExam'); ?></option>
							<option value="MidtermExam"><?php echo LANG::data('MidtermExam'); ?></option>
							<option value="AnnualExam"><?php echo LANG::data('AnnualExam'); ?></option>
                        </select>
                        <div class="invalid-feedback">
                           <?php echo LANG::data('Pleaseselectresulttype'); ?>
                        </div>
                    </div>

					<div class="col-md-3">
                        <label for="TxtClassCode" class="form-label"><?php echo LANG::data('Class'); ?></label>
                        <select class="form-select" name="ClassCode" id="TxtClassCode" required="">
                            <?php
                               $class = new ClassController;
                               echo $class->get_classes_dropdown(htmlspecialchars($classid));
                            ?>
                        </select>
                        <div class="invalid-feedback">
                           <?php echo LANG::data('PleaseselectavalidClass'); ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="TxtBookCode" class="form-label"><?php echo LANG::data('Book'); ?></label>
                        <select class="form-select" name="BookCode" id="TxtBookCode" required="">
                        </select>
                        <div class="invalid-feedback">
                           <?php echo LANG::data('Pleaseselectavalidbook'); ?>
                        </div>
                    </div>

					<div class="col-md-2">
						<label for="TxtBookMarks" class="form-label"><?php echo LANG::data('BookMarks'); ?></label>
						<input type="number" class="form-control" id="TxtBookMarks" required="" value="" />
						<div class="invalid-feedback">
							<?php echo LANG::data('EnterBookMarks'); ?>
						</div>	
					</div>


                    <!-- Add container for results  -->
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th scope="col" width="15%"><?php echo LANG::data('StudentCode'); ?></th>
								<th scope="col" width="35%"><?php echo LANG::data('Name'); ?></th>
								<th scope="col" width="35%"><?php echo LANG::data('FatherName'); ?></th>
								<th scope="col" width="15%"><?php echo LANG::data('ObtainedMarks'); ?></th>
							</tr>
							</thead>
							<tbody id="TxtLoadBookStudents"></tbody>
						</table>
					</div>
					
					<div class="col-md-4" id="Txtseeresult"></div>

                    <div>
                        <button class="btn btn btn-outline-success" id="TxtbtnSave">
                            <i class="bi bi-telegram"></i> <?php echo LANG::data('Create'); ?>
                        </button>
                        <button type="reset" class="btn btn-outline-primary">
                            <i class="bi bi-app-indicator"></i> <?php echo LANG::data('Reset'); ?>
                        </button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div><!--card-body -->
        </div><!--card -->
    </div><!--columns -->
    <script>
        $(document).ready(function(){
            $("#TxtClassCode").change(function (e) {
				e.preventDefault();
                var classCode = $(this).val();
                $.ajax({
                    url: "<?= base_url('addnewresult/'); ?>",
                    type: "POST",
                    data: { classCode: classCode },
                    success: function (response) {
                        console.log("Server Response:", response);
                        $("#TxtBookCode").html(response);
						$("#TxtLoadBookStudents").html('');
                    },error: function (xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });

			/*
			 *@function to get book students for exams
			**/
            $("#TxtBookCode, #TxtExamType").change(function(e){
				e.preventDefault();
                var bookcode = $("#TxtBookCode").val();
                if( !bookcode ) {
					alert("<?php echo LANG::data('Pleaseselectavalidbook'); ?>");
					return false;
				}//end if.
			    
				var examtype = $("#TxtExamType").val();
				if( !examtype ) {
					alert("<?php echo LANG::data('Pleaseselectresulttype'); ?>");
					return false;
				}//end if.

                $.ajax({
                    url: "<?= base_url('addnewresult/'); ?>",
                    type: "POST",
                    data: { BookCode:bookcode,ExamType:examtype },
                    success: function (response) {
                        console.log("Server Response:", response);
                        $("#TxtLoadBookStudents").html(response);
                    },error: function (xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });
			
			// @function to create the book result.
			$("#TxtbtnSave").click(function (e) {
				e.preventDefault();
				let isValid = true;
				// Clear previous error styles
				$("#TxtBookResultFormCtreate").find(":input").removeClass("txterror");
				var bkMrks = $("#TxtBookMarks").val();

				// Validation for required fields
				$("#TxtBookResultFormCtreate").find(":input[required]").each(function () {
					if ($(this).val().trim() == "") {
						$(this).focus();
						$(this).addClass("txterror");
						isValid = false;
						return false; // break from .each()
					}
				});

				if (!isValid) {
					return; // prevent AJAX call if validation fails
				}

				// Get all rows data
				let rowsData = [];
				let hasInvalidMarks = false;

				$("#TxtLoadBookStudents tr").each(function () {
					let $tr = $(this);
					let stdCode = $tr.data("stdid");
					let obtMarks = $tr.find("input.obtained-marks").val();

					if (obtMarks == undefined || obtMarks.trim() == "") {
						$tr.find("input.obtained-marks").addClass("txterror").focus();
						hasInvalidMarks = true;
						return false; // break from .each()
					}

					rowsData.push({stdcode: stdCode,bkmrks: bkMrks,obtmarks: obtMarks});
				});

				if (hasInvalidMarks) {
					return; // prevent AJAX call if any student mark is empty
				}

				// Send AJAX Request
				$.ajax({
					url: "<?= base_url('addnewresult/'); ?>",
					method: "POST",
					async: true,
					data: {
						MonthYear: $("#TxtmonthYear").val(),
						ClassCode: $("#TxtClassCode").val(),
						BookCode: $("#TxtBookCode").val(),
						Items: rowsData
					},
					success: function (data) {
						data = $.trim(data);
						$("#TxtbtnSave").remove();
						$("#Txtseeresult").html(data);
					},
					error: function (xhr, status, error) {
						console.error("Could Not Connect to the Server:", error);
					}
				});
			});

			$(document).on("change", "input.obtained-marks",function (e) {
				e.preventDefault();

				var book_marks = $("#TxtBookMarks").val().trim();
				if (!book_marks || isNaN(book_marks) || parseFloat(book_marks) <= 0) {
					alert("<?php echo LANG::data('EnterBookMarks'); ?>");
					$("#TxtBookMarks").focus();
					$(this).val('');
					return false;
				}

				var student_marks = $(this).val().trim();
				if (!student_marks || isNaN(student_marks) || parseFloat(student_marks) <= 0) {
					alert("<?php echo LANG::data('InvalidMarksEntered'); ?>");
					$(this).focus();
					$(this).val('');
					return false;
				}

				student_marks = parseFloat(student_marks);
				book_marks = parseFloat(book_marks);

				if (student_marks > book_marks) {
					alert("<?php echo LANG::data('Enteredmarksexceedthebooktotalmarks'); ?>");
					$(this).focus();
					$(this).val('');
					return false;
				}
			});
        });
    </script>
</div><!-- row -->