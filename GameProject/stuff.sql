create table users (
                       ID serial primary key,
                       Name varchar(16) not null,
                       Pass varchar(64) not null
);

alter table maps
    add column UserID_Creator serial not null;

alter table maps
    add constraint fk_UserID_Creator foreign key (UserID_Creator) references users (ID) match full;

select * from maps;

select * from users;

insert into users (Name, Pass) VALUES (
                                          'AdminTest',
                                          'testPass'
                                      );

alter table users
    drop column pass;

alter table users
    add column pass Varchar(255);

SELECT * FROM users WHERE name = 'this';