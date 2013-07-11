<?php
$theme_path = drupal_get_path('theme', 'aowin');
?>

<link rel="stylesheet" type="text/css" href="<?php print base_path() . $theme_path . '/css/login.css'; ?>" />
<div class="login">
    <div class="loginbox">
        <?php
        print drupal_render($form['name']);
        print drupal_render($form['pass']);
        ?>
        <?php
        print drupal_render($form['form_build_id']);
        print drupal_render($form['form_id']);
        print drupal_render($form['actions']);
        ?>
    </div>
</div>
<script type="text/javascript">
</script>