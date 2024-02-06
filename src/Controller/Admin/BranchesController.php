<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class BranchesController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');
  }

  public function addBranch()
  {
    $this->set('title', 'Add Branch | Academic Management');
  }

  public function listBranch()
  {
    $this->set('title', 'List Branch | Academic Management');
  }

  public function editBranch($id = null)
  {
    $this->set('title', 'Edit Branch | Academic Management');
  }

  public function deleteBranch($id = null)
  {
    $this->set('title', 'Delete Branch | Academic Management');
  }
}
