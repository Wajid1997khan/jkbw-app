<?php 
	require_once __DIR__.'/../../../public/library/language.php';
	require_once 'app/controllers/classcontraoller.php';
?>
<div class="row <?php echo LANG::data('dir'); ?>">
    <div class="col-lg-12">
	<form id="TxtadmissionForm" class="row g-3 needs-validation" method="POST" novalidate>
		<input type="text" name="StudentType" class="form-control" id="TxtStudentType" Value=""/>
		<div class="card">
            <div class="card-body">
				<div class="card-header"><?php echo LANG::data('ChooseAdmissionType'); ?></div>
				<div class="row p-2">
					<div class="col-lg-3"></div>
					<div class="col-lg-3 d-grid mt-3">
						<button id="btnAdmissionWithCode" class="btn btn-outline-success">
							<?php echo LANG::data('AdmissionwithStudentCode'); ?>
						</button>
					</div>
					<div class="col-lg-3 d-grid mt-3">
						<button id="btnNewAdmission" class="btn btn-outline-success">
							<?php echo LANG::data('NewAdmission'); ?>
						</button>
					</div>
					<div class="col-lg-3"></div>
				</div>
				<div class="row p-2">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 d-grid d-none choose-student-code">
						<label for="StudentCode" class="form-label"><?php echo LANG::data('StudentCode'); ?></label>
						<input type="text" name="StudentCode" class="form-control" id="TxtStudentCode" Value=""/>
						<div class="invalid-feedback"><?php echo LANG::data('EnterStudentCode'); ?></div>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</div>
			<div class="card-footer"></div>
		</div>
		
		
		<div class="card student-details-card d-none">
            <div class="card-body">
				<div class="card-title card-header">
					<div class="row p-1">
						<div class="col-md-9">
							<?php echo LANG::data('StudentDetails'); ?>
						</div>
						<!-- Wrapper with dynamic direction (RTL for Urdu, LTR for English) -->
						<div class="col-md-3" dir="<?php echo LANG::data('dir'); ?>">
							<div class="form-group">
								<div class="row">
									<div class="col-auto">
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="Muqeem" id="TxtMuqeem1"
												 value="Resident" required />
										  <label class="form-check-label" for="TxtMuqeem1">
											<?php echo LANG::data('Resident'); ?>
										  </label>
										</div>
									</div>

									<div class="col-auto">
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="Muqeem" id="TxtMuqeem2" 
												 value="NonResident" required />
										  <label class="form-check-label" for="TxtMuqeem2">
											<?php echo LANG::data('NonResident'); ?>
										  </label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row p-2 g-3">
					<!-- First Name EN -->
					<div class="col-md-3">
						<label for="FirstNameEN" class="form-label"><?php echo LANG::data('FirstNameEnglish'); ?></label>
						<input type="text" name="FirstNameEN" class="form-control" id="FirstNameEN" required>
						<div class="valid-feedback"><?php echo LANG::data('Looksgood'); ?></div>
						<div class="invalid-feedback"><?php echo LANG::data('PleaseEnterFirstNameEnglish'); ?></div>
					</div>

					<!-- Last Name EN -->
					<div class="col-md-3">
						<label for="LastNameEN" class="form-label"><?php echo LANG::data('LastNameEnglish'); ?></label>
						<input type="text" name="LastNameEN" class="form-control" id="LastNameEN" required>
						<div class="valid-feedback"><?php echo LANG::data('Looksgood'); ?></div>
						<div class="invalid-feedback"><?php echo LANG::data('PleaseEnterLastNameEnglish'); ?></div>
					</div>

					<!-- First Name UR -->
					<div class="col-md-3">
						<label for="FirstNameUR" class="form-label"><?php echo LANG::data('FirstNameUrdu'); ?></label>
						<input type="text" name="FirstNameUR" class="form-control" id="FirstNameUR" required>
						<div class="valid-feedback"><?php echo LANG::data('Looksgood'); ?></div>
						<div class="invalid-feedback"><?php echo LANG::data('PleaseEnterFirstNameUrdu'); ?></div>
					</div>

					<!-- Last Name UR -->
					<div class="col-md-3">
						<label for="LastNameUR" class="form-label"><?php echo LANG::data('LastNameUrdu'); ?></label>
						<input type="text" name="LastNameUR" class="form-control" id="LastNameUR" required>
						<div class="valid-feedback"><?php echo LANG::data('Looksgood'); ?></div>
						<div class="invalid-feedback"><?php echo LANG::data('PleaseEnterLastNameUrdu'); ?></div>
					</div>
				</div>
				
				<div class="row p-2 g-3">
					<!-- Father Name English -->
					<div class="col-md-3">
						<label for="FatherNameEN" class="form-label"><?php echo LANG::data('FatherNameEnglish'); ?></label>
						<input type="text" name="FatherNameEN" class="form-control" id="TxtFatherNameEN" required>
						<div class="invalid-feedback"><?php echo LANG::data('FatherNameEnglish'); ?></div>
					</div>
						
					<!-- Father Name Urdu -->
					<div class="col-md-3">
						<label for="FatherNameUR" class="form-label"><?php echo LANG::data('FatherNameUrdu'); ?></label>
						<input type="text" name="FatherNameUR" class="form-control" id="TxtFatherNameUR" required>
						<div class="invalid-feedback"><?php echo LANG::data('FatherNameUrdu'); ?></div>
					</div>
					
                    <!-- Date of Birth -->
					<div class="col-md-3">
                        <label for="DOB" class="form-label"><?php echo LANG::data('DateofBirth'); ?></label>
                        <input type="date" name="DOB" class="form-control" id="DOB" required />
                        <div class="invalid-feedback"><?php echo LANG::data('Pleaseselectdateofbirth'); ?></div>
                    </div>					
					
					<div class="col-md-3">
						<label for="CNICNumber" class="form-label"><?php echo LANG::data('CNICNumber'); ?></label>
						<input type="text" name="CNICNumber" class="form-control" id="CNICNumber"
							   pattern="^\d{5}-\d{7}-\d{1}$" Value="" />
						<div class="invalid-feedback"><?php echo LANG::data('PleaseEnterValidCNIC'); ?></div>
					</div>			
					
				</div>
				
				<div class="row p-2 g-3">
                    <!-- Mobile Number -->
                    <div class="col-md-3">
                        <label for="MobileNumber" class="form-label"><?php echo LANG::data('MobileNumber'); ?></label>
                        <input type="tel" name="MobileNumber" class="form-control" id="MobileNumber" required pattern="^\d{10,15}$" placeholder="e.g. 03001234567">
                        <div class="invalid-feedback"><?php echo LANG::data('Pleaseenteravalidmobilenumber'); ?></div>
                    </div>
					
					
					
					<div class="col-md-3">
						<label for="PermanentAddress" class="form-label"><?php echo LANG::data('PermanentAddress'); ?></label>
						<input type="text" name="PermanentAddress" class="form-control" id="PermanentAddress" required />
						<div class="invalid-feedback"><?php echo LANG::data('PermanentAddress'); ?></div>
					</div>
					
					<div class="col-md-3">
						<label for="TemporaryAddress" class="form-label"><?php echo LANG::data('TemporaryAddress'); ?></label>
						<input type="text" name="TemporaryAddress" class="form-control" id="TemporaryAddress" required />
						<div class="invalid-feedback"><?php echo LANG::data('TemporaryAddress'); ?></div>
					</div>
										
					<!-- Select Class -->
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
				</div>
				
				<div class="row p-2 g-3">
				
					<div class="col-md-3">
						<label for="PreviousMadrasa" class="form-label"><?php echo LANG::data('PreviousMadrasa'); ?></label>
						<input type="text" name="PreviousMadrasa" class="form-control" id="PreviousMadrasa" required />
						<div class="invalid-feedback"><?php echo LANG::data('PreviousMadrasa'); ?></div>
					</div>
										
					<div class="col-md-3">
						<label for="Guardian" class="form-label"><?php echo LANG::data('Guardian'); ?></label>
						<input type="text" name="Guardian" class="form-control" id="Guardian" required />
						<div class="invalid-feedback"><?php echo LANG::data('Guardian'); ?></div>
					</div>
					
					<div class="col-md-3">
                        <label for="GuardianMobileNumber" class="form-label"><?php echo LANG::data('GuardianMobileNumber'); ?></label>
                        <input type="tel" name="MobileNumber" class="form-control" id="GuardianMobileNumber" 
							   required pattern="^\d{10,15}$" placeholder="e.g. 03001234567">
                        <div class="invalid-feedback"><?php echo LANG::data('Pleaseenteravalidmobilenumber'); ?></div>
                    </div>
					
					<div class="col-md-3">
						<label for="GuardianCNICNumber" class="form-label"><?php echo LANG::data('GuardianCNICNumber'); ?></label>
						<input type="text" name="GuardianCNICNumber" class="form-control" id="GuardianCNICNumber"
							   pattern="^\d{5}-\d{7}-\d{1}$" Value="" />
						<div class="invalid-feedback"><?php echo LANG::data('GuardianCNICNumber'); ?></div>
					</div>	
					
				</div>
				
				<div class="row p-2 g-3">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success">
							<i class="bi bi-check-circle"></i><?php echo LANG::data('Submit'); ?>
						</button>
						<button type="reset" class="btn btn-outline-secondary">
							<i class="bi bi-arrow-clockwise"></i><?php echo LANG::data('Reset'); ?>
						</button>
					</div>
				</div>
			</div>
			<div class="card-footer"></div>
		</div>		
	</form><!-- End form -->
	<script>
		$(document).ready(function(){
            $("#btnAdmissionWithCode").click(function (e) {
				e.preventDefault();
				$(".student-details-card").addClass("d-none");
				$(".choose-student-code").removeClass("d-none");
				$("#TxtStudentCode").prop('required', true);
				$("#TxtStudentType").val("Old");
            });
		});
		
		$(document).ready(function(){
            $("#btnNewAdmission").click(function (e) {
				e.preventDefault();
				$(".student-details-card").removeClass("d-none");
				$(".choose-student-code").addClass("d-none");
				$("#TxtStudentCode").prop('required',false);
				$("#TxtadmissionForm input,Select").val('');
				$("#TxtStudentType").val("New");
            });
		});
		
		$(document).on("change", "#TxtStudentCode", function (e) {
			e.preventDefault();
			var std_code = $(this).val();

			if (std_code.trim() == "") {
				alert("Please enter a student code.");
				return;
			}

			$.ajax({
				url: "<?= base_url('admission/'); ?>",
				type: "POST",
				data: {'iEvent':'GetStudentDetails', StdCode: std_code },
				dataType: "json",
				success: function (response) {
					if (response){
						$(".student-details-card").removeClass("d-none");
						
						console.log(response);
						// Fill form fields
						$("#FirstNameEN").val(response.FirstName_EN);
						$("#LastNameEN").val(response.LastName_EN);
						$("#FirstNameUR").val(response.FirstName_UR);
						$("#LastNameUR").val(response.LastName_UR);
						$("#TxtFatherNameEN").val(response.FatherName_EN);
						$("#TxtFatherNameUR").val(response.FatherName_UR);
						$("#DOB").val(response.DateOfBirth);
						$("#CNICNumber").val(response.CNICNumber);
						$("#MobileNumber").val(response.MobileNumber);
						$("#PermanentAddress").val(response.PermanentAddress);
						$("#TemporaryAddress").val(response.TemporaryAddress);
						$("#TxtClassCode").val(response.Class);
						$("#PreviousMadrasa").val(response.PreviousMadrasa);
						$("#Guardian").val(response.Guardian);
						$("#GuardianMobileNumber").val(response.GuardianMobileNumber);
						$("#GuardianCNICNumber").val(response.GuardianCNICNumber);

						// Set Residency Radio
						if (response.ResidencyStatus == "Resident") {
							$("#TxtMuqeem1").prop("checked", true);
						} else if (response.ResidencyStatus == "NonResident") {
							$("#TxtMuqeem2").prop("checked", true);
						}

					} else {
						// If no valid data, show alert and clear form
						alert("Student not found.");
						clearFormFields();
						$(".student-details-card").addClass("d-none");
					}
				},
				error: function (xhr, status, error) {
					console.error("AJAX Error:", error);
					alert("Something went wrong. Please try again.");
					clearFormFields();
					$(".student-details-card").addClass("d-none");
				}
			});
		});
		
		function clearFormFields() {
			$("#TxtadmissionForm input[type='text'], #TxtadmissionForm input[type='date'], #TxtadmissionForm input[type='tel']").val('');
			$("#TxtadmissionForm select").val('');
			$("#TxtMuqeem1").prop("checked", false);
			$("#TxtMuqeem2").prop("checked", false);
		}//end if.	
	</script>
    </div><!-- col-lg-12 -->
</div><!-- row -->