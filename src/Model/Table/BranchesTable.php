<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class BranchesTable extends Table
{
  public function initialize(array $config): void
  {
    // tbl_branches
    $this->setTable('tbl_branches');
  }
}
