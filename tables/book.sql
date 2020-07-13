DROP TABLE BookManage.book;

CREATE TABLE BookManage.book (
  isbn char(13) PRIMARY KEY,
  title varchar(255) NOT NULL,
  publisherId SMALLINT UNSIGNED NOT NULL,
  authorId TINYINT UNSIGNED NOT NULL,
  roomId TINYINT UNSIGNED,
  CONSTRAINT `fk_publisher`
    FOREIGN KEY (publisherId) REFERENCES publisher(publisherId)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_author`
    FOREIGN KEY (authorId) REFERENCES author(authorId)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_room`
    FOREIGN KEY (roomId) REFERENCES room(roomId)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
 );

CREATE INDEX isbn_index ON BookManage.book(isbn);


