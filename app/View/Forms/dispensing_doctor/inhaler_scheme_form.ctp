<?php
// Form specific scripts
echo $this->Html->script('inhaler_form.js');

// Meta data
$this->set('title_for_layout', 'TevaOne Inhaler Scheme Sign Up | Dispensing Doctor');
$this->set('meta_description', 'TevaOne Inhaler Scheme Sign Up - Dispensing Doctor');
?>

<section class="dialog-container">
	<div class="dialog">
		<div class="main-dialog">
			<img src="/img/roundalls-1.svg" alt="Roundalls" class="roundalls">
			<img src="/img/teva-one-logo-orange.svg" alt="Teva One" class="logo" />
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
echo $this->element('dispensing_doctor/header');
echo '<main class="container forms inhaler">';
?>    
    <!-- title and section navigation -->
    <div class="form-top">
		<h1 class="form-title margin-bottom">Manufacturers Discount Scheme Sign Up</h1>
		<br />
		<p>Discounts of up to 40% are available on a selection of our Teva brands for Dispensing Doctors. Register for these discounts by completing the form below. For more information or support resources visit the respiratory tab.</p>

		<ul id="section-nav">
			<li id="goto-one" class="float-left inactive-pip active-pip"></li>
			<li id="goto-two" class="float-left inactive-pip"></li>
			<li id="goto-three" class="float-left inactive-pip"></li>
			<li id="goto-four" class="float-left inactive-pip"></li>
			<li id="goto-five" class="float-left inactive-pip"></li>
			<li id="goto-six" class="float-left inactive-pip"></li>
			<li id="goto-seven" class="float-left inactive-pip"></li>
			<li id="goto-eight" class="float-left inactive-pip"></li>
		</ul>

	</div>
		<!-- error notice -->
		<p class="red hidden" id="error-note">Please complete all mandatory fields, indicated in red</p>
		
		<!-- sign up form -->
		<form action="#" id="inhaler-sign-up-form" enctype="multipart/form-data" method="post">
			<input type="hidden" name="form-name" value="Dispensing Doctor Teva Inhaler Scheme Sign Up" />
			<input type="hidden" name="form-website" value="dispensing-doctor" />	
				<fieldset>
				<!-- section one -->
				<div class="section section-one shown">
					<h2>Surgery Details</h2>
					<p>
						<label for="surgery-name">Name of Surgery *</label>
						<input type="text" name="surgery-name" id="surgery-name">
					</p>
					<p>
						<label for="street-address">Address of Surgery *</label>
						<input type="text" name="street-address" id="street-address" class="block margin-bottom">
						<input type="text" name="street-address-two" id="street-address-two">
					</p>
					<p>
						<label for="town-city">Town/City *</label>
						<input type="text" name="town-city" id="town-city">
					</p>
					<p>
						<label for="county">County *</label>
						<input type="text" name="county" id="county">
					</p>
					<p>
						<label for="postcode">Postcode *</label>
						<input type="text" name="postcode" id="postcode">	
                    </p>
					<p>
						<label for="email-address">Email Address *</label>
						<input type="text" name="email-address" id="email-address" onblur="this.value=removeSpaces(this.value);">
					</p>
					<p>
						<label for="confirm-email">Confirm Email Address *</label>
						<input type="text" name="confirm-email" id="confirm-email" onblur="this.value=removeSpaces(this.value);">
                    </p>
                    <p>
						<label for="telephone-number">Telephone Number *</label>
						<input type="text" name="telephone-number" id="telephone-number">
						<small>Example 01234 123456</small>
                    </p>
                    <p>
						<label for="account-number">Teva UK Limited Account Number</label>
						<input type="text" name="account-number" id="account-number">
					</p>
                    <p>
						<label for="manager-name">Teva Territory Manager Name and Number</label>
						<input type="text" name="manager-name" id="manager-name">
					</p>
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-one">
					</p>
				</div>
				<!-- section two -->
				<div class="section section-two hidden">
                    <h2>Patients</h2>
                    <p>
						<label for="total-patients">Total Patients</label>
						<input type="text" name="total-patients" id="total-patients">
                    </p>
                    <p>
						<label for="total-dispensing-patients">Total Dispensing Patients</label>
						<input type="text" name="total-dispensing-patients" id="total-dispensing-patients">
                    </p>
                    <p>
						<input class="btn-primary" type="button" value="Continue" id="cont-two">
					</p>
                </div>
				<!-- section three -->
				<div class="section section-three hidden">
					<h2>Wholesaler</h2>
					<p>
						<label for="wholesaler-account-name">Wholesaler Name *</label>
                        <select name="wholesaler-account-name" id="wholesaler-account-name" class="wholesale-list custom-select">
                            <option value="AAH">AAH</option>
							<option value="Alliance Healthcare">Alliance Healthcare</option>
							<option value="Phoenix">Phoenix</option>
							<option value="DE Group">DE Group</option>
                        </select>
					</p>
					<p>
						<label for="wholesaler-account-number">Wholesaler Account Number</label>
						<input type="text" name="wholesaler-account-number" id="wholesaler-account-number">
					</p>
					<p>
						<label for="wholesaler-depot">Wholesaler Depot</label>
						<input type="text" name="wholesaler-depot" id="wholesaler-depot">					
					</p>					
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-three">
					</p>
				</div>
				<!-- section four -->
				<div class="section section-four hidden">
					<h2>Discount Level</h2>
					<p>Teva UK Limited are pleased to be able to offer the discounts below</p>
					<p class="smaller-text red hidden" id="disc-error">Please select at least one discount before continuing</p>					
					<div class="form-box">
						<p><strong>Please tick for discount *</strong></p>
                        <p>
                            <input type="checkbox" name="axsain-discount" id="axsain-discount" class="discount" value="yes">
                            <label for="braltus-discount">Axsain&reg; 45g tube</label><em>Discount <strong>30%</strong></em>
                            <small>Capsaicin cream 0.075%</small>
                            <small>Reimbursement Price <strong>&pound;14.58</strong> | Discounted Price <strong>&pound;10.21</strong></small>
                        </p>
						<p>
							<input type="checkbox" name="braltus-discount" id="braltus-discount" class="discount" value="yes">
							<label for="braltus-discount">Braltus&reg; Zonda&reg; 10mcg</label><em>Discount <strong>25%</strong></em>
							<small>Reimbursement Price <strong>&pound;25.80</strong> | Discounted Price <strong>&pound;19.35</strong></small>
						</p>
						<p>
							<input type="checkbox" name="duoresp-160-discount" id="duoresp-160-discount" class="discount" value="yes">
							<label for="duoresp-160-discount">DuoResp&reg; Spiromax&reg; 160mcg/4.5mcg</label><em>Discount <strong>30%</strong></em>
							<small>Reimbursement Price <strong>&pound;27.97</strong> | Discounted Price <strong>&pound;19.58</strong></small>
						</p>
						<p>
							<input type="checkbox" name="duoresp-320-discount" id="duoresp-320-discount" class="discount" value="yes">
							<label for="duoresp-320-discount">DuoResp&reg; Spiromax&reg; 320mcg/9mcg</label><em>Discount <strong>30%</strong></em>
							<small>Reimbursement Price <strong>&pound;27.97</strong> | Discounted Price <strong>&pound;19.58</strong></small>
						</p>
						<p>
							<input type="checkbox" name="qvar-50-discount" id="qvar-50-discount" class="discount" value="yes">
							<label for="qvar-50-discount">Qvar&reg; MDI 50mcg</label><em>Discount <strong>40%</strong></em>
							<small>Reimbursement Price <strong>&pound;7.87</strong> | Discounted Price <strong>&pound;4.72</strong></small>
						</p>
						<p>
							<input type="checkbox" name="qvar-100-discount" id="qvar-100-discount" class="discount" value="yes">
							<label for="qvar-100-discount">Qvar&reg; MDI 100mcg</label><em>Discount <strong>40%</strong></em>
							<small>Reimbursement Price <strong>&pound;17.21</strong> | Discounted Price <strong>&pound;10.33</strong></small>
						</p>
						<p>
							<input type="checkbox" name="qvar-easi-50-discount" id="qvar-easi-50-discount" class="discount" value="yes">
							<label for="qvar-easi-50-discount">Qvar&reg; Easi-Breathe&reg; 50mcg</label><em>Discount <strong>30%</strong></em>
							<small>Reimbursement Price <strong>&pound;7.74</strong> | Discounted Price <strong>&pound;5.42</strong></small>
						</p>
						<p>
							<input type="checkbox" name="qvar-easi-100-discount" id="qvar-easi-100-discount" class="discount" value="yes">
							<label for="qvar-easi-100-discount">Qvar&reg; Easi-Breathe&reg; 100mcg</label><em>Discount <strong>30%</strong></em>
							<small>Reimbursement Price <strong>&pound;16.95</strong> | Discounted Price <strong>&pound;11.87</strong></small>
						</p>
                        <p>
                            <input type="checkbox" name="zacin-discount" id="zacin-discount" class="discount" value="yes">
                            <label for="braltus-discount">Zacin&reg; 45g tube</label><em>Discount <strong>30%</strong></em>
                            <small>Capsaicin cream 0.025%</small>
                            <small>Reimbursement Price <strong>&pound;17.71</strong> | Discounted Price <strong>&pound;12.40</strong></small>
                        </p>
					</div>

					<input class="btn-primary" type="button" value="Continue" id="cont-four">

				</div>
				<!-- section five -->
				<div class="section section-five hidden">
					<h2>VAT</h2>
					<p>In order to comply with HMRC requirements, the documentation issued along with the rebate must include the VAT number of the dispensing practice.</p>
					<p>
						<label for="vat-number">VAT Number *</label>
						<input type="text" name="vat-number" id="vat-number">
					</p>
					<p>
						<label for="bank-account-name">Business Bank Account Name *</label>
						<input type="text" name="bank-account-name" id="bank-account-name">
					</p>
					<p>
						<label for="bank-name">Bank *</label>
						<input type="text" name="bank-name" id="bank-name">
					</p>
					<p>
						<label for="sort-code">Sort Code *</label>
						<input type="text" name="sort-code" id="sort-code">					
						<small>Example 112233</small>
					</p>
					<p>
						<label for="account-number">Account Number *</label>
						<input type="text" name="bank-account-number" id="bank-account-number">
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
					<span class="smaller-text red hidden" id="bank-conf-error">Please tick this box. Without this information Teva CANNOT progress your sign-up any further.</span>
					<span class="block clear"></span>
					<input type="checkbox" name="bank-confirmation" id="bank-confirmation" class="block span-end" value="yes">
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
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-five">
					</p>

				</div>
				<!-- section six -->
				<div class="section section-six hidden">
					<h2>Sales Data Release</h2>
						<p>This is to confirm permission for the named wholesaler to provide data on the sales of Teva products to Teva UK Limited. Data will be provided daily and will only be used in operation with the TevaOne Inhaler Discount Scheme.</p>
						<p><span class="smaller-text red hidden" id="sales-conf-error">Please tick this box. Without this information Teva CANNOT progress your sign-up any further.</span></p>
						<div class="form-box">
							<h2>On Behalf of (Authorised Signatory) *</h2>
							<p>	
								<input type="checkbox" name="confirm" id="confirm" value="yes">
								<label for="confirm">Please tick to confirm</label>
							</p>
						</div>
						<br />
						<p><em>SEPARATE FORMS ARE REQUIRED FOR EACH BRANCH</em></p>
							<p>
								<input class="btn-primary" type="button" value="Continue" id="cont-six">
							</p>
				</div>
				<!-- section seven -->
				<div class="section section-seven hidden">
                    <h2>Marketing Consent</h2>
                    <p>Are you happy for Teva UK and its affiliates to contact you with promotional information about Teva events, products and services? As part of this, we use information such as the Teva emails you read, the Teva web pages you visited, and the Teva-organised or Teva-sponsored events you attended, to ensure they stay relevant for professionals like you. All of this is described in our <a href="https://www.tevauk.com/general-pages/Privacy_Policy" target="_blank">privacy notice</a>, which also explains how you can change your preferences.</p>
                    <p>
                        <input type="checkbox" name="marketing-agree" id="marketing-agree" class="span-end" value="yes">
                        <span class="bold">I wish to be contacted with promotional information about Teva events, products and services.</span>
                    </p>
					<h2>Terms and Conditions</h2>
					<p>This scheme comes into effect from the date signed up and will only apply to products ordered after this date from your nominated wholesaler.</p>
					<p>Teva UK Limited reserve the right to withdraw or modify this scheme at any time & will give written notice of any intention to do so.</p>
					<p>Any change to the scheme (including discount levels & prices) will be made in writing by Teva prior to the effective date of such changes.</p>
					<p>Products supplied are on the understanding that they are dispensed to patients registered in the named practice. Failure to adhere to this will result in immediate termination of your inclusion in this scheme and any discounts received will be subject to repayment to Teva UK Limited.</p>
					<p>The Participant acknowledges and agrees that Teva will collect sales data from the nominated wholesaler or IMS to be used for the operation and monitoring of the Teva UK Dispensing Doctor Inhaler Discount Scheme. All personal information that you provide us with will be held securely by Teva UK Limited and will be used to register the Participant for and to administer the inhaler discount scheme payments.</p>
					<p>For more information and for details about your data protection rights, including to ask to withdraw any permissions you have given please view the full Privacy Policy by visiting:  <a href="https://www.tevauk.com/general-pages/Privacy_Policy" />https://www.tevauk.com/general-pages/Privacy_Policy</a></p>
					<p>Monthly rebates including VAT will be paid by Teva via BACs, unless otherwise agreed with the Participant.</p>
                    <p>Any queries regarding any claimed under payment in connection with Teva Manufacturers Discount Scheme must be notified in writing within three (3) months of the date of the rebate being paid. It shall be Teva’s discretion whether to process claims after this three (3) month period.</p>
					
					<p>
						<input type="checkbox" name="terms-agree" id="terms-agree" class="span-end" value="yes">
						<span class="bold">On behalf of the Participant, I hereby agree to be bound by these Terms and Conditions</span>
					</p>
					<p><strong>If you have any questions or for further information please call: FREEPHONE - 0800 389 4644</strong></p>
					<p class="smaller-text red hidden" id="terms-error">Please accept Terms and Conditions before continuing</p>
					<p>
						<input class="btn-primary" type="button" value="Continue" id="cont-seven">
					</p>
				</div>
				<!-- section eight -->
				<div class="section section-eight hidden">
					<h2>Now finalise your Manufacturers Discount Scheme sign up</h2>
					<p>A confirmation email has been sent to your email address. To verify your details and help us maintain security, please check your emails to finalise your Scheme sign up and to activate your account.</p>
					<p>You have 7 working days to finalise your Teva Scheme sign up.</p>
					<p><a href="/dispensing-doctor/home"><input type="button" value="Return to homepage" class="lrg-button teva-one-link-plain btn-primary"></a></p>
				</div>
				</fieldset>
			 </form>

<?php
echo '</main>';
// Footer markup
echo $this->element('pharmacy/footer');
?>
</div>