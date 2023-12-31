<?php include_once "./api/db.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
	<style>
		.bg-body-tertiary {
			background-color: #FC3 !important;
			
		}

		body {
			background-color: lightcyan;
		}
	</style>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
		<div class="container">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
					<?php
					$mainmu = $Menu->all(['sh' => 1, 'menu_id' => 0]);
					foreach ($mainmu as $main) {
					?>
						<?php
						if ($Menu->count(['menu_id' => $main['id']]) > 0) {
							echo "<li class='nav-item dropdown'>";
							echo "<a href='{$main['href']}' class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
							echo $main['text'];
							echo "</a>";
							echo "<ul class='dropdown-menu'>";
							$subs = $Menu->all(['menu_id' => $main['id']]);
							foreach ($subs as $sub) {
								echo "<li>";
								echo "<a href='{$sub['href']}' class='dropdown-item'>";
								echo $sub['text'];
								echo "</a></li>";
							}
							echo "</ul></li>";
						} else {
							echo "<li class='nav-item'>";
							echo "<a href='{$main['href']}' class='nav-link active' aria-current='page'>";
							echo $main['text'];
							echo "</a>";
						}
						?>
					<?php
					}
					?>
				</ul>
				<div class="d-flex">
					<?php
					if (isset($_SESSION['login'])) {
					?>
						<button class="btn btn-primary" onclick="lo(&#39;back.php&#39;)">返回管理</button>
					<?php
					} else {
					?>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							登入管理
						</button>

					<?php
					}
					?>

				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<?php
				$title = $Title->find(['sh' => 1]);
				?>
				<a title="<?= $title['text']; ?>" href="index.php">
					<div style=" width:100%;height:15vh; background:url(&#39;./img/<?= $title['img']; ?>&#39;);background-size:100% auto; background-repeat:no-repeat; ">
					</div><!--標題-->
				</a>
			</div>
			<?php include "./front/marquee.php" ?>
		</div>
	</div>

	<?php
	$do = $_GET['do'] ?? 'main';
	$file = "./front/{$do}.php";
	if (file_exists($file)) {
		include $file;
	} else {
		include "./front/main.php";
	}
	?>

	<div style="clear:both;"></div>
	<div style="background:#FC3;margin-top:4px;display:block;" class="container-fluid">
		<div class="row">
			<div class="col-4">
				<span class="t" style="line-height:123px;">進站總人數 :<?= $Total->find(1)['total']; ?></span>
			</div>
			<div class="col-8">
				<span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom']; ?></span>
			</div>
		</div>
	</div>
	<!--login Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">管理員登入區</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="./api/checkacc.php">
					<div class="modal-body">
						<p class="cent">
							<label for="acc">帳號 ：</label>
							<input name="acc" autofocus="" type="text">
						</p>
						<p class="cent">
							<label for="pw">密碼 ：</label>
							<input name="pw" type="password">
						</p>
						<?php
						if (isset($_GET['error'])) {
							echo "<div class=text-center>";
							echo "<span style=color:red;>";
							echo $_GET['error'];
							echo "</span>";
							echo "</div>";
						}

						?>
					</div>
					<div class="modal-footer">
						<input value="送出" type="submit" class="btn btn-primary"   data-bs-dismiss="modal">
						<input type="reset" value="清除" class="btn btn-secondary">

					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>