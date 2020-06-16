create table if not exists `#__empl_schedule`
(
    id int unsigned auto_increment,
    workID int unsigned not null,
    functionID int unsigned not null,
    placeID int unsigned not null,
    curator tinyint default 0 not null,
    start_time timestamp default current_timestamp not null,
    end_time timestamp default current_timestamp not null,
    comment text default null null,
    constraint `#__empl_schedule_pk`
        primary key (id),
    constraint `#__empl_schedule_#__empl_functions_id_fk`
        foreign key (functionID) references `#__empl_functions` (id)
            on update cascade on delete cascade,
    constraint `#__empl_schedule_#__empl_places_id_fk`
        foreign key (placeID) references `#__empl_places` (id)
            on update cascade on delete cascade,
    constraint `#__empl_schedule_#__empl_work_id_fk`
        foreign key (workID) references `#__empl_work` (id)
            on update cascade on delete cascade
)
    comment 'Расписание работы волонтёров';

create index `#__empl_schedule_curator_index`
    on `#__empl_schedule` (curator);

