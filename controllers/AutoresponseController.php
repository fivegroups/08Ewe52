<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;



class AutoresponseController extends Controller
{
    public $layout="left.php";
    public $enableCsrfValidation = false;

    //执行自定义文字回复规则的展示
    public function actionShow()
    {
        $session = Yii::$app->session;
        $connection = Yii::$app->db;
        $u_id=$session->get('u_id');
        $pa_id=$session->get('pa_id');
        $ar= $connection->createCommand("SELECT pa_id from we_public_account where u_id='$u_id'")->queryAll();
        if(empty($ar)){
               return $this->render('auto_response_list2');
        }else{
            foreach($ar as $k=>$v){
                $res[]=$v['pa_id'];
            }
            $pa_ids=implode(',',$res);
            $command = $connection->createCommand("select * from we_auto_response inner join we_public_account on
                we_auto_response.pa_id=we_public_account.pa_id
                where we_auto_response.pa_id in  ($pa_ids) ")
                ->queryAll();
            return $this->render('auto_response_list',array("content"=>$command));
        }

    }

    //执行自定义文字回复规则的添加
    public function actionAdd()
    {
        $method =  Yii::$app->request->method;
        if($method != 'POST'){
            $connection = Yii::$app->db;
            $session = Yii::$app->session;
            $u_id=$session->get('u_id');
            $command = $connection->createCommand("SELECT pa_id,pa_name FROM we_public_account where u_id='$u_id'")->queryAll();
            return $this->render('auto_response_add',array('content'=>$command));
        }else{
            $data = Yii::$app->request->post();
            $name = $data['m_rule_name'];
            $type = $data['m_rule_type'];
            $wd  = $data['m_wd'];
            $content = $data['m_content'];
            $pa_id = $data['pa_id'];
            $connection = Yii::$app->db;
            $command = $connection->createCommand()->insert('we_auto_response',['ar_rule_name'=>"$name",'ar_type'=>"$type",'ar_wd'=>"$wd",'ar_content'=>"$content",'pa_id'=>"$pa_id"])->execute();
            if($command){
                setcookie('pa_id',$pa_id);
                return $this->redirect("index.php?r=autoresponse/show");
            }else{
                echo '<script>alert("error")</script>';
            }
        }
    }
	
   //执行自定义文字回复规则的删除
    public function actionDels()
    {
        $ar_id = Yii::$app->request->post('id');
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("delete from we_auto_response where ar_id='$ar_id'")->execute();
        if($command) {
            return  1;
        }
    }

    //显示修改页面
    public function actionUpdates()
    {
        $id = Yii::$app->request->get('id');
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM we_auto_response where ar_id='$id'");
        $data = $command->queryAll();
        return $this->render('auto_response_update',['data'=>$data]);
    }


    public function actionUpdate()
    {
        $post= Yii::$app->request->post();
        $id=$post['hid'];
        $ar_rule_name=$post['m_rule_name'];
        $ar_type=$post['m_rule_type'];
        $ar_wd=$post['m_wd'];
        $ar_content=$post['m_content'];
        $connection=\Yii::$app->db;
        // UPDATE
        $request=$connection->createCommand()->update('we_auto_response', [
            'ar_rule_name' => $ar_rule_name,
            'ar_type' =>$ar_type,
            'ar_wd' =>$ar_wd,
            'ar_content' =>$ar_content
        ], "ar_id='$id'")->execute();
        if($request){
            return $this->redirect("index.php?r=autoresponse/show");
        }else {
            echo "<script>alert('修改失败');location.href='index.php?r=autoresponse/updates'</script>";
        }
    }
	

	
}