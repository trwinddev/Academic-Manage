<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class StaffsController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');
  }

  public function addStaff()
  {
    $this->set('title', 'Add Staff | Academic Management');
  }

  public function listStaff()
  {
    $this->set('title', 'List Staff | Academic Management');
  }

  public function editStaff($id = null)
  {
    $this->set('title', 'Edit Staff | Academic Management');
  }

  public function deleteStaff($id = null)
  {
    $this->set('title', 'Delete Staff | Academic Management');
  }
}
