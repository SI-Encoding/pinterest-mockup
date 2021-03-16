/*If tables with the name 'users' and 'blogs' already exist, then delete them.*/
drop table if exists users;
drop table if exists blogs;

/*Create the 'users' table*/
CREATE TABLE users
( username varchar(255), /*Username is of type varchar (variable character field) and has a length of 255 (can hold 0 - 255 characters)*/
email varchar(255),
password varchar(255),
PRIMARY KEY (username) /*Each user can be identified with their username*/
);

/*Create the 'blogs' table*/
CREATE TABLE blogs
(blogid int AUTO_INCREMENT,
created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
username varchar(255),
category varchar(255),
title varchar(255),
content varchar(255),
PRIMARY KEY (blogid)
);

/*Add users and blogs to database*/
Insert into users values ('James', 'james@gmail.com', '1234');
Insert into users values ('Jane', 'jane@gmail.com', '1234');
Insert into blogs(username, category, title, content) values ('Jane', 'Bedroom','How to Make Google Docs Look Like Dropbox Paper', 'I love Dropbox Paper. Some people have tons of complaints about it, but I’m not one of those people. It’s one of my favorite tools and I use it for all kinds of work and home documents.');
insert into blogs(username, category, title, content) VALUES ('James', 'Washroom','The best Data Science courses', 'One of the best courses I have taken is INFS7901');
insert into blogs(username, category, title, content) VALUES ('James', 'Garage','How to Build a Data Science Portfolio', 'The best way to build a data science portfolio is to do a project');
insert into blogs(username, category, title, content) VALUES ('Jane', 'Living Room','Blockchain Could Unlock Vital Funding to Tackle Climate Change', 'Billions of dollars in promised funding is failing to reach the world’s poorest countries — but technologists have a fix in mind .....');
