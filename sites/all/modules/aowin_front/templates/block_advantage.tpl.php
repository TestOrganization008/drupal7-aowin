<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-5-3-1">和盈优势<a class="show-more" href="<?php print base_path() . 'about'; ?>" class="a-more">[更多]</a></div>
<div class="center-5-3-2">
    <ul>
        <?php foreach ($advantages as $key => $advantage): ?>
            <li class="item-list no-list-style item-company">
                <span style="background: url('<?php print $advantage->logo; ?>') no-repeat left center;">
                    <?php print $advantage->title; ?></a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>