<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;



class PublicaccountController extends Controller
{

    public $layout="left.php";
    public $enableCsrfValidation = false;

    //执行公众号账户表的展示
    public function actionShow()
    {
        $connection=\Yii::$app->db;
        $session = Yii::$app->session;
        $u_id=$session->get('u_id');
        $str['arr']=$connection->createCommand("select * from we_public_account inner join we_public_account_token on we_public_account.pa_id = we_public_account_token.pa_id where u_id='$u_id'")->queryAll();
        return $this->render('public_account_list',$str);
    }

    //执行公众号账户表的添加
    public function actionAdd()
    {
        $method =  Yii::$app->request->method;
        if($method !="POST"){
            return $this->render('public_account_add');
        }else{
            $connection=\Yii::$app->db;
            $session = Yii::$app->session;
            $baseUrl = str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME']));
            //保证为空时能返回可以使用的正常值
            $baseUrl = empty($baseUrl) ? '/' : '/'.trim($baseUrl,'/').'/';
            $pat_api_link='http://'.$_SERVER['HTTP_HOST'].$baseUrl."wx_sample.php";//获取当前的URL不带参数
            $u_id=$session->get('u_id');
            $arr=$_POST;
            $str=$connection->createCommand()->insert("we_public_account",array(
                "u_id"=>"$u_id",
                "pa_name"=>$arr['pa_name'],
                "pa_type"=>$arr['pa_type'],
                "pa_appid"=>$arr['pa_appid'],
                "pa_appsecret"=>$arr['pa_appsecret'],
                "pa_weixin"=>$arr['pa_weixin'],
                "pa_wx_account"=>$arr['pa_wx_account']
            ))->execute();
            if($str){
                $arr=$connection->createCommand("select pa_id from we_public_account where u_id='$u_id' and pa_name='$arr[pa_name]'")->queryAll();
                $pa_id=$arr[0]['pa_id'];
		        $session->set('pa_id',$pa_id);
                //生成token
                $string = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
                // $pat_api_link='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                $pat_token = '';
                for ($i=0; $i < 32; $i++)//随机生成32位的token
                {
                    $pat_token.= $string[rand(0,strlen($string)-1)];
                }
                $pat_hash="";
                for ($i=0; $i < 5; $i++)//随机生成5位的hash
                {
                    $pat_hash.= $string[rand(0,strlen($string)-1)];
                }
                $connection->createCommand()->insert("we_public_account_token",array(
                    "pa_id"=>"$pa_id",
                    "pat_token"=>"$pat_token",
                    "pat_hash"=>"$pat_hash",
                    "pat_api_link"=>"$pat_api_link",
                ))->execute();
                return $this->redirect("index.php?r=publicaccount/show");
            }else{
                return $this->render('public_account_add');
            }
        }
    }

    //执行公众号删除
    public function actionDel()
    {
        $pa_id=$_GET['pa_id'];
        $connection=\Yii::$app->db;
        $arr=$connection->createCommand("delete from we_public_account where pa_id='$pa_id'")->execute();
        if($arr){
            return $this->redirect('index.php?r=publicaccount/show');
           // return 1;
        }else{
            return 0;
        }
    }
    //进入修改表单
    public function actionXg()
    {
        $id=$_GET['pa_id'];
        $connection=\Yii::$app->db;
        $arr['arr']=$connection->createCommand("select * from we_public_account where pa_id='$id'")->queryAll();
        $arr['str']=$connection->createCommand("select * from we_public_account_token where pa_id='$id'")->queryAll();
        return $this->render('public_account_update',$arr);
    }

    //执行修改
    public function actionZx_update()
    {
        $arr=$_POST;
        $connection=\Yii::$app->db;
        $str=$connection->createCommand()->update("we_public_account",[
            'pa_name'=>$arr['pa_name'],
            'pa_type'=>$arr['pa_type'],
            'pa_appid'=>$arr['pa_appid'],
            'pa_appsecret'=>$arr['pa_appsecret'],
            'pa_weixin'=>$arr['pa_weixin'],
            'pa_wx_account'=>$arr['pa_wx_account'],
        ],"pa_id=$arr[pa_id]")->execute();
        if($str){
            return $this->redirect("index.php?r=publicaccount/show");
        }

    }
}
