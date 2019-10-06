CREATE DATABASE todo;

use todo;

CREATE TABLE task (
    id int auto_increment primary key,
    description varchar(255) not null,
    done boolean default false,
    added timestamp default current_timestamp
);