<?php
namespace src\models;

use Exception;
use \core\Model;

class User extends Model {

    public function getByKey( $key, $value ): array
    {
        return $this->select()->where($key, $value)->execute();
    }

    public function salvarToken( $token, $email )
    {
        $this->update(['token' => $token])
            ->where('email', $email)
            ->execute();
    }

    public function salvarUser( $email, $password, $token)
    {
        $this->insert([
            'email' => $email,
            'password' => $password,
            'token' => $token
        ])->execute();
    }
}