<?php 
	define('Evles', true);
	require 'config.php';
	if (isset($_POST['num'])) {
		$_pagenum = $_POST['num'];
	}else{
		$_pagenum = 1;
	}
	$_pagesize = 5 ;
	$_page_ =($_pagenum - 1) * $_pagesize ;
	$sql_ly ="SELECT * FROM liuyan ORDER BY time DESC LIMIT $_page_,$_pagesize ";
	$result_ly = mysql_query($sql_ly,$con);
	$result_num = mysql_num_rows(mysql_query("SELECT time FROM liuyan"));
	$result_page = ceil($result_num/$_pagesize);
 ?>
<!DOCTYPE html>
<html lang="zh_CN">
<link rel="stylesheet" type="text/css" href="css/message.css">
<head>
	<meta charset="UTF-8">
	<title>document-message</title>
</head>
<body>
	<?php while (@$row_ly = mysql_fetch_array($result_ly)) {
	 ?>
	<div class="message_body">
		
		<div class="head"><?php echo($row_ly['name']);  echo " ".$row_ly['time']; ?></div>
		<div class="content"><?php echo $row_ly['text']; ?></div>

	</div>
	<?php } ?>
	<div id="page">
		<ul>
			<?php for ($i=0; $i < $result_page; $i++) { ?>
			<li><a href="<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
			<?php } ?>
		</ul>
</div>
<div id="message_input">
	<form id="message_form" method="Post">
		<input type="text" name="message">
	</form>
</div>
<script type="text/javascript">
	
</script>
</body>
</html>
