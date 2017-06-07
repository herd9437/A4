CREATE DATABASE hotel_database

CREATE TABLE customer (
	cust_name varchar(255),
	address varchar(255),
	cc_type varchar(255),
	cc_num varchar(255),
	telephone varchar(255),
	PRIMARY KEY (cust_name)
);

CREATE TABLE guest (
	guest_name varchar(255),
	room_desired varchar(255),
	num_people int,
	arrival_time time,
	expected_departure date,
	confirmation_num int,
	FOREIGN KEY(guest_name) REFERENCES customer(cust_name),
	FOREIGN KEY(room_desired) REFERENCES guest_room(room_num),
	PRIMARY KEY (confirmation_num)
);

CREATE TABLE guest_room (
	room_type varchar(255),
	date_reserved date,
	room_num varchar(255),
	PRIMARY KEY (room_num)
);

CREATE TABLE meeting_room_reserver (
	reserver_name varchar(255),
	room_requested varchar(255),
	date_reserved date,
	special_equipment boolean,
	food_drink_service boolean,
	deposit_paid boolean,
	renter_ID int,
	FOREIGN KEY(reserver_name) REFERENCES customer(cust_name),
	FOREIGN KEY(room_requested) REFERENCES meeting_room(room_num),
	PRIMARY KEY (renter_ID)
);

CREATE TABLE meeting_room (
	room_num varchar(255),
	PRIMARY KEY (room_num)
);

CREATE TABLE concession_renter(
	renter_name varchar(255),
	concession_location_num varchar(255),
	date_of_last_payment date,
	type_of_buisness varchar(255),
	renter_ID varchar(255),
	FOREIGN KEY(renter_name) REFERENCES customer(cust_name),
	FOREIGN KEY(concession_location_num) REFERENCES concession_location(location_num),
	PRIMARY KEY (renter_ID)
);

CREATE TABLE concession_location(
	monthly_rent varchar(255),
	location_num varchar(255),
	PRIMARY KEY (location_num)
);

CREATE TABLE banquet_reserver(
	reserver_name varchar(255),
	room_num_requested varchar(255),
	deposit_paid boolean,
	num_persons int,
	contact_phone_num varchar(255),
	contract_date date,
	time_reserved_start time,
	time_reserved_end time,
	type_of_event varchar(255),
	signed_contract boolean,
	floral_arrangements varchar(255),
	table_decor varchar(255),
	contract_number int,
	menu_option int,
	FOREIGN KEY(reserver_name) REFERENCES customer(cust_name),
	FOREIGN KEY(room_num_requested) REFERENCES banquet_room(room_num),
	PRIMARY KEY (contract_number)
);

CREATE TABLE banquet_room(
	room_num int,
	max_occupancy int,
	PRIMARY KEY (room_num)
);


--data

INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);

INSERT INTO customer (cust_name, address, telephone)
VALUES ("Joe Harrison", "404 Fake st, OH", "(483) 432-4333");

INSERT INTO customer (cust_name, address, telephone)
VALUES ("Pheobe Smith", "953 Wrong ave, FL", "(232) 394-9434");

INSERT INTO customer (cust_name, address, telephone)
VALUES ("Calvin Hobbs", "843 Somewhere dr, MI", "(810) 343-2358");

INSERT INTO guest (guest_name, room_desired, num_people, confirmation_num)
VALUES ("Joe Harrison", "g3-02", 1, 234323);

INSERT INTO guest (guest_name, room_desired, num_people, confirmation_num)
VALUES ("Calvin Hobbs", "g1-01", 2, 234344);

INSERT INTO guest_room (room_num)
VALUES ("g1-01");

INSERT INTO guest_room (room_num)
VALUES ("g1-02");

INSERT INTO guest_room (room_num)
VALUES ("g1-03");

INSERT INTO guest_room (room_num)
VALUES ("g2-01");

INSERT INTO guest_room (room_num)
VALUES ("g2-02");

INSERT INTO guest_room (room_num)
VALUES ("g2-03");

INSERT INTO guest_room (room_num)
VALUES ("g3-01");

INSERT INTO guest_room (room_num)
VALUES ("g3-02");

INSERT INTO guest_room (room_num)
VALUES ("g3-03");



/*
--query examples

SELECT * FROM customer;

SELECT cust_name FROM customer;

SELECT cust_name
FROM customer
WHERE cust_name IN (SELECT guest_name FROM guest);

SELECT room_num
FROM guest_room
WHERE room_num IN (SELECT room_desired FROM guest);

--SELECT address FROM customer WHERE cust_name == "Calvin Hobbs";

*/