DROP TABLE BookManage.room;

CREATE TABLE BookManage.room (
  roomId TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  roomName varchar(30)
);

CREATE INDEX roomId_index ON BookManage.room(roomId);

INSERT INTO BookManage.room (roomName) VALUES ("N/A");
INSERT INTO BookManage.room (roomName) VALUES ("書斎　東本棚（右）");
INSERT INTO BookManage.room (roomName) VALUES ("書斎　東本棚（左）");
INSERT INTO BookManage.room (roomName) VALUES ("書斎　南本棚");
INSERT INTO BookManage.room (roomName) VALUES ("書斎　西本棚");
INSERT INTO BookManage.room (roomName) VALUES ("廊下");
