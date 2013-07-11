<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div>
    <div class="materials_info">
        <h2><span><strong>学习资料</strong></span></h2>
        <br>
        <div class="news materials-list">
            <ul class="ul-jyxx">
                <?php foreach ($materials as $key => $material): ?>
                    <li class="item-list material-list">
                        <a href="<?php print base_path() . 'materials/' . $material->nid; ?>"><?php print $material->title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
