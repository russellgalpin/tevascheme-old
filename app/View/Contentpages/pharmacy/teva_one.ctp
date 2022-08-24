<?php
// Header markup
echo $this->element('pharmacy/header');

echo '<main class="container">';
// CMS Content
// echo $content['Contentpage']['body'];
?>

<section class="section-one">

<div class="row">
	<div class="col-ts-1-2">
		<figure class="teva-logo">
			<img src="/img/teva-one-logo-green.svg" alt="Teva One" />
		</figure>
	</div>

	<div class="col-ts-1-2">
		<div class="teva-headline">
			<h1>TevaOne... It feels good to belong</h1>
			<p>Call us on <a href="tel:08003894644">0800 389 4644</a> for more information</p>
		</div>
	</div>
</div>

</section>

<section class="section-two">

<div class="flex row">

	<article class="col-ts-1-2">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingOne">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h2>Bank on us<span class="open-close"></span></h2>
				</button>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="content card-body">
						<h3>Lower net price &amp; regular monthly rebate</h3>
						<p>Generics that are lower priced to begin with, before any discounts are applied and a simple rebate structure, makes it transparent to see what you can spend and earn.</p>
					</div>
					<img src="/img/roundalls-1.svg" alt="Roundalls" class="roundalls">
				</div>
			</div>
		</div>
	</article>

	<article class="col-ts-1-2">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingTwo">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<h2>Save time with us<span class="open-close"></span></h2>
				</button>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<div class="content card-body">
						<h3>Convenient choice of over 650 product lines</h3>
						<p>Teva can fulfil the majority of your generic purchasing requirements, reducing time spent shopping around and increasing your pharmacy's efficiency.</p>
					</div>
					<img src="/img/roundalls-2.svg" alt="Roundalls" class="roundalls">
				</div>
			</div>
		</div>
	</article>

</div>

<div class="flex row">

	<article class="col-ts-1-2">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingThree">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					<h2>Count on us<span class="open-close"></span></h2>
				</button>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
					<div class="content card-body">
						<h3>Consistent quality and packaging design to aid patient loyalty</h3>
						<p>Consistent medicine quality, helping your patients live better days. Award winning Teva 360 packaging designed to help reduce dispensing errors and improve patient trust.</p>
					</div>
					<img src="/img/roundalls-3.svg" alt="Roundalls" class="roundalls">
				</div>
			</div>
		</div>
	</article>

	<article class="col-ts-1-2">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingFour">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					<h2>Capitalise on us<span class="open-close"></span></h2>
				</button>
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
					<div class="content card-body">
						<h3>Competitive insight and personalised reviews</h3>
						<p>Competitive insight that helps you convert challenges into opportunities in a changing healthcare market. Personalised reviews with your dedicated territory manager to help you get the most from your TevaOne membership.</p>
					</div>
					<img src="/img/roundalls-4.svg" alt="Roundalls" class="roundalls">
				</div>
			</div>
		</div>
	</article>

</div>

<div class="flex row">

	<article class="col-ts-1-1">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingFive">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					<h2>TevaOne Thresholds<span class="open-close"></span></h2>
				</button>
				<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
					<div class="card-body">
						<img class="full-width" src="/img/spend-graph.png" alt="Spend Graph">
						<small>*Total spend is calculated on TevaOne retail price. Rebate not applicable on Teva Net Price Products.<br />See the current TevaOne price list for current product categories.</small>
					</div>
				</div>
			</div>
		</div>
	</article>

</div>

<div class="flex row">

	<article class="col-ts-1-2">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingSix">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
					<h2>Pharmacy Support<span class="open-close"></span></h2>
				</button>
				<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
				<div class="service">
					<div class="service-content">
						<div class="content card-body">
							<p>Access our range of support services that help maximise your pharmacy's profitability, generate new revenue streams, and enhance patient care.</p>
						</div>
						<img src="/img/roundalls-2.svg" alt="Roundalls" class="roundalls">
					</div>
					<div class="service-link">
						<a href="/pharmacy/support/"><button class="btn-primary">Go to Pharmacy Support</button></a>
					</div>
				</div>
				</div>
			</div>
		</div>
	</article>

	<article class="col-ts-1-2">
		<div class="outer-wrapper accordion" id="accordionExample">
			<div class="inner-wrapper" id="headingSeven">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
					<h2>YourTeva<span class="open-close"></span></h2>
				</button>
				<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
				<div class="service">
					<div class="service-content">
						<div class="content card-body">
							<p>Your online customer portal puts you in complete control of your TevaOne membership, where you can keep up to date with your latest statements and track your current spend and rebates.</p>
						</div>
						<img src="/img/roundalls-1.svg" alt="Roundalls" class="roundalls">
					</div>
					<div class="service-link">
						<a href="https://www.yourteva.com" target="_blank"><button class="btn-primary">Go to YourTeva</button></a>
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