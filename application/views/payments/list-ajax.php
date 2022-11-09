<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Payments
			</h1>
			<p class="docs-page-header-text">Manage payments for your programs.</p>
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
						<label for="">Institution</label>
						<input type="text" id="filter_institution" class="form-control form-control-sm"
							placeholder="Institiution filter">
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Payment Batch/Summit</label>
						<select id="filter_batch" class="form-control form-control-sm">
							<option value="">All</option>
							<option value="1">(1) Personal Data</option>
						</select>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<label for="">Payment Status</label>
						<select id="filter_status" class="form-control form-control-sm">
							<option value="">All</option>
							<option value="1">Pending</option>
							<option value="2">Success</option>
							<option value="3">Cancel</option>
							<option value="4">Expired</option>
							<option value="5">Deny</option>
						</select>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
						<button class="btn btn-sm btn-primary mt-4" onclick="btnSearch()"><i
								class="bi-search"></i>&nbsp&nbspSearch</button>
					</div>
					<div class="col-sm mb-2 mb-sm-0">
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
							<th scope="col">Institution</th>
							<th scope="col">Status</th>
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
<div class="modal fade" id="mdlPaymentDetail" tabindex="-1" aria-labelledby="mdlDeleteLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mdlDeleteLabel">Payment Detail</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="modalPaymentContent">
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade" id="mdlPaymentDetailVerif" tabindex="-1" aria-labelledby="mdlDeleteLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mdlDeleteLabel">Verification</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body">
				<h5>Payment proff</h5>
				<img src="<?= base_url();?>assets/images/placeholder.jpg" class="img-thumbnail w-100 mb-3" alt="">
				<div class="text-center">Are you sure to verification this payment?</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
				<form action="<?= site_url('api/payments/verificationPayment')?> " method="post"
					class="js-validate need-validate" novalidate>
					<input type="hidden" name="id" id="mdlVerif_id">
					<button type="submit" class="btn btn-soft-success btn-sm">Verification</button>
				</form>
				<form action="<?= site_url('api/payments/rejectedPayment')?> " method="post"
					class="js-validate need-validate" novalidate>
					<input type="hidden" name="id" class="mdlVerif_id">
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
			'url': "<?= site_url('admin/getAjaxPayment')?>",
			'data': function (d) {
				d.filterEmail = $('#filter_email').val()
				d.filterName = $('#filter_name').val()
				d.filterNumber = $('#filter_number').val()
				d.filterInstitution = $('#filter_institution').val()
				d.filterBatch = $('#filter_batch').val()
				d.filterStatus = $('#filter_status').val()
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
				data: 'institution'
			},
			{
				data: 'status'
			}
		]
	});
	const showMdlPaymentDetail = id => {
		$('#mdlChecked_id').val(id);

		$("#modalPaymentContent").html(
			`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading ...</center>`
		);

		$('#mdlPaymentDetail').modal('show')

		jQuery.ajax({
			url: "<?= site_url('admin/getDetailPayment') ?>",
			type: 'POST',
			data: {
				user_id: id
			},
			success: function (data) {
				$("#modalPaymentContent").html(data);
			}
		});
	}

	const showMdlVerif = id => {
		$('#mdlVerif_id').val(id);
		$('#mdlPaymentDetailVerif').modal('show')
	}

	function btnSearch() {
		table.ajax.reload();
	}

</script>
