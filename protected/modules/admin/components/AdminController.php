<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DMT-59
 * Date: 14-3-19
 * Time: 下午9:55
 * To change this template use File | Settings | File Templates.
 */

class AdminController extends CController{
    public $pageTitle="后台管理";
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='/layouts/main';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();
    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),);
    }
    protected function beforeAction($action){
        if(Yii::app()->admin->isGuest&&$action->getId()!='login'&&$action->getId()!='captcha'){
            $this->redirect(Yii::app()->admin->loginUrl);
        }
        return parent::beforeAction($action);
    }
}