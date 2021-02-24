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






CREATE TABLE "admin" (
  "admin_id" SERIAL NOT NULL,
  "adm_name" varchar(50) not null,
  "middle_name" varchar(50),
  "last_name" varchar(50) not null,
  "birthdate" date not null,
  "zoomoffice" varchar(250),
  "email" varchar(50) not null,
  "password" varchar(50) not null,
  PRIMARY KEY ("admin_id")
);

CREATE TABLE "teacher" (
  "teacher_id" SERIAL NOT NULL,
  "adm_name" varchar(50) not null,
  "middle_name" varchar(50),
  "last_name" varchar(50) not null,
  "birthdate" date (submit_time, 'DD/MM/YYYY') not null,
  "zoomoffice" varchar(250),
  "email" varchar(50) not null,
  "password" varchar(50) not null,
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
