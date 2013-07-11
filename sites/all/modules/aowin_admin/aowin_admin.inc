<?php

/*
 * @file
 * Callback functions for menus defined in aowin module
 */

/**
 * 后台系统首页
 * @return type 
 */
function backend_dashboard() {
    global $user;
    drupal_set_breadcrumb(array(l(t('首页'), 'manage')));
    if ($user->uid) {
        if (user_access('manage system')) {
            $site_info = '企业信息管理系统';
            $ouput = theme('manage', array('site_info' => $site_info));
            return $ouput;
        } else {
            drupal_access_denied();
        }
    } else {
        drupal_goto('login');
    }
}

/**
 * 学员管理 
 */
function manage_student() {
    drupal_set_breadcrumb(array(l(t('学员管理'), 'manage/student')));
    $output = '';
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'student');
    if ($name) {
        $query->join('field_data_field_name', 'fn', 'n.nid=fn.entity_id');
        $query->condition('fn.field_name_value', "%$name%", "LIKE");
    }
    $results = $query->orderBy('created', 'DESC')->execute();
    $students = array();
    foreach ($results as $node) {
        $students[] = node_load($node->nid);
    }

    $output = theme('manage_student', array('students' => $students));
    return $output;
}

/**
 * 查看学员信息
 * @param type $nid
 * @return type 
 */
function student_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('学员管理'), 'manage/student')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/student">返回学员列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑学员信息
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function student_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('学员管理'), 'manage/student')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/student">返回学员列表</a></div>';
    $student = node_load($nid);
    $student_form = drupal_get_form('node_form', $student);
    $output .= drupal_render($student_form);
    return $output;
}

/**
 * 讲师管理 
 */
function manage_teacher() {
    drupal_set_breadcrumb(array(l(t('讲师管理'), 'manage/teacher')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'teacher');
    $results = $query->orderBy('created', 'DESC')->execute();
    $teachers = array();
    foreach ($results as $node) {
        $teachers[] = node_load($node->nid);
    }
    $output = theme('manage_teacher', array('teachers' => $teachers));
    return $output;
}

/**
 * 查看讲师信息
 * @param type $nid
 * @return type 
 */
function teacher_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('讲师管理'), 'manage/teacher')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/teacher">返回讲师列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑讲师信息
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function teacher_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('讲师管理'), 'manage/teacher')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/teacher">返回讲师列表</a></div>';
    $teacher = node_load($nid);
    $teacher_form = drupal_get_form('node_form', $teacher);
    $output .= drupal_render($teacher_form);
    return $output;
}

/**
 * 删除讲师
 * @param type $nid 
 */
function teacher_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 课程管理 
 */
function manage_course() {
    drupal_set_breadcrumb(array(l(t('课程管理'), 'manage/course')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'course');
    $results = $query->orderBy('created', 'DESC')->execute();
    $courses = array();
    foreach ($results as $node) {
        $courses[] = node_load($node->nid);
    }
    $output = theme('manage_course', array('courses' => $courses));
    return $output;
}

/**
 * 查看课程信息
 * @param type $nid
 * @return type 
 */
function course_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('课程管理'), 'manage/course')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/course">返回课程列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑课程信息
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function course_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('课程管理'), 'manage/course')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/course">返回课程列表</a></div>';
    $course = node_load($nid);
    $course_form = drupal_get_form('node_form', $course);
    $output .= drupal_render($course_form);
    return $output;
}

/**
 * 删除课程信息
 * @param type $nid 
 */
function course_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 班级管理 
 */
function manage_class() {
    drupal_set_breadcrumb(array(l(t('班级管理'), 'manage/class')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'class');
    $results = $query->orderBy('created', 'DESC')->execute();
    $train_classes = array();
    foreach ($results as $node) {
        $class = node_load($node->nid);
        if (!empty($class->field_class_course) && is_numeric($class->field_class_course['und'][0]['nid'])) {
            $course = node_load($class->field_class_course['und'][0]['nid']);
            $class->course_name = $course->title;
        } else {
            $class->course_name = '';
        }
        $train_classes[] = $class;
    }
    $output = theme('manage_class', array('train_classes' => $train_classes));
    return $output;
}

/**
 * 查看班级信息
 * @param type $nid
 * @return type 
 */
function class_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('班级管理'), 'manage/class')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/class">返回班级列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑班级信息
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function class_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('班级管理'), 'manage/class')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/class">返回班级列表</a></div>';
    $class = node_load($nid);
    $class_form = drupal_get_form('node_form', $class);
    $output .= drupal_render($class_form);
    return $output;
}

/**
 * 删除班级信息
 * @param type $nid 
 */
function class_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 学员就业管理  
 */
function manage_job() {
    drupal_add_library('system', 'ui.datepicker');
    drupal_set_breadcrumb(array(l(t('学员就业管理'), 'manage/job')));
    $output = '';
    $student_name = isset($_GET['student_name']) ? $_GET['student_name'] : '';
    $query = db_select('job', 'j')->extend('PagerDefault');
    $query->fields('j')->condition('is_delete', 0);
    if ($student_name) {
        $query->condition('name', "%$student_name%", "LIKE");
    }
    $results = $query->orderBy('id', 'DESC')->execute();
    $job_records = array();
    foreach ($results as $job_record) {
        $job_records[] = $job_record;
    }
    $query = db_select('node', 'n');
    $query->fields('n', array('nid'))->condition('type', 'student');
    $results = $query->orderBy('created', 'DESC')->execute();
    $students = array();
    foreach ($results as $node) {
        $student = node_load($node->nid);
        if ($student->field_has_job && $student->field_has_job['und'][0]['value']) {
            //过滤掉已就业学员
            continue;
        }
        $class_name = '';
        if (!empty($student->field_class) && is_numeric($student->field_class['und'][0]['nid'])) {
            $class = node_load($student->field_class['und'][0]['nid']);
            $class_name = $class->title;
        } else {
            $class_name = '';
        }
        $student->name = $student->field_name['und'][0]['value'];
        $student->class_name = $class_name;
        $students[] = $student;
    }
    $output = theme('manage_job', array('students' => $students, 'jobs' => $job_records));
    return $output;
}

/**
 * 新增更新学员就业信息
 */
function new_job_save() {
    $result = array('success' => 0, 'msg' => '');
    $id = $_POST['id'];
    $sid = $_POST['sid'] ? $_POST['sid'] : 0;
    $name = $_POST['name'] ? $_POST['name'] : '';
    $class_name = $_POST['class_name'] ? $_POST['class_name'] : '';
    $company = $_POST['company'] ? $_POST['company'] : '';
    $date = $_POST['date'] ? $_POST['date'] : date('Y-m-d', time());
    $salary = $_POST['salary'] ? $_POST['salary'] : '';
    $is_index = $_POST['is_index'] ? $_POST['is_index'] : 0;
    $job = array();
    if ($sid && $company) {
        $job['sid'] = $sid;
        $job['name'] = $name;
        $job['class_name'] = $class_name;
        $job['company'] = $company;
        $job['date'] = $date;
        $job['salary'] = $salary;
        $job['is_index'] = $is_index;
        $student = node_load($sid);
        if (!empty($student->field_avatar)) {
            $job['picture'] = get_avatar($student->field_avatar['und'][0]['uri']);
        } else {
            $job['picture'] = '';
        }
        if (!empty($student->body)) {
            $job['feeling'] = $student->body['und'][0]['value'];
        } else {
            $job['feeling'] = '';
        }
        if ($id) {
            // 更新
            if (db_update('job')->fields($job)->condition('id', $id)->execute()) {
                $result['success'] = 1;
                $result['msg'] = t('%student的就业信息已保存', array('%student' => $name));
            } else {
                $result['success'] = 2;
                $result['msg'] = t('%student的就业信息没有改变', array('%student' => $name));
            }
        } else {
            $id = db_insert('job')->fields(array_keys($job), array_values($job))->execute();
            if ($id) {
                $student->field_has_job['und'][0]['value'] = 1;
                // 更新该学员状态为已就业
                node_save($student);
                $result['success'] = 1;
                $result['msg'] = t('%student的就业信息已保存', array('%student' => $name));
            }
        }
    } else {
        $result['msg'] = '学员不存在或者就业单位填写错误';
    }
    echo drupal_json_encode($result);
}

/**
 * 删除学员就业信息
 * @param type $id 
 */
function job_delete($id) {
    $num = db_update('job')->fields(array('is_delete' => 1))->condition('id', $id)->execute();
    $result = array('success' => 0, 'msg' => '');
    if ($num) {
        $results = db_select('job', 'j')->fields('j', array('sid'))->condition('id', $id)->execute();
        foreach ($results as $value) {
            $sid = $value->sid;
            $student = node_load($sid);
            $student->field_has_job['und'][0]['value'] = 0;
            // 更新该学员状态为未就业
            node_save($student);
            break;
        }
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 合作企业管理 
 */
function manage_company() {
    drupal_set_breadcrumb(array(l(t('合作企业管理'), 'manage/company')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'company');
    $results = $query->orderBy('created', 'DESC')->execute();
    $companies = array();
    foreach ($results as $node) {
        $company = node_load($node->nid);
        $companies[] = $company;
    }
    // 按照序号进行排序，序号越大，排名越靠前
    usort($companies, 'sort_by_sort_number');
    $output = theme('manage_company', array('companies' => $companies));
    return $output;
}

/**
 * 查看合作企业信息
 * @param type $nid
 * @return type 
 */
function company_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('合作企业管理'), 'manage/company')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/company">返回合作院校列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑合作企业信息
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function company_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('合作企业管理'), 'manage/company')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/company">返回合作企业列表</a></div>';
    $company = node_load($nid);
    $company_form = drupal_get_form('node_form', $company);
    $output .= drupal_render($company_form);
    return $output;
}

/**
 * 删除合作企业信息
 * @param type $nid 
 */
function company_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 合作院校管理 
 */
function manage_school() {
    drupal_set_breadcrumb(array(l(t('合作学校管理'), 'manage/school')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'school');
    $results = $query->orderBy('created', 'DESC')->execute();
    $schools = array();
    foreach ($results as $node) {
        $school = node_load($node->nid);
        $schools[] = $school;
    }
    // 按照序号进行排序，序号越大，排名越靠前
    usort($schools, 'sort_by_sort_number');
    $output = theme('manage_school', array('schools' => $schools));
    return $output;
}

/**
 * 查看合作院校信息
 * @param type $nid
 * @return type 
 */
function school_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('合作院校管理'), 'manage/school')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/school">返回合作院校列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑合作院校信息
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function school_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('合作院校管理'), 'manage/school')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/school">返回合作院校列表</a></div>';
    $school = node_load($nid);
    $school_form = drupal_get_form('node_form', $school);
    $output .= drupal_render($school_form);
    return $output;
}

/**
 * 删除合作院校信息
 * @param type $nid 
 */
function school_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 学习资料管理 
 */
function manage_material() {
    drupal_set_breadcrumb(array(l(t('资料管理'), 'manage/material')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'material');
    $results = $query->orderBy('created', 'DESC')->execute();
    $materials = array();
    foreach ($results as $node) {
        $material = node_load($node->nid);
        $materials[] = $material;
    }
    // 按照序号进行排序，序号越大，排名越靠前
    usort($materials, 'sort_by_sort_number');
    $output = theme('manage_material', array('materials' => $materials));
    return $output;
}

/**
 * 查看学习资料
 * @param type $nid
 * @return type 
 */
function material_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('学习资料管理'), 'manage/material')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/material">返回学习资料列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑学习资料
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function material_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('学习资料管理'), 'manage/material')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/material">返回学习资料列表</a></div>';
    $material = node_load($nid);
    $material_form = drupal_get_form('node_form', $material);
    $output .= drupal_render($material_form);
    return $output;
}

/**
 * 删除一条学习资料
 * @param type $nid 
 */
function material_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 优势管理 
 */
function manage_advantage() {
    drupal_set_breadcrumb(array(l(t('优势管理'), 'manage/advantage')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'advantage');
    $results = $query->orderBy('created', 'DESC')->execute();
    $advantages = array();
    foreach ($results as $node) {
        $advantage = node_load($node->nid);
        $advantages[] = $advantage;
    }
    // 按照序号进行排序，序号越大，排名越靠前
    usort($advantages, 'sort_by_sort_number');
    $output = theme('manage_advantage', array('advantages' => $advantages));
    return $output;
}

/**
 * 查看优势信息
 * @param type $nid
 * @return type 
 */
function advantage_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('优势管理'), 'manage/advantage')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/advantage">返回优势列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑优势条目
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function advantage_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('优势管理'), 'manage/advantage')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/advantage">返回优势列表</a></div>';
    $advantage = node_load($nid);
    $advantage_form = drupal_get_form('node_form', $advantage);
    $output .= drupal_render($advantage_form);
    return $output;
}

/**
 * 删除优势条目
 * @param type $nid 
 */
function advantage_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 新闻管理 
 */
function manage_news() {
    drupal_set_breadcrumb(array(l(t('新闻管理'), 'manage/news')));
    $title = isset($_GET['title']) ? $_GET['title'] : '';
    $news_type = isset($_GET['news_type']) ? $_GET['news_type'] : '';
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault')->limit(15);
    if ($title) {
        $query->condition('title', "%$title%", 'LIKE');
    }
    if ($news_type) {
        $query->join('field_data_field_news_type', 'nt', 'n.nid=nt.entity_id');
        $query->condition('nt.field_news_type_tid', $news_type);
    }
    $query->fields('n', array('nid'))->condition('type', 'news');
    $results = $query->orderBy('created', 'DESC')->execute();
    $news = array();
    foreach ($results as $node) {
        $new = node_load($node->nid);
        $news[] = $new;
    }
    // 按照序号进行排序，序号越大，排名越靠前
    usort($news, 'sort_by_sort_number');
    $output = theme('manage_news', array('news' => $news));
    return $output;
}

/**
 * 查看新闻
 * @param type $nid
 * @return type 
 */
function news_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('新闻管理'), 'manage/news')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/news">返回新闻列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑新闻
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function news_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('新闻管理'), 'manage/news')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/news">返回新闻列表</a></div>';
    $news = node_load($nid);
    $news_form = drupal_get_form('node_form', $news);
    $output .= drupal_render($news_form);
    return $output;
}

/**
 * 删除一条新闻
 * @param type $nid 
 */
function news_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 项目管理 
 */
function manage_projcet() {
    drupal_set_breadcrumb(array(l(t('项目管理'), 'manage/project')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'project');
    $results = $query->orderBy('created', 'DESC')->execute();
    $projects = array();
    foreach ($results as $node) {
        $project = node_load($node->nid);
        $projects[] = $project;
    }
    $output = theme('manage_project', array('projects' => $projects));
    return $output;
}

/**
 * 查看实训项目
 * @param type $nid
 * @return type 
 */
function project_view($nid) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('项目管理'), 'manage/project')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/project">返回项目列表</a></div>';
    if (is_numeric($nid)) {
        $data = node_page_view(node_load($nid));
        $output .= drupal_render($data);
    }
    return $output;
}

/**
 * 编辑实训项目
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function project_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('项目管理'), 'manage/project')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/project">返回项目列表</a></div>';
    $project = node_load($nid);
    $project_form = drupal_get_form('node_form', $project);
    $output .= drupal_render($project_form);
    return $output;
}

/**
 * 删除实训项目
 * @param type $nid 
 */
function project_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 友情链接管理 
 */
function manage_buddy_link() {
    drupal_set_breadcrumb(array(l(t('友情链接'), 'manage/buddy_link')));
    $output = '';
    $query = db_select('node', 'n')->extend('PagerDefault');
    $query->fields('n', array('nid'))->condition('type', 'buddy_link');
    $results = $query->orderBy('created', 'DESC')->execute();
    $buddy_links = array();
    foreach ($results as $node) {
        $buddy_link = node_load($node->nid);
        $buddy_links[] = $buddy_link;
    }
    // 按照序号进行排序，序号越大，排名越靠前
    usort($buddy_links, 'sort_by_sort_number');
    $output = theme('manage_buddy_link', array('buddy_links' => $buddy_links));
    return $output;
}

/**
 * 编辑友情链接
 * @global type $base_path
 * @param type $nid
 * @return type 
 */
function buddy_link_edit($nid) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('友情链接'), 'manage/buddy_link')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/buddy_link">返回友情链接列表</a></div>';
    $buddy_link = node_load($nid);
    $buddy_link_form = drupal_get_form('node_form', $buddy_link);
    $output .= drupal_render($buddy_link_form);
    return $output;
}

/**
 * 删除友情链接
 * @param type $nid 
 */
function buddy_link_delete($nid) {
    $result = array('success' => 0, 'msg' => '');
    if (is_numeric($nid)) {
        node_delete($nid);
        $result['success'] = 1;
        $result['msg'] = '删除成功';
    } else {
        $result['msg'] = '删除失败，请稍后再试，或者联系你的管理员';
    }
    drupal_json_output($result);
}

/**
 * 管理前台页面
 * 
 * @return string 
 */
function manage_front_page() {
    drupal_set_breadcrumb(array(l(t('前台页面管理'), 'manage/front_page')));
    $output = '';
    $front_pages = array();
    $front_pages[] = array('path' => 'about', 'title' => '选择和盈');
    $front_pages[] = array('path' => 'certification', 'title' => '权威认证');
    $front_pages[] = array('path' => 'contact', 'title' => '联系我们');
    $front_pages[] = array('path' => 'service', 'title' => '企业服务');
    $front_pages[] = array('path' => 'law_states', 'title' => '法律声明');
    $front_pages[] = array('path' => 'privacy_states', 'title' => '隐私保护');
    $output .= theme('manage_front_page', array('front_pages' => $front_pages));
    return $output;
}

/**
 * 查看前台页面
 * @param type $path
 * @return type 
 */
function front_page_view($path) {
    global $base_path;
    drupal_set_breadcrumb(array(l(t('前台页面管理'), 'manage/front_page')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/front_page">返回前台页面列表</a></div>';
    $front_page_path = drupal_lookup_path('source', $path);
    $front_page = menu_get_object('node', 1, $front_page_path);
    $output .= drupal_render(node_page_view($front_page));
    return $output;
}

/**
 * 编辑前台页面
 * @global type $base_path
 * @param type $path
 * @return type 
 */
function front_page_edit($path) {
    module_load_include('inc', 'node', 'node.pages');
    global $base_path;
    drupal_set_breadcrumb(array(l(t('前台页面管理'), 'manage/front_page')));
    $output = '<div class="back-control"><a href="' . $base_path . 'manage/front_page">返回前台页面列表</a></div>';
    $front_page_path = drupal_lookup_path('source', $path);
    $front_page = menu_get_object('node', 1, $front_page_path);
    $front_page_form = drupal_get_form('node_form', $front_page);
    $output .= drupal_render($front_page_form);
    return $output;
}