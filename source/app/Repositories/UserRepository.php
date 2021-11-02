<?php

namespace App\Repositories;

use App\Models\User;
use Vendor\PasswordHashing;

class UserRepository
{
    private  $userModel = null;
            
    public function __construct() {
        $this->userModel = new User();
    }

    public function login($params)
    {
        #Get user from database by user_name
        $userName   = $params['user_name'];
        $user       = $this->userModel->findUserByUserName($userName);
        if($user)
        {
            #Verify password(chỗ này sẽ xác thực password bằng phương thức mã hóa đã sử dụng)
            $pw     = $params['password'];
            $salt   = $user->salt;
            $hash   = $user->hash;
            
            $verifyPw = $pw.$salt;
            $verifiedStatus = PasswordHashing\PasswordStorage::verify_password($verifyPw, $hash);
            if($verifiedStatus)
            {
                #Make user's token
                #TODO
                #Response the necessary data
                #TODO
                return $user;
            }
            #TODO
            throw new \Exception();
            
        }
        throw new \Exception();
    }
}
