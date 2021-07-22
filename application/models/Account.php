<?php
namespace application\models;

use application\core\Model;

class Account extends Model{

    public function validate($input, $post){
        $rules = [
            'login' => [
                'pattern' => '#^[a-z0-9]{3,20}$#',
                'message' => 'Логин указан неверно (разрешены только латинские буквы и цифры от 3 до 15 символов)',
            ],
            'password' => [
                'pattern' => '#^[a-z0-9]{8,30}$#',
                'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 8 до 20 символов)',
            ],
            'password_confirm' => [
                'pattern' => '#^[a-z0-9]{8,30}$#',
                'message' => 'Пароли не совпадает',
            ],
            'new_password' => [
                'pattern' => '#^[a-z0-9]{8,30}$#',
                'message' => 'Пароль указан неверно (разрешены только латинские буквы и цифры от 8 до 20 символов)',
            ],
            'email' => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => 'E-mail адрес указан неверно',
            ],
            'lastname' => [
                'pattern' => '/^[a-zA-Zа-яёА-ЯЁ]{2,30}+$/u',
                'message' => 'Фамилия указана неверно',
            ],
            'firstname' => [
                'pattern' => '/^[a-zA-Zа-яёА-ЯЁ]{2,20}+$/u',
                'message' => 'Имя указано неверно',
            ],
        ];
        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->error = $rules[$val]['message'];
                return false;
            }

        }
        //TODO повтор пароля сделать в форме регистрации, чтобы не затрагивало форму входа
//        if(isset($post['password_repeat'])) {
//            if ($post['password'] !== $post['password_repeat']) {
//                $this->error = 'Пароли не совпадают';
//                return false;
//            }
//        }
        return true;
    }

    public function checkLoginExists($login){
        $params = [
            'login' => $login,
        ];
        if($this->db->column('SELECT id FROM accounts WHERE login = :login', $params)){
            $this->error = 'Этот Login уже используется';
            return false;
        }
        return true;
    }

    public function checkEmailExists($email){
        $params = [
            'email' => $email,
        ];
        if($this->db->column('SELECT id FROM accounts WHERE email = :email', $params)){
            $this->error = 'Этот E-mail уже используется';
            return false;
        }
        return true;
    }

//    public function checkPasswordRepeat($password, $password_repeat){
//        if($password !== $password_repeat){
//            $this->error = 'Пароли не совпадают';
//            return false;
//        }
//        return true;
//    }

    public function createToken(){
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)),0, 30);
    }

    public function checkTokenExists($token){
        $params = [
            'token' => $token,
        ];
        return $this->db->column('SELECT id FROM accounts WHERE token = :token', $params);
    }

    public function activate($token){
        $params = [
            'token' => $token,
        ];
        $this->db->query('UPDATE accounts SET status = 1, token = "" WHERE token = :token', $params);
    }

    public function register($post){
        $token = $this->createToken();
        $params = [
            'id' => NULL,
            'login' => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'email' => $post['email'],
            'lastname' => $post['lastname'],
            'firstname' => $post['firstname'],
            'token' => $token,
            'status' => '0',
        ];
        $this->db->query('INSERT INTO accounts VALUES (:id, :login, :password, :email, :lastname, :firstname, :token, :status)', $params);
        mail($post['email'], 'Register', 'Confirm: http://stroydoc.by/account/confirm/'.$token);
    }

    public function checkData($login, $password){
        $params = [
            'login' => $login,
        ];
        $hash = $this->db->column('SELECT password FROM accounts WHERE login = :login', $params);
        if(!$hash or !password_verify($password, $hash)){
            return false;
        }
        return true;
    }

    public function checkStatus($type, $data){
        $params = [
            $type => $data,
        ];
        $status = $this->db->column('SELECT status FROM accounts WHERE '.$type.' = :'.$type, $params);
             if($status !=1){
                 $this->error = 'Аккаунт ожидает подтверждения по E-mail';
                 return false;
        }
        return true;
    }

    public function login($login){
        $params = [
            'login' => $login,
        ];
        $data = $this->db->row('SELECT * FROM accounts WHERE login = :login', $params);
        $_SESSION['account'] = $data[0];
    }

    public function recovery($post){
        $token = $this->createToken();
        $params = [
            'email' => $post['email'],
            'token' => $token,
        ];
        $this->db->query('UPDATE accounts SET token =:token WHERE email =:email', $params);

        mail($post['email'], 'Recovery', 'Confirm: http://stroydoc.by/account/reset/'.$token);
    }

    public function reset($token){

        $new_password = $this->createToken();
        $params = [
            'token' => $token,
            'password' => password_hash($new_password, PASSWORD_BCRYPT),
        ];
        $this->db->query('UPDATE accounts SET status = 1, token = "", password =:password WHERE token = :token', $params);
        return $new_password;
    }

    public function changePassword($post){
        $params = [
            'login' => $post['login'],
            'password' => password_hash($post['new_password'], PASSWORD_BCRYPT),
        ];
        $this->db->query('UPDATE accounts SET password =:password WHERE login =:login', $params);
    }

}

