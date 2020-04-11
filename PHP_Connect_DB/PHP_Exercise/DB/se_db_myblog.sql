create table account
(
    acc_id       int auto_increment
        primary key,
    username     varchar(255)                           not null,
    password     varchar(64)                            not null,
    display_name varchar(255)                           not null,
    email        varchar(255)                           null,
    is_active    tinyint(1) default 1                   null,
    created_at   timestamp  default current_timestamp() not null,
    updated_at   timestamp  default current_timestamp() not null
);

create table blog
(
    blog_id      int auto_increment
        primary key,
    acc_id       int                                   not null,
    blog_content varchar(1024)                         null,
    created_at   timestamp default current_timestamp() not null,
    updated_at   timestamp default current_timestamp() not null,
    constraint blog_ibfk_1
        foreign key (acc_id) references account (acc_id)
            on delete cascade
);

create index acc_id
    on blog (acc_id);


