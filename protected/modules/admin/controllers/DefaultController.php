<?php

class DefaultController extends AdminController
{
    //public $layout='/layouts/main';
	public function actionIndex()
	{
        /*foreach(Yii::app()->session as $name=>$value){
            echo $name .'==---会话session---=='.(is_array($value)?var_dump($value):$value).'<br>';
        }
        echo '<pre>';
        var_dump(Yii::app()->session);
        var_dump(Yii::app()->admin);
        echo '--------------------------------------';
        //var_dump(Yii::app()->user);
        echo '</pre>';*/
		//echo 'admin ^-^';
        $this->render('index');
	}
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()){
                $this->redirect(Yii::app()->admin->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->admin->logout(false);
        $this->redirect(Yii::app()->admin->loginUrl);
    }
}