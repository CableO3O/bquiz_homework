<?php include_once "./api/db.php";

if (!isset($_SESSION['login'])) {
	to("index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=admin&redo=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>
<style>
	/* 添加自定義的樣式 */
	.sidebar {
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 250px;
		padding-top: 50px;
		background-color: #333;
		color: #fff;
	}

	.sidebar a {
		padding: 10px;
		display: block;
		color: #fff;
		text-decoration: none;
	}

	.sidebar a:hover {
		background-color: #555;
	}

	.content {
		margin-left: 250px;
		padding: 20px;
	}
</style>

<body>
	<div class="sidebar">
		<a href="?do=title">
			<div>網站標題管理</div>
		</a>
		<a href="?do=ad">
			<div>動態文字廣告管理 </div>
		</a>
		<a href="?do=mvim">
			<div>動畫圖片管理 </div>
		</a>
		<a href="?do=image">
			<div>校園映象資料管理 </div>
		</a>
		<a href="?do=total">
			<div>進站總人數管理 </div>
		</a>
		<a href="?do=bottom">
			<div>頁尾版權資料管理 </div>
		</a>
		<a href="?do=news">
			<div>最新消息資料管理 </div>
		</a>
		<a href="?do=admin">
			<div>管理者帳號管理 </div>
		</a>
		<a href="?do=menu">
			<div>選單管理 </div>
		</a>
	</div>
	<div class="content">
		<table width="100%">
			<tbody>
				<tr>
					<td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
					<td><button onclick="location.href='./api/logout.php'" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
				</tr>
			</tbody>
		</table>

		<?php
		$do = $_GET['do'] ?? 'title';
		$file = "./back/{$do}.php";
		if (file_exists($file)) {
			include $file;
		} else {
			include "./back/title.php";
		}
		?>
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>