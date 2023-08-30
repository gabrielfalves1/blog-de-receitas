<?php
require_once 'dao\UserDao.php';
class UserValidator
{
    private $msg = [];
    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao;
    }

    public function validate(User $user)
    {
        $user->setUsername(trim(htmlspecialchars($user->getUsername())));
        $user->setEmail(trim(htmlspecialchars($user->getEmail())));


        if (empty($user->getUsername()) || empty($user->getEmail()) || empty($user->getPassword())) {
            $this->msg['all'] = "Preencha todos os campos.";
        } else {
            if (strlen($user->getUsername()) < 3) {
                $this->msg['username'] = "Nome de usuário precisa ter no mínimo 3 caracteres.";
            } elseif (strlen($user->getUsername()) > 15) {
                $this->msg['username'] = "Nome de usuário só pode conter até 15 caracteres.";
            } elseif ($this->userDao->isEmailRegistered($user->getEmail())) {
                $this->msg['email'] = "Email já cadastrado em nosso sistema.";
            } elseif ($this->userDao->isUsernameRegistered($user->getEmail())) {
                $this->msg['username'] = "Nome de usuário já cadastrado em nosso sistema.";
            }

            if (empty($this->msg)) {
                $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
                return $user;
            }
            return null;
        }
    }

    public function getMsgs()
    {
        return $this->msg;
    }
}
