create table `#__empl_functions`
(
    id int unsigned auto_increment,
    title varchar(255) not null comment 'Название функционала',
    constraint `#__empl_functions_pk`
        primary key (id)
) character set utf8 collate utf8_general_ci
    comment 'Позиции сотрудника';

create index `#__empl_functions_title_index`
    on `#__empl_functions` (title);

INSERT INTO `#__empl_functions` (id, title) VALUES (1, 'Автобусная остановка');
INSERT INTO `#__empl_functions` (id, title) VALUES (3, 'Внутренний поток (навигация)');
INSERT INTO `#__empl_functions` (id, title) VALUES (2, 'Выдача гольф-каров');
INSERT INTO `#__empl_functions` (id, title) VALUES (4, 'Дирекция');
INSERT INTO `#__empl_functions` (id, title) VALUES (5, 'Инфостойка');
INSERT INTO `#__empl_functions` (id, title) VALUES (6, 'Контроль застройки');
INSERT INTO `#__empl_functions` (id, title) VALUES (7, 'КПП');
INSERT INTO `#__empl_functions` (id, title) VALUES (8, 'Мобильная бригада');
INSERT INTO `#__empl_functions` (id, title) VALUES (9, 'Модель/стендист');
INSERT INTO `#__empl_functions` (id, title) VALUES (10, 'Резерв');
INSERT INTO `#__empl_functions` (id, title) VALUES (12, 'Сканировщик');
INSERT INTO `#__empl_functions` (id, title) VALUES (13, 'Склад');
INSERT INTO `#__empl_functions` (id, title) VALUES (11, 'Сопровождение делегаций');
INSERT INTO `#__empl_functions` (id, title) VALUES (14, 'Статист');
INSERT INTO `#__empl_functions` (id, title) VALUES (15, 'Техническая группа');
INSERT INTO `#__empl_functions` (id, title) VALUES (16, 'Техническая зона');
INSERT INTO `#__empl_functions` (id, title) VALUES (17, 'Уличный поток (навигация)');
INSERT INTO `#__empl_functions` (id, title) VALUES (18, 'Фасовщик');
INSERT INTO `#__empl_functions` (id, title) VALUES (19, 'ЦУВ');
INSERT INTO `#__empl_functions` (id, title) VALUES (20, 'Шлагбаум');

create table `#__empl_places`
(
    id int unsigned auto_increment,
    projectID int not null,
    title varchar(255) not null,
    constraint `#__empl_places_pk`
        primary key (id),
    constraint `#__empl_places_#__prj_projects_id_fk`
        foreign key (projectID) references `#__prj_projects` (id)
) character set utf8 collate utf8_general_ci
    comment 'Места работы';

create index `#__empl_places_title_index`
    on `#__empl_places` (title);

INSERT INTO `#__empl_places` (id, projectID, title) VALUES (1, 11, 'Алабино');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (2, 11, 'Курган Славы');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (3, 11, 'Входная группа A');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (4, 11, 'Входная группа B');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (5, 11, 'Входная группа C');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (6, 11, 'Входная группа D');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (7, 11, 'Вставка A-B');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (8, 11, 'Вставка C-D');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (9, 11, 'Вставка B-C правая');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (10, 11, 'Вставка B-C левая');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (11, 11, 'P1');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (12, 11, 'P2');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (13, 11, 'Голицыно');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (14, 11, 'Кубинка');
INSERT INTO `#__empl_places` (id, projectID, title) VALUES (15, 11, 'Селятино');

