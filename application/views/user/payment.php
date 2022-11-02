<div class="d-grid gap-3 gap-lg-5">
	<!-- Card -->
	<div class="card">
		<div class="card-header border-bottom">
			<h4 class="card-header-title">Payment</h4>
		</div>

		<div class="card-body">
			<?php if(!empty($payment_batch)):?>
			<?php foreach($payment_batch as $key => $val):?>
			<div class="col col-sm-6 mb-6">
				<!-- Card -->
				<div class="card card-sm" style="max-width: 20rem;">
					<div class="card-header border-bottom">
						<h3 class="card-title" style="margin-bottom: 0px !important;"><?= $val->summit?></h3>
						<small>West Indonesian Time (GMT+7)</small>
						<br>
					</div>
					<div class="card-body">
						<div class="mb-4">
							<span class="card-subtitle">Open:</span>
							<h5><?= date("F d, Y H:i", $val->start_date)?></h5>
						</div>
						<div class="mb-4">
							<span class="card-subtitle">Close:</span>
							<h5><?= date("F d, Y 23:59", $val->end_date)?></h5>
						</div>
						<div>
							<span class="card-subtitle">Total (IDR)</span>
							<h3 class="text-primary">Rp<?= number_format($val->amount)?></h3>
							<b>OR</b>
							<span class="card-subtitle mt-1">Total (USD)</span>
							<h3 class="text-primary">$<?= $val->amount_usd?></h3>
						</div>
						<button type="button" class="btn btn-soft-success btn-sm purchase-button w-100 mt-2">waiting for
							open</button>
						<button type="button" class="btn btn-soft-primary btn-sm purchase-button w-100 mt-2 d-none"
							data-bs-toggle="modal" data-bs-target="#manual-transfer-<?= $val->id;?>">Manual
							Transfer</button>
						<a href="<?= site_url('user/payments-history');?>"
							class="btn btn-info btn-sm purchase-button w-100 mt-2">History</a>
					</div>
				</div>
				<!-- End Card -->
			</div>
			<!-- Modal -->
			<div class="modal fade" id="manual-transfer-<?= $val->id;?>" tabindex="-1"
				aria-labelledby="manual-transfer-title-<?= $val->id;?>Label" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="manual-transfer-title-<?= $val->id;?>Label">Manual Transfer -
								<?= $val->summit;?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">
							<form action="<?= site_url('api/payment/manualPayment')?>" method="POST"
								enctype="multipart/form-data">
								<div class="form-group">
									<label class="mb-2" for="">Method Payment</label>
									<div class="row gx-3" role="tablist">
										<?php if(!empty($payment_settings)):?>
										<?php $no = 1; foreach($payment_settings as $k => $v):?>
										<div class="col-6 col-md-4 mb-3">
											<!-- Radio Check -->
											<div class="form-check form-check-card text-center">
												<input class="form-check-input" type="radio" name="method_payment"
													value="<?= $v->code_method;?>" id="method_payment-<?= $v->id;?>"
													<?= $no++ == 1 ? 'checked' : '';?>>
												<label class="form-check-label" for="method_payment-<?= $v->id;?>">
													<div class="h-100 payments-height-user d-flex align-items-center">
														<img class="w-100 h-auto mb-3"
															src="<?= base_url()?><?= $v->img_method;?>" alt="SVG">
													</div>
													<span class="d-block"><?= $v->payment_method;?></span>
												</label>
											</div>
											<!-- End Radio Check -->
										</div>
										<!-- End Col -->
										<?php endforeach;?>
										<?php endif;?>
									</div>
									<!-- End Row -->
								</div>

								<div class="mb-3">
									<label for="poster-announcements" class="form-label">Evidance</label>
									<figure>
										<img src="#" id="imgthumbnail" class="img-thumbnail img-fluid mb-2"
											alt="Thumbnail image"
											onerror="this.onerror=null;this.src='<?= base_url();?>assets/images/placeholder.jpg';">
									</figure>
									<div class="input-group">
										<input type="file" class="form-control imgprev" name="image" accept="image/*"
											id="poster-announcements">
									</div>
									<small class="text-muted">Max file size 1Mb</small>
								</div>

								<div class="form-group mt-2">
									<label for="">Remarks</label><span class="text-danger">*</span>
									<input type="text" name="remarks" class="form-control form-control-sm"
										placeholder="Name of Participant" required>
								</div>
						</div>

						<div class="modal-footer">
							<input type="hidden" name="id_payment_type" id="mdlManual_id">
							<button type="button" class="btn btn-outline-secondary"
								data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-soft-success">Make Payment</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			<?php endforeach;?>
			<?php endif;?>
		</div>
		<div class="card-footer pt-0">
		</div>
	</div>
	<!-- End Card -->
</div>

<script>
	const changeGuide = method => {
		$('#payGuide').html(method);
	}

</script>
