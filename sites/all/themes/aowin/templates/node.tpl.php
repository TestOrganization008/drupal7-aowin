<div class="content_wrapper">
    <div class="current-position-div">
        当前所在位置：<div class="breadcrumb"><a class="active" href="<?php print $node_url; ?>"><?php print $title; ?></a></div>
    </div>
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

        <?php print render($title_prefix); ?>
        <?php if (!$page): ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>


        <div class="content clearfix"<?php print $content_attributes; ?>>
            <?php
            // We hide the comments and links now so that we can render them later.
            hide($content['comments']);
            hide($content['links']);
            print render($content);
            ?>
        </div>

        <div class="clearfix">
        </div>
    </div>
</div>