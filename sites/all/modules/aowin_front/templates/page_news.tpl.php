<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div>
    <div class="news_info">
        <h2><span><strong>和盈动态</strong></span></h2>
        <br>
        <div class="news news-list">
            <ul class="ul-jyxx">
                <?php foreach ($news as $key => $new): ?>
                    <li class="item-list new-list">
                        <a href="<?php print base_path() . 'news/' . $new->nid; ?>"><?php print $new->title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
