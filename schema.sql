CREATE DATABASE doingsdone
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
    
USE doingsdone;

CREATE TABLE projects (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` CHAR(128) NOT NULL,
    `user_id` INT(11) UNSIGNED NOT NULL
);

CREATE TABLE tasks (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `dt_completed` DATETIME,
    `completed_status` INT(11) UNSIGNED,
    `name` CHAR(255) NOT NULL,
    `file_path` CHAR(255),
    `dt_plan_completed` DATETIME,
    `user_id` INT(11) UNSIGNED NOT NULL,
    `project_id` INT(11) UNSIGNED NOT NULL
);

CREATE TABLE users (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `dt_add` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `email` CHAR(128) NOT NULL UNIQUE,
    `name` CHAR(255) NOT NULL,
    `password` CHAR(64)
);

CREATE INDEX p_name ON projects(name);
CREATE INDEX t_name ON tasks(name);
CREATE INDEX t_dt_completed ON tasks(dt_completed);