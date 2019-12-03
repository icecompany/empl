create table if not exists `#__empl_employers`
(
    id int unsigned auto_increment,
    guid char(36) default 0 not null,
    last_name varchar(100) default null null comment 'Фамилия',
    first_name varchar(100) default null null comment 'Имя',
    patronymic varchar(100) default null null comment 'Отчество',
    gender set('m', 'f') default 'm' not null comment 'Пол',
    birthday date default null null comment 'Дата рождения',
    state tinyint default 1 not null,
    constraint `#__empl_employers_pk`
        primary key (id)
)
    comment 'Сотрудники';

create index `#__empl_employers_birthday_index`
    on `#__empl_employers` (birthday);

create index `#__empl_employers_first_name_index`
    on `#__empl_employers` (first_name);

create index `#__empl_employers_gender_index`
    on `#__empl_employers` (gender);

create unique index `#__empl_employers_guid_uindex`
    on `#__empl_employers` (guid);

create index `#__empl_employers_last_name_index`
    on `#__empl_employers` (last_name);

create index `#__empl_employers_lf_index`
    on `#__empl_employers` (last_name, first_name);

create index `#__empl_employers_state_index`
    on `#__empl_employers` (state);

