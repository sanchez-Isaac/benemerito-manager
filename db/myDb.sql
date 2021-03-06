cd C:\Users\idsm_\OneDrive\Documents\BYU-I Online\ACSE 499 Senior Project\Project
heroku pg:psql
\dt 




drop table admin, class, class_assigned, student, teacher, comm_assist;





git status
git add . 
git status
git commit -m "       "

git push heroku master
git push origin master


heroku logs -t /*live changes*/






CREATE TABLE "admin" (
  "admin_id" SERIAL NOT NULL,
  "adm_name" varchar(50) not null,
  "middle_name" varchar(50),
  "last_name" varchar(50) not null,
  "birthdate" date not null,
  "zoomoffice" varchar(250),
  "email" varchar(50) not null,
  "password" varchar(500) not null,
  "home_phone" varchar(500) ,
  "mobile_phone" varchar(500) ,
  PRIMARY KEY ("admin_id")
);

CREATE TABLE "teacher" (
  "teacher_id" SERIAL NOT NULL,
  "adm_name" varchar(50) not null,
  "middle_name" varchar(50),
  "last_name" varchar(50) not null,
  "birthdate" date not null,
  "zoomoffice" varchar(250),
  "email" varchar(50) not null,
  "password" varchar(500) not null,
  "home_phone" varchar(500) ,
  "mobile_phone" varchar(500) ,
  PRIMARY KEY ("teacher_id")
);

CREATE TABLE "student" (
  "student_id" SERIAL NOT NULL,
  "stu_name" varchar(50) not null,
  "middle_name" varchar(50),
  "last_name" varchar(50) not null,
  "birthdate" date not null,
  "email" varchar(50) not null,
  "tutor_email" varchar(50) not null,
  "student_phone" varchar(500) not null,
  "tutor_phone" varchar(500) not null,
  PRIMARY KEY ("student_id")
);


CREATE TABLE "comm_assist" (
  "comm_assist_id" SERIAL NOT NULL,
  "comment" varchar(520),
  "comm_date" date NOT NULL DEFAULT CURRENT_DATE,
  "assistance" varchar (26),
  "class_id" int,
  "teacher_id" int,
  "student_id" int,   
  PRIMARY KEY ("comm_assist_id")
);



CREATE TABLE "class" (
  "class_id" SERIAL NOT NULL,
  "class_name" varchar(50) not null,
  "year_given" int not null,
  "semester" varchar(50) not null,  
  "class_assigned_id" int, 
  PRIMARY KEY ("class_id")
);




CREATE TABLE "class_assigned" (
  "class_assigned_id" SERIAL NOT NULL,
  "section" int not null,
  "class_id" int,
  "teacher_id" int,
  "student_id" int,   
  PRIMARY KEY ("class_assigned_id") 
);


ALTER TABLE "class_assigned" 
ADD FOREIGN KEY ("class_id") REFERENCES "class" ("class_id");
ALTER TABLE "class_assigned" 
ADD FOREIGN KEY ("class_id") REFERENCES "class" ("class_id");
ALTER TABLE "class_assigned" 
ADD FOREIGN KEY ("student_id") REFERENCES "student" ("student_id");
ALTER TABLE "class" 
ADD FOREIGN KEY ("class_assigned_id") REFERENCES "class_assigned" ("class_assigned_id");
ALTER TABLE "comm_assist" 
ADD FOREIGN KEY ("class_id") REFERENCES "class" ("class_id");
ALTER TABLE "comm_assist" 
ADD FOREIGN KEY ("class_id") REFERENCES "class" ("class_id");
ALTER TABLE "comm_assist" 
ADD FOREIGN KEY ("student_id") REFERENCES "student" ("student_id");


/*change the datatype*/
ALTER TABLE teacher
    ALTER COLUMN password TYPE varchar(800);



ALTER TABLE "student"
ADD "student_phone" varchar(500) not null;

ALTER TABLE "student"
ADD "tutor_phone" varchar(500) not null;
  

/*this is to create alter users by admin_id, admin id never changes*/
UPDATE admin
SET adm_name = 'Isaako'
    WHERE admin_id = 1;

/*this is to create a new user*/
INSERT INTO admin (adm_name, middle_name, last_name, birthdate, zoomoffice, email, password) 
VALUES (''); 


/*To create new students*/
INSERT INTO student (student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email)
VALUES (1, 'Fabian', 'Antonio', 'Hernandez Juarez', '1991,05,12','Test@gmail.com', 'Tutortest@gamil.com');

INSERT INTO student ( student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email)
VALUES (2, 'Arturo', '', 'Escobar Fernandez', '1991,05,12','Test@gmail.com', 'Tutortest@gamil.com');

INSERT INTO student (student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email)
VALUES (3, 'Jose', 'Pablo', 'Madero Sanchez', '1991,05,12','Test@gmail.com', 'Tutortest@gamil.com');

INSERT INTO student ( student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email)
VALUES (4, 'Jessica', 'Isabel', 'Martinez Elix', '1991,05,12','Test@gmail.com', 'Tutortest@gamil.com');

INSERT INTO student (student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email)
VALUES (5, 'Fernanda', '', 'Campos Collado', '1991,05,12','Test@gmail.com', 'Tutortest@gamil.com');

INSERT INTO student ( student_id, stu_name, middle_name, last_name, birthdate, email, tutor_email)
VALUES (6, 'Joseph', '', 'Blackburn', '1991,05,12','Test@gmail.com', 'Tutortest@gamil.com');
