<?php
/**
 * Routes configuration
 */

// ** Home Page **
Router::connect('/', array('controller' => 'contentpages', 'action' => 'index', 7));


// ** Pharamcy Support **
// TevaOne
// Router::connect('/pharmacy/teva-one', array('controller' => 'contentpages', 'action' => 'index', 1));
// TevaTwo
// Router::connect('/pharmacy/teva-two', array('controller' => 'contentpages', 'action' => 'index', 2));
// Home
Router::connect('/pharmacy/home', array('controller' => 'contentpages', 'action' => 'index', 1));
// Support
Router::connect('/pharmacy/support', array('controller' => 'contentpages', 'action' => 'index', 5));
// FluWise Support
Router::connect('/pharmacy/support/fluwise', array('controller' => 'contentpages', 'action' => 'index', 17));
// CMS Advantage Support
Router::connect('/pharmacy/support/cms-advantage', array('controller' => 'contentpages', 'action' => 'index', 18));
// CMS Advantage 2 Support
Router::connect('/pharmacy/support/cms-advantage-2', array('controller' => 'contentpages', 'action' => 'index', 19));
// NMS Advantage Support
Router::connect('/pharmacy/support/nms-advantage', array('controller' => 'contentpages', 'action' => 'index', 20));
// DMR Advantage Support
Router::connect('/pharmacy/support/dmr-advantage', array('controller' => 'contentpages', 'action' => 'index', 21));
// Teva Learning Zone Support
Router::connect('/pharmacy/support/teva-learning-zone', array('controller' => 'contentpages', 'action' => 'index', 22));
// Tips on the Tariff Support
Router::connect('/pharmacy/support/tips-on-the-tariff', array('controller' => 'contentpages', 'action' => 'index', 23));
// Generics Patient Communication Kit
Router::connect('/pharmacy/support/generics-patient-comm-kit', array('controller' => 'contentpages', 'action' => 'index', 24));
// MUR Advantage Support
Router::connect('/pharmacy/support/mur-advantage', array('controller' => 'contentpages', 'action' => 'index', 25));
// Inhaler Recycling Support
Router::connect('/pharmacy/support/inhaler-recycling', array('controller' => 'contentpages', 'action' => 'index', 26));
// tMUR Advantage Support
Router::connect('/pharmacy/support/tmur-advantage', array('controller' => 'contentpages', 'action' => 'index', 27));

// Sign Up
Router::connect('/pharmacy/sign-up', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'sign_up'));
// Contact Us
Router::connect('/pharmacy/contact-us', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'contact_us'));
// CMS Advantage Form
Router::connect('/pharmacy/cms-advantage-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'cms_advantage_form'));
// CMS Advantage 2 Form
Router::connect('/pharmacy/cms-advantage-2-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'cms_advantage_2_form'));
// Inhaler Recycling Form
Router::connect('/pharmacy/inhaler-recycling-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'inhaler_recycling'));
// DMR Advantage Form
Router::connect('/pharmacy/dmr-advantage-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'dmr_advantage_form'));
// Generics Patient Comm Kit Form
Router::connect('/pharmacy/generics-patient-comm-kit-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'generics_patient_comm_kit_form'));
// MUR Advantage Form
Router::connect('/pharmacy/mur-advantage-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'mur_advantage_form'));
// NMS Advantage Form
Router::connect('/pharmacy/nms-advantage-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'nms_advantage_form'));
// PriceWatch Preview Reg
Router::connect('/pharmacy/pw-preview-reg', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'pw_preview_reg'));
// Teva Learning Zone sign up
Router::connect('/pharmacy/teva-learning-zone-sign-up', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'teva_learning_zone_sign_up'));
// tMUR Advantage Form
Router::connect('/pharmacy/tmur-advantage-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'tmur_advantage_form'));
// PriceWatch
Router::connect('/pharmacy/pricewatch', array('controller' => 'contentpages', 'action' => 'index', 8));
// Terms and Conditions
Router::connect('/pharmacy/terms-conditions', array('controller' => 'contentpages', 'action' => 'index', 10));
// Privacy Policy
Router::connect('/pharmacy/privacy-policy', array('controller' => 'contentpages', 'action' => 'index', 15));
// 360 Business Planning Tool - Order Form
Router::connect('/pharmacy/360-order-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', '360_order_form'));
//Pharmacies Case Study Page
Router::connect('/pharmacy/case-studies', array('controller' => 'contentpages', 'action' => 'index', 12));
// FluWise Form
Router::connect('/pharmacy/fluwise-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'fluwise'));
// Pharmacy Branded Inhaler Offers Signup
Router::connect('/pharmacy/branded-inhaler-deals', array('controller' => 'contentpages', 'action' => 'index', 33));
// TevaOne Inhaler Discount Scheme Form
Router::connect('/pharmacy/inhaler-scheme-form', array('controller' => 'forms', 'action' => 'index', 'pharmacy', 'inhaler_scheme_form'));



// ** Dispensing Doctor **
// TevaOne
// Router::connect('/dispensing-doctor/teva-one', array('controller' => 'contentpages', 'action' => 'index', 3));
// // TevaTwo
// Router::connect('/dispensing-doctor/teva-two', array('controller' => 'contentpages', 'action' => 'index', 4));
// Home
Router::connect('/dispensing-doctor/home', array('controller' => 'contentpages', 'action' => 'index', 3));
// Support
Router::connect('/dispensing-doctor/support', array('controller' => 'contentpages', 'action' => 'index', 6));
// Teva Learning Zone Support
Router::connect('/dispensing-doctor/support/teva-learning-zone', array('controller' => 'contentpages', 'action' => 'index', 28));
// Generics Patient Communication Kit
Router::connect('/dispensing-doctor/support/generics-patient-comm-kit', array('controller' => 'contentpages', 'action' => 'index', 29));
// Inhaler Recycling Support
Router::connect('/dispensing-doctor/support/inhaler-recycling', array('controller' => 'contentpages', 'action' => 'index', 30));
// DRUM E-learning
Router::connect('/dispensing-doctor/support/drum-e-learning', array('controller' => 'contentpages', 'action' => 'index', 31));
// Tips on the Tariff Support
Router::connect('/dispensing-doctor/support/tips-on-the-tariff', array('controller' => 'contentpages', 'action' => 'index', 32));

// Sign Up
Router::connect('/dispensing-doctor/sign-up', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'sign_up'));
// inhaler recycling form
Router::connect('/dispensing-doctor/inhaler-recycling-form', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'inhaler_recycling'));
// Contact Us
Router::connect('/dispensing-doctor/contact-us', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'contact_us'));
// DRUM E-learning sign up
Router::connect('/dispensing-doctor/drum-e-learning-sign-up', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'drum_e_learning_sign_up'));
// Generics Patient Comm Kit Form
Router::connect('/dispensing-doctor/generics-patient-comm-kit-form', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'generics_patient_comm_kit_form'));
// Teva Learning Zone sign up
Router::connect('/dispensing-doctor/teva-learning-zone-sign-up', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'teva_learning_zone_sign_up'));
// PriceWatch
Router::connect('/dispensing-doctor/pricewatch', array('controller' => 'contentpages', 'action' => 'index', 9));
// PriceWatch Preview Reg
Router::connect('/dispensing-doctor/pw-preview-reg', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'pw_preview_reg'));
// Terms and Conditions
Router::connect('/dispensing-doctor/terms-conditions', array('controller' => 'contentpages', 'action' => 'index', 11));
// Privacy Policy
Router::connect('/dispensing-doctor/privacy-policy', array('controller' => 'contentpages', 'action' => 'index', 14));
// Dispensing Doc Case Study Page
Router::connect('/dispensing-doctor/case-studies', array('controller' => 'contentpages', 'action' => 'index', 13));
// Dispensing Doc Branded Inhaler Offers Signup
Router::connect('/dispensing-doctor/branded-inhaler-deals', array('controller' => 'contentpages', 'action' => 'index', 16));
// TevaOne Inhaler Discount Scheme Form
Router::connect('/dispensing-doctor/inhaler-scheme-form', array('controller' => 'forms', 'action' => 'index', 'dispensing_doctor', 'inhaler_scheme_form'));


// ** CMS **
Router::connect('/admin', array('controller' => 'users', 'action' => 'login'));
Router::connect('/admin/logout', array('controller' => 'users', 'action' => 'logout'));


// ** Other **
// Price List Subscription form
Router::connect('/tevapricelist', array('controller' => 'forms', 'action' => 'price_list_signup'));


CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
