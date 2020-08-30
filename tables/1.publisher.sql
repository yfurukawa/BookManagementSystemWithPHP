DROP TABLE BookManage.publisher;

CREATE TABLE BookManage.publisher (
  publisherId SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  publisherName varchar(100),
  publisherCode varchar(7) UNIQUE
);

CREATE INDEX publisherId_index ON BookManage.publisher(publisherId);

INSERT INTO publisher (publisherName, publisherCode) VALUE ("翔泳社", "7981");
INSERT INTO publisher (publisherName, publisherCode) VALUE ("マイナビ", "8399");
INSERT INTO publisher (publisherName, publisherCode) VALUE ("O'REILLY", "87311");
INSERT INTO publisher (publisherName, publisherCode) VALUE ("技術評論社", "297");