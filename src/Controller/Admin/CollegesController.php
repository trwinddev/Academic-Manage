<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CollegesController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');
  }

  public function addCollege()
  {
    $this->set('title', 'Add College | Academic Management');
  }

  public function listCollege()
  {
    $this->set('title', 'List College | Academic Management');
  }

  public function editCollege($id = null)
  {
    $this->set('title', 'Edit College | Academic Management');
  }

  public function deleteCollege($id = null)
  {
    $this->set('title', 'Delete College | Academic Management');
  }
}
