<?php


namespace App\Model;

/**
 * Class User
 * @package App\Model
 */
class User extends Model
{
    /**
     * @var string
     */
    public string $table = 'users';
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $first_name;
    /**
     * @var
     */
    public $last_name;

    /**
     * @return string[]
     */
    public function attributes(): array{
        return  ['email', 'first_name', 'last_name'];
    }
}