create table if not exists account
(
    acc_id       int auto_increment
        primary key,
    username     varchar(255)                         not null,
    password     varchar(64)                          not null,
    display_name varchar(255)                         not null,
    email        varchar(255)                         null,
    is_active    tinyint(1) default 1                 null,
    created_at   timestamp  default CURRENT_TIMESTAMP not null,
    updated_at   timestamp  default CURRENT_TIMESTAMP not null
);

create table if not exists post
(
    post_id      int auto_increment
        primary key,
    acc_id       int                                 not null,
    post_content varchar(1024)                       null,
    created_at   timestamp default CURRENT_TIMESTAMP not null,
    updated_at   timestamp default CURRENT_TIMESTAMP not null,
    constraint post_ibfk_1
        foreign key (acc_id) references account (acc_id)
            on delete cascade
);

create table if not exists comment
(
    comment_id      int auto_increment
        primary key,
    comment_content varchar(1024)                       not null,
    post_id         int                                 not null,
    acc_id          int                                 not null,
    created_at      timestamp default CURRENT_TIMESTAMP null,
    updated_at      timestamp default CURRENT_TIMESTAMP null,
    constraint FK_Account_Comment_acc_id
        foreign key (acc_id) references account (acc_id),
    constraint FK_Post_Comment_post_id
        foreign key (post_id) references post (post_id)
);

create index acc_id
    on post (acc_id);


