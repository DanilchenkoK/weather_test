<?php

namespace app\models;

use app\components\Model;

class Home extends Model
{
    public $rules;
    function __construct()
    {
        parent::__construct();
        $this->rules =  require 'app/config/home.php';
    }

    public function createNewUser($post)
    {
        $this->db->query("insert into users (first,last,email, gender, birth) values(:first, :last, :email, :gender, :birth)", [
            'first' => $post['firstName'],
            'last' => $post['lastName'],
            'email' => $post['email'],
            'gender' => $post['gender'] == -1 ? null : $post['gender'],
            'birth' =>  $post['birth'] ?? null,
        ]);
    }

    public function checkEmail($post)
    {
        $user = $this->db->column("select * from users where email = :email", [
            'email' => $post['email']
        ]);
        if ($user !== false) {
            $this->rules['account']['error'] = true;
            return false;
        }

        return true;
    }

    public function validation($inputs, $post)
    {
        $isValid = true;
        foreach ($inputs as $val) {
            if (!isset($post[$val]) or !preg_match($this->rules[$val]['pattern'], trim($post[$val]))) {
                $this->rules[$val]['error'] = true;
                $isValid = false;
            } else {
                $this->rules[$val]['error'] = false;
            }
        }
        return $isValid;
    }
}
