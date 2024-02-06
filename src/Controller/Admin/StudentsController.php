<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StudentsController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');
  }

  public function addStudent()
  {
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
