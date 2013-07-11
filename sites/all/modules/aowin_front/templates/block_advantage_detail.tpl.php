<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-2">
    <?php
    foreach ($yss as $ys) {
        ?>
        <div class="center-2-1">
            <div class="center-2-1-1">
                <?= $ys['title'] ?>
            </div>
            <div class="center-2-1-2">
                <div class="center-2-1-2-1">
                    <p><?= $ys['content'] ?></p>
                </div>
            </div>
            <div class="center-2-1-3"><img src="image/advg_pic/<?= $ys['picture'] ?>"></div>
        </div>
        <?php
    }
    ?>
</div>