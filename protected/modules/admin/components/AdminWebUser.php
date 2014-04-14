<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DMT-59
 * Date: 14-3-19
 * Time: 下午3:03
 * To change this template use File | Settings | File Templates.
 */

class AdminWebUser extends CWebUser
{

    public function __get($name)
    {
        if ($this->hasState('__adminInfo')) {
            $user=$this->getState('__adminInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration = 0) {
        $this->setState('__adminInfo', $identity->getUser());
        parent::login($identity, $duration);
    }
}