<?php

require_once('functions.php');

date_default_timezone_set('Europe/Moscow');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$link = mysqli_connect('localhost', 'root', '', 'doingsdone');
mysqli_set_charset($link, "utf8");

if (!link) {
    $error = mysqli_connect_error();
    $content = include_template('layout.php', ['content' => 'Ошибка сервера']);
    print($content);
    
} else {
    $sql = 'SELECT * FROM projects WHERE user_id = 1';
    $result = mysqli_query($link, $sql);
        
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('layout.php', ['content' => 'Ошибка сервера']);
    }
    
    $sql = 'SELECT * FROM tasks WHERE user_id = 1';
    $result = mysqli_query($link, $sql);
        
    if ($result) {
        $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($link);
        $content = include_template('layout.php', ['content' => 'Ошибка сервера']);
    }
    
    $p_id = $_GET['project_id'];
    
    if (isset($p_id)) {
        $sql = 'SELECT * FROM tasks WHERE user_id = 1 AND project_id = ' . $p_id;
        $result = mysqli_query($link, $sql);
        
        if ($result) {
            $tasksOnProject = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
           $error = mysqli_error($link);
           $content = include_template('layout.php', ['content' => 'Ошибка сервера']);
        }
        
    } else {
        http_response_code(404);
        $content = include_template('layout.php', ['content' => 'Страница не найдена']);    
    }
}

$page_content = include_template('index.php', [
    'tasksOnProject' => $tasksOnProject,
    'show_complete_tasks' => $show_complete_tasks
    ]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'tasks' => $tasks,
    'title' => 'Дела в порядке'
    ]);

print($layout_content);
?>