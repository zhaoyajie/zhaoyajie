<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言</title>
</head>
<body>
	<form action="?r=liuyan/show" method="post">
		题头：<input type="text" name="title"><hr>
		内容：<textarea name="liuyan" id="" cols="30" rows="10"></textarea><hr>
		<input type="submit" value="提交留言">

		<table class="table" >
					<tr>
						<td>ID</td>
						<td>标题</td>
						<td>内容</td>
						<td>操作</td>
					</tr>
			<?php foreach ($res as $key => $value): ?>
				<tr>
					<td><?php echo $value['goods_id'];?></td>
					<td><?php echo $value['title'];?></td>
					<td><?php echo $value['goods_name'];?></td>
					
					<td><a href="?r=liuyan/delete&id=<?php echo $value['goods_id']?>">删除</a> | <a href="?r=liuyan/update&id=<?php echo $value['goods_id']?>">修改</a></td>
				</tr>
				
			<?php endforeach ?>
				<tr>
					<td colspan="4" align="center">
						<?php echo LinkPager::widget(['pagination'=>$pages,]);?>
	   			 	</td>
				</tr>
		</table>
	</form>
</body>
</html>