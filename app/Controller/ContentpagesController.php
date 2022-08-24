<?php

App::uses('AppController', 'Controller');

/**
 * Contentpages Controller
 * @author Andy Foote
 * @property Contentpage $Contentpage
 */
class ContentpagesController extends AppController {
    

    /**
     * View a page on frontend 
     * @param int $id
     */
    public function index($id = null, $extraParam = null) {

        $this->Contentpage->id = $id;
        $data = $this->Contentpage->read();

        if (($id) && (!empty($data))) {
            $this->set('content', $data);
            
            // Metadata
            $section_meta = ($data['Contentpage']['section_id']) ? ' | ' .  $data['Section']['title'] : '';
            $this->set('title_for_layout', $data['Contentpage']['title'] . $section_meta);
            $this->set('meta_description', $data['Contentpage']['meta_description']);
            $this->set('meta_keywords', $data['Contentpage']['meta_keywords']);

            $this->set('extra_param', $extraParam);
            
            // Layout
            $this->layout = $data['Contentpage']['layout'];
            
            // .ctp View file is defined in CMS 
            $this->render($data['Contentpage']['template']);

            // Not found    
        } else {
            throw new NotFoundException(__('Page does not exist or has moved.'));
        }
    }
        

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Contentpage->recursive = 0;
        $this->Contentpage->order = 'Contentpage.id DESC';
        $this->set('contentpages', $this->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Contentpage->create();
            if ($this->Contentpage->save($this->request->data)) {
                $this->Session->setFlash(__('The page has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Contentpage->Section->find('list');
        $this->set(compact('sections'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Contentpage->id = $id;
        if (!$this->Contentpage->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Contentpage->save($this->request->data)) {
                $this->Session->setFlash(__('The page has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The page could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Contentpage->read(null, $id);
        }
        $sections = $this->Contentpage->Section->find('list');
        $this->set(compact('sections'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Contentpage->id = $id;
        if (!$this->Contentpage->exists()) {
            throw new NotFoundException(__('Invalid page'));
        }
        if ($this->Contentpage->delete()) {
            $this->Session->setFlash(__('Page deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Page was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
