
DROP TABLE IF EXISTS Temperature;
DROP TABLE IF EXISTS DoorStatus;
DROP TABLE IF EXISTS ItemList;
DROP TABLE IF EXISTS PowerStatus;



CREATE TABLE Temperature (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	temperature float(4,2),
	check_in_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP/* automatically update time  */
);

INSERT INTO Temperature VALUES 
('1','20.23','2008-08-08 22:20:46'),
('2','21.23','2008-08-08 22:22:32'),
('3','22.23','2008-08-08 22:22:33'),	
('4','23.23','2008-08-08 22:26:32'),
('5','23.23','2008-08-08 22:26:34'),
('6','23.23','2008-08-08 22:26:35'),
('7','23.23','2008-08-08 22:26:36'),
('8','23.23','2008-08-08 22:26:37'),
('9','23.23','2008-08-08 22:26:38'),
('10','23.23','2008-08-08 22:26:39'),
('11','23.23','2008-08-08 22:26:40'),
('12','23.23','2008-08-08 22:26:41');


 

CREATE TABLE DoorStatus (
	id int(11) NOT NULL PRIMARY KEY,
	door_status tinyint(1) NOT NULL, /* boolean type in mysql */
	check_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

INSERT INTO DoorStatus VALUES 
(1,1,'2008-08-08 22:26:32');



CREATE TABLE ItemList (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	serial_number varchar(32) NOT NULL,
	product_name varchar(32),
	item_status tinyint(1) NOT NULL  /* boolean type in mysql */
);

INSERT INTO ItemList VALUES
('1','2018-3-21','apple',1),
('2','2018-3-21','apple',1),
('3','2018-3-21','apple',1),
('4','2018-3-21','apple',1),
('5','2018-3-21','apple',1);


SELECT * FROM ItemList 





CREATE TABLE PowerStatus (
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	power_status tinyint(1) NOT NULL,
	check_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP/*automatically update time*/
);

INSERT INTO PowerStatus VALUES 
(1,0,'2008-08-08 22:26:32');







