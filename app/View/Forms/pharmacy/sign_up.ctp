<?php
// Form specific scripts
echo $this->Html->script('sign_up.js');

// Meta data
$this->set('title_for_layout', 'Sign Up | Pharmacy Support');
$this->set('meta_description', 'Teva Scheme Sign Up - Pharmacy Support');
?>

<section class="dialog-container">
	<div class="dialog">
		<div class="main-dialog">
			<img src="/img/roundalls-1.svg" alt="Roundalls" class="roundalls">
			<img src="/img/teva-one-logo-green.svg" alt="Teva One" class="logo" />
				<h3>Please note the following</h3>
				<p>To verify your details and help us maintain security, we will require proof of your account details in the form of a void cheque, a pre-printed paying in slip/bank statement or a signed document from your bank detailing your name and tax identification number, bank details and account details. Please have these to hand to upload when completing this form.</p>
				<div class="main-links">
					<button id="agree-continue">Continue to form</button>
				</div>
		</div>
	</div>
</section>
<div class="overlay"></div>
<div class="main-container">
<?php
// Header markup
echo $this->element('pharmacy/header');
echo '<main class="container forms">';
?>    
    <!-- title and section navigation -->
    <div class="form-top">
		<h1 class="form-title margin-bottom">Teva Scheme Sign Up</h1>
		<p class="sub-sub-title">To join TevaOne or update your TevaOne account details simply fill out the form below</p>

		<ul id="section-nav">
			<li id="goto-one" class="span1 float-left inactive-pip active-pip"></li>
			<li id="goto-two" class="span1 float-left inactive-pip"></li>
			<li id="goto-three" class="span1 float-left inactive-pip"></li>
			<li id="goto-four" class="span1 float-left inactive-pip"></li>
			<li id="goto-five" class="span1 float-left inactive-pip"></li>
			<li id="goto-six" class="span1 float-left inactive-pip"></li>
			<li id="goto-seven" class="span1 float-left inactive-pip"></li>
		</ul>

	</div>
		<!-- error notice -->
		<p class="margin-bottom red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>
		
		<!-- sign up form -->
		<form action="#" id="sign-up-form" enctype="multipart/form-data" method="post">
			<input type="hidden" name="form-name" value="Pharmacy Teva scheme sign up" />
			<input type="hidden" name="form-website" value="pharmacy" />	
				<fieldset>
				<!-- section one -->
				<div class="section section-one shown">

				<input type="radio" name="opt-teva" id="opt-teva-one" value="opt-teva-one" checked="checked" style="display:none">
					
					<h2>Are you a current Teva scheme customer?</h2>
					<p>
						<input type="radio" name="current-customer" id="customer-yes" value="customer-yes">						
						<label for="customer-yes">Yes</label>
						<span class="outside-input hidden" id="teva-scheme-number-holder">
							<input type="text" id="teva-scheme-number" name="teva-scheme-number">
							<label for="teva-scheme-number" class="underneath"><em>Enter scheme number</em></label>
							<span class="amend-account">
								<input type="checkbox" name="amend" value="Yes"> I wish to make an amendment to my existing TevaOne account
							</span>
						</span>
					</p>
					<p>
						<input type="radio" name="current-customer" id="customer-no" value="customer-no" checked="checked">
						<label for="customer-no">No</label>
					</p>
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-one">
					</p>
				</div>
				<!-- section two -->
				<div class="section section-two hidden">
					<h2>Branch Details</h2>
					<p>
						<label for="buying-groups" class="block">Buying Groups</label>
						<select name="buying-groups" id="buying-groups" class="custom-select">
							<option value="None">None</option>
							<option value="Cambrian">Cambrian</option>
						</select>
					</p>
					<p>
						<label for="company-practice-name" class="block">Company/Practice Name *</label>
						<input type="text" name="company-practice-name" id="company-practice-name" class="block">
					</p>
					<p class="margin-bottom">
						<label for="branch-location-name" class="block">Branch/Location Name *</label>
						<input type="text" name="branch-location-name" id="branch-location-name" class="block">
					</p>
					<p class="margin-bottom">
						<label for="vat-number" class="block">VAT Number *</label>
						<input type="text" name="vat-number" id="vat-number" class="block">
						<small>To comply with HMRC requirements, the documents issued  <br /> along with the rebates must include the VAT number</small>
					</p>
					<p class="margin-bottom">
						<label for="street-address" class="block">Street Address *</label>
						<input type="text" name="street-address" id="street-address" class="block margin-bottom">
						<input type="text" name="street-address-two" id="street-address-two" class="block">
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
								 
					<small class="required">* required</small>
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-two">
					</p>
				</div>
				<!-- section three -->
				<div class="section section-three hidden">
					<h2>Wholesaler Details</h2>
					<small>Insert up to three Wholesalers</small>
					<!-- wholesaler one -->
					<div class="w-one-wrapper">
						<p class="margin-bottom">
							<label for="wholesaler-one" class="block">Wholesaler *</label>
							<select name="wholesaler-one" id="wholesaler-one" class="wholesale-list custom-select">
								<!-- dynamically populated -->
							</select>
						</p>
						<p class="margin-bottom">
							<label for="w-account-one" class="block">Wholesaler Account *</label>
							<input type="text" name="w-account-one" id="w-account-one" class="block">
						</p>
						<p class="margin-bottom">
							<label for="w-depot-one" class="block">Wholesaler Depot *</label>
							<input type="text" name="w-depot-one" id="w-depot-one" class="block">
						</p>					
						<p>Wholesaler Status</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-one" id="one-line-st" value="1st line" checked="checked">
							<label for="one-line-st">1st Line</label>
						</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-one" id="one-line-nd" value="2nd line">
							<label for="one-line-nd">2nd Line</label>
						</p>
						<p class="float-left">
							<input type="radio" name="w-status-one" id="one-line-rd" value="3rd line">
							<label for="one-line-rd">3rd Line</label>
						</p>
						<p class="clear"></p>
					</div>
					<!-- wholesaler two -->
					<div class="w-two-wrapper margin-bottom">
						<p class="margin-bottom">
							<label for="wholesaler-two" class="block">Wholesaler</label>
							<select name="wholesaler-two" id="wholesaler-two" class="wholesale-list custom-select">
								<!-- dynamically populated -->
							</select>
						</p>
						<p class="margin-bottom">
							<label for="w-account-two" class="block">Wholesaler Account</label>
							<input type="text" name="w-account-two" id="w-account-two" class="block">
						</p>
						<p class="margin-bottom">
							<label for="w-depot-two" class="block">Wholesaler Depot</label>
							<input type="text" name="w-depot-two" id="w-depot-two" class="block">
						</p>					
						<p>Wholesaler Status</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-two" id="two-line-st" value="1st line">
							<label for="two-line-st">1st Line</label>
						</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-two" id="two-line-nd" value="2nd line" checked="checked">
							<label for="two-line-nd">2nd Line</label>
						</p>
						<p class="float-left">
							<input type="radio" name="w-status-two" id="two-line-rd" value="3rd line">
							<label for="two-line-rd">3rd Line</label>
						</p>
						<p class="clear"></p>
					</div>
					<!-- wholesaler three -->
					<div class="w-three-wrapper margin-bottom">
						<p class="margin-bottom">
							<label for="wholesaler-three" class="block">Wholesaler</label>
							<select name="wholesaler-three" id="wholesaler-three" class="wholesale-list custom-select">
								<!-- dynamically populated -->
							</select>
						</p>
						<p class="margin-bottom">
							<label for="w-account-three" class="block">Wholesaler Account</label>
							<input type="text" name="w-account-three" id="w-account-three" class="block">
						</p>
						<p class="margin-bottom">
							<label for="w-depot-three" class="block">Wholesaler Depot</label>
							<input type="text" name="w-depot-three" id="w-depot-three" class="block">
						</p>					
						<p>Wholesaler Status</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-three" id="three-line-st" value="1st line">
							<label for="three-line-st">1st Line</label>
						</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-three" id="three-line-nd" value="2nd line">
							<label for="three-line-nd">2nd Line</label>
						</p>
						<p class="float-left span-end">
							<input type="radio" name="w-status-three" id="three-line-rd" value="3rd line" checked="checked">
							<label for="three-line-rd">3rd Line</label>
						</p>
					</div>
								 
			 <small class="required">* required</small>
					<p class="clear"></p>
						<input class="btn-primary" type="button" value="Continue" id="cont-three">
					</p>
				</div>
				<!-- section four -->
				<div class="section section-four hidden">
					<h2>Bank Details</h2>
					<p class="italic margin-bottom">Please confirm your bank details for your Teva Scheme. We require bank details if you are joining the Teva Scheme as a new member or if you wish to make an amendment to your existing bank account details.  </p>
					<p class="margin-bottom">
						<label for="bank-account-name" class="block">Business Bank Account Name *</label>
						<input type="text" name="bank-account-name" id="bank-account-name" class="block">
					</p>
					<p class="margin-bottom">
						<label for="bank-name" class="block">Bank *</label>
						<input type="text" name="bank-name" id="bank-name" class="block">
					</p>
					<p class="margin-bottom">
						<label for="account-number" class="block">Account Number *</label>
						<input type="text" name="account-number" id="account-number" class="block">
					</p>
					<p class="margin-bottom">
						<label for="sort-code" class="block">Sort Code *</label>
						<input type="text" name="sort-code" id="sort-code" class="block">					
						<small>Example 112233</small>
					</p>
					<p>
						<label for="upload-documents">Upload your bank details here either as an image (jpg/jpeg) or PDF *</label>
						<input type="file" name="upload-documents" id="upload-documents" onchange="return fileValidation()">
						<small>max file size: 2MB</small>
						<span class="smaller-text red hidden" id="bank-file-error">Please add your details file.</span>
					</p>
					<p class="margin-bottom">
						<span>To verify your details and help us maintain security, we request that proof of account details are supplied to the Teva UK Head Office address in the form of either: i) A void cheque, ii) a pre-printed paying-in slip/bank statement or iii) a signed document from your bank detailing: supplier name and tax identification number, bank address and full bank account details.</span>
						<span><br /><br /></span>
						<span class="block clear"></span>
						<span class="smaller-text red hidden" id="bank-confirmation-error">Please tick this box. Without this information Teva CANNOT progress your sign-up any further.</span>
						<span class="block clear"></span>
						<input type="checkbox" name="bank-confirmation" id="bank-confirmation" class="block span-end">
						<span class="block span10">I confirm that I will send proof of account details to verify my Teva Scheme account.</span>
						<span class="block clear"></span>
						<span><br /><br /></span>
						<span>
							Please post proof of details to: 
							<strong>Teva Schemes Admin Department,
							Teva UK Limited,
							Ridings Point, 
							Whistler Drive, 
							Castleford, 
							West Yorkshire.
							WF10 5HX</strong>
							or email to <a class="email-proof" href="mailto:Ukteva.scheme@tevauk.com">Ukteva.scheme@tevauk.com</a>
						</span>
						<span class="block clear"></span>
					</p>
					<p class="margin-bottom">
						<a href="http://www.verisign.com" target="_blank">
							<img src="/img/verisign.png" alt="VeriSign">
						</a>
					</p>	
								 
			 <small class="required">* required</small>				
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-four">
					</p>
				</div>
				<!-- section five -->
				<div class="section section-five hidden">
					<h2>Contact Details</h2>
					<p class="margin-bottom">
						<label for="contact-name" class="block">Contact Name *</label>
						<input type="text" name="contact-name" id="contact-name" class="block">
					</p>
					<p class="margin-bottom">
						<label for="telephone-number" class="block">Telephone Number *</label>
						<input type="text" name="telephone-number" id="telephone-number" class="block">
						<small>Example 01234 123456</small>
					</p>
					<p class="margin-bottom">
						<label for="email-address" class="block">Email Address *</label>
						<input type="text" name="email-address" id="email-address" class="block" onblur="this.value=removeSpaces(this.value);">
						<small>Please provide an email address so that we can send you your monthly pricelist</small>
					</p>
					<p class="margin-bottom">
						<label for="confirm-email" class="block">Confirm Email Address *</label>
						<input type="text" name="confirm-email" id="confirm-email" class="block" onblur="this.value=removeSpaces(this.value);">
					</p>
					<p class="margin-bottom">
						<label for="additional-comments" class="block">Additional Comments</label>
						<textarea name="additional-comments" id="additional-comments" class="span6 block"></textarea>
					</p>
					<p class="margin-bottom">
						<p class="smaller-text red hidden" id="confirmation-error">Please confirm permission to continue with the Teva Scheme sign up, as this data is required for scheme administration purposes.</p>
					
						<p class="margin-bottom">
						<input type="checkbox" name="confirmation" id="confirmation" class="block float-left span-end">
						Please tick here to confirm permission for the nominated wholesaler to provide data on the sales of Teva UK Limited products to Teva UK Limited. Data will be provided on a daily and monthly basis and will only be used for the operation and monitoring of the Teva UK Limited Schemes. *
						</p>
					</p>
					<p class="margin-bottom">
						<input type="checkbox" name="opt_in" id="opt_in" value="Yes" class="block span-end float-left">
						We (Teva UK Limited) would like to send you a monthly price list and other relevant marketing material by email in accordance with our Privacy Policy. You can unsubscribe from these emails at any time. Please tick the box if you agree to receive a monthly price list and other relevant information from time to time.
					</p>
			 		<small class="required">* required</small>
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-five">
					</p>
				</div>
				<!-- section six -->
				<div class="section section-six hidden">
					<h2>Terms and Conditions</h2>
					<p class="margin-bottom">
						<span id="terms-company-name"></span> - <span id="terms-name"></span> - "The Participant"
					</p>
					<p class="margin-bottom">
						These Terms and Conditions set out the basis for participation in The Teva Scheme. Details of the products, thresholds and rebates as well as updates and revisions relating to The Teva Scheme from time to time will be available at www.tevauk.com/tevascheme (the &quot;Teva Website&quot;). The Teva Scheme replaces all previous rebate or discount schemes between Teva UK Limited (&quot;Teva&quot;) and the Participant.
					</p>
					<p class="margin-bottom">
						By agreeing to these Terms and Conditions, the Participant also agrees that it shall no longer participate in any of Teva's previous rebate or discount schemes with effect from 30 April 2011.
					</p>
					<h3>TERMS</h3>
					<ul class="terms-list">
						<li>
							<p class="margin-bottom">
								These Terms and Conditions shall apply from the date on which the Participant enters into the TevaOne Offer and shall continue until termination by either Participant or Teva on one (1) month’s written notice. Teva may serve notice in writing to the Participant or may notify all Participants of the withdrawal of the TevaOne Offer. At any point by notice on the Teva website.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								The Participant agrees to only purchase products for its own use. Teva reserves the right to analyse PMR data from time to time to validate usage levels and compliance with these Terms and Conditions.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								The Participant acknowledges that products may be out of stock or otherwise unavailable from time to time and may not always be available.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								The Participant acknowledges that products may be out of stock or otherwise unavailable from time to time and may not always be available to count towards the relevant thresholds.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								All personal information that you provide us with will be held securely by Teva UK Limited and will be used to register the Participant for and to administer TevaOne. For more information and for information about your data protection rights, including to ask to withdraw any permissions you have given, see the full Privacy Policy at <a href="https://www.tevauk.com/general-pages/Privacy_Policy">https://www.tevauk.com/general-pages/Privacy_Policy</a>
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								Teva reserves the right to withhold any rebate payments to and/or withhold access to the TevaOne Offer with any Participant where Teva believes such Participant has breached these Terms &amp; Conditions.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								These Terms and Conditions shall be construed in accordance with the Laws of England and Wales and shall be subject to the exclusive jurisdiction of the courts of England.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								Rebates including VAT will be paid via BACS, unless otherwise agreed with the Participant.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								Any queries regarding any claimed under payment in connection with TevaOne must be notified in writing within seven (7) days of date of the rebate being paid. Queries must be brought by the Participant within six (6) months of the date of order of the relevant product by the Participant. It shall be at Teva’s discretion whether to process claims after this six (6) month period.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								Participation in TevaOne is subject to opening an account with a TevaOne nominated wholesaler.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								Rebates applicable on selected products for Participants spending over £3000. See current price list.
							</p>
						</li>
						<li>
							<p class="margin-bottom">
								There may be some products from time to time which count towards the threshold levels but for which no rebate is payable. Details are set out on in our monthly price list.
							</p>
						</li>
					</ul>
					<p class="margin-bottom">
						<input type="checkbox" name="terms-agree" id="terms-agree" class="span-end">
						<span class="bold">On behalf of the Participant, I hereby agree to be bound by these Terms and Conditions *</span>
					</p>
					<p class="smaller-text red hidden" id="terms-error">Please accept Terms and Conditions before continuing</p>
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-six">
					</p>
			 		<small class="required">* required</small>
				</div>
				<!-- section seven -->
				<div class="section section-seven hidden">
					<h2>Now finalise your scheme sign up</h2>
					<p class="margin-bottom">
						A confirmation email has been sent to your email address. To verify your details and help us maintain security, please check your emails to finalise your Scheme sign up and to activate your account.
					</p>
					<p class="margin-bottom">You have 7 working days to finalise your Teva Scheme sign up.</p>
					<p>
						<a href="/pharmacy/sign-up"><input type="button" value="Add another branch" class="lrg-button span-end sign-up-link-plain btn-primary"></a>
						<a href="/pharmacy/home"><input type="button" value="Return to homepage" class="lrg-button teva-one-link-plain btn-primary"></a>
					</p>
				</div>
				</fieldset>
			 </form>

<?php
echo '</main>';
// Footer markup
echo $this->element('pharmacy/footer');
?>
</div>