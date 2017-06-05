CREATE DATABASE car_rentals;

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;

CREATE TABLE car (
  make varchar(255),
  model varchar(255),
  location varchar(255),
  color varchar(255),
  license_number varchar(255),
  state varchar(255),
  car_condition varchar(255),
  mileage varchar(255),
  vin varchar(255) NOT NULL UNIQUE,
  PRIMARY KEY (vin)
);

INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'jeep', 'wrangler', 'nowhere', 'blue', '3UWA7G', 'florida', '7841', 'good', 'QJX968ND1X');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'jeep', 'cherokee', 'alpha', 'white', 'HKY591', 'michigan', '3351', 'poor', '546UYISMCU');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'chrysler', '200', 'beta', 'black', 'ZKWAA3', 'colorado', '1502', 'poor', 'NBD3WO54AG');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'ford', 'taurus', 'gamma', 'tan', 'ED3D4F', 'new york', '658', 'good', 'PR6NSWDBVY');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'ford', 'fiesta', 'omega', 'orange', 'KJC35C', 'kansas', '1509', 'poor', 'W51B9UDW23');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'ford', 'mustang', 'phi', 'green', 'CN589J', 'georgia', '1754', 'good', 'QK995MY4AR');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'ford', 'mustang', 'psy', 'red', 'RJK2QU', 'alabama', '3318', 'poor', '2A6U1PY7RZ');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'gmc', 'sierra', 'google', 'white', 'F80YT5', 'ohio', '9829', 'good', 'GT25ZS0ICD');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'gmc', 'yukon', 'MIT', 'blue', 'GDDGZ8', 'maryland', '3202', 'poor', 'HEO3LNA7BS');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'dodge', 'charger', 'white house', 'yellow', 'KBC0LI', 'virginia', '2609', 'poor', 'BGPHQS1HO6');
INSERT INTO car (make, model, location, color, license_number, state, mileage, car_condition, vin) VALUES ( 'dodge', 'avenger', 'space', 'green', 'WI87PT', 'california', '4669', 'good', 'PNUABRRPDX');

CREATE TABLE representative (
  first_name varchar(255),
  last_name varchar(255),
  phone_number varchar(63),
  rep_id int auto_increment,
  PRIMARY KEY (rep_id)
);

INSERT INTO representative (first_name, last_name, phone_number) VALUES ('robert', 'cherinka', '4638203856');
INSERT INTO representative (first_name, last_name, phone_number) VALUES ('david', 'vecchio', '3618304832');
INSERT INTO representative (first_name, last_name, phone_number) VALUES ('robert', 'schwabel', '264293937');
INSERT INTO representative (first_name, last_name, phone_number) VALUES ('eric', 'savage', '1628303928');

CREATE TABLE customer (
  first_name varchar(255),
  last_name varchar(255),
  street_address varchar(255),
  city varchar(255),
  state varchar(255),
  zip varchar(10),
  phone_number varchar(15),
  customer_id int NOT NULL auto_increment,
  PRIMARY KEY (customer_id)
);

INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('barbara', 'wade', '35372 woodward avenue', 'orlando', 'texas', '73840', '7439450293');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('chloe', 'vecchio', '63328 farley drive', 'tampa', 'florida', '62812', '7492873265');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('jack', 'vest', '9385 lemon street', 'tuscollusca', 'alabama', '75310', '9586736485');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('eva', 'vest', '6347 carmel avenue', 'birmingham', 'space', '73819', '1728394053');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('jason', 'wilkinson', '23780 cleveland street','clearwater', 'nowhere', '73129', '7485029384');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('mitchell', 'shepherd', '54792 franklin drive', 'canton', 'california', '73810', '6443240983');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('james', 'mcmahan', '32984 university avenue', 'flint', 'new mexico', '38432', '8402348389');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('michael', 'graham', '40395 73 avenue north', 'chicago', 'indiana', '74293', '5732993941');
INSERT INTO customer (first_name, last_name, street_address, city, state, zip, phone_number) VALUES ('scott', 'spliter', '3723 big beaver road', 'pontiac', 'place', '88293', '6313840328');

CREATE TABLE reservation (
  rate_period varchar(255),
  rate varchar(255),
  discount varchar(255),
  estimated_rental_duration varchar(255),
  credit_card_number varchar(255) UNIQUE,
  credit_card_type varchar(255),
  base_charge varchar(255),
  tax varchar(255),
  gas_level varchar(255),
  gas_charge varchar(255),
  date_rented DATE,
  time_rented TIME,
  date_returned DATE,
  time_returned TIME,
  insurance_charge varchar(255),
  mileage_charge varchar(255),
  final_charge varchar(255),
  start_miles INT,
  end_miles INT,
  PRIMARY KEY (credit_card_number),
  customer_id int,
  car_id varchar(255),
  FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
  FOREIGN KEY (car_id) REFERENCES car(vin)
);

INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('1.0', 'summer', '4.00', '7 days', '015620938649823', 'visa', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 18, 89, 1, 'PR6NSWDBVY');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('1.1', 'spring', '7.00', '6 weeks', '015320192836498', 'mastercard', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 73, 78, 2, 'PNUABRRPDX');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('0.9', 'fall', '3.00', '2 hours', '0186508923640961', 'mastercard', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 78, 52, 3, 'QK995MY4AR');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('3.0', 'winter', '12.00', '56 hours', '0152901639482539', 'visa', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 71, 64, 4, 'HEO3LNA7BS');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('0.8', 'summer', '32.00', '74 days', '6598230198623539', 'visa', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 71, 76, 5, 'GT25ZS0ICD');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('0.2', 'winter', '34.00', '3 weeks', '0612340186236429', 'mastercard', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 94, 48, 6, 'PR6NSWDBVY');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('3.0', 'spring', '2.00', '5 days', '6548932049387459', 'mastercard', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 20, 91, 7, 'NBD3WO54AG');
INSERT INTO reservation (rate, rate_period, discount, estimated_rental_duration, credit_card_number, credit_card_type, base_charge, tax, gas_level, gas_charge, date_rented, time_rented, date_returned, time_returned, insurance_charge, mileage_charge, final_charge, start_miles, end_miles, customer_id, car_id)
VALUES ('0.5', 'spring', '0.00', '2 months', '654839480239847', 'visa', '', '', '', CURTIME(), CURDATE(), CURTIME(), CURDATE(), '', '', '', '', 64, 16, 8, 'PR6NSWDBVY');

CREATE TABLE maintenance_cost (
  garage_name varchar(255),
  street_address varchar(255),
  city varchar(255),
  state varchar(255),
  zip varchar(10),
  estimate varchar(255),
  cost varchar(255),
  procedure_name varchar(255),
  procedure_date varchar(255),
  authorization_number varchar(255),
  maintenance_id int AUTO_INCREMENT,
  PRIMARY KEY (maintenance_id)
);

INSERT INTO maintenance_cost (garage_name, street_address, city, state, zip, estimate, cost, procedure_name, procedure_date, authorization_number) VALUES ('alpha', '4752 franklin drive','clinton', 'michigan', '83749','123', '2,234','radiator', '09081993', '2456234562456');
INSERT INTO maintenance_cost (garage_name, street_address, city, state, zip, estimate, cost, procedure_name, procedure_date, authorization_number) VALUES ('beta', '8976 telegraph road','flint','florida', '23784', '234', '5,432', 'door', '04061996', '4845674572458');
INSERT INTO maintenance_cost (garage_name, street_address, city, state, zip, estimate, cost, procedure_name, procedure_date, authorization_number) VALUES ('gamma', '362 elm street','southfield','maine', '39538','345', '23,432', 'windshield', '08141991', '03495867');
INSERT INTO maintenance_cost (garage_name, street_address, city, state, zip, estimate, cost, procedure_name, procedure_date, authorization_number) VALUES ('zed', '723 needmore road','marysville','alabama', '98274','456', '62,456', 'steering wheel', '10101999', '0156743892');
INSERT INTO maintenance_cost (garage_name, street_address, city, state, zip, estimate, cost, procedure_name, procedure_date, authorization_number) VALUES ('rapture', '928 friendship circle','pontiac','georiga', '23547','567', '487', 'driver', '11021887', '108346598234');

CREATE TABLE corporation (
  name varchar(255),
  account_number varchar(255) NOT NULL UNIQUE,
  street_address varchar(255),
  city varchar(255),
  state varchar(255),
  zip varchar(10),
  phone_number varchar(63),
  PRIMARY KEY (account_number)
);

INSERT INTO corporation (name, account_number, street_address, city, state, zip, phone_number) VALUES ( 'mitre', '9187235491872534987', '440 62nd avenue west', 'new york', 'florida', '93876', '2832754637');
INSERT INTO corporation (name, account_number, street_address, city, state, zip, phone_number) VALUES ( 'harman', '0239845720386453648', '430 woodlawn avenue', 'belleair', 'michigan', '33781', '6382039487');
INSERT INTO corporation (name, account_number, street_address, city, state, zip, phone_number) VALUES ( 'generalmotors', '2384650238463268499', '23473 stonehenge boulevard', 'novi', 'texas', '33782', '5648392453');
