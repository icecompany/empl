alter table `#__empl_employers` modify metroID int default null null;

alter table `#__empl_employers` modify address varbinary(255) default null null;

alter table `#__empl_employers` modify night tinyint default null null comment 'Готовность работы в ночное время';

