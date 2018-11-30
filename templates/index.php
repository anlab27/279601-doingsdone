<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.php" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
        <a href="/" class="tasks-switch__item">Повестка дня</a>
        <a href="/" class="tasks-switch__item">Завтра</a>
        <a href="/" class="tasks-switch__item">Просроченные</a>
    </nav>

    <label class="checkbox">
        <input class="checkbox__input visually-hidden show_completed" <?php if ($show_complete_tasks === 1) { print('checked'); } ?> type="checkbox">
        <span class="checkbox__text">Показывать выполненные</span>
    </label>
</div>

<table class="tasks">
    <?php foreach ($tasks as $key => $value): ?>
        <?php if (isset($value['isCompleted']) && ($value['isCompleted'] === false || ($value['isCompleted'] === true && $show_complete_tasks === 1))): ?>
            <tr class="tasks__item task <?php if (isset($value['isCompleted']) && ($value['isCompleted'] === true)) { print('task--completed'); } if (isset($value['dateOfCompletion']) && ($value['dateOfCompletion'] !== '') && ((strtotime('midnight' . $value['dateOfCompletion']) - time()) < 86400)) { print('task--important'); } ?>">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1" <?php if (isset($value['isCompleted']) && ($value['isCompleted'] === 1)) { print('checked'); } ?>>
                        <span class="checkbox__text"><?php if (isset($value['name'])) { print(strip_tags($value['name'])); } ?></span>
                    </label>
                </td>
                        
                <td class="task__file"></td>

                <td class="task__date"><?php if (isset($value['dateOfCompletion'])) { print(strip_tags($value['dateOfCompletion'])); } ?></td>
            </tr>
        <?php endif ?>
    <?php endforeach ?>
 </table>