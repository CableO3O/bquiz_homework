<?php include_once "./api/db.php"; ?>
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
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">管理登入</button>
					<?php
					}
					include "./front/login.php";
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
		</div>
	</div>
	<!-- 照片輪播 -->
	<div class="container">

		<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php
				$imgs = $Image->all(['sh' => 1]);
				foreach ($imgs as $idx => $img) {
					if ($idx === 0) {
				?>
						<div class="carousel-item active" data-bs-interval="3000">
							<img src="./img/<?= $img['img']; ?>" class="d-block" style="width: 100%; height:50vh">
						</div>
					<?php
					} else {
					?>
						<div class="carousel-item" data-bs-interval="3000">
							<img src="./img/<?= $img['img']; ?>" class="d-block" style="width: 100%; height:50vh">
						</div>
				<?php
					}
				}
				?>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
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
	<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
		<span class="t">進站總人數 :<?= $Total->find(1)['total']; ?></span>
	</div>
	<div style="background:#FC3;margin-top:4px;display:block;" class="container-fluid">
		<span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom']; ?></span>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>