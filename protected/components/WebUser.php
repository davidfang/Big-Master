<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DMT-59
 * Date: 14-3-19
 * Time: 下午1:59
 * To change this template use File | Settings | File Templates.
 */

class WebUser extends CWebUser
{
    public function __get($name)
    {
        if ($this->hasState('__userInfo')) {
            $user=$this->getState('__userInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration = 0) {
        $this->setState('__userInfo', $identity->getUser());
        parent::login($identity, $duration);
    }
}