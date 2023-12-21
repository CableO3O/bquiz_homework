<div class="container">

    <marquee style="width:100%; height:40px; font-size:25px;">
        <?php
    $ads=$Ad->all(['sh'=>1]);
    foreach ($ads as $ad) {
        echo $ad['text'];
        echo '&nbsp;&nbsp;/&nbsp;&nbsp;';
    }
    ?>
</marquee>
</div>