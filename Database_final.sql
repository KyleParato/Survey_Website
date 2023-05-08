
drop database if exists Survey;
create database Survey;

use Survey;

create table Users(
	Email varchar(255) primary key,
    User_Password varchar(255) not null,
    Fname varchar(255) not null,
    Lname varchar(255) not null,
    Phone_number varchar(255) not null,
    user_ts timestamp,
    constraint uk_phonenum unique (Phone_number)
);

create table Survey(
	Survey_Code int auto_increment Primary key,
    Survey_Name varchar(255),
    Survey_description varchar(255),
    Link varchar(255),
    User_Email varchar(255),
    Start_date_time varchar(255),
    End_date_time   varchar(255),
    survey_ts Timestamp,
    constraint uk_name unique (Survey_Name),
    constraint uk_link unique (Link),
    foreign key (User_Email) references users(Email)
);

create table Question(
	Question_ID int auto_increment primary key,
	QName varchar(255),
	QDescription varchar(255),
	QType varchar(255),
	Survey_Code int,
	question_ts Timestamp,
    foreign key (Survey_Code) references survey(Survey_Code)
);

create table Question_option(
	QOption_ID int auto_increment primary key,
    QOption varchar(255),
    QOrder int,
    Question_ID int,
    qoption_ts timestamp,
    foreign key (Question_ID) references question(Question_ID)
);

create table Response(
	Response_ID int auto_increment primary key,
    user_email varchar(255),
    Survey_Code int,
    response_ts Timestamp,
    foreign key (Survey_Code) references survey(Survey_Code),
	foreign key (user_email) references users(Email)
);

create table Answer(
	Answer_ID int auto_increment primary key,
    Answer_Value varchar(255),
    Response_ID int,
    Question_ID int,
    answer_ts Timestamp,
    foreign key (Response_ID) references response(Response_ID),
	foreign key (Question_ID) references question(Question_ID)
);


insert into users values ("Admin", "password","admin","admin","1",current_timestamp),
						 ("User1@Email.com","Password123", "UserFirstName", "UserLastName", "123-456-7890", current_timestamp),
						 ("User2@Email.com","Password456*","TwoFirstName",  "TwoLastName",   "48201820490", current_timestamp);
					
insert into survey (Survey_Name, Survey_Description, Link, User_Email,Start_Date_Time,End_Date_Time,survey_ts)
	values ("Survey1","First Survey", "Survey_Link_Survey1","User1@Email.com","may 4,2023","may 7,2023", current_timestamp),
		   ("Survey2","Second Survey","Survey_Link_Survey2","User2@Email.com","may 4,2023","may 7,2023", current_timestamp);
           
insert into question (QName,QDescription,QType,Survey_Code,question_ts) values
	("Did Issac Newton invent Gravity","Read the Question Carefully","T/F",1,current_timestamp),
    ("Who invented gravity?","No Hints","M/C",1,current_timestamp),
    ("Choose your favorite food", "Must choose one", "MC", 2, current_timestamp);
    
insert into question_option (qoption, qorder,question_id,qoption_ts) values
	("True",1,1,current_timestamp),("False",2,1,current_timestamp),
    ("Issac Newton",1,2,current_timestamp),("Bob",2,2,current_timestamp),("Dave",3,2,current_timestamp),("Bach",4,2,current_timestamp),
    ("Pizza",1,2,current_timestamp),("Tacos",2,2,current_timestamp),("Salad",3,2,current_timestamp);
insert into response (user_email,survey_code,response_ts) values
	("User1@Email.com",1,current_timestamp),("User2@Email.com",1,current_timestamp),
    ("User1@Email.com",2,current_timestamp),("User2@Email.com",2,current_timestamp);

insert into answer (answer_value,response_id,question_id,answer_ts) values
	("True",1,1,current_timestamp),("False",2,1,current_timestamp),
    ("Pizza",3,1,current_timestamp),("Salad",4,1,current_timestamp);
