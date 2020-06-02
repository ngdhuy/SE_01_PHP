create table if not exists account
(
    id           int auto_increment
        primary key,
    username     varchar(20)  null,
    password     varchar(20)  null,
    display_name varchar(256) null
);

create table if not exists post
(
    id         int auto_increment
        primary key,
    content    longtext null,
    account_id int      not null,
    constraint fk_post_account
        foreign key (account_id) references account (id)
);

create table if not exists comment
(
    id      int auto_increment
        primary key,
    content longtext null,
    post_id int      not null,
    constraint fk_comment_post1
        foreign key (post_id) references post (id)
);

create index fk_comment_post1_idx
    on comment (post_id);

create index fk_post_account_idx
    on post (account_id);


