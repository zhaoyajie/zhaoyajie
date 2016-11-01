<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言</title>
</head>
<body>
	<form action="?r=liuyan/update_pro" method="post">
	
		题头：<input type="text" name="title_pro" value="<?=$re[0]['title']?>">
		<input type="hidden" name="id" value=" <?=$re[0]['goods_id']?>"><hr>
		内容：<textarea name="liuyan_pro" id="" cols="30" rows="10"><?=$re[0]['goods_name']?></textarea><hr>
		
		<input type="submit" value="修改留言">
	</form>
</body>

</html>