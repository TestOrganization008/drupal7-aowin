<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div class="content_wrapper">
    <div class="project_info">
        <h1 align="center"><?php print $project->title; ?></h1><br>
        <div class="project_info_div">
            <div id="project_info">
                <?php print $project->project_brief_introduction['und'][0]['value']; ?>
            </div>
        </div>
    </div>
    <div class="project_detail">
        <?php print $project->body['und'][0]['value']; ?>
    </div>
</div>
