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

    public function checkConfirmPassword($post)
    {
        if ($post['password'] != $post['confirm-password']) {
            $this->rules['confirm-password']['error'] = true;
            return false;
        }
        return true;
    }

    public function createNewUser($post)
    {
        $role_id = $this->db->column('select id from roles where name = :name', ['name' => 'user']);
        $this->db->query('insert into users (first,last,email,password, role_id, gender, birth) 
        values(:first, :last, :email, :password, :role, :gender, :birth)', [
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

    public function checkCaptcha($post)
    {
        if (!isset($post["g-recaptcha-response"])) return false;

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data =    http_build_query([
            'secret' => '6LfKKeIUAAAAAN_SoJVNZ46friEP5OOsNVf3cVkR',
            'response' => $post["g-recaptcha-response"]
        ]);
        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "Content-Length: " . strlen($data),
                'method' => 'POST',
                'content' =>  $data
            ]
        ];
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);
        $this->rules['reCaptcha']['error'] = !$captcha_success->success;
        return $captcha_success->success;
    }

    public function getMessages()
    {
        $mess = $this->db->row('select * from feedback order by id desc');
        if (!$mess) {
            return false;
        }
        return $mess;
    }

    public function saveMessage($post)
    {
        $this->db->query('insert into feedback (name, email, text, date_added)
        values (:name, :email, :text, :date)', [
            'name' => $post['firstName'],
            'email' => $post['email'],
            'text' => $post['text'],
            'date' => date('Y-m-d H:i:s')
        ]);
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
