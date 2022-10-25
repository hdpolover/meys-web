<div class="d-grid gap-3 gap-lg-5">
	<!-- Card -->
	<div class="card">
		<div class="card-header border-bottom">
			<h4 class="card-header-title">Your information</h4>
		</div>

		<!-- Body -->
		<div class="card-body">
			<!-- Step Form -->
			<form class="js-step-form-validate js-validate" data-hs-step-form-options='{
    "progressSelector": "#validationFormProgress",
    "stepsSelector": "#validationFormContent",
    "endSelector": "#validationFormFinishBtn",
    "isValidate": true
  }'>
				<!-- Step -->
				<ul id="validationFormProgress"
					class="js-step-progress step step-sm step-icon-sm step-inline step-item-between mb-7">
					<li class="step-item">
						<a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
          "targetSelector": "#validationFormAccount"
        }'>
							<span class="step-icon step-icon-soft-dark">1</span>
							<div class="step-content">
								<span class="step-title">Account</span>
							</div>
						</a>
					</li>

					<li class="step-item">
						<a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
           "targetSelector": "#validationFormProfile"
         }'>
							<span class="step-icon step-icon-soft-dark">2</span>
							<div class="step-content">
								<span class="step-title">Profile</span>
							</div>
						</a>
					</li>

					<li class="step-item">
						<a class="step-content-wrapper" href="javascript:;" data-hs-step-form-next-options='{
           "targetSelector": "#validationFormAddress"
         }'>
							<span class="step-icon step-icon-soft-dark">3</span>
							<div class="step-content">
								<span class="step-title">Address</span>
							</div>
						</a>
					</li>
				</ul>
				<!-- End Step -->

				<!-- Content Step Form -->
				<div id="validationFormContent">
					<div id="validationFormAccount" class="active">
						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormUsernameLabel"
								class="col-sm-3 col-form-label form-label">Username</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="username"
										id="validationFormUsernameLabel" placeholder="Username" aria-label="Username"
										required data-msg="Please enter your username.">
									<span class="invalid-feedback">Please enter a valid username.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormNewPasswordLabel" class="col-sm-3 col-form-label form-label">New
								password</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="newPassword"
										id="validationFormNewPasswordLabel" placeholder="New password"
										aria-label="New password" required
										data-msg="Your password is invalid. Please try again.">
									<span class="invalid-feedback">Please enter a valid password.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormCurrentPasswordLabel"
								class="col-sm-3 col-form-label form-label">Current password</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="currentPassword"
										id="validationFormCurrentPasswordLabel" placeholder="Current password"
										aria-label="Current password" required
										data-msg="Password does not match the confirm password.">
									<span class="invalid-feedback">Please enter a valid current password.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Footer -->
						<div class="d-flex align-items-center">
							<div class="ms-auto">
								<button type="button" class="btn btn-primary" data-hs-step-form-next-options='{
                    "targetSelector": "#validationFormProfile"
                  }'>
									Next <i class="bi-chevron-right small"></i>
								</button>
							</div>
						</div>
						<!-- End Footer -->
					</div>

					<div id="validationFormProfile" style="display: none;">
						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormFirstNameLabel" class="col-sm-3 col-form-label form-label">First
								name</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="firstName"
										id="validationFormFirstNameLabel" placeholder="First name"
										aria-label="First name" required data-msg="Please enter your first name.">
									<span class="invalid-feedback">Please enter a valid first name.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormLastNameLabel" class="col-sm-3 col-form-label form-label">Last
								name</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="lastName"
										id="validationFormLastNameLabel" placeholder="Last name" aria-label="Last name"
										required data-msg="Please enter your last name.">
									<span class="invalid-feedback">Please enter a valid last name.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormEmailLabel"
								class="col-sm-3 col-form-label form-label">Email</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="email"
										id="validationFormEmailLabel" placeholder="Email address"
										aria-label="Email address" required
										data-msg="Please enter a valid email address.">
									<span class="invalid-feedback">Please enter a valid email.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Footer -->
						<div class="d-flex align-items-center">
							<button type="button" class="btn btn-ghost-secondary me-2" data-hs-step-form-prev-options='{
             "targetSelector": "#validationFormAccount"
           }'>
								<i class="bi-chevron-left small"></i> Previous step
							</button>

							<div class="ms-auto">
								<button type="button" class="btn btn-primary" data-hs-step-form-next-options='{
                    "targetSelector": "#validationFormAddress"
                  }'>
									Next <i class="bi-chevron-right small"></i>
								</button>
							</div>
						</div>
						<!-- End Footer -->
					</div>

					<div id="validationFormAddress" style="display: none;">
						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormAddress1Label" class="col-sm-3 col-form-label form-label">Address
								1</label>

							<div class="col-sm-9">
								<div class="js-form-message">
									<input type="password" class="form-control" name="address1"
										id="validationFormAddress1Label" placeholder="Address 1" aria-label="Address 1"
										required data-msg="Please enter your address.">
									<span class="invalid-feedback">Please enter a valid address.</span>
								</div>
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Form Group -->
						<div class="row mb-4">
							<label for="validationFormAddress2Label" class="col-sm-3 col-form-label form-label">Address
								2 <span class="form-label-secondary">(Optional)</span></label>

							<div class="col-sm-9">
								<input type="password" class="form-control" name="address2"
									id="validationFormAddress2Label" placeholder="Address 2" aria-label="Address 2">
							</div>
						</div>
						<!-- End Form Group -->

						<!-- Footer -->
						<div class="d-sm-flex align-items-center">
							<button type="button" class="btn btn-ghost-secondary mb-3 mb-sm-0 me-2"
								data-hs-step-form-prev-options='{
             "targetSelector": "#validationFormProfile"
           }'>
								<i class="bi-chevron-left small"></i> Previous step
							</button>

							<div class="d-flex justify-content-end ms-auto">
								<button type="button" class="btn btn-white me-2" data-dismiss="modal"
									aria-label="Close">Cancel</button>
								<button id="validationFormFinishBtn" type="button" class="btn btn-primary">Save
									Changes</button>
							</div>
						</div>
						<!-- End Footer -->
					</div>
				</div>
				<!-- End Content Step Form -->

				<!-- Message Body -->
				<div id="validationFormSuccessMessage" class="js-success-message" style="display:none;">
					<div class="text-center">
						<img class="img-fluid mb-3" src="<?= base_url();?>assets/svg/illustrations/oc-hi-five.svg"
							alt="Image Description" style="max-width: 15rem;">

						<div class="mb-4">
							<h2>Successful!</h2>
							<p>Your changes have been successfully saved.</p>
						</div>

						<div class="d-flex justify-content-center">
							<a class="btn btn-white me-3" href="#">
								<i class="bi-chevron-left small ms-1"></i> Back to projects
							</a>
							<a class="btn btn-primary" href="#">
								<i class="tio-city me-1"></i> Add new project
							</a>
						</div>
					</div>
				</div>
				<!-- End Message Body -->
				<!-- End Step Form -->
		</div>
		<!-- End Body -->
		</form>
	</div>
	<!-- End Card -->

	<!-- Card -->
	<div class="card d-none">
		<div class="card-header border-bottom">
			<h4 class="card-header-title">Delete your account</h4>
		</div>

		<!-- Body -->
		<div class="card-body">
			<p class="card-text">When you delete your account, you lose access to Front account services, and
				we permanently delete your personal data. You can cancel the deletion for 14 days.</p>

			<div class="mb-4">
				<!-- Check -->
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="deleteAccountCheckbox">
					<label class="form-check-label" for="deleteAccountCheckbox">Confirm that I want to delete
						my account.</label>
				</div>
				<!-- End Check -->
			</div>

			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
		<!-- End Body -->
	</div>
	<!-- End Card -->
</div>
