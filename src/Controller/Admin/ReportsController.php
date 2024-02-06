<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ReportsController extends AppController
{

  public function initialize(): void
  {
    parent::initialize();
    $this->viewBuilder()->setLayout('admin');
  }

  public function collegesReport()
  {
    $this->set('title', 'College Report | Academic Management');
  }

  public function studentsReport()
  {
    $this->set('title', 'Student Report | Academic Management');
  }

  public function staffsReport()
  {
    $this->set('title', 'Staff Report | Academic Management');
  }
}
