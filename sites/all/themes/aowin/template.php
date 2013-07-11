<?php

/**
 * Override of theme_breadcrumb().
 */
function aowin_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];

    if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.
        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

        $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
        return $output;
    }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function aowin_preprocess_maintenance_page(&$vars) {
    // While markup for normal pages is split into page.tpl.php and html.tpl.php,
    // the markup for the maintenance page is all in the single
    // maintenance-page.tpl.php template. So, to have what's done in
    // aowin_preprocess_html() also happen on the maintenance page, it has to be
    // called here.
    aowin_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function aowin_preprocess_html(&$vars) {
    // Toggle fixed or fluid width.
    if (theme_get_setting('aowin_width') == 'fluid') {
        $vars['classes_array'][] = 'fluid-width';
    }
    // Add conditional CSS for IE6.
    drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the html template.
 */
function aowin_process_html(&$vars) {
    // Hook into color.module
    if (module_exists('color')) {
        _color_html_alter($vars);
    }
}

/**
 * Override or insert variables into the page template.
 */
function aowin_preprocess_page(&$vars) {
    // Move secondary tabs into a separate variable.
    $vars['tabs2'] = array(
        '#theme' => 'menu_local_tasks',
        '#secondary' => $vars['tabs']['#secondary'],
    );
    unset($vars['tabs']['#secondary']);

    if (isset($vars['main_menu'])) {
        $vars['primary_nav'] = theme('links__system_main_menu', array(
            'links' => $vars['main_menu'],
            'attributes' => array(
                'class' => array('links', 'inline', 'main-menu'),
            ),
            'heading' => array(
                'text' => t('Main menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            )
        ));
    } else {
        $vars['primary_nav'] = FALSE;
    }
    if (isset($vars['secondary_menu'])) {
        $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
            'links' => $vars['secondary_menu'],
            'attributes' => array(
                'class' => array('links', 'inline', 'secondary-menu'),
            ),
            'heading' => array(
                'text' => t('Secondary menu'),
                'level' => 'h2',
                'class' => array('element-invisible'),
            )
        ));
    } else {
        $vars['secondary_nav'] = FALSE;
    }

    // Prepare header.
    $site_fields = array();
    if (!empty($vars['site_name'])) {
        $site_fields[] = $vars['site_name'];
    }
    if (!empty($vars['site_slogan'])) {
        $site_fields[] = $vars['site_slogan'];
    }
    $vars['site_title'] = implode(' ', $site_fields);
    if (!empty($site_fields)) {
        $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
    }
    $vars['site_html'] = implode(' ', $site_fields);

    // Set a variable for the site name title and logo alt attributes text.
    $slogan_text = $vars['site_slogan'];
    $site_name_text = $vars['site_name'];
    $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;
}

/**
 * Override or insert variables into the node template.
 */
function aowin_preprocess_node(&$vars) {
    $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */
function aowin_preprocess_comment(&$vars) {
    $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function aowin_preprocess_block(&$vars) {
    $vars['title_attributes_array']['class'][] = 'title';
    $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function aowin_process_page(&$vars) {
    // Hook into color.module
    if (module_exists('color')) {
        _color_page_alter($vars);
    }
}

/**
 * Override or insert variables into the region template.
 */
function aowin_preprocess_region(&$vars) {
    if ($vars['region'] == 'header') {
        $vars['classes_array'][] = 'clearfix';
    }
}

/**
 * 自定义登陆页面
 * 
 * 
 * @return array 
 */
function aowin_theme() {
    $items = array();
    // create custom user-login.tpl.php
    $items['user_login'] = array(
        'render element' => 'form',
        'path' => drupal_get_path('theme', 'aowin') . '/templates',
        'template' => 'user-login',
    );
    return $items;
}

/**
 * 自定义用户登陆样式
 * 
 * @param type $form
 * @param type $form_state
 * @param type $form_id 
 */
function aowin_form_alter(&$form, &$form_state, $form_id) {
//    if ($form_id == 'search_block_form') {
//        $search = t('Search');
//        $form['search_block_form']['#title'] = $search; // Change the text on the label element
//        $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
//        $form['search_block_form']['#size'] = 25;  // define size of the textfield
//        $form['search_block_form']['#default_value'] = $search; // Set a default value for the textfield
//        $form['search_block_form']['#attributes'] = array('id' => 'search_input');
//        $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
//        $form['actions']['submit'] = array('#type' => 'image_button', '#attributes' => array('id' => 'search_btn'), '#src' => base_path() . drupal_get_path('theme', 'inatone') . '/images/search_btn.png');
//        // Add extra attributes to the text box
//        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '$search';}";
//        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '$search') {this.value = '';}";
//        // Prevent user from searching the default text
//        $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='$search'){ alert('Please enter a search'); return false; }";
//        // Alternative (HTML5) placeholder attribute instead of using the javascript
//        $form['search_block_form']['#attributes']['placeholder'] = $search;
//    }

    if ($form_id == 'user_login') {
        $form['name']['#attributes'] = array('id' => 'ipt3');
        $form['pass']['#attributes'] = array('id' => 'ipt3');
        $form['actions']['submit']['#attributes'] = array('id' => 'btn4');
    }
}

/**
 * Implements of hook_page_alter().
 * 
 * @param type $page
 */
function aowin_page_alter($page) {
//    $meta_description = array(
//        '#type' => 'html_tag',
//        '#tag' => 'meta',
//        '#attributes' => array(
//            'name' => 'description',
//            'content' => 'abadb'
//        )
//    );
//    drupal_add_html_head($meta_description, 'meta_description');
}