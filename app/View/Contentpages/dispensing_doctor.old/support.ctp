<?php
// Header markup
echo $this->element('dispensing_doctor/header');

echo '<main class="container">';
// CMS Content
// echo $content['Contentpage']['body'];
?>

<section class="section-one">
	<h1>Discover all that <strong>Dispensing Doctor</strong> has to offer</h1>
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
						<h3>Build a better dispensing doctors practice</h3>
						<p>Support your business and patients with Teva's Dispensing Doctor Support services. Developed with busy dispensing doctors practices in mind, these services offer practical solutions to help you address the challenges associated with todays dispensing practices. It's our way of showing our support and commitment as well as offering our customers something extra.</p>
					</div>
					<img src="/img/roundalls-6.svg" alt="Roundalls" class="roundalls">
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
									<img src="/img/icon-learning.png" alt="Teva Learning Zone">
									<h2>Teva Learning Zone</h2>
								<p>An online learning platform to help staff improve their skills</p>
							
								<div class="service-link">
									<a href="/dispensing-doctor/support/teva-learning-zone"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-patient.png" alt="Generic Patient Communication Kit">
									<h2>Generic Patient Communication Kit</h2>
								<p>Support tools that help you communicate generic medicine changes to patients</p>
							
								<div class="service-link">
									<a href="/dispensing-doctor/support/generics-patient-comm-kit"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-inhaler.png" alt="Inhaler Recycling">
									<h2>Inhaler Recycling</h2>
								<p>Support tools to help promote the inhaler recycling facility to patients</p>
							
								<div class="service-link">
									<a href="/dispensing-doctor/support/inhaler-recycling"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-drum.png" alt="DRUM E-Learning">
									<h2>DRUM E-Learning</h2>
								<p>Dispensing Review of the Use of Medicines (DRUMs)</p>
							
								<div class="service-link">
									<a href="/dispensing-doctor/support/drum-e-learning"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/ltr-logo-grey.svg" alt="Let's Talk Respiratory">
									<h2>Let's Talk Respiratory</h2>
								<p>Our educational programme of supportive materials, resources and some of the latest news in respiratory for both you and your patients</p>
							
								<div class="service-link">
									<a href="https://teva.letstalkrespiratory.com/uk/products/" target="_blank"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>
<!-- 
						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-tips.png" alt="Tips on the Tariff">
									<h2>Tips on the Tariff</h2>
								<p>Understanding key aspects of the Drug Tariff</p>
							
								<div class="service-link">
									<a href="/dispensing-doctor/support/tips-on-the-tariff"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div> -->

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
			<a href="/dispensing-doctor/sign-up">
				<button class="btn-primary">Sign up today</button>
			</a>
	</div>
</section>

<?php
echo '</main>';

// Footer markup
echo $this->element('dispensing_doctor/footer');
?>