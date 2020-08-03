DROP TABLE BookManage.isbnTagMap;

CREATE TABLE BookManage.isbnTagMap (
  isbn CHAR(13) NOT NULL,
  tagId INT UNSIGNED NOT NULL,
  PRIMARY KEY (isbn, tagId),
  CONSTRAINT `fk_map_isbn`
    FOREIGN KEY (isbn) REFERENCES book(isbn)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_tagid`
    FOREIGN KEY (tagId) REFERENCES tag(tagId)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
);
