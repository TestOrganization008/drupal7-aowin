<?php

/*
 * @file
 * Callback functions for menus defined in aowin_front module
 */

/**
 * 前 台系统首页
 * @return type 
 */
function dashboard() {
    $jyxbs = array();
    $kbxxs = array();
    $yss = array();
    $jyzxs = array();
    $news = array();
    $hzqys = array();
    $hzyxs = array();
    $xxzls = array();
    $urls = array();
    $output = theme('dashboard', array('jyxbs' => $jyxbs, 'kbxxs' => $kbxxs, 'yss' => $yss, 'jyzxs' => $jyzxs,
        'news' => $news, 'hzqys' => $hzqys, 'hzyxs' => $hzyxs, 'xxzls' => $xxzls, 'urls' => $urls));
    $meta_title = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'title',
            'content' => '和盈嵌入式培训-杭州嵌入式培训_杭州安卓培训_杭州嵌入式培训学校_嵌入式培训_安卓培训机构_安卓工程师就业培训_安卓编程培训班_浙江安卓开发中心_3G程序员培训基地'
        )
    );
    drupal_add_html_head($meta_title, 'meta_title');
    drupal_set_title('和盈嵌入式培训-杭州嵌入式培训_杭州安卓培训_杭州嵌入式培训学校_嵌入式培训_安卓培训机构_安卓工程师就业培训_安卓编程培训班_浙江安卓开发中心_3G程序员培训基地');
    $meta_description = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'description',
            'content' => '杭州嵌入式培训、嵌入式培训领导品牌,杭州著名IT培训学校,学员已就业思科,阿里,19楼等,专注于嵌入式培训的软件就业培训机构,最精深的嵌入式实训基地、安卓Android开发培训班,浙江大学生首选的IT就业培训中心,资深嵌入式工程师指导,边练边学,掌握最流行的技术,浙江就业最佳机构,其他培训还有:JAVA培训，Oracel培训,数据库培训,安卓培训,Linux培训,DBA培训,OCP培训'
        )
    );
    drupal_add_html_head($meta_description, 'meta_description');
    $meta_keywords = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'keywords',
            'content' => '杭州嵌入式培训机构,浙江嵌入式培训学校,安卓工程师培训,嵌入式培训中心,安卓培训班,android,嵌入式培训,软件开发,计算机培训,编程,软件测试实训,Linux,Oracle培训,就业培训,C++培训,3G培训基地'
        )
    );
    drupal_add_html_head($meta_keywords, 'meta_keywords');
    $meta_author = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'author',
            'content' => '杭州和盈嵌入式培训'
        )
    );
    drupal_add_html_head($meta_author, 'meta_author');
    return $output;
}

/**
 * 选择和盈的理由页面 
 */
function choose_aowin() {
    $output = '';
    $resons = array();
    // 选择理由之优秀师资队伍
    $aowin_teacher_path = drupal_lookup_path('source', 'teacher');
    $aowin_teacher = menu_get_object('node', 1, $aowin_teacher_path);
//    $resons[] = array('path' => l('优秀的师资团队', 'teacher'), 'content' => $aowin_teacher);
    $resons[] = $aowin_teacher;
    // 选择理由之科学课程体系
    $aowin_course_path = drupal_lookup_path('source', 'course');
    $aowin_course = menu_get_object('node', 1, $aowin_course_path);
//    $resons[] = array('path' => l('科学的课程体系', 'course'), 'content' => $aowin_course);
    $resons[] = $aowin_course;
    // 选择理由之强大就业网络
    $aowin_job_path = drupal_lookup_path('source', 'job');
    $aowin_job = menu_get_object('node', 1, $aowin_job_path);
//    $resons[] = array('path' => l('强大的就业网络', 'course'), 'content' => $aowin_job);
    $resons[] = $aowin_job;
    $output = theme('choose_aowin', array('resons' => $resons));
    return $output;
}

/**
 * 显示所有的课程
 * 
 * @return type 
 */
function courses() {
    drupal_set_breadcrumb(array(l('课程体系', 'courses')));
    $output = '';
    $courses = retrieve_courses();
    $rows = array();
    foreach ($courses as $key => $course) {
        $rows[] = array(
            'data' => array(
                $course->title,
                $course->field_goal['und'][0]['value'],
                '<a href="' . base_path() . 'courses/' . $course->nid . '">详细介绍</a>',
            ),
            'class' => array('draggable'),
        );
    }
    //$header = array('课程序号', '课程名称', '课程简介', '操作');
    $header = array();
    $table_id = 'course-items-table';
    $table_class_name = 'items-table';
    $output .= theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $table_id, 'class' => $table_class_name),
            )
    );
    $output .= theme('pager');
    return $output;
}

/**
 * 课程详情页
 * @param type $nid
 * @return string 
 */
function course_view($nid) {
    $breadcrumbs = array(l('课程体系', 'courses'));
    $output = '';
    if (is_numeric($nid)) {
        $course = node_load($nid);
        $output = theme('page_course', array('course' => $course));
        $breadcrumbs[] = l($course->title, 'courses/' . $course->nid);
    } else {
        $output = '<div class="messages error">课程不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 显示所有的班级
 * 
 * @return type 
 */
function classes() {
    drupal_set_breadcrumb(array(l('班级', 'classes')));
    $output = '';
    $classes = retrieve_classes();
    $rows = array();
    foreach ($classes as $key => $class) {
        $rows[] = array(
            'data' => array(
                $key + 1,
                $class->title,
                '<a href="' . (($class->course_id) ? base_path() . 'courses/' . $class->course_id : '#') . '">' . $class->course_name . '</a>',
                date('Y年m月d日', $class->field_class_start['und'][0]['value']),
                $class->field_class_status['und'][0]['value'] == 1 ? '热招中' : '已开课',
                '<a href="' . base_path() . 'classes/' . $class->nid . '">查看详情</a>',
            ),
            'class' => array('draggable'),
        );
    }
    $header = array();
    $table_id = 'class-items-table';
    $table_class_name = 'items-table';
    $output .= theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $table_id, 'class' => $table_class_name),
    ));
    $output .= theme('pager');
    return $output;
}

/**
 * 班级详情页
 * @param type $nid
 * @return string 
 */
function class_view($nid) {
    $breadcrumbs = array(l('培训班级', 'classes'));
    $output = '';
    if (is_numeric($nid)) {
        $class = node_load($nid);
        $breadcrumbs[] = l($class->title, 'classes/' . $class->nid);
        if (!empty($class->field_class_course) && is_numeric($class->field_class_course['und'][0]['nid'])) {
            $course = node_load($class->field_class_course['und'][0]['nid']);
            $class->course_name = $course->title;
            $class->course_id = $class->field_class_course['und'][0]['nid'];
        } else {
            $class->course_name = '';
            $class->course_id = 0;
        }

        $class_start = $class->field_class_start && $class->field_class_start['und'][0]['value'] ? date('Y年m月d日', $class->field_class_start['und'][0]['value']) : '';
        $class_times = $class->field_class_times && $class->field_class_times['und'][0]['value'] ? $class->field_class_times['und'][0]['value'] : '';
        $class_time = $class->field_class_time && $class->field_class_time['und'][0]['value'] ? $class->field_class_time['und'][0]['value'] : '';
        $class_fee = $class->field_class_fee && $class->field_class_fee['und'][0]['value'] ? $class->field_class_fee['und'][0]['value'] : '';
        $class_pay_type = $class->field_class_pay_type && $class->field_class_pay_type['und'][0]['value'] ? $class->field_class_pay_type['und'][0]['value'] : '';
        $class_type = $class->field_class_type && $class->field_class_type['und'][0]['value'] ? $class->field_class_type['und'][0]['value'] : '';
        $class_precondition = $class->field_class_precondition && $class->field_class_precondition['und'][0]['value'] ? $class->field_class_precondition['und'][0]['value'] : '';
        $class_certification = $class->field_class_certification && $class->field_class_certification['und'][0]['value'] ? $class->field_class_certification['und'][0]['value'] : '';
        $class_status = $class->field_class_status && $class->field_class_status['und'][0]['value'] ? $class->field_class_status['und'][0]['value'] : '';
        $class_job = $class->field_class_job && $class->field_class_job['und'][0]['value'] ? $class->field_class_job['und'][0]['value'] : '';
        $class_intro = $class->body['und'][0]['value'];
        $header = array();
        $rows[] = array(
            'data' => array(
                '班级名称',
                $class->title,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '培训课程',
                '<a title="点击查看课程详情" href="' . (($class->course_id) ? base_path() . 'courses/' . $class->course_id : '#') . '">' . $class->course_name . '</a>',
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '开学时间',
                $class_start . '  ' . (($class_status == '1') ? '<span style="color:red;">热招中</span>' : '<span style="color:green">已开课</span>'),
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '学时',
                $class_times,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '学制',
                $class_time,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '学费',
                '￥' . $class_fee,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '付款方式',
                $class_pay_type,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '培训类别',
                $class_type,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '入学条件',
                $class_precondition,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '就业',
                $class_job,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '证书',
                $class_certification,
            ),
            'class' => array('draggable'),
        );
        $rows[] = array(
            'data' => array(
                '班级简介',
                $class_intro,
            ),
            'class' => array('draggable'),
        );
        $table_id = 'class-item-table';
        $table_class_name = 'class-item-table';
        $output = theme('table', array(
            'header' => $header,
            'rows' => $rows,
            'attributes' => array('id' => $table_id, 'class' => $table_class_name),
                )
        );
    } else {
        $output = '<div class="messages error">班级不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 显示所有的就业信息
 * 
 * @return type 
 */
function jobs() {
    drupal_set_breadcrumb(array(l('就业广场', 'jobs'), l('就业汇报', 'jobs/job_list')));
    $output = '';
    $jobs = retrieve_jobs();
    $output = theme('page_jobs', array('jobs' => $jobs));
    $output .= theme('pager');
    return $output;
}

/**
 * 就业详情页
 * @param type $id
 * @return string 
 */
function jobs_view($id) {
    $breadcrumbs = array(l('就业广场', 'jobs'), l('就业汇报', 'jobs/job_list'));
    $output = '';
    if (is_numeric($id)) {
        $results = db_select('job', 'j')->fields('j')->condition('id', $id)->condition('is_delete', 0)->execute();
        foreach ($results as $job) {
            $sid = $job->sid;
            $student = node_load($sid);
            $job->school = !empty($student->field_school) && $student->field_school['und'][0]['value'] ? $student->field_school['und'][0]['value'] : '';
            $job->marjor = !empty($student->field_marjor) && $student->field_marjor['und'][0]['value'] ? $student->field_marjor['und'][0]['value'] : '';
            $job->degree = !empty($student->field_degree) && $student->field_degree['und'][0]['value'] ? $student->field_degree['und'][0]['value'] : '';
            $job->experience = !empty($student->field_experience) && $student->field_experience['und'][0]['value'] ? $student->field_experience['und'][0]['value'] : '';
            $output = theme('page_job', array('job' => $job));
            $breadcrumbs[] = l('学员故事', 'jobs/job_list/' . $job->id);
        }
    } else {
        $output = '<div class="messages error">不存在该同学就业信息或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 显示所有讲师
 * 
 * @return type 
 */
function teachers() {
    drupal_set_breadcrumb(array(l('精英师资', 'teachers')));
    $output = '';
    $teachers = retrieve_teachers();
    $rows = array();
    foreach ($teachers as $key => $teacher) {
        $default_avatar = get_default_avatar('teacher');
        $teacher_avatar_uri = !empty($teacher->field_teacher_avatar) && $teacher->field_teacher_avatar['und'][0]['uri'] ? $teacher->field_teacher_avatar['und'][0]['uri'] : $default_avatar;
        $teacher_avatar_alt = !empty($teacher->field_teacher_avatar) && $teacher->field_teacher_avatar['und'][0]['alt'] ? $teacher->field_teacher_avatar['und'][0]['alt'] : '和盈讲师头像';
        $teacher_avatar = get_avatar($teacher_avatar_uri);
        $teacher_name = !empty($teacher->field_teacher_name) && $teacher->field_teacher_name['und'][0]['value'] ? $teacher->field_teacher_name['und'][0]['value'] : '';
        $teacher_school = !empty($teacher->field_teacher_school) && $teacher->field_teacher_school['und'][0]['value'] ? $teacher->field_teacher_school['und'][0]['value'] : '';
        $teacher_degree = !empty($teacher->field_teacher_degree) && $teacher->field_teacher_degree['und'][0]['value'] ? $teacher->field_teacher_degree['und'][0]['value'] : '';
        $teacher_level = !empty($teacher->field_teacher_level) && $teacher->field_teacher_level['und'][0]['value'] ? $teacher->field_teacher_level['und'][0]['value'] : '';
        $teacher_position = !empty($teacher->field_teacher_position) && $teacher->field_teacher_position['und'][0]['value'] ? $teacher->field_teacher_position['und'][0]['value'] : '';
        $teacher_exp_work = !empty($teacher->field_experience_work) && $teacher->field_experience_work['und'][0]['value'] ? $teacher->field_experience_work['und'][0]['value'] : '';
        $teacher_exp_train = !empty($teacher->field_experience_training) && $teacher->field_experience_training['und'][0]['value'] ? $teacher->field_experience_training['und'][0]['value'] : '';
        $teacher_intro = $teacher_name . '<br>';
        if ($teacher_school) {
            $teacher_intro .= $teacher_school . ' ';
        }
        if ($teacher_degree) {
            $teacher_intro .= $teacher_degree . ' ';
        }
        if ($teacher_level) {
            $teacher_intro .= $teacher_level . ' ';
        }
        $teacher_intro .= '<br>';
        if ($teacher_position) {
            $teacher_intro .= '公司职务：' . $teacher_position . '<br>';
        }
        if ($teacher_exp_work) {
            $teacher_intro .= '开发经验：' . $teacher_exp_work . '<br>';
        }
        if ($teacher_exp_train) {
            $teacher_intro .= '培训经验：' . $teacher_exp_train . '<br>';
        }
        $rows[] = array(
            'data' => array(
                "<div align='center'><img width='100' alt='" . $teacher_avatar_alt . "' src='" . $teacher_avatar . "'></div>",
                $teacher_intro,
                '<a href="' . base_path() . 'teachers/' . $teacher->nid . '">详细介绍</a>',
            ),
            'class' => array('draggable'),
        );
    }
    $header = array();
    $table_id = 'teacher-items-table';
    $table_class_name = 'items-table';
    $output .= theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $table_id, 'class' => $table_class_name),
            )
    );
    $output .= theme('pager');
    return $output;
}

/**
 * 查看讲师详细信息
 * @param type $nid
 * @return string 
 */
function teacher_view($nid) {
    $breadcrumbs = array(l('精英师资', 'teachers'));
    $output = '';
    if (is_numeric($nid)) {
        $teacher = node_load($nid);
        $output = theme('page_teacher', array('teacher' => $teacher));
        $breadcrumbs[] = l('讲师详情', 'teachers/' . $teacher->nid);
    } else {
        $output = '<div class="messages error">讲师不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 所有学习资料
 * @return type 
 */
function materials() {
    drupal_set_breadcrumb(array(l('学习资料', 'materials')));
    $output = '';
    $materials = retrieve_materials();
    $output = theme('page_materials', array('materials' => $materials));
    $output .= theme('pager');
    return $output;
}

/**
 * 查看学习资料内容
 * @param type $nid
 * @return string 
 */
function materials_view($nid) {
    $breadcrumbs = array(l('学习资料', 'materials'));
    $output = '';
    if (is_numeric($nid)) {
        $material = node_load($nid);
        $breadcrumbs[] = l($material->title, 'materials/' . $material->nid);
        $output = theme('page_material', array('material' => $material));
    } else {
        $output = '<div class="messages error">学习资料不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 行业新闻
 * 
 * @return type 
 */
function ind_news() {
    drupal_set_breadcrumb(array(l('首页', 'dashboard'), l('行业动态', 'ind_news')));
    $output = '';
    $news = retrieve_news(array(1));
    $output = theme('page_news', array('news' => $news));
    $output .= theme('pager');
    return $output;
}

/**
 * 所有新闻
 * @return type 
 */
function news() {
    drupal_set_breadcrumb(array(l('首页', 'dashboard'), l('和盈动态', 'news')));
    $output = '';
    $news = retrieve_news($type = array(1, 2, 3), 20);
    $output = theme('page_news', array('news' => $news));
    $output .= theme('pager');
    return $output;
}

/**
 * 查看新闻内容
 * @param type $nid
 * @return string 
 */
function news_view($nid) {
    $breadcrumbs = array(l('首页', 'dashboard'), l('和盈动态', 'news'));
    $output = '';
    if (is_numeric($nid)) {
        $new = node_load($nid);
        $breadcrumbs[] = l($new->title, 'news/' . $new->nid);
        $output = theme('page_new', array('new' => $new));
    } else {
        $output = '<div class="messages error">动态不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 所有合作院校
 * @return type 
 */
function schools() {
    drupal_set_breadcrumb(array(l('首页', 'dashboard'), l('合作院校', 'schools')));
    $output = '';
    $schools = retrieve_schools(3);
    $rows = array();
    foreach ($schools as $key => $school) {
        $rows[] = array(
            'data' => array(
                "<div align='center'><img width='100' alt='" . $school->field_school_logo['und'][0]['alt'] . "' src='" . $school->logo . "'></div>",
                $school->title,
                '<a href="' . base_path() . 'schools/' . $school->nid . '">详细介绍</a>',
            ),
            'class' => array('draggable'),
        );
    }
    $header = array();
    $table_id = 'school-items-table';
    $table_class_name = 'items-table';
    $output .= theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $table_id, 'class' => $table_class_name),
            )
    );
    $output .= theme('pager');
    return $output;
}

/**
 * 查看合作院校
 * @param type $nid
 * @return string 
 */
function schools_view($nid) {
    $drupal_public_directory = variable_get('file_public_path', conf_path() . '/files');
    $breadcrumbs = array(l('首页', 'dashboard'), l('合作院校', 'schools'));
    $output = '';
    if (is_numeric($nid)) {
        $school = node_load($nid);
        $school_logo_path = str_replace('public://', base_path() . $drupal_public_directory . '/styles/thumbnail/public/', $school->field_school_logo['und'][0]['uri']);
        $school->logo = $school_logo_path;
        $output = theme('page_school', array('school' => $school));
        $breadcrumbs[] = l($school->title, 'schools/' . $school->nid);
    } else {
        $output = '<div class="messages error">院校不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 所有合作企业
 * @return type 
 */
function companies() {
    drupal_set_breadcrumb(array(l('就业广场', 'jobs'), l('合作企业', 'jobs/companies')));
    $output = '';
    $companies = retrieve_companies(3);
    $rows = array();
    foreach ($companies as $key => $company) {
        $rows[] = array(
            'data' => array(
                "<div align='center'><img width='100' alt='" . $company->field_company_logo['und'][0]['alt'] . "' src='" . $company->logo . "'></div>",
                $company->title,
                '<a href="' . base_path() . 'jobs/companies/' . $company->nid . '">详细介绍</a>',
            ),
            'class' => array('draggable'),
        );
    }
    $header = array();
    $table_id = 'company-items-table';
    $table_class_name = 'items-table';
    $output .= theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $table_id, 'class' => $table_class_name),
            )
    );
    $output .= theme('pager');
    return $output;
}

/**
 * 查看合作企业内容
 * @param type $nid
 * @return string 
 */
function companies_view($nid) {
    $drupal_public_directory = variable_get('file_public_path', conf_path() . '/files');
    $breadcrumbs = array(l('就业广场', 'jobs'), l('合作企业', 'jobs/companies'));
    $output = '';
    if (is_numeric($nid)) {
        $company = node_load($nid);
        $compnay_logo_path = str_replace('public://', base_path() . $drupal_public_directory . '/styles/thumbnail/public/', $company->field_company_logo['und'][0]['uri']);
        $company->logo = $compnay_logo_path;
        $breadcrumbs[] = l($company->title, 'companies/' . $company->nid);
        $output = theme('page_company', array('company' => $company));
    } else {
        $output = '<div class="messages error">动态不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}

/**
 * 所有实训项目
 * @return type 
 */
function projects() {
    drupal_set_breadcrumb(array(l('首页', 'dashboard'), l('实训项目', 'projects')));
    $output = '';
    $projects = retrieve_projects(5);
    $rows = array();
    foreach ($projects as $key => $project) {
        $rows[] = array(
            'data' => array(
                $project->title,
                $project->project_brief_introduction['und'][0]['value'],
                '<a href="' . base_path() . 'projects/' . $project->nid . '">详细介绍</a>',
            ),
            'class' => array('draggable'),
        );
    }
    $header = array();
    $table_id = 'project-items-table';
    $table_class_name = 'items-table';
    $output .= theme('table', array(
        'header' => $header,
        'rows' => $rows,
        'attributes' => array('id' => $table_id, 'class' => $table_class_name),
            )
    );
    $output .= theme('pager');
    return $output;
}

/**
 * 查看项目内容
 * @param type $nid
 * @return string 
 */
function projects_view($nid) {
    $breadcrumbs = array(l('首页', 'dashboard'), l('实训项目', 'projects'));
    $output = '';
    if (is_numeric($nid)) {
        $project = node_load($nid);
        $breadcrumbs[] = l($project->title, 'projects/' . $project->nid);
        $output = theme('page_project', array('project' => $project));
    } else {
        $output = '<div class="messages error">实训项目不存在或者已经被删除</div>';
    }
    drupal_set_breadcrumb($breadcrumbs);
    return $output;
}