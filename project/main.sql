CREATE DATABASE kettering_work_term;

CREATE TABLE activity (
  PRIMARY KEY (id),
  name varchar(255),
  coordinator varchar(255),
  description varchar(255)
);

#CREATE TABLE invitations (
#  activity_id
#  student_id
#);

CREATE TABLE address (
  PRIMARY KEY (aid),
  street varchar(255),
  city varchar(255),
  state varchar(255)
  zip int
);

CREATE TABLE company (
  PRIMARY KEY (cid),
  name varchar(255)
);

CREATE TABLE student (
  PRIMARY KEY (sid),
  name varchar(255),
  degree varchar(255),
  major varchar(255),
  class_standing varchar(255)
);

CREATE TABLE residence (
  PRIMARY KEY (id),
  rent varchar(255)
);

CREATE TABLE vehicle (
  PRIMARY KEY (vid),
  vin varchar(255),
  make varchar(255),
  model varchar(255),
  capacity int
);

CREATE TABLE contact_info (
  PRIMARY KEY (ciid),
  email varchar(255),
  work_phone varchar(255),
  mobile_phone varchar(255),
);
