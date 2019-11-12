drop database if exists web20192games;
create database web20192games;
use web20192games;

create table platforms (
    id integer primary key auto_increment,
    name varchar(255)
);

create table games (
    id integer primary key auto_increment,
    name varchar(255),
    date_added timestamp,
    platform_id integer,

    foreign key (platform_id) references platforms(id)
);