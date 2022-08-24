<?php
// Form specific scripts
echo $this->Html->script('360_order_form.js');

// Meta data
$this->set('title_for_layout', '360 Business Planning Tool Order Form | Pharmacy Support');
$this->set('meta_description', 'Teva 360 Business Planning Tool Order Form');
?>

<div class="main-content span12 center relative">
    <?php
// Header markup
    echo $this->element('pharmacy/header');
    ?> 
    <!-- small sign up button image -->
    <div class="small-sign-up-btn-holder"></div>
    <!-- title and leading paragraph -->
    <div class="form-top">
    <h1 class="form-title margin-bottom">Teva 360 Business Planning Tool Order Form</h1>
	<h2>Retail Price &pound;50 for a two month subscription per pharmacy or free for eligible* Teva Scheme Members</h2>
	<p class="span9 margin-bottom">(*Minimum eligibility criteria applies)</p>
    <p class="span9 margin-bottom">Teva 360 Business Planning Tool has a retail value of &pound;50 for a two month subscription per pharmacy. Teva scheme members who have spent over &pound;2000 in any one month within the previous six are eligible to receive two months subscription free of charge. Longer subscriptions to the Teva 360 Business Planning Tool are available for customers who have spent over &pound;2000 in more than one month in the previous six - two months free access for each spend greater than &pound;2000. Please note that each independent monthly spend of greater than &pound;2000 entitles Teva scheme members to additional free of charge Pharmacy Support services - One service for each month where spend is greater than &pound;2000.</p>
	<p class="span9 margin-bottom"><span class="bold">To order your access to the Teva 360 Business Planning Tool, simply fill out the form below or for more information call 0800 389 4644</span></p>
    <!-- error notice -->
    <p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>
    <!-- order form -->
    </div>
    <form action="/forms/threesixty_form_submit" id="360-order-form" enctype="multipart/form-data" method="post" class="margin-left relative high-z">
        <input type="hidden" name="form-name" value="360 Business Planning Tool Order Form" />
        <input type="hidden" name="form-website" value="pharmacy" />
        <fieldset>
            <p class="margin-bottom">
                <label for="full-name" class="block">Pharmacist Full Name</label>
                <input type="text" name="full-name" id="full-name" class="block">
            </p>
            <p class="margin-bottom">
                <label for="teva-scheme" class="block">Name of Teva Scheme</label>
                <input type="text" name="teva-scheme" id="teva-scheme" class="block">
            </p>
            <p class="margin-bottom">
                <label for="teva-account" class="block">Teva Account Number</label>
                <input type="text" name="teva-account" id="teva-account" class="block">
            </p>
			
            <p class="margin-bottom">
                <label for="address-line-1" class="block">Pharmacy Name and Address</label>
                <input type="text" name="address-line-1" id="address-line-1" class="block"><br />
				<input type="text" name="address-line-2" id="address-line-2" class="block"><br />
				<input type="text" name="address-line-3" id="address-line-3" class="block">
            </p>
            <p class="margin-bottom">
                <label for="town-city" class="block">Town/City</label>
                <input type="text" name="town-city" id="town-city" class="block">
            </p>
            <p class="margin-bottom">
                <label for="county" class="block">County</label>
                <input type="text" name="county" id="county" class="block">
            </p>
            <p class="margin-bottom">
                <label for="postcode" class="block">Postcode</label>
                <input type="text" name="postcode" id="postcode" class="block">
            </p>
			
			<p class="bold-italic margin-bottom">Please select the relevant nation for your income model</p>
            <p class="span3 relative margin-bottom">
                <span class="span1 inline-block"><input type="radio" name="nation" id="nation-england" value="England"></span>
                <label for="nation-england">England</label>					
            </p>
            <p class="span3 margin-bottom">
               <span class="span1 inline-block"><input type="radio" name="nation" id="nation-wales" value="Wales"></span>
                <label for="nation-wales">Wales</label>	
            </p>
			<p class="span3 margin-bottom">
               <span class="span1 inline-block"><input type="radio" name="nation" id="nation-scotland" value="Scotland"></span>
                <label for="nation-scotland">Scotland</label>	
            </p>
			
			<p class="bold-italic margin-bottom">Please select subscription length</p>
            <p class="span3 relative margin-bottom">
                <span class="span1 inline-block"><input type="radio" name="subscription-length" id="subscription-1month" value="2 Month"></span>
                <label for="subscription-1month">2 Month</label>					
            </p>
            <p class="span3 margin-bottom">
               <span class="span1 inline-block"><input type="radio" name="subscription-length" id="subscription-3month" value="4 Months"></span>
                <label for="subscription-3month">4 Months</label>
            </p>
			<p class="span3 margin-bottom">
               <span class="span1 inline-block"><input type="radio" name="subscription-length" id="subscription-6month" value="6 Months"></span>
                <label for="subscription-6month">6 Months</label>	
            </p>
			
			<p class="margin-bottom">
                <label for="contact-name" class="block">Contact Name</label>
                <input type="text" name="contact-name" id="contact-name" class="block">
            </p>
            <p class="margin-bottom">
                <label for="tel" class="block">Telephone Number</label>
                <input type="text" name="tel" id="tel" class="block">
            </p>
            <p class="margin-bottom">
                <label for="email-address" class="block">Email Address</label>
                <input type="text" name="email-address" id="email-address" class="block">
            </p>
            <p class="margin-bottom">
                <label for="confirm-email-address" class="block">Confirm Email Address</label>
                <input type="text" name="confirm-email-address" id="confirm-email-address" class="block">
            </p>
			            
            <p class="span3 relative margin-bottom">
                <span class="span1 inline-block"><input type="radio" name="criteria" id="criteria-met" value="I meet the criteria to receive the Teva 360 Business Planning Tool free of charge"></span>						
                <label for="criteria-met">I meet the criteria to receive the Teva 360 Business Planning Tool free of charge</label>					
            </p>
            <p class="span3 margin-bottom">
                <span class="span1 inline-block"><input type="radio" name="criteria" id="criteria-not-met" value="Please contact me to arrange payment of &pound;50 per month for my subscription" checked="checked"></span>
                <label for="criteria-not-met">Please contact me to arrange payment of &pound;50 for a two month subscription</label>
            </p>
            			
            <p>
                <input type="submit" value="Submit" id="submit-order-form">
            </p>
        </fieldset>
    </form>
    
    <?php
    // Footer markup
    echo $this->element('forms/pharmacy/footer');
    ?>
</div>	