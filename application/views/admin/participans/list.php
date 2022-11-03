<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Participans
				<div class="btn-group float-end">
					<button class="btn btn-sm btn-success dropdown-toggle" type="button"
						id="dropdownMenuButtonClickAnimation" data-bs-toggle="dropdown" aria-expanded="false"
						data-bs-dropdown-animation>
						<i class="bi-file-earmark-excel-fill"></i>&nbsp;
						Export
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonClickAnimation">
						<a class="dropdown-item" href="<?= site_url('admin/participant/export/1')?>">All</a>
						<a class="dropdown-item" href="<?= site_url('admin/participant/export/2')?>">Verified</a>
						<a class="dropdown-item" href="<?= site_url('admin/participant/export/3')?>">Submited</a>
						<a class="dropdown-item" href="<?= site_url('admin/participant/export/4')?>">Checked</a>
					</div>
				</div>
			</h1>
			<p class="docs-page-header-text">List of all participans.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Email</label>
						<input type="text" id="filter_email" class="form-control form-control-sm"
							placeholder="Email Filter" />
					</div>

					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Name</label>
						<input type="text" id="filter_name" class="form-control form-control-sm"
							placeholder="Name Filter">
					</div>

					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Phone</label>
						<input type="text" id="filter_number" class="form-control form-control-sm"
							placeholder="Phone Filter">
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Account</label>
						<select id="filter_verified" class="form-control form-control-sm">
							<option value="">All</option>
							<option value="1">Verified</option>
							<option value="0">Not Verified</option>
							<option value="2">Suspend</option>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Steps</label>
						<select id="filter_step" class="form-control form-control-sm">
							<option value="">All</option>
							<option value="1">(1) Personal Data</option>
							<option value="2">(2) Others</option>
							<option value="3">(3) Question</option>
							<option value="4">(4) Programs</option>
							<option value="5">(5) Self Photo</option>
							<option value="6">(6) Payment & Agreement</option>
							<option value="7">Waiting for review</option>
						</select>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Submited</label>
						<select id="filter_submited" class="form-control form-control-sm">
							<option value="">All</option>
							<option value="2">Submited</option>
							<option value="1">Not Submited</option>
						</select>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Checked</label>
						<select id="filter_checked" class="form-control form-control-sm">
							<option value="">All</option>
							<option value="3">Checked/Accepted</option>
							<option value="2">Not Checked</option>
							<option value="4">Rejected</option>
						</select>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<button class="btn btn-sm btn-primary mt-4" onclick="btnSearch()"><i
								class="bi-search"></i>&nbsp&nbspSearch</button>
					</div>
				</div>
				<!-- End Row -->
				<table id="dataTable" class="table table-borderless table-thead-bordered nowrap w-100">
					<thead class="thead-light">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Action</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Step</th>
							<th scope="col">Account Status</th>
							<th scope="col">Submit Status</th>
							<th scope="col">Check Status</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlParticipantDetail" tabindex="-1" aria-labelledby="mdlDeleteLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mdlDeleteLabel">Participant Detail</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="modalParticipantContent">
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="mdlChangePass" tabindex="-1" aria-labelledby="mdlDeleteLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mdlDeleteLabel">Change Password</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body text-center">
				<div class="text-center">Are you sure to change the password? new passwords: <span
						class="mdlChangePass_passLabel" style="font-weight: bold;"></span></div>
			</div>

			<div class="modal-footer">
				<form action="<?= site_url('api/master/changeParticipanPassword')?> " method="post"
					class="js-validate need-validate" novalidate>
					<input type="hidden" name="id" id="mdlChangePass_id">
					<input type="hidden" name="pass" id="mdlChangePass_pass">
					<button type="button" class="btn btn-outline-secondary btn-sm"
						data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-soft-success btn-sm">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="mdlChecked" tabindex="-1" aria-labelledby="mdlDeleteLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mdlDeleteLabel">Checked/Accepted Participant</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body text-center">
				<div class="text-center">Are you sure to checked/accepted this participant submission?</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
				<form action="<?= site_url('api/admin/checkedParticipant')?> " method="post"
					class="js-validate need-validate" novalidate>
					<input type="hidden" name="id" class="mdlChecked_id">
					<button type="submit" class="btn btn-soft-success btn-sm">Check</button>
				</form>
				<form action="<?= site_url('api/admin/rejectedParticipant')?> " method="post"
					class="js-validate need-validate" novalidate>
					<input type="hidden" name="id" class="mdlChecked_id">
					<button type="submit" class="btn btn-soft-danger btn-sm">Rejected</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<script>
	var table = $('#dataTable').DataTable({
		'processing': true,
		'serverSide': true,
		'ordering': false,
		'searching': false,
		"scrollX": true,
		'responsive': true,
		'serverMethod': 'post',
		'ajax': {
			'url': "<?= site_url('admin/getAjaxParticipant')?>",
			'data': function (d) {
				d.filterEmail = $('#filter_email').val()
				d.filterName = $('#filter_name').val()
				d.filterNumber = $('#filter_number').val()
				d.filterVerified = $('#filter_verified').val()
				d.filterSubmited = $('#filter_submited').val()
				d.filterChecked = $('#filter_checked').val()
				d.filterStep = $('#filter_step').val()
			}
		},
		'columns': [{
				data: 'no'
			},
			{
				data: 'action'
			},
			{
				data: 'name'
			},
			{
				data: 'email'
			},
			{
				data: 'step'
			},
			{
				data: 'accountStatus'
			},
			{
				data: 'submitStatus'
			},
			{
				data: 'checkStatus'
			}
		]
	});
	const showMdlParticipantDetail = id => {
		$('#mdlChecked_id').val(id);

		$("#modalParticipantContent").html(
			`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
		);

		$('#mdlParticipantDetail').modal('show')

		jQuery.ajax({
			url: "<?= site_url('admin/getDetailParticipant') ?>",
			type: 'POST',
			data: {
				user_id: id
			},
			success: function (data) {
				$("#modalParticipantContent").html(data);
			}
		});
	}

	const showMdlChangePassword = id => {
		const pass = Math.random().toString(36).slice(-8);
		$('#mdlChangePass_id').val(id);
		$('#mdlChangePass_pass').val(pass);
		$('.mdlChangePass_passLabel').html(pass);
		$('#mdlChangePass').modal('show')
	}

	const showMdlChecked = id => {
		$('.mdlChecked_id').val(id);
		$('#mdlChecked').modal('show')
	}

	function btnSearch() {
		table.ajax.reload();
	}

</script>
