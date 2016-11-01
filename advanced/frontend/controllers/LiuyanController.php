<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Liuyan;
use yii\data\Pagination;


/**
 * This is Liuyan controller
 */
class LiuyanController extends Controller
{
	public $enableCsrfValidation = false; //禁止表单提交验证

	/**
	 * 
	 * @return [type] [description]
	 */
	public function actionShow()
	{
		//实例化接值 用 request
		$yemian = yii::$app->request;
		$liuyan = $yemian->post('liuyan');
		$title = $yemian->post('title');

		//实例化数据库 用 db
		$db = yii::$app->db;
		$sql = "insert into goods(goods_name,title) values('$liuyan','$title')";
		$data = $db->createCommand($sql)->execute();
		if ($data) 
		{
			echo "<script>alert('添加成功');</script>";
			$this->redirect(['liuyan/list']);
		}
		else
		{
			echo "添加失败";
		}
	}


	/**
	 * 列表查数据
	 * @return [type] [description]
	 */
	public function actionList()
	{
		$db    = yii::$app->db;
		$test  = New Liuyan();
		$add   = Liuyan::find();
		$pages = new Pagination([
                 'totalCount' => $add->count(),
                 'pageSize'   => 2   //每页显示条数
               ]);
		$res   = $add->select('*')
	                 ->from('goods')
	                 ->offset($pages->offset)
	                 ->limit($pages->limit)
	                 ->orderBy(["goods_id"=>SORT_DESC])
	                 ->asArray()
	                 ->all();

		return $this->render('liuyan',['res' => $res,'pages' => $pages]);
	}


	/**
	 * 调用页面方法
	 * @return [type] [description]
	 */
	public function actionYe()
	{
		return $this->render('liuyan');
	}


	/**
	 * 删除数据
	 * @return [type] [description]
	 */
	public function actionDelete()
	{
		//获取id删除
		$request = yii::$app->request;
		$id = $request->get('id');

		//实例化数据库
		$db = yii::$app->db;
		$sql = "delete from goods where goods_id='$id'";
		$de = $db->createCommand($sql)->execute();
		if ($de) 
		{
			echo "<script>alert('删除成功');</script>";
			$this->redirect(['liuyan/list']);
		}
		else
		{
			echo '删除成功';
		}
	}


	/**
	 * 修改
	 * @return [type] [description]
	 */
  	public function actionUpdate(){
  		//获取id
  		$request = yii::$app->request;
		$id = $request->get('id');
        $db  = yii::$app->db;
  		
		$sql = "select * from goods where goods_id='$id'";
        $re = $db->createCommand($sql)->queryall();
       
        return $this->render('update',['re'=>$re]);

    }


	/**
	 * 修改
	 * @return [type] [description]
	 */
    public function actionUpdate_pro(){

		$update1= yii::$app->request;
		$id=$update1->post('id');

		$title_pro=$update1->post('title_pro');
		$liuyan_pro=$update1->post('liuyan_pro');

		$data_db=yii::$app->db;
		$sql=$data_db->createCommand()->update('goods',['title'=>$title_pro,'goods_name'=>$liuyan_pro],"goods_id=$id")->execute();
		
		if($sql)
		{
			echo "<script>alert('修改成功');</script>";
			$this->redirect(['liuyan/list']);
		}
		else
		{
			echo "<script>alert('修改失败');</script>";
		}
    }
// /**
//  * model的添加
//  * @return [type] [description]
//  */
// public function actionInsert(){
// 	$test=new Goods();
// 	$test->goods_name='jie';
// 	$test->title='123456';
// 	$test->validate();   //调用rule函数验证数据
// 	if($test->hasErrors()){
// 	echo '数据不合法';
// 	die();
// 	}
// 	$test->save();

// }

// // 查询
// public function actionSelect(){
// 	$request=yii::$app->request;
// 	$res=$request->post();

// 	// $res=Goods::find()->where()->asArray()->all();
// 	$test=new Goods();
// 	$test->find()->where(['id'=>1])->asArray()->all();
// }


// $test=new Goods();
// $result=$test->find()->where(['id'=>1)->all()->one();
// $result->goods_name='chen';
// $result->save();



}