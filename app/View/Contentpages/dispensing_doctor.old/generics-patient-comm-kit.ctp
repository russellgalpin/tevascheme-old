<?php
// Header markup
echo $this->element('dispensing_doctor/header');

echo '<main class="container support">';
?>

<section class="support-heading">
	<div class="heading-content">
		<h1>Generic Patient Communication Kit - helping to reassure your patients</h1>
		<img src="/img/roundalls-5.svg" alt="Roundalls" class="roundalls">
	</div>
</section>

<section class="support-banner">
	<img src="/img/roundalls-2.svg" alt="Roundalls" class="img-left">
	<img src="/img/roundalls-1.svg" alt="Roundalls" class="img-right">
		<div class="banner-content">
			<h3>Retail Price &pound;30 or free for eligible* TevaOne Members</h3>
			<p>*Each monthly spend of &pound;1000 or more, made in the previous three months, will entitle you to receive a Pharmacy Support Service free of charge.</p>
		</div>
</section>

<section class="support-content">

<div class="flex row">
	<article class="col-ts-2-3">
		<p>Teva's Generics Patient Communication Kit is designed to help you reassure patients who may raise questions or concerns when you change their medication from the brand to the generic, or from one generic to another. The Generics Patient Communication Kit supports your verbal communication with patients by providing you with materials that are appealing and patient-friendly. The kit contains an eye-catching poster and an A5 tear-off pad of patient leaflets to reinforce the message that your medication may look different on the outside but essentially it's the same on the inside.</p>
        <br />

		<div class="outer-wrapper accordion" id="accordionKit">
			<div class="inner-wrapper" id="headingOne">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h2>The kit contains <bdi>the following resources</bdi><span class="open-close"></span></h2>
				</button>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionKit">
					<div class="content card-body">
						<div class="resources outer-wrapper accordion" id="accordionResources">

							<div class="inner-wrapper" id="resource-heading-1">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#resource-1" aria-expanded="false" aria-controls="resource-1">
									<h4>A2 Poster <span class="open-close"></span></h4>
								</button>
								<div id="resource-1" class="collapse" aria-labelledby="resource-heading-1" data-parent="#accordionResources">
									<div class="content card-body">
										<img src="/img/res-gen-image-one.jpg" alt="10 Medicine Use Support Cards">
										<p>Supports the communication to patients of the reasons behind why medicines may have changed in their appearance when you move them onto a generic version from a brand or from one generic to another.</p>
									</div>
								</div>
							</div>

							<div class="inner-wrapper" id="resource-heading-2">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#resource-2" aria-expanded="false" aria-controls="resource-2">
									<h4>A5 Patient Tear-off Leaflets <span class="open-close"></span></h4>
								</button>
								<div id="resource-2" class="collapse" aria-labelledby="resource-heading-2" data-parent="#accordionResources">
									<div class="content card-body">
										<img src="/img/res-gen-image-two.jpg" alt="Patient Self-Assessment Forms">
										<p>Patient information leaflets to help explain the change from branded medication to a generic equivalent or from one generic to another. To be placed in the prescription bag or given out as a leaflet.</p>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</article>

	<aside class="col-ts-2-6">
	
		<img src="/img/icon-patient.png" alt="Generics Patient Communication Kit" class="support-icon">

		<div class="form-link">
			<a href="/dispensing-doctor/generics-patient-comm-kit-form">
				<button class="btn-secondary">Order your Kit today</button>
			</a>
		</div>

		<div class="outer-wrapper accordion" id="accordionLinks">
			<div class="inner-wrapper" id="headingTwo">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<h2>Useful Links<span class="open-close"></span></h2>
				</button>
				<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionLinks">
					<div class="content card-body">
						<ul>
							<li><a href="http://www.chemistanddruggist.co.uk/">Chemist and Druggist</a></li>
							<li><a href="http://www.psnc.org.uk/">PSNC</a></li>
							<li><a href="http://www.dispensingdoctor.org/">Dispensing Doctors' Association</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</aside>
</div>

</section>

<?php
echo '</main>';
// Footer markup
echo $this->element('dispensing_doctor/footer');
?>
</div>