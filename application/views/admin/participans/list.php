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
				<div class="row mb-4">
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Email</label>
						<input type="text" id="filter_email" class="form-control" placeholder="Email Filter" />
					</div>

					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Name</label>
						<input type="text" id="filter_name" class="form-control" placeholder="Name Filter">
					</div>

					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Phone Number</label>
						<input type="text" id="filter_number" class="form-control" placeholder="Phone Filter">
					</div>
				</div>
				<div class="row d-none">
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Verified</label>
						<select id="filter_verified" class="form-control">
							<option value="">All</option>
							<option value="1">Verified</option>
							<option value="0">Not Verified</option>
						</select>
					</div>

					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Submited</label>
						<select id="filter_submited" class="form-control">
							<option value="">All</option>
							<option value="1">Submited</option>
							<option value="0">Not Submited</option>
						</select>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Checked</label>
						<select id="filter_checked" class="form-control">
							<option value="">All</option>
							<option value="1">Checked</option>
							<option value="0">Not Checked</option>
						</select>
					</div>
				</div>
				<button class="btn btn-sm btn-primary mb-4" onclick="btnSearch()"><i
						class="bi-search"></i>&nbsp&nbspSearch</button>
				<!-- End Row -->
				<table id="dataTable" class="table table-borderless table-thead-bordered w-100">
					<thead class="thead-light">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Action</th>
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
<script>
	var table = $('#dataTable').DataTable({
		'processing': true,
		'serverSide': true,
		'ordering': false,
		'searching': false,
		'serverMethod': 'post',
		'ajax': {
			'url': "<?= site_url('admin/getAjaxParticipant')?>",
			'data': function (d) {
				d.filterEmail = $('#filter_email').val()
				d.filterName = $('#filter_name').val()
				d.filterNumber = $('#filter_number').val()
				// d.filterVerified = $('#filter_verified').val()
				// d.filterSubmited = $('#filter_submited').val()
				// d.filterChecked = $('#filter_checked').val()
			}
		},
		'columns': [{
				data: 'no'
			},
			{
				data: 'name'
			},
			{
				data: 'email'
			},
			// {
			// 	data: 'step'
			// },
			// {
			// 	data: 'statusSubmit'
			// },
			// {
			// 	data: 'statusCheck'
			// },
			{
				data: 'action'
			}
		]
	});
	const showMdlChangePassword = id => {
		const pass = Math.random().toString(36).slice(-8);
		$('#mdlChangePass_id').val(id);
		$('#mdlChangePass_pass').val(pass);
		$('.mdlChangePass_passLabel').html(pass);
		$('#mdlChangePass').modal('show')
	}
	const showMdlChecked = id => {
		const pass = Math.random().toString(36).slice(-8);
		$('#mdlChecked_id').val(id);
		$('#mdlChecked').modal('show')
	}

	function btnSearch() {
		table.ajax.reload();
	}

	$(".selectorDetail").click(function () {

		var user_id = $(this).attr('id');
		$("#modalUserContent").html(
			`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
		);

		jQuery.ajax({
			url: "<?= site_url('admin/getDetailUser') ?>",
			type: 'POST',
			data: {
				user_id: user_id
			},
			success: function (data) {
				$("#modalUserContent").html(data);
			}
		});
	});

	$(".selectorApplicant").click(function () {

		var user_id = $(this).attr('id');
		$("#modalApplicantContent").html(
			`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
		);

		jQuery.ajax({
			url: "<?= site_url('admin/getDetailApplicant') ?>",
			type: 'POST',
			data: {
				user_id: user_id
			},
			success: function (data) {
				$("#modalApplicantContent").html(data);
			}
		});
	});

</script>
