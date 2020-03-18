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
        $role_id = $this->db->column('select id from roles where name = :name', ['name' => 'user']);
        $this->db->query('insert into users (first,last,email,password, role_id, gender, birth) 
        values(:first, :last, :email, :password, :role,:gender, :birth)', [
            'first' => $post['firstName'],
            'role' => $role_id,
            'last' => $post['lastName'],
            'email' => $post['email'],
            'password' => password_hash(trim($post['password']), PASSWORD_BCRYPT),
            'gender' => $post['gender'] == -1 ? null : $post['gender'],
            'birth' =>  $post['birth'] ?? null,
        ]);
    }
    public function checkEmailAndPassword($post)
    {
        $user = $this->db->row('select users.first, email, password, roles.name as role from users 
        join roles on users.role_id = roles.id where email = :email', [
            'email' => $post['email']
        ]);
        if (!$user or !password_verify($post['password'], $user[0]['password'])) {
            $this->rules['account']['error'] = true;
            return false;
        }
        $status = $user[0]['role'] == 'user' ? 'authorized' : 'guest';
        $_SESSION[$status]['name'] = $user[0]['first'];
        return true;
    }

    public function logoutAccount()
    {
        unset($_SESSION['authorized']);
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
