<?php	
//debug一次給你看
				
//因為$tmp[$key]等同$val所以$tmp[$key][$val]才會出錯誤
//$tmp[$key][$val]中的$val是array當作鍵值會出現 Illegal offset type錯誤
// var_dump($tmp[$key]);
// var_dump($val);
// echo $tmp[$key][$val];//你原本的code
echo "<a href='http://localhost/homeworkajax/applenews1.php'>最新資訊整理</a>";	

		require_once(__DIR__."/DB.php"); 
		$tmp=DB::select("select * from simpledom where 1 order by id desc");
		if($tmp){
			
			foreach($tmp as $key=>$val){
					$id[]=$tmp[$key]['id'];
					$time[]=$tmp[$key]['date'];
					$title[]=$tmp[$key]['title'];				
			}
			$es=10;
		}else{
			echo "查無資料";
			$es=0;
		} 
		$totle=count($tmp);
		$c=ceil($totle/10);
		echo"<br>";
		
		$se=0;
		$page=1;
		if(isset($_GET['page']) ){
			$page=$_GET['page'];
			$es=10*$page;
			$se=10*$page-10;
			if($es > $totle){
				$es=$totle;
			}
		}
		
	?>
	
<DOCTYPE html>
<html>
	<head>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script>
			<?php for($a=$se;$a<$es;$a++){?>
				$(function(){    //select
					$("#found<?php echo $a?>").click(function(){
						var id=$("#found<?php echo $a?>").val();
						console.log(id);
						$.post("test.php",{id:id},function(res){

							
							var str="";
							str+="<table border=1>"
							for( var i in res){
								
								str+="<tr>";
								str+="<td>title</td>"	
								str+="<td>"+res[i]['title']+"</td>"	
								str+="</tr>"	
								str+="<tr>";
								str+="<td>content</td>"	
								str+="<td>"+res[i]['content']+"</td>"						
								str+="</tr>"						
							}
							str+="</table>"
							
							$("#result<?php echo $a?>").html(str);
							 console.log(typeof res,res)
						},"json")
					});
				});
					<?php }?>
				<?php for($a=$se;$a<$es;$a++){?>
				$(function(){
					$('#del<?php echo $a ?>').click(function(){
						var de=$("#del<?php echo $a?>").val();
						console.log(de);
						$.post("test.php",{de:de},function(resd){
							console.log(resd);
							$("#dell<?php echo $a?>").html(resd);
							console.log(typeof resd,resd)
						},"json");				
					});
				});
			<?php }?>
		</script>		
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body>
		
		<table width="50%" border="1" align="center">
		
		  <tr>
		    <td colspan="3" align="center">蘋果新聞</td>
	      </tr>
		  <?php
			  if($se!=$es){
				  for($a=$se;$a<$es;$a++){
					 echo"
						  <tr>
							<td>".$time[$a]."</td>
							<td><button id='found$a' value=".$id[$a].">".$title[$a]."</button></td>
							<td><button id='del$a'  value=".$id[$a].">刪除</button></td>
						  </tr>
						  <tr>
						  <td colspan='3'>
						  <div id='result$a'></div></td>
						  <div id='dell$a'></div>";
				  }
				  
			  }
			
		 
		echo
			"<tr>
			  <td colspan='3' align='center'>";		
			  for($a=1;$a<=$c;$a++){
				if($page==$a){
					echo "<a href='#'><font color='red' >$a|</font></a>";
				}else{
					echo "<a href='index.php?page=$a'>$a</a> | ";
				}
			  }
		 ?>
			  </td>
			 </tr>
		</table>

	</body>
</html>