<?php
// Form specific scripts
echo $this->Html->css('advantage_form_elements.css');
echo $this->Html->script('advantage_form_elements.js');

// Meta data
$this->set('title_for_layout', 'FluWise Kit Order Form');
$this->set('meta_description', 'FluWise Kit Order Form');
?>

<?php
// Header markup
echo $this->element('pharmacy/header');
echo '<main class="container forms support">';
?>
		
		<!-- title and leading paragraph -->
		<div class="form-top">
		<h1 class="form-title margin-bottom">FluWise Kit Order Form</h1>

		<section class="support-banner">
			<img src="/img/roundalls-2.svg" alt="Roundalls" class="img-left">
			<img src="/img/roundalls-1.svg" alt="Roundalls" class="img-right">
				<div class="banner-content">
					<h3>Retail Price &pound;50 or free for eligible* TevaOne Members</h3>
					<p>*Each monthly spend of &pound;3000 or more, made in the previous three months, will entitle you to receive a Pharmacy Support Service free of charge.</p>
				</div>
		</section>

		<h2>To order your FluWise Kit, simply fill out the form below or for more information call 0800 389 4644</h2>
		<!-- error notice -->
		<p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>	
		<!-- cms advantage form -->
		</div>
		<form action="/forms/inhaler_recycling_form_submit" id="advantage-form" enctype="multipart/form-data" method="post" class="margin-left relative high-z">
                    <input type="hidden" name="form-name" value="CMS Inhaler Recycling Kit Order Form" />
                    <input type="hidden" name="form-website" value="pharmacy" />
			<fieldset>				
				<p class="margin-bottom">
					<label for="pharm-full-name" class="block">Pharmacist Full Name</label>
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
						<label for="pharm-name-address" class="block">Pharmacy Name and Address</label>
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
						<label for="del-name-address" class="block">Delivery Address if different to Pharmacy</label>
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
					<input type="radio" name="opt-meet-criteria" value="1" id="opt-criteria" value="opt-criteria" checked="checked">
					<label for="opt-criteria">I meet the criteria to receive the FluWise Kit</label>
				</p>
				<p class="span10 margin-bottom">
					<input type="radio" name="opt-meet-criteria" value="0" id="opt-contact-payment" value="opt-contact-payment">
					<label for="opt-contact-payment"> Please contact me to arrange payment of &pound;50</label>
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