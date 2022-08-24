<?php
// Form specific scripts
echo $this->Html->css('advantage_form_elements.css');
echo $this->Html->script('teva_learning_zone_sign_up.js');
echo $this->Html->script('advantage_form_elements.js');

// Meta data
$this->set('title_for_layout', 'Teva Learning Zone Sign Up');
$this->set('meta_description', 'Teva Learning Zone Sign Up');
?>

<?php
// Header markup
echo $this->element('dispensing_doctor/header');
echo '<main class="container forms support">';
?>

    <!-- title and leading paragraph -->
    <div class="form-top">
    <h1 class="form-title margin-bottom">Teva Learning Zone Sign Up Form</h1>

    <section class="support-banner">
        <img src="/img/roundalls-2.svg" alt="Roundalls" class="img-left">
        <img src="/img/roundalls-1.svg" alt="Roundalls" class="img-right">
            <div class="banner-content">
                <h3>Retail Price &pound;30 per skills package or free for eligible* TevaOne Members</h3>
                <p>*Each monthly spend of &pound;1000 or more, made in the previous three months, will entitle TevaOne members to receive one free skills package, for up to 5 users.</p>
            </div>
    </section>

    <h2>To order your Teva Learning Zone Access simply fill out the form below or for more information call 0800 389 4644</h2>
    <!-- error notice -->
    <p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>	
    <!-- cms advantage form -->
    </div>
    <form action="/forms/teva_learning_zone_submit" id="advantage-form" enctype="multipart/form-data" method="post" class="margin-left relative high-z">
        <input type="hidden" name="form-name" value="Dispensing Doctor Teva Learning Zone Sign Up" />
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
            <p class="margin-bottom">
                <label for="pharm-name-address" class="block">Practice Name and Address</label>
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
            <h2>Please select which Teva Learning Zone skills package you would like access to:</h2>
			<p class="margin-bottom"><br />
			<input type="checkbox" name="soft-skills-package" /> <label><strong>Soft skills package:</strong> Time Management, Communication Skills and Motivation</label><br />
			<input type="checkbox" name="professional-skills-package" /> <label><strong>Professional skills package:</strong> Controlled Drugs, Understanding the Drug Tariff and Endorsing NHS Prescriptions</label>
			</p>			
			<p class="bold-italic margin-bottom">Please select the relevant nation for access to the Teva Learning Zone:</p>
            <p class="span3 relative margin-bottom">
                <input type="radio" name="nation" value="England">
                <label for="nation-england">England</label>					
            </p>
            <p class="span3 margin-bottom">
                <input type="radio" name="nation" value="Wales">
                <label for="nation-wales">Wales</label>	
            </p>
			<p class="span3 margin-bottom">
                <input type="radio" name="nation" value="Scotland">
                <label for="nation-scotland">Scotland</label>	
            </p>

            <h2>Teva Learning Zone User(s) Details:</h2>
            <p class="margin-bottom span8">Please provide full name of user(s) as this will be used on the certificate on successful completion of the Teva Learning Zone module</p>
            <div class="users">
                <div class="user">
                    <p class="margin-bottom">
                        <label for="full-name-user" class="block">Full Name</label>
                        <input type="text" name="full-name-user[]" id="full-name-user" class="block">
                    </p>
                    <p class="margin-bottom">
                        <label for="email-address-user" class="block">Email Address</label>
                        <input type="text" name="email-address-user[]" id="email-address-user" class="block">
                    </p>
                </div>
            </div>
            <p class="margin-bottom">
                <input class="btn-primary" type="button" value="+ add more users" id="add-user">
            </p>
            <h2>Contact Details</h2>				
            <p class="margin-bottom">
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
                <input type="radio" name="opt-meet-criteria" id="opt-criteria" value="opt-criteria" checked="checked">
                <label for="opt-criteria">I meet the criteria to receive the Teva Learning Zone free of charge</label>
            </p>
            <p class="span10 margin-bottom">
                <input type="radio" name="opt-meet-criteria" id="opt-contact-payment" value="opt-contact-payment">
                <label for="opt-contact-payment">Please contact me to arrange payment of &pound;30 per skills package/user</label>
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
echo $this->element('dispensing_doctor/footer');
?>