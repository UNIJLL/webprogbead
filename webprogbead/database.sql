create database webprogbead character set utf8 collate utf8_hungarian_ci;
use webprogbead;

create table userdata (
    id int not null auto_increment,
    email varchar(100) not null unique,
    password char(128),
    username varchar(100) not null unique,
    fullname varchar(255),
    lastlogin datetime,
    my_session_id char(128),
    my_session_id_expire datetime,
    last_pwchange datetime,
    verification_code char(128),
    verification_expire datetime,
    primary key (id),
    index(email),
    index(username),
    index(verification_code)
);

create table messages (
    id int not null auto_increment,
    received datetime,
    user_id int,
    name varchar(100),
    email varchar(100),
    subject varchar(100),
    message text,
    primary key (id),
    index(received),
    index(email)
);
