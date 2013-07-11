<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="content_wrapper">
    <br>
    <div class="company-basic-info">
        <br>
        <div class="company-avatar">
            <img width="100" alt="<?php print $company->filed_company_logo['und'][0]['alt']; ?>" src="<?php print $company->logo; ?>">
        </div>
        <div class="company-info">
            <strong><?php print $company->title; ?></strong><br>
            <?php print $company->field_company_brief_introduction['und'][0]['value']; ?>
        </div>
    </div>
    <div class="company-introdution">
        <br>
        <h3><strong>详细介绍：</strong></h3>
        <br>
        <?php print $company->body['und'][0]['value']; ?>
    </div>
</div>
