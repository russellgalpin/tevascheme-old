<?php
// Header markup
echo $this->element('dispensing_doctor/header');

echo '<main class="container support">';
?>

<section class="support-heading">
	<div class="heading-content">
		<h1>Boost staff confidence with convenient online learning</h1>
		<img src="/img/roundalls-5.svg" alt="Roundalls" class="roundalls">
	</div>
</section>

<section class="support-banner">
	<img src="/img/roundalls-2.svg" alt="Roundalls" class="img-left">
	<img src="/img/roundalls-1.svg" alt="Roundalls" class="img-right">
		<div class="banner-content">
			<h3>Retail Price &pound;20 per user or free for eligible* TevaOne Members</h3>
			<p>*Each monthly spend of &pound;1000 or more, made in the previous three months, will entitle you to receive access for up to three users free of charge.</p>
		</div>
</section>

<section class="support-content">

<div class="flex row">
	<article class="col-ts-2-3">
        <p>Our interactive E-learning module DRUMs (Dispensing Review of the Use of Medicines) can count towards the CPD requirements of staff within your practice.
The module provides dispensary staff with the knowledge and confidence to deliver DRUMs. Upon successful completion, users will be issued with a certificate that demonstrates their continued education and development.</p>
        <br />
        
        <p><em>Support dispensary staff in feeling confident to deliver DRUMs</em></p>

        <p><em>Fulfill the CPD requirements of staff</em></p>

        <p><em>Certificate issued on successful completion</em></p>

		<div class="outer-wrapper accordion" id="accordionPackage">
			<div class="inner-wrapper" id="headingOne">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h2>Sections include<span class="open-close"></span></h2>
				</button>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionPackage">
					<div class="content card-body">
						<br />
                        <p>Examples of Good and Bad Practice</p>
						<p>Documentation and Form Selection</p>
						<p>Highlighting Potential Issues and Problems</p>
					</div>
				</div>
			</div>
		</div>

	</article>

	<aside class="col-ts-2-6">
	
		<img src="/img/icon-drum.png" alt="DRUM E-Learning" class="support-icon">

		<div class="form-link">
			<a href="/dispensing-doctor/drum-e-learning-sign-up">
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