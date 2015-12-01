/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     20/11/2015 8:53:11 AM                        */
/*==============================================================*/


drop table if exists IMAGES;

drop table if exists POKEMON;

/*==============================================================*/
/* Table: IMAGES                                                */
/*==============================================================*/
create table IMAGES
(
   URL                  varchar(1000),
   POKEMON_ID           int not null,
   primary key (POKEMON_ID)
);

/*==============================================================*/
/* Table: POKEMON                                               */
/*==============================================================*/
create table POKEMON
(
   ID                   int not null,
   NAME                 varchar(50) not null,
   THUMBNAIL            varchar(1000),
   GIF                  varchar(1000),
   AVARTAR              varchar(1000),
   HEIGHT               varchar(20) not null,
   WEIGHT               varchar(20) not null,
   HP                   int,
   ATK                  int,
   DEF                  int,
   SATK                 int,
   SDEF                 int,
   SPD                  int,
   STATUS               int,
   primary key (ID)
);

