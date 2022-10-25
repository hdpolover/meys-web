<!-- Hero -->
<div class="bg-img-start" style="background-image: url(<?= base_url();?>assets/svg/components/card-11.svg);">
	<div class="container content-space-t-3 content-space-t-lg-5 content-space-b-2">
		<div class="w-md-75 w-lg-50 text-center mx-md-auto">
			<h1>FAQ</h1>
			<p>Search our FAQ for answers to anything you might ask.</p>
		</div>
	</div>
</div>
<!-- End Hero -->
<!-- FAQ -->
<div class="container content-space-2 content-space-b-lg-3">
	<div class="w-lg-75 mx-lg-auto">
		<div class="d-grid gap-10">

			<?php if(!empty($faq)):?>
			<?php foreach($faq as $key => $val):?>
			<div class="d-grid gap-3">
				<h2><?= $val->title;?></h2>

				<?php if(!empty($val->lists)):?>
				<!-- Accordion -->
				<div class="accordion accordion-flush accordion-lg" id="accordionFAQ-<?= $val->id;?>">
					<?php foreach($val->lists as $k => $v):?>
					<!-- Accordion Item -->
					<div class="accordion-item">
						<div class="accordion-header" id="headingFAQ-<?= $v->id;?>">
							<a class="accordion-button <?= $val->order == 1 && $v->order == 1 ? '' : 'collapsed';?>" role="button" data-bs-toggle="collapse"
								data-bs-target="#collapseFaq-<?= $v->id;?>" aria-expanded="<?= $val->order == 1 && $v->order == 1 ? 'true' : 'false';?>"
								aria-controls="collapseFaq-<?= $v->id;?>">
								<?= $v->faq;?>
							</a>
						</div>
						<div id="collapseFaq-<?= $v->id;?>" class="accordion-collapse collapse <?= $val->order == 1 && $v->order == 1 ? 'show' : '';?>"
							aria-labelledby="headingFAQ-<?= $v->id;?>" data-bs-parent="#accordionFAQ-<?= $val->id;?>">
							<div class="accordion-body">
								<?= $v->content;?>
							</div>
						</div>
					</div>
					<!-- End Accordion Item -->
					<?php endforeach;?>
				</div>
				<!-- End Accordion -->
				<?php endif;?>
			</div>
			<?php endforeach;?>
			<?php endif;?>


			<div class="d-grid gap-3">
				<h2>Support</h2>

				<!-- Accordion -->
				<div class="accordion accordion-flush accordion-lg" id="accordionFAQSupport">
					<!-- Accordion Item -->
					<div class="accordion-item">
						<div class="accordion-header" id="headingSupportOne">
							<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
								data-bs-target="#collapseSupportOne" aria-expanded="false"
								aria-controls="collapseSupportOne">
								How do I get help with the theme I purchased?
							</a>
						</div>
						<div id="collapseSupportOne" class="accordion-collapse collapse"
							aria-labelledby="headingSupportOne" data-bs-parent="#accordionFAQSupport">
							<div class="accordion-body">
								Technical support for each theme is given directly by the creator of the theme. You'll
								be given a link to contact their support in a couple places:

								<ul>
									<li>Your confirmation email: Each theme in your confirmation email will have both
										the download link for your theme, and a "support" link which will connect you
										directly with the sellers support system or email.</li>
									<li>While logged in to your account go to Purchases > Click the Order # > Get
										Support</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Accordion Item -->

					<!-- Accordion Item -->
					<div class="accordion-item">
						<div class="accordion-header" id="headingSupportTwo">
							<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
								data-bs-target="#collapseSupportTwo" aria-expanded="false"
								aria-controls="collapseSupportTwo">
								What version of Bootstrap are the themes built on?
							</a>
						</div>
						<div id="collapseSupportTwo" class="accordion-collapse collapse"
							aria-labelledby="headingSupportTwo" data-bs-parent="#accordionFAQSupport">
							<div class="accordion-body">
								All of the themes are built on versions of Bootstrap v4, currently all are on the v4.0.0
								stable build. As more Bootstrap updates are launched the themes will be update as needed
								and as new features and bug fixes come out. You will want to download any updates that
								come out and update your installation as required.
							</div>
						</div>
					</div>
					<!-- End Accordion Item -->

					<!-- Accordion Item -->
					<div class="accordion-item">
						<div class="accordion-header" id="headingSupportThree">
							<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
								data-bs-target="#collapseSupportThree" aria-expanded="false"
								aria-controls="collapseSupportThree">
								What if I have a question that isn't answered here?
							</a>
						</div>
						<div id="collapseSupportThree" class="accordion-collapse collapse"
							aria-labelledby="headingSupportThree" data-bs-parent="#accordionFAQSupport">
							<div class="accordion-body">
								For anything we haven't covered feel free to reach out to the Bootstrap Themes team at
								<a href="#">themes@getbootstrap.com</a> !We're here to help.
							</div>
						</div>
					</div>
					<!-- End Accordion Item -->

					<!-- Accordion Item -->
					<div class="accordion-item">
						<div class="accordion-header" id="headingSupportFour">
							<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
								data-bs-target="#collapseSupportFour" aria-expanded="false"
								aria-controls="collapseSupportFour">
								Uh oh! Where's my theme download?
							</a>
						</div>
						<div id="collapseSupportFour" class="accordion-collapse collapse"
							aria-labelledby="headingSupportFour" data-bs-parent="#accordionFAQSupport">
							<div class="accordion-body">
								We just switched to a whole new platform and if you're a customer from our previous
								platform, we will be migrating you to the new platform, but in the meantime your
								download link for our old platform won't work.
							</div>
						</div>
					</div>
					<!-- End Accordion Item -->
				</div>
				<!-- End Accordion -->
			</div>
		</div>
	</div>
</div>
<!-- End FAQ -->
