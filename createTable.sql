CREATE TABLE IF NOT EXISTS students (id int(11) PRIMARY KEY AUTO_Increment, firstName CHAR(100) NOT NULL DEFAULT '', lastName CHAR(100) NOT NULL DEFAULT '',
birthday CHAR(10) NOT NULL DEFAULT '', email CHAR(120) NOT NULL DEFAULT '', phoneNumber CHAR(120) NOT NULL DEFAULT '',
language ENUM('ENGLISH', 'FRENCH') NOT NULL DEFAULT 'ENGLISH', campus CHAR(100) NOT NULL DEFAULT '', program varchar(200) NOT NULL DEFAULT 0,
password CHAR(100) NOT NULL DEFAULT '');


CREATE TABLE IF NOT EXISTS programs (id int(11) PRIMARY KEY AUTO_Increment, programType CHAR(20) NOT NULL DEFAULT '', programName CHAR(200) NOT NULL DEFAULT '' );

INSERT INTO programs (programType, programName) VALUES ('AEC', 'e-Business-online (LEACE)'),
('AEC', 'Interior Design - Online(NTA1P)'),
('AEC', 'Video Game 3D Modeling - online (NTLOY)'),
('DEC', 'Business Management'),
('DEC', 'Early Childhood Education - online (322A0)'),
('DEC', 'Fashion Marketing - Online (571C0)'),
('DEP', 'Fashion Design on-campus (57A0)'),
('DEP', 'Social Sciences - on-campus (300A1)'),
('DEP', 'Special Care Counselling - on-campus'),
('ASP', 'Fashion Design on-campus (57A0)'),
('ASP', 'Social Sciences - on-campus (300A1)'),
('ASP', 'Special Care Counselling - on-campus (351A0)')
;