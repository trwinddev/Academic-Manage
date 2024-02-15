<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StudentsController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');
    $this->loadModel('Students');
  }

  public function addStudent()
  {
    $student = $this->Students->newEmptyEntity();

    if ($this->request->is('post')) {
      $fileObject = $this->request->getData('profile_image');
      $filename = $fileObject->getClientFilename();
      $fileExtension = $fileObject->getClientMediaType();
      $valid_extensions = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
      if (in_array($fileExtension, $valid_extensions)) {
        $destination = WWW_ROOT . 'students' . DS . $filename;
        $fileObject->moveTo($destination);
        $studentData = $this->request->getData();
        $studentData['profile_image'] = 'students' . DS . $filename;
        $student = $this->Students->patchEntity($student, $studentData);
        if ($this->Students->save($student)) {
          $this->Flash->success('Student has been created successfully');
        } else {
          $this->Flash->error('Failed to create student');
        }
        return $this->redirect(['action' => 'listStudent']);
      } else {
        $this->Flash->error('Uploaded file is not an image');
      }
    }

    $this->set(compact('student'));
    $this->set('title', 'Add Student | Academic Management');
  }

  public function listStudent()
  {
    $this->set('title', 'List Student | Academic Management');
  }

  public function editStudent($id = null)
  {
    $this->set('title', 'Edit Student | Academic Management');
  }

  public function deleteStudent($id = null)
  {
    $this->set('title', 'Delete Student | Academic Management');
  }
}
