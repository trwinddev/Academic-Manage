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
    $branches = $this->Branches->find()
    ->select([
        'id',
        'name',
        'college_id',
        'start_date',
        'end_date',
        'total_seats',
        'total_durations',
        'branch_college.name'
    ])
    ->contain('branch_college')
    ->toList();

    $this->set(compact('branches'));
    $this->set('title', 'List Branch | Academic Management');
  }

  public function editBranch($id = null)
  {
    $branch = $this->Branches->get($id, [
        'contain' => []
    ]);

    if($this->request->is(['post', 'put', 'patch'])) {
        $branchData = $this->request->getData();
        $branch = $this->Branches->patchEntity($branch, $branchData);
        if($this->Branches->save($branch)) {
            $this->Flash->success('Branch has been updated successfully');
            return $this->redirect(['action' => 'listBranch']);
        } else {
            $this->Flash->error('Failed to update branch');
        }
    }

    $this->set(compact('branch'));
    $colleges = $this->Colleges->find()->select(['id', 'name'])->toList();
    $this->set(compact('colleges', 'branch'));
    $this->set('title', 'Edit Branch | Academic Management');
  }

  public function deleteBranch($id = null)
  {
    $this->set('title', 'Delete Branch | Academic Management');
  }
}
