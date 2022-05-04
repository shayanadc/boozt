<?php


namespace App\Model;

class User extends Model
{
    public string $table = 'users';
    public $id;
    public $email;
    public $first_name;
    public $last_name;

    public function attributes(): array{
        return  ['email', 'first_name', 'last_name'];
    }
}