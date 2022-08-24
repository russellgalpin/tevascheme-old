<?php

App::uses('AppController', 'Controller');

/**
 * Sections Controller
 * @author Andy Foote
 * @property Sections $Sections
 */
class SectionsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Section->recursive = 0;
        $this->set('sections', $this->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Section->create();
            if ($this->Section->save($this->request->data)) {
                $this->Session->setFlash(__('The Section has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Section could not be saved. Please, try again.'));
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
        $this->Section->id = $id;
        if (!$this->Section->exists()) {
            throw new NotFoundException(__('Invalid Section'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Section->save($this->request->data)) {
                $this->Session->setFlash(__('The Section has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Section could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Section->read(null, $id);
        }
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
        $this->Section->id = $id;
        if (!$this->Section->exists()) {
            throw new NotFoundException(__('Invalid Section'));
        }
        if ($this->Section->delete()) {
            $this->Session->setFlash(__('Section article deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Section article was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
