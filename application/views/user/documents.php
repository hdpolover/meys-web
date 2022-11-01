<div class="d-grid gap-3 gap-lg-5">
	<!-- Card -->
	<div class="card">
		<div class="card-header border-bottom">
			<h4 class="card-header-title">Documents</h4>
		</div>

		<div class="card-body">
			<div class="row">
				<?php if(!empty($documents)):?>
				<?php foreach($documents as $val):?>
				<div class="col-4">
					<!-- Card -->
					<div class="card card-sm card-transition shadow-sm">
						<img class="card-img-top p-4" src="<?= base_url();?><?= $web_logo;?>" alt="Image Description">

						<div class="card-body">
							<h4 class="card-title"><?= $val->title;?></h4>

							<div class="d-grid">
								<?php if($val->is_source):?>
								<a href="<?= $val->source;?>"
									class="<?= $val->btn_style;?> mb-2"><?= $val->btn_text;?></a>
								<?php endif;?>
								<?php if($val->is_second_source):?>
								<a href="<?= $val->second_source;?>"
									class="<?= $val->btn_second_style;?>"><?= $val->btn_second_text;?></a>
								<?php endif;?>
							</div>
						</div>
					</div>
					<!-- End Card -->
				</div>

				<?php endforeach;?>
				<?php endif;?>
			</div>
		</div>
		<div class="card-footer pt-0">
			<div class="card-footer">
				<p><b>Note:</b></p>
				<p>For further information, you can contact: <a href="mailto:<?= $web_email;?>"><?= $web_email;?></a>
				</p>
			</div>
		</div>
	</div>
	<!-- End Card -->
</div>
