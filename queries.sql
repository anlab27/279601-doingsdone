-- Добавление пользователей

INSERT INTO users SET email = 'anlab@mail.ru', name = 'Анастасия', password = 'xcdfrt56';
INSERT INTO users SET email = 'evgeniy2@mail.ru', name = 'Евгений', password = 'bnhjui89';
INSERT INTO users SET email = 'olga3@mail.ru', name = 'Ольга', password = 'cvdfer34';

-- Добавление списка проектов

INSERT INTO projects SET name = 'Входящие', user_id = 1;
INSERT INTO projects SET name = 'Учеба', user_id = 1;
INSERT INTO projects SET name = 'Работа', user_id = 1;
INSERT INTO projects SET name = 'Домашние дела', user_id = 1;
INSERT INTO projects SET name = 'Авто', user_id = 1;

-- Добавление список задач

INSERT INTO tasks SET completed_status = 0, name = 'Собеседование в IT компании', deadline = '02.12.2018', user_id = 1, project_id = 3;
INSERT INTO tasks SET completed_status = 0, name = 'Выполнить тестовое задание', deadline = '25.12.2018', user_id = 1, project_id = 3;
INSERT INTO tasks SET completed_status = 1, name = 'Сделать задание первого раздела', deadline = '21.12.2018', user_id = 1, project_id = 2;
INSERT INTO tasks SET completed_status = 0, name = 'Встреча с другом', deadline = '22.12.2018', user_id = 1, project_id = 1;
INSERT INTO tasks SET completed_status = 0, name = 'Купить корм для кота', user_id = 1, project_id = 4;
INSERT INTO tasks SET completed_status = 0, name = 'Заказать пиццу', user_id = 1, project_id = 4;

-- Получить список из всех проектов для одного пользователя

SELECT * FROM projects WHERE user_id = 1;

-- Получить список из всех задач для одного проекта

SELECT * FROM tasks WHERE project_id = 3;

-- Пометить задачу как выполненную

UPDATE tasks SET completed_status = 1, complated_at = CURDATE() WHERE id = 4;

-- Получить все задачи для завтрашнего дня

SELECT * FROM tasks WHERE deadline = DATE_ADD(CURDATE(), INTERVAL 1 DAY);

-- Обновить название задачи по её идентификатору

UPDATE tasks SET name = 'Купить обратный билет на Ласточку' WHERE id = 5;
