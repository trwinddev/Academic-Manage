<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CollegesController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->loadModel('Colleges');
    $this->viewBuilder()->setLayout('admin');
  }

  public function addCollege()
  {
    $college = $this->Colleges->newEmptyEntity();

    if ($this->request->is('post')) {
      $fileObject = $this->request->getData('cover_image');
      $filename = $fileObject->getClientFilename();
      $fileExtension = $fileObject->getClientMediaType();
      $valid_extensions = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');

      if (in_array($fileExtension, $valid_extensions)) {
        $destination = WWW_ROOT . 'colleges' . DS . $filename;
        $fileObject->moveTo($destination);
        $collegeData = $this->request->getData();
        $collegeData['cover_image'] = 'colleges' . DS . $filename;
        $college = $this->Colleges->patchEntity($college, $collegeData);
        if ($this->Colleges->save($college)) {
          $this->Flash->success('College has been created successfully');
          return $this->redirect(['action' => 'listCollege']);
        } else {
          $this->Flash->error('Failed to create college');
        }
      } else {
        $this->Flash->error('Uploaded file is not an image');
      }
    }

    $this->set(compact('college'));
    $this->set('title', 'Add College | Academic Management');
  }

  public function listCollege()
  {
    $colleges = $this->Colleges->find()->toList();
    $this->set(compact('colleges'));
    $this->set('title', 'List College | Academic Management');
  }

  public function editCollege($id = null)
  {
    $college = $this->Colleges->get($id, [
      'contain' => []
    ]);

    if ($this->request->is(['post', 'put', 'patch'])) {
      $collegeData = $this->request->getData();

      $fileObject = $this->request->getData('cover_image');
      $filename = $fileObject->getClientFilename();
      $fileExtension = $fileObject->getClientMediaType();

      if (!empty($filename)) {
        $valid_extensions = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
        if (in_array($fileExtension, $valid_extensions)) {
          $destination = WWW_ROOT . 'colleges' . DS . $filename;
          $fileObject->moveTo($destination);
          $collegeData = $this->request->getData();
          $collegeData['cover_image'] = 'colleges' . DS . $filename;
        } else {
          $this->Flash->error('Uploaded file is not an image');
        }
      } else {
        $collegeData['cover_image'] = $college->cover_image;
      }
      $college = $this->Colleges->patchEntity($college, $collegeData);
      if ($this->Colleges->save($college)) {
        $this->Flash->success('College has been edited successfully');
        return $this->redirect(['action' => 'listCollege']);
      } else {
        $this->Flash->error('Failed to edit college');
      }
    }

    $this->set(compact('college'));
    $this->set('title', 'Edit College | Academic Management');
  }

  public function deleteCollege($id = null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $college = $this->Colleges->get($id);

    if ($this->Colleges->delete($college)) {
      $this->Flash->success('College has been deleted successfully');
    } else {
      $this->Flash->error('Failed to delete college');
    }
    return $this->redirect(['action' => 'listCollege']);
  }
}
