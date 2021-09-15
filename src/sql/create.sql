CREATE DATABASE teacher_schedule;
USE teacher_schedule;

CREATE TABLE teachers (
id int NOT NULL AUTO_INCREMENT,
first_name varchar(255) NOT NULL,
last_name varchar(255) NOT NULL,
degree varchar(255) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE `groups` (
id int NOT NULL AUTO_INCREMENT,
number int NOT NULL,
course int NOT NULL,
faculty varchar(255) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE schedule (
id int NOT NULL AUTO_INCREMENT,
subject varchar(255) NOT NULL,
teacher_id int NOT NULL,
group_id int,
day int NOT NULL,
week int,
lesson int NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (teacher_id) 
	REFERENCES teachers (id)
    ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (group_id) 
	REFERENCES `groups` (id)
    ON UPDATE CASCADE ON DELETE CASCADE,
CHECK (day BETWEEN 1 AND 7),
CHECK (week BETWEEN 1 AND 2)
);

INSERT teachers(first_name, last_name, degree)
VALUES 
('Serhiy', 'Shklyarsky', 'Associate Professor'),
('Valerii', 'Kraskevych', 'Full Professor'),
('Yurii', 'Yurchenko', 'Assistant');

INSERT `groups`(number, course, faculty)
VALUES
(10, 3, 'FIT'),
(15, 4, 'FEMP'),
(3, 1, 'FIT');

INSERT schedule (subject, teacher_id, group_id, day, week, lesson)
VALUES
('System Analysis', 2, 2, 1, 1, 3),
('System Analysis', 2, 2, 1, 1, 4),
('System Analysis', 2, 2, 3, 2, 1),
('System Analysis', 2, 2, 3, 2, 2),
('Algorithm Theory', 3, 3, 5, 1, 1),
('Algorithm Theory', 3, 3, 5, 1, 2),
('Algorithm Theory', 3, 3, 4, 2, 1),
('Algorithm Theory', 3, 3, 4, 2, 2),
('Server Systems Administration', 3, 1, 5, 1, 3),
('Server Systems Administration', 3, 1, 5, 1, 4),
('Corporate information systems', 1, 3, 2, 1, 5),
('Corporate information systems', 1, 3, 2, 1, 6);
