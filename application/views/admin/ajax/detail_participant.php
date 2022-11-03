<div class="row">
	<div class="col-12">
		<!-- List Striped -->
		<!-- Step Form -->
		<form class="js-step-form"
			data-hs-step-form-options='{"progressSelector": "#basicVerStepFormProgress","stepsSelector": "#basicVerStepFormContent"}'>
			<div class="row">
				<div class="col-lg-3">
					<!-- Step -->
					<ul id="basicVerStepFormProgress" class="js-step-progress step step-icon-sm mb-7">
						<li class="step-item">
							<a class="step-content-wrapper" href="javascript:;"
								data-hs-step-form-next-options='{"targetSelector": "#basicForm"}'>
								<span class="step-icon step-icon-soft-dark">1</span>
								<div class="step-content pb-5">
									<span class="step-title mt-2">Personal Data</span>
								</div>
							</a>
						</li>

						<li class="step-item">
							<a class="step-content-wrapper" href="javascript:;"
								data-hs-step-form-next-options='{"targetSelector": "#otherForm"}'>
								<span class="step-icon step-icon-soft-dark">2</span>
								<div class="step-content pb-5">
									<span class="step-title mt-2">Others</span>
								</div>
							</a>
						</li>

						<li class="step-item">
							<a class="step-content-wrapper" href="javascript:;"
								data-hs-step-form-next-options='{"targetSelector": "#questionForm"}'>
								<span class="step-icon step-icon-soft-dark">3</span>
								<div class="step-content pb-5">
									<span class="step-title mt-2">Question</span>
								</div>
							</a>
						</li>

						<li class="step-item">
							<a class="step-content-wrapper" href="javascript:;"
								data-hs-step-form-next-options='{"targetSelector": "#programsForm"}'>
								<span class="step-icon step-icon-soft-dark">4</span>
								<div class="step-content pb-5">
									<span class="step-title mt-2">Programs</span>
								</div>
							</a>
						</li>

						<li class="step-item">
							<a class="step-content-wrapper" href="javascript:;"
								data-hs-step-form-next-options='{"targetSelector": "#selfPhotoForm"}'>
								<span class="step-icon step-icon-soft-dark stepy-last">5</span>
								<div class="step-content pb-5">
									<span class="step-title mt-2">Self Photo</span>
								</div>
							</a>
						</li>
					</ul>
					<!-- End Step -->
				</div>

				<div class="col-lg-9">
					<!-- Content Step Form -->
					<div id="basicVerStepFormContent">
						<div id="basicForm" class="active" style="min-height: 15rem;">
							<!-- List Striped -->
							<ul class="list-group list-group-lg">
								<li class="list-group-item p-2 active">
									<span style="margin-top: -20px; margin-left: 5px" class="fw-bold">Personal
										Data</span>
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Full Name</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->name;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Brithdate</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= date("F d, Y", $participants->birthdate);?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Gender</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->gender;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Address</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->address;?>. <?= $participants->province;?> -
												<?= $participants->city;?>, <?= $participants->postal_code;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Nationality</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span>
												<?php foreach($countries as $key => $val):?>
												<?php if($participants->nationality == $val->num_code):?>
												<?= $val->en_short_name; break;?>
												<?php endif;?>
												<?php endforeach;?>
											</span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Occupation</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->occupation;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Field of Study</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->field_of_study;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Institution / Workplace</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->institution_workplace;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Whatsapp Number</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->whatsapp_number;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Instagram Account</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->instagram;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Emergency Contact</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->emergency_contact;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Contact Relation</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->contact_relation;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">Disease History</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->disease_history;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
								<li class="list-group-item p-3">
									<div class="row">
										<div class="col-sm-4 mb-2 mb-sm-0">
											<span class="h6">T-Shirt Size</span>
										</div>
										<!-- End Col -->

										<div class="col-sm-8 mb-2 mb-sm-0">
											<span><?= $participants->tshirt_size;?></span>
										</div>
										<!-- End Col -->
									</div>
									<!-- End Row -->
								</li>
							</ul>
							<!-- End List Striped -->
						</div>

						<div id="otherForm" class="" style="display: none; min-height: 15rem;">
							<h4>Others</h4>

							<p>...</p>
						</div>

						<div id="questionForm" class="" style="display: none; min-height: 15rem;">
							<h4>Question</h4>

							<p>...</p>
						</div>

						<div id="programsForm" class="" style="display: none; min-height: 15rem;">
							<h4>Programs</h4>

							<p>...</p>
						</div>

						<div id="selfPhotoForm" class="" style="display: none; min-height: 15rem;">
							<h4>Self Photo</h4>

							<p>...</p>
						</div>
					</div>
					<!-- End Content Step Form -->
				</div>
			</div>
			<!-- End Row -->
		</form>
		<!-- End Step Form -->
		<!-- End List Striped -->
	</div>
</div>

<script src="<?= base_url(); ?>assets/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
<script>
	// INITIALIZATION OF STEP FORM
	// =======================================================
	new HSStepForm('.js-step-form', {
		finish($el) {
			const $successMessageTempalte = $el.querySelector('.js-success-message').cloneNode(true)

			$successMessageTempalte.style.display = 'block'

			$el.style.display = 'none'
			$el.parentElement.appendChild($successMessageTempalte)
		}
	})

</script>
