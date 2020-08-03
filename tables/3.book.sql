DROP TABLE BookManage.book;

CREATE TABLE BookManage.book (
  isbn char(13) PRIMARY KEY,
  title varchar(255) NOT NULL,
  description varchar(1000),
  publisherId SMALLINT UNSIGNED,
  thumbnail varchar(255),
  roomId TINYINT UNSIGNED,
  tags varchar(255),
  CONSTRAINT `fk_publisher`
    FOREIGN KEY (publisherId) REFERENCES publisher(publisherId)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_room`
    FOREIGN KEY (roomId) REFERENCES room(roomId)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
 );

CREATE INDEX isbn_index ON BookManage.book(isbn);


