DROP TABLE BookManage.publisher;

CREATE TABLE BookManage.publisher (
  publisherId SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  publisherName varchar(100),
  publisherCode char(4)
);

CREATE INDEX publisherId_index ON BookManage.publisher(publisherId);

