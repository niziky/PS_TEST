<?php 
namespace App\Controllers;

use App\Repositories\UserRepository;

class UsersController extends AppController
{
    private $userRepository = null;
    public function __construct() {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        try {
            $user = $this->userRepository->login($params);
            $this->response(RESSPONSE_STATUS_SUCCESS, null,null,$user);
        } catch (\Exception $ex) {
            /**
             * Write log error
             * TODO
             */
            $this->response(RESSPONSE_STATUS_ERROR, CODE_LOGIN_FAILED,MSG_LOGIN_FAILED);
            echo $ex->getMessage();
        }
    }
    public function logout()
    {
        // TODO
    }
}