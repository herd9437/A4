CREATE DATABASE car_rentals;

CREATE TABLE car (
  make varchar(255),
  model varchar(255),
  location varchar(255),
  color varchar(255),
  license_number varchar(255),
  state varchar(255),
  mileage varchar(255),
  vin varchar(255) NOT NULL UNIQUE,
  PRIMARY KEY (vin)
);

INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'jeep', 'wrangler', '', 'blue', '3UWA7G', 'florida', '7841', 'QJX968ND1X');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'jeep', 'cherokee', '', 'white', 'HKY591', 'michigan', '3351', '546UYISMCU');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'chrysler', '200', '', 'black', 'ZKWAA3', 'colorado', '1502', 'NBD3WO54AG');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'ford', 'taurus', '', 'tan', 'ED3D4F', 'new york', '658', 'PR6NSWDBVY');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'ford', 'fiesta', '', 'orange', 'KJC35C', 'kansas', '1509', 'W51B9UDW23');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'ford', 'mustang', '', 'green', 'CN589J', 'georgia', '1754', 'QK995MY4AR');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'ford', 'mustang', '', 'red', 'RJK2QU', 'alabama', '3318', '2A6U1PY7RZ');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'gmc', 'sierra', '', 'white', 'F80YT5', 'ohio', '9829', 'GT25ZS0ICD');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'gmc', 'yukon', '', 'blue', 'GDDGZ8', 'maryland', '3202', 'HEO3LNA7BS');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'dodge', 'charger', '', 'yellow', 'KBC0LI', 'virginia', '2609', 'BGPHQS1HO6');
INSERT INTO car (make, model, location, color, license_number, state, mileage, vin) VALUES ( 'dodge', 'avenger', '', 'green', 'WI87PT', 'california', '4669', 'PNUABRRPDX');

CREATE TABLE representative (
  first_name varchar(255),
  last_name varchar(255),
  phone_number varchar(63),
  rep_id int UNIQUE,
  PRIMARY KEY (rep_id)
);

INSERT INTO representative (first_name, last_name, phone_number, rep_id) VALUES ('robert', 'cherinka', '4638203856', 1);
INSERT INTO representative (first_name, last_name, phone_number, rep_id) VALUES ('david', 'vecchio', '3618304832', 2);
INSERT INTO representative (first_name, last_name, phone_number, rep_id) VALUES ('robert', 'schwabel', '264293937', 3);
INSERT INTO representative (first_name, last_name, phone_number, rep_id) VALUES ('eric', 'savage', '1628303928', 4);

CREATE TABLE customer (
  first_name varchar(255),
  last_name varchar(255),
  street_address varchar(255),
  city varchar(255),
  zip varchar(10),
  phone_number varchar(15),
  customer_id int UNIQUE,
  PRIMARY KEY (customer_id)
);

INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('barbara', 'wade', '35372 woodward avenue', 'orlando', '73840', '7439450293', 1);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('chloe', 'vecchio', '63328 farley drive', 'tampa', '62812', '7492873265', 2);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('jack', 'vest', '9385 lemon street', 'tuscollusca', '75310', '9586736485', 3);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('eva', 'vest', '6347 carmel avenue', 'birmingham', '73819', '1728394053', 4);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('jason', 'wilkinson', '23780 cleveland street','clearwater', '73129', '7485029384', 5);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('mitchell', 'shepherd', '54792 franklin drive', 'canton', '73810', '6443240983', 6);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('james', 'mcmahan', '32984 university avenue', 'flint', '38432', '8402348389', 7);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('michael', 'graham', '40395 73 avenue north', 'chicago', '74293', '5732993941', 8);
INSERT INTO customer (first_name, last_name, street_address, city, zip, phone_number, customer_id) VALUES ('scott', 'spliter', '3723 big beaver road', 'pontiac', '88293', '6313840328', 9);

CREATE TABLE reservation (
  rate_period varchar(255),
  discount varchar(255),
  estimated_rental_duration varchar(255),
  credit_card_number varchar(255),
  credit_card_type varchar(255),
  base_charge varchar(255),
  tax varchar(255),
  gas_level varchar(255),
  date_rented DATE,
  time_rented TIME,
  date_returned DATE,
  time_returned TIME,
  insurance_charge varchar(255),
  mileage_charge varchar(255),
  start_miles INT,
  end_miles INT,
  PRIMARY KEY (credit_card_number),
  customer_id int,
  car_id varchar(255),
  FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
  FOREIGN KEY (car_id) REFERENCES car(vin)
);

INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('summer', '4.00', '7 days', '015620938649823', 'visa', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 18, 89, 4, 'PR6NSWDBVY');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('spring', '7.00', '6 weeks', '015320192836498', 'mastercard', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 73, 78, 6, 'PNUABRRPDX');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('fall', '3.00', '2 hours', '0186508923640961', 'mastercard', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 78, 52, 8, 'QK995MY4AR');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('winter', '12.00', '56 hours', '0152901639482539', 'visa', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 71, 64, 5, 'HEO3LNA7BS');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('summer', '32.00', '74 days', '6598230198623539', 'visa', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 71, 76, 2, 'GT25ZS0ICD');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('winter', '34.00', '3 weeks', '0612340186236429', 'mastercard', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 94, 48, 1, 'PR6NSWDBVY');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('spring', '2.00', '5 days', '6548932049387459', 'mastercard', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 20, 91, 9, 'NBD3WO54AG');
INSERT INTO reservation (rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('spring', '0.00', '2 months', '654839480239847', 'visa', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', 64, 16, 3, 'PR6NSWDBVY');

CREATE TABLE maintenance_cost (
  street_address varchar(255),
  city varchar(255),
  zip varchar(10),
  cost varchar(255),
  maintenance_id int UNIQUE,
  PRIMARY KEY (maintenance_id)
);

INSERT INTO maintenance_cost (street_address, city, zip, cost, maintenance_id) VALUES ('4752 franklin drive','clinton','83749','2,234',1);
INSERT INTO maintenance_cost (street_address, city, zip, cost, maintenance_id) VALUES ('8976 telegraph road','flint','23784','5,432',2);
INSERT INTO maintenance_cost (street_address, city, zip, cost, maintenance_id) VALUES ('362 elm street','southfield','39538','23,432',3);
INSERT INTO maintenance_cost (street_address, city, zip, cost, maintenance_id) VALUES ('723 needmore road','marysville','98274','62,456',4);
INSERT INTO maintenance_cost (street_address, city, zip, cost, maintenance_id) VALUES ('928 friendship circle','pontiac','23547','487',5);

CREATE TABLE corporation (
  account_number varchar(255) NOT NULL UNIQUE,
  street_address varchar(255),
  city varchar(255),
  zip varchar(10),
  phone_number varchar(63),
  PRIMARY KEY (account_number)
);

INSERT INTO corporation (account_number, street_address, city, zip, phone_number) VALUES ( '9187235491872534987', '440 62nd avenue west', 'new york', '93876', '2832754637');
INSERT INTO corporation (account_number, street_address, city, zip, phone_number) VALUES ( '0239845720386453648', '430 woodlawn avenue', 'belleair', '33781', '6382039487');
INSERT INTO corporation (account_number, street_address, city, zip, phone_number) VALUES ( '2384650238463268499', '23473 stonehenge boulevard', 'novi', '33782', '5648392453');
