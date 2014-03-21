<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DMT-59
 * Date: 14-3-19
 * Time: 下午3:08
 * To change this template use File | Settings | File Templates.
 */

class UserIdentity extends CUserIdentity
{
    public $user;
    public $username;
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $users=array(
            // username => password
            'demo2'=>'demo',
            'admin2'=>'admin',
        );
        if(!isset($users[$this->username]))
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif($users[$this->username]!==$this->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode=self::ERROR_NONE;
        return !$this->errorCode;
    }
    public function getUser()
    {
        return $this->user;
    }

    public function getUserName()
    {
        return $this->username;
    }
}