<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class UserData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void {
        $table = $this->table('users');
        $table->addColumn('email', 'string', [
            'limit' => 50,
            'null' => false,
        ]);
        $table->addIndex(['email'], ['unique' => true]);

        $table->addColumn('password', 'string', [
            'limit' => 255,
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 50,
        ]);
        $table->addColumn('user_flg', 'boolean', [
            'default' => true,
        ]);
        $table->addColumn('date_of_birth', 'date', [
            'null' => true,
        ]);
        $table->addColumn('phone', 'string', [
            'limit' => 20,
        ]);
        $table->addColumn('address', 'string', [
            'null' => true,
        ]);
        $table->addColumn('del_flg', 'boolean', [
            'default' => false,
        ]);
        $table->addColumn('created_by', 'integer', [
            'null' => true,
            'signed' => false,
        ])
            ->addForeignKey('created_by', 'users', 'id');
        $table->addColumn('created_at', 'datetime', [
            'null' => true,
            'default' => null,
        ]);

        $table->addColumn('updated_by', 'integer', ['null' => true,
            'signed' => false, ])
            ->addForeignKey('updated_by', 'users', 'id');
        $table->addColumn('updated_at', 'datetime', [
            'null' => true,
            'default' => null,
        ]);

        $table->addColumn('deleted_by', 'integer', ['null' => true,
            'signed' => false, ])
            ->addForeignKey('deleted_by', 'users', 'id');
        $table->addColumn('deleted_at', 'datetime', [
            'null' => true,
            'default' => null,
        ]);

        $table->addColumn('avatar', 'string', [
            'limit' => 255,
        ]);
        $table->create();
    }
}
