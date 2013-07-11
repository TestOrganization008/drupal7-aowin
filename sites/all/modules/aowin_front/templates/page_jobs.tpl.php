<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<div>
    <div class="jobs_info">
        <h2><span><strong>和盈学员就业汇报</strong></span></h2>
        <br>
        <div class="news jobs-list">
            <ul class="ul-jyxx">
                <?php foreach ($jobs as $key => $job): ?>
                    <li class="item-list job-list">
                        <a href="<?php print base_path() . 'jobs/job_list/' . $job->id; ?>"><?php print $job->date . mb_substr($job->name, 0, 1, 'utf-8') . '同学'; ?>就业薪资<?php print $job->salary; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
