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

?>