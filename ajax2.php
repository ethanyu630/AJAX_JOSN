<?php
		try {
			$connect = new PDO("mysql:host=localhost;dbname=dom","root", "");
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connect->query("SET NAMES UTF8");
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		@$id=$_POST['id'];
		@$check = $_POST['in'];
		@$de=$_POST['de'];
		if(!$id==""){
			
			// foreach($array as $key =>$value){
				// $array[$key]
			// }
		// 0 0,15
		// 1 15,15
		// 2 30,15
			switch($id){
				case $id:	
$id=($id-1)*15;				
					$sql = "select * from simpledom LIMIT :id,:limit";
					
					$stmt = $connect->prepare($sql);  //丟入暫存位置
					$stmt->setFetchMode(PDO::FETCH_ASSOC);
					$stmt->bindValue(":id",$id,PDO::PARAM_INT);    
					$stmt->bindValue(":limit",15,PDO::PARAM_INT);  //利用PDO轉數字型態
					$stmt->execute();
					$query = $stmt->fetchall();
					echo json_encode($query);
					return true;
			}
		}
		// if(isset($check)){
			// switch($in){
				// case $in:
					// $check = $_POST['in'];
					// $title = $_POST['title'];
					// $href = $_POST['href'];
					// $content = $_POST['content'];
					// $picture = $_POST['picture'];
					// $sql = "INSERT INTO `simpledom`(`id`, `check`, `title`, `href`, `content`, `picture`) VALUES ('','$check','$title','$href','$content','$picture') ";
					// $stmt = $connect->exec($sql);
					// echo $stmt;
					// return true;
			// }
		// }
        if(!$de==""){		
			switch($de){
				case $de:
					$sql = "delete from simpledom where id=$de";
					$stmt = $connect->exec($sql);  //丟入暫存位置
					echo $stmt;
					return true;
			}		
		}
				
				
				
				// $query=[
				
					// 'name'=>'eason',
					// 'phone'=>'2234',
				// ];
				// break;
			// case 2:
				// $data=[
					// 'name'=>'chi',
					// 'phone'=>'4443',
				// ];
				// break;
		


