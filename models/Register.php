<?php

namespace Spike\models;

use Spike\core\Model;

class Register extends Model
{
    public string $username;
    public string $email;
    public string $password;
    public string $confirm_password;

    public function save()
    {
        return 'Creating new register';
    }
}