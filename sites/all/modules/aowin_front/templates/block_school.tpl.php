<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-6-3-1">合作院校<a class="show-more" href="<?php print base_path() . 'schools'; ?>" class="a-more">[更多]</a></div>
<div class="center-6-3-2">
    <div class="center-6-1-2-1">
        <ul>
            <?php foreach ($schools as $key => $school): ?>
                <li class="item-list no-list-style item-school">
                    <span style="background: url('<?php print $school->logo; ?>') no-repeat left center;">
                        <a href="<?php print base_path() . 'schools/' . $school->nid; ?>"><?php print $school->title; ?></a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>