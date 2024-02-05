<?php

declare(strict_types=1);

use Cake\Auth\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $hash = new DefaultPasswordHasher;
        $data = [
            'name' => 'Admin',
            'email' => 'admin-phong@gmail.com',
            'phone_no' => '0123456789',
            'password' => $hash->hash('admin@123')
        ];

        $table = $this->table('tbl_users');
        $table->insert($data)->save();
    }
}
