CREATE DATABASE Project_cms;

CREATE TABLE users
(
id int(11)	NOT NULL AUTO_INCREMENT,
username	varchar(100),
email	varchar(100),
password text,
profile_pic	text,
is_active	varchar(3),	-- is active define it as default yes
post_id	int(11)	,
role	varchar(10),
PRIMARY KEY(id)

CREATE TABLE category
(
  cat_id int NOT NULL AUTO_INCREMENT,
  cat_title varchar(50),
  PRIMARY KEY (cat_id)
);

CREATE TABLE posts
(post_id  NOT NULL AUTO_INCREMENT,
post_title     varchar(50),
post_category   varchar(50),
post_category_id int(11),
post_author    varchar(50),	
post_content  text,
post_date    varchar(25),
post_image   text,
post_status varchar(10),
PRIMARY KEY (post_id)
);


);

