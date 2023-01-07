----------------CREATION DE LA BASE DE DONNEES SIAWALI----------------
----------------Fait par MOUSSA VEKETO ALEXANDRA, élève ingénieure(Masteur1)---------------
-- -----------------------------------------------------
-- CREATION DATABASE SIAWALI
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS siawali;
USE siawali;

//Tables de cardinalités faibles
-- -----------------------------------------------------
-- Table customer
-- -----------------------------------------------------
CREATE TABLE customer(
    customer_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    customer_lastname VARCHAR(150) NOT NULL,
    customer_firstname VARCHAR(150) NOT NULL,
    customer_email VARCHAR(150) NOT NULL,
    customer_password VARCHAR(150) NOT NULL,
    active boolean
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table delivery
-- -----------------------------------------------------
CREATE TABLE delivery (
  delivery_id INT(11) PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  delivery_date DATE NOT NULL,
  delivery_wording VARCHAR(255) NULL
)ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table payment
-- -----------------------------------------------------
CREATE TABLE payment (
  payment_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  payment_type VARCHAR(15) NOT NULL,
  payment_date DATE NOT NULL
)ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table newsletter
-- -----------------------------------------------------
CREATE TABLE newsletter (
  newsletter_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  newsletter_email VARCHAR(255) NOT NULL,
  newsletter_date DATE NOT NULL
) ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table invoice
-- -----------------------------------------------------
CREATE TABLE invoice (
  invoice_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  invoice_amount INT(15) NOT NULL,
  invoice_date DATE NOT NULL,
  invoice_hour DATETIME NOT NULL
) ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table visitor
-- -----------------------------------------------------
CREATE TABLE visitor (
  visitor_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  visitor_ip_address VARCHAR(10) NOT NULL,
  visitor_time VARCHAR(2) NOT NULL,
  visiteur_hour DATETIME NOT NULL
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table announcer
-- -----------------------------------------------------
CREATE TABLE announcer (
  announcer_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  announcer_lastname VARCHAR(10) NOT NULL,
  announcer_firstname VARCHAR(10) NULL,
  annoucer_phone INT(10) NULL,
  annoucer_email VARCHAR(15) NULL
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table users
-- -----------------------------------------------------
CREATE TABLE users(
  user_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_lastname VARCHAR(100) NOT NULL,
  user_firstname VARCHAR(100) NOT NULL,
  user_phone INT(30) NOT NULL,
  user_email VARCHAR(150) NULL,
  user_address VARCHAR(100) NULL,
  user_login VARCHAR(45) NOT NULL,
  user_password VARCHAR(255) NOT NULL,
  active boolean ,
  file_name VARCHAR(255) NOT NULL,
  file_url VARCHAR(255) NOT NULL,
  ip_address VARCHAR(20) NOT NULL,
  token text NOT NULL,
  registration_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


//Table de cardinalités fortes
-- -----------------------------------------------------
-- Table relaypoint
-- -----------------------------------------------------
CREATE TABLE relaypoint (
  relaypoint_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  relaypoint_commune VARCHAR(10) NOT NULL,
  relaypoint_town VARCHAR(10) NOT NULL,
  relaypoint_description VARCHAR(10) NULL,
  relaypoint_price FLOAT NOT NULL,
  relaypoint_wording VARCHAR(255) NULL,
  user_id INT(11) NOT NULL,
  CONSTRAINT FK_users FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE=InnoDB;



-- -----------------------------------------------------
-- Table delivery_man
-- -----------------------------------------------------
CREATE TABLE delivery_man (
  delivery_man_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  delivery_man_lastname VARCHAR(10) NOT NULL,
  delivery_man_firstname VARCHAR(10) NOT NULL,
  delivery_man_contact INT(15) NOT NULL,
  delivery_man_address VARCHAR(5) NULL,
  delivery_man_score INT(5) NULL,
  customer_id INT(11) NOT NULL,
  CONSTRAINT FK_customer FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
) ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table order
-- -----------------------------------------------------
CREATE TABLE orders (
  order_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  order_amount FLOAT NOT NULL,
  order_date DATE NOT NULL,
  order_four DATETIME NULL,
  order_wording VARCHAR(45) NULL,
  customer_id INT(11) NOT NULL,
  delivery_id INT(11) NOT NULL,
  payment_id INT(11) NOT NULL,
  relaypoint_id INT(11) NOT NULL,
  delivery_man_id INT(11) NOT NULL,
  CONSTRAINT UPDATE_FK_customer FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
  CONSTRAINT FK_delivery FOREIGN KEY (delivery_id) REFERENCES delivery(delivery_id),
  CONSTRAINT FK_payment FOREIGN KEY (payment_id) REFERENCES payment(payment_id),
  CONSTRAINT FK_relaypoint FOREIGN KEY (relaypoint_id) REFERENCES relaypoint(relaypoint_id),
  CONSTRAINT FK_delivery_man FOREIGN KEY (delivery_man_id) REFERENCES delivery_man(delivery_man_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table product
-- -----------------------------------------------------

CREATE TABLE product (
  product_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(255) NOT NULL,
  subcategory_name VARCHAR(255) NOT NULL,
  product_title VARCHAR(255) NOT NULL,
  product_characteristic VARCHAR(255) NOT NULL,
  product_description TEXT NOT NULL,
  product_quantity INT(11) NOT NULL,
  product_price FLOAT NOT NULL,
  product_color VARCHAR(15) NOT NULL,
  product_size VARCHAR(100) NOT NULL,
  name_url VARCHAR(255) NOT NULL,
  name_url1 VARCHAR(255) NOT NULL,
  name_url2 VARCHAR(255) NOT NULL,
  modified_price FLOAT NOT NULL,
  active boolean NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table cart
-- -----------------------------------------------------
CREATE TABLE cart (
  cart_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  customer_id INT(11) NOT NULL,
  product_id INT(11) NOT NULL,
  product_quantity INT(11) NOT NULL,
  cart_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT UPDATE_FK_custom FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
  CONSTRAINT UPDATE_FK_prod FOREIGN KEY (product_id) REFERENCES product(product_id),
  CONSTRAINT UPDATE_FK_produc FOREIGN KEY (product_quantity) REFERENCES product(product_id)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table category
-- -----------------------------------------------------
CREATE TABLE category (
  category_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(255) NOT NULL,
  active boolean NOT NULL,
  day date NOT NULL DEFAULT CURRENT_TIMESTAMP,
  hour time NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table subcategory
-- -----------------------------------------------------
CREATE TABLE subcategory (
  subcategory_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  subcategory_name VARCHAR(255) NOT NULL,
  active boolean NOT NULL,
  category_id INT(11) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT FK_category FOREIGN KEY (category_id) REFERENCES category(category_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table message
-- -----------------------------------------------------
CREATE TABLE message (
  message_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  message_content VARCHAR(255) NOT NULL,
  message_date DATE NOT NULL,
  message_object VARCHAR(10) ,
  visitor_id INT(11) NOT NULL,
  CONSTRAINT FK_visitor FOREIGN KEY (visitor_id) REFERENCES visitor(visitor_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table role
-- -----------------------------------------------------
CREATE TABLE role (
  role_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  role_wording VARCHAR(45) NOT NULL,
  user_id INT(11) NOT NULL,
  CONSTRAINT FK_users_role FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table privilege
-- -----------------------------------------------------
CREATE TABLE privilege(
  privilege_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  privilege_title VARCHAR(5) NOT NULL,
  role_id INT(11) NOT NULL,
  CONSTRAINT FK_role FOREIGN KEY(role_id) REFERENCES role(role_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table promotion
-- -----------------------------------------------------
CREATE TABLE promotion (
  promotion_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  promotion_date_debut DATE NOT NULL,
  promotion_date_end DATE NOT NULL,
  promotion_hour_debut DATETIME NOT NULL,
  promotion_hour_end DATETIME NOT NULL,
  user_id INT NOT NULL,
  CONSTRAINT FK_users_promotion FOREIGN KEY(user_id) REFERENCES users(user_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table slider
-- -----------------------------------------------------
CREATE TABLE slider (
  slider_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  slider_title VARCHAR(150) NOT NULL,
  slider_sub_title VARCHAR(150) NOT NULL,
  slider_description VARCHAR(255) NOT NULL,
  name_url VARCHAR(255) NOT NULL,
  user_id INT(11) NOT NULL,
  active boolean NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT FK_user_slider FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table logo
-- -----------------------------------------------------
CREATE TABLE logo (
  logo_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  logo_name VARCHAR(2) NOT NULL,
  logo_date_add DATE NOT NULL,
  user_id INT NOT NULL,
  CONSTRAINT FK_users_logo FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table tip
-- -----------------------------------------------------
CREATE TABLE tip (
  tip_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  tip_content VARCHAR(255) NOT NULL,
  tip_nameurl VARCHAR(2552) NOT NULL,
  user_id INT(11) NOT NULL,
  CONSTRAINT FK_users_tip FOREIGN KEY (user_id) REFERENCES users(user_id)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table publicity
-- -----------------------------------------------------
CREATE TABLE publicity (
  publicity_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  publicity_title VARCHAR(5) NOT NULL,
  publicity_sub_title VARCHAR(5) NOT NULL,
  publicity_price FLOAT NOT NULL,
  publicity_date DATE NOT NULL,
  tip_id INT(11) NOT NULL,
  announcer_id INT(11) NOT NULL,
  CONSTRAINT FK_tip FOREIGN KEY (tip_id) REFERENCES tip(tip_id),
  CONSTRAINT FK_announcer FOREIGN KEY (announcer_id) REFERENCES announcer(announcer_id)
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table about
-- -----------------------------------------------------
CREATE TABLE about (
  about_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  about_content VARCHAR(255) NOT NULL,
  about_date DATE NOT NULL,
  user_id INT(11) NOT NULL,
  CONSTRAINT FK_users_about FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table type_payment
-- -----------------------------------------------------
CREATE TABLE type_payment (
  type_payment_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  type_payment_name VARCHAR(45) NULL,
  payment_id INT(11) NOT NULL,
  CONSTRAINT UPDATE_FK_payment FOREIGN KEY (payment_id) REFERENCES payment(payment_id)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table announcement
-- -----------------------------------------------------
CREATE TABLE announcement (
  announcement_id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  announcement_name VARCHAR(5) NULL,
  announcement_wording VARCHAR(255) NULL,
  user_id INT(11) NOT NULL,
  CONSTRAINT FK_users_announcement FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE = InnoDB;






