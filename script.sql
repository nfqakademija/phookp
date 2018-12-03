drop table if exists `competition`;
create table competition
(
  id                          int auto_increment
    primary key,
  competition_name            varchar(90)  not null,
  competition_date            datetime     not null,
  competition_duration        int          not null,
  competition_organiser       varchar(90)  not null,
  competition_organiser_email varchar(90)  not null,
  competition_type            varchar(30)  not null,
  competition_approved        tinyint(1)   not null,
  competition_status          varchar(30)  not null,
  competition_teams_count     int          not null,
  competition_weighings_count int          not null,
  competition_link            varchar(255) null,
  competition_rules           varchar(255) null,
  competition_location        varchar(255) null
)
  collate = utf8mb4_unicode_ci;

drop table if exists `hash`;
create table hash
(
  id             int auto_increment
    primary key,
  competition_id int         not null,
  hash           varchar(40) not null,
  constraint FK_D1B862B87B39D312
    foreign key (competition_id) references competition (id)
)
  collate = utf8mb4_unicode_ci;

create index IDX_D1B862B87B39D312
on hash (competition_id);

drop table if exists `team`;
create table team
(
  id                 int auto_increment
    primary key,
  competition_id     int         not null,
  team_name          varchar(45) not null,
  sector_nr          int         null,
  first_team_member  varchar(45) null,
  third_team_member  varchar(45) null,
  second_team_member varchar(45) null,
  constraint FK_C4E0A61F7B39D312
    foreign key (competition_id) references competition (id)
)
  collate = utf8mb4_unicode_ci;

create index IDX_C4E0A61F7B39D312
on team (competition_id);

drop table if exists `weighing`;
create table weighing
(
  id             int auto_increment
    primary key,
  competition_id int      not null,
  weighing_time  datetime null,
  weighing_nr    int      not null,
  constraint FK_8FEC4CFC7B39D312
    foreign key (competition_id) references competition (id)
)
  collate = utf8mb4_unicode_ci;

drop table if exists `result`;
create table result
(
  id           int auto_increment
    primary key,
  weighing_id  int        not null,
  weigh        int        not null,
  special_fish tinyint(1) not null,
  team_id      int        not null,
  constraint FK_136AC113296CD8AE
    foreign key (team_id) references team (id),
  constraint FK_136AC1132FEFE151
    foreign key (weighing_id) references weighing (id)
)
  collate = utf8mb4_unicode_ci;

create index IDX_136AC113296CD8AE
on result (team_id);

create index IDX_136AC1132FEFE151
on result (weighing_id);

create index IDX_8FEC4CFC7B39D312
on weighing (competition_id);


INSERT INTO symfony.competition (id, competition_name, competition_date, competition_duration, competition_organiser, competition_organiser_email, competition_type, competition_approved, competition_status, competition_teams_count, competition_weighings_count, competition_link, competition_rules, competition_location) VALUES (6, 'Punios taur 2018', '2018-05-04 00:00:00', 2, 'Pikts Karpis', 'mantas@carpro.lt', 'total', 1, 'finished', 12, 1, 'https://www.facebook.com/events/2023564937932326/', 'Dalyvis atva~iavimas / var~ymas: gegu~s 4 d. iki 13.00 val.
Var~ybs atidarymas ir burts traukimas: gegu~s 4 d. 13.00 val. 
Dalyviai vyksta / sektorius, pasiruoaimas var~yboms: gegu~s 4 d. 13.15 - 15.00 val.
Var~ybs startas: gegu~s 4 d. 15.00 val.
', 'DidelesZuvys.lt - Margirio g. 12, LT-64057 Punia, Lithuania');
INSERT INTO symfony.competition (id, competition_name, competition_date, competition_duration, competition_organiser, competition_organiser_email, competition_type, competition_approved, competition_status, competition_teams_count, competition_weighings_count, competition_link, competition_rules, competition_location) VALUES (7, 'TOP5 Punia 2018', '2018-09-13 00:00:00', 3, 'Pikts Karpis', 'mantas@carpro.lt', 'top5', 1, 'finished', 7, 3, 'https://www.facebook.com/events/240567726665093/', 'Dalyvis atva~iavimas / var~ymas: rugsjo 13 d. iki 11.00 val.
Var~ybs atidarymas ir burts traukimas: rugsjo 13 d. 11.00 val. 
Dalyviai vyksta / sektorius, pasiruoaimas var~yboms: rugsjo 13 d. 11.20 - 13.00 val.
Var~ybs startas: rugsjo 13 d. 13.00 ', 'DidelesZuvys.lt - Margirio g. 12, LT-64057 Punia, Lithuania');
INSERT INTO symfony.hash (id, competition_id, hash) VALUES (5, 6, '70578a0eb174eb912d2b2bb0c3103a12');
INSERT INTO symfony.hash (id, competition_id, hash) VALUES (6, 7, '219632ee70ff60361e803f06959e9877');

INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (8, 6, 'Mindaugas Mikniunas', 1, 'Mindaugas Mikniunas', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (9, 6, 'Vitalijus Grizas', 2, 'Vitalijus Grizas', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (10, 6, 'Saulius Jezukevicius', 3, 'Saulius Jezukevicius', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (11, 6, 'Lukas Buivydas', 4, 'Lukas Buivydas', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (12, 6, 'Lukas Stancelis', 5, 'Lukas Stancelis', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (13, 6, 'Darius Peza', 6, 'Darius Peza', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (14, 6, 'Paulius Banionis', 7, 'Paulius Banionis', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (15, 7, '3 1/4 Team', 1, '3 1/4 Team', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (16, 7, 'Judex', 2, 'Judex', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (17, 7, 'Justeam', 3, 'Justeam', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (18, 7, 'Cyprinus Carpio Club', 4, 'Cyprinus Carpio Club', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (19, 7, '20+', 5, '20+', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (20, 7, 'EME Carp Brothers', 6, 'EME Carp Brothers', null, null);
INSERT INTO symfony.team (id, competition_id, team_name, sector_nr, first_team_member, third_team_member, second_team_member) VALUES (21, 7, 'Tinko Broliai', 7, 'Tinko Broliai', null, null);
INSERT INTO symfony.weighing (id, competition_id, weighing_time, weighing_nr) VALUES (7, 6, '2018-11-29 00:46:34', 2);
INSERT INTO symfony.weighing (id, competition_id, weighing_time, weighing_nr) VALUES (8, 7, '2018-11-29 01:07:02', 2);
INSERT INTO symfony.weighing (id, competition_id, weighing_time, weighing_nr) VALUES (9, 7, '2018-11-29 01:10:00', 3);
INSERT INTO symfony.weighing (id, competition_id, weighing_time, weighing_nr) VALUES (10, 7, '2018-11-29 01:12:05', 4);

INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (74, 7, 5376, 1, 9);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (75, 7, 5550, 1, 9);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (76, 7, 6775, 1, 9);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (77, 7, 14125, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (78, 7, 7500, 1, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (79, 7, 5750, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (80, 7, 8550, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (81, 7, 7700, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (82, 7, 10625, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (83, 7, 8575, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (84, 7, 5475, 1, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (85, 7, 8150, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (86, 7, 7025, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (87, 7, 12150, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (88, 7, 7825, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (89, 7, 14725, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (90, 7, 10600, 0, 10);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (91, 7, 8575, 1, 11);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (92, 7, 23375, 0, 11);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (93, 7, 14050, 0, 11);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (94, 7, 5325, 1, 12);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (95, 7, 5525, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (96, 7, 10150, 1, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (97, 7, 9175, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (98, 7, 9475, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (99, 7, 4450, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (100, 7, 8000, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (101, 7, 8325, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (102, 7, 6150, 1, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (103, 7, 8, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (104, 7, 7100, 1, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (105, 7, 9050, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (106, 7, 8175, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (107, 7, 14025, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (108, 7, 13075, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (109, 7, 10425, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (110, 7, 8650, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (111, 7, 12075, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (112, 7, 14825, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (113, 7, 10350, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (114, 7, 6375, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (115, 7, 12025, 0, 13);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (116, 8, 15550, 0, 15);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (117, 8, 13950, 0, 15);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (119, 8, 11425, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (120, 8, 10000, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (121, 8, 17200, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (122, 8, 11900, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (123, 8, 11625, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (124, 8, 21550, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (125, 8, 7700, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (126, 8, 8775, 0, 18);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (127, 8, 14450, 0, 19);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (128, 8, 8800, 0, 19);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (129, 8, 9750, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (130, 8, 10825, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (131, 8, 8625, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (132, 8, 18375, 0, 21);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (133, 8, 17525, 0, 21);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (134, 8, 6575, 0, 21);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (135, 9, 7075, 0, 21);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (136, 9, 12275, 0, 21);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (137, 9, 11975, 0, 21);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (138, 9, 12150, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (139, 9, 9025, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (140, 9, 10100, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (141, 9, 12175, 0, 19);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (142, 9, 10125, 0, 19);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (143, 9, 5875, 0, 18);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (144, 9, 24850, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (145, 9, 12825, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (146, 9, 13525, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (147, 9, 10650, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (148, 9, 12750, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (149, 9, 11550, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (150, 9, 21125, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (151, 9, 12450, 0, 15);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (152, 9, 8550, 0, 15);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (153, 10, 14300, 0, 15);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (154, 10, 11650, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (155, 10, 10175, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (156, 10, 16950, 0, 16);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (157, 10, 13650, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (158, 10, 16800, 0, 17);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (159, 10, 16275, 0, 18);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (160, 10, 6350, 0, 19);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (161, 10, 14000, 0, 20);
INSERT INTO symfony.result (id, weighing_id, weigh, special_fish, team_id) VALUES (162, 10, 12225, 0, 21);

   