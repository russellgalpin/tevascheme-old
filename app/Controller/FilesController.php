<?php

App::uses('AppController', 'Controller');

class FilesController extends AppController {

    public function admin_index() {
        $this->File->recursive = 0;
        $this->File->order = 'File.description ASC, File.modified DESC';
        $this->set('files', $this->paginate());
    }

    public function admin_add() {
        if ($this->request->is('post')) {

            if ($this->upload_file() && $this->File->save($this->request->data)) {
                $this->Session->setFlash(__('The File has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The File could not be saved. Please, try again.'));
            }
        }
    }

    public function admin_edit($id) {

        $this->File->id = $id;
        if (!$this->File->exists()) {
            throw new NotFoundException(__('Invalid File'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->upload_file() && $this->File->save($this->request->data)) {
                $this->Session->setFlash(__('The File has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The File could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->File->read(null, $id);
        }
    }

    /**
     * Upload file
     * @return boolean 
     */
    public function upload_file() {
        // Are we uploading a new file?
        $file = $this->request->data['File']['filename'];

        if ($file['size'] > 0) {
            if ($file['error'] === UPLOAD_ERR_OK) {
                $id = String::uuid(); // Random ID to avoid filename clashes
                $filename = $id . '_' . $file['name'];
                if (move_uploaded_file($file['tmp_name'], APP . DS . 'webroot' . DS . 'files' . DS . $filename)) {
                    $this->request->data['File']['filename'] = $filename;
                }
                return true;
            }
        } else {
            // Not uploading a new file. Retain the existing filename.
            unset($this->request->data['File']['filename']);
            return true;
        }
        return false;
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
        $this->File->id = $id;
        if (!$this->File->exists()) {
            throw new NotFoundException(__('Invalid File'));
        }
        if ($this->File->delete()) {
            $this->Session->setFlash(__('File deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('File was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Download a file based on it's ID
     * @param type $id 
     */
    public function download($id) {
        $this->autoRender = false;      
        if ($id) {
            $this->File->id = $id;
            $data = $this->File->read();
            if ($data['File']['filename']) {				
				$download_name = explode('_', $data['File']['filename']);
				$download_name = str_replace(' ', '-', $download_name[1]);				
                header('Content-Type: application/pdf');
				header('Content-Disposition: attachment; filename=' . $download_name); 
                readfile(APP . 'webroot' . DS . 'files' . DS . $data['File']['filename']);				
				exit;               
            } else {
                throw new NotFoundException(__('File is not available at this time. Please try again later.'));
            }
        } else {
            throw new NotFoundException(__('File does not exist or has moved.'));
        }
    }

}