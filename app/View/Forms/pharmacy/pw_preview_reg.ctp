<?php
// Form specific scripts
echo $this->Html->script('pw_preview_reg.js');

// Meta data
$this->set('title_for_layout', 'PriceWatch Preview Registration | Pharmacy Support');
$this->set('meta_description', 'PriceWatch Preview Registration');
?>
<div class="main-content span12 center relative">
    <?php
    // Header markup
    echo $this->element('pharmacy/header');
    ?> 


    <!-- title and leading paragraph -->
    <div class="form-top">
    <h1 class="form-title margin-bottom">PriceWatch&reg; Preview Registration</h1>
    <!-- error notice -->
    <p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>
    <!-- preview registration form -->
    </div>
    <form action="/forms/pw_preview_submit" id="preview-reg-form" enctype="multipart/form-data" method="post" class="relative high-z">
        <input type="hidden" name="form-name" value="Pharmacy Support PriceWatch Preview Registration Form" />
        <input type="hidden" name="form-website" value="pharmacy" />
        <fieldset>
            <div class="section-one margin-left ">
                <p class="margin-bottom">
                    <label for="first-name" class="block">First Name</label>
                    <input type="text" name="first-name" id="first-name" class="block">
                </p>
                <p class="margin-bottom">
                    <label for="surname" class="block">Surname</label>
                    <input type="text" name="surname" id="surname" class="block">
                </p>
                <p class="span3 margin-bottom">
                    <span class="span1 inline-block"><input type="radio" name="opt-pharm-disp" id="opt-pharmacist" value="opt-pharmacist" checked="checked"></span>
                    <label for="opt-pharmacist">Pharmacist</label>
                </p>
                <p class="span4 margin-bottom">
                    <span class="span1 inline-block"><input type="radio" name="opt-pharm-disp" id="opt-dispensary" value="opt-dispensary"></span>
                    <label for="opt-dispensary">Dispensary Manager</label>
                </p>
                <p class="margin-bottom">
                    <label for="company-practice-name" class="block">Company/Practice Name</label>
                    <input type="text" name="company-practice-name" id="company-practice-name" class="block">
                </p>
                <p class="margin-bottom">
                    <label for="street-address" class="block">Street Address</label>
                    <input type="text" name="street-address" id="street-address" class="block margin-bottom">
                    <input type="text" name="street-address-two" id="street-address-two" class="block">
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
                <p class="margin-bottom">
                    <label for="mobile-number" class="block">Mobile Phone Number (for Text Service)</label>
                    <input type="text" name="mobile-number" id="mobile-number" class="block">					
                    <span class="light-grey">Example 07999 123456</span>
                </p>
                <p class="margin-bottom">
                    <label for="email-address" class="block">Email Address</label>
                    <input type="text" name="email-address" id="email-address" class="block">
                </p>
                <p class="margin-bottom">
                    <label for="confirm-email" class="block">Confirm Email Address</label>
                    <input type="text" name="confirm-email" id="confirm-email" class="block">
                </p>
                <p class="bold-italic margin-bottom">Choose from</p>
                <p class="span10 margin-bottom">
                    <span class="span1 inline-block"><input type="radio" name="opt-text-email" id="opt-email-with-text" value="opt-email-with-text" checked="checked"></span>
                    <label for="opt-email-with-text">PriceWatch Preview Email, along with text message notification that the Email has been sent</label>
                </p>
                <p class="span5 margin-bottom">
                    <span class="span1 inline-block"><input type="radio" name="opt-text-email" id="opt-email-no-text" value="opt-email-no-text"></span>
                    <label for="opt-email-no-text">PriceWatch Preview Email only</label>
                </p>
                <p>
                    <input type="button" value="Continue" id="cont-preview-reg-form">
                </p>
            </div>
            <div class="section-two hidden">
                <p class="bold margin-bottom">PriceWatch Preview Terms and Conditions</p>
                <p class="margin-bottom">Please read and accept the Terms and Conditions to continue the sign up process.</p>
                <p class="margin-bottom">Teva UK Limited is the data controller of your personal details for the purposes of the Data Protection Act 1998. We may collect the following types of information about you:</p>
                <ul class="terms-list margin-bottom">
                    <li>
                        <p>Information you provide at registration or by subsequently changing your registered details.</p>
                    </li>
                    <li>
                        <p>Records of correspondence you have with us by letter, Email or telephone, or in response to email communications<br/>from us.</p>
                    </li>
                </ul>
                <p class="margin-bottom">These personal details may be used by us to:</p>
                <ul class="terms-list margin-bottom">
                    <li>
                        <p>Administer the PriceWatch Preview service.</p>
                    </li>
                    <li>
                        <p>Conduct market research on the PriceWatch Preview service.</p>
                    </li>
                    <li>
                        <p>Make available to you educational and promotional information that may interest you.</p>
                    </li>
                    <li>
                        <p>Allow you to participate in interactive features of our service where you choose to do so.</p>
                    </li>
                    <li>
                        <p>Notify you about changes to our service.</p>
                    </li>
                </ul>
                <p class="margin-bottom">
                    Our internal working practices also ensure your privacy is protected by limiting employee access to the data. The personal information provided by you will be held on a database and may be shared with companies in the Teva group both in the UK and internationally. Your details will not be made available to third parties or external companies for marketing purposes. If you do not wish your details to be used in this manner please Email <a href="mailto:pricewatch@tevauk.com" class="var-two">pricewatch@tevauk.com</a>
                </p>
                <p class="bold">Your Obligations</p>
                <p class="margin-bottom">Correct Information. The information that you supply to us for the purpose of registration is true and correct.</p>
                <p class="bold">Distribution of Information</p>
                <p class="margin-bottom">You will not forward or make available any content of the PriceWatch Preview text message to any third parties who are not registered to the Scheme.</p>
                <p class="bold">Disclaimer</p>
                <p class="margin-bottom">We will not make your data available to any third parties.</p>
                <p class="margin-bottom">
                    <input type="checkbox" name="terms-agree" id="terms-agree" class="span-end" checked="checked">
                    <span class="bold">I hereby agree to be bound by these Terms and Conditions</span>
                </p>
                <p class="smaller-text red hidden" id="terms-error">Please accept Terms and Conditions before continuing</p>
                <p class="margin-bottom smaller-text">You can opt out of the service at any time - just Email pricewatch@tevauk.com</p>
                <p>
                    <input type="submit" value="Submit" id="submit-preview-reg-form">
                </p>
            </div>
        </fieldset>
    </form>
    <!-- terms and conditions section -->
    <?php
    // Footer markup
    echo $this->element('forms/pharmacy/footer');
    ?>
</div>