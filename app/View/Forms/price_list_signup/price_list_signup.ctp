<?php
// Form specific scripts
echo $this->Html->script('price_list_signup_form.js');

// Meta data
$this->set('title_for_layout', 'Teva electronic price list sign up form');
?>

<?php
// Header markup
echo $this->element('pharmacy/header');
echo '<main class="container forms support price-list">';
?>
    <!-- title and leading paragraph -->
    <div class="form-top">
    <h1 class="price-title">Teva electronic price list sign up form</h1>
    <h2 class="sub-title">Receive your monthly price list directly into your inbox at the beginning of each month</h2>
    <p class="sub-sub-title">To sign up for this service please complete the form and register your details to receive your copy.</p>

    <!-- error notice -->
    <p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>	    
    </div>
	
    <form action="/forms/price_list_signup_form_submit" id="price-list-signup-form" enctype="multipart/form-data" method="post" class="margin-left relative high-z">        
        <fieldset>
            <p class="margin-bottom">
                <label for="customer-name" class="block">Account Name *</label>
                <input type="text" name="customer-name" id="customer-name" class="block">
            </p>           
            <p class="margin-bottom">
                <label for="teva-account-number" class="block">Teva Account Number</label>
                <input type="text" name="teva-account-number" id="teva-account-number" class="block">
            </p>	            
			<p class="margin-bottom">
				<label for="pharm-name-address" class="block">Pharmacy Name and Address *</label>
				<input type="text" name="pharm-name-address" id="pharm-name-address" class="block margin-bottom">
				<input type="text" name="pharm-name-address-two" id="pharm-name-address-two" class="block margin-bottom">
				<input type="text" name="pharm-name-address-three" id="pharm-name-address-three" class="block">
			</p>
			<p class="margin-bottom">
				<label for="pharm-town-city" class="block">Town/City *</label>
				<input type="text" name="pharm-town-city" id="pharm-town-city" class="block">
			</p>
			<p class="margin-bottom">
				<label for="pharm-county" class="block">County *</label>
				<input type="text" name="pharm-county" id="pharm-county" class="block">
			</p>
			<p class="margin-bottom">
				<label for="pharm-postcode" class="block">Postcode *</label>
				<input type="text" name="pharm-postcode" id="pharm-postcode" class="block">	
			</p>                            
            <p class="margin-bottom">
                <label for="email-address" class="block">Email Address *</label>
                <input type="text" name="email-address" id="email-address" class="block">
            </p>
            <p class="margin-bottom">
                <label for="mobile-number" class="block">Mobile Number</label>
                <input type="text" name="mobile-number" id="mobile-number" class="block">
            </p>
            <p class="span10 margin-bottom">
                <input type="checkbox" name="opt-in" id="opt-in">
                <label for="opt-criteria"><span>We (Teva UK Limited) would like to send you a monthly price list and other relevant marketing material by email in accordance with our Privacy Policy. You can unsubscribe from these emails at any time. Please tick the relevant box if you agree to receive a monthly price list and other relevant information from time to time.</span></label>
            </p>            
            <p>
                <input type="submit" value="Submit" id="submit-price-list-signup-form" class="btn-primary">
            </p>
        </fieldset>
    </form>

<?php
echo '</main>';
// Footer markup
echo $this->element('pharmacy/footer');
?>