<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StudentsTable extends Table
{
  public function initialize(array $config): void
  {
    // tbl_students
    $this->setTable('tbl_students');
  }
}
