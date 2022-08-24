<?php
// Form specific scripts
echo $this->Html->script('contact_us.js');

// Meta data
$this->set('title_for_layout', 'Contact Us | Dispensing Doctor');
$this->set('meta_description', 'Dispensing Doctor contact details for Teva');
?>

<?php
// Header markup
echo $this->element('dispensing_doctor/header');
echo '<main class="container forms contact">';
?>
    <!-- title and leading paragraph -->
    <div class="form-top">
    <h1 class="form-title">Contact Us</h1>
    <h2>If you would like to request a visit from your local Territory Sales Manager or simply would like to ask us a question about the TevaOne scheme, please complete the below form or call <a href="tel:0800 389 4644"><strong>0800 389 4644</strong></a></h2>
    <!-- error notice -->
    <p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>
    <!-- contact us form -->
    </div>
    <form action="/forms/contact_us_submit" id="contact-us-form" enctype="multipart/form-data" method="post" class="margin-left relative high-z">
        <input type="hidden" name="form-name" value="Dispensing Doctor Contact Us" />
        <input type="hidden" name="form-website" value="dispensing_doctor" />
        <fieldset>
            <p class="margin-bottom">
                <label for="first-name" class="block">First Name *</label>
                <input type="text" name="first-name" id="first-name" class="block">
            </p>
            <p class="margin-bottom">
                <label for="surname" class="block">Surname *</label>
                <input type="text" name="surname" id="surname" class="block">
            </p>
            <p class="margin-bottom">
                <label for="job-position" class="block">Job/Position *</label>
                <input type="text" name="job-position" id="job-position" class="block">
            </p>
            <p class="margin-bottom">
                <label for="street-address" class="block">Street Address *</label>
                <input type="text" name="street-address" id="street-address" class="block">
            </p>
            <p class="margin-bottom">
                <label for="town-city" class="block">Town/City *</label>
                <input type="text" name="town-city" id="town-city" class="block">
            </p>
            <p class="margin-bottom">
                <label for="county" class="block">County *</label>
                <input type="text" name="county" id="county" class="block">
            </p>
            <p class="margin-bottom">
                <label for="postcode" class="block">Postcode *</label>
                <input type="text" name="postcode" id="postcode" class="block">
            </p>
            <p class="margin-bottom">
                <label for="tel" class="block">Telephone Number *</label>
                <input type="text" name="tel" id="tel" class="block">
            </p>
            <p class="margin-bottom">
                <label for="email-address" class="block">Email Address *</label>
                <input type="text" name="email-address" id="email-address" class="block">
            </p>
            <p class="margin-bottom">
                <label for="confirm-email-address" class="block">Confirm Email Address *</label>
                <input type="text" name="confirm-email-address" id="confirm-email-address" class="block">
            </p>
            <p>Are you a current Teva scheme customer?</p>
            <p class="span3 relative margin-bottom">
                <input type="radio" name="current-customer" id="customer-yes" value="customer-yes">						
                <label for="customer-yes">Yes</label>					
            </p>
            <p class="span3 margin-bottom">
                <input type="radio" name="current-customer" id="customer-no" value="customer-no" checked="checked">
                <label for="customer-no">No</label>
            </p>
            <p>Would you like to request a visit from your local Territory Sales Manager? </p>
            <p class="span3 relative margin-bottom">
                <input type="radio" name="manager-visit" id="visit-yes" value="visit-yes">					
                <label for="visit-yes">Yes</label>
            </p>
            <p class="span3 margin-bottom">
                <input type="radio" name="manager-visit" id="visit-no" value="visit-no" checked="checked">
                <label for="visit-no">No</label>
            </p>
            <p class="margin-bottom">
                <label for="ask-question" class="block">Ask a question</label>
                <textarea name="ask-question" id="ask-question" class="span6 block"></textarea>
            </p>
            <small class="required">* required</small>
            <p>
                <input type="submit" value="Submit" id="submit-contact-form" class="btn-primary">
            </p>
        </fieldset>
    </form>

<?php
echo '</main>';
// Footer markup
echo $this->element('dispensing_doctor/footer');
?>