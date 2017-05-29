CREATE TABLE activity (
  name varchar(255),
  coordinator_email varchar(255),
  description varchar(1023),
  start_time TIME,
  start_date DATE,
  end_time TIME,
  end_date DATE,
  activity_id integer AUTO_INCREMENT UNIQUE,
  address_id int,
  FOREIGN KEY(address_id) REFERENCES address(address_id),
  FOREIGN KEY(coordinator_email) REFERENCES student(email),
  PRIMARY KEY (activity_id)
);

CREATE TABLE address (
  address_id integer UNIQUE,
  PRIMARY KEY (address_id),
  street varchar(255),
  city varchar(255),
  state varchar(255),
  zip_code varchar(16)
);

CREATE TABLE company (
  comp_name varchar(255),
  description varchar(1023),
  address_id int,
  PRIMARY KEY (comp_name),
  FOREIGN KEY(address_id) REFERENCES address(address_id)
);

CREATE TABLE student (
  email varchar(255) NOT NULL UNIQUE,
  phone_number varchar(255),
  name varchar(255) NOT NULL,
  degree varchar(255) NOT NULL,
  major varchar(255) NOT NULL,
  class_standing varchar(255),
  company_name varchar(255),
  residence_id integer,
  FOREIGN KEY(company_name) references company(name),
  FOREIGN KEY(residence_id) references residence(residence_id),
  PRIMARY KEY (email)
);

CREATE TABLE residence (
  residence_id integer UNIQUE,
  PRIMARY KEY (residence_id),
  landlord_email varchar(255),
  landlord_phone_num varchar(255),
  rent varchar(255),
  address_id int,
  residence_reviews varchar(10000),
  residence_image blob,
  FOREIGN KEY(address_id) REFERENCES ad	dress(address_id)
);

CREATE TABLE vehicle (
  vin_number int,
  make varchar(255) NOT NULL,
  model varchar(255) NOT NULL,
  capacity int,
  owner_email varchar(255) NOT NULL,
  FOREIGN KEY (owner_email) REFERENCES student(email),
  PRIMARY KEY (vin_number)
);
