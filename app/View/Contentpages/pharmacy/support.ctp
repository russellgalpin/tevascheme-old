<?php
// Header markup
echo $this->element('pharmacy/header');

echo '<main class="container">';
// CMS inner
// echo $inner['innerpage']['body'];
?>

<section class="section-one">
	<h1>Discover all that <strong>Pharmacy Support</strong> has to offer</h1>
</section>

<section class="section-two">

<div class="flex row">
	<article class="col-ts-1-1">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingOne">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h2>What we provide<span class="open-close"></span></h2>
				</button>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="content card-body">
						<h3>Innovative and practical solutions for pharmacists</h3>
						<p>Enhance your business with Teva's pharmacy support services, developed with busy pharmacies in mind. These services offer practical solutions to help you support both patients and your business.</p>
					</div>
					<img src="/img/roundalls-1.svg" alt="Roundalls" class="roundalls">
				</div>
			</div>
		</div>
	</article>
</div>

<div class="flex row">
	<article class="col-ts-1-1">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingFive">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
					<h2>Our services<span class="open-close"></span></h2>
				</button>
				<div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample">
					<div class="grid row">

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-inhaler.png" alt="Inhaler Recycling">
									<h2>Inhaler Recycling</h2>
								<p>Inhaler recycling service to enable your patients to recycle their used inhalers</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/inhaler-recycling"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/ltr-logo-grey.svg" alt="Let's Talk Respiratory" style="height: 175px;">
									<h2>Let's Talk Respiratory</h2>
								<p>Our educational programme of supportive materials, resources and some of the latest news in respiratory for both you and your patients</p>
							
								<div class="service-link">
									<a href="https://letstalkrespiratory.com/" target="_blank"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>

</section>

<section class="section-three">
	<div class="bottom-banner">
		<h3>Ready to join us?</h3>
		<p>Speak to your Teva Territory Manager today or call us on <a href="tel:08003894644">0800 389 4644</a></p>
			<a href="/pharmacy/sign-up">
				<button class="btn-primary">Sign up today</button>
			</a>
	</div>
</section>

<?php
echo '</main>';

// Footer markup
echo $this->element('pharmacy/footer');

?>