<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class UserController extends Controller
{
    public $layout=false; //禁用yii自带样式
    public $enableCsrfValidation = false; //表单跳转，禁用 CSRF 验证

    public function actionInstall()
    {
        $filename = 'install/install.lock';
        if(file_exists($filename)){
            return $this->render('login');
        }else{
            echo "<script>alert('您还未安装，请先安装');location.href='install/install.php'</script>";
        }
    }

    //执行用户登录处理
	public function actionIndex()
    {
        $method =  Yii::$app->request->method;
        if($method != 'POST') {
            return $this->render('login');
        }else{
            $data = Yii::$app->request->post();
            $pwd = md5($data['u_pwd']);
            $connection = Yii::$app->db;
            $command = $connection->createCommand("SELECT * FROM we_user where u_name='".$data['u_name']."' and u_pwd='$pwd'")->queryAll();
            if($command){
                $session = Yii::$app->session;
                $session->set('u_id', $command[0]['u_id']);
                setcookie('u_name',$data['u_name']);
                //print_r($_COOKIE['u_name']);die;
                return $this->redirect('index.php?r=publicaccount/show');
            }else{
                return '<script>alert("error")</script>'.$this->redirect('index.php?r=user');
            }
        }
    }

	//执行用户注册处理
	public function actionRegister()
    {
        $method =  Yii::$app->request->method;
        if($method != 'POST'){
            return $this->render('register');
        }else{
            $data = Yii::$app->request->post();
            $name = $data['u_name'];
            $pwd = md5($data['u_pwd']);
            $connection = Yii::$app->db;
            $command = $connection->createCommand()->insert('we_user',['u_name'=>"$name",'u_pwd'=>"$pwd"])->execute();
            $u_id = Yii::$app->db->getLastInsertID();
            if($command){
                $session = Yii::$app->session;
                $session->set('u_id',$u_id);
                setcookie('u_name',$data['u_name']);
                return $this->redirect('index.php?r=publicaccount/show');
            }else{
                return '<script>alert("error")</script>'.$this->redirect('index.php?r=user/register');
            }
        }
	}


    //用户注销
    public function actionLogout()
    {
        setcookie('u_name',$_COOKIE['u_name'],time()-1);
        return $this->render('login');
    }



}