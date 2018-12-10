<?php
declare(strict_types=1);

function include_template(string $name, array $data) : string {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function count_tasks(array $list_tasks, string $project) : int {
    $i = 0;
    
    foreach ($list_tasks as $value) {
        if (isset($value['project_id']) && $value['project_id'] === $project) {
            $i++;
        }
    }
    
    return $i;
}

function isLessThanDay(string $dateOfCompletion) : bool {
    if (($dateOfCompletion !== '') && ((strtotime($dateOfCompletion) + 86400 - time()) < 86400)) {
        return true;
    }
        return false;
}


function getProjects() {
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
    }
    
    mysqli_close($link);
}


function getTasks() {
    $link = mysqli_connect('localhost', 'root', '', 'doingsdone');
    mysqli_set_charset($link, "utf8");
    
    if (!link) {
        $error = mysqli_connect_error();
        $content = include_template('layout.php', ['content' => 'Ошибка сервера']);
        print($content);
    
    } else {
        $sql = 'SELECT * FROM tasks WHERE user_id = 1';
        $result = mysqli_query($link, $sql);
        
        if ($result) {
            $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            $error = mysqli_error($link);
            $content = include_template('layout.php', ['content' => 'Ошибка сервера']);
        }
    }
    mysqli_close($link);
}


?>