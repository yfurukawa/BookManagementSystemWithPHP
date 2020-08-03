DROP TABLE BookManage.room;

CREATE TABLE BookManage.room (
  roomId TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  roomName varchar(30)
);

CREATE INDEX roomId_index ON BookManage.room(roomId);

