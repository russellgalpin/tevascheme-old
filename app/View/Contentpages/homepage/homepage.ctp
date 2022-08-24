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
			<img src="/img/teva-one-logo.png" alt="Teva One">
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

<section class="section-three">
	<div class="bottom-banner">
		<h3>Ready to join us?</h3>
		<p>Speak to your Teva Territory Manager today or call us on <a href="tel:08003894644">0800 389 4644</a></p>
	</div>
</section>

<?php
echo '</main>';

// Footer markup
echo $this->element('pharmacy/footer');
?>