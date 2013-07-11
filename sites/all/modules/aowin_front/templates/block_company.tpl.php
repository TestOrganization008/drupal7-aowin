<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="center-6-1-1">合作企业<a class="show-more" href="<?php print base_path() . 'jobs/companies'; ?>" class="a-more">[更多]</a></div>
<div class="center-6-1-2">
    <div class="center-6-1-2-1">
        <ul>
            <?php foreach ($companies as $key => $company): ?>
                <li class="item-list no-list-style item-company">
                    <span style="background: url('<?php print $company->logo; ?>') no-repeat left center;">
                        <a href="<?php print base_path() . 'jobs/companies/' . $company->nid; ?>"><?php print $company->title; ?></a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>