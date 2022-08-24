<?php

/**
 * Users controller - login/logout for CMS and so on.
 * @author Andy Foote
 * Anything commented 'kcfinder' below is specific to http://cakephpclues.blogspot.co.uk/2012/01/ckeditor-kcfinder-integration-with.html
 */
class UsersController extends AppController {

    public $name = 'Users';
    public $helpers = array('Html', 'Form');

    /**
     * Before any Controller Action
     */
    function beforeFilter() {
        parent::beforeFilter();
    }

    /**
     * Logs in a User
     */
    function login() {
        $this->set('title_for_layout', 'Login');
        $this->layout = 'admin';
        
        /*$salt = Configure::read('Security.salt');
	echo md5('cms-password-here'.$salt);*/
        
        // redirect user if already logged in
        if ($this->Session->check('User')) {
            $this->redirect(array('controller' => 'dashboard', 'action' => 'index', 'admin' => true));
        }

        if (!empty($this->data)) {
            // set the form data to enable validation
            $this->User->set($this->data);
            // see if the data validates
            if ($this->User->validates()) {
                // check user is valid
                $result = $this->User->check_user_data($this->data);

                if ($result) {
                    // update login time
                    $this->User->id = $result['User']['id'];
                    $this->User->saveField('last_login', date("Y-m-d H:i:s"));
                    // save to session
                    $this->Session->write('User', $result);

                    // kcfinder
                    $_SESSION['KCFINDER']['disabled'] = false;

                    $this->Session->setFlash('You are now logged in');                    
                    $this->redirect(array('controller' => 'dashboard', 'action' => 'index', 'admin' => true));
                } else {
                    $this->Session->setFlash('Either your Username or Password is incorrect');
                }
            }
        }
    }

    /**
     * Logs out a User
     */
    function logout() {
        if ($this->Session->check('User')) {
            $this->Session->delete('User');
            $this->Session->setFlash('You are now logged out');
        }

        // kcfinder
        if (isset($_SESSION['KCFINDER'])) {
            unset($_SESSION['KCFINDER']);
        }

        $this->redirect(array('action' => 'login'));
    }
	
	/**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
	
	  /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();

            // Check username doesn't already exist
            $username_check = $this->User->find('first', array(
                'conditions' => array('User.username' => $this->request->data['User']['username']
                )
                    )
            );
            if ($username_check) {
                $this->Session->setFlash(__('Username ' . $this->request->data['User']['username'] . ' already exists. Enter a unique username.'));
            } else {

                // Hash password and add salt
                $this->request->data['User']['password'] = (md5($this->request->data['User']['password'] . Configure::read('Security.salt')));

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('User account has been created.'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('User account could not be created. Please, try again.'));
                }
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            // Hash password and add salt
            $this->request->data['User']['password'] = (md5($this->request->data['User']['password'] . Configure::read('Security.salt')));
            
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User account has been saved.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('User account could not be saved. Please, try again.'));
            }
            
            
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
    }

    

}