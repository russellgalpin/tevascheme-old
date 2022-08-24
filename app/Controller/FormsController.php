<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Sanitize', 'Utility');

/**
 * Forms Controller
 * @author Andy Foote 
 */
class FormsController extends AppController {

    // This part of the system will only send emails if this is set to true.
    private $emails_enabled = true;
	
    // All emails <From>    
	//private $email_from = array('donotreply@tevaschemesignup.com' => 'Teva Scheme Website');
	private $email_from = array('donotreply@tevascheme.tevauk.com' => 'Teva Scheme Website');	
	
    // Advantage Forms <To>
    private $email_advantage = 'murresources@tevauk.com';
    
	// Contact Us Forms <To>
    private $email_contact_us = 'TEVAUK_Sales_Liaison@tevapharm.com';
	
    // Dispensing Doctor Generics Patient Communication Kit Forms <To>
    private $email_generics = 'murresources@tevauk.com';
    
	// Learning Zone Sign Up Forms <To>
    private $email_learning_zone = 'murresources@tevauk.com';	
    
	// PriceWatch Preview Registration Forms <To>
    private $email_pricewatch = 'pricewatch@tevauk.com';	
    
	// DRUM E-learning Sign Up Forms <To>
    private $email_drum = 'murresources@tevauk.com';
    
	// Teva Scheme Sign Up Forms <To>
    private $email_sign_up = 'Ukteva.Scheme@tevauk.com';
	//private $email_sign_up = 'developers@nublue.co.uk';

	// Teva Scheme Inhaler Scheme Form <To>
    private $email_inhalers = 'Ukteva.Scheme@tevauk.com';
		  		    
	// Bank details <From> This one may have to stay as developers@nublue.co.uk so it matches the Email Certificate!
    private $email_bank_from = 'developers@nublue.co.uk';
    
	// Bank details <To>
    private $email_bank_to = 'Ukteva.scheme@tevauk.com';
	//private $email_bank_to = 'developers@nublue.co.uk';
	    
	// CSV Sign Up report <To>    
	private $email_sign_up_csv = array('Ukteva.Scheme@tevauk.com', 'developers@nublue.co.uk');

	// CSV Inhaler report <To>    
	private $email_inhaler_csv = array('Ukteva.scheme@tevauk.com', 'a.hayes@ctidigital.com');
	
	// 360 Order forms <To>
	private $email_threesixty = 'murresources@tevauk.com';


    
    /**
     * Display a form based on the last 2 URL parameters. 
     * These should match a View for the form, e.g. 'pharmacy_support/cms_advantage_form'.     
     */
    public function index() {
        // Use a different layout depending on website (Pharmacy Support or Dispensing Doctor) 
        if ($this->request->params['pass'][0] == 'pharmacy') {
            $this->layout = 'pharmacy';
        } elseif ($this->request->params['pass'][0] == 'dispensing_doctor') {
            $this->layout = 'dispensing_doctor';
        } else {
            // If it isn't one of the above then nothing can be rendered anyway so show 404.
            throw new NotFoundException(__('Form not found'));
        }


        if (!empty($this->request->params['pass'][1])) {
            // Create the folder/filename of the View by combining the last 2 URL params.
			
            $form = $this->request->params['pass'][0] . '/' . $this->request->params['pass'][1];
            $this->render($form);
        } else {
            // If the above doesn't work then we can't load the form so show 404.
            throw new NotFoundException(__('Form not found'));
        }
    }
	
	
	
	/**
	 * 13-02-2014 PR-TEV-EMA
	 * Form to capture details from people who want to receive Teva Price List by email.
	 */
	public function price_list_signup() {
		// Don't index this page
        $this->set('meta_robots', 'noindex');
		
		$this->render('price_list_signup/price_list_signup');
	}
	
	/**
	 * Handles submission of price_list_signup() form
	 */
	public function price_list_signup_form_submit() {
		// Requires POST data
        if ($this->request->isPost()) {
		
			// Save data
			$this->loadModel('Pricelist');
			
			$data = array(
				'customer-name' => $this->request->data['customer-name'],
				'teva-account-number' => $this->request->data['teva-account-number'],
				'pharm-name-address' => $this->request->data['pharm-name-address'],
				'pharm-name-address-two' => $this->request->data['pharm-name-address-two'],
				'pharm-name-address-three' => $this->request->data['pharm-name-address-three'],
				'pharm-town-city' => $this->request->data['pharm-town-city'],
				'pharm-county' => $this->request->data['pharm-county'],
				'pharm-postcode' => $this->request->data['pharm-postcode'],
				'email-address' => $this->request->data['email-address'],
				'mobile-number' => $this->request->data['mobile-number'],
				'checkbox' => ( ($this->request->data['opt-in']) ? 'Yes' : 'No')
			);
			
			$this->Pricelist->create();
			$this->Pricelist->save($data);
		
			// Redirect to thank you page.
			$this->redirect(array('action' => 'price_list_signup_thankyou'));
			
		} else {
            // If there isn't any POST data the above is un-usable.
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
	}
	
	/**
	 * Price List sign up thank you page
	 */
	public function price_list_signup_thankyou() {	
		// Don't index this page
        $this->set('meta_robots', 'noindex');
		
		$this->render('price_list_signup/thankyou');
	}
	
	
	/**
	 * Export Price List signups as a CSV file, from the CMS.	 
	 */
	public function admin_export_price_list_signup() {
	
		$this->render('price_list_signup/admin_export_price_list_signup');
		
		// Form POST data - date ranges to export
		if ($this->request->isPost()) {
			$from = $this->request->data['Form']['date_from'];
			$to = $this->request->data['Form']['date_to'];
			
			$this->loadModel('Pricelist');
			$data = array();
			$data = $this->Pricelist->find('all',
					array(
						'conditions' => array(
							"created >= '" . $from . " 00:00:00'",
							"created <= '" . $to . " 23:59:59'",
						)
					)
				);
						
			if (!empty($data)) {
				// Export data as a CSV
				$foldername = APP . DS . 'webroot' . DS . 'files' . DS;
				$filename = 'pricelist_sign_ups_' . date('d-m-Y_H-i-s', time()) . '.csv';
				$fp = fopen($foldername . $filename, 'w');

				// Column headings
				$headings = '';
				$headings .= 'Customer Name,';
				$headings .= 'Account Number,';
				$headings .= 'Pharmacy Name/Address 1,';
				$headings .= 'Pharmacy Name/Address 2,';
				$headings .= 'Pharmacy Name/Address 3,';
				$headings .= 'Town/City,';
				$headings .= 'County,';
				$headings .= 'Postcode,';
				$headings .= 'Email Address,';
				$headings .= 'Mobile Number,';
				$headings .= 'Opted-in,';
				$headings .= 'Date of Sign Up,';
				// New line after headings
				$headings .= "\r\n";

				// Write column headings
				fwrite($fp, $headings);

				// Loop through data obtained earlier.
				foreach ($data as $d) {
					$line = '';
					$line .= str_replace(',', ';', $d['Pricelist']['customer-name']) . ',';
					$line .= $d['Pricelist']['teva-account-number'] . ',';
					$line .= str_replace(',', ';', $d['Pricelist']['pharm-name-address']) . ',';
					$line .= str_replace(',', ';', $d['Pricelist']['pharm-name-address-two']) . ',';
					$line .= str_replace(',', ';', $d['Pricelist']['pharm-name-address-three']) . ',';
					$line .= str_replace(',', ';', $d['Pricelist']['pharm-town-city']) . ',';
					$line .= str_replace(',', ';', $d['Pricelist']['pharm-county']) . ',';
					$line .= $d['Pricelist']['pharm-postcode'] . ',';
					$line .= $d['Pricelist']['email-address'] . ',';
					$line .= $d['Pricelist']['mobile-number'] . ',';
					$line .= $d['Pricelist']['checkbox'] . ',';
					$line .= $d['Pricelist']['created'] . ',';					
				   
					// Start new line
					$line .= "\r\n";

					// Write each line to file
					fwrite($fp, $line);
				}

				fclose($fp);

				header('Content-type: text/csv');
                header('Content-Disposition: attachemnt; filename="' . $filename . '"');
                readfile($foldername . $filename);

                // Remove after sending to browser for download.
                unlink($foldername . $filename);

                exit;
			
			} else {
				// Nothing to export
				$this->Session->setFlash('There are no signups to export for the date range you have selected. Please try an alternative date range.');
			}
		} 
	}
	
	
	/**
	 * Handles submission of 360 Business Planning Tool order form
	 */
	public function threesixty_form_submit() {
		// Requires POST data
        if ($this->request->isPost()) {
			// Construct message to send via email
            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . ' has been submitted.</p>
            	</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Full Name:</strong></td>
            	<td colspan="2"> ' . $this->request->data['full-name'] . '</td>
            </tr>
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Name of Teva Scheme:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-scheme'] . '</td>
            </tr>
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Teva Account Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-account'] . '</td>
            </tr>
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Pharmacy Name and Address:</strong></td>
            	<td colspan="2"> ' . $this->request->data['address-line-1'] . '</td>
            </tr>			
			';
			
			if ($this->request->data['address-line-2']) {
				$msg .= '
				<tr style="line-height:40px;">
					<td width="200px">&nbsp;</td>
					<td colspan="2"> ' . $this->request->data['address-line-2'] . '</td>
				</tr>	
				';
			}
			
			if ($this->request->data['address-line-3']) {
				$msg .= '
				<tr style="line-height:40px;">
					<td width="200px">&nbsp;</td>
					<td colspan="2"> ' . $this->request->data['address-line-3'] . '</td>
				</tr>	
				';
			}
			
			$msg .= '
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Town/City:</strong></td>
            	<td colspan="2"> ' . $this->request->data['town-city'] . '</td>
            </tr>			
			<tr style="line-height:40px;">
            	<td width="200px"><strong>County:</strong></td>
            	<td colspan="2"> ' . $this->request->data['county'] . '</td>
            </tr>			
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Nation for income model:</strong></td>
            	<td colspan="2"> ' . $this->request->data['nation'] . '</td>
            </tr>						
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Subscription length:</strong></td>
            	<td colspan="2"> ' . $this->request->data['subscription-length'] . '</td>
            </tr>			
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Contact Name:</strong></td>
            	<td colspan="2"> ' . $this->request->data['contact-name'] . '</td>
            </tr>			
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Telephone Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['tel'] . '</td>
            </tr>			
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Email:</strong></td>
            	<td colspan="2"> ' . $this->request->data['email-address'] . '</td>
            </tr>			
			<tr style="line-height:40px;">
            	<td width="200px"><strong>Eligibility criteria:</strong></td>
            	<td colspan="2"> ' . $this->request->data['criteria'] . '</td>
            </tr>			
			</table>
			';
			
			// Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_threesixty)                        
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            $this->redirect(array('action' => 'thankyou/pharmacy'));
		} else {
            // If there isn't any POST data the above is un-usable.
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
	}

    /**
     * Handles submission of Pharmacy Support Advantage forms 
     */
    public function advantage_form_submit() {
        // Requires POST data
        if ($this->request->isPost()) {

            // Construct message to send via email
            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . ' has been submitted.</p>
            	</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Full Name:</strong></td>
            	<td colspan="2"> ' . $this->request->data['pharm-full-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Name of Teva Scheme:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-scheme-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Teva Account Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-account-number'] . '</td>
            </tr>
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Practice Information</p>
            	</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Address 1:</strong></td>
            	<td width="300px" style="line-height:40px;"> ' . $this->request->data['pharm-name-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Address 2:</strong></td>
            	<td> ' . $this->request->data['pharm-name-address-two'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Address 3:</strong></td>
            	<td> ' . $this->request->data['pharm-name-address-three'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Town/City:</strong></td>
            	<td> ' . $this->request->data['pharm-town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>County:</strong></td>
            	<td> ' . $this->request->data['pharm-county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Postcode:</strong></td>
            	<td> ' . $this->request->data['pharm-postcode'] . '</td>
            </tr>';

            if (!empty($this->request->data['del-name-address'])) {
                $msg .= '
                <tr>
                    <td colspan="3">
                            <p style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Delivery Information</p>
                    </td>
                </tr>    
                <tr style="line-height:40px;">
                	<td width="200px">
                		<strong>Address 1:</strong>
                	</td>
                	<td width="300px" style="line-height:40px;"> ' . $this->request->data['del-name-address'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Address 2:</strong></td>
                	<td> ' . $this->request->data['del-name-address-two'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Address 3:</strong></td>
                	<td> ' . $this->request->data['del-name-address-three'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Town/City:</strong></td>
                	<td> ' . $this->request->data['del-town-city'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>County:</strong></td>
                	<td> ' . $this->request->data['del-county'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Postcode:</strong></td>
                	<td> ' . $this->request->data['postcode'] . '</td>
                </tr>';
            }

            $msg .= 'Finser
                <td colspan="3">
                            <p style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Contact Details</p>
                    </td>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Contact Name:</strong></td>
            	<td colspan="2"> ' . $this->request->data['contact-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Telephone Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['tel'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Email Address:</strong></td>
            	<td colspan="2"> ' . $this->request->data['email-address'] . '</td>
            </tr>   
            

            <tr style="line-height:40px;">
            	<td width="200px"><strong>Payment Details:</strong></td>
            ';

            if ($this->request->data['opt-meet-criteria'] == '1') {
                $msg .= '
                
                	<td colspan="2">I meet the criteria to receive the CMS Advantage kit free of charge.</td>
                ';
            }

            if ($this->request->data['opt-meet-criteria'] == '0') {
                $msg .= '
                
                	<td colspan="2">Please contact me to arrange payment of &pound;50.</td>
                ';
            }

            $msg .= '</tr></table>';

            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_advantage)                        
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            $this->redirect(array('action' => 'thankyou/pharmacy'));
        } else {
            // If there isn't any POST data the above is un-usable.
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }

	
	public function inhaler_recycling_form_submit() {
        // Requires POST data
        if ($this->request->isPost()) {

            // Construct message to send via email
            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . ' has been submitted.</p>
            	</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Full Name:</strong></td>
            	<td colspan="2"> ' . $this->request->data['pharm-full-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Name of Teva Scheme:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-scheme-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Teva Account Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-account-number'] . '</td>
            </tr>
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Practice Information</p>
            	</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Address 1:</strong></td>
            	<td width="300px" style="line-height:40px;"> ' . $this->request->data['pharm-name-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Address 2:</strong></td>
            	<td> ' . $this->request->data['pharm-name-address-two'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Address 3:</strong></td>
            	<td> ' . $this->request->data['pharm-name-address-three'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Town/City:</strong></td>
            	<td> ' . $this->request->data['pharm-town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>County:</strong></td>
            	<td> ' . $this->request->data['pharm-county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td><strong>Postcode:</strong></td>
            	<td> ' . $this->request->data['pharm-postcode'] . '</td>
            </tr>';

            if (!empty($this->request->data['del-name-address'])) {
                $msg .= '
                <tr>
                    <td colspan="3">
                            <p style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Delivery Information</p>
                    </td>
                </tr>    
                <tr style="line-height:40px;">
                	<td width="200px">
                		<strong>Address 1:</strong>
                	</td>
                	<td width="300px" style="line-height:40px;"> ' . $this->request->data['del-name-address'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Address 2:</strong></td>
                	<td> ' . $this->request->data['del-name-address-two'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Address 3:</strong></td>
                	<td> ' . $this->request->data['del-name-address-three'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Town/City:</strong></td>
                	<td> ' . $this->request->data['del-town-city'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>County:</strong></td>
                	<td> ' . $this->request->data['del-county'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td><strong>Postcode:</strong></td>
                	<td> ' . $this->request->data['postcode'] . '</td>
                </tr>';
            }

            $msg .= 'Finser
                <td colspan="3">
                            <p style="color:#0091d0; font-weight:bold; font-size:14px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Contact Details</p>
                    </td>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Contact Name:</strong></td>
            	<td colspan="2"> ' . $this->request->data['contact-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Telephone Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['tel'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Email Address:</strong></td>
            	<td colspan="2"> ' . $this->request->data['email-address'] . '</td>
            </tr>   
            

            <tr style="line-height:40px;">
            	<td width="200px"><strong>Payment Details:</strong></td>
            ';

            if ($this->request->data['opt-meet-criteria'] == '1') {
                $msg .= '
                
                	<td colspan="2">I meet the criteria to receive the CMS Inhaler Recycling Kit free of charge.</td>
                ';
            }

            if ($this->request->data['opt-meet-criteria'] == '0') {
                $msg .= '
                
                	<td colspan="2">Please contact me to arrange payment of &pound;100 + VAT.</td>
                ';
            }

			$msg .= '</tr></table>';
			
            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_advantage)                        
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }


            // Redirect based on site customer was on
            if ($this->request->data['form-website'] == 'pharmacy') {
                $redirect = 'thankyou/pharmacy';
            } else {
                $redirect = 'thankyou/dispensing_doctor';
            }
            $this->redirect(array('action' => $redirect));
            // $this->redirect(array('action' => 'thankyou/pharmacy'));
        } else {
            // If there isn't any POST data the above is un-usable.
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }
    /**
     * Handles submission of Contact Us forms 
     */
    public function contact_us_submit() {
        if ($this->request->isPost()) {

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            	<tr>
            		<td colspan="3">
            			<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            		</td>
            	</tr>
            ';

            $msg .= '
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>First Name:</strong></td>
            		<td colspan="2">' . $this->request->data['first-name'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Surname:</strong></td>
            		<td colspan="2">' . $this->request->data['surname'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Job / Position:</strong></td>
            		<td colspan="2">' . $this->request->data['job-position'] . '</td>
            	</tr>   
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Street Address:</strong></td>
            		<td colspan="2">' . $this->request->data['street-address'] . '</td>
            	</tr>        
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Town / City:</strong></td>
            		<td colspan="2">' . $this->request->data['town-city'] . '</td>
            	</tr>            
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>County:</strong></td>
            		<td colspan="2">' . $this->request->data['county'] . '</td>
            	</tr>  
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Postcode:</strong></td>
            		<td colspan="2">' . $this->request->data['county'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Telephone Number:</strong></td>
            		<td colspan="2">' . $this->request->data['tel'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="150px"><strong>Email Address:</strong></td>
            		<td colspan="2">' . $this->request->data['email-address'] . '</td>
            	</tr> 
            ';

            $msg .= '
            	<tr>
            		<td colspan="2"><strong>Are you a current Teva scheme customer?</strong></td>';
            if ($this->request->data['current-customer'] == 'customer-yes') {
                $msg .= '<td style="line-height:40px;">Yes</td></tr>';
            } else {
                $msg .= '<td style="line-height:40px;">No</td></tr>';
            }

            $msg .= '
            	<tr>
            		<td colspan="2"><strong>Would you like to request a visit from your local Territory Sales Manager?</strong><br/></td> ';
            if ($this->request->data['manager-visit'] == 'visit-yes') {
                $msg .= '<td width="200px" style="line-height:40px;">Yes</td></tr>';
            } else {
                $msg .= '<td width="200px" style="line-height:40px;">No</td></tr>';
            }

            if ($this->request->data['ask-question']) {
                $msg .= '
                <tr style="line-height:40px;">
                	<td width="150px"><strong>Questions:</strong></td>
                	<td> ' . $this->request->data['ask-question'] . '</td>
                </tr>';
            }

            $msg .= '</table>';

            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_contact_us)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            // Redirect based on site customer was on
            if ($this->request->data['form-website'] == 'pharmacy') {
                $redirect = 'thankyou/pharmacy';
            } else {
                $redirect = 'thankyou/dispensing_doctor';
            }
            $this->redirect(array('action' => $redirect));
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }

    /**
     * Handles Generics Patient Communication Kit Order Form submissions
     */
    public function generics_patient_comm_kit_submit() {
        if ($this->request->isPost()) {

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3">
        				<img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" />
        			</td>
        		</tr>
        	';

            // Construct message to send via email
            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            	</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Full Name:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['pharm-full-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Name of Teva Scheme:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['teva-scheme-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Teva Account Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-account-number'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px">
            		<strong>Surgery:</strong>
            	</td>
            	<td width="300px" style="line-height:40px;"> ' . $this->request->data['pharm-name-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-name-address-two'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-name-address-three'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td><td> ' . $this->request->data['pharm-town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-postcode'] . '</td>
            </tr>';

            if (!empty($this->request->data['del-name-address'])) {
                $msg .= '
                <tr style="line-height:40px;">
                	<td width="200px">
                		<strong>Delivery Address:</strong>
                	</td>
                	<td width="300px" style="line-height:40px;"> ' . $this->request->data['del-name-address'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td>&nbsp;</td>
                	<td> ' . $this->request->data['del-name-address-two'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td>&nbsp;</td>
                	<td> ' . $this->request->data['del-name-address-three'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td>&nbsp;</td>
                	<td> ' . $this->request->data['del-town-city'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td>&nbsp;</td>
                	<td> ' . $this->request->data['del-county'] . '</td>
                </tr>
                <tr style="line-height:40px;"><td>&nbsp;</td>
                	<td> ' . $this->request->data['postcode'] . '</td>
                </tr>';
            }

            $msg .= '
                <tr style="line-height:40px;">
                	<td width="200px"><strong>Contact Name:</strong></td>
                	<td colspan="2"> ' . $this->request->data['contact-name'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td width="200px"><strong>Telephone Number:</strong></td>
                	<td colspan="2"> ' . $this->request->data['tel'] . '</td>
                </tr>
                <tr style="line-height:40px;">
                	<td width="200px"><strong>Email Address:</strong></td>
                	<td colspan="2"> ' . $this->request->data['email-address'] . '</td>
                </tr>            
            ';

            if ($this->request->data['opt-meet-criteria'] == '1') {
                $msg .= '
                <tr style="line-height:40px;">
                	<td colspan="3"><p>I meet the criteria to receive the Generics Patient Communication kit free of charge.</p></td>
                </tr>';
            }

            if ($this->request->data['opt-meet-criteria'] == '0') {
                $msg .= '
                <tr style="line-height:40px;">
                	<td colspan="3"><p>Please contact me to arrange payment of &pound;30.</p></td>
                </tr>';
            }

            $msg .= '</table>';

            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_generics)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            // Redirect based on site customer was on
            if ($this->request->data['form-website'] == 'pharmacy') {
                $redirect = 'thankyou/pharmacy';
            } else {
                $redirect = 'thankyou/dispensing_doctor';
            }
            $this->redirect(array('action' => $redirect));
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }

    /**
     * Handles submission of Teva Learning Zone Sign Up forms. 
     */
    public function teva_learning_zone_submit() {
        if ($this->request->isPost()) {
            // Construct message to send via email

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3">
        				<img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" />
        			</td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            	</td>
            </tr>';

            $msg .=
                    '
            <tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Pharmacist Full Name:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['pharm-full-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Name of Teva Scheme:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['teva-scheme-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Teva Account Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-account-number'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px">
            		<strong>Pharmacy:</strong>
            	</td>
            	<td width="300px" style="line-height:40px;"> ' . $this->request->data['pharm-name-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-name-address-two'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-name-address-three'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td><td> ' . $this->request->data['pharm-town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-postcode'] . '</td>
            </tr>
            ';
			
			// which Teva Learning Zone skills package you would like access to:
			if (isset($this->request->data['soft-skills-package']) || isset($this->request->data['professional-skills-package'])) {
				$package = '';
				
				if (isset($this->request->data['soft-skills-package'])) {
					$package .= 'Soft skills package. ';
				}
				
				if (isset($this->request->data['professional-skills-package'])) {
					$package .= 'Professional skills package.';
				}				
			$msg .= '
			<tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Skills Package(s) Requested:</strong>
            	</td>
            	 <td>' . $package . '</td>
            </tr>
			';
			}
			
			
			
			// relevant nation for access to the Teva Learning Zone
			if (isset($this->request->data['nation'])) {
			$msg .= '
			<tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Nation for access to Learning Zone:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['nation'] . '</td>
            </tr>
			';
			}

            // Learning Zone Users
            $i = 0;
            $msg .= '
            <tr style="line-height:40px;">
            	<td style="vertical-align: top;"><strong>Learning Zone Users:</strong></td><td>';
            foreach ($this->request->data['full-name-user'] as $key => $value) {
                $msg .= $value . ' - ' . $this->request->data['email-address-user'][$i] . '<br />';
                $i++;
            }
            $msg .= '</td></tr>';


            $msg .= '
                <tr style="line-height:40px;">
            		<td width="200px"><strong>Contact Name:</strong></td>
            		<td width="300px" style="line-height:40px;"> ' . $this->request->data['contact-name'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Telephone Number:</strong></td>
                	<td width="300px" style="line-height:40px;"> ' . $this->request->data['tel'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Email Address:</strong></td>
            		<td width="300px" style="line-height:40px;"> ' . $this->request->data['email-address'] . '</td>
            	</tr>

            ';

            if ($this->request->data['opt-meet-criteria'] == 'opt-criteria') {
                $msg .= '
                <tr style="line-height:40px;">
                	<td colspan="3"><p>I meet the criteria to receive the Teva Learning Zone free of charge.</p></td>
                </tr>';
            }

            if ($this->request->data['opt-meet-criteria'] == 'opt-contact-payment') {
                $msg .= '
                <tr style="line-height:40px;">
                	<td colspan="3"><p>Please contact me to arrange payment of &pound;30 per user.</p></td>
                </tr>
                ';
            }

            $msg .= '</table>';

            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                //$email->from($this->email_from)
                $email->from($this->email_from)
                        ->to($this->email_learning_zone)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            // Redirect based on site customer was on
            if ($this->request->data['form-website'] == 'pharmacy') {
                $redirect = 'thankyou/pharmacy';
            } else {
                $redirect = 'thankyou/dispensing_doctor';
            }
            $this->redirect(array('action' => $redirect));
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }


    /**
     * Handles submission of PriceWatch Preview Registration
     */
    public function pw_preview_submit() {
        if ($this->request->isPost()) {

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3"><p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">A new PriceWatch Preview Registration has been submitted.</p>
            	</td>
            </tr>';

            $msg .=
                    '
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Full Name:</strong></td>
            	<td> ' . $this->request->data['first-name'] . ' ' . $this->request->data['surname'] . '</td>
            </tr>            
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Customer Type:</strong></td>
            	<td> ';

            if ($this->request->data['opt-pharm-disp'] == 'opt-pharmacist') {
                $msg .= 'Pharmacist</td></tr>';
            }
            if ($this->request->data['opt-pharm-disp'] == 'opt-dispensary') {
                $msg .= 'Dispensary Manager</td>
            </tr>';
            }

            $msg .=
                    '
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Practice Name:</strong></td>
            	<td> ' . $this->request->data['company-practice-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Street Address 1:</strong></td>
            	<td> ' . $this->request->data['street-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Street Address 2:</strong></td>
            	<td> ' . $this->request->data['street-address-two'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Town / City:</strong></td>
            	<td> ' . $this->request->data['town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>County:</strong></td>
            	<td> ' . $this->request->data['county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Postcode:</strong></td>
            	<td> ' . $this->request->data['postcode'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Mobile Number:</strong></td>
            	<td> ' . $this->request->data['mobile-number'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Email Address:</strong></td>
            	<td> ' . $this->request->data['email-address'] . '</td>
            </tr>';

            if ($this->request->data['opt-text-email'] == 'opt-email-with-text') {
                $msg .= '
                <tr>
                	<td colspan="3"><p>PriceWatch Preview Email, along with text message notification that the Email has been sent.</p></td>
                </tr>';
            }

            if ($this->request->data['opt-text-email'] == 'opt-email-no-text') {
                $msg .= '
                <tr>
                	<td colspan="3"><p>PriceWatch Preview Email only.</p></td>
                </tr>';
            }

            $msg .= '</table>';

            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_pricewatch)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            // Redirect based on site customer was on
            if ($this->request->data['form-website'] == 'pharmacy') {
                $redirect = 'thankyou/pharmacy';
            } else {
                $redirect = 'thankyou/dispensing_doctor';
            }
            $this->redirect(array('action' => $redirect));
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }

    /**
     * Handles submission of DRUM E-learning Sign Up form
     */
    public function drum_e_learning_submit() {
        if ($this->request->isPost()) {

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            	</td>
            </tr>';

            $msg .=
                    '
            <tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Pharmacist Full Name:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['pharm-full-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px">
            		<strong>Name of Teva Scheme:</strong>
            	</td>
            	<td colspan="2"> ' . $this->request->data['teva-scheme-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="150px"><strong>Teva Account Number:</strong></td>
            	<td colspan="2"> ' . $this->request->data['teva-account-number'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px">
            		<strong>Pharmacy:</strong>
            	</td>
            	<td width="300px" style="line-height:40px;"> ' . $this->request->data['pharm-name-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-name-address-two'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-name-address-three'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td><td> ' . $this->request->data['pharm-town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td>&nbsp;</td>
            	<td> ' . $this->request->data['pharm-postcode'] . '</td>
            </tr>
            ';

            // Drum E-learning Users
            $i = 0;
            $msg .= '
            <tr style="line-height:40px;">
            	<td style="vertical-align: top;"><strong>DRUM E-Learning Users:</strong></td><td>';
            foreach ($this->request->data['full-name-user'] as $key => $value) {
                $msg .= $value . ' - ' . $this->request->data['email-address-user'][$i] . '<br />';
                $i++;
            }
            $msg .= '</td></tr>';

            $msg .= '
                <tr style="line-height:40px;">
            		<td width="200px"><strong>Contact Name:</strong></td>
            		<td width="300px" style="line-height:40px;"> ' . $this->request->data['contact-name'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Telephone Number:</strong></td>
                	<td width="300px" style="line-height:40px;"> ' . $this->request->data['tel'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Email Address:</strong></td>
            		<td width="300px" style="line-height:40px;"> ' . $this->request->data['email-address'] . '</td>
            	</tr>            
            ';

            if ($this->request->data['opt-meet-criteria'] == 'opt-criteria') {
                $msg .= '
                <tr>
            	<td colspan="3">
            		<p>I meet the criteria to receive access to the DRUM E-learning module free of charge.</p>
            	</td>
            	</tr>';
            }

            if ($this->request->data['opt-meet-criteria'] == 'opt-contact-payment') {
                $msg .= '
                <tr>
            	<td colspan="3">
            		<p>Please contact me to arrange payment of &pound;20 per user.</p>
            	</td>
            	</tr>';
            }

            $msg .= '</table>';

            // Send email
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_drum)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

            $this->redirect(array('action' => 'thankyou/dispensing_doctor'));
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }

    /**
     * Handles Sign Up forms 
     */
    public function sign_up_submit() {
        if ($this->request->isPost()) {

			
			// The uploaded file from the browser
			$uploaded_file = $this->_upload_file($_FILES['upload-documents']);

            // A unique reference is needed for each Sign Up.
            // This appears in both the Sign Up email and any corresponding Bank Account details emails.
            $unique_id = String::uuid();

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            	</td>
            </tr>';

            // Unique ID
            $msg .= '
            	<tr style="line-height:40px;">
            		<td width="200px">
            			<strong>Unique ID:</strong>
            		</td>
                        <td width="300px" style="line-height:40px;">' . $unique_id . '</td></tr>
            	 ';


            // Choose your Teva scheme
            /*$msg .= '
            	<tr style="line-height:40px;">
            		<td width="200px">
            			<strong>Teva Scheme:</strong>
            		</td>
            	 ';
            if ($this->request->data['opt-teva'] == 'opt-teva-one') {*/
                $msg .= '<td width="300px" style="line-height:40px;">TevaOne</td></tr>';
            /*}
            if ($this->request->data['opt-teva'] == 'opt-teva-two') {
                $msg .= '<td width="300px" style="line-height:40px;">TevaTwo</td></tr>';
            }*/
                
            //Requesting change
            $msg .= '<tr style="line-height:40px;">
                <td width="200px"><strong>Amending existing details:</strong></td>
                <td> ' . ($this->request->data['amend']=="Yes" ? "Yes" : "No" )  . '</td>
                </tr>';

            // Are you a current Teva scheme customer?
            $msg .= '
            	<tr style="line-height:40px;">
            		<td width="200px">
            			<strong>Existing Teva Scheme Customer?</strong>
            		</td> ';
            if ($this->request->data['current-customer'] == 'customer-yes') {
                $msg .= '<td width="300px" style="line-height:40px;">Yes ';
                if ($this->request->data['teva-scheme-number']) {
                    $msg .= ' (Scheme Number: ' . $this->request->data['teva-scheme-number'] . ') ';
                }
                $msg .= '</td></tr>';
            }
            if ($this->request->data['current-customer'] == 'customer-no') {
                $msg .= '<td width="300px" style="line-height:40px;">No</td></tr>';
            }

            // Branch Details
            $msg .=
                    '
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Buying Groups:</strong></td>
            	<td> ' . $this->request->data['buying-groups'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Company / Practice Name:</strong></td>
            	<td> ' . $this->request->data['company-practice-name'] . ' </td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Branch / Location Name:</strong></td>
            	<td> ' . $this->request->data['branch-location-name'] . ' </td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Street Address 1:</strong></td>
            	<td> ' . $this->request->data['street-address'] . ' </td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Street Address 2:</strong></td>
            	<td> ' . $this->request->data['street-address-two'] . ' </td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Town / City:</strong></td>
            	<td> ' . $this->request->data['town-city'] . ' </td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>County:</strong></td>
            	<td> ' . $this->request->data['county'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px">   <strong>Postcode:</strong></td>
            	<td> ' . $this->request->data['postcode'] . '</td>
            </tr>   
            ';

            // Wholesaler #1 Details
            $msg .=
                    '
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler #1:</strong></td>
            	<td> ' . $this->request->data['wholesaler-one'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler #1 Account:</strong></td>
            	<td> ' . $this->request->data['w-account-one'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler #1 Depot:</strong></td>
            	<td> ' . $this->request->data['w-depot-one'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler #1 Status:</strong></td>
            	<td> ' . $this->request->data['w-status-one'] . '</td>
            </tr>   
            
            ';

            // Wholesaler #2 Details (optional)
            if ($this->request->data['w-account-two']) {
                $msg .=
                        '
                <tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #2:</strong></td>
            		<td>' . $this->request->data['wholesaler-two'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #2 Account:</strong></td>
            		<td> ' . $this->request->data['w-account-two'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #2 Depot:</strong></td>
            		<td> ' . $this->request->data['w-depot-two'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #2 Status:</strong></td>
            		<td> ' . $this->request->data['w-status-two'] . '</td>
            	</tr>   
                
                ';
            }

            // Wholesaler #3 Details (optional)
            if ($this->request->data['w-account-three']) {
                $msg .=
                        '
                <tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #3:</strong></td>
            		<td> ' . $this->request->data['wholesaler-three'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #3 Account:</strong></td>
            		<td> ' . $this->request->data['w-account-three'] . ' </td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #3 Depot:</strong></td>
            		<td> ' . $this->request->data['w-depot-three'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Wholesaler #3 Status:</strong></td>
            		<td> ' . $this->request->data['w-status-three'] . '</td>
            	</tr>      
                ';
            }


            // Contact Details
            $msg .=
                    '
                <tr style="line-height:40px;">
            		<td width="200px"><strong>Contact Name:</strong></td>
            		<td> ' . $this->request->data['contact-name'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Telephone Number:</strong></td>
            		<td> ' . $this->request->data['telephone-number'] . '</td>
            	</tr>
            	<tr style="line-height:40px;">
            		<td width="200px"><strong>Email Address:</strong></td>
            		<td> ' . $this->request->data['email-address'] . '</td>
            	</tr>
				<tr style="line-height:40px;">
					<td width="200px"><strong>VAT Number:</strong></td>
					<td> ' . $this->request->data['vat-number'] . '</td>
				</tr>
                ';

            if ($this->request->data['additional-comments']) {
                $msg .= '
                <tr style="line-height:40px;">
            		<td width="200px">
                		<strong>Additional Comments:</strong></td>
                		<td> ' . $this->request->data['additional-comments'] . '</td>
                	</tr>';
            }

            // Confirmations
            if ($this->request->data['confirmation']) {
                $msg .= '
                <tr>
        			<td colspan="3"><p>Customer has <strong>confirmed permission</strong> for the nominated wholesaler or IMS to provide data on the sales of Teva UK Limited products to Teva UK Limited.</p></td>
        		</tr>
                ';
            } else {
                $msg .= '
                <tr>
        			<td colspan="3"> <p>Customer has <strong>not confirmed permission</strong> for the nominated wholesaler or IMS to provide data on the sales of Teva UK Limited products to Teva UK Limited.</p></td>
        		</tr>
               ';
            }

            if ($this->request->data['opt_in'] == 'No') {
                $msg .= '
                <tr>
        			<td colspan="3"><p>Customer <strong>does not</strong> want electronic communication about Teva Scheme/products.</p></td>
        		</tr>
                ';
            } else {
                $msg .= '
                <tr>
        			<td colspan="3"><p>Customer <strong>gives permission</strong> to receive electronic communication about Teva Scheme/products.</p></td>
        		</tr>
                ';
            }
            
            if ($this->request->data['bank-confirmation']=="on"){
            	$msg .= '<tr>
        			<td colspan="3"><p>Customer <strong>is</strong> sending banking details</p></td>
        		</tr>';
            }else{
            	$msg .= '<tr>
        			<td colspan="3"><p>Customer <strong>is not</strong> sending banking details</p></td>
        		</tr>';
            }
            
            $msg .= '</table>';

            // Send email to Teva
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_sign_up)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

         	// Email customer with activation link
            $activation_url = 'http://tevascheme.tevauk.com/forms/activate/' . $unique_id;
            $customer_msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $customer_msg .= '
            <tr>
            	<td colspan="3">
            	<br/>
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:24px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">TevaOne scheme sign up</p>
            	</td>
            </tr>';

            /*$customer_msg .=
                    '
            <tr style="line-height:40px;">
            	<td colspan="3">
            	<p style="line-height:40px;">To complete the sign up process please click on the following link: 
					<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
				</p>
				</td>
            </tr>';*/
			
			if ($this->request->data['bank-account-name']) {
				$customer_msg .=
				 '
				<tr style="line-height:40px;">
				<td colspan="3">
				<p style="line-height:20px;">Thank you for signing up to the TevaOne scheme. In order to verify your details and maintain security please follow the below steps:</p>
				<p style="color:#0091d0; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Activate you account now</p>
				<p style="line-height:20px;">Please click on the following link to activate your account to complete the sign up process:
						<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
				</p>
				<p style="color:#0091d0; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Don\'t forget to post proof of account details</p>
				<p style="line-height:20px;">Please post proof of details to:</p>
				
				
				
				<p style="line-height:20px;">
					<strong>Teva Schemes Admin Department,</strong>
					<strong>Teva UK Limited,</strong><br/>
					<strong>Ridings Point, </strong><br/>
					<strong>Whistler Drive, </strong><br/>
					<strong>Castleford, </strong><br/>
					<strong>West Yorkshire.</strong><br/>
					<strong>WF10 5HX</strong><br/>

				</td>
				</tr>
				';
				
				if ($this->request->data['wholesaler-one']) {
					$customer_msg .=
					'				
				<tr>
					<td><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Wholesaler</p></td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 1:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['wholesaler-one'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 1 Account:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-account-one'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 1 Depot:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-depot-one'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 1 Status:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-status-one'].'</p>
					</td>
				</tr>					
				<tr><td>&nbsp;</td></tr>';
				} // wholesaler-one
					
				if ($this->request->data['wholesaler-two']) {
					$customer_msg .=
					'
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 2:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['wholesaler-two'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 2 Account:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-account-two'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 2 Depot:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-depot-two'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 2 Status:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-status-two'].'</p>
					</td>
				</tr>';
				} // wholesaler-two
				
				if ($this->request->data['wholesaler-three']) {
					$customer_msg .=
					'
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 3:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['wholesaler-three'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 3 Account:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-account-three'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 3 Depot:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-depot-three'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Wholesaler 3 Status:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['w-status-three'].'</p>
					</td>
				</tr>';
				} // wholesaler-three				

				$customer_msg .=
				'
				<tr>
					<td><br/><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Buying Group</p></td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Buying Group:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['buying-groups'].'</p>
					</td>
				</tr>						
				<tr>
					<td><br/><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Contact Information</p></td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Company/Practice Name:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['company-practice-name'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Branch/Location Name:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['company-practice-name'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Street Address:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['street-address'].'</p>
					</td>
				</tr>';
				
				if ($this->request->data['street-address-two']) {
					$customer_msg .='				
				<tr>
					<td>
						<p>&nbsp;</p>
					</td>
					<td>
						<p>'.$this->request->data['street-address-two'].'</p>
					</td>
				</tr>';
				} // street-address-two
				
				$customer_msg .='
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Town/City:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['town-city'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>County:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['county'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Postcode:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['postcode'].'</p>
					</td>
				</tr>
				<tr>
					<td><br/><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Need to contact us?</p></td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Telephone:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">0800 085 8620</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Email:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;"><a href="mailto:Ukteva.Scheme@tevauk.com">Ukteva.Scheme@tevauk.com</a></p>
					</td>
				</tr>
							
				
				<tr>
					<td>
						<br/>
						<p style="line-height:20px;">Kind regards,</p>
						<p style="line-height:20px;">The Teva UK Team</p>
						<br/>
						<br/>
						<br/>
					</td>
				</tr>';
			} else {
				$customer_msg .=
				 '
				<tr style="line-height:40px;">
				<td colspan="3">
				<p style="line-height:40px;">Thank you for signing up to the TevaOne scheme. In order to verify your details and maintain security please follow the below steps:</p>				
				<p style="line-height:20px;">&nbsp;</p>
				<p style="line-height:40px;">Please click on the following link to activate your account to complete the sign up process:
						<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
				</p>
				<p style="line-height:40px;">Kind regards,</p>
				<p style="line-height:40px;">The Teva UK Team</p>
				</td>
				</tr>';
			}
			

            $customer_msg .= '</table>';

            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->request->data['email-address'])
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($customer_msg);
            }
            // END: Activation link
            // Bank details are sent separately and encrypted.            
            if ($this->request->data['bank-account-name']) {

                $bank_msg = ''; // Clear                
                $bank_msg .= '
Contact Name: ' . $this->request->data['contact-name'] . '                    
<br>Business Bank Account Name: ' . $this->request->data['bank-account-name'] . '
<br>Bank: ' . $this->request->data['bank-name'] . '    
<br>Account Number: ' . $this->request->data['account-number'] . '
<br>Sort Code: ' . $this->request->data['sort-code'] . ' 
<br>Unique ID: ' . $unique_id . '
<br>Account details sent by post: ' . ($this->request->data['bank-confirmation']=="on"?"yes":"no").'
<br>Details Amended: ' . ($this->request->data['amend']=="Yes"?"yes":"no");

                if ($this->emails_enabled) {
                    $this->send_bank_details($bank_msg, $unique_id, $uploaded_file);
                }
            } // if bank account details    
            // Store Sign Up details to database
            $sql = "
            INSERT INTO forms
            (
            unique_id,
            contact_name,
            telephone,
            email,
            buying_group,
            practice_name,
            branch_name,
            vat_number,
            address1,
            address2,
            city,
			county,
            postcode,
            scheme,
            current_customer,
            subscribed,
            wholesaler_name,
            wholesaler_account,
            wholesaler_depot,
            wholesaler_status,
			wholesaler_name_2,
            wholesaler_account_2,
            wholesaler_depot_2,
            wholesaler_status_2,
			wholesaler_name_3,
            wholesaler_account_3,
            wholesaler_depot_3,
            wholesaler_status_3,
			opt_in,
            created,
            activated,
            date_activated,
            details_in_post
            )
            VALUES
            (
            '" . $unique_id . "',
            '" . Sanitize::clean($this->request->data['contact-name'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['telephone-number'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['email-address'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['buying-groups'],array('encode' => true)) . "',            		
            '" . Sanitize::clean($this->request->data['company-practice-name'],array('encode' => true)) . "',    
            '" . Sanitize::clean($this->request->data['branch-location-name'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['vat-number'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['street-address'],array('encode' => true)) . "', 
            '" . Sanitize::clean($this->request->data['street-address-two'],array('encode' => true)) . "', 
            '" . Sanitize::clean($this->request->data['town-city'],array('encode' => true)) . "', 
			'" . Sanitize::clean($this->request->data['county'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['postcode'],array('encode' => true)) . "',  
            '" . ($this->request->data['opt-teva'] != 'opt-teva-one' ? 'TevaTwo' : 'TevaOne') . "',  
            '" . ($this->request->data['current-customer'] == 'customer-yes' ? 'Yes' : 'No') . "',  
            '" . ($this->request->data['opt_in'] == 'No' ? 'No' : 'Yes') . "', 
            '" . Sanitize::clean($this->request->data['wholesaler-one'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['w-account-one'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['w-depot-one'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['w-status-one'],array('encode' => true)) . "', 
			'" . Sanitize::clean($this->request->data['wholesaler-two'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['w-account-two'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['w-depot-two'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['w-status-two'],array('encode' => true)) . "',
			'" . Sanitize::clean($this->request->data['wholesaler-three'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['w-account-three'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['w-depot-three'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['w-status-three'],array('encode' => true)) . "',
			'',
            '" . date('Y-m-d H:i:s', time()) . "', 
            '',
            NULL,
            '" . ($this->request->data['bank-confirmation'] == 'on' ? '1' : '0') . "'
            )
            ";

            $this->loadModel('Form');
            $this->Form->query($sql);


            // No redirect used
            // There is no redirect used here because the "success" page is shown using jQuery (see AysncForm() in sign_up.js, DD_sign_up.js)
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }

    /**
     * Method Added 16/1/2019 Nublue (Nige)
	 * 
	 * Method added to handle the new inhaler scheme signup submit form for Pharmacy and Dispensing Doctors. 
	 * Similiar to the sign up process, includes sending bank details, confirmation email for signer and Teva and 
	 * storing signup details in the DB.
     *
     **/

    public function inhaler_sign_up_submit() {
        if ($this->request->isPost()) {

			// The uploaded file from the browser
			$uploaded_file = $this->_upload_file($_FILES['upload-documents']);

            // A unique reference is needed for each Sign Up.
            // This appears in both the Sign Up email and any corresponding Bank Account details emails.
            $unique_id = String::uuid();

            $msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $msg .= '
            <tr>
            	<td colspan="3">
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            	</td>
            </tr>';

            // Unique ID
            $msg .= '
            	<tr style="line-height:40px;">
            		<td width="200px">
            			<strong>Unique ID:</strong>
            		</td>
                        <td width="300px" style="line-height:40px;">' . $unique_id . '</td></tr>
            	 ';

			// surgery details

			// surgery_name
			// surgery_address_1
			// surgery_address_2
			// surgery_town
			// surgery_postcode
			// surgery_email
			// surgery_telephone

            $msg .= '
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Name:</strong></td>
            	<td> ' . $this->request->data['surgery-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Address 1:</strong></td>
            	<td> ' . $this->request->data['street-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Address 2:</strong></td>
            	<td> ' . $this->request->data['street-address-two'] . '</td>
            </tr>            
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Town:</strong></td>
            	<td> ' . $this->request->data['town-city'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery County:</strong></td>
            	<td> ' . $this->request->data['county'] . '</td>
            </tr>            
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Postcode:</strong></td>
            	<td> ' . $this->request->data['postcode'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Email Address:</strong></td>
            	<td> ' . $this->request->data['email-address'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Surgery Telephone:</strong></td>
            	<td> ' . $this->request->data['telephone-number'] . '</td>
            </tr>
            ';	 

			// teva_account_no
			// teva_manager_name_number

            $msg .= '
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Teva UK Limited Account Number :</strong></td>
            	<td> ' . $this->request->data['account-number'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Teva Territory Manager Name and Number :</strong></td>
            	<td> ' . $this->request->data['manager-name'] . '</td>
            </tr>';

			// patients_total
			// patients_total_dispensing

	        $msg .= '
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Total Patients :</strong></td>
            	<td> ' . $this->request->data['total-patients'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Total Dispensing Patients :</strong></td>
            	<td> ' . $this->request->data['total-dispensing-patients'] . '</td>
            </tr>';		

			// wholesaler_name
			// wholesaler_account
			// wholesaler_depot

	        $msg .= '
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler Name :</strong></td>
            	<td> ' . $this->request->data['wholesaler-account-name'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler Account Number :</strong></td>
            	<td> ' . $this->request->data['wholesaler-account-number'] . '</td>
            </tr>
            <tr style="line-height:40px;">
            	<td width="200px"><strong>Wholesaler Depot :</strong></td>
            	<td> ' . $this->request->data['wholesaler-depot'] . '</td>
            </tr>';	

            // discount_aerivio_spiromax_50

            if($this->request->data['aerivio-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Aerivio Spiromax 50mcg/500mcg :</strong></td>
	            	<td> ' . $this->request->data['aerivio-discount'] . '</td>
	            </tr>';
            }

            // discount_braltus_zonda_10

            if($this->request->data['braltus-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Braltus Zonda 10mcg :</strong></td>
	            	<td> ' . $this->request->data['braltus-discount'] . '</td>
	            </tr>';
            }

            // discount_duoresp_spiromax_160

            if($this->request->data['duoresp-160-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>DuoResp Spiromax 160mcg/4.5mcg :</strong></td>
	            	<td> ' . $this->request->data['duoresp-160-discount'] . '</td>
	            </tr>';
            }

            // discount_duoresp_spiromax_320            

            if($this->request->data['duoresp-320-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>DuoResp Spiromax 320mcg/9mcg :</strong></td>
	            	<td> ' . $this->request->data['duoresp-320-discount'] . '</td>
	            </tr>';
            }

			// discount_qvar_mdi_50

            if($this->request->data['qvar-50-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Qvar MDI 50mcg :</strong></td>
	            	<td> ' . $this->request->data['qvar-50-discount'] . '</td>
	            </tr>';
            } 

			// discount_qvar_mdi_100

            if($this->request->data['qvar-100-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Qvar MDI 100mcg :</strong></td>
	            	<td> ' . $this->request->data['qvar-100-discount'] . '</td>
	            </tr>';
            } 

			// discount_easi_breathe_50

            if($this->request->data['qvar-easi-50-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Qvar Easi-Breathe® 50mcg :</strong></td>
	            	<td> ' . $this->request->data['qvar-easi-50-discount'] . '</td>
	            </tr>';
            } 

			// discount_easi_breathe_100

            if($this->request->data['qvar-100-discount']) {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Qvar MDI 100mcg :</strong></td>
	            	<td> ' . $this->request->data['qvar-100-discount'] . '</td>
	            </tr>';
            } 

			// authorised_signatory

            if($this->request->data['confirm'] == 'yes') {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>On Behalf of (Authorised Signatory) Checked :</strong></td>
	            	<td> ' . $this->request->data['confirm'] . '</td>
	            </tr>';
            } 

			// terms

            if($this->request->data['terms-agree'] == 'yes') {
            	$msg .= '
	            <tr style="line-height:40px;">
	            	<td width="200px"><strong>Terms and Conditions Agreed Checked :</strong></td>
	            	<td> ' . $this->request->data['terms-agree'] . '</td>
	            </tr>';
            } 
            
            $msg .= '</table>';

            // Send email to Teva
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_inhalers)
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($msg);
            }

         	// Email customer with activation link
            $activation_url = 'http://tevascheme.tevauk.com/forms/inhaleractivate/' . $unique_id;
            $customer_msg .= '
            <table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
        		<tr>
        			<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up" /></td>
        		</tr>
        	';

            $customer_msg .= '
            <tr>
            	<td colspan="3">
            	<br/>
            		<p style="color:#0091d0; font-weight:normal; font-style:italic; font-size:24px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">' . $this->request->data['form-name'] . '</p>
            	</td>
            </tr>';

			if ($this->request->data['bank-account-name']) {
				$customer_msg .=
				 '
				<tr style="line-height:40px;">
				<td colspan="3">
				<p style="line-height:20px;">Thank you for signing up to the TevaOne Inhaler scheme. In order to verify your details and maintain security please follow the below steps:</p>
				<p style="color:#0091d0; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Activate you account now</p>
				<p style="line-height:20px;">Please click on the following link to activate your account to complete the sign up process:
						<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
				</p>
				<p style="color:#0091d0; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Don\'t forget to post proof of account details</p>
				<p style="line-height:20px;">Please post proof of details to:</p>
				
				
				
				<p style="line-height:20px;">
					<strong>Teva Schemes Admin Department,</strong>
					<strong>Teva UK Limited,</strong><br/>
					<strong>Ridings Point, </strong><br/>
					<strong>Whistler Drive, </strong><br/>
					<strong>Castleford, </strong><br/>
					<strong>West Yorkshire.</strong><br/>
					<strong>WF10 5HX</strong><br/>

				</td>
				</tr>
				';
				
	/*			$customer_msg .=
				'
				<tr>
					<td><br/><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Buying Group</p></td>
				</tr>
				<tr>
					<td><br/><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Contact Information</p></td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Company/Practice Name:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['company-practice-name'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Branch/Location Name:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['company-practice-name'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Street Address:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['street-address'].'</p>
					</td>
				</tr>';*/
				
				if ($this->request->data['street-address-two']) {
					$customer_msg .='				
				<tr>
					<td>
						<p>&nbsp;</p>
					</td>
					<td>
						<p>'.$this->request->data['street-address-two'].'</p>
					</td>
				</tr>';
				} // street-address-two
				
				$customer_msg .='
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Town/City:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['town-city'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>County:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['county'].'</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Postcode:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">'.$this->request->data['postcode'].'</p>
					</td>
				</tr>
				<tr>
					<td><br/><p style="color:#0091d0; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Need to contact us?</p></td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Telephone:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;">0800 085 8620</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Email:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;"><a href="mailto:Ukteva.Scheme@tevauk.com">Ukteva.Scheme@tevauk.com</a></p>
					</td>
				</tr>
							
				
				<tr>
					<td>
						<br/>
						<p style="line-height:20px;">Kind regards,</p>
						<p style="line-height:20px;">The Teva UK Team</p>
						<br/>
						<br/>
						<br/>
					</td>
				</tr>';
			} else {
				$customer_msg .=
				 '
				<tr style="line-height:40px;">
				<td colspan="3">
				<p style="line-height:40px;">Thank you for signing up to the TevaOne Inhaler scheme. In order to verify your details and maintain security please follow the below steps:</p>				
				<p style="line-height:20px;">&nbsp;</p>
				<p style="line-height:40px;">Please click on the following link to activate your account to complete the sign up process:
						<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
				</p>
				<p style="line-height:40px;">Kind regards,</p>
				<p style="line-height:40px;">The Teva UK Team</p>
				</td>
				</tr>';
			}
			

            $customer_msg .= '</table>';

            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->request->data['email-address'])
                        ->emailFormat('html')
                        ->subject($this->request->data['form-name'])
                        ->send($customer_msg);
            }
            // END: Activation link
            // Bank details are sent separately and encrypted.            
            if ($this->request->data['bank-account-name']) {
			
					$filename = print_r($_FILES);;


                $bank_msg = ''; // Clear                
                $bank_msg .= '
VAT Number: ' . $this->request->data['vat-number'] . '                    
<br>Business Bank Account Name: ' . $this->request->data['bank-account-name'] . '
<br>Bank: ' . $this->request->data['bank-name'] . '    
<br>Account Number: ' . $this->request->data['bank-account-number'] . '
<br>Sort Code: ' . $this->request->data['sort-code'] . ' 
<br>Unique ID: ' . $unique_id . '';

                if ($this->emails_enabled) {
                   $this->send_bank_details($bank_msg, $unique_id, $uploaded_file);
                }
            } // if bank account details   

            // Store Sign Up details to database
            $sql = "
            INSERT INTO inhalers
            (
			unique_id,
			surgery_name,
			surgery_address_1,
			surgery_address_2,
			surgery_town,
			surgery_county,
			surgery_postcode,
			surgery_email,
			surgery_telephone,
			teva_account_no,
			teva_manager_name_number,
			patients_total,
			patients_total_dispensing,
			wholesaler_name,
			wholesaler_account,
			wholesaler_depot,
			discount_aerivio_spiromax_50,
			discount_braltus_zonda_10,
			discount_duoresp_spiromax_160,
			discount_duoresp_spiromax_320,
			discount_qvar_mdi_50,
			discount_qvar_mdi_100,
			discount_easi_breathe_50,
			discount_easi_breathe_100,
			details_in_post,
			authorised_signatory,
			terms,
			created,
			activated,
			date_activated
            )
            VALUES
            (
            '" . $unique_id . "',
            '" . Sanitize::clean($this->request->data['surgery-name'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['street-address'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['street-address-two'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['town-city'],array('encode' => true)) . "',            		
            '" . Sanitize::clean($this->request->data['county'],array('encode' => true)) . "',    
            '" . Sanitize::clean($this->request->data['postcode'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['email-address'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['telephone-number'],array('encode' => true)) . "', 
            '" . Sanitize::clean($this->request->data['account-number'],array('encode' => true)) . "', 
            '" . Sanitize::clean($this->request->data['manager-name'],array('encode' => true)) . "', 
			'" . Sanitize::clean($this->request->data['total-patients'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['total-dispensing-patients'],array('encode' => true)) . "',  
            '" . Sanitize::clean($this->request->data['wholesaler-account-name'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['wholesaler-account-number'],array('encode' => true)) . "',
            '" . Sanitize::clean($this->request->data['wholesaler-depot'],array('encode' => true)) . "', 
            '" . ($this->request->data['aerivio-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['braltus-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['duoresp-160-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['duoresp-320-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['qvar-50-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['qvar-100-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['qvar-easi-50-discount'] != 'yes' ? 0 : 1) . "', 
            '" . ($this->request->data['qvar-easi-100-discount'] != 'yes' ? 0 : 1) . "', 
			'" . ($this->request->data['bank-confirmation'] == 'yes' ? '1' : '0') .  "', 
			'" . ($this->request->data['confirm'] != 'yes' ? 0 : 1) . "', 
			'" . ($this->request->data['terms-agree'] != 'yes' ? 0 : 1) . "', 
			'" . date('Y-m-d H:i:s', time()) . "', 
			'0',
			NULL
            )
            ";

            $this->loadModel('Inhaler');
            $this->Form->query($sql);

            // No redirect used
            // There is no redirect used here because the "success" page is shown using jQuery (see AysncForm() in sign_up.js, DD_sign_up.js)
        } else {
            throw new MethodNotAllowedException(__('Post data not found. Unable to proceed.'));
        }
    }


	/**
	 * Upload file
	 */
	private function _upload_file($file) {

		$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
		$type = explode('/', finfo_file($finfo, $file['tmp_name']));
		
		// only process if an image or PDF document
		if ($type[0] == "image" || $type[1] == "pdf") {
			if ($file['size'] > 0) {
				if ($file['error'] === UPLOAD_ERR_OK) {
					$randstr = substr(md5(uniqid(mt_rand(), true)), 0, 6);
					$filename = $randstr . "_" . $file['name'];
		
					$path =  'certificates/tmp/';

					if ( ! is_dir($path)) {
						mkdir($path);
					}
					// Upload image file
					if (move_uploaded_file($file['tmp_name'], $path . DS . $filename)) {
						$this->request->data['upload-documents'] = $filename;
						return $filename;
					}
				}	else  {
					return ;
				}			
			} else {
				return;
			}
		} else {
			return;
		}
		return;
	}



    /**
     * Send bank details as an encrypted email.
     * This is using a plain PHP mail function (not the Cake ones) for reasons to do with headers and the encrypted file.
     * @param string (plaintext) of bank details from form. 
     * @param string unique ID used for matching Bank Account to Sign Up form.
	 * @param string $_FILES post containing the file uploaded as part of the form
     * @return void
     */
    protected function send_bank_details($bank_msg, $unique_id, $uploaded_file) {

		// To, From and Subject
		$to = $this->email_bank_to;
		$subject = "Bank details " .  $unique_id;

		// MIME Separator
		$separator = md5(time());

		// carriage return type
		$eol = PHP_EOL;

		// Back details image attachment
		$filename = "certificates/tmp/" . $uploaded_file;
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		$attachment = chunk_split(base64_encode($contents));
	
		// main headers
		$enc_headers = array('From' => $this->email_bank_from,
		'X-Mailer' => 'PHP/' . phpversion(),
		'Content-Type' => "Content-Type: multipart/mixed; boundary=\"".$separator."\"",
		'MIME-Version' => 'MIME-Version: 1.0');

		// Body (needs to contain the headers aswell)
		$body = "--".$separator.$eol;
		$body .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
		$body .= "MIME-Version: MIME-Version: 1.0";
		$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
		$body .= "This is a MIME encoded message.".$eol;

		// message
		$body .= "--".$separator.$eol;
		$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
		$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
		$body .= $bank_msg.$eol;	

		// attachment
		$body .= "--".$separator.$eol;
		$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
		$body .= "Content-Transfer-Encoding: base64".$eol;
		$body .= "Content-Disposition: attachment".$eol.$eol;
		$body .= $attachment.$eol;
		$body .= "--".$separator."--";

		// Get the public key certificate.
		// First key is dev site
		//$pubkey = file_get_contents('certificates/publickey.cer');
		$pubkey = file_get_contents('certificates/cert.pem');

		// openssl_pkcs7_encrypt requires input/output to be in files.
		$enc_in_file = 'certificates/tmp/in_' . $unique_id . '.txt';
		$enc_out_file = 'certificates/tmp/out_' . $unique_id . '.txt';

        // Write plain details to file
        $fp = fopen($enc_in_file, 'w');
		fwrite($fp, $body);

		// Encrypt message, generate output file.
		openssl_pkcs7_encrypt($enc_in_file, $enc_out_file, $pubkey, $enc_headers);

        // Seperate headers and body for mail()
        $data = file_get_contents($enc_out_file);
        $parts = explode("\n\n", $data, 2);

        // Send mail
        mail($to, $subject, $parts[1], $parts[0]);

        // Remove both files when done and the uploaded file
        unlink($enc_in_file);
		unlink($enc_out_file);
		unlink($filename);

    }

    /**
     * Thank you page when form has been submitted. 
     * Renders either a Pharmacy Support or Dispensing Doctor version of the page depending on URL.
     */
    public function thankyou() {
        if ($this->request->params['pass'][0] == 'pharmacy') {
            $this->layout = 'pharmacy';
            $this->render('pharmacy/thankyou');
        } elseif ($this->request->params['pass'][0] == 'dispensing_doctor') {
            $this->layout = 'dispensing_doctor';
            $this->render('dispensing_doctor/thankyou');
        } else {
            // If it isn't one of the above then nothing can be rendered anyway so show 404.
            throw new NotFoundException(__('An error has occured.'));
        }
    }

    /**
     * Generate Sign Up data as CSV
     */
    public function sign_up_csv() {
        $this->autoRender = false;

        // Most recent sign up at top of CSV
        $this->Form->order = 'created DESC';

        // Current date in MySQL timestamp format.
        $today = date('Y-m-d', time());

		// All signups from the last 24 hours which have not been activated.
        $data = $this->Form->find('all', array(
            'conditions' => array(
                "created >= '" . $today . " 00:00:00'",
                "created <= '" . $today . " 23:59:59'",
				"activated = '' "
            )
                ));
		
		// All signups which have been activated in the last 24 hours.
		$data_activated = $this->Form->find('all', array(
            'conditions' => array(
                "date_activated >= '" . $today . " 00:00:00'",
                "date_activated <= '" . $today . " 23:59:59'",
				"activated = 'Yes' "
            )
                ));
		
		$data_final = array_merge($data, $data_activated);
		
		
        if (!empty($data_final)) {
            // Start to write to CSV
            $foldername = APP . DS . 'webroot' . DS . 'files' . DS;
            $filename = 'sign_ups_' . date('d-m-Y_H-i-s', time()) . '.csv';
            $fp = fopen($foldername . $filename, 'w');

            // Column headings
            $headings = '';
            $headings .= 'Unique ID,';
            $headings .= 'Contact Name,';
            $headings .= 'Telephone,';
            $headings .= 'Email Address,';
            $headings .= 'Buying Group,';
            $headings .= 'VAT Number,';
            $headings .= 'Company/Practice Name,';
            $headings .= 'Branch/Location Name,';
            $headings .= 'Street Address 1,';
            $headings .= 'Street Address 2,';
            $headings .= 'Town/City,';
			$headings .= 'County,';
            $headings .= 'Postcode,';
            $headings .= 'Scheme,';
            $headings .= 'Current Scheme Customer,';
            $headings .= 'Subscribed,';
            $headings .= 'Wholesaler Name 1,';
            $headings .= 'Wholesale Account 1,';
            $headings .= 'Wholesale Depot 1,';
            $headings .= 'Wholesaler Status 1,';
			$headings .= 'Wholesaler Name 2,';
            $headings .= 'Wholesale Account 2,';
            $headings .= 'Wholesale Depot 2,';
            $headings .= 'Wholesaler Status 2,';
			$headings .= 'Wholesaler Name 3,';
            $headings .= 'Wholesale Account 3,';
            $headings .= 'Wholesale Depot 3,';
            $headings .= 'Wholesaler Status 3,';
			//$headings .= 'Opt In,';
            $headings .= 'Date Created,';
            $headings .= 'Activated,';
            $headings .= 'Date Activated,';
            $headings .= 'Sending bank details,';
            // New line after headings
            $headings .= "\r\n";

            // Write column headings
            fwrite($fp, $headings);

            // Loop through data obtained earlier.
            foreach ($data_final as $d) {
                $line = '';
                $line .= $d['Form']['unique_id'] . ',';
                $line .= $d['Form']['contact_name'] . ',';
                $line .= $d['Form']['telephone'] . ',';
                $line .= $d['Form']['email'] . ',';
                $line .= $d['Form']['buying_group'] . ',';
                $line .= $d['Form']['vat_number'] . ',';
                $line .= htmlspecialchars_decode($d['Form']['practice_name']) . ',';
                $line .= str_replace(',', ';', htmlspecialchars_decode($d['Form']['branch_name'])) . ',';
                $line .= str_replace(',', ';', $d['Form']['address1']) . ',';
                $line .= str_replace(',', ';', $d['Form']['address2']) . ',';
                $line .= str_replace(',', ';', $d['Form']['city']) . ',';
				$line .= $d['Form']['county'] . ',';
                $line .= $d['Form']['postcode'] . ',';
                $line .= $d['Form']['scheme'] . ',';
                $line .= $d['Form']['current_customer'] . ',';
                $line .= $d['Form']['subscribed'] . ',';
                $line .= str_replace(',', ';', $d['Form']['wholesaler_name']) . ',';
                $line .= str_replace(',', ';', $d['Form']['wholesaler_account']) . ',';
                $line .= $d['Form']['wholesaler_depot'] . ',';
                $line .= $d['Form']['wholesaler_status'] . ',';
				$line .= str_replace(',', ';', $d['Form']['wholesaler_name_2']) . ',';
                $line .= str_replace(',', ';', $d['Form']['wholesaler_account_2']) . ',';
                $line .= $d['Form']['wholesaler_depot_2'] . ',';
                $line .= $d['Form']['wholesaler_status_2'] . ',';
				$line .= str_replace(',', ';', $d['Form']['wholesaler_name_3']) . ',';
                $line .= str_replace(',', ';', $d['Form']['wholesaler_account_3']) . ',';
                $line .= $d['Form']['wholesaler_depot_3'] . ',';
                $line .= $d['Form']['wholesaler_status_3'] . ',';
				//$line .= $d['Form']['opt_in'] . ',';
                $line .= substr($d['Form']['created'], 0, 10) . ',';
                $line .= $d['Form']['activated'] . ',';
                $line .= substr($d['Form']['date_activated'], 0, 10) . ',';
                $line .= ( ($d['Form']['details_in_post'] == '1') ? "Yes" : "No" ) . ',';
                // Start new line
                $line .= "\r\n";
                // Write each line to file
                fwrite($fp, $line);
            }
			
            fclose($fp);

            // Email file
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_sign_up_csv)						
                        ->emailFormat('html')
                        ->attachments($foldername . $filename)
                        ->subject('Teva signup daily report ' . date('d/m/Y', time()))
                        ->send('Attached is a report of signups from the Teva Scheme website for ' . date('d/m/Y', time()));
            }

            // Remove CSV from server after emailing it.
            unlink($foldername . $filename);
			
			
        } else {
		
			// If there are no Sign Up's over the last 24 hours they still want an email to confirm this...
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_sign_up_csv)						
                        ->emailFormat('text')                        
                        ->subject('Teva signup daily report ' . date('d/m/Y', time()))
                        ->send('This is an automated notification that no signups have occured on the Teva Scheme website over the last 24 hours. Message sent at '. date('d/m/Y', time()));
            }
		}
    }

    /**
     * Generate Inhaler signup data as CSV
     */
    public function inhaler_csv() {
        $this->autoRender = false;

		$this->loadModel('Inhaler');

        // Most recent inhaler sign up at top of CSV
        $this->Inhaler->order = 'created DESC';

        // Current date in MySQL timestamp format.
        $today = date('Y-m-d', time());

		// All inhaler signups from the last 24 hours which have not been activated.
        $data = $this->Inhaler->find('all', array(
            'conditions' => array(
                "created >= '" . $today . " 00:00:00'",
                "created <= '" . $today . " 23:59:59'",
				"activated = '0' "
            )
                ));
		
		// All signups which have been activated in the last 24 hours.
		$data_activated = $this->Inhaler->find('all', array(
            'conditions' => array(
                "date_activated >= '" . $today . " 00:00:00'",
                "date_activated <= '" . $today . " 23:59:59'",
				"activated = 'Yes' "
            )
                ));
		
		$data_final = array_merge($data, $data_activated);
		
		
        if (!empty($data_final)) {
            // Start to write to CSV for inhaler form
            $foldername = APP . DS . 'webroot' . DS . 'files' . DS;
            $filename = 'inhaler_sign_ups_' . date('d-m-Y_H-i-s', time()) . '.csv';
            $fp = fopen($foldername . $filename, 'w');

            // Column headings
            $headings = '';
            $headings .= 'Unique ID,';
            $headings .= 'Surgery Name,';
            $headings .= 'Surgery Address 1,';
            $headings .= 'Surgery Address 2,';
            $headings .= 'Surgery Town,';
            $headings .= 'Surgery County,';
            $headings .= 'Surgery Post Code,';
            $headings .= 'Surgery Email,';
            $headings .= 'Surgery Telephone,';
            $headings .= 'TEVA Account No,';
            $headings .= 'TEVA Manager,';
			$headings .= 'Total Patients,';
            $headings .= 'Total Patients (Dispensing),';
            $headings .= 'Wholesaler Name,';
            $headings .= 'Wholesale Account,';
			$headings .= 'Wholesale Depot,';
			$headings .= 'Discount Braltus Zonda 10mcg,';
			$headings .= 'Discount DuoResp Spiromax 160mcg/4.5mcg,';
			$headings .= 'Discount DuoResp Spiromax 320mcg/9mcg,';
			$headings .= 'Discount Qvar MDI 50mcg,';
			$headings .= 'Discount Qvar MDI 100mcg,';
			$headings .= 'Discount Qvar Easi-Breathe 50mcg,';
			$headings .= 'Discount Qvar Easi-Breathe 100mcg,';
			$headings .= 'Authorised Signatory,';
			$headings .= 'Terms Agreement,';
            $headings .= 'Date Created,';
            $headings .= 'Activated,';
            $headings .= 'Date Activated,';
            $headings .= 'Sending bank details,';
            // New line after headings
            $headings .= "\r\n";

            // Write column headings
            fwrite($fp, $headings);

            // Loop through data obtained earlier.
            foreach ($data_final as $d) {


                $line = '';
                $line .= $d['Inhaler']['unique_id'] . ',';
                $line .= $d['Inhaler']['surgery_name'] . ',';
				$line .= $d['Inhaler']['surgery_address_1'] . ',';
				$line .= $d['Inhaler']['surgery_address_2'] . ',';
				$line .= $d['Inhaler']['surgery_town'] . ',';
				$line .= $d['Inhaler']['surgery_county'] . ',';
				$line .= $d['Inhaler']['surgery_postcode'] . ',';
				$line .= $d['Inhaler']['surgery_email'] . ',';
				$line .= $d['Inhaler']['surgery_telephone'] . ',';
				$line .= $d['Inhaler']['teva_account_no'] . ',';
				$line .= $d['Inhaler']['teva_manager_name_number'] . ',';
				$line .= $d['Inhaler']['patients_total'] . ',';
				$line .= $d['Inhaler']['patients_total_dispensing'] . ',';
                $line .= str_replace(',', ';', $d['Inhaler']['wholesaler_name']) . ',';
                $line .= str_replace(',', ';', $d['Inhaler']['wholesaler_account']) . ',';
				$line .= $d['Inhaler']['wholesaler_depot'] . ',';
				$line .= ( ($d['Inhaler']['discount_braltus_zonda_10'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['discount_duoresp_spiromax_160'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['discount_duoresp_spiromax_320'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['discount_qvar_mdi_50'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['discount_qvar_mdi_100'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['discount_easi_breathe_50'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['discount_easi_breathe_100'] == '1') ? "Yes" : "No" ) . ',';

				$line .= ( ($d['Inhaler']['authorised_signatory'] == '1') ? "Yes" : "No" ) . ',';
				$line .= ( ($d['Inhaler']['terms'] == '1') ? "Yes" : "No" ) . ',';

                $line .= substr($d['Inhaler']['created'], 0, 10) . ',';
                $line .= ( ($d['Inhaler']['activated'] == 'Yes') ? "Yes" : "No" ) . ',';
                $line .= substr($d['Inhaler']['date_activated'], 0, 10) . ',';
                $line .= ( ($d['Inhaler']['details_in_post'] == '1') ? "Yes" : "No" ) . ',';
                // Start new line
                $line .= "\r\n";
                // Write each line to file
                fwrite($fp, $line);
            }
			
            fclose($fp);

            // Email file
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_inhaler_csv)						
                        ->emailFormat('html')
                        ->attachments($foldername . $filename)
                        ->subject('Teva INHALER scheme signup daily report ' . date('d/m/Y', time()))
                        ->send('Attached is a report of signups from the Inhaler Discount Scheme for ' . date('d/m/Y', time()));
            }

            // Remove CSV from server after emailing it.
            //unlink($foldername . $filename);
			
			
        } else {
		
			// If there are no Sign Up's over the last 24 hours they still want an email to confirm this...
            if ($this->emails_enabled) {
                $email = new CakeEmail();
                $email->from($this->email_from)
                        ->to($this->email_inhaler_csv)						
                        ->emailFormat('text')                        
                        ->subject('Teva INHALER scheme signup daily report ' . date('d/m/Y', time()))
                        ->send('This is an automated notification that no signups have occured for the Inhaler Discount Scheme over the last 24 hours. Message sent at '. date('d/m/Y', time()));
            }
		}
    }


    /**
     * Handles activation of Sign Up emails.
     * @param string $unique_id 
     */
    public function activate($unique_id) {
        if ($unique_id) {

            // Check Unique ID exists
            $check = $this->Form->find('first', array('conditions' => array('unique_id' => $unique_id)));
            if ($check) {

                if ($check['Form']['activated'] == 'Yes') {
                    // It's already been activated. Don't update things, e.g. the date activated
                    $this->set('h1', 'Sign Up Already Completed');
                    $this->set('msg', 'You have already completed the sign up process.');
                } else {
                    // We're ok to activate this.
                    $this->Form->id = $check['Form']['id'];
                    $this->Form->saveField('activated', 'Yes');
                    $this->Form->saveField('date_activated', date('Y-m-d H:i:s', time()));

                    $this->set('h1', 'Sign Up Complete');
                    $this->set('msg', 'Thank you, the sign up process has now been completed.');
                }
            } else {
                throw new NotFoundException(__('Activation link is not recognised.'));
            }
        } else {
            throw new NotFoundException(__('Activation link is invalid. Please check the link you have come from.'));
        }
    }

	/**
     * Handles activation of Sign Up emails.
     * @param string $unique_id 
     */
    public function inhaleractivate($unique_id) {
        if ($unique_id) {

        	$this->loadModel('Inhaler');

            // Check Unique ID exists
            $check = $this->Inhaler->find('first', array('conditions' => array('unique_id' => $unique_id)));
            if ($check) {

                if ($check['Inhaler']['activated'] == 'Yes') {
                    // It's already been activated. Don't update things, e.g. the date activated
                    $this->set('h1', 'Sign Up Already Completed');
                    $this->set('msg', 'You have already completed the sign up process.');
                } else {
                    // We're ok to activate this.
                    $this->Inhaler->id = $check['Inhaler']['id'];
                    $this->Inhaler->saveField('activated', 'Yes');
                    $this->Inhaler->saveField('date_activated', date('Y-m-d H:i:s', time()));

                    $this->set('h1', 'Sign Up Complete');
                    $this->set('msg', 'Thank you, the sign up process has now been completed.');
                }
            } else {
                throw new NotFoundException(__('Activation link is not recognised.'));
            }
        } else {
            throw new NotFoundException(__('Activation link is invalid. Please check the link you have come from.'));
        }
    }
		  
	/**
     * Send those signed up but not activated a reminder email.
     * Runs on a cron, once per day.
     */
    public function send_scheme_reminder() {
		$this->autoRender = false;

		// Formatted time 48 hours ago
		$hours_ago_to = date('Y-m-d H:i:s', strtotime('-48 hours') );
		$hours_ago_from = date('Y-m-d H:i:s', strtotime('-72 hours') );
		
		// BOF Teva Scheme Reminder

		//All scheme signups from the last 24 hours which have not been activated.
        $forms_reminders = $this->Form->find('all', array(
            'conditions' => array(
				"created <= '" . $hours_ago_to . "'",
				"created >= '" . $hours_ago_from . "'",
				"activated = '' "
            )
		));

		$this->log('From: ' . $hours_ago_from, 'reminder');
		$this->log('To: ' . $hours_ago_to, 'reminder');
		$this->log('Scheme Records Found: ' . sizeof($forms_reminders), 'reminder');

		foreach ($forms_reminders as $forms_reminder) {

			$this->log('Sent To: ' . $forms_reminder['Form']['id'], 'reminder');

			//Email customer the reminder email with activation link
			$activation_url = 'http://tevascheme.tevauk.com/forms/activate/' . $forms_reminder['Form']['unique_id'];
			$customer_msg = '
			<table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
				<tr>
					<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Scheme Sign-up Activation Reminder" /></td>
				</tr>
				<tr>
					<td colspan="3">
					<br/>
						<p style="color:#00a03b; font-weight:normal; font-style:italic; font-size:24px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">
						Don\'t forget to complete your TevaOne scheme sign up
						</p>
					</td>
				</tr>
				<tr style="line-height:40px;">
					<td colspan="3">
						<p style="line-height:20px;">Thank you for signing up to the TevaOne scheme. In order to verify your details and maintain security please follow the below steps:</p>
						<p style="color:#00a03b; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Activate your TevaOne account now</p>
						<p style="line-height:20px;">Please click on the following link to complete the sign up process: 
							<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
						</p>
						<p style="color:#00a03b; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Uploaded your proof of account details? Great....You\'re all set!</p>
						<p style="color:#00a03b; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Prefer to post them, please send to:</p>
						<p style="line-height:20px;">
							<strong>Teva Schemes Admin Department,</strong><br/>
							<strong>Teva UK Limited,</strong><br/>
							<strong>Ridings Point, </strong><br/>
							<strong>Whistler Drive, </strong><br/>
							<strong>Castleford, </strong><br/>
							<strong>West Yorkshire.</strong><br/>
							<strong>WF10 5HX</strong><br/>
						</p>
					</td>
				</tr>
				<tr>
					<td><br/><p style="color:#00a03b; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Need to contact us?</p></td>
				</tr>
				<tr>
				<td>
					<p style="line-height:20px;"><strong>Telephone:</strong></p>
				</td>
				<td>
					<p style="line-height:20px;">0800 085 8620</p>
				</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Email:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;"><a href="mailto:Ukteva.Scheme@tevauk.com">Ukteva.Scheme@tevauk.com</a></p>
					</td>
				</tr>
				<tr>
					<td>
						<br/>
						<p style="line-height:20px;">Kind regards,</p>
						<p style="line-height:20px;">The Teva UK Team</p>
						<br/>
						<br/>
						<br/>
					</td>
				</tr>	
			</table>';
				  
			// Send the email
			if ($this->emails_enabled) {
				$email = new CakeEmail();
				$email->from($this->email_from)
						->to($forms_reminder['Form']['email'])
						->emailFormat('html')
						->subject('TevaOne Scheme Sign Up - Activation Reminder')
						->send($customer_msg);
			}
		}

		// EOF Teva Scheme Reminder

		// BOF Inhaler Reminder

		$this->loadModel('Inhaler');

		// All inhaler signups from the last 24 hours which have not been activated.
		$inhaler_reminders = $this->Inhaler->find('all', array(
			'conditions' => array(
				"created <= '" . $hours_ago_to . "'",
				"created >= '" . $hours_ago_from . "'",
				"activated = '0' "
			)
		));
		
		$this->log('Inhaler Records Found: ' . sizeof($inhaler_reminders), 'reminder');

		foreach ($inhaler_reminders as $inhaler_reminder) {

			$this->log('Sent To: ' . $inhaler_reminder['Inhaler']['id'], 'reminder');

			//Email customer the reminder email with activation link
			$activation_url = 'http://tevascheme.tevauk.com/forms/inhaleractivate/' . $inhaler_reminder['Inhaler']['unique_id'];
			$customer_msg = '
			<table cellpadding="0" cellspacing="0" width="600px" align="center" border="0" style="text-align:left; font-family:Arial, sans-serif; font-size:12px;">
				<tr>
					<td colspan="3"><img src="http://tevascheme.tevauk.com/img/teva-logo-email.jpg" alt="Teva Inhaler Scheme Sign Up Activation Reminder" /></td>
				</tr>
				<tr>
					<td colspan="3">
					<br/>
						<p style="color:#00a03b; font-weight:normal; font-style:italic; font-size:24px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">
						Don\'t forget to complete your TevaOne Inhaler Discount scheme sign up
						</p>
					</td>
				</tr>
				<tr style="line-height:40px;">
					<td colspan="3">
						<p style="line-height:20px;">Thank you for signing up to the TevaOne Inhaler Discount scheme. In order to verify your details and maintain security please follow the below steps:</p>
						<p style="color:#00a03b; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Activate your TevaOne Inhaler Discount scheme sign up now</p>
						<p style="line-height:20px;">Please click on the following link to complete the sign up process:
							<a href="' . $activation_url . '" target="_blank">' . $activation_url . '</a>
						</p>
						<p style="color:#00a03b; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Uploaded your proof of account details? Great....You\'re all set!</p>
						<p style="color:#00a03b; font-weight:normal; font-size:20px; font-family: Arial, Helvetica, sans-serif; line-height:20px;">Prefer to post them, please send to:</p>
						<p style="line-height:20px;">
							<strong>Teva Schemes Admin Department,</strong><br/>
							<strong>Teva UK Limited,</strong><br/>
							<strong>Ridings Point, </strong><br/>
							<strong>Whistler Drive, </strong><br/>
							<strong>Castleford, </strong><br/>
							<strong>West Yorkshire.</strong><br/>
							<strong>WF10 5HX</strong><br/>
						</p>
					</td>
				</tr>
				<tr>
					<td><br/><p style="color:#00a03b; font-weight:normal; font-size:16px; font-family: Arial, Helvetica, sans-serif; line-height:40px;">Need to contact us?</p></td>
				</tr>
				<tr>
				<td>
					<p style="line-height:20px;"><strong>Telephone:</strong></p>
				</td>
				<td>
					<p style="line-height:20px;">0800 085 8620</p>
				</td>
				</tr>
				<tr>
					<td>
						<p style="line-height:20px;"><strong>Email:</strong></p>
					</td>
					<td>
						<p style="line-height:20px;"><a href="mailto:Ukteva.Scheme@tevauk.com">Ukteva.Scheme@tevauk.com</a></p>
					</td>
				</tr>
				<tr>
					<td>
						<br/>
						<p style="line-height:20px;">Kind regards,</p>
						<p style="line-height:20px;">The Teva UK Team</p>
						<br/>
						<br/>
						<br/>
					</td>
				</tr>	
			</table>';
				  
			// Send the email
			if ($this->emails_enabled) {
				$email = new CakeEmail();
				$email->from($this->email_from)
						->to($inhaler_reminder['Inhaler']['surgery_email'])
						->emailFormat('html')
						->subject('TevaOne Inhaler Discount Scheme Sign Up - Activation Reminder')
						->send($customer_msg);
			}
		}		

		// EOF Inhaler Reminder
				
    }	


    /*public function stats() {
      $this->autoRender = false;	
       
       $month = array( 
       		array('start' => '2013-05-01', 'end' => '2013-05-31', 'label' => 'May 2013'),
       		array('start' => '2013-06-01', 'end' => '2013-06-31', 'label' => 'June 2013'),
       		array('start' => '2013-07-01', 'end' => '2013-07-31', 'label' => 'July 2013'),
       		array('start' => '2013-08-01', 'end' => '2013-08-31', 'label' => 'August 2013'),
       		array('start' => '2013-09-01', 'end' => '2013-09-31', 'label' => 'September 2013'),
       		array('start' => '2013-10-01', 'end' => '2013-10-31', 'label' => 'October 2013'),
       		array('start' => '2013-11-01', 'end' => '2013-11-31', 'label' => 'November 2013'),
       		array('start' => '2013-12-01', 'end' => '2013-12-31', 'label' => 'December 2013'),
       		array('start' => '2014-01-01', 'end' => '2014-01-31', 'label' => 'January 2014'),
       		array('start' => '2014-02-01', 'end' => '2014-02-31', 'label' => 'February 2014'),
       		array('start' => '2014-03-01', 'end' => '2014-03-31', 'label' => 'March 2014'),
       		array('start' => '2014-04-01', 'end' => '2014-04-31', 'label' => 'April 2014'),
       		array('start' => '2014-05-01', 'end' => '2014-05-31', 'label' => 'May 2014'),
       		array('start' => '2014-06-01', 'end' => '2014-06-31', 'label' => 'June 2014'),       		
       		array('start' => '2014-07-01', 'end' => '2014-07-31', 'label' => 'July 2014'),
       		array('start' => '2014-08-01', 'end' => '2014-08-31', 'label' => 'August 2014')       		
       );
       #print_r($month);

       echo '<table>
       		<tr>
       		<td>Date</td>
       		<td>Sign Ups</td>
       		</tr>';
       
       foreach ($month as $m) {
	       $data = $this->Form->find('all', array(
	       		'conditions' => array(
	       				"created >= '" . $m['start'] . " 00:00:00'",
	       				"created <= '" . $m['end'] . " 23:59:59'",
	       	)));	

	       $count = 0;
	       $count = sizeof($data);
	       
	       echo '<tr>
	       <td>' . $m['label'] . '</td>
	       <td>' . $count . '</td>
	       </tr>
	       ';
       }
       echo '</table>';
       			
	}*/
	

}
