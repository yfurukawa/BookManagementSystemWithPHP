use BookManage;

drop table isbnTagMap;
drop table tag;
drop table author;
drop table book;
drop table room;
drop table publisher;

source tables/1.publisher.sql
source tables/2.room.sql
source tables/3.book.sql
source tables/4.author.sql
source tables/5.tag.sql
source tables/6.isbnTagMap.sql
