	<!-- 照片輪播 -->
	
    <div class="container">

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <h1 style="text-align: center;">校園映像區</h1>
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
<div class="container">
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <div style="height:20vh; border:#0C3 dashed 3px; position:relative;" class="row">
        <div class="col-12">
            <span class="t botli">最新消息區
                <?php
                if ($News->count(['sh' => 1]) > 5) {
                    echo "<a href='?do=news' style='float:right'>More...</a>";
                }
                ?>
            </span>
        </div>
        <div class="col-8">
            <ul class="ssaa" style="list-style-type:decimal;">
                <?php
                $news = $News->all(['sh' => 1], ' limit 5');
                foreach ($news as $n) {
                    echo "<li>";
                    echo mb_substr($n['text'], 0, 20);
                    echo "<div class='all' style='display:none'>";
                    echo $n['text'];
                    echo "</div>";
                    echo "...</li>";
                }

                ?>
            </ul>
            <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
            <script>
                $(".ssaa li").hover(
                    function() {
                        $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                        $("#altt").show()
                    }
                )
                $(".ssaa li").mouseout(
                    function() {
                        $("#altt").hide()
                    }
                )
            </script>
        </div>
        <div class="col-4" style="height:14vh">
            <div id="mwww" loop="true" style="width:100%; height:100%;">
                <div style="width:100%; height:100%; position:relative;" class="cent">沒有資料</div>
            </div>
        </div>
        <script>
            var lin = new Array();
            <?php
            $lins = $Mvim->all(['sh' => 1]);
            foreach ($lins as $lin) {
                echo "lin.push('{$lin['img']}');";
            }
            ?>

            var now = 0;
            ww();
            if (lin.length > 1) {
                setInterval("ww()", 3000);
                now = 1;
            }

            function ww() {
                $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
                //$("#mwww").attr("src",lin[now])
                now++;
                if (now >= lin.length)
                    now = 0;
            }
        </script>
    </div>
</div>