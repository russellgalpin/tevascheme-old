<?php
// Form specific scripts
echo $this->Html->css('advantage_form_elements.css');
echo $this->Html->script('advantage_form_elements.js');

// Meta data
$this->set('title_for_layout', 'Inhaler Recycling Form');
$this->set('meta_description', 'Inhaler Recycling Form');
?>

<?php
// Header markup
echo $this->element('dispensing_doctor/header');
echo '<main class="container forms support">';
?>
		<!-- title and leading paragraph -->
		<div class="form-top">
		<h1 class="form-title margin-bottom">Inhaler Recycling Kit Order Form</h1>

		<section class="support-banner">
			<img src="/img/roundalls-2.svg" alt="Roundalls" class="img-left">
			<img src="/img/roundalls-1.svg" alt="Roundalls" class="img-right">
				<div class="banner-content">
					<h3>Retail Price £100 + VAT  per kit or free for eligible* customers</h3>
					<p>Minimum spend levels apply. Spend over £1000 on Generics with TevaOne or spend over £500 on the following inhalers: Braltus&trade; Zonda&trade; (Tiotropium bromide), DuoResp&trade; Spiromax&trade; (Budesonide/Formoterol fumarate dihydrate), Qvar&trade; MDI, Qvar Easi-Breathe&trade; (Beclometasone dipropionate); in any one month, within the last 3 months.</p>
				</div>
		</section>

		<h2>To order your Inhaler Recycling Kit, simply fill out the form below or for more information call 0800 389 4644</h2>
		<!-- error notice -->
		<p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>	
		<!-- cms advantage form -->
		</div>
		<form action="/forms/inhaler_recycling_form_submit" id="advantage-form" enctype="multipart/form-data" method="post" class="margin-left relative high-z">
                    <input type="hidden" name="form-name" value="CMS Inhaler Recycling Kit Order Form" />
                    <input type="hidden" name="form-website" value="dispensing_doctor" />
			<fieldset>				
				<p class="margin-bottom">
					<label for="pharm-full-name" class="block">Full Name</label>
					<input type="text" name="pharm-full-name" id="pharm-full-name" class="block">
				</p>
				<p class="margin-bottom">
					<label for="teva-scheme-name" class="block">Name of Teva Scheme</label>
					<input type="text" name="teva-scheme-name" id="teva-scheme-name" class="block">
				</p>
				<p class="margin-bottom">
					<label for="teva-account-number" class="block">Teva Account Number</label>
					<input type="text" name="teva-account-number" id="teva-account-number" class="block">
				</p>	
				<div class="float-left">
					<p class="margin-bottom">
						<label for="pharm-name-address" class="block">Dispensary Name and Address</label>
						<input type="text" name="pharm-name-address" id="pharm-name-address" class="block margin-bottom">
						<input type="text" name="pharm-name-address-two" id="pharm-name-address-two" class="block margin-bottom">
						<input type="text" name="pharm-name-address-three" id="pharm-name-address-three" class="block">
					</p>
					<p class="margin-bottom">
						<label for="pharm-town-city" class="block">Town/City</label>
						<input type="text" name="pharm-town-city" id="pharm-town-city" class="block">
					</p>
					<p class="margin-bottom">
						<label for="pharm-county" class="block">County</label>
						<input type="text" name="pharm-county" id="pharm-county" class="block">
					</p>
					<p class="margin-bottom">
						<label for="pharm-postcode" class="block">Postcode</label>
						<input type="text" name="pharm-postcode" id="pharm-postcode" class="block">	
					</p>
				</div>
				<div class="float-left margin-left">
					<p class="margin-bottom">
						<label for="del-name-address" class="block">Delivery Address if different to Dispensary</label>
						<input type="text" name="del-name-address" id="del-name-address" class="block margin-bottom">
						<input type="text" name="del-name-address-two" id="del-name-address-two" class="block margin-bottom">
						<input type="text" name="del-name-address-three" id="del-name-address-three" class="block">
					</p>
					<p class="margin-bottom">
						<label for="del-town-city" class="block">Town/City</label>
						<input type="text" name="del-town-city" id="del-town-city" class="block">
					</p>
					<p class="margin-bottom">
						<label for="del-county" class="block">County</label>
						<input type="text" name="del-county" id="del-county" class="block">
					</p>
					<p class="margin-bottom">
						<label for="postcode" class="block">Postcode</label>
						<input type="text" name="postcode" id="postcode" class="block">	
					</p>
				</div>
				<p class="clear margin-bottom">
					<label for="contact-name" class="block">Contact Name</label>
					<input type="text" name="contact-name" id="contact-name" class="block">
				</p>
				<p class="margin-bottom">
					<label for="tel" class="block">Telephone Number</label>
					<input type="text" name="tel" id="tel" class="block">
					<small>Example 01234 123456</small>
				</p>
				<p class="margin-bottom">
					<label for="email-address" class="block">Email Address</label>
					<input type="text" name="email-address" id="email-address" class="block">
				</p>
				<p class="margin-bottom">
					<label for="confirm-email-address" class="block">Confirm Email Address</label>
					<input type="text" name="confirm-email-address" id="confirm-email-address" class="block">
				</p>
				<p class="span10 margin-bottom">
					<input type="radio" name="opt-meet-criteria" value="1" id="opt-criteria" value="opt-criteria" checked="checked"></span>
					<label for="opt-criteria">I meet the criteria to receive the Inhaler Recycling Kit free of charge </label>
				</p>
				<p class="span10 margin-bottom">
					<input type="radio" name="opt-meet-criteria" value="0" id="opt-contact-payment" value="opt-contact-payment"></span>
					<label for="opt-contact-payment"> Please contact me to arrange payment of &pound;100 + VAT per kit</label>
				</p>
				<p><em>Please allow 28 days delivery from receipt of the order and payment if applicable.</em></p>
				<p>
					<input type="submit" value="Submit" id="submit-advantage-form" class="btn-primary">
				</p>
			</fieldset>
		</form>

<?php
echo '</main>';
// Footer markup
echo $this->element('pharmacy/footer');
?>