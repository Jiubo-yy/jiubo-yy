<?php
	header("Access-Control-Allow-Origin: *");//这个必写，否则报错
	$mysqli=new mysqli('localhost:3306','root','127.0.0.1','newsvue');//根据自己的数据库填写
 
	$sql="select * from login";
	$res=$mysqli->query($sql);
 
	$arr=array();
	while ($row=$res->fetch_assoc()) {
		$arr[]=$row;
	}
	$res->free();
	//关闭连接
	$mysqli->close();
	
	echo(json_encode($arr));//这里用echo而不是return

	//

	//把获取的用户信息数组编码成json字符串
	$json = json_encode($arr);
	
	//打开json文件,如果没有json文件则自动创建json文件
	$file = fopen('data.json','w+');
	//把json字符串$json写入json文件data.json
	fwrite($file,$json);
	//关闭文件
	fclose($file);
?>