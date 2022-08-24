<?php
App::uses('AppModel', 'Model');
/**
 * Section Model
 *
 */
class Section extends AppModel {
    
       /**
        * Validation rules
        *
        * @var array
        */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)		
	);
        
       /**
        * hasMany associations
        *
        * @var array
        */
	public $hasMany = array(
		'Contentpage' => array(
			'className' => 'Contentpage',
			'foreignKey' => 'section_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        

}
