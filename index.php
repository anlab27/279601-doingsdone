<?php

require_once('functions.php');

date_default_timezone_set('Europe/Moscow');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$category = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [['name' => 'Собеседование в IT компании', 'dateOfCompletion' => '01.12.2018', 'category' => 'Работа', 'isCompleted' => false], ['name' => 'Выполнить тестовое задание', 'dateOfCompletion' => '25.12.2018', 'category' => 'Работа', 'isCompleted' => false], ['name' => 'Сделать задание первого раздела', 'dateOfCompletion' => '21.12.2018', 'category' => 'Учеба', 'isCompleted' => true], ['name' => 'Встреча с другом', 'dateOfCompletion' => '22.12.2018', 'category' => 'Входящие', 'isCompleted' => false], ['name' => 'Купить корм для кота', 'dateOfCompletion' => '', 'category' => 'Домашние дела', 'isCompleted' => false], ['name' => 'Заказать пиццу', 'dateOfCompletion' => '', 'category' => 'Домашние дела', 'isCompleted' => false]];

$page_content = include_template('index.php', [
    'tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks
    ]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'category' => $category,
    'tasks' => $tasks,
    'title' => 'Дела в порядке'
    ]);

print($layout_content);
?>