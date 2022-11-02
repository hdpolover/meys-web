<div class="d-grid gap-3 gap-lg-5">
	<!-- Card -->
	<div class="card">
		<div class="card-header border-bottom">
			<h4 class="card-header-title">Payment History
                <a href="<?= site_url('user/payment');?>" class="btn btn-outline-secondary btn-sm float-end">back</a>
            </h4>
		</div>

		<div class="card-body">
			<div class="row">
				<table class="table table-borderless table-thead-bordered datatable">
					<thead class="thead-light">
						<tr>
							<th scope="col">Payment</th>
							<th scope="col">Date</th>
							<th scope="col">Method</th>
							<th scope="col">Type</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($payment_history)):?>
						<?php foreach($payment_history as $key => $val):?>
						<tr>
							<td scope="col"><?= $val->summit;?></td>
							<td scope="col"><?= date('F d, Y H:i:s', $val->created_at);?></td>
							<td scope="col"><?= $val->payment_method;?></td>
							<td scope="col">
								<img style="max-width: 75px;" src="<?= $val->img_method;?>" />
							</td>
							<td scope="col">
								<?php if($val->status == 1):?>
								<span class="badge bg-secondary">pending</span>
								<?php elseif($val->status == 2):?>
								<span class="badge bg-success">success</span>
								<?php elseif($val->status == 3):?>
								<span class="badge bg-danger">canceled</span>
								<?php elseif($val->status == 4):?>
								<span class="badge bg-warning">-</span>
								<?php else:?>
								<span class="badge bg-warning">-</span>
								<?php endif;?>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer pt-0">
		</div>
	</div>
	<!-- End Card -->
</div>
