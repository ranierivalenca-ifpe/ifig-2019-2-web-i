

create database web_2019_10_8;

use web_2019_10_8;

create table users (
    id    integer primary key auto_increment,
    login varchar(50),
    pass  varchar(64),
    email varchar(200)
);