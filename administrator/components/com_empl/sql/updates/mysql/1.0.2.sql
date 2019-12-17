alter table `#__empl_employers` modify metroID int default null null;

alter table `#__empl_employers` alter column address set default null;

alter table `#__empl_employers` modify night tinyint default null null comment 'Готовность работы в ночное время';

