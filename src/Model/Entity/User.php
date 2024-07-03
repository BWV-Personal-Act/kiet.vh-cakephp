<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * Data Entity
 */
class User extends Entity
{
    /**
     * @var array<string, bool>
     */
    protected array  $_accessible = [
        'email' => true,
        'password' => true,
        'name' => true,
        'user_flg' => true,
        'date_of_birth' => true,
        'phone' => true,
        'address' => true,
        'del_flg' => true,
        'created_by' => true,
        'updated_by' => true,
        'deleted_by' => true,
        'deleted_at' => true,
        'avatar' => true,
        'created' => true,
        'modified' => true,
    ];

    // Protect sensitive properties
    protected array  $_hidden = [
        'password',
    ];

    // Create virtual properties for encrypted passwords
    // Add this method
    protected function _setPassword(string $password): ?string {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return null;
    }
}
