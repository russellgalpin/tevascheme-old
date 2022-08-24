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
									<img src="/img/icon-flu.png" alt="Flu Wise">
									<h2>FluWise Kit</h2>
								<p>Complete resource kit to help you promote and deliver an effective flu service</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/fluwise"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

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
									<img src="/img/icon-mur.png" alt="MUR Advantage">
									<h2>MUR Advantage</h2>
								<p>Providing pharmacists with a range of innovative Medicines Use Review (MUR) resources</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/mur-advantage"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-tmur.png" alt="t MUR Advantage">
									<h2>t MUR Advantage</h2>
								<p>Tools to help pharmacists target the right patients for targeted MURs</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/tmur-advantage"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-nms.png" alt="NMS Advantage">
									<h2>NMS Advantage</h2>
								<p>Resources designed to help pharmacists in England deliver the New Medicine Service</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/nms-advantage"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-dmr.png" alt="DMR Advantage">
									<h2>DMR Advantage</h2>
								<p>Essential resources which aim to support pharmacists in Wales deliver the Discharge Medicines Review service</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/dmr-advantage"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-learning.png" alt="Teva Learning Zone">
									<h2>Teva Learning Zone</h2>
								<p>An online learning platform to help staff improve their skills</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/teva-learning-zone"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<!-- <div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-tips.png" alt="Tips on the Tariff">
									<h2>Tips on the Tariff</h2>
								<p>Understanding key aspects of the Drug Tariff</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/tips-on-the-tariff"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div> -->

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-patient.png" alt="Generic Patient Communication Kit">
									<h2>Generic Patient Communication Kit</h2>
								<p>Support tools that help you communicate generic medicine changes to patients</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/generics-patient-comm-kit"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-cms.png" alt="CMS Advantage">
									<h2>CMS Advantage</h2>
								<p>Chronic Medication Service resources for pharmacists in Scotland</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/cms-advantage"><button class="btn-primary">Find out more</button></a>
								</div>
							</div>
						</div>

						<div class="service col-ml-1-2 col-ts-1-3 col-tl-1-4">
							<div class="service-inner">
									<img src="/img/icon-cms2.png" alt="CMS Advantage 2">
									<h2>CMS Advantage 2</h2>
								<p>Additional Chronic Medication Service resources covering high risk and new medicines for pharmacists in Scotland</p>
							
								<div class="service-link">
									<a href="/pharmacy/support/cms-advantage-2"><button class="btn-primary">Find out more</button></a>
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