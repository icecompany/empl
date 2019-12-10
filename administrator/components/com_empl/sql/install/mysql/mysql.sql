drop table if exists `#__empl_employers`, `#__metro_stations`, `#__metro_lines`, `#__moscow_districts`, `#__moscow_regions`, `#__empl_language_levels`;

create table `#__empl_language_levels`
(
    id int auto_increment,
    title varchar(255) not null,
    weight int default 0 not null comment 'Вес позиции',
    constraint `#__empl_language_levels_pk`
        primary key (id)
)
    comment 'Уровни знания языков';

INSERT INTO `#__empl_language_levels` (id, title, weight) VALUES (1, 'Английский - Могу прочитать и перевести', 10);
INSERT INTO `#__empl_language_levels` (id, title, weight) VALUES (2, 'Английский - Могу объясниться', 20);
INSERT INTO `#__empl_language_levels` (id, title, weight) VALUES (3, 'Английский - Разговариваю', 30);
INSERT INTO `#__empl_language_levels` (id, title, weight) VALUES (4, 'Английский - Свободно разговариваю', 40);

create index `#__empl_language_levels_weight_index`
    on `#__empl_language_levels` (weight);

create table `#__moscow_regions`
(
    id   int auto_increment
        primary key,
    name varchar(255) not null
)
    comment 'Районы Москвы';

create index `#__moscow_regions_name_index`
    on `#__moscow_regions` (name);

INSERT INTO `#__moscow_regions` (id, name) VALUES (50, 'Академический район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (60, 'Алексеевский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (92, 'Бабушкинский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (34, 'Басманный район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (74, 'Бескудниковский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (13, 'Бутырский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (82, 'Войковский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (96, 'Гагаринский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (43, 'Головинский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (23, 'Даниловский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (8, 'Донской район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (19, 'Красносельский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (89, 'Лосиноостровский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (42, 'Мещанский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (20, 'Нагорный район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (15, 'Нижегородский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (4, 'Обручевский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (11, 'Останкинский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (53, 'поселение Внуковское');
INSERT INTO `#__moscow_regions` (id, name) VALUES (84, 'поселение Московский');
INSERT INTO `#__moscow_regions` (id, name) VALUES (100, 'поселение Сосенское');
INSERT INTO `#__moscow_regions` (id, name) VALUES (37, 'Пресненский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (9, 'район Арбат');
INSERT INTO `#__moscow_regions` (id, name) VALUES (59, 'район Аэропорт');
INSERT INTO `#__moscow_regions` (id, name) VALUES (21, 'район Бибирево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (90, 'район Богородское');
INSERT INTO `#__moscow_regions` (id, name) VALUES (72, 'район Братеево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (86, 'район Восточное Дегунино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (48, 'район Выхино-Жулебино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (94, 'район Гольяново');
INSERT INTO `#__moscow_regions` (id, name) VALUES (24, 'район Дорогомилово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (1, 'район Замоскворечье');
INSERT INTO `#__moscow_regions` (id, name) VALUES (5, 'район Зюзино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (18, 'район Зябликово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (3, 'район Измайлово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (79, 'район Коньково');
INSERT INTO `#__moscow_regions` (id, name) VALUES (97, 'район Коптево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (35, 'район Косино-Ухтомский');
INSERT INTO `#__moscow_regions` (id, name) VALUES (63, 'район Крылатское');
INSERT INTO `#__moscow_regions` (id, name) VALUES (7, 'район Кузьминки');
INSERT INTO `#__moscow_regions` (id, name) VALUES (30, 'район Кунцево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (87, 'район Левобережный');
INSERT INTO `#__moscow_regions` (id, name) VALUES (47, 'район Лефортово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (88, 'район Люблино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (98, 'район Марфино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (71, 'район Марьина Роща');
INSERT INTO `#__moscow_regions` (id, name) VALUES (27, 'район Марьино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (38, 'район Митино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (17, 'район Москворечье-Сабурово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (73, 'район Нагатино-Садовники');
INSERT INTO `#__moscow_regions` (id, name) VALUES (54, 'район Нагатинский Затон');
INSERT INTO `#__moscow_regions` (id, name) VALUES (58, 'район Некрасовка');
INSERT INTO `#__moscow_regions` (id, name) VALUES (22, 'район Ново-Переделкино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (68, 'район Новогиреево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (33, 'район Новокосино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (85, 'район Орехово-Борисово Северное');
INSERT INTO `#__moscow_regions` (id, name) VALUES (31, 'район Орехово-Борисово Южное');
INSERT INTO `#__moscow_regions` (id, name) VALUES (76, 'район Отрадное');
INSERT INTO `#__moscow_regions` (id, name) VALUES (69, 'район Очаково-Матвеевское');
INSERT INTO `#__moscow_regions` (id, name) VALUES (66, 'район Перово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (93, 'район Печатники');
INSERT INTO `#__moscow_regions` (id, name) VALUES (49, 'район Покровское-Стрешнево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (28, 'район Преображенское');
INSERT INTO `#__moscow_regions` (id, name) VALUES (36, 'район Проспект Вернадского');
INSERT INTO `#__moscow_regions` (id, name) VALUES (44, 'район Раменки');
INSERT INTO `#__moscow_regions` (id, name) VALUES (99, 'район Ростокино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (16, 'район Свиблово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (62, 'район Северное Бутово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (2, 'район Северное Медведково');
INSERT INTO `#__moscow_regions` (id, name) VALUES (61, 'район Северное Тушино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (56, 'район Сокол');
INSERT INTO `#__moscow_regions` (id, name) VALUES (83, 'район Соколиная Гора');
INSERT INTO `#__moscow_regions` (id, name) VALUES (57, 'район Сокольники');
INSERT INTO `#__moscow_regions` (id, name) VALUES (75, 'район Солнцево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (51, 'район Строгино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (25, 'район Текстильщики');
INSERT INTO `#__moscow_regions` (id, name) VALUES (91, 'район Тёплый Стан');
INSERT INTO `#__moscow_regions` (id, name) VALUES (65, 'район Тропарёво-Никулино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (29, 'район Филёвский Парк');
INSERT INTO `#__moscow_regions` (id, name) VALUES (40, 'район Фили-Давыдково');
INSERT INTO `#__moscow_regions` (id, name) VALUES (41, 'район Хамовники');
INSERT INTO `#__moscow_regions` (id, name) VALUES (95, 'район Ховрино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (32, 'район Хорошёво-Мнёвники');
INSERT INTO `#__moscow_regions` (id, name) VALUES (80, 'район Царицыно');
INSERT INTO `#__moscow_regions` (id, name) VALUES (14, 'район Черёмушки');
INSERT INTO `#__moscow_regions` (id, name) VALUES (39, 'район Чертаново Северное');
INSERT INTO `#__moscow_regions` (id, name) VALUES (70, 'район Чертаново Центральное');
INSERT INTO `#__moscow_regions` (id, name) VALUES (46, 'район Чертаново Южное');
INSERT INTO `#__moscow_regions` (id, name) VALUES (67, 'район Щукино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (6, 'район Южное Бутово');
INSERT INTO `#__moscow_regions` (id, name) VALUES (64, 'район Южное Тушино');
INSERT INTO `#__moscow_regions` (id, name) VALUES (52, 'район Якиманка');
INSERT INTO `#__moscow_regions` (id, name) VALUES (55, 'район Ясенево');
INSERT INTO `#__moscow_regions` (id, name) VALUES (77, 'Рязанский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (78, 'Савёловский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (45, 'Таганский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (12, 'Тверской район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (10, 'Тимирязевский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (81, 'Хорошёвский район');
INSERT INTO `#__moscow_regions` (id, name) VALUES (26, 'Южнопортовый район');

create table `#__moscow_districts`
(
    id   int auto_increment
        primary key,
    name varchar(255) not null
)
    comment 'Список округов Москвы';

create index `#__moscow_districts_name_index`
    on `#__moscow_districts` (name);

INSERT INTO `#__moscow_districts` (id, name) VALUES (3, 'Восточный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (8, 'Западный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (10, 'Новомосковский административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (7, 'Северный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (2, 'Северо-Восточный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (9, 'Северо-Западный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (1, 'Центральный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (5, 'Юго-Восточный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (4, 'Юго-Западный административный округ');
INSERT INTO `#__moscow_districts` (id, name) VALUES (6, 'Южный административный округ');

create table `#__metro_lines`
(
    id   int auto_increment
        primary key,
    name varchar(255) not null
)
    comment 'Список линий метро';

create index `#__metro_lines_name_index`
    on `#__metro_lines` (name);

INSERT INTO `#__metro_lines` (id, name) VALUES (3, 'Арбатско-Покровская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (4, 'Большая кольцевая линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (5, 'Бутовская линия Лёгкого метро');
INSERT INTO `#__metro_lines` (id, name) VALUES (6, 'Замоскворецкая линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (1, 'Калининская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (2, 'Калужско-Рижская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (13, 'Каховская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (15, 'Кольцевая линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (7, 'Люблинско-Дмитровская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (10, 'Московская монорельсовая транспортная система');
INSERT INTO `#__metro_lines` (id, name) VALUES (17, 'Московское центральное кольцо');
INSERT INTO `#__metro_lines` (id, name) VALUES (12, 'Некрасовская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (9, 'Серпуховско-Тимирязевская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (14, 'Сокольническая линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (8, 'Солнцевская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (11, 'Таганско-Краснопресненская линия');
INSERT INTO `#__metro_lines` (id, name) VALUES (16, 'Филёвская линия');

-- auto-generated definition

create table `#__metro_stations`
(
    id         int auto_increment
        primary key,
    name       varchar(100)      not null,
    lineID     int               not null,
    districtID int               not null,
    regionID   int               not null,
    metro_num    int unsigned      not null,
    globalID   int unsigned      not null,
    state      tinyint default 1 not null,
    constraint `#__metro_stations_#__metro_lines_id_fk`
        foreign key (lineID) references `#__metro_lines` (id)
            on update cascade on delete cascade,
    constraint `#__metro_stations_#__moscow_districts_id_fk`
        foreign key (districtID) references `#__moscow_districts` (id)
            on update cascade on delete cascade,
    constraint `#__metro_stations_#__moscow_regions_id_fk`
        foreign key (regionID) references `#__moscow_regions` (id)
            on update cascade on delete cascade
)
    comment 'Станции Московского метро';

create index `#__metro_stations_id_index`
    on `#__metro_stations` (id);

create index `#__metro_stations_state_index`
    on `#__metro_stations` (state);

INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (1, 'Третьяковская', 1, 1, 1, 136, 58701962, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (2, 'Медведково', 2, 2, 2, 86, 58701963, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (3, 'Первомайская', 3, 3, 3, 41, 58701964, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (4, 'Калужская', 2, 4, 4, 104, 58701965, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (5, 'Каховская', 4, 4, 5, 251, 58701966, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (6, 'Бульвар адмирала Ушакова', 5, 4, 6, 184, 58701967, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (7, 'Павелецкая', 6, 1, 1, 28, 58701968, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (8, 'Волжская', 7, 5, 7, 172, 58701969, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (9, 'Шаболовская', 2, 6, 8, 99, 58701970, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (10, 'Плющиха', 8, 1, 9, 221, 58701971, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (11, 'Тимирязевская', 9, 7, 10, 142, 58701972, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (12, 'ВДНХ', 2, 2, 11, 90, 58701973, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (13, 'Тверская', 6, 1, 12, 31, 58701974, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (14, 'Фонвизинская', 7, 2, 13, 208, 58701975, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (15, 'Воронцовская', 4, 4, 4, 249, 58701976, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (16, 'Дмитровская', 9, 2, 13, 143, 58701978, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (17, 'Новые Черёмушки', 2, 4, 14, 103, 58701979, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (18, 'Улица Милашенкова', 10, 2, 13, 191, 58701980, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (19, 'Пушкинская', 11, 1, 12, 119, 58701981, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (20, 'Маяковская', 6, 1, 12, 32, 58701982, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (21, 'Нижегородская улица', 12, 5, 15, 231, 58701983, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (22, 'Ботанический сад', 2, 2, 16, 89, 58701984, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (23, 'Нижегородская улица', 4, 5, 15, 256, 58701985, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (24, 'Белорусская', 6, 1, 12, 33, 58701986, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (25, 'Варшавская', 13, 6, 17, 180, 58701987, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (26, 'Красногвардейская', 6, 6, 18, 20, 58701988, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (27, 'Комсомольская', 14, 1, 19, 6, 58701989, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (28, 'Нагатинская', 9, 6, 20, 152, 58701990, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (29, 'Алтуфьево', 9, 2, 21, 137, 58701991, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (30, 'Новопеределкино', 8, 8, 22, 268, 58701992, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (31, 'Автозаводская', 6, 6, 23, 27, 58701993, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (32, 'Дорогомиловская', 8, 8, 24, 220, 58701994, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (33, 'Текстильщики', 11, 5, 25, 125, 58701995, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (34, 'Кожуховская', 7, 5, 26, 170, 58701996, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (35, 'Марьино', 7, 5, 27, 175, 58701997, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (36, 'Павелецкая', 15, 1, 1, 77, 58701998, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (37, 'Преображенская площадь', 14, 3, 28, 3, 58701999, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (38, 'Новослободская', 15, 1, 12, 82, 58702000, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (39, 'Фили', 16, 8, 29, 65, 58702001, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (40, 'Кунцевская', 4, 8, 30, 244, 58702002, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (41, 'Домодедовская', 6, 6, 31, 21, 58702003, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (42, 'Мневники', 4, 9, 32, 242, 58702004, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (43, 'Охотный ряд', 14, 1, 12, 10, 58702005, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (44, 'Новокосино', 1, 3, 33, 129, 58702006, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (45, 'Курская', 15, 1, 34, 79, 58702007, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (46, 'Лухмановская', 12, 3, 35, 228, 58702008, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (47, 'Достоевская', 7, 1, 12, 163, 58702009, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (48, 'Улица Новаторов', 4, 8, 36, 248, 58702010, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (49, 'Международная', 16, 1, 37, 73, 58702011, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (50, 'Борисово', 7, 6, 18, 176, 58702012, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (51, 'Выставочный центр', 10, 2, 11, 188, 58702013, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (52, 'Беговая', 11, 1, 37, 116, 58702014, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (53, 'Терехово', 4, 9, 32, 243, 58702015, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (54, 'Третьяковская', 8, 1, 1, 222, 58702016, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (55, 'Савёловская', 9, 2, 13, 144, 58702017, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (56, 'Волоколамская', 3, 9, 38, 59, 58702018, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (57, 'Парк Победы', 8, 8, 24, 218, 58702019, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (58, 'Чертановская', 9, 6, 39, 156, 58702020, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (59, 'Парк Победы', 3, 8, 24, 52, 58702021, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (60, 'Филёвский парк', 16, 8, 40, 63, 58702022, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (61, 'Фрунзенская', 14, 1, 41, 14, 58702023, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (62, 'Кузнецкий мост', 11, 1, 42, 120, 58702024, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (63, 'Лубянка', 14, 1, 12, 9, 58702025, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (64, 'Улица Сергея Эйзенштейна', 10, 2, 11, 187, 58702026, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (65, 'Водный стадион', 6, 7, 43, 38, 58702027, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (66, 'Улица 1905 года', 11, 1, 37, 117, 58702028, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (67, 'Ломоносовский проспект', 8, 8, 44, 224, 58702029, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (68, 'Марксистская', 1, 1, 45, 135, 58702030, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (69, 'Боровское шоссе', 8, 8, 22, 267, 58702031, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (70, 'Партизанская', 3, 3, 3, 43, 58702032, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (71, 'Улица академика Янгеля', 9, 6, 46, 159, 58702033, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (72, 'Краснопресненская', 15, 1, 37, 84, 58702034, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (73, 'Авиамоторная', 12, 5, 47, 230, 58702035, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (74, 'Чкаловская', 7, 1, 34, 166, 58702036, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (75, 'Тульская', 9, 6, 23, 151, 58702037, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (76, 'Лермонтовский проспект', 11, 5, 48, 204, 58702038, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (77, 'Спартак', 11, 9, 49, 203, 58702039, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (78, 'Арбатская', 16, 1, 9, 70, 58702040, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (79, 'Аннино', 9, 6, 46, 160, 58702041, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (80, 'Севастопольская', 9, 4, 5, 155, 58702042, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (81, 'Профсоюзная', 2, 4, 50, 102, 58702043, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (82, 'Арбатская', 3, 1, 9, 49, 58702044, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (83, 'Улица Горчакова', 5, 4, 6, 185, 58702045, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (84, 'Мякинино', 3, 9, 51, 58, 58702046, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (85, 'Октябрьская', 2, 1, 52, 98, 58702047, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (86, 'Пионерская', 16, 8, 40, 62, 58702048, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (87, 'Площадь Ильича', 1, 1, 45, 134, 58702049, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (88, 'Рассказовка', 8, 10, 53, 269, 58702050, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (89, 'Нагатинский затон', 4, 6, 54, 253, 58702051, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (90, 'Измайловская', 3, 3, 3, 42, 58702052, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (91, 'Косино', 12, 5, 48, 226, 58702053, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (92, 'Битцевский парк', 5, 4, 55, 215, 58702054, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (93, 'Сокол', 6, 7, 56, 36, 58702055, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (94, 'Ржевская', 4, 1, 42, 261, 58702056, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (95, 'Сокольники', 4, 3, 57, 260, 58702057, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (96, 'Смоленская', 16, 1, 9, 69, 58702058, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (97, 'Каховская', 13, 4, 5, 181, 58702059, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (98, 'Парк культуры', 14, 1, 41, 13, 58702060, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (99, 'Мичуринский проспект', 8, 8, 44, 263, 58702061, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (100, 'Котельники', 11, 5, 48, 206, 58702062, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (101, 'Библиотека имени Ленина', 14, 1, 9, 11, 58702063, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (102, 'Некрасовка', 12, 5, 58, 229, 58702064, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (103, 'Волгоградский проспект', 11, 5, 26, 124, 58702065, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (104, 'Трубная', 7, 1, 42, 164, 58702066, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (105, 'Динамо', 6, 7, 59, 34, 58702067, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (106, 'Алексеевская', 2, 2, 60, 91, 58702068, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (107, 'Улица академика Королёва', 10, 2, 11, 189, 58702070, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (108, 'Планерная', 11, 9, 61, 110, 58702071, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (109, 'Спортивная', 14, 1, 41, 15, 58702072, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (110, 'Аминьевское шоссе', 4, 8, 30, 245, 58702073, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (111, 'Суворовская', 15, 1, 42, 201, 58702074, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (112, 'Таганская', 11, 1, 45, 122, 58702075, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (113, 'Киевская', 3, 8, 24, 51, 58702076, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (114, 'Театральная', 6, 1, 12, 30, 58702077, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (115, 'Сокольники', 14, 3, 57, 4, 58702078, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (116, 'Деловой центр', 8, 1, 37, 217, 58702079, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (117, 'Бульвар Дмитрия Донского', 9, 4, 62, 161, 58702080, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (118, 'Шипиловская', 7, 6, 18, 177, 58702081, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (119, 'Белорусская', 15, 1, 12, 83, 58702083, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (120, 'Полянка', 9, 1, 52, 149, 58702084, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (121, 'Крылатское', 3, 8, 63, 56, 58702085, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (122, 'Сходненская', 11, 9, 64, 111, 58702086, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (123, 'Площадь Революции', 3, 1, 12, 48, 58702087, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (124, 'Юго-Западная', 14, 8, 65, 19, 58702088, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (125, 'Шоссе Энтузиастов', 1, 3, 66, 132, 58702089, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (126, 'Китай-город', 2, 1, 12, 96, 58702090, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (127, 'Щукинская', 11, 9, 67, 113, 58702091, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (128, 'Лесопарковая', 5, 4, 62, 216, 58702092, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (129, 'Новогиреево', 1, 3, 68, 130, 58702093, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (130, 'Курская', 3, 1, 34, 47, 58702094, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (131, 'Лефортово', 4, 5, 47, 258, 58702095, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (132, 'Очаково', 8, 8, 69, 264, 58702096, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (133, 'Авиамоторная', 4, 5, 47, 257, 58702097, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (134, 'Минская', 8, 8, 24, 223, 58702098, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (135, 'Студенческая', 16, 8, 24, 67, 58702099, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (136, 'Пражская', 9, 6, 70, 158, 58702100, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (137, 'Парк культуры', 15, 1, 41, 74, 58702101, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (138, 'Аэропорт', 6, 7, 59, 35, 58702102, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (139, 'Проспект Мира', 15, 1, 42, 81, 58702103, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (140, 'Третьяковская', 2, 1, 1, 97, 58702104, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (141, 'Марьина роща', 7, 2, 71, 162, 58702105, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (142, 'Китай-город', 11, 1, 12, 121, 58702106, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (143, 'Авиамоторная', 1, 5, 47, 133, 58702107, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (144, 'Нахимовский проспект', 9, 4, 5, 154, 58702108, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (145, 'Алма-Атинская', 6, 6, 72, 196, 58702109, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (146, 'Цветной бульвар', 9, 1, 12, 146, 58702110, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (147, 'Окружная', 7, 7, 10, 210, 58702111, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (148, 'Добрынинская', 15, 1, 1, 76, 58702112, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (149, 'Технопарк', 6, 6, 73, 197, 58702113, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (150, 'Серпуховская', 9, 1, 1, 150, 58702114, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (151, 'Каширская', 6, 6, 73, 25, 58702115, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (152, 'Жулебино', 11, 5, 48, 205, 58702116, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (153, 'Селигерская', 7, 7, 74, 212, 58702117, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (154, 'Юго-Восточная', 12, 5, 48, 234, 58702118, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (155, 'Солнцево', 8, 8, 75, 266, 58702119, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (156, 'Пятницкое шоссе', 3, 9, 38, 200, 58702120, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (157, 'Улица Скобелевская', 5, 4, 6, 183, 58702121, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (158, 'Воробьёвы горы', 14, 8, 44, 16, 58702122, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (159, 'Мичуринский проспект', 4, 8, 44, 246, 58702123, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (160, 'Верхние Лихоборы', 7, 7, 74, 211, 58702124, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (161, 'Строгино', 3, 9, 51, 57, 58702125, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (162, 'Отрадное', 9, 2, 76, 139, 58702126, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (163, 'Кузьминки', 11, 5, 7, 126, 58702127, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (164, 'Кунцевская', 16, 8, 30, 61, 58702128, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (165, 'Окская улица', 12, 5, 77, 233, 58702129, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (166, 'Митино', 3, 9, 38, 60, 58702130, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (167, 'Академическая', 2, 4, 50, 101, 58702131, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (168, 'Пролетарская', 11, 1, 45, 123, 58702132, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (169, 'Нижняя Масловка', 4, 7, 78, 235, 58702133, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (170, 'Деловой центр', 4, 1, 37, 240, 58702134, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (171, 'Тургеневская', 2, 1, 19, 95, 58702135, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (172, 'Беляево', 2, 4, 79, 105, 58702136, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (173, 'Царицыно', 6, 6, 80, 23, 58702137, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (174, 'Волхонка', 8, 1, 41, 219, 58702138, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (175, 'Киевская', 16, 8, 24, 68, 58702139, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (176, 'Полежаевская', 11, 7, 81, 115, 58702140, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (177, 'Текстильщики', 4, 5, 25, 255, 58702141, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (178, 'Войковская', 6, 7, 82, 37, 58702142, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (179, 'Саларьево', 14, 8, 75, 195, 58702143, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (180, 'Братиславская', 7, 5, 27, 174, 58702144, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (181, 'Южная', 9, 6, 70, 157, 58702145, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (182, 'Киевская', 15, 8, 24, 85, 58702146, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (183, 'Славянский бульвар', 3, 8, 40, 53, 58702147, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (184, 'Свиблово', 2, 2, 16, 88, 58702148, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (185, 'Университет', 14, 8, 44, 17, 58702149, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (186, 'Улица Старокачаловская', 5, 4, 62, 182, 58702150, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (187, 'Электрозаводская', 3, 3, 83, 45, 58702151, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (188, 'Ясенево', 2, 4, 55, 108, 58702152, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (189, 'Румянцево', 14, 10, 84, 194, 58702153, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (190, 'Тропарёво', 14, 8, 65, 193, 58702154, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (191, 'Таганская', 15, 1, 45, 78, 58702155, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (192, 'Каширская', 13, 6, 17, 179, 58702156, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (193, 'Орехово', 6, 6, 85, 22, 58702157, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (194, 'Перово', 1, 3, 68, 131, 58702158, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (195, 'Телецентр', 10, 2, 11, 190, 58702159, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (196, 'Дубровка', 7, 5, 26, 169, 58702160, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (197, 'Каширская', 4, 6, 17, 252, 58702161, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (198, 'Семёновская', 3, 3, 83, 44, 58702162, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (199, 'Стахановская', 12, 5, 77, 232, 58702163, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (200, 'Кунцевская', 3, 8, 30, 54, 58702164, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (201, 'Петровско-Разумовская', 7, 7, 10, 209, 58702165, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (202, 'Тёплый стан', 2, 4, 55, 107, 58702166, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (203, 'Выхино', 11, 5, 48, 128, 58702168, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (204, 'Терешково', 8, 8, 75, 265, 58702169, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (205, 'Кантемировская', 6, 6, 80, 24, 58702170, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (206, 'Севастопольский проспект', 4, 4, 5, 250, 58702171, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (207, 'Молодёжная', 3, 8, 30, 55, 58702172, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (208, 'Владыкино', 9, 2, 76, 140, 58702173, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (209, 'Крестьянская застава', 7, 1, 45, 168, 58702174, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (210, 'Хорошёвская', 4, 7, 81, 238, 58702175, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (211, 'Зябликово', 7, 6, 18, 178, 58702176, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (212, 'Петровско-Разумовская', 9, 7, 10, 141, 58702177, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (213, 'Красносельская', 14, 1, 19, 5, 58702178, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (214, 'Улица Народного ополчения', 4, 9, 32, 241, 58702179, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (215, 'Чистые пруды', 14, 1, 34, 8, 58702180, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (216, 'Дмитровское шоссе', 7, 7, 86, 214, 58702181, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (217, 'Комсомольская', 15, 1, 19, 80, 58702182, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (218, 'Сретенский бульвар', 7, 1, 19, 165, 58702183, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (219, 'Проспект Вернадского', 4, 8, 44, 247, 58702184, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (220, 'Боровицкая', 9, 1, 9, 148, 58702185, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (221, 'Бибирево', 9, 2, 21, 138, 58702186, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (222, 'Речной вокзал', 6, 7, 87, 39, 58702187, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (223, 'Люблино', 7, 5, 88, 173, 58702188, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (224, 'Бутырская', 7, 2, 13, 207, 58702189, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (225, 'Октябрьское поле', 11, 9, 67, 114, 58702190, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (226, 'Новокузнецкая', 6, 1, 1, 29, 58702191, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (227, 'Кутузовская', 16, 8, 24, 66, 58702192, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (228, 'Челобитьево', 2, 2, 89, 202, 58702193, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (229, 'Тушинская', 11, 9, 49, 112, 58702194, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (230, 'Коломенская', 6, 6, 73, 26, 58702195, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (231, 'Октябрьская', 15, 1, 52, 75, 58702196, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (232, 'Проспект Вернадского', 14, 8, 36, 18, 58702197, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (233, 'Нагорная', 9, 6, 20, 153, 58702198, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (234, 'Выставочная', 16, 1, 37, 72, 58702199, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (235, 'Бунинская аллея', 5, 4, 6, 186, 58702200, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (236, 'Рижская', 2, 1, 42, 92, 58702201, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (237, 'Ходынское поле', 4, 7, 81, 237, 58702202, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (238, 'Новоясеневская', 2, 4, 55, 109, 58702203, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (239, 'Бауманская', 3, 1, 34, 46, 58702204, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (240, 'Бульвар Рокоссовского', 14, 3, 90, 1, 58702205, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (241, 'Черкизовская', 14, 3, 28, 2, 58702206, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (242, 'Коньково', 2, 4, 91, 106, 58702207, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (243, 'Менделеевская', 9, 1, 12, 145, 58702208, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (244, 'улица Дмитриевского', 12, 3, 35, 227, 58702209, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (245, 'Электрозаводская', 4, 3, 83, 259, 58702210, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (246, 'Раменки', 8, 8, 44, 225, 58702211, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (247, 'Смоленская', 3, 1, 9, 50, 58702212, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (248, 'Баррикадная', 11, 1, 37, 118, 58702213, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (249, 'Багратионовская', 16, 8, 29, 64, 58702214, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (250, 'Бабушкинская', 2, 2, 92, 87, 58702215, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (251, 'Кропоткинская', 14, 1, 41, 12, 58702216, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (252, 'Проспект Мира', 2, 1, 42, 93, 58702217, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (253, 'Сухаревская', 2, 1, 19, 94, 58702218, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (254, 'Тимирязевская', 10, 2, 13, 192, 58702219, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (255, 'Красные ворота', 14, 1, 19, 7, 58702220, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (256, 'Печатники', 7, 5, 93, 171, 58702221, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (257, 'Шереметьевская', 4, 2, 71, 262, 58702222, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (258, 'Рязанский проспект', 11, 5, 77, 127, 58702223, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (259, 'Римская', 7, 1, 45, 167, 58702224, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (260, 'Александровский сад', 16, 1, 12, 71, 58702225, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (261, 'Ленинский проспект', 2, 6, 8, 100, 58702226, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (262, 'Чеховская', 9, 1, 12, 147, 58702227, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (263, 'Печатники', 4, 5, 93, 254, 58702228, 0);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (264, 'Щёлковская', 3, 3, 94, 40, 58702229, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (265, 'Ховрино', 6, 7, 95, 199, 58702230, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (266, 'Шелепиха', 17, 1, 37, 284, 277904735, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (267, 'Площадь Гагарина', 17, 4, 96, 288, 277904736, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (268, 'Лихоборы', 17, 7, 97, 280, 277904737, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (269, 'Автозаводская', 17, 6, 23, 292, 277904738, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (270, 'Шоссе Энтузиастов', 17, 3, 83, 271, 277904739, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (271, 'Хорошёво', 17, 7, 81, 283, 277904740, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (272, 'Соколиная Гора', 17, 3, 83, 296, 277904741, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (273, 'Локомотив', 17, 3, 28, 273, 277904742, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (274, 'Кутузовская', 17, 8, 24, 286, 277904743, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (275, 'Балтийская', 17, 7, 82, 281, 277904744, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (276, 'Владыкино', 17, 2, 98, 278, 277904745, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (277, 'Угрешская', 17, 5, 93, 293, 277904746, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (278, 'Ботанический сад', 17, 2, 16, 277, 277904747, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (279, 'Андроновка', 17, 3, 66, 270, 277904748, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (280, 'Дубровка', 17, 5, 26, 297, 277904749, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (281, 'Измайлово', 17, 3, 83, 272, 277904750, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (282, 'Лужники', 17, 1, 41, 287, 277904751, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (283, 'Нижегородская', 17, 5, 15, 295, 277904752, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (284, 'Новохохловская', 17, 5, 15, 294, 277904753, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (285, 'ЗИЛ', 17, 6, 23, 291, 277904754, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (286, 'Верхние Котлы', 17, 6, 20, 290, 277904755, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (287, 'Белокаменная', 17, 3, 90, 275, 277904756, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (288, 'Ростокино', 17, 2, 99, 276, 277904757, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (289, 'Деловой центр', 17, 1, 37, 285, 277904758, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (290, 'Бульвар Рокоссовского', 17, 3, 90, 274, 277904759, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (291, 'Стрешнево', 17, 7, 56, 282, 277904760, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (292, 'Крымская', 17, 6, 8, 289, 277904761, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (293, 'Окружная', 17, 7, 10, 279, 277904762, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (294, 'Петровский парк', 4, 7, 59, 298, 696737361, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (295, 'ЦСКА', 4, 7, 81, 299, 696742167, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (296, 'Шелепиха', 4, 1, 37, 300, 696749112, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (297, 'Озерная', 8, 8, 69, 301, 886123736, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (298, 'Говорово', 8, 8, 75, 302, 886123738, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (299, 'Беломорская', 6, 7, 87, 303, 904474367, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (300, 'Зорге', 17, 9, 32, 304, 905932318, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (301, 'Панфиловская', 17, 9, 67, 305, 905932372, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (302, 'Коптево', 17, 7, 97, 306, 905932373, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (303, 'Савеловская', 4, 7, 78, 307, 906044097, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (304, 'Филатов луг', 14, 10, 100, 308, 930063626, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (305, 'Прокшино', 14, 10, 100, 309, 930063627, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (306, 'Ольховая', 14, 10, 100, 310, 930063628, 1);
INSERT INTO `#__metro_stations` (id, `name`, lineID, districtID, regionID, metro_num, globalID, `state`) VALUES (307, 'Коммунарка', 14, 10, 100, 311, 930063629, 1);

create or replace view `#__metro_view_stations` as
select s.id, s.name as station, s.lineID, l.name as line, s.districtID, d.name as district, s.regionID, r.name as region
from `#__metro_stations` s
         left join `#__metro_lines` l on s.lineID = l.id
         left join `#__moscow_districts` d on s.districtID = d.id
         left join `#__moscow_regions` r on s.regionID = r.id;


create table `#__empl_employers`
(
    id         int unsigned auto_increment
        primary key,
    guid       char(36)       default '0' not null,
    last_name  varchar(100)               null comment 'Фамилия',
    first_name varchar(100)               null comment 'Имя',
    patronymic varchar(100)               null comment 'Отчество',
    gender     set ('m', 'f') default 'm' not null comment 'Пол',
    birthday   date                       null comment 'Дата рождения',
    cityID     int unsigned               not null,
    metroID    int                        not null,
    state      tinyint        default 1   not null,
    constraint `#__empl_employers_guid_uindex`
        unique (guid),
    constraint `#__empl_employers_#__grph_cities_id_fk`
        foreign key (cityID) references `#__grph_cities` (id),
    constraint `#__empl_employers_#__metro_stations_id_fk`
        foreign key (metroID) references `#__metro_stations` (id)
)
    comment 'Сотрудники';

create index `#__empl_employers_birthday_index`
    on `#__empl_employers` (birthday);

create index `#__empl_employers_first_name_index`
    on `#__empl_employers` (first_name);

create index `#__empl_employers_gender_index`
    on `#__empl_employers` (gender);

create index `#__empl_employers_last_name_index`
    on `#__empl_employers` (last_name);

create index `#__empl_employers_lf_index`
    on `#__empl_employers` (last_name, first_name);

create index `#__empl_employers_state_index`
    on `#__empl_employers` (state);

create table `#__empl_languages`
(
    id int auto_increment,
    employerID int unsigned not null,
    languageID int not null,
    constraint `#__empl_languages_pk`
        primary key (id),
    constraint `#__empl_languages_#__empl_employers_id_fk`
        foreign key (employerID) references `#__empl_employers` (id)
            on update cascade on delete cascade,
    constraint `#__empl_languages_#__empl_language_levels_id_fk`
        foreign key (languageID) references `#__empl_language_levels` (id)
            on update cascade on delete cascade
)
    comment 'Таблица с уровнями знаний английского сотрудниками';

create unique index `#__empl_languages_employerID_languageID_uindex`
    on `#__empl_languages` (employerID, languageID);

create table `#__empl_contacts`
(
    id int unsigned auto_increment,
    employerID int unsigned not null,
    tip enum('mobile', 'email', 'vk') not null,
    val varbinary(255) not null,
    constraint `#__empl_contacts_pk`
        primary key (id),
    constraint `#__empl_contacts_#__empl_employers_id_fk`
        foreign key (employerID) references `#__empl_employers` (id)
            on update cascade on delete cascade
)
    comment 'Контактные данные сотрудников';

alter table `#__empl_contacts`
    add description varchar(255) default null null;

