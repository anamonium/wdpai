/*
 Navicat Premium Data Transfer

 Source Server         : azure
 Source Server Type    : PostgreSQL
 Source Server Version : 140005
 Source Host           : wdpaiprojapp.postgres.database.azure.com:5432
 Source Catalog        : marimay
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140005
 File Encoding         : 65001

 Date: 27/01/2023 16:51:55
*/


-- ----------------------------
-- Sequence structure for address_id_address_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."address_id_address_seq";
CREATE SEQUENCE "public"."address_id_address_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."address_id_address_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for budget_category_id_budget_category_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."budget_category_id_budget_category_seq";
CREATE SEQUENCE "public"."budget_category_id_budget_category_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."budget_category_id_budget_category_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for country_id_country_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."country_id_country_seq";
CREATE SEQUENCE "public"."country_id_country_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."country_id_country_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for guests_id_guest_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."guests_id_guest_seq";
CREATE SEQUENCE "public"."guests_id_guest_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."guests_id_guest_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for state_id_state_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."state_id_state_seq";
CREATE SEQUENCE "public"."state_id_state_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."state_id_state_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for task_id_task_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."task_id_task_seq";
CREATE SEQUENCE "public"."task_id_task_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."task_id_task_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for users_id_user_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_user_seq";
CREATE SEQUENCE "public"."users_id_user_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."users_id_user_seq" OWNER TO "anna";

-- ----------------------------
-- Sequence structure for vendors_id_vendor_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."vendors_id_vendor_seq";
CREATE SEQUENCE "public"."vendors_id_vendor_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
ALTER SEQUENCE "public"."vendors_id_vendor_seq" OWNER TO "anna";

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS "public"."address";
CREATE TABLE "public"."address" (
  "id_address" int8 NOT NULL DEFAULT nextval('address_id_address_seq'::regclass),
  "id_state" int8 NOT NULL,
  "street" varchar(100) COLLATE "pg_catalog"."default",
  "building_number" varchar(10) COLLATE "pg_catalog"."default",
  "postal_code" varchar(10) COLLATE "pg_catalog"."default",
  "city" varchar(100) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."address" OWNER TO "anna";

-- ----------------------------
-- Records of address
-- ----------------------------
BEGIN;
INSERT INTO "public"."address" ("id_address", "id_state", "street", "building_number", "postal_code", "city") VALUES (1, 1, 'Szlak', '12', '31-342', 'Krakow');
INSERT INTO "public"."address" ("id_address", "id_state", "street", "building_number", "postal_code", "city") VALUES (4, 2, 'Marszalkowska', '43', '98-982', 'Rzeszow');
INSERT INTO "public"."address" ("id_address", "id_state", "street", "building_number", "postal_code", "city") VALUES (5, 1, 'Karmelicka', '22', '31-765', 'Krakow');
INSERT INTO "public"."address" ("id_address", "id_state", "street", "building_number", "postal_code", "city") VALUES (6, 5, 'Zielona', '8', '23-879', 'Krakow');
INSERT INTO "public"."address" ("id_address", "id_state", "street", "building_number", "postal_code", "city") VALUES (7, 6, 'Mikołajska', '34', '98-854', 'Poznań');
INSERT INTO "public"."address" ("id_address", "id_state", "street", "building_number", "postal_code", "city") VALUES (9, 8, 'Kolorowa', '12', '12-675', 'Poznan');
COMMIT;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS "public"."admins";
CREATE TABLE "public"."admins" (
  "role" int4,
  "id_user" int8 NOT NULL
)
;
ALTER TABLE "public"."admins" OWNER TO "anna";

-- ----------------------------
-- Records of admins
-- ----------------------------
BEGIN;
INSERT INTO "public"."admins" ("role", "id_user") VALUES (2, 10);
INSERT INTO "public"."admins" ("role", "id_user") VALUES (1, 11);
COMMIT;

-- ----------------------------
-- Table structure for budget
-- ----------------------------
DROP TABLE IF EXISTS "public"."budget";
CREATE TABLE "public"."budget" (
  "id_budget" int8 NOT NULL,
  "beggining_budget" float8,
  "budget_letf" float8
)
;
ALTER TABLE "public"."budget" OWNER TO "anna";

-- ----------------------------
-- Records of budget
-- ----------------------------
BEGIN;
INSERT INTO "public"."budget" ("id_budget", "beggining_budget", "budget_letf") VALUES (11, 80000, 51700);
INSERT INTO "public"."budget" ("id_budget", "beggining_budget", "budget_letf") VALUES (10, 8000, 84480);
COMMIT;

-- ----------------------------
-- Table structure for budget_item
-- ----------------------------
DROP TABLE IF EXISTS "public"."budget_item";
CREATE TABLE "public"."budget_item" (
  "id_budget_item" int8 NOT NULL DEFAULT nextval('budget_category_id_budget_category_seq'::regclass),
  "id_budget" int8,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "cost" float8
)
;
ALTER TABLE "public"."budget_item" OWNER TO "anna";

-- ----------------------------
-- Records of budget_item
-- ----------------------------
BEGIN;
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (16, 10, 'Wedding dress', 1000);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (17, 10, 'Wedding flowers', 100);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (18, 10, 'Reception venue', 2000);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (19, 10, 'Wedding cake', 200);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (20, 10, 'Transportation', 150);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (21, 10, 'Wedding invitations', 70);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (23, 11, 'Venue', 20000);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (24, 11, 'Dress and suit', 5000);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (25, 11, 'Florist', 2300);
INSERT INTO "public"."budget_item" ("id_budget_item", "id_budget", "name", "cost") VALUES (26, 11, 'Catering', 1000);
COMMIT;

-- ----------------------------
-- Table structure for checklist
-- ----------------------------
DROP TABLE IF EXISTS "public"."checklist";
CREATE TABLE "public"."checklist" (
  "id_checklist" int8 NOT NULL,
  "subtask_done" int4,
  "all_subtask" int4
)
;
ALTER TABLE "public"."checklist" OWNER TO "anna";

-- ----------------------------
-- Records of checklist
-- ----------------------------
BEGIN;
INSERT INTO "public"."checklist" ("id_checklist", "subtask_done", "all_subtask") VALUES (10, 4, 6);
INSERT INTO "public"."checklist" ("id_checklist", "subtask_done", "all_subtask") VALUES (11, 2, 4);
COMMIT;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS "public"."country";
CREATE TABLE "public"."country" (
  "id_country" int8 NOT NULL DEFAULT nextval('country_id_country_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."country" OWNER TO "anna";

-- ----------------------------
-- Records of country
-- ----------------------------
BEGIN;
INSERT INTO "public"."country" ("id_country", "name") VALUES (1, 'Poland');
COMMIT;

-- ----------------------------
-- Table structure for guest_list
-- ----------------------------
DROP TABLE IF EXISTS "public"."guest_list";
CREATE TABLE "public"."guest_list" (
  "id_guest_list" int8 NOT NULL,
  "invited" int4,
  "accepted" int4
)
;
ALTER TABLE "public"."guest_list" OWNER TO "anna";

-- ----------------------------
-- Records of guest_list
-- ----------------------------
BEGIN;
INSERT INTO "public"."guest_list" ("id_guest_list", "invited", "accepted") VALUES (10, 10, 3);
INSERT INTO "public"."guest_list" ("id_guest_list", "invited", "accepted") VALUES (11, 7, 3);
COMMIT;

-- ----------------------------
-- Table structure for guests
-- ----------------------------
DROP TABLE IF EXISTS "public"."guests";
CREATE TABLE "public"."guests" (
  "id_guest" int8 NOT NULL DEFAULT nextval('guests_id_guest_seq'::regclass),
  "id_guestlist" int8 NOT NULL,
  "name" varchar(70) COLLATE "pg_catalog"."default",
  "surname" varchar(70) COLLATE "pg_catalog"."default",
  "phone" varchar(20) COLLATE "pg_catalog"."default",
  "plus_one" bool,
  "status" bool
)
;
ALTER TABLE "public"."guests" OWNER TO "anna";

-- ----------------------------
-- Records of guests
-- ----------------------------
BEGIN;
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (16, 10, 'Joe', 'Woodward', '760-932-1409', 'f', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (20, 10, 'Linda', 'Jefferson', '978-358-1060', 'f', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (13, 10, 'Kate', 'William', ' 334-390-1638', 'f', 't');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (14, 10, 'Michael', 'Villegas', '318-391-2021', 't', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (15, 10, 'Cheryl', 'Daily', '208-200-8792', 't', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (19, 10, 'Lawrence', 'Couch', '636-498-8336', 't', 't');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (22, 11, 'Miguel', 'Zeledon', '212-692-7207', 'f', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (26, 11, 'Richard', 'Thomas', '774-521-1861', 'f', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (23, 11, 'Antonio', 'Meyer', '940-722-3935', 't', 'f');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (24, 11, 'Constance', 'Toth', '530-244-7526', 'f', 't');
INSERT INTO "public"."guests" ("id_guest", "id_guestlist", "name", "surname", "phone", "plus_one", "status") VALUES (25, 11, 'Lillian', 'Stone', '856-954-9032', 't', 't');
COMMIT;

-- ----------------------------
-- Table structure for state
-- ----------------------------
DROP TABLE IF EXISTS "public"."state";
CREATE TABLE "public"."state" (
  "id_state" int8 NOT NULL DEFAULT nextval('state_id_state_seq'::regclass),
  "id_country" int8 NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."state" OWNER TO "anna";

-- ----------------------------
-- Records of state
-- ----------------------------
BEGIN;
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (1, 1, 'Malopolska');
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (2, 1, 'Podkarpackie');
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (3, 1, 'Slaskie');
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (4, 1, 'Wielkopolska');
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (5, 1, 'Malopolska');
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (6, 1, 'Wielkopolska');
INSERT INTO "public"."state" ("id_state", "id_country", "name") VALUES (8, 1, 'Wielkopolska');
COMMIT;

-- ----------------------------
-- Table structure for task
-- ----------------------------
DROP TABLE IF EXISTS "public"."task";
CREATE TABLE "public"."task" (
  "id_task" int8 NOT NULL DEFAULT nextval('task_id_task_seq'::regclass),
  "id_checklist" int8 NOT NULL,
  "status" bool,
  "content" text COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."task" OWNER TO "anna";

-- ----------------------------
-- Records of task
-- ----------------------------
BEGIN;
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (92, 10, 'f', 'Book hotel for guests');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (94, 10, 'f', 'Hire an officiant');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (95, 10, 'f', 'Book the honeymoon');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (96, 10, 'f', 'Choose a cake');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (93, 10, 't', 'Buy wedding dress');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (91, 10, 't', 'Select a venue');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (99, 11, 'f', 'Attend dress fittings');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (100, 11, 'f', 'Buy shoes, accessories');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (102, 11, 't', 'Decide about final menu');
INSERT INTO "public"."task" ("id_task", "id_checklist", "status", "content") VALUES (101, 11, 't', 'Ask Meghan to be my maid of honor ');
COMMIT;

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_details";
CREATE TABLE "public"."user_details" (
  "id_user" int8 NOT NULL,
  "name" varchar(70) COLLATE "pg_catalog"."default",
  "surname" varchar(70) COLLATE "pg_catalog"."default",
  "phone" varchar(20) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."user_details" OWNER TO "anna";

-- ----------------------------
-- Records of user_details
-- ----------------------------
BEGIN;
INSERT INTO "public"."user_details" ("id_user", "name", "surname", "phone") VALUES (10, 'Kasia', 'Nowak', NULL);
INSERT INTO "public"."user_details" ("id_user", "name", "surname", "phone") VALUES (11, 'Megan', 'Jones', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id_user" int8 NOT NULL DEFAULT nextval('users_id_user_seq'::regclass),
  "email" varchar(70) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(70) COLLATE "pg_catalog"."default" NOT NULL,
  "enabled" bool,
  "salt" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" varchar(255) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."users" OWNER TO "anna";

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO "public"."users" ("id_user", "email", "password", "enabled", "salt", "created_at") VALUES (10, 'knowa@op.pl', '$2y$10$3xtqwlaEMUmNVQUMnGcFNOGWKWtAPk5P3pZ4D3huZvU4IKXBdv1vy', NULL, NULL, NULL);
INSERT INTO "public"."users" ("id_user", "email", "password", "enabled", "salt", "created_at") VALUES (11, 'mjones@mjon.com', '$2y$10$wq5kuL.7X76QfI6qm0EI0OqVrBjrfHSA8c9E1VeBT4sYdAu9vaoEe', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for vendors
-- ----------------------------
DROP TABLE IF EXISTS "public"."vendors";
CREATE TABLE "public"."vendors" (
  "id_vendor" int8 NOT NULL DEFAULT nextval('vendors_id_vendor_seq'::regclass),
  "vendor_category" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "description" text COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."vendors" OWNER TO "anna";

-- ----------------------------
-- Records of vendors
-- ----------------------------
BEGIN;
INSERT INTO "public"."vendors" ("id_vendor", "vendor_category", "name", "description") VALUES (4, 'restauracja', 'Restauracja perła', 'Restauracja oferująca szeroki wybór dań');
INSERT INTO "public"."vendors" ("id_vendor", "vendor_category", "name", "description") VALUES (5, 'Salon kosmetyczny', 'Salon kosmetyczny ALICJA', 'Oferujemy szeroki wybór zabiegów kosmetycznych, m.in profesjonalne makijaże, manicure.');
INSERT INTO "public"."vendors" ("id_vendor", "vendor_category", "name", "description") VALUES (1, 'suknie slubne', 'suknie slubne amanda', 'Oferujemy duzy wybor sukni slubnych, ktore sa recznie wykonywane w naszej pracowni');
INSERT INTO "public"."vendors" ("id_vendor", "vendor_category", "name", "description") VALUES (2, 'kosciol', 'kosciol ', 'Oferujemy duzy wybor sukni slubnych, ktore sa recznie wykonywane w naszej pracowni');
INSERT INTO "public"."vendors" ("id_vendor", "vendor_category", "name", "description") VALUES (3, 'restauracja', 'pod stawami', 'Oferujemy duzy wybor sukni slubnych, ktore sa recznie wykonywane w naszej pracowni');
COMMIT;

-- ----------------------------
-- Table structure for vendors_addresses
-- ----------------------------
DROP TABLE IF EXISTS "public"."vendors_addresses";
CREATE TABLE "public"."vendors_addresses" (
  "id_vendor" int8 NOT NULL,
  "id_address" int8 NOT NULL,
  "email" varchar(70) COLLATE "pg_catalog"."default",
  "phone" varchar(15) COLLATE "pg_catalog"."default"
)
;
ALTER TABLE "public"."vendors_addresses" OWNER TO "anna";

-- ----------------------------
-- Records of vendors_addresses
-- ----------------------------
BEGIN;
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (1, 1, 'asdf@we.df', '231987742');
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (2, 4, 'cdzchjdh@hdgv.mn', '765389937');
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (3, 5, 'bsgvhjhssd@wed.pl', '763457688');
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (1, 4, 'dssd4@34.pl', '633783');
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (4, 6, 'perla@perla.pl', '123456789');
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (5, 7, 'alicja@alicja.al', '123456789');
INSERT INTO "public"."vendors_addresses" ("id_vendor", "id_address", "email", "phone") VALUES (4, 9, 'perelka@perelka', '123456789');
COMMIT;

-- ----------------------------
-- Table structure for wedding_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."wedding_details";
CREATE TABLE "public"."wedding_details" (
  "id_wedding_details" int8 NOT NULL,
  "wedding_date" date
)
;
ALTER TABLE "public"."wedding_details" OWNER TO "anna";

-- ----------------------------
-- Records of wedding_details
-- ----------------------------
BEGIN;
INSERT INTO "public"."wedding_details" ("id_wedding_details", "wedding_date") VALUES (10, '2021-05-25');
INSERT INTO "public"."wedding_details" ("id_wedding_details", "wedding_date") VALUES (11, '2023-05-05');
COMMIT;

-- ----------------------------
-- Function structure for add_budget_item
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."add_budget_item"();
CREATE OR REPLACE FUNCTION "public"."add_budget_item"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

	UPDATE budget b
	set "budget_letf" = "budget_letf" - NEW."cost"
	WHERE b."id_budget" = NEW."id_budget";

RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."add_budget_item"() OWNER TO "anna";

-- ----------------------------
-- Function structure for add_guest
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."add_guest"();
CREATE OR REPLACE FUNCTION "public"."add_guest"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

	UPDATE guest_list gu
	SET "invited" = "invited" + 1
	WHERE gu."id_guest_list" = NEW."id_guestlist";

RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."add_guest"() OWNER TO "anna";

-- ----------------------------
-- Function structure for addtask
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."addtask"();
CREATE OR REPLACE FUNCTION "public"."addtask"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

UPDATE checklist ch
SET "all_subtask" = "all_subtask" + 1 
WHERE ch."id_checklist" = NEW."id_checklist";
RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."addtask"() OWNER TO "anna";

-- ----------------------------
-- Function structure for change_budget
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."change_budget"();
CREATE OR REPLACE FUNCTION "public"."change_budget"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 
UPDATE budget b
set "budget_letf" = new."beggining_budget" - (OLD."beggining_budget" - "budget_letf");
RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."change_budget"() OWNER TO "anna";

-- ----------------------------
-- Function structure for change_plus_one
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."change_plus_one"();
CREATE OR REPLACE FUNCTION "public"."change_plus_one"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

IF NEW."plus_one" = true THEN 

	IF OLD."status" = true THEN
		UPDATE guest_list gu
		SET "invited" = "invited" + 1, "accepted" = "accepted" + 1
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;
	
	IF OLD."status" = false THEN
		UPDATE guest_list gu
		SET "invited" = "invited" + 1
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;

END IF;

IF NEW."plus_one" = false THEN 

	IF OLD."status" = true THEN
		UPDATE guest_list gu
		SET "invited" = "invited" - 1, "accepted" = "accepted" - 1
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;
	
	IF OLD."status" = false THEN
		UPDATE guest_list gu
		SET "invited" = "invited" - 1
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;

END IF;



RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."change_plus_one"() OWNER TO "anna";

-- ----------------------------
-- Function structure for change_status
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."change_status"();
CREATE OR REPLACE FUNCTION "public"."change_status"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 
IF NEW."status" = true THEN 

	IF OLD."plus_one" = true THEN
		UPDATE guest_list gu
		SET "accepted" = "accepted" + 2
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;
	
	IF OLD."plus_one" = false THEN
		UPDATE guest_list gu
		SET "accepted" = "accepted" + 1
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;

END IF;

IF NEW."status" = false THEN 

	IF OLD."plus_one" = true THEN
		UPDATE guest_list gu
		SET "accepted" = "accepted" - 2
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;
	
	IF OLD."plus_one" = false THEN
		UPDATE guest_list gu
		SET "accepted" = "accepted" - 1
		WHERE gu."id_guest_list" = OLD."id_guestlist";
	END IF;

END IF;


RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."change_status"() OWNER TO "anna";

-- ----------------------------
-- Function structure for change_task_status
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."change_task_status"();
CREATE OR REPLACE FUNCTION "public"."change_task_status"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

IF NEW."status" = FALSE THEN 
	UPDATE checklist ch
	set "subtask_done" = "subtask_done" - 1
	WHERE ch."id_checklist" = "id_checklist";
end if;

IF NEW."status" = TRUE THEN 
	UPDATE checklist ch
	set "subtask_done" = "subtask_done" + 1
	WHERE ch."id_checklist" = "id_checklist";
end if;

RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."change_task_status"() OWNER TO "anna";

-- ----------------------------
-- Function structure for delete_budget_item
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."delete_budget_item"();
CREATE OR REPLACE FUNCTION "public"."delete_budget_item"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

	UPDATE budget b
	SET "budget_letf" = "budget_letf" + OLD."cost"
	WHERE b."id_budget" = OLD."id_budget";

RETURN OLD;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."delete_budget_item"() OWNER TO "anna";

-- ----------------------------
-- Function structure for delete_guest
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."delete_guest"();
CREATE OR REPLACE FUNCTION "public"."delete_guest"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

	UPDATE guest_list gu
	SET "invited" = "invited" - 1
	WHERE gu."id_guest_list" = OLD."id_guestlist";

RETURN OLD;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."delete_guest"() OWNER TO "anna";

-- ----------------------------
-- Function structure for deletetask
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."deletetask"();
CREATE OR REPLACE FUNCTION "public"."deletetask"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN 

if OLD."status" = true then 
	UPDATE checklist ch
	SET "all_subtask" = "all_subtask" - 1 , "subtask_done" = "subtask_done" - 1
	WHERE ch."id_checklist" = OLD."id_checklist";
end if;

if OLD."status" = false then 
	UPDATE checklist ch
	SET "all_subtask" = "all_subtask" - 1 
	WHERE ch."id_checklist" = OLD."id_checklist";
end if;

RETURN OLD;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION "public"."deletetask"() OWNER TO "anna";

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."address_id_address_seq"
OWNED BY "public"."address"."id_address";
SELECT setval('"public"."address_id_address_seq"', 9, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."budget_category_id_budget_category_seq"
OWNED BY "public"."budget_item"."id_budget_item";
SELECT setval('"public"."budget_category_id_budget_category_seq"', 26, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."country_id_country_seq"
OWNED BY "public"."country"."id_country";
SELECT setval('"public"."country_id_country_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."guests_id_guest_seq"
OWNED BY "public"."guests"."id_guest";
SELECT setval('"public"."guests_id_guest_seq"', 26, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."state_id_state_seq"
OWNED BY "public"."state"."id_state";
SELECT setval('"public"."state_id_state_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."task_id_task_seq"
OWNED BY "public"."task"."id_task";
SELECT setval('"public"."task_id_task_seq"', 102, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_user_seq"
OWNED BY "public"."users"."id_user";
SELECT setval('"public"."users_id_user_seq"', 11, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."vendors_id_vendor_seq"
OWNED BY "public"."vendors"."id_vendor";
SELECT setval('"public"."vendors_id_vendor_seq"', 11, true);

-- ----------------------------
-- Uniques structure for table address
-- ----------------------------
ALTER TABLE "public"."address" ADD CONSTRAINT "address_id_address_key" UNIQUE ("id_address");

-- ----------------------------
-- Primary Key structure for table address
-- ----------------------------
ALTER TABLE "public"."address" ADD CONSTRAINT "address_pkey" PRIMARY KEY ("id_address");

-- ----------------------------
-- Primary Key structure for table admins
-- ----------------------------
ALTER TABLE "public"."admins" ADD CONSTRAINT "admins_pkey" PRIMARY KEY ("id_user");

-- ----------------------------
-- Triggers structure for table budget
-- ----------------------------
CREATE TRIGGER "change_budget" AFTER UPDATE OF "beggining_budget" ON "public"."budget"
FOR EACH ROW
EXECUTE PROCEDURE "public"."change_budget"();

-- ----------------------------
-- Uniques structure for table budget
-- ----------------------------
ALTER TABLE "public"."budget" ADD CONSTRAINT "budget_id_budget_key" UNIQUE ("id_budget");

-- ----------------------------
-- Primary Key structure for table budget
-- ----------------------------
ALTER TABLE "public"."budget" ADD CONSTRAINT "budget_pkey" PRIMARY KEY ("id_budget");

-- ----------------------------
-- Triggers structure for table budget_item
-- ----------------------------
CREATE TRIGGER "add_budget_item" AFTER INSERT ON "public"."budget_item"
FOR EACH ROW
EXECUTE PROCEDURE "public"."add_budget_item"();
CREATE TRIGGER "delete_budget_item" AFTER DELETE ON "public"."budget_item"
FOR EACH ROW
EXECUTE PROCEDURE "public"."delete_budget_item"();

-- ----------------------------
-- Uniques structure for table budget_item
-- ----------------------------
ALTER TABLE "public"."budget_item" ADD CONSTRAINT "budget_category_id_budget_category_key" UNIQUE ("id_budget_item");
ALTER TABLE "public"."budget_item" ADD CONSTRAINT "budget_category_id_budget_category_key1" UNIQUE ("id_budget_item");

-- ----------------------------
-- Primary Key structure for table budget_item
-- ----------------------------
ALTER TABLE "public"."budget_item" ADD CONSTRAINT "budget_category_pkey" PRIMARY KEY ("id_budget_item");

-- ----------------------------
-- Uniques structure for table checklist
-- ----------------------------
ALTER TABLE "public"."checklist" ADD CONSTRAINT "checklist_id_checklist_key" UNIQUE ("id_checklist");

-- ----------------------------
-- Primary Key structure for table checklist
-- ----------------------------
ALTER TABLE "public"."checklist" ADD CONSTRAINT "checklist_pkey" PRIMARY KEY ("id_checklist");

-- ----------------------------
-- Uniques structure for table country
-- ----------------------------
ALTER TABLE "public"."country" ADD CONSTRAINT "country_id_country_key" UNIQUE ("id_country");

-- ----------------------------
-- Primary Key structure for table country
-- ----------------------------
ALTER TABLE "public"."country" ADD CONSTRAINT "country_pkey" PRIMARY KEY ("id_country");

-- ----------------------------
-- Uniques structure for table guest_list
-- ----------------------------
ALTER TABLE "public"."guest_list" ADD CONSTRAINT "guest_list_id_guest_list_key" UNIQUE ("id_guest_list");

-- ----------------------------
-- Primary Key structure for table guest_list
-- ----------------------------
ALTER TABLE "public"."guest_list" ADD CONSTRAINT "guest_list_pkey" PRIMARY KEY ("id_guest_list");

-- ----------------------------
-- Triggers structure for table guests
-- ----------------------------
CREATE TRIGGER "add_guest" AFTER INSERT ON "public"."guests"
FOR EACH ROW
EXECUTE PROCEDURE "public"."add_guest"();
CREATE TRIGGER "change_plus_one" AFTER UPDATE OF "plus_one" ON "public"."guests"
FOR EACH ROW
EXECUTE PROCEDURE "public"."change_plus_one"();
CREATE TRIGGER "change_status" AFTER UPDATE OF "status" ON "public"."guests"
FOR EACH ROW
EXECUTE PROCEDURE "public"."change_status"();
CREATE TRIGGER "delete_guest" AFTER DELETE ON "public"."guests"
FOR EACH ROW
EXECUTE PROCEDURE "public"."delete_guest"();

-- ----------------------------
-- Uniques structure for table guests
-- ----------------------------
ALTER TABLE "public"."guests" ADD CONSTRAINT "guests_id_guest_key" UNIQUE ("id_guest");

-- ----------------------------
-- Primary Key structure for table guests
-- ----------------------------
ALTER TABLE "public"."guests" ADD CONSTRAINT "guests_pkey" PRIMARY KEY ("id_guest");

-- ----------------------------
-- Uniques structure for table state
-- ----------------------------
ALTER TABLE "public"."state" ADD CONSTRAINT "state_id_state_key" UNIQUE ("id_state");

-- ----------------------------
-- Primary Key structure for table state
-- ----------------------------
ALTER TABLE "public"."state" ADD CONSTRAINT "state_pkey" PRIMARY KEY ("id_state");

-- ----------------------------
-- Triggers structure for table task
-- ----------------------------
CREATE TRIGGER "addtaskvalue" AFTER INSERT ON "public"."task"
FOR EACH ROW
EXECUTE PROCEDURE "public"."addtask"();
CREATE TRIGGER "change_task_status" AFTER UPDATE ON "public"."task"
FOR EACH ROW
EXECUTE PROCEDURE "public"."change_task_status"();
CREATE TRIGGER "deletetask" AFTER DELETE ON "public"."task"
FOR EACH ROW
EXECUTE PROCEDURE "public"."deletetask"();

-- ----------------------------
-- Uniques structure for table task
-- ----------------------------
ALTER TABLE "public"."task" ADD CONSTRAINT "task_id_task_key" UNIQUE ("id_task");

-- ----------------------------
-- Primary Key structure for table task
-- ----------------------------
ALTER TABLE "public"."task" ADD CONSTRAINT "task_pkey" PRIMARY KEY ("id_task");

-- ----------------------------
-- Uniques structure for table user_details
-- ----------------------------
ALTER TABLE "public"."user_details" ADD CONSTRAINT "user_details_id_user_key" UNIQUE ("id_user");

-- ----------------------------
-- Primary Key structure for table user_details
-- ----------------------------
ALTER TABLE "public"."user_details" ADD CONSTRAINT "user_details_pkey" PRIMARY KEY ("id_user");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_id_user_key" UNIQUE ("id_user");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id_user");

-- ----------------------------
-- Uniques structure for table vendors
-- ----------------------------
ALTER TABLE "public"."vendors" ADD CONSTRAINT "vendors_id_vendor_key" UNIQUE ("id_vendor");

-- ----------------------------
-- Primary Key structure for table vendors
-- ----------------------------
ALTER TABLE "public"."vendors" ADD CONSTRAINT "vendors_pkey" PRIMARY KEY ("id_vendor");

-- ----------------------------
-- Uniques structure for table wedding_details
-- ----------------------------
ALTER TABLE "public"."wedding_details" ADD CONSTRAINT "wedding_details_id_wedding_details_key" UNIQUE ("id_wedding_details");

-- ----------------------------
-- Primary Key structure for table wedding_details
-- ----------------------------
ALTER TABLE "public"."wedding_details" ADD CONSTRAINT "wedding_details_pkey" PRIMARY KEY ("id_wedding_details");

-- ----------------------------
-- Foreign Keys structure for table address
-- ----------------------------
ALTER TABLE "public"."address" ADD CONSTRAINT "address_id_state_fkey" FOREIGN KEY ("id_state") REFERENCES "public"."state" ("id_state") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table admins
-- ----------------------------
ALTER TABLE "public"."admins" ADD CONSTRAINT "admins_id_user_fkey" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table budget
-- ----------------------------
ALTER TABLE "public"."budget" ADD CONSTRAINT "budget_id_budget_fkey" FOREIGN KEY ("id_budget") REFERENCES "public"."wedding_details" ("id_wedding_details") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table budget_item
-- ----------------------------
ALTER TABLE "public"."budget_item" ADD CONSTRAINT "budget_category_id_budget_fkey" FOREIGN KEY ("id_budget") REFERENCES "public"."budget" ("id_budget") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table checklist
-- ----------------------------
ALTER TABLE "public"."checklist" ADD CONSTRAINT "checklist_id_checklist_fkey" FOREIGN KEY ("id_checklist") REFERENCES "public"."wedding_details" ("id_wedding_details") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table guest_list
-- ----------------------------
ALTER TABLE "public"."guest_list" ADD CONSTRAINT "guest_list_id_guest_list_fkey" FOREIGN KEY ("id_guest_list") REFERENCES "public"."wedding_details" ("id_wedding_details") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table guests
-- ----------------------------
ALTER TABLE "public"."guests" ADD CONSTRAINT "guests_id_guestlist_fkey" FOREIGN KEY ("id_guestlist") REFERENCES "public"."guest_list" ("id_guest_list") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table state
-- ----------------------------
ALTER TABLE "public"."state" ADD CONSTRAINT "state_id_country_fkey" FOREIGN KEY ("id_country") REFERENCES "public"."country" ("id_country") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table task
-- ----------------------------
ALTER TABLE "public"."task" ADD CONSTRAINT "task_id_checklist_fkey" FOREIGN KEY ("id_checklist") REFERENCES "public"."checklist" ("id_checklist") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table user_details
-- ----------------------------
ALTER TABLE "public"."user_details" ADD CONSTRAINT "user_details_id_user_fkey" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table vendors_addresses
-- ----------------------------
ALTER TABLE "public"."vendors_addresses" ADD CONSTRAINT "vendors_addresses_id_address_fkey" FOREIGN KEY ("id_address") REFERENCES "public"."address" ("id_address") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."vendors_addresses" ADD CONSTRAINT "vendors_addresses_id_vendor_fkey" FOREIGN KEY ("id_vendor") REFERENCES "public"."vendors" ("id_vendor") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table wedding_details
-- ----------------------------
ALTER TABLE "public"."wedding_details" ADD CONSTRAINT "wedding_details_id_wedding_details_fkey" FOREIGN KEY ("id_wedding_details") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;
