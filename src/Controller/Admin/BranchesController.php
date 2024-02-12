<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class BranchesController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');

    $this->loadModel('Colleges');
  }

  public function addBranch()
  {
    $branch = $this->Branches->newEmptyEntity();
    if($this->request->is('post')) {
        $branchData = $this->request->getData();
        $branch = $this->Branches->patchEntity($branch, $branchData);
        if($this->Branches->save($branch)) {
            $this->Flash->success('Branch has been created successfully');
            return $this->redirect(['action' => 'listBranch']);
        } else {
            $this->Flash->error('Failed to create branch');
        }
    }

    $colleges = $this->Colleges->find()->select(['id', 'name'])->toList();
    $this->set(compact('colleges', 'branch'));

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
