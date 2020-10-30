create table scriptures
(
    ID      serial primary key,
    book    varchar(255)  not null,
    chapter integer       not null,
    verse   integer       not null,
    content varchar(2048) not null
);

insert into scriptures (book, chapter, verse, content)
values ('John',
        1,
        5,
        'And the light shineth in darkness; and the darkness comprehended it not.');

insert into scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants',
        88,
        49,
        'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

insert into scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants', 93, 28,
        'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

insert into scriptures (book, chapter, verse, content)
VALUES ('Mosiah', 16, 9,
        'He is the alight and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');



create table topic
(
    ID   serial primary key,
    Name varchar(32) not null
);

insert into topic (Name)
values (
           'Faith'
       );


insert into topic (Name)
values (
           'Sacrifice'
       );

insert into topic (Name)
values (
           'Charity'
       );

create table scripture_topic
(
    ID          serial primary key,
    ScriptureID serial not null,
    TopicID     serial not null,
    constraint fk_scripture foreign key (ScriptureID) references scriptures (ID),
    constraint fk_topic foreign key (TopicID) references topic (ID)
);

insert into scripture_topic (ScriptureID, TopicID)
values (
           (select ID from scriptures where book='John' and chapter=1 and verse=5),
           (select ID from topic where name='Faith')
       );