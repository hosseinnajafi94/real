/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50711
 Source Host           : localhost:3306
 Source Schema         : erp

 Target Server Type    : MySQL
 Target Server Version : 50711
 File Encoding         : 65001

 Date: 25/02/2020 22:16:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accounting_accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounting_accounts`;
CREATE TABLE `accounting_accounts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL,
  `symbol_id` int(11) NULL DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `actype_id` int(11) NULL DEFAULT NULL,
  `tctype_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `check_id` int(11) NULL DEFAULT NULL,
  `budget_id` int(11) NULL DEFAULT NULL,
  `note_id` int(11) NULL DEFAULT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `voucher_allow` bit(1) NULL DEFAULT NULL,
  `force_floating` bit(1) NULL DEFAULT NULL,
  `force_client` bit(1) NULL DEFAULT NULL,
  `budget_allow` bit(1) NULL DEFAULT NULL,
  `force_cost_center` bit(1) NULL DEFAULT NULL,
  `force_revenue_center` bit(1) NULL DEFAULT NULL,
  `force_project` bit(1) NULL DEFAULT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `note_id`(`note_id`) USING BTREE,
  INDEX `symbol_id`(`symbol_id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  INDEX `actype_id`(`actype_id`) USING BTREE,
  INDEX `tctype_id`(`tctype_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `check_id`(`check_id`) USING BTREE,
  INDEX `budget_id`(`budget_id`) USING BTREE,
  CONSTRAINT `accounting_accounts_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `accounting_list_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_2` FOREIGN KEY (`symbol_id`) REFERENCES `accounting_list_symbols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_3` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_4` FOREIGN KEY (`actype_id`) REFERENCES `accounting_accounts_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_5` FOREIGN KEY (`tctype_id`) REFERENCES `accounting_accounts_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_6` FOREIGN KEY (`type_id`) REFERENCES `accounting_accounts_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_7` FOREIGN KEY (`check_id`) REFERENCES `accounting_accounts_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_accounts_ibfk_8` FOREIGN KEY (`budget_id`) REFERENCES `accounting_accounts_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_accounts
-- ----------------------------
BEGIN;
INSERT INTO `accounting_accounts` VALUES (1, NULL, 1, '', NULL, NULL, 'asd', NULL, NULL, NULL, NULL, '', '0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', NULL), (2, 1, NULL, '', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', NULL), (3, 1, NULL, '', NULL, NULL, 'asd', NULL, NULL, NULL, NULL, '', '0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', NULL), (4, 1, NULL, '', NULL, NULL, 'dddd', NULL, NULL, NULL, NULL, '', '0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_accounts_items
-- ----------------------------
DROP TABLE IF EXISTS `accounting_accounts_items`;
CREATE TABLE `accounting_accounts_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `accounting_accounts_items_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `accounting_accounts_items_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for accounting_accounts_items_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_accounts_items_types`;
CREATE TABLE `accounting_accounts_items_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for accounting_clients
-- ----------------------------
DROP TABLE IF EXISTS `accounting_clients`;
CREATE TABLE `accounting_clients`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `is_active` bit(1) NULL DEFAULT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `voucher_allow` bit(1) NULL DEFAULT NULL,
  `budget_allow` bit(1) NULL DEFAULT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `accounting_clients_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_clients_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `accounting_clients_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_clients_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_clients
-- ----------------------------
BEGIN;
INSERT INTO `accounting_clients` VALUES (1, 1, '1', NULL, 1, b'0', '2', b'0', b'0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_clients_list_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_clients_list_types`;
CREATE TABLE `accounting_clients_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_clients_list_types
-- ----------------------------
BEGIN;
INSERT INTO `accounting_clients_list_types` VALUES (1, 'اجباری مشتری'), (2, 'اجباری پرسنلی'), (3, 'اجباری واژه نامه');
COMMIT;

-- ----------------------------
-- Table structure for accounting_costs
-- ----------------------------
DROP TABLE IF EXISTS `accounting_costs`;
CREATE TABLE `accounting_costs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `cost_type_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `is_active` bit(1) NOT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `voucher_allow` bit(1) NOT NULL,
  `budget_allow` bit(1) NOT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `cost_type_id`(`cost_type_id`) USING BTREE,
  CONSTRAINT `accounting_costs_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `accounting_costs_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_costs_ibfk_2` FOREIGN KEY (`cost_type_id`) REFERENCES `accounting_costs_list_cost_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_costs
-- ----------------------------
BEGIN;
INSERT INTO `accounting_costs` VALUES (1, 1, NULL, '4', '4', b'0', '4', b'1', b'0', NULL), (2, 2, NULL, '3', '3', b'1', '3', b'0', b'0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_costs_list_cost_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_costs_list_cost_types`;
CREATE TABLE `accounting_costs_list_cost_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_costs_list_cost_types
-- ----------------------------
BEGIN;
INSERT INTO `accounting_costs_list_cost_types` VALUES (1, 'تولیدی'), (2, 'خدماتی'), (3, 'پروژه ای'), (4, 'اداری - توزیع - فروش');
COMMIT;

-- ----------------------------
-- Table structure for accounting_costs_list_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_costs_list_types`;
CREATE TABLE `accounting_costs_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_costs_list_types
-- ----------------------------
BEGIN;
INSERT INTO `accounting_costs_list_types` VALUES (1, 'هزینه'), (2, 'درآمد');
COMMIT;

-- ----------------------------
-- Table structure for accounting_costs_units
-- ----------------------------
DROP TABLE IF EXISTS `accounting_costs_units`;
CREATE TABLE `accounting_costs_units`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost_id` int(11) NOT NULL,
  `organization_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cost_id`(`cost_id`) USING BTREE,
  INDEX `organization_unit_id`(`organization_unit_id`) USING BTREE,
  CONSTRAINT `accounting_costs_units_ibfk_1` FOREIGN KEY (`cost_id`) REFERENCES `accounting_costs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_costs_units_ibfk_2` FOREIGN KEY (`organization_unit_id`) REFERENCES `organizations_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for accounting_floats
-- ----------------------------
DROP TABLE IF EXISTS `accounting_floats`;
CREATE TABLE `accounting_floats`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `voucher_allow` bit(1) NOT NULL,
  `budget_allow` bit(1) NOT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  CONSTRAINT `accounting_floats_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_floats
-- ----------------------------
BEGIN;
INSERT INTO `accounting_floats` VALUES (1, 1, '1', '2', '3', b'1', b'1', NULL), (2, 1, '4', '5', '6', b'0', b'0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_formats
-- ----------------------------
DROP TABLE IF EXISTS `accounting_formats`;
CREATE TABLE `accounting_formats`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `format_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `length` int(11) NOT NULL,
  `format_id` int(11) NOT NULL,
  `order_id` int(11) NULL DEFAULT NULL,
  `account_name_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `format_id`(`format_id`) USING BTREE,
  INDEX `order_id`(`order_id`) USING BTREE,
  INDEX `account_name_id`(`account_name_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `accounting_formats_ibfk_1` FOREIGN KEY (`format_id`) REFERENCES `accounting_list_formats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_formats_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `accounting_list_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_formats_ibfk_3` FOREIGN KEY (`account_name_id`) REFERENCES `accounting_list_account_names` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_formats_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `accounting_formats_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_formats
-- ----------------------------
BEGIN;
INSERT INTO `accounting_formats` VALUES (1, 1, 'گروه', 1, 1, 1, 1), (2, 1, 'کل', 2, 1, 1, 1), (12, 2, '1', 1, 1, 1, 1), (13, 2, '2', 2, 2, 2, 2), (14, 3, '1', 1, 1, 1, 1), (15, 3, '2', 2, 2, 2, 2), (16, 4, '1', 1, 1, 1, 1), (17, 4, '2', 2, 2, 2, 2), (18, 5, '1', 1, 1, 1, 1), (19, 5, '2', 2, 2, 2, 2), (20, 6, '1', 1, 1, 1, 1), (21, 6, '3', 3, 2, 2, 2), (22, 3, 'as', 1, 1, 4, NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_formats_list_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_formats_list_types`;
CREATE TABLE `accounting_formats_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_formats_list_types
-- ----------------------------
BEGIN;
INSERT INTO `accounting_formats_list_types` VALUES (1, 'حسابها'), (2, 'اشخاص'), (3, 'شناور'), (4, 'مراکز هزینه'), (5, 'مراکز درآمد'), (6, 'پروژه ها');
COMMIT;

-- ----------------------------
-- Table structure for accounting_list_account_names
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_account_names`;
CREATE TABLE `accounting_list_account_names`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_list_account_names
-- ----------------------------
BEGIN;
INSERT INTO `accounting_list_account_names` VALUES (1, 'اختیاری'), (2, 'اجباری (واژه نامه)');
COMMIT;

-- ----------------------------
-- Table structure for accounting_list_clients
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_clients`;
CREATE TABLE `accounting_list_clients`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL,
  `symbol_id` int(11) NULL DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `actype_id` int(11) NULL DEFAULT NULL,
  `tctype_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `check_id` int(11) NULL DEFAULT NULL,
  `budget_id` int(11) NULL DEFAULT NULL,
  `note_id` int(11) NULL DEFAULT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `voucher_allow` bit(1) NULL DEFAULT NULL,
  `force_floating` bit(1) NULL DEFAULT NULL,
  `force_client` bit(1) NULL DEFAULT NULL,
  `budget_allow` bit(1) NULL DEFAULT NULL,
  `force_cost_center` bit(1) NULL DEFAULT NULL,
  `force_revenue_center` bit(1) NULL DEFAULT NULL,
  `force_project` bit(1) NULL DEFAULT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `note_id`(`note_id`) USING BTREE,
  INDEX `symbol_id`(`symbol_id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  CONSTRAINT `accounting_list_clients_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `accounting_list_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_list_clients_ibfk_2` FOREIGN KEY (`symbol_id`) REFERENCES `accounting_list_symbols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_list_clients_ibfk_3` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_list_clients
-- ----------------------------
BEGIN;
INSERT INTO `accounting_list_clients` VALUES (1, NULL, NULL, 'a', NULL, NULL, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_list_clients_notes
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_clients_notes`;
CREATE TABLE `accounting_list_clients_notes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NULL DEFAULT NULL,
  `note_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `client_id`(`client_id`) USING BTREE,
  INDEX `note_id`(`note_id`) USING BTREE,
  CONSTRAINT `accounting_list_clients_notes_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `accounting_list_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_list_clients_notes_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `accounting_list_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for accounting_list_formats
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_formats`;
CREATE TABLE `accounting_list_formats`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_list_formats
-- ----------------------------
BEGIN;
INSERT INTO `accounting_list_formats` VALUES (1, 'عدد'), (2, 'حروف'), (3, 'حروف-عدد'), (4, 'عدد-حروف');
COMMIT;

-- ----------------------------
-- Table structure for accounting_list_notes
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_notes`;
CREATE TABLE `accounting_list_notes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for accounting_list_orders
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_orders`;
CREATE TABLE `accounting_list_orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_list_orders
-- ----------------------------
BEGIN;
INSERT INTO `accounting_list_orders` VALUES (1, 'یک حرف'), (2, 'دو حرف'), (3, 'سه حرف'), (4, 'چهار حرف'), (5, 'پنج حرف'), (6, 'شش حرف');
COMMIT;

-- ----------------------------
-- Table structure for accounting_list_symbols
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_symbols`;
CREATE TABLE `accounting_list_symbols`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `short_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `code_id` int(11) NULL DEFAULT NULL,
  `decimal_count` int(11) NULL DEFAULT NULL,
  `fee_decimal_count` int(11) NULL DEFAULT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `is_active` bit(1) NULL DEFAULT NULL,
  `auto_update` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `code_id`(`code_id`) USING BTREE,
  CONSTRAINT `accounting_list_symbols_ibfk_1` FOREIGN KEY (`code_id`) REFERENCES `accounting_list_symbols_list_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_list_symbols
-- ----------------------------
BEGIN;
INSERT INTO `accounting_list_symbols` VALUES (1, 1, 'ریال', 'ریال', NULL, 0, 0, '', b'1', b'1'), (2, 3, 'دلار', 'دلار', NULL, 0, 0, '', b'1', b'1'), (3, 2, 'یورو', 'یورو', NULL, 0, 0, '3', b'1', b'1');
COMMIT;

-- ----------------------------
-- Table structure for accounting_list_symbols_list_codes
-- ----------------------------
DROP TABLE IF EXISTS `accounting_list_symbols_list_codes`;
CREATE TABLE `accounting_list_symbols_list_codes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for accounting_projects
-- ----------------------------
DROP TABLE IF EXISTS `accounting_projects`;
CREATE TABLE `accounting_projects`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `is_active` bit(1) NOT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `voucher_allow` bit(1) NOT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_projects
-- ----------------------------
BEGIN;
INSERT INTO `accounting_projects` VALUES (1, '1', '1', b'1', '1', b'0', NULL), (2, '2', '2', b'1', '1', b'0', NULL), (3, '3', '3', b'1', '1', b'0', NULL), (4, '4', '4', b'1', '1', b'0', NULL), (7, '22', 'ffff', b'0', '222', b'0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for accounting_settings
-- ----------------------------
DROP TABLE IF EXISTS `accounting_settings`;
CREATE TABLE `accounting_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_account01_id` int(11) NULL DEFAULT NULL,
  `default_account02_id` int(11) NULL DEFAULT NULL,
  `default_account03_id` int(11) NULL DEFAULT NULL,
  `default_account04_id` int(11) NULL DEFAULT NULL,
  `default_account05_id` int(11) NULL DEFAULT NULL,
  `default_account06_id` int(11) NULL DEFAULT NULL,
  `default_account07_id` int(11) NULL DEFAULT NULL,
  `default_account08_id` int(11) NULL DEFAULT NULL,
  `default_account09_id` int(11) NULL DEFAULT NULL,
  `default_account10_id` int(11) NULL DEFAULT NULL,
  `default_account11_id` int(11) NULL DEFAULT NULL,
  `default_account12_id` int(11) NULL DEFAULT NULL,
  `default_account13_id` int(11) NULL DEFAULT NULL,
  `default_account14_id` int(11) NULL DEFAULT NULL,
  `default_account15_id` int(11) NULL DEFAULT NULL,
  `default_account16_id` int(11) NULL DEFAULT NULL,
  `default_account17_id` int(11) NULL DEFAULT NULL,
  `default_account18_id` int(11) NULL DEFAULT NULL,
  `default_account19_id` int(11) NULL DEFAULT NULL,
  `default_account20_id` int(11) NULL DEFAULT NULL,
  `default_account21_id` int(11) NULL DEFAULT NULL,
  `default_account22_id` int(11) NULL DEFAULT NULL,
  `default_account23_id` int(11) NULL DEFAULT NULL,
  `default_account24_id` int(11) NULL DEFAULT NULL,
  `default_account25_id` int(11) NULL DEFAULT NULL,
  `default_account26_id` int(11) NULL DEFAULT NULL,
  `default_account27_id` int(11) NULL DEFAULT NULL,
  `default_account28_id` int(11) NULL DEFAULT NULL,
  `default_account29_id` int(11) NULL DEFAULT NULL,
  `default_account30_id` int(11) NULL DEFAULT NULL,
  `default_account31_id` int(11) NULL DEFAULT NULL,
  `default_account32_id` int(11) NULL DEFAULT NULL,
  `default_account33_id` int(11) NULL DEFAULT NULL,
  `default_account34_id` int(11) NULL DEFAULT NULL,
  `default_account35_id` int(11) NULL DEFAULT NULL,
  `default_account36_id` int(11) NULL DEFAULT NULL,
  `default_account37_id` int(11) NULL DEFAULT NULL,
  `default_account38_id` int(11) NULL DEFAULT NULL,
  `default_account39_id` int(11) NULL DEFAULT NULL,
  `default_account40_id` int(11) NULL DEFAULT NULL,
  `default_account41_id` int(11) NULL DEFAULT NULL,
  `default_account42_id` int(11) NULL DEFAULT NULL,
  `default_account43_id` int(11) NULL DEFAULT NULL,
  `default_account44_id` int(11) NULL DEFAULT NULL,
  `default_account45_id` int(11) NULL DEFAULT NULL,
  `default_account46_id` int(11) NULL DEFAULT NULL,
  `default_account47_id` int(11) NULL DEFAULT NULL,
  `default_account48_id` int(11) NULL DEFAULT NULL,
  `default_account49_id` int(11) NULL DEFAULT NULL,
  `default_account50_id` int(11) NULL DEFAULT NULL,
  `default_account51_id` int(11) NULL DEFAULT NULL,
  `default_account52_id` int(11) NULL DEFAULT NULL,
  `default_account53_id` int(11) NULL DEFAULT NULL,
  `default_account54_id` int(11) NULL DEFAULT NULL,
  `default_account55_id` int(11) NULL DEFAULT NULL,
  `default_account56_id` int(11) NULL DEFAULT NULL,
  `default_account57_id` int(11) NULL DEFAULT NULL,
  `default_account58_id` int(11) NULL DEFAULT NULL,
  `default_account59_id` int(11) NULL DEFAULT NULL,
  `default_account60_id` int(11) NULL DEFAULT NULL,
  `default_account61_id` int(11) NULL DEFAULT NULL,
  `default_account62_id` int(11) NULL DEFAULT NULL,
  `default_account63_id` int(11) NULL DEFAULT NULL,
  `default_account64_id` int(11) NULL DEFAULT NULL,
  `default_account65_id` int(11) NULL DEFAULT NULL,
  `default_account66_id` int(11) NULL DEFAULT NULL,
  `default_account67_id` int(11) NULL DEFAULT NULL,
  `id_p01` int(11) NULL DEFAULT NULL,
  `id_p02` int(11) NULL DEFAULT NULL,
  `id_p03` int(11) NULL DEFAULT NULL,
  `id_p04` int(11) NULL DEFAULT NULL,
  `id_p05` int(11) NULL DEFAULT NULL,
  `id_p06` int(11) NULL DEFAULT NULL,
  `id_p07` int(11) NULL DEFAULT NULL,
  `id_p08` int(11) NULL DEFAULT NULL,
  `id_p09` int(11) NULL DEFAULT NULL,
  `id_p10` int(11) NULL DEFAULT NULL,
  `id_p11` int(11) NULL DEFAULT NULL,
  `id_p12` int(11) NULL DEFAULT NULL,
  `valint01` int(11) NULL DEFAULT NULL,
  `valint02` int(11) NULL DEFAULT NULL,
  `valint03` int(11) NULL DEFAULT NULL,
  `valint04` int(11) NULL DEFAULT NULL,
  `valint05` int(11) NULL DEFAULT NULL,
  `valint06` int(11) NULL DEFAULT NULL,
  `valint07` int(11) NULL DEFAULT NULL,
  `valint08` int(11) NULL DEFAULT NULL,
  `valint09` int(11) NULL DEFAULT NULL,
  `valint10` int(11) NULL DEFAULT NULL,
  `valint11` int(11) NULL DEFAULT NULL,
  `valint12` int(11) NULL DEFAULT NULL,
  `valint13` int(11) NULL DEFAULT NULL,
  `valint14` int(11) NULL DEFAULT NULL,
  `bit01` bit(1) NULL DEFAULT NULL,
  `bit02` bit(1) NULL DEFAULT NULL,
  `bit03` bit(1) NULL DEFAULT NULL,
  `bit04` bit(1) NULL DEFAULT NULL,
  `bit05` bit(1) NULL DEFAULT NULL,
  `bit06` bit(1) NULL DEFAULT NULL,
  `name01` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `name02` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_settings
-- ----------------------------
BEGIN;
INSERT INTO `accounting_settings` VALUES (1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, 3, 5, 7, 1, 7, 9, 11, 13, 15, 16, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 90, 92, b'1', b'1', b'1', b'1', b'1', b'1', '91', '93');
COMMIT;

-- ----------------------------
-- Table structure for accounting_settings_items
-- ----------------------------
DROP TABLE IF EXISTS `accounting_settings_items`;
CREATE TABLE `accounting_settings_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `accounting_settings_items_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `accounting_settings_items_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_settings_items
-- ----------------------------
BEGIN;
INSERT INTO `accounting_settings_items` VALUES (1, 1, 'شروع ماه'), (2, 1, 'شروع سال'), (3, 2, 'با هشدار'), (4, 2, 'با جلوگیری'), (5, 3, 'با هشدار'), (6, 3, 'با جلوگیری'), (7, 4, 'اختیاری'), (8, 4, 'اجباری'), (9, 5, 'خرید (bid)'), (10, 5, 'فروش (ask)'), (11, 6, 'غیرفعال'), (12, 6, 'فعال'), (13, 7, 'غیرفعال'), (14, 7, 'فعال'), (15, 8, 'Default template'), (16, 9, 'Default template');
COMMIT;

-- ----------------------------
-- Table structure for accounting_settings_items_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_settings_items_types`;
CREATE TABLE `accounting_settings_items_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_settings_items_types
-- ----------------------------
BEGIN;
INSERT INTO `accounting_settings_items_types` VALUES (1, 'تاریخ شروع دفتر حساب'), (2, 'واکنش به خروج از حد بودجه'), (3, 'کنترل خلاف ماهیت'), (4, 'نحوه ارث بری کنترل خلاف ماهیت'), (5, 'نرخ مبنا'), (6, 'اعمال اختلاف نرخ'), (7, 'وضعیت'), (8, '«بررسی» به «انجام»'), (9, '«انجام» به «کامل»');
COMMIT;

-- ----------------------------
-- Table structure for accounting_settings_list_accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounting_settings_list_accounts`;
CREATE TABLE `accounting_settings_list_accounts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `client_id`(`client_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `accounting_settings_list_accounts_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `accounting_settings_list_accounts_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounting_settings_list_accounts_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `accounting_list_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_settings_list_accounts
-- ----------------------------
BEGIN;
INSERT INTO `accounting_settings_list_accounts` VALUES (9, 4, 1), (14, 10, 1), (15, 1, 1), (17, 2, 1), (18, 18, 1), (19, 48, 1), (20, 59, 1), (21, 50, 1), (22, 55, 1), (23, 35, 1), (24, 3, 1);
COMMIT;

-- ----------------------------
-- Table structure for accounting_settings_list_accounts_types
-- ----------------------------
DROP TABLE IF EXISTS `accounting_settings_list_accounts_types`;
CREATE TABLE `accounting_settings_list_accounts_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of accounting_settings_list_accounts_types
-- ----------------------------
BEGIN;
INSERT INTO `accounting_settings_list_accounts_types` VALUES (1, 'صندوق پیش فرض (ارز پایه)'), (2, 'حساب سود و زیان حاصل از تسعیر'), (3, 'اسناد پرداختنی تجاری کوتاه مدت'), (4, 'اسناد پرداختنی غیر تجاری کوتاه مدت'), (5, 'اسناد دریافتنی تجاری کوتاه مدت'), (6, 'اسناد دریافتنی غیر تجاری کوتاه مدت'), (7, 'اسناد در جریان وصول'), (8, 'حساب های انتظامی بعهده شرکت'), (9, 'حسابهای بانک'), (10, 'حساب سود و زیان جاری'), (11, 'اسناد برگشتی - پرداختنی'), (12, 'اسناد پرداختنی تجاری بلند مدت'), (13, 'اسناد پرداختنی غیر تجاری بلند مدت'), (14, 'اسناد دریافتنی تجاری بلند مدت'), (15, 'اسناد دریافتنی غیر تجاری بلند مدت'), (16, 'اسناد برگشتی - دریافتنی'), (17, 'حساب های انتظامی بنفع شرکت'), (18, 'تامین کنندگان'), (19, 'حساب سربار تولید'), (20, 'حساب اضافی انبارگردانی'), (21, 'رسید امانی'), (22, 'حواله امانی'), (23, 'حساب کنترلی انتقال'), (24, 'مشتری حواله'), (25, 'حساب کالای در جریان ساخت'), (26, 'حساب کسری انبارگردانی'), (27, 'رسید برگشت امانی'), (28, 'حواله برگشت امانی'), (29, 'حساب ضایعات'), (30, 'مشتریان'), (31, 'قیمت تمام شده محصولات'), (32, 'قیمت تمام شده خدمات'), (33, 'مالیات'), (34, 'اضافات'), (35, 'برگشت از فروش'), (36, 'حساب هزینه پورسانت'), (37, 'مرکز هزینه درخواست کننده'), (38, 'حساب پیش دریافت'), (39, 'فروش محصولات'), (40, 'درآمد خدمات'), (41, 'ارزش افزوده'), (42, 'عوارض'), (43, 'کسورات'), (44, 'حساب پورسانت پرداختنی'), (45, 'حساب هزینه تخفیف'), (46, 'مرکز هزینه مصرف کننده'), (47, 'تخفیف'), (48, 'تامین کنندگان'), (49, 'کنترل خرید'), (50, 'مالیات'), (51, 'اضافات'), (52, 'تخفیف'), (53, 'کنترل برگشت از خرید'), (54, 'مشتریان ارزی'), (55, 'ارزش افزوده'), (56, 'عوارض'), (57, 'کسورات'), (58, 'کنترل تخفیف'), (59, 'خرید'), (60, 'اسقاط'), (61, 'زیان'), (62, 'فروش'), (63, 'سود'), (64, 'سود و زیان انباشته');
COMMIT;

-- ----------------------------
-- Table structure for accounting_settings_list_others
-- ----------------------------
DROP TABLE IF EXISTS `accounting_settings_list_others`;
CREATE TABLE `accounting_settings_list_others`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `client_id`(`client_id`) USING BTREE,
  CONSTRAINT `accounting_settings_list_others_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `accounting_list_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `auth_assignment_user_id_idx`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
BEGIN;
INSERT INTO `auth_assignment` VALUES ('Bedehkari', '1', 1566298307), ('Dashboard', '1', 1566298306), ('Dashboard', '11', 1566299831), ('Dashboard', '12', 1566300055), ('Dashboard', '13', 1566635810), ('Dashboard', '14', 1566893900), ('Dashboard', '15', 1567715599), ('Dashboard', '16', 1567771317), ('Dashboard', '2', 1566298572), ('Discount', '1', 1566298307), ('Email', '1', 1566298307), ('EmailSettings', '1', 1566298307), ('Hesabha', '1', 1566298307), ('Kala', '1', 1566298307), ('NoeBedehkari', '1', 1566298307), ('NoeDaryaftPardakht', '1', 1566298307), ('Profile', '1', 1566298306), ('Profile', '11', 1566299831), ('Profile', '12', 1566300055), ('Profile', '13', 1566635810), ('Profile', '14', 1566893900), ('Profile', '15', 1567715599), ('Profile', '16', 1567771317), ('Profile', '2', 1566298572), ('Sale', '1', 1566298307), ('SiteSettings', '1', 1566298307), ('Sms', '1', 1566298307), ('SmsSettings', '1', 1566298307), ('Ticketing', '1', 1566298306), ('Ticketing', '11', 1566299831), ('Ticketing', '12', 1566300055), ('Ticketing', '13', 1566635810), ('Ticketing', '14', 1566893900), ('Ticketing', '15', 1567715599), ('Ticketing', '16', 1567771317), ('Ticketing', '2', 1566298572), ('Users', '1', 1566298307), ('UsersGroups', '1', 1566298307), ('VahedKala', '1', 1566298307);
COMMIT;

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
BEGIN;
INSERT INTO `auth_item` VALUES ('Bedehkari', 2, '11- بدهکاری ها', 'TcodingRule', NULL, 1558638364, 1558638364), ('Dashboard', 2, '1- داشبورد', NULL, NULL, 1558638363, 1558638363), ('Discount', 2, '8- تخفیفات', 'TcodingRule', NULL, 1558638364, 1558638364), ('Email', 2, '16- ایمیل ها', NULL, NULL, 1558638364, 1558638364), ('EmailSettings', 2, '17- تنظیمات ایمیل', NULL, NULL, 1558638364, 1558638364), ('Hesabha', 2, '13- حساب ها', NULL, NULL, 1558638364, 1558638364), ('Kala', 2, '7- کالاها', 'TcodingRule', NULL, 1558638363, 1558638363), ('NoeBedehkari', 2, '10- انواع بدهکاری', 'TcodingRule', NULL, 1558638364, 1558638364), ('NoeDaryaftPardakht', 2, '12- نوع دریافت - پرداخت', 'TcodingRule', NULL, 1558638364, 1558638364), ('Profile', 2, '2- پروفایل', NULL, NULL, 1558638363, 1558638363), ('Sale', 2, '9- فروش', 'TcodingRule', NULL, 1558638364, 1558638364), ('SiteSettings', 2, '18- تنظیمات سایت', NULL, NULL, 1558638364, 1558638364), ('Sms', 2, '14- پیامک ها', NULL, NULL, 1558638364, 1558638364), ('SmsSettings', 2, '15- تنظیمات پیامک', NULL, NULL, 1558638364, 1558638364), ('Tcoding', 2, '0- اطلاعات پایه', NULL, NULL, 1558638363, 1558638363), ('Ticketing', 2, '3- تیکت ها', NULL, NULL, 1558638363, 1558638363), ('Users', 2, '5- کاربران', NULL, NULL, 1558638363, 1558638363), ('UsersGroups', 2, '4- گروه کاربری', NULL, NULL, 1558638363, 1558638363), ('VahedKala', 2, '6- واحد کالا', 'TcodingRule', NULL, 1558638363, 1558638363);
COMMIT;

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
BEGIN;
INSERT INTO `auth_item_child` VALUES ('Bedehkari', 'Tcoding'), ('Discount', 'Tcoding'), ('Kala', 'Tcoding'), ('NoeBedehkari', 'Tcoding'), ('NoeDaryaftPardakht', 'Tcoding'), ('Sale', 'Tcoding'), ('VahedKala', 'Tcoding');
COMMIT;

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
BEGIN;
INSERT INTO `auth_rule` VALUES ('TcodingRule', 0x4F3A34303A226170705C6D6F64756C65735C75736572735C636F6D706F6E656E74735C54636F64696E6752756C65223A333A7B733A343A226E616D65223B733A31313A2254636F64696E6752756C65223B733A393A22637265617465644174223B693A313535383633383336333B733A393A22757064617465644174223B693A313535383633383336333B7D, 1558638363, 1558638363);
COMMIT;

-- ----------------------------
-- Table structure for calendars
-- ----------------------------
DROP TABLE IF EXISTS `calendars`;
CREATE TABLE `calendars`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `favcolor` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `start_time` datetime(0) NOT NULL,
  `end_time` datetime(0) NOT NULL,
  `time_id` int(11) NULL DEFAULT NULL,
  `period_id` int(11) NULL DEFAULT NULL,
  `alarm_type_id` int(11) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `implementation_steps` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `has_reception` int(11) NULL DEFAULT NULL,
  `catering_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  INDEX `time_id`(`time_id`) USING BTREE,
  INDEX `period_id`(`period_id`) USING BTREE,
  INDEX `alarm_type_id`(`alarm_type_id`) USING BTREE,
  INDEX `catering_id`(`catering_id`) USING BTREE,
  CONSTRAINT `calendars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `calendars_list_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `calendars_list_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_ibfk_4` FOREIGN KEY (`time_id`) REFERENCES `calendars_list_time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_ibfk_5` FOREIGN KEY (`period_id`) REFERENCES `calendars_list_period` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_ibfk_6` FOREIGN KEY (`alarm_type_id`) REFERENCES `calendars_list_alarm_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_ibfk_7` FOREIGN KEY (`catering_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for calendars_alarms
-- ----------------------------
DROP TABLE IF EXISTS `calendars_alarms`;
CREATE TABLE `calendars_alarms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `time_id` int(11) NULL DEFAULT NULL,
  `period_id` int(11) NULL DEFAULT NULL,
  `alarm_type_id` int(11) NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `time_id`(`time_id`) USING BTREE,
  INDEX `period_id`(`period_id`) USING BTREE,
  INDEX `alarm_type_id`(`alarm_type_id`) USING BTREE,
  INDEX `calendars_alarms_ibfk_1`(`calendar_id`) USING BTREE,
  CONSTRAINT `calendars_alarms_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_alarms_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `calendars_list_time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_alarms_ibfk_3` FOREIGN KEY (`period_id`) REFERENCES `calendars_list_period` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_alarms_ibfk_4` FOREIGN KEY (`alarm_type_id`) REFERENCES `calendars_list_alarm_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 985 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for calendars_events
-- ----------------------------
DROP TABLE IF EXISTS `calendars_events`;
CREATE TABLE `calendars_events`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alarm_id` int(11) NOT NULL,
  `calendar_id` int(11) NOT NULL,
  `datetime` datetime(0) NOT NULL,
  `done` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `calendar_id`(`calendar_id`) USING BTREE,
  INDEX `alarm_id`(`alarm_id`) USING BTREE,
  CONSTRAINT `calendars_events_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_events_ibfk_2` FOREIGN KEY (`alarm_id`) REFERENCES `calendars_alarms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1085 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for calendars_for_information
-- ----------------------------
DROP TABLE IF EXISTS `calendars_for_information`;
CREATE TABLE `calendars_for_information`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `calendar_id`(`calendar_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `calendars_for_information_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_for_information_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1323 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for calendars_implementation
-- ----------------------------
DROP TABLE IF EXISTS `calendars_implementation`;
CREATE TABLE `calendars_implementation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `calendar_id`(`calendar_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `calendars_implementation_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_implementation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 381 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for calendars_list_alarm_type
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_alarm_type`;
CREATE TABLE `calendars_list_alarm_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_alarm_type
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_alarm_type` VALUES (1, 'اعلان در سایت'), (2, 'اعلان پیامک'), (3, 'اعلان در سایت + پیامک');
COMMIT;

-- ----------------------------
-- Table structure for calendars_list_period
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_period`;
CREATE TABLE `calendars_list_period`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `days` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_period
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_period` VALUES (1, 'بدون تکرار', 1), (2, 'هر روز', 1), (3, 'یک روز در میان', 2), (4, 'هر سه روز یک بار', 3), (5, 'هر هفته', 7), (6, 'یک هفته در میان', 14), (7, 'هر ماه', 30), (8, 'یک ماه در میان', 60), (9, 'هر سه ماه یک بار', 90), (10, 'هر سال', 264);
COMMIT;

-- ----------------------------
-- Table structure for calendars_list_requirements
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_requirements`;
CREATE TABLE `calendars_list_requirements`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `title`(`title`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_requirements
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_requirements` VALUES (3, 'aaaa'), (2, 'asda'), (1, 'چای');
COMMIT;

-- ----------------------------
-- Table structure for calendars_list_sections
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_sections`;
CREATE TABLE `calendars_list_sections`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_sections
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_sections` VALUES (1, 'نمایش'), (2, 'برنامه ریزی'), (3, 'مدیر');
COMMIT;

-- ----------------------------
-- Table structure for calendars_list_status
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_status`;
CREATE TABLE `calendars_list_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_status
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_status` VALUES (1, 'فعال'), (2, 'کامل شده'), (3, 'لغو شده');
COMMIT;

-- ----------------------------
-- Table structure for calendars_list_time
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_time`;
CREATE TABLE `calendars_list_time`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `times` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_time
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_time` VALUES (1, 'بدون هشدار', 0), (2, 'سر وقت', 0), (3, 'پنج دقیقه قبل', 300), (4, 'ده دقیقه قبل', 600), (5, 'پانزده دقیقه قبل', 900), (6, 'سی دقیقه قبل', 1800), (7, 'یک ساعت قبل', 3600), (8, 'دو ساعت قبل', 7200), (9, 'یک روز قبل', 86400), (10, 'دو روز قبل', 172800), (11, 'یک هفته قبل', 604800), (12, 'یک ماه قبل', 2592000);
COMMIT;

-- ----------------------------
-- Table structure for calendars_list_type
-- ----------------------------
DROP TABLE IF EXISTS `calendars_list_type`;
CREATE TABLE `calendars_list_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `sort` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_list_type
-- ----------------------------
BEGIN;
INSERT INTO `calendars_list_type` VALUES (1, 'تقویم 1', 'ad', 3), (2, 'test', 'asd', 1), (14, 'test', 'asd', 2), (15, 'test', 'asd', 4);
COMMIT;

-- ----------------------------
-- Table structure for calendars_requirements
-- ----------------------------
DROP TABLE IF EXISTS `calendars_requirements`;
CREATE TABLE `calendars_requirements`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `calendar_id`(`calendar_id`) USING BTREE,
  INDEX `requirement_id`(`requirement_id`) USING BTREE,
  CONSTRAINT `calendars_requirements_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_requirements_ibfk_2` FOREIGN KEY (`requirement_id`) REFERENCES `calendars_list_requirements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for calendars_sections
-- ----------------------------
DROP TABLE IF EXISTS `calendars_sections`;
CREATE TABLE `calendars_sections`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `section_id`(`section_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `calendars_sections_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `calendars_list_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_sections_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `calendars_list_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_sections_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of calendars_sections
-- ----------------------------
BEGIN;
INSERT INTO `calendars_sections` VALUES (23, 1, 1, 1), (24, 1, 2, 1), (25, 1, 3, 1);
COMMIT;

-- ----------------------------
-- Table structure for calendars_users
-- ----------------------------
DROP TABLE IF EXISTS `calendars_users`;
CREATE TABLE `calendars_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `calendar_id`(`calendar_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `calendars_users_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `calendars_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for geo_cities
-- ----------------------------
DROP TABLE IF EXISTS `geo_cities`;
CREATE TABLE `geo_cities`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `province_id`(`province_id`) USING BTREE,
  CONSTRAINT `geo_cities_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `geo_provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1180 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of geo_cities
-- ----------------------------
BEGIN;
INSERT INTO `geo_cities` VALUES (1, 1, 'آبش احمد'), (2, 1, 'آذرشهر'), (3, 1, 'آقکند'), (4, 1, 'اچاچی'), (5, 1, 'اسکو'), (6, 1, 'اهر'), (7, 1, 'ایلخچی'), (8, 1, 'باسمنج'), (9, 1, 'بخشایش'), (10, 1, 'بستان آباد'), (11, 1, 'بناب'), (12, 1, 'بناب مرند'), (13, 1, 'تبریز'), (14, 1, 'ترک'), (15, 1, 'ترکمانچای'), (16, 1, 'تسوج'), (17, 1, 'تیکمه داش'), (18, 1, 'تیمورلو'), (19, 1, 'جلفا'), (20, 1, 'جوان قلعه'), (21, 1, 'خاروانا'), (22, 1, 'خامنه'), (23, 1, 'خداجو(خراجو)'), (24, 1, 'خسروشاه'), (25, 1, 'خمارلو'), (26, 1, 'خواجه'), (27, 1, 'دوزدوزان'), (28, 1, 'زرنق'), (29, 1, 'زنوز'), (30, 1, 'سراب'), (31, 1, 'سردرود'), (32, 1, 'سهند'), (33, 1, 'سیس'), (34, 1, 'سیه رود'), (35, 1, 'شبستر'), (36, 1, 'شربیان'), (37, 1, 'شرفخانه'), (38, 1, 'شندآباد'), (39, 1, 'صوفیان'), (40, 1, 'عجب شیر'), (41, 1, 'قره آغاج'), (42, 1, 'کشکسرای'), (43, 1, 'کلوانق'), (44, 1, 'کلیبر'), (45, 1, 'کوزه کنان'), (46, 1, 'گوگان'), (47, 1, 'لیلان'), (48, 1, 'مبارک شهر'), (49, 1, 'مراغه'), (50, 1, 'مرند'), (51, 1, 'ملکان'), (52, 1, 'ممقان'), (53, 1, 'مهربان'), (54, 1, 'میانه'), (55, 1, 'نظرکهریزی'), (56, 1, 'وایقان'), (57, 1, 'ورزقان'), (58, 1, 'هادیشهر'), (59, 1, 'هریس'), (60, 1, 'هشترود'), (61, 1, 'هوراند'), (62, 1, 'یامچی'), (63, 2, 'آواجیق'), (64, 2, 'ارومیه'), (65, 2, 'اشنویه'), (66, 2, 'ایواوغلی'), (67, 2, 'باروق'), (68, 2, 'بازرگان'), (69, 2, 'بوکان'), (70, 2, 'پلدشت'), (71, 2, 'پیرانشهر'), (72, 2, 'تازه شهر'), (73, 2, 'تکاب'), (74, 2, 'چهاربرج'), (75, 2, 'خلیفان'), (76, 2, 'خوی'), (77, 2, 'دیزج دیز'), (78, 2, 'ربط'), (79, 2, 'زرآباد'), (80, 2, 'سردشت'), (81, 2, 'سرو'), (82, 2, 'سلماس'), (83, 2, 'سیلوانه'), (84, 2, 'سیمینه'), (85, 2, 'سیه چشمه'), (86, 2, 'شاهین دژ'), (87, 2, 'شوط'), (88, 2, 'فیرورق'), (89, 2, 'قره ضیاءالدین'), (90, 2, 'قطور'), (91, 2, 'قوشچی'), (92, 2, 'کشاورز'), (93, 2, 'گردکشانه'), (94, 2, 'ماکو'), (95, 2, 'محمدیار'), (96, 2, 'محمودآباد'), (97, 2, 'مرگنلر'), (98, 2, 'مهاباد'), (99, 2, 'میاندوآب'), (100, 2, 'میرآباد'), (101, 2, 'نازک علیا'), (102, 2, 'نالوس'), (103, 2, 'نقده'), (104, 2, 'نوشین'), (105, 3, 'آبی بیگلو'), (106, 3, 'اردبیل'), (107, 3, 'اسلام اباد'), (108, 3, 'اصلاندوز'), (109, 3, 'بیله سوار'), (110, 3, 'پارس آباد'), (111, 3, 'تازه کند'), (112, 3, 'تازه کندانگوت'), (113, 3, 'جعفرآباد'), (114, 3, 'خلخال'), (115, 3, 'رضی'), (116, 3, 'سرعین'), (117, 3, 'عنبران'), (118, 3, 'فخراباد'), (119, 3, 'قصابه'), (120, 3, 'کلور'), (121, 3, 'کوراییم'), (122, 3, 'گرمی'), (123, 3, 'گیوی'), (124, 3, 'لاهرود'), (125, 3, 'مرادلو'), (126, 3, 'مشگین شهر'), (127, 3, 'نمین'), (128, 3, 'نیر'), (129, 3, 'هشتجین'), (130, 3, 'هیر'), (131, 4, 'آران وبیدگل'), (132, 4, 'ابوزیدآباد'), (133, 4, 'اردستان'), (134, 4, 'اژیه'), (135, 4, 'اصغرآباد'), (136, 4, 'انارک'), (137, 4, 'ایمانشهر'), (138, 4, 'بادرود'), (139, 4, 'بافران'), (140, 4, 'برزک'), (141, 4, 'برف انبار'), (142, 4, 'بویین ومیاندشت'), (143, 4, 'بهاران شهر'), (144, 4, 'بهارستان'), (145, 4, 'پیربکران'), (146, 4, 'تودشک'), (147, 4, 'تیران'), (148, 4, 'جوشقان قالی'), (149, 4, 'چرمهین'), (150, 4, 'چمگردان'), (151, 4, 'حبیب آباد'), (152, 4, 'حسن اباد'), (153, 4, 'حنا'), (154, 4, 'خالدآباد'), (155, 4, 'خوانسار'), (156, 4, 'خور'), (157, 4, 'خورزوق'), (158, 4, 'داران'), (159, 4, 'درچه'), (160, 4, 'دولت آباد'), (161, 4, 'دهاقان'), (162, 4, 'دهق'), (163, 4, 'دیزیچه'), (164, 4, 'رزوه'), (165, 4, 'رضوانشهر'), (166, 4, 'زاینده رود'), (167, 4, 'زرین شهر'), (168, 4, 'زواره'), (169, 4, 'زیار'), (170, 4, 'سجزی'), (171, 4, 'سده لنجان'), (172, 4, 'سفیدشهر'), (173, 4, 'سمیرم'), (174, 4, 'شاهین شهر'), (175, 4, 'شهرضا'), (176, 4, 'طرق رود'), (177, 4, 'عسگران'), (178, 4, 'علویجه'), (179, 4, 'فرخی'), (180, 4, 'فریدونشهر'), (181, 4, 'فولادشهر'), (182, 4, 'قهجاورستان'), (183, 4, 'قهدریجان'), (184, 4, 'کاشان'), (185, 4, 'کرکوند'), (186, 4, 'کلیشادوسودرجان'), (187, 4, 'کمشچه'), (188, 4, 'کوهپایه'), (189, 4, 'کهریزسنگ'), (190, 4, 'گرگاب'), (191, 4, 'گزبرخوار'), (192, 4, 'گلپایگان'), (193, 4, 'گلدشت'), (194, 4, 'گلشن'), (195, 4, 'گلشهر'), (196, 4, 'گوگد'), (197, 4, 'لای بید'), (198, 4, 'مجلسی'), (199, 4, 'مشکات'), (200, 4, 'منظریه'), (201, 4, 'میمه'), (202, 4, 'نجف آباد'), (203, 4, 'نصرآباد'), (204, 4, 'نیک آباد'), (205, 4, 'ونک'), (206, 4, 'هرند'), (207, 5, 'آسارا'), (208, 5, 'اشتهارد'), (209, 5, 'تنکمان'), (210, 5, 'چهارباغ'), (211, 5, 'شهرجدیدهشتگرد'), (212, 5, 'طالقان'), (213, 5, 'فردیس'), (214, 5, 'کرج'), (215, 5, 'کمال شهر'), (216, 5, 'کوهسار'), (217, 5, 'گرمدره'), (218, 5, 'گلسار'), (219, 5, 'ماهدشت'), (220, 5, 'محمدشهر'), (221, 5, 'مشکین دشت'), (222, 5, 'نظرآباد'), (223, 5, 'هشتگرد'), (224, 6, 'آبدانان'), (225, 6, 'آسمان آباد'), (226, 6, 'ایلام'), (227, 6, 'ایوان'), (228, 6, 'بدره'), (229, 6, 'بلاوه'), (230, 6, 'پهله'), (231, 6, 'سراب باغ'), (232, 6, 'شباب'), (233, 6, 'موسیان'), (234, 6, 'مهر'), (235, 6, 'مهران'), (236, 7, 'آب پخش'), (237, 7, 'آباد'), (238, 7, 'آبدان'), (239, 7, 'امام حسن'), (240, 7, 'انارستان'), (241, 7, 'اهرم'), (242, 7, 'بادوله'), (243, 7, 'برازجان'), (244, 7, 'بردخون'), (245, 7, 'بردستان'), (246, 7, 'بندردیر'), (247, 7, 'بندردیلم'), (248, 7, 'بندرریگ'), (249, 7, 'بندرکنگان'), (250, 7, 'بندرگناوه'), (251, 7, 'بنک'), (252, 7, 'بوشکان'), (253, 7, 'بوشهر'), (254, 7, 'تنگ ارم'), (255, 7, 'جم'), (256, 7, 'چغادک'), (257, 7, 'خارک'), (258, 7, 'خورموج'), (259, 7, 'دالکی'), (260, 7, 'دلوار'), (261, 7, 'دوراهک'), (262, 7, 'ریز'), (263, 7, 'سعد آباد'), (264, 7, 'سیراف'), (265, 7, 'شبانکاره'), (266, 7, 'شنبه'), (267, 7, 'عسلویه'), (268, 7, 'کاکی'), (269, 7, 'کلمه'), (270, 7, 'نخل تقی'), (271, 7, 'وحدتیه'), (272, 8, 'آبسرد'), (273, 8, 'آبعلی'), (274, 8, 'احمد آباد مستوفی'), (275, 8, 'ارجمند'), (276, 8, 'اسلامشهر'), (277, 8, 'اندیشه'), (278, 8, 'باغستان'), (279, 8, 'باقرشهر'), (280, 8, 'بومهن'), (281, 8, 'پاکدشت'), (282, 8, 'پردیس'), (283, 8, 'پرند'), (284, 8, 'پیشوا'), (285, 8, 'تجریش'), (286, 8, 'تهران'), (287, 8, 'جوادآباد'), (288, 8, 'چهاردانگه'), (289, 8, 'حسن آباد'), (290, 8, 'دماوند'), (291, 8, 'رباطکریم'), (292, 8, 'رودهن'), (293, 8, 'ری'), (294, 8, 'شاهدشهر'), (295, 8, 'شریف آباد'), (296, 8, 'شمشک'), (297, 8, 'شهریار'), (298, 8, 'صالحیه'), (299, 8, 'صباشهر'), (300, 8, 'صفادشت'), (301, 8, 'فردوسیه'), (302, 8, 'فرون اباد'), (303, 8, 'فشم'), (304, 8, 'فیروزکوه'), (305, 8, 'قدس'), (306, 8, 'قرچک'), (307, 8, 'کهریزک'), (308, 8, 'کیلان'), (309, 8, 'گلستان'), (310, 8, 'لواسان'), (311, 8, 'ملارد'), (312, 8, 'نسیم شهر'), (313, 8, 'نصیرشهر'), (314, 8, 'وحیدیه'), (315, 8, 'ورامین'), (316, 9, 'باباحیدر'), (317, 9, 'بازفت'), (318, 9, 'بروجن'), (319, 9, 'پردنجان'), (320, 9, 'دستنا'), (321, 9, 'سامان'), (322, 9, 'سرخون'), (323, 9, 'سودجان'), (324, 9, 'سورشجان'), (325, 9, 'شهرکرد'), (326, 9, 'صمصامی'), (327, 9, 'طاقانک'), (328, 9, 'فرخ شهر'), (329, 9, 'کاج'), (330, 9, 'گوجان'), (331, 9, 'گهرو'), (332, 9, 'لردگان'), (333, 9, 'منج'), (334, 9, 'نقنه'), (335, 9, 'وردنجان'), (336, 9, 'هفشجان'), (337, 10, 'آرین شهر'), (338, 10, 'آیسک'), (339, 10, 'ارسک'), (340, 10, 'اسدیه'), (341, 10, 'اسفدن'), (342, 10, 'اسلامیه'), (343, 10, 'بشرویه'), (344, 10, 'بیرجند'), (345, 10, 'حاجی آباد'), (346, 10, 'خضری دشت بیاض'), (347, 10, 'خوسف'), (348, 10, 'دیهوک'), (349, 10, 'زهان'), (350, 10, 'سرایان'), (351, 10, 'سربیشه'), (352, 10, 'سه قلعه'), (353, 10, 'شوسف'), (354, 10, 'طبس'), (355, 10, 'طبس مسینا'), (356, 10, 'عشق آباد'), (357, 10, 'فردوس'), (358, 10, 'قاین'), (359, 10, 'قهستان'), (360, 10, 'گزیک'), (361, 10, 'محمدشهر'), (362, 10, 'مود'), (363, 10, 'نهبندان'), (364, 10, 'نیمبلوک'), (365, 11, 'احمدابادصولت'), (366, 11, 'انابد'), (367, 11, 'باجگیران'), (368, 11, 'باخرز'), (369, 11, 'بار'), (370, 11, 'بایک'), (371, 11, 'بجستان'), (372, 11, 'بردسکن'), (373, 11, 'بیدخت'), (374, 11, 'تایباد'), (375, 11, 'تربت جام'), (376, 11, 'تربت حیدریه'), (377, 11, 'جغتای'), (378, 11, 'جنگل'), (379, 11, 'چاپشلو'), (380, 11, 'چکنه'), (381, 11, 'چناران'), (382, 11, 'خرو'), (383, 11, 'خلیل آباد'), (384, 11, 'خواف'), (385, 11, 'داورزن'), (386, 11, 'درگز'), (387, 11, 'درود'), (388, 11, 'دولت آباد'), (389, 11, 'رباط سنگ'), (390, 11, 'رشتخوار'), (391, 11, 'رضویه'), (392, 11, 'روداب'), (393, 11, 'ریوش'), (394, 11, 'سبزوار'), (395, 11, 'سرخس'), (396, 11, 'سفیدسنگ'), (397, 11, 'سلامی'), (398, 11, 'سلطان آباد'), (399, 11, 'سنگان'), (400, 11, 'شادمهر'), (401, 11, 'شاندیز'), (402, 11, 'ششتمد'), (403, 11, 'شهراباد'), (404, 11, 'شهرزو'), (405, 11, 'صالح آباد'), (406, 11, 'طرقبه'), (407, 11, 'عشق آباد'), (408, 11, 'فرهادگرد'), (409, 11, 'فریمان'), (410, 11, 'فیروزه'), (411, 11, 'فیض آباد'), (412, 11, 'قاسم آباد'), (413, 11, 'قدمگاه'), (414, 11, 'قلندرآباد'), (415, 11, 'قوچان'), (416, 11, 'کاخک'), (417, 11, 'کاریز'), (418, 11, 'کاشمر'), (419, 11, 'کدکن'), (420, 11, 'کلات'), (421, 11, 'کندر'), (422, 11, 'گلمکان'), (423, 11, 'گناباد'), (424, 11, 'لطف آباد'), (425, 11, 'مزدآوند'), (426, 11, 'مشهد'), (427, 11, 'مشهدریزه'), (428, 11, 'ملک آباد'), (429, 11, 'نشتیفان'), (430, 11, 'نصرآباد'), (431, 11, 'نقاب'), (432, 11, 'نوخندان'), (433, 11, 'نیشابور'), (434, 11, 'نیل شهر'), (435, 11, 'همت آباد'), (436, 11, 'یونسی'), (437, 12, 'آشخانه'), (438, 12, 'آوا'), (439, 12, 'اسفراین'), (440, 12, 'ایور'), (441, 12, 'بجنورد'), (442, 12, 'پیش قلعه'), (443, 12, 'تیتکانلو'), (444, 12, 'جاجرم'), (445, 12, 'چناران شهر'), (446, 12, 'حصارگرمخان'), (447, 12, 'درق'), (448, 12, 'راز'), (449, 12, 'زیارت'), (450, 12, 'سنخواست'), (451, 12, 'شوقان'), (452, 12, 'شیروان'), (453, 12, 'صفی آباد'), (454, 12, 'فاروج'), (455, 12, 'قاضی'), (456, 12, 'قوشخانه'), (457, 12, 'گرمه'), (458, 12, 'لوجلی'), (459, 13, 'آبادان'), (460, 13, 'آبژدان'), (461, 13, 'آزادی'), (462, 13, 'آغاجاری'), (463, 13, 'ابوحمیظه'), (464, 13, 'اروندکنار'), (465, 13, 'الوان'), (466, 13, 'الهایی'), (467, 13, 'امیدیه'), (468, 13, 'اندیمشک'), (469, 13, 'اهواز'), (470, 13, 'ایذه'), (471, 13, 'باغ ملک'), (472, 13, 'بستان'), (473, 13, 'بندرامام خمینی'), (474, 13, 'بندرماهشهر'), (475, 13, 'بهبهان'), (476, 13, 'بیدروبه'), (477, 13, 'ترکالکی'), (478, 13, 'تشان'), (479, 13, 'جایزان'), (480, 13, 'جنت مکان'), (481, 13, 'چغامیش'), (482, 13, 'چم گلک'), (483, 13, 'چمران'), (484, 13, 'چویبده'), (485, 13, 'حر'), (486, 13, 'حسینیه'), (487, 13, 'حمزه'), (488, 13, 'حمیدیه'), (489, 13, 'خرمشهر'), (490, 13, 'خنافره'), (491, 13, 'دارخوین'), (492, 13, 'دزفول'), (493, 13, 'دهدز'), (494, 13, 'رامشیر'), (495, 13, 'رامهرمز'), (496, 13, 'رفیع'), (497, 13, 'زهره'), (498, 13, 'سالند'), (499, 13, 'سرداران'), (500, 13, 'سردشت'), (501, 13, 'سماله'), (502, 13, 'سوسنگرد'), (503, 13, 'سیاه منصور'), (504, 13, 'شادگان'), (505, 13, 'شاوور'), (506, 13, 'شرافت'), (507, 13, 'شمس آباد'), (508, 13, 'شوش'), (509, 13, 'شوشتر'), (510, 13, 'شهر امام'), (511, 13, 'شیبان'), (512, 13, 'صالح شهر'), (513, 13, 'صفی آباد'), (514, 13, 'صیدون'), (515, 13, 'فتح المبین'), (516, 13, 'قلعه تل'), (517, 13, 'قلعه خواجه'), (518, 13, 'کوت سیدنعیم'), (519, 13, 'کوت عبداله'), (520, 13, 'گتوند'), (521, 13, 'گلگیر'), (522, 13, 'گوریه'), (523, 13, 'لالی'), (524, 13, 'مسجدسلیمان'), (525, 13, 'مشراگه'), (526, 13, 'مقاومت'), (527, 13, 'ملاثانی'), (528, 13, 'منصوریه'), (529, 13, 'میانرود'), (530, 13, 'میداود'), (531, 13, 'مینوشهر'), (532, 13, 'ویس'), (533, 13, 'هفتگل'), (534, 13, 'هندیجان'), (535, 13, 'هویزه'), (536, 14, 'آب بر'), (537, 14, 'ابهر'), (538, 14, 'ارمغانخانه'), (539, 14, 'چورزق'), (540, 14, 'حلب'), (541, 14, 'خرمدره'), (542, 14, 'دندی'), (543, 14, 'زرین آباد'), (544, 14, 'زرین رود'), (545, 14, 'زنجان'), (546, 14, 'سجاس'), (547, 14, 'سلطانیه'), (548, 14, 'سهرورد'), (549, 14, 'صایین قلعه'), (550, 14, 'قیدار'), (551, 14, 'کرسف'), (552, 14, 'گرماب'), (553, 14, 'ماه نشان'), (554, 14, 'نوربهار'), (555, 14, 'نیک پی'), (556, 14, 'هیدج'), (557, 15, 'آرادان'), (558, 15, 'امیریه'), (559, 15, 'ایوانکی'), (560, 15, 'بسطام'), (561, 15, 'بیارجمند'), (562, 15, 'دامغان'), (563, 15, 'درجزین'), (564, 15, 'دیباج'), (565, 15, 'رودیان'), (566, 15, 'سرخه'), (567, 15, 'سمنان'), (568, 15, 'شاهرود'), (569, 15, 'شهمیرزاد'), (570, 15, 'کلاته'), (571, 15, 'کلاته خیج'), (572, 15, 'کهن آباد'), (573, 15, 'گرمسار'), (574, 15, 'مجن'), (575, 15, 'مهدی شهر'), (576, 15, 'میامی'), (577, 16, 'ادیمی'), (578, 16, 'اسپکه'), (579, 16, 'ایرانشهر'), (580, 16, 'بزمان'), (581, 16, 'بمپور'), (582, 16, 'بنت'), (583, 16, 'بنجار'), (584, 16, 'پیشین'), (585, 16, 'جالق'), (586, 16, 'چاه بهار'), (587, 16, 'خاش'), (588, 16, 'دوست محمد'), (589, 16, 'راسک'), (590, 16, 'زابل'), (591, 16, 'زابلی'), (592, 16, 'زاهدان'), (593, 16, 'زرآباد'), (594, 16, 'زهک'), (595, 16, 'سراوان'), (596, 16, 'سرباز'), (597, 16, 'سوران'), (598, 16, 'سیرکان'), (599, 16, 'شهرک علی اکبر'), (600, 16, 'فنوج'), (601, 16, 'قصرقند'), (602, 16, 'کنارک'), (603, 16, 'گشت'), (604, 16, 'گلمورتی'), (605, 16, 'محمدآباد'), (606, 16, 'محمدان'), (607, 16, 'محمدی'), (608, 16, 'میرجاوه'), (609, 16, 'نصرت آباد'), (610, 16, 'نگور'), (611, 16, 'نوک آباد'), (612, 16, 'نیک شهر'), (613, 16, 'هیدوچ'), (614, 17, 'آباده'), (615, 17, 'آباده طشک'), (616, 17, 'اردکان'), (617, 17, 'ارسنجان'), (618, 17, 'استهبان'), (619, 17, 'اسیر'), (620, 17, 'اشکنان'), (621, 17, 'افزر'), (622, 17, 'اقلید'), (623, 17, 'امام شهر'), (624, 17, 'اوز'), (625, 17, 'اهل'), (626, 17, 'ایج'), (627, 17, 'ایزدخواست'), (628, 17, 'باب انار'), (629, 17, 'بابامنیر'), (630, 17, 'بالاده'), (631, 17, 'بنارویه'), (632, 17, 'بوانات'), (633, 17, 'بهمن'), (634, 17, 'بیرم'), (635, 17, 'بیضا'), (636, 17, 'جنت شهر'), (637, 17, 'جویم'), (638, 17, 'جهرم'), (639, 17, 'حاجی آباد'), (640, 17, 'حسامی'), (641, 17, 'حسن اباد'), (642, 17, 'خانه زنیان'), (643, 17, 'خانیمن'), (644, 17, 'خاوران'), (645, 17, 'خرامه'), (646, 17, 'خشت'), (647, 17, 'خنج'), (648, 17, 'خور'), (649, 17, 'خوزی'), (650, 17, 'خومه زار'), (651, 17, 'داراب'), (652, 17, 'داریان'), (653, 17, 'دبیران'), (654, 17, 'دژکرد'), (655, 17, 'دوبرجی'), (656, 17, 'دوزه'), (657, 17, 'دهرم'), (658, 17, 'رامجرد'), (659, 17, 'رونیز'), (660, 17, 'زاهدشهر'), (661, 17, 'زرقان'), (662, 17, 'سده'), (663, 17, 'سروستان'), (664, 17, 'سعادت شهر'), (665, 17, 'سلطان شهر'), (666, 17, 'سورمق'), (667, 17, 'سیدان'), (668, 17, 'ششده'), (669, 17, 'شهرپیر'), (670, 17, 'شهرصدرا'), (671, 17, 'شیراز'), (672, 17, 'صغاد'), (673, 17, 'صفاشهر'), (674, 17, 'علامرودشت'), (675, 17, 'عمادده'), (676, 17, 'فدامی'), (677, 17, 'فراشبند'), (678, 17, 'فسا'), (679, 17, 'فیروزآباد'), (680, 17, 'قادراباد'), (681, 17, 'قایمیه'), (682, 17, 'قره بلاغ'), (683, 17, 'قطب آباد'), (684, 17, 'قطرویه'), (685, 17, 'قیر'), (686, 17, 'کارزین (فتح آباد)'), (687, 17, 'کازرون'), (688, 17, 'کامفیروز'), (689, 17, 'کره ای'), (690, 17, 'کنارتخته'), (691, 17, 'کوار'), (692, 17, 'کوپن'), (693, 17, 'کوهنجان'), (694, 17, 'گراش'), (695, 17, 'گله دار'), (696, 17, 'لار'), (697, 17, 'لامرد'), (698, 17, 'لپویی'), (699, 17, 'لطیفی'), (700, 17, 'مادرسلیمان'), (701, 17, 'مبارک آباددیز'), (702, 17, 'مرودشت'), (703, 17, 'مزایجان'), (704, 17, 'مشکان'), (705, 17, 'مصیری'), (706, 17, 'مهر'), (707, 17, 'میانشهر'), (708, 17, 'میمند'), (709, 17, 'نوبندگان'), (710, 17, 'نوجین'), (711, 17, 'نودان'), (712, 17, 'نورآباد'), (713, 17, 'نی ریز'), (714, 17, 'وراوی'), (715, 17, 'هماشهر'), (716, 18, 'آبگرم'), (717, 18, 'آبیک'), (718, 18, 'آوج'), (719, 18, 'ارداق'), (720, 18, 'اسفرورین'), (721, 18, 'اقبالیه'), (722, 18, 'الوند'), (723, 18, 'بویین زهرا'), (724, 18, 'بیدستان'), (725, 18, 'تاکستان'), (726, 18, 'خاکعلی'), (727, 18, 'خرمدشت'), (728, 18, 'دانسفهان'), (729, 18, 'رازمیان'), (730, 18, 'سگزآباد'), (731, 18, 'سیردان'), (732, 18, 'شال'), (733, 18, 'شریفیه'), (734, 18, 'ضیاڈآباد'), (735, 18, 'قزوین'), (736, 18, 'کوهین'), (737, 18, 'محمدیه'), (738, 18, 'محمودآبادنمونه'), (739, 18, 'معلم کلایه'), (740, 18, 'نرجه'), (741, 19, 'جعفریه'), (742, 19, 'دستجرد'), (743, 19, 'سلفچگان'), (744, 19, 'قم'), (745, 19, 'قنوات'), (746, 19, 'کهک'), (747, 20, 'آرمرده'), (748, 20, 'اورامان تخت'), (749, 20, 'بابارشانی'), (750, 20, 'بانه'), (751, 20, 'برده رشه'), (752, 20, 'بلبان آباد'), (753, 20, 'بویین سفلی'), (754, 20, 'بیجار'), (755, 20, 'پیرتاج'), (756, 20, 'توپ آغاج'), (757, 20, 'چناره'), (758, 20, 'دزج'), (759, 20, 'دلبران'), (760, 20, 'دهگلان'), (761, 20, 'دیواندره'), (762, 20, 'زرینه'), (763, 20, 'سروآباد'), (764, 20, 'سریش آباد'), (765, 20, 'سقز'), (766, 20, 'سنندج'), (767, 20, 'شویشه'), (768, 20, 'صاحب'), (769, 20, 'قروه'), (770, 20, 'کامیاران'), (771, 20, 'کانی دینار'), (772, 20, 'کانی سور'), (773, 20, 'مریوان'), (774, 20, 'موچش'), (775, 20, 'یاسوکند'), (776, 21, 'اختیارآباد'), (777, 21, 'ارزوییه'), (778, 21, 'امین شهر'), (779, 21, 'انار'), (780, 21, 'اندوهجرد'), (781, 21, 'باغین'), (782, 21, 'بافت'), (783, 21, 'بردسیر'), (784, 21, 'بروات'), (785, 21, 'بزنجان'), (786, 21, 'بلورد'), (787, 21, 'بلوک'), (788, 21, 'بم'), (789, 21, 'بهرمان'), (790, 21, 'پاریز'), (791, 21, 'جبالبارز'), (792, 21, 'جوپار'), (793, 21, 'جوزم'), (794, 21, 'جیرفت'), (795, 21, 'چترود'), (796, 21, 'خاتون اباد'), (797, 21, 'خانوک'), (798, 21, 'خواجو شهر'), (799, 21, 'خورسند'), (800, 21, 'درب بهشت'), (801, 21, 'دشتکار'), (802, 21, 'دوساری'), (803, 21, 'دهج'), (804, 21, 'رابر'), (805, 21, 'راور'), (806, 21, 'راین'), (807, 21, 'رفسنجان'), (808, 21, 'رودبار'), (809, 21, 'ریحان'), (810, 21, 'زرند'), (811, 21, 'زنگی آباد'), (812, 21, 'زهکلوت'), (813, 21, 'زیدآباد'), (814, 21, 'سیرجان'), (815, 21, 'شهداد'), (816, 21, 'شهربابک'), (817, 21, 'صفاییه'), (818, 21, 'عنبرآباد'), (819, 21, 'فاریاب'), (820, 21, 'فهرج'), (821, 21, 'قلعه گنج'), (822, 21, 'کاظم آباد'), (823, 21, 'کرمان'), (824, 21, 'کشکوییه'), (825, 21, 'کوهبنان'), (826, 21, 'کهنوج'), (827, 21, 'کیانشهر'), (828, 21, 'گلباف'), (829, 21, 'گلزار'), (830, 21, 'گنبکی'), (831, 21, 'لاله زار'), (832, 21, 'ماهان'), (833, 21, 'محمدآباد'), (834, 21, 'محی آباد'), (835, 21, 'مردهک'), (836, 21, 'مس سرچشمه'), (837, 21, 'منوجان'), (838, 21, 'نجف شهر'), (839, 21, 'نرماشیر'), (840, 21, 'نظام شهر'), (841, 21, 'نگار'), (842, 21, 'نودژ'), (843, 21, 'هجدک'), (844, 21, 'هماشهر'), (845, 21, 'هنزا'), (846, 21, 'یزدان شهر'), (847, 22, 'ازگله'), (848, 22, 'اسلام آبادغرب'), (849, 22, 'بانوره'), (850, 22, 'باینگان'), (851, 22, 'بیستون'), (852, 22, 'پاوه'), (853, 22, 'تازه آباد'), (854, 22, 'جوانرود'), (855, 22, 'حمیل'), (856, 22, 'رباط'), (857, 22, 'روانسر'), (858, 22, 'ریجاب'), (859, 22, 'سرپل ذهاب'), (860, 22, 'سرمست'), (861, 22, 'سطر'), (862, 22, 'سنقر'), (863, 22, 'سومار'), (864, 22, 'شاهو'), (865, 22, 'صحنه'), (866, 22, 'قصرشیرین'), (867, 22, 'کرمانشاه'), (868, 22, 'کرند'), (869, 22, 'کنگاور'), (870, 22, 'کوزران'), (871, 22, 'گودین'), (872, 22, 'گهواره'), (873, 22, 'گیلانغرب'), (874, 22, 'میان راهان'), (875, 22, 'نودشه'), (876, 22, 'نوسود'), (877, 22, 'هرسین'), (878, 22, 'هلشی'), (879, 23, 'باشت'), (880, 23, 'پاتاوه'), (881, 23, 'چرام'), (882, 23, 'چیتاب'), (883, 23, 'دوگنبدان'), (884, 23, 'دهدشت'), (885, 23, 'دیشموک'), (886, 23, 'سرفاریاب'), (887, 23, 'سوق'), (888, 23, 'سی سخت'), (889, 23, 'قلعه رییسی'), (890, 23, 'گراب سفلی'), (891, 23, 'لنده'), (892, 23, 'لیکک'), (893, 23, 'مادوان'), (894, 23, 'مارگون'), (895, 23, 'یاسوج'), (896, 24, 'آزادشهر'), (897, 24, 'آق قلا'), (898, 24, 'انبارآلوم'), (899, 24, 'اینچه برون'), (900, 24, 'بندرترکمن'), (901, 24, 'بندرگز'), (902, 24, 'تاتارعلیا'), (903, 24, 'جلین'), (904, 24, 'خان ببین'), (905, 24, 'دلند'), (906, 24, 'رامیان'), (907, 24, 'سرخنکلاته'), (908, 24, 'سنگدوین'), (909, 24, 'سیمین شهر'), (910, 24, 'علی اباد'), (911, 24, 'فاضل آباد'), (912, 24, 'فراغی'), (913, 24, 'کردکوی'), (914, 24, 'کلاله'), (915, 24, 'گالیکش'), (916, 24, 'گرگان'), (917, 24, 'گمیش تپه'), (918, 24, 'گنبدکاووس'), (919, 24, 'مراوه'), (920, 24, 'مزرعه'), (921, 24, 'مینودشت'), (922, 24, 'نگین شهر'), (923, 24, 'نوده خاندوز'), (924, 24, 'نوکنده'), (925, 25, 'آستارا'), (926, 25, 'آستانه اشرفیه'), (927, 25, 'احمدسرگوراب'), (928, 25, 'اسالم'), (929, 25, 'اطاقور'), (930, 25, 'املش'), (931, 25, 'بازار جمعه'), (932, 25, 'بره سر'), (933, 25, 'بندرانزلی'), (934, 25, 'پره سر'), (935, 25, 'توتکابن'), (936, 25, 'جیرنده'), (937, 25, 'چابکسر'), (938, 25, 'چاف و چمخاله'), (939, 25, 'چوبر'), (940, 25, 'حویق'), (941, 25, 'خشکبیجار'), (942, 25, 'خمام'), (943, 25, 'دیلمان'), (944, 25, 'رانکوه'), (945, 25, 'رحیم آباد'), (946, 25, 'رستم آباد'), (947, 25, 'رشت'), (948, 25, 'رضوانشهر'), (949, 25, 'رودبار'), (950, 25, 'رودبنه'), (951, 25, 'رودسر'), (952, 25, 'سنگر'), (953, 25, 'سیاهکل'), (954, 25, 'شفت'), (955, 25, 'شلمان'), (956, 25, 'صومعه سرا'), (957, 25, 'فومن'), (958, 25, 'کلاچای'), (959, 25, 'کوچصفهان'), (960, 25, 'کومله'), (961, 25, 'کیاشهر'), (962, 25, 'گوراب زرمیخ'), (963, 25, 'لاهیجان'), (964, 25, 'لشت نشاء'), (965, 25, 'لنگرود'), (966, 25, 'لوشان'), (967, 25, 'لولمان'), (968, 25, 'لوندویل'), (969, 25, 'لیسار'), (970, 25, 'ماسال'), (971, 25, 'ماسوله'), (972, 25, 'ماکلوان'), (973, 25, 'مرجقل'), (974, 25, 'منجیل'), (975, 25, 'واجارگاه'), (976, 25, 'هشتپر (تالش)'), (977, 26, 'ازنا'), (978, 26, 'اشترینان'), (979, 26, 'الشتر'), (980, 26, 'الیگودرز'), (981, 26, 'بروجرد'), (982, 26, 'بیران شهر'), (983, 26, 'پلدختر'), (984, 26, 'چالانچولان'), (985, 26, 'چقابل'), (986, 26, 'خرم آباد'), (987, 26, 'درب گنبد'), (988, 26, 'دورود'), (989, 26, 'زاغه'), (990, 26, 'سپیددشت'), (991, 26, 'سراب دوره'), (992, 26, 'شول آباد'), (993, 26, 'فیروزآباد'), (994, 26, 'کوهدشت'), (995, 26, 'کوهنانی'), (996, 26, 'گراب'), (997, 26, 'معمولان'), (998, 26, 'مومن آباد'), (999, 26, 'نورآباد'), (1000, 26, 'ویسیان'), (1001, 26, 'هفت چشمه'), (1002, 27, 'آلاشت'), (1003, 27, 'آمل'), (1004, 27, 'ارطه'), (1005, 27, 'امامزاده عبدالله'), (1006, 27, 'امیرکلا'), (1007, 27, 'ایزدشهر'), (1008, 27, 'بابل'), (1009, 27, 'بابلسر'), (1010, 27, 'بلده'), (1011, 27, 'بهشهر'), (1012, 27, 'بهنمیر'), (1013, 27, 'پایین هولار'), (1014, 27, 'پل سفید'), (1015, 27, 'پول'), (1016, 27, 'تنکابن'), (1017, 27, 'جویبار'), (1018, 27, 'چالوس'), (1019, 27, 'چمستان'), (1020, 27, 'خرم آباد'), (1021, 27, 'خلیل شهر'), (1022, 27, 'خوش رودپی'), (1023, 27, 'دابودشت'), (1024, 27, 'رامسر'), (1025, 27, 'رستمکلا'), (1026, 27, 'رویان'), (1027, 27, 'رینه'), (1028, 27, 'زرگرمحله'), (1029, 27, 'زیرآب'), (1030, 27, 'ساری'), (1031, 27, 'سرخرود'), (1032, 27, 'سلمان شهر'), (1033, 27, 'سورک'), (1034, 27, 'شیرگاه'), (1035, 27, 'شیرود'), (1036, 27, 'عباس اباد'), (1037, 27, 'فریدونکنار'), (1038, 27, 'فریم'), (1039, 27, 'قایم شهر'), (1040, 27, 'کتالم وسادات شهر'), (1041, 27, 'کجور'), (1042, 27, 'کلارآباد'), (1043, 27, 'کلاردشت'), (1044, 27, 'کوهی خیل'), (1045, 27, 'کیاسر'), (1046, 27, 'کیاکلا'), (1047, 27, 'گتاب'), (1048, 27, 'گزنک'), (1049, 27, 'گلوگاه'), (1050, 27, 'محمودآباد'), (1051, 27, 'مرزن آباد'), (1052, 27, 'مرزیکلا'), (1053, 27, 'نشتارود'), (1054, 27, 'نکا'), (1055, 27, 'نور'), (1056, 27, 'نوشهر'), (1057, 27, 'هادی شهر'), (1058, 27, 'هچیرود'), (1059, 28, 'آستانه'), (1060, 28, 'آشتیان'), (1061, 28, 'آوه'), (1062, 28, 'اراک'), (1063, 28, 'پرندک'), (1064, 28, 'تفرش'), (1065, 28, 'توره'), (1066, 28, 'جاورسیان'), (1067, 28, 'خشکرود'), (1068, 28, 'خمین'), (1069, 28, 'خنجین'), (1070, 28, 'خنداب'), (1071, 28, 'داودآباد'), (1072, 28, 'دلیجان'), (1073, 28, 'رازقان'), (1074, 28, 'زاویه'), (1075, 28, 'ساروق'), (1076, 28, 'ساوه'), (1077, 28, 'شازند'), (1078, 28, 'شهباز'), (1079, 28, 'غرق آباد'), (1080, 28, 'فرمهین'), (1081, 28, 'قورچی باشی'), (1082, 28, 'کارچان'), (1083, 28, 'کمیجان'), (1084, 28, 'مامونیه'), (1085, 28, 'محلات'), (1086, 28, 'مهاجران'), (1087, 28, 'میلاجرد'), (1088, 28, 'نراق'), (1089, 28, 'نوبران'), (1090, 28, 'نیمور'), (1091, 28, 'هندودر'), (1092, 29, 'ابوموسی'), (1093, 29, 'بستک'), (1094, 29, 'بندرجاسک'), (1095, 29, 'بندرعباس'), (1096, 29, 'بندرلنگه'), (1097, 29, 'بیکاء'), (1098, 29, 'پارسیان'), (1099, 29, 'تازیان پایین'), (1100, 29, 'تخت'), (1101, 29, 'تیرور'), (1102, 29, 'جناح'), (1103, 29, 'چارک'), (1104, 29, 'حاجی اباد'), (1105, 29, 'خمیر'), (1106, 29, 'درگهان'), (1107, 29, 'دشتی'), (1108, 29, 'دهبارز'), (1109, 29, 'رویدر'), (1110, 29, 'زیارتعلی'), (1111, 29, 'سردشت'), (1112, 29, 'سرگز'), (1113, 29, 'سندرک'), (1114, 29, 'سوزا'), (1115, 29, 'سیریک'), (1116, 29, 'فارغان'), (1117, 29, 'فین'), (1118, 29, 'قشم'), (1119, 29, 'قلعه قاضی'), (1120, 29, 'کنگ'), (1121, 29, 'کوشکنار'), (1122, 29, 'کوهستک'), (1123, 29, 'کیش'), (1124, 29, 'گروک'), (1125, 29, 'گوهران'), (1126, 29, 'لمزان'), (1127, 29, 'میناب'), (1128, 29, 'هرمز'), (1129, 29, 'هشتبندی'), (1130, 30, 'آجین'), (1131, 30, 'ازندریان'), (1132, 30, 'اسدآباد'), (1133, 30, 'برزول'), (1134, 30, 'بهار'), (1135, 30, 'تویسرکان'), (1136, 30, 'جورقان'), (1137, 30, 'جوکار'), (1138, 30, 'دمق'), (1139, 30, 'رزن'), (1140, 30, 'زنگنه'), (1141, 30, 'سامن'), (1142, 30, 'سرکان'), (1143, 30, 'شیرین سو'), (1144, 30, 'صالح آباد'), (1145, 30, 'فامنین'), (1146, 30, 'فرسفج'), (1147, 30, 'فیروزان'), (1148, 30, 'قروه درجزین'), (1149, 30, 'قهاوند'), (1150, 30, 'کبودرآهنگ'), (1151, 30, 'گل تپه'), (1152, 30, 'گیان'), (1153, 30, 'لالجین'), (1154, 30, 'مریانج'), (1155, 30, 'ملایر'), (1156, 30, 'مهاجران'), (1157, 30, 'نهاوند'), (1158, 30, 'همدان'), (1159, 31, 'ابرکوه'), (1160, 31, 'احمدآباد'), (1161, 31, 'اردکان'), (1162, 31, 'اشکذر'), (1163, 31, 'بافق'), (1164, 31, 'بفروییه'), (1165, 31, 'بهاباد'), (1166, 31, 'تفت'), (1167, 31, 'حمیدیا'), (1168, 31, 'خضرآباد'), (1169, 31, 'زارچ'), (1170, 31, 'شاهدیه'), (1171, 31, 'عقدا'), (1172, 31, 'مروست'), (1173, 31, 'مهردشت'), (1174, 31, 'مهریز'), (1175, 31, 'میبد'), (1176, 31, 'ندوشن'), (1177, 31, 'نیر'), (1178, 31, 'هرات'), (1179, 31, 'یزد');
COMMIT;

-- ----------------------------
-- Table structure for geo_provinces
-- ----------------------------
DROP TABLE IF EXISTS `geo_provinces`;
CREATE TABLE `geo_provinces`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of geo_provinces
-- ----------------------------
BEGIN;
INSERT INTO `geo_provinces` VALUES (1, 'آذربایجان شرقی'), (2, 'آذربایجان غربی'), (3, 'اردبیل'), (4, 'اصفهان'), (5, 'البرز'), (6, 'ایلام'), (7, 'بوشهر'), (8, 'تهران'), (9, 'چهار محال و بختیاری'), (10, 'خراسان جنوبی'), (11, 'خراسان رضوی'), (12, 'خراسان شمالی'), (13, 'خوزستان'), (14, 'زنجان'), (15, 'سمنان'), (16, 'سیستان و بلوچستان'), (17, 'فارس'), (18, 'قزوین'), (19, 'قم'), (20, 'کردستان'), (21, 'کرمان'), (22, 'کرمانشاه'), (23, 'کهکیلویه و بویراحمد'), (24, 'گلستان'), (25, 'گیلان'), (26, 'لرستان'), (27, 'مازندران'), (28, 'مرکزی'), (29, 'هرمزگان'), (30, 'همدان'), (31, 'یزد');
COMMIT;

-- ----------------------------
-- Table structure for list_calendar_type
-- ----------------------------
DROP TABLE IF EXISTS `list_calendar_type`;
CREATE TABLE `list_calendar_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_calendar_type
-- ----------------------------
BEGIN;
INSERT INTO `list_calendar_type` VALUES (1, 'شمسی'), (2, 'میلادی'), (3, 'قمری');
COMMIT;

-- ----------------------------
-- Table structure for list_date_format_types
-- ----------------------------
DROP TABLE IF EXISTS `list_date_format_types`;
CREATE TABLE `list_date_format_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_date_format_types
-- ----------------------------
BEGIN;
INSERT INTO `list_date_format_types` VALUES (1, 'YYYY.MM.DD'), (2, 'DD.MM.YYYY');
COMMIT;

-- ----------------------------
-- Table structure for list_daylight_state
-- ----------------------------
DROP TABLE IF EXISTS `list_daylight_state`;
CREATE TABLE `list_daylight_state`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_daylight_state
-- ----------------------------
BEGIN;
INSERT INTO `list_daylight_state` VALUES (1, 'خاموش'), (2, 'روشن'), (3, 'سفارشی');
COMMIT;

-- ----------------------------
-- Table structure for list_degree
-- ----------------------------
DROP TABLE IF EXISTS `list_degree`;
CREATE TABLE `list_degree`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_degree
-- ----------------------------
BEGIN;
INSERT INTO `list_degree` VALUES (1, 'زیر دیپلم'), (2, 'دیپلم'), (3, 'فوق دیپلم'), (4, 'کارشناسی'), (5, 'کارشناسی ارشد'), (6, 'دکترا');
COMMIT;

-- ----------------------------
-- Table structure for list_genders
-- ----------------------------
DROP TABLE IF EXISTS `list_genders`;
CREATE TABLE `list_genders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_genders
-- ----------------------------
BEGIN;
INSERT INTO `list_genders` VALUES (1, 'مذکر'), (2, 'مونث');
COMMIT;

-- ----------------------------
-- Table structure for list_language_types
-- ----------------------------
DROP TABLE IF EXISTS `list_language_types`;
CREATE TABLE `list_language_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for list_languages
-- ----------------------------
DROP TABLE IF EXISTS `list_languages`;
CREATE TABLE `list_languages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_languages
-- ----------------------------
BEGIN;
INSERT INTO `list_languages` VALUES (1, 'English'), (2, 'Arabic'), (3, 'French'), (4, 'Persian'), (5, 'German'), (6, 'Spanish'), (7, 'Italian'), (8, 'Chinese'), (9, 'Kurdish'), (10, 'Swedish');
COMMIT;

-- ----------------------------
-- Table structure for list_month
-- ----------------------------
DROP TABLE IF EXISTS `list_month`;
CREATE TABLE `list_month`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_month
-- ----------------------------
BEGIN;
INSERT INTO `list_month` VALUES (1, 'فروردین'), (2, 'اردیبهشت'), (3, 'خرداد'), (4, 'تیر'), (5, 'مرداد'), (6, 'شهریور'), (7, 'مهر'), (8, 'آبان'), (9, 'آذر'), (10, 'دی'), (11, 'بهمن'), (12, 'اسفند');
COMMIT;

-- ----------------------------
-- Table structure for list_month_day
-- ----------------------------
DROP TABLE IF EXISTS `list_month_day`;
CREATE TABLE `list_month_day`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_month_day
-- ----------------------------
BEGIN;
INSERT INTO `list_month_day` VALUES (1, '1'), (2, '2'), (3, '3'), (4, '4'), (5, '5'), (6, '6'), (7, '7'), (8, '8'), (9, '9'), (10, '10'), (11, '11'), (12, '12'), (13, '13'), (14, '14'), (15, '15'), (16, '16'), (17, '17'), (18, '18'), (19, '19'), (20, '20'), (21, '21'), (22, '22'), (23, '23'), (24, '24'), (25, '25'), (26, '26'), (27, '27'), (28, '28'), (29, '29'), (30, '30'), (31, '31');
COMMIT;

-- ----------------------------
-- Table structure for list_number_formats
-- ----------------------------
DROP TABLE IF EXISTS `list_number_formats`;
CREATE TABLE `list_number_formats`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_number_formats
-- ----------------------------
BEGIN;
INSERT INTO `list_number_formats` VALUES (1, 'فارسی'), (2, 'انگلیسی'), (3, 'عربی');
COMMIT;

-- ----------------------------
-- Table structure for list_replace_letters
-- ----------------------------
DROP TABLE IF EXISTS `list_replace_letters`;
CREATE TABLE `list_replace_letters`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_replace_letters
-- ----------------------------
BEGIN;
INSERT INTO `list_replace_letters` VALUES (1, 'عربی به فارسی'), (2, 'فارسی به عربی');
COMMIT;

-- ----------------------------
-- Table structure for list_security_types
-- ----------------------------
DROP TABLE IF EXISTS `list_security_types`;
CREATE TABLE `list_security_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_security_types
-- ----------------------------
BEGIN;
INSERT INTO `list_security_types` VALUES (1, 'Unsecure'), (2, 'TLS - Valid certificate'), (3, 'TLS - Invalid certificate');
COMMIT;

-- ----------------------------
-- Table structure for list_timezone
-- ----------------------------
DROP TABLE IF EXISTS `list_timezone`;
CREATE TABLE `list_timezone`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_timezone
-- ----------------------------
BEGIN;
INSERT INTO `list_timezone` VALUES (1, '(UTC-12:00)International Date Line West'), (2, '(UTC-11:00)Coordinate Universal Time-11'), (3, '(UTC-10:00)Hawaii'), (4, '(UTC-09:00)Alaska'), (5, '(UTC-08:00)Baja California'), (6, '(UTC-08:00)Pacific Time(US &amp; Canada)'), (7, '(UTC-07:00)Arizona'), (8, '(UTC-07:00)Chihuahua,La Paz,Mazatlan'), (9, '(UTC-07:00)Mountain Time(US &amp; Canada)'), (10, '(UTC-06:00)Central America'), (11, '(UTC-06:00)Central Time(US &amp; Canada)'), (12, '(UTC-06:00)Guadalajara,Mexicocity,Monterrey'), (13, '(UTC-06:00)Saskatchewan'), (14, '(UTC-05:00)Bogota,Lima,Quito'), (15, '(UTC-05:00)Eastern Time(US &amp; Canada)'), (16, '(UTC-05:00)Indian (East)'), (17, '(UTC-04:30)Caracas'), (18, '(UTC-04:00)Asuncion'), (19, '(UTC-04:00)Atlantic Time(Canada)'), (20, '(UTC-04:00)Cuiaba'), (21, '(UTC-04:00)Georgetown,La Paz,Manaus,San Juan'), (22, '(UTC-04:00)Santiago'), (23, '(UTC-03:30)Newfoundland'), (24, '(UTC-03:00)Brasilia'), (25, '(UTC-03:00)Buenos Aires'), (26, '(UTC-03:00)Cayenne,Fortaleza'), (27, '(UTC-03:00)Greenland'), (28, '(UTC-03:00)Montevideo'), (29, '(UTC-03:00)Salvador'), (30, '(UTC-02:00)Coordinate Universal Time-02'), (31, '(UTC-02:00)Mid-Atlantic'), (32, '(UTC-01:00)Azores'), (33, '(UTC-01:00)Cape Verde Is.'), (34, '(UTC)Casablance'), (35, '(UTC)Coordinate Universal Time'), (36, '(UTC)Dublin,Edinburgh,Lisbon,London'), (37, '(UTC)Monrovia,Reykjavik'), (38, '(UTC +01:00)Amsterdam,Berlin,Bern,Rome,Stockhol,Vienna'), (39, '(UTC +01:00)Belgarde,Bratislava,Budapest,Ljubljana,Prague'), (40, '(UTC +01:00)Brussels,Copenhagen,Madrid,Paris'), (41, '(UTC +01:00)Sarajevo,Skopje,Warsaw,Zagreb'), (42, '(UTC +01:00)West Central Africa'), (43, '(UTC +01:00)Windhoek'), (44, '(UTC +02:00)Amman'), (45, '(UTC +02:00)Athens,Bucharest'), (46, '(UTC +02:00)Beirut'), (47, '(UTC +02:00)Cairo'), (48, '(UTC +02:00)Damascus'), (49, '(UTC +02:00)Harare,Pretoria'), (50, '(UTC +02:00)Helsinki,Kyiv,Riga,Sofia,Tallinn,Viliius'), (51, '(UTC +02:00)Istanbul'), (52, '(UTC +02:00)Jerusalem'), (53, '(UTC +02:00)Nicosia'), (54, '(UTC +03:00)Beghdad'), (55, '(UTC +03:00)Kaliningard,Minsk'), (56, '(UTC +03:00)Kuwait,Riyadh'), (57, '(UTC +03:00)Nairobi'), (58, '(UTC +03:30)Tehran'), (59, '(UTC +04:00)Abu Dhabi,Muscat'), (60, '(UTC +04:00)Baku'), (61, '(UTC +04:00)Moscow,St.Peterburg,Volgograd'), (62, '(UTC +04:00)Port Louis'), (63, '(UTC +04:00)Tbilisi'), (64, '(UTC +04:00)Yerevan'), (65, '(UTC +04:30)Kabul'), (66, '(UTC +05:00)Islamabad,Karachi'), (67, '(UTC +05:00)Tashkent'), (68, '(UTC +05:30)Chennai,Kolkata,Mumbai,New Delhi'), (69, '(UTC +05:30)Si Jayawardenepura'), (70, '(UTC +05:45)Kathmandu'), (71, '(UTC +06:00)Astana'), (72, '(UTC +06:00)Dhaka'), (73, '(UTC +06:00)Ekaterinburg'), (74, '(UTC +06:30)Yangon,(Rangoon)'), (75, '(UTC +07:00)Bangkok,Hanoi,Jakarta'), (76, '(UTC +07:00)Novosibirsk'), (77, '(UTC +08:00)Beijing,Chongqing,Hong kong,Urumqi'), (78, '(UTC +08:00)Krasnoyarsk'), (79, '(UTC +08:00)Kuala Lumper,Singapore'), (80, '(UTC +08:00)Perth'), (81, '(UTC +08:00)Taipei'), (82, '(UTC +08:00)Ulaanbaatar'), (83, '(UTC +09:00)Irkutsk'), (84, '(UTC +09:00)Osaka,Sapporo,Tokyo'), (85, '(UTC +09:00)Seoul'), (86, '(UTC +09:30)Adelaide'), (87, '(UTC +09:30)Drawin'), (88, '(UTC +10:00)Brisbane'), (89, '(UTC +10:00)Canberra,Melborne,Sydney'), (90, '(UTC +10:00)Guam,Port Moresby'), (91, '(UTC +10:00)Hobart'), (92, '(UTC +10:00)Yakutsk'), (93, '(UTC +11:00)Solomon Is,New Caledonia'), (94, '(UTC +11:00)Vladivostok'), (95, '(UTC +12:00)Auckland,Wellington'), (96, '(UTC +12:00)Coordinated Universal Time+12'), (97, '(UTC +12:00)Fiji'), (98, '(UTC +12:00)Magadan'), (99, '(UTC +13:00)Nuku\'alofa'), (100, '(UTC +13:00)Samoa');
COMMIT;

-- ----------------------------
-- Table structure for list_week_days
-- ----------------------------
DROP TABLE IF EXISTS `list_week_days`;
CREATE TABLE `list_week_days`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of list_week_days
-- ----------------------------
BEGIN;
INSERT INTO `list_week_days` VALUES (1, 'شنبه'), (2, 'یک شنبه'), (3, 'دو شنبه'), (4, 'سه شنبه'), (5, 'چهار شنبه'), (6, 'پنج شنبه'), (7, 'جمعه');
COMMIT;

-- ----------------------------
-- Table structure for mails
-- ----------------------------
DROP TABLE IF EXISTS `mails`;
CREATE TABLE `mails`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `secretariat_id` int(11) NOT NULL,
  `pattern_id` int(11) NOT NULL,
  `receiver_type_id` int(11) NULL DEFAULT NULL,
  `receiver1_id` int(11) NULL DEFAULT NULL,
  `receiver2_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `section_1` int(11) NULL DEFAULT NULL,
  `section_2` int(11) NULL DEFAULT NULL,
  `section_3` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `receiver_type_id`(`receiver_type_id`) USING BTREE,
  INDEX `receiver1_id`(`receiver1_id`) USING BTREE,
  INDEX `pattern_id`(`pattern_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  INDEX `secretariat_id`(`secretariat_id`) USING BTREE,
  CONSTRAINT `mails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `mails_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_ibfk_3` FOREIGN KEY (`secretariat_id`) REFERENCES `secretariats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_ibfk_4` FOREIGN KEY (`pattern_id`) REFERENCES `secretariats_patterns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_ibfk_5` FOREIGN KEY (`receiver_type_id`) REFERENCES `mails_list_receiver_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_ibfk_6` FOREIGN KEY (`receiver1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_ibfk_7` FOREIGN KEY (`status_id`) REFERENCES `mails_list_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails
-- ----------------------------
BEGIN;
INSERT INTO `mails` VALUES (1, 1, 2, 3, 1, 1, 1, NULL, 2, '<p>aaa</p>\r\n', NULL, NULL, NULL), (2, 1, 1, 3, 2, 1, 1, NULL, 1, '<p>شسیشسیش</p>\r\n\r\n<p>سی</p>\r\n\r\n<p>سیششسشسسیشسیس شسیشسی شیشسی شسی</p>\r\n\r\n<p>شسیشسی</p>\r\n', NULL, NULL, NULL), (3, 1, 1, 3, 1, 1, 1, NULL, 1, '<p>123</p>\r\n', NULL, NULL, NULL), (4, 1, 2, 1, 1, 1, 1, NULL, 2, '<p>123</p>\r\n', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for mails_attachments
-- ----------------------------
DROP TABLE IF EXISTS `mails_attachments`;
CREATE TABLE `mails_attachments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime(0) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mail_id`(`mail_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `mails_attachments_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_attachments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for mails_copies
-- ----------------------------
DROP TABLE IF EXISTS `mails_copies`;
CREATE TABLE `mails_copies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mail_id`(`mail_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `mails_copies_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_copies_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `mails_copies_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_copies_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_copies
-- ----------------------------
BEGIN;
INSERT INTO `mails_copies` VALUES (1, 2, 1, 1), (2, 2, 2, 1), (3, 1, 1, 1), (4, 1, 2, 1), (5, 3, 1, 1), (7, 3, 2, 1), (9, 4, 1, 1), (10, 4, 2, 1);
COMMIT;

-- ----------------------------
-- Table structure for mails_copies_list_types
-- ----------------------------
DROP TABLE IF EXISTS `mails_copies_list_types`;
CREATE TABLE `mails_copies_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_copies_list_types
-- ----------------------------
BEGIN;
INSERT INTO `mails_copies_list_types` VALUES (1, 'رونوشت'), (2, 'رونوشت مخفی');
COMMIT;

-- ----------------------------
-- Table structure for mails_list_receiver_types
-- ----------------------------
DROP TABLE IF EXISTS `mails_list_receiver_types`;
CREATE TABLE `mails_list_receiver_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_list_receiver_types
-- ----------------------------
BEGIN;
INSERT INTO `mails_list_receiver_types` VALUES (1, 'درون سازمانی'), (2, 'برون سازمانی');
COMMIT;

-- ----------------------------
-- Table structure for mails_list_statuses
-- ----------------------------
DROP TABLE IF EXISTS `mails_list_statuses`;
CREATE TABLE `mails_list_statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_list_statuses
-- ----------------------------
BEGIN;
INSERT INTO `mails_list_statuses` VALUES (1, 'در دست اقدام'), (2, 'ارسال شده');
COMMIT;

-- ----------------------------
-- Table structure for mails_list_types
-- ----------------------------
DROP TABLE IF EXISTS `mails_list_types`;
CREATE TABLE `mails_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_list_types
-- ----------------------------
BEGIN;
INSERT INTO `mails_list_types` VALUES (1, 'پیش نویس'), (2, 'نامه');
COMMIT;

-- ----------------------------
-- Table structure for mails_logs
-- ----------------------------
DROP TABLE IF EXISTS `mails_logs`;
CREATE TABLE `mails_logs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `datetime` datetime(0) NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `refrence_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mail_id`(`mail_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `refrence_id`(`refrence_id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  CONSTRAINT `mails_logs_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_logs_ibfk_3` FOREIGN KEY (`refrence_id`) REFERENCES `mails_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_logs_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `mails_list_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for mails_refrences
-- ----------------------------
DROP TABLE IF EXISTS `mails_refrences`;
CREATE TABLE `mails_refrences`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mail_id`(`mail_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `mails_refrences_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_refrences_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_refrences
-- ----------------------------
BEGIN;
INSERT INTO `mails_refrences` VALUES (1, 1, 1, '<p>شسی</p>\r\n'), (2, 1, 1, '<p>شسیسشی</p>\r\n'), (3, 4, 1, '<p>112</p>\r\n');
COMMIT;

-- ----------------------------
-- Table structure for mails_signatories
-- ----------------------------
DROP TABLE IF EXISTS `mails_signatories`;
CREATE TABLE `mails_signatories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mail_id`(`mail_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `mails_signatories_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_signatories_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_signatories
-- ----------------------------
BEGIN;
INSERT INTO `mails_signatories` VALUES (1, 2, 1), (3, 1, 1), (4, 3, 1), (6, 4, 1);
COMMIT;

-- ----------------------------
-- Table structure for mails_signatures
-- ----------------------------
DROP TABLE IF EXISTS `mails_signatures`;
CREATE TABLE `mails_signatures`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mail_id`(`mail_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `mails_signatures_ibfk_1` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mails_signatures_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of mails_signatures
-- ----------------------------
BEGIN;
INSERT INTO `mails_signatures` VALUES (1, 1, 1), (2, 1, 1), (3, 4, 1), (4, 4, 1), (5, 4, 1);
COMMIT;

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `datetime` datetime(0) NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `read` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `notifications_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
BEGIN;
INSERT INTO `notifications` VALUES (1, '1', '1', '2020-01-05 17:10:19', 'file', 1, 1, 1), (2, '1', '1', '2020-01-05 17:10:19', 'file', 2, NULL, 0), (3, 'تقویم', 'یاداور جلسه در تاریخ 1398/10/15 ساعت 17:37 لطفا تشریف بیاورید', '2020-01-05 17:37:05', 'calendar', 1, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for notifications_list_types
-- ----------------------------
DROP TABLE IF EXISTS `notifications_list_types`;
CREATE TABLE `notifications_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of notifications_list_types
-- ----------------------------
BEGIN;
INSERT INTO `notifications_list_types` VALUES (1, 'انفرادی'), (2, 'گروهی');
COMMIT;

-- ----------------------------
-- Table structure for organizations
-- ----------------------------
DROP TABLE IF EXISTS `organizations`;
CREATE TABLE `organizations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام',
  `manager_id` int(11) NULL DEFAULT NULL COMMENT 'مدیر',
  `register_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'شناسه',
  `register_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'شماره ثبت',
  `date_start` date NULL DEFAULT NULL COMMENT 'تاریخ ثبت',
  `activity_subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'موضوع فعالیت',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT 'انتخاب پرنت',
  `ws_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد کارگاه',
  `tfn` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'ش. پ. مالیاتی',
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد اقتصادی',
  `license` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'شماره مجوز',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'تلفن',
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'فکس',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'ایمیل',
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد پستی',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'لوگو',
  `province_id` int(11) NULL DEFAULT NULL COMMENT 'استان',
  `city_id` int(11) NULL DEFAULT NULL COMMENT 'شهر',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'آدرس',
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'جزئیات',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `province_id`(`province_id`) USING BTREE,
  INDEX `city_id`(`city_id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `manager_id`(`manager_id`) USING BTREE,
  CONSTRAINT `organizations_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `geo_provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `geo_cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_ibfk_4` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci COMMENT = 'شعبات - شعبه';

-- ----------------------------
-- Records of organizations
-- ----------------------------
BEGIN;
INSERT INTO `organizations` VALUES (1, 'فضل یدک زیبایی', NULL, '', '', NULL, '', NULL, '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '');
COMMIT;

-- ----------------------------
-- Table structure for organizations_calendars
-- ----------------------------
DROP TABLE IF EXISTS `organizations_calendars`;
CREATE TABLE `organizations_calendars`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `org_id`(`org_id`) USING BTREE,
  CONSTRAINT `organizations_calendars_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_calendars
-- ----------------------------
BEGIN;
INSERT INTO `organizations_calendars` VALUES (1, 1, 'sss');
COMMIT;

-- ----------------------------
-- Table structure for organizations_list_years
-- ----------------------------
DROP TABLE IF EXISTS `organizations_list_years`;
CREATE TABLE `organizations_list_years`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sanad` bit(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `accounting_list_years_ibfk_1`(`organization_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `organizations_list_years_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_list_years_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `organizations_list_years_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_list_years
-- ----------------------------
BEGIN;
INSERT INTO `organizations_list_years` VALUES (6, 1, 'سال مالی 1397', 1, '2018-03-21', '2019-03-20', b'1'), (7, 1, 'سال مالی 1398', 1, '2019-03-21', '2020-03-19', b'1');
COMMIT;

-- ----------------------------
-- Table structure for organizations_list_years_types
-- ----------------------------
DROP TABLE IF EXISTS `organizations_list_years_types`;
CREATE TABLE `organizations_list_years_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_list_years_types
-- ----------------------------
BEGIN;
INSERT INTO `organizations_list_years_types` VALUES (1, 'دائمی'), (2, 'ادواری');
COMMIT;

-- ----------------------------
-- Table structure for organizations_machines
-- ----------------------------
DROP TABLE IF EXISTS `organizations_machines`;
CREATE TABLE `organizations_machines`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `machine_id` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `port` int(11) NOT NULL,
  `calendar_type_id` int(11) NOT NULL,
  `timezone_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `daylight_id` int(11) NOT NULL,
  `form_month_id` int(11) NULL DEFAULT NULL,
  `form_day_id` int(11) NULL DEFAULT NULL,
  `to_month_id` int(11) NULL DEFAULT NULL,
  `to_day_id` int(11) NULL DEFAULT NULL,
  `enable_cal_login` bit(1) NOT NULL,
  `default_type_sync` bit(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `calendar_type_id`(`calendar_type_id`) USING BTREE,
  INDEX `timezone_id`(`timezone_id`) USING BTREE,
  INDEX `daylight_id`(`daylight_id`) USING BTREE,
  INDEX `form_month_id`(`form_month_id`) USING BTREE,
  INDEX `form_day_id`(`form_day_id`) USING BTREE,
  INDEX `to_month_id`(`to_month_id`) USING BTREE,
  INDEX `to_day_id`(`to_day_id`) USING BTREE,
  INDEX `model_id`(`model_id`) USING BTREE,
  INDEX `org_id`(`org_id`) USING BTREE,
  CONSTRAINT `organizations_machines_ibfk_1` FOREIGN KEY (`calendar_type_id`) REFERENCES `list_calendar_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_2` FOREIGN KEY (`timezone_id`) REFERENCES `list_timezone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_3` FOREIGN KEY (`daylight_id`) REFERENCES `list_daylight_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_4` FOREIGN KEY (`form_month_id`) REFERENCES `list_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_5` FOREIGN KEY (`form_day_id`) REFERENCES `list_month_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_6` FOREIGN KEY (`to_month_id`) REFERENCES `list_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_7` FOREIGN KEY (`to_day_id`) REFERENCES `list_month_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_8` FOREIGN KEY (`model_id`) REFERENCES `organizations_machines_list_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_machines_ibfk_9` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for organizations_machines_list_models
-- ----------------------------
DROP TABLE IF EXISTS `organizations_machines_list_models`;
CREATE TABLE `organizations_machines_list_models`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for organizations_machines_times
-- ----------------------------
DROP TABLE IF EXISTS `organizations_machines_times`;
CREATE TABLE `organizations_machines_times`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_id` int(11) NOT NULL,
  `time1` time(0) NOT NULL,
  `time2` time(0) NOT NULL,
  `time3` time(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `machine_id`(`machine_id`) USING BTREE,
  CONSTRAINT `organizations_machines_times_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `organizations_machines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for organizations_planning
-- ----------------------------
DROP TABLE IF EXISTS `organizations_planning`;
CREATE TABLE `organizations_planning`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent_id`(`parent_id`) USING BTREE,
  INDEX `created_by`(`created_by`) USING BTREE,
  INDEX `updated_by`(`updated_by`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  CONSTRAINT `organizations_planning_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `organizations_planning` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_planning_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_planning_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_planning_ibfk_4` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_planning
-- ----------------------------
BEGIN;
INSERT INTO `organizations_planning` VALUES (1, 1, 1, NULL, 'asd', '<p>asd</p>\r\n', '2019-12-22 23:01:59', 1, '2019-12-22 23:01:59', 1), (2, 1, 2, 1, 'aa', '<p>aa</p>\r\n', '2019-12-22 23:11:19', 1, '2019-12-22 23:11:19', 1), (3, 1, 3, 2, 'شسی', 'شسی', '2019-12-22 23:28:24', 1, '2019-12-22 23:28:24', 1), (4, 1, 1, NULL, 'ظظ', '<p>ظظ</p>\r\n', '2019-12-22 23:34:40', 1, '2019-12-22 23:34:40', 1), (5, 1, 2, 4, 'شش', '<p>شش</p>\r\n', '2019-12-22 23:36:45', 1, '2019-12-22 23:36:45', 1), (6, 1, 3, 5, 'asd', '<p>asd</p>\r\n', '2019-12-24 13:47:53', 1, '2019-12-24 13:47:53', 1);
COMMIT;

-- ----------------------------
-- Table structure for organizations_positions
-- ----------------------------
DROP TABLE IF EXISTS `organizations_positions`;
CREATE TABLE `organizations_positions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL COMMENT 'شعبه',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام',
  `persons` int(11) NULL DEFAULT NULL COMMENT 'تعداد پرسنل مورد نیاز',
  `hiring_enable` bit(1) NULL DEFAULT NULL COMMENT 'استخدام پذیر',
  `job_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد شغل',
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL COMMENT 'شرح وظایف اصلی',
  `form_id` int(11) NULL DEFAULT NULL COMMENT 'فرم',
  `extra_description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL COMMENT 'شرح وظایف فرعی',
  `degree_id` int(11) NULL DEFAULT NULL COMMENT 'حداقل مدرک',
  `experience` int(11) NULL DEFAULT NULL COMMENT 'سابقه کار (سال)',
  `gender_id` int(11) NULL DEFAULT NULL COMMENT 'جنسیت',
  `resume_deadline` date NULL DEFAULT NULL COMMENT 'مهلت ارسال رزومه',
  `skills` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL COMMENT 'سایر موارد',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  INDEX `form_id`(`form_id`) USING BTREE,
  INDEX `degree_id`(`degree_id`) USING BTREE,
  INDEX `gender_id`(`gender_id`) USING BTREE,
  CONSTRAINT `organizations_positions_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_positions_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `organizations_positions_list_forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_positions_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `list_degree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_positions_ibfk_4` FOREIGN KEY (`gender_id`) REFERENCES `list_genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_persian_ci COMMENT = 'مشاغل';

-- ----------------------------
-- Records of organizations_positions
-- ----------------------------
BEGIN;
INSERT INTO `organizations_positions` VALUES (7, 1, 'اپراتور تنظیم فرمان', NULL, b'0', '', '', NULL, '', NULL, NULL, NULL, NULL, ''), (8, 1, 'انبار دار آپشن', NULL, b'0', '', '', NULL, '', NULL, NULL, NULL, NULL, ''), (9, 1, 'انبار دار فروشگاه', NULL, b'0', '', '', NULL, '', NULL, NULL, NULL, NULL, '');
COMMIT;

-- ----------------------------
-- Table structure for organizations_positions_columns
-- ----------------------------
DROP TABLE IF EXISTS `organizations_positions_columns`;
CREATE TABLE `organizations_positions_columns`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL COMMENT 'شغل',
  `column_id` int(11) NOT NULL COMMENT 'اجزاء',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  INDEX `column_id`(`column_id`) USING BTREE,
  CONSTRAINT `organizations_positions_columns_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `organizations_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_positions_columns_ibfk_2` FOREIGN KEY (`column_id`) REFERENCES `organizations_positions_list_columns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci COMMENT = 'نمایش در پورتال';

-- ----------------------------
-- Table structure for organizations_positions_list_columns
-- ----------------------------
DROP TABLE IF EXISTS `organizations_positions_list_columns`;
CREATE TABLE `organizations_positions_list_columns`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_positions_list_columns
-- ----------------------------
BEGIN;
INSERT INTO `organizations_positions_list_columns` VALUES (1, 'نام'), (2, 'تعداد پرسنل مورد نیاز'), (3, 'شرح وظایف اصلی'), (4, 'شرح وظایف فرعی'), (5, 'حداقل مدرک'), (6, 'سابقه کار'), (7, 'جنسیت'), (8, 'مهلت ارسال رزومه'), (9, 'مهارت های مورد نیاز'), (10, 'سایر موارد');
COMMIT;

-- ----------------------------
-- Table structure for organizations_positions_list_forms
-- ----------------------------
DROP TABLE IF EXISTS `organizations_positions_list_forms`;
CREATE TABLE `organizations_positions_list_forms`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_positions_list_forms
-- ----------------------------
BEGIN;
INSERT INTO `organizations_positions_list_forms` VALUES (1, 'form 1'), (2, 'form 2'), (3, 'form 3');
COMMIT;

-- ----------------------------
-- Table structure for organizations_positions_list_skills
-- ----------------------------
DROP TABLE IF EXISTS `organizations_positions_list_skills`;
CREATE TABLE `organizations_positions_list_skills`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  CONSTRAINT `organizations_positions_list_skills_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_positions_list_skills
-- ----------------------------
BEGIN;
INSERT INTO `organizations_positions_list_skills` VALUES (7, 1, 'روابط عمومی بالا'), (8, 1, 'کارت پایان خدمت'), (9, 1, 'گواهینامه');
COMMIT;

-- ----------------------------
-- Table structure for organizations_positions_skills
-- ----------------------------
DROP TABLE IF EXISTS `organizations_positions_skills`;
CREATE TABLE `organizations_positions_skills`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL COMMENT 'شغل',
  `skill_id` int(11) NOT NULL COMMENT 'مهارت',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  INDEX `skill_id`(`skill_id`) USING BTREE,
  CONSTRAINT `organizations_positions_skills_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `organizations_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_positions_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `organizations_positions_list_skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci COMMENT = 'مهارت های مورد نیاز';

-- ----------------------------
-- Table structure for organizations_rules
-- ----------------------------
DROP TABLE IF EXISTS `organizations_rules`;
CREATE TABLE `organizations_rules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `org_id`(`org_id`) USING BTREE,
  CONSTRAINT `organizations_rules_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `organizations_rules_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_rules_ibfk_2` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_rules
-- ----------------------------
BEGIN;
INSERT INTO `organizations_rules` VALUES (1, 1, 'ssss', 1, '<p>sssss</p>\r\n');
COMMIT;

-- ----------------------------
-- Table structure for organizations_rules_list_types
-- ----------------------------
DROP TABLE IF EXISTS `organizations_rules_list_types`;
CREATE TABLE `organizations_rules_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_rules_list_types
-- ----------------------------
BEGIN;
INSERT INTO `organizations_rules_list_types` VALUES (1, 'ww'), (2, 'ss'), (3, 'vv');
COMMIT;

-- ----------------------------
-- Table structure for organizations_units
-- ----------------------------
DROP TABLE IF EXISTS `organizations_units`;
CREATE TABLE `organizations_units`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL COMMENT 'شعبه',
  `parent_id` int(11) NULL DEFAULT NULL COMMENT 'بخش',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام',
  `manager_id` int(11) NULL DEFAULT NULL COMMENT 'مدیر',
  `province_id` int(11) NULL DEFAULT NULL COMMENT 'استان',
  `city_id` int(11) NULL DEFAULT NULL COMMENT 'شهر',
  `work_place_status_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت محل خدمت',
  `ws_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد کارگاه',
  `tfn` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'ش.پ. مالیاتی',
  `insurance_acc_id` int(11) NULL DEFAULT NULL COMMENT 'شعبه بیمه',
  `tax_acc_id` int(11) NULL DEFAULT NULL COMMENT 'حوزه مالیات',
  `darsad1` int(11) NULL DEFAULT NULL COMMENT 'بیمه سهم کارفرما',
  `darsad2` int(11) NULL DEFAULT NULL COMMENT 'بیمه سهم کارفرما',
  `unit_description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL COMMENT 'توضیحات',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `manager_id`(`manager_id`) USING BTREE,
  INDEX `province_id`(`province_id`) USING BTREE,
  INDEX `city_id`(`city_id`) USING BTREE,
  INDEX `organizations_units_ibfk_8`(`parent_id`) USING BTREE,
  INDEX `organizations_units_ibfk_4`(`work_place_status_id`) USING BTREE,
  INDEX `organizations_units_ibfk_5`(`tax_acc_id`) USING BTREE,
  INDEX `organizations_units_ibfk_6`(`insurance_acc_id`) USING BTREE,
  INDEX `organizations_units_ibfk_7`(`organization_id`) USING BTREE,
  CONSTRAINT `organizations_units_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `geo_provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `geo_cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_ibfk_4` FOREIGN KEY (`work_place_status_id`) REFERENCES `organizations_units_list_work_place_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_ibfk_5` FOREIGN KEY (`tax_acc_id`) REFERENCES `organizations_units_list_tax_acc` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `organizations_units_ibfk_6` FOREIGN KEY (`insurance_acc_id`) REFERENCES `organizations_units_list_insurance_acc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_ibfk_7` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_ibfk_8` FOREIGN KEY (`parent_id`) REFERENCES `organizations_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_persian_ci COMMENT = 'چارت';

-- ----------------------------
-- Records of organizations_units
-- ----------------------------
BEGIN;
INSERT INTO `organizations_units` VALUES (10, 1, NULL, 'مدیریت', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (11, 1, 10, 'نائب رئیس', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (12, 1, 11, 'معاون مدیر عامل', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (13, 1, 12, 'مشترکین', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (14, 1, 12, 'خدمات پس از فروش', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (15, 1, 12, 'آپشن خودرو', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (16, 1, 12, 'مالی', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (17, 1, 12, 'فروشگاه قطعات یدکی', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (18, 1, 12, 'فروش خودرو', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (19, 1, 12, 'بیمه', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (20, 1, NULL, 'asd', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (21, 1, NULL, 'test', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, ''), (22, 1, 21, 'test2', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '');
COMMIT;

-- ----------------------------
-- Table structure for organizations_units_list_insurance_acc
-- ----------------------------
DROP TABLE IF EXISTS `organizations_units_list_insurance_acc`;
CREATE TABLE `organizations_units_list_insurance_acc`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for organizations_units_list_tax_acc
-- ----------------------------
DROP TABLE IF EXISTS `organizations_units_list_tax_acc`;
CREATE TABLE `organizations_units_list_tax_acc`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for organizations_units_list_work_place_status
-- ----------------------------
DROP TABLE IF EXISTS `organizations_units_list_work_place_status`;
CREATE TABLE `organizations_units_list_work_place_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_units_list_work_place_status
-- ----------------------------
BEGIN;
INSERT INTO `organizations_units_list_work_place_status` VALUES (1, 'عادی'), (2, 'مناطق کمتر توسعه یافته'), (3, 'مناطق آزاد تجاری');
COMMIT;

-- ----------------------------
-- Table structure for organizations_units_positions
-- ----------------------------
DROP TABLE IF EXISTS `organizations_units_positions`;
CREATE TABLE `organizations_units_positions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `unit_id`(`unit_id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  CONSTRAINT `organizations_units_positions_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `organizations_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organizations_units_positions_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `organizations_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of organizations_units_positions
-- ----------------------------
BEGIN;
INSERT INTO `organizations_units_positions` VALUES (1, 20, 7), (2, 20, 8), (3, 20, 9);
COMMIT;

-- ----------------------------
-- Table structure for secretariats
-- ----------------------------
DROP TABLE IF EXISTS `secretariats`;
CREATE TABLE `secretariats`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `section_1` int(11) NOT NULL,
  `section_2` int(11) NOT NULL,
  `splitter_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `splitter_2` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of secretariats
-- ----------------------------
BEGIN;
INSERT INTO `secretariats` VALUES (1, '1', 2, 3, '/', '/'), (2, '2', 1, 1, '/', '/'), (3, '3', 1, 1, '/', '/');
COMMIT;

-- ----------------------------
-- Table structure for secretariats_members
-- ----------------------------
DROP TABLE IF EXISTS `secretariats_members`;
CREATE TABLE `secretariats_members`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretariat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `secretariat_id`(`secretariat_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `secretariats_members_ibfk_1` FOREIGN KEY (`secretariat_id`) REFERENCES `secretariats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `secretariats_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of secretariats_members
-- ----------------------------
BEGIN;
INSERT INTO `secretariats_members` VALUES (1, 3, 1), (4, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for secretariats_patterns
-- ----------------------------
DROP TABLE IF EXISTS `secretariats_patterns`;
CREATE TABLE `secretariats_patterns`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretariat_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `size_id` int(11) NOT NULL,
  `sign_count` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `size_id`(`size_id`) USING BTREE,
  INDEX `secretariat_id`(`secretariat_id`) USING BTREE,
  CONSTRAINT `secretariats_patterns_ibfk_1` FOREIGN KEY (`secretariat_id`) REFERENCES `secretariats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `secretariats_patterns_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `secretariats_patterns_list_sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of secretariats_patterns
-- ----------------------------
BEGIN;
INSERT INTO `secretariats_patterns` VALUES (1, NULL, 'asd', 1, 1, '15780923005e0fc70cbdb5f1.12666423.jpg'), (2, NULL, 'تست الگو', 2, 1, '15780922025e0fc6aa0e0414.56216555.jpg');
COMMIT;

-- ----------------------------
-- Table structure for secretariats_patterns_list_sizes
-- ----------------------------
DROP TABLE IF EXISTS `secretariats_patterns_list_sizes`;
CREATE TABLE `secretariats_patterns_list_sizes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of secretariats_patterns_list_sizes
-- ----------------------------
BEGIN;
INSERT INTO `secretariats_patterns_list_sizes` VALUES (1, 'A4'), (2, 'A5');
COMMIT;

-- ----------------------------
-- Table structure for secretariats_signatories
-- ----------------------------
DROP TABLE IF EXISTS `secretariats_signatories`;
CREATE TABLE `secretariats_signatories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secretariat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `secretariat_id`(`secretariat_id`) USING BTREE,
  INDEX `secretariats_signatories_ibfk_2`(`user_id`) USING BTREE,
  CONSTRAINT `secretariats_signatories_ibfk_1` FOREIGN KEY (`secretariat_id`) REFERENCES `secretariats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `secretariats_signatories_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of secretariats_signatories
-- ----------------------------
BEGIN;
INSERT INTO `secretariats_signatories` VALUES (3, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `background` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `theme` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `enable_remember_me` bit(1) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `upload_max_size` int(11) NULL DEFAULT NULL,
  `comment_restrict_editable` int(11) NULL DEFAULT NULL,
  `event_remain` int(11) NULL DEFAULT NULL,
  `notify_remain` int(11) NULL DEFAULT NULL,
  `session_remain` int(11) NULL DEFAULT NULL,
  `journal_remain` int(11) NULL DEFAULT NULL,
  `report_remain` int(11) NULL DEFAULT NULL,
  `restart_after` int(11) NULL DEFAULT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `smtp_server` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `smtp_port` int(11) NULL DEFAULT NULL,
  `security_type_id` int(11) NULL DEFAULT NULL,
  `smtp_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `smtp_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `smtp_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `replace_letter_id` int(11) NULL DEFAULT NULL,
  `language_id` int(11) NULL DEFAULT NULL,
  `rtl` bit(1) NULL DEFAULT NULL,
  `language_type_id` int(11) NULL DEFAULT NULL,
  `number_format_id` int(11) NULL DEFAULT NULL,
  `calendar_type_id` int(11) NULL DEFAULT NULL,
  `date_format_type_id` int(11) NULL DEFAULT NULL,
  `time_zone_id` int(11) NULL DEFAULT NULL,
  `first_day_in_week_id` int(11) NULL DEFAULT NULL,
  `daylight_state_id` int(11) NULL DEFAULT NULL,
  `dl_from_month_id` int(11) NULL DEFAULT NULL,
  `dl_from_day_id` int(11) NULL DEFAULT NULL,
  `dl_to_month_id` int(11) NULL DEFAULT NULL,
  `dl_to_day_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `settings_ibfk_01`(`security_type_id`) USING BTREE,
  INDEX `settings_ibfk_02`(`replace_letter_id`) USING BTREE,
  INDEX `settings_ibfk_03`(`language_id`) USING BTREE,
  INDEX `settings_ibfk_04`(`language_type_id`) USING BTREE,
  INDEX `settings_ibfk_05`(`number_format_id`) USING BTREE,
  INDEX `settings_ibfk_06`(`calendar_type_id`) USING BTREE,
  INDEX `settings_ibfk_07`(`date_format_type_id`) USING BTREE,
  INDEX `settings_ibfk_08`(`time_zone_id`) USING BTREE,
  INDEX `settings_ibfk_09`(`first_day_in_week_id`) USING BTREE,
  INDEX `settings_ibfk_10`(`daylight_state_id`) USING BTREE,
  INDEX `settings_ibfk_11`(`dl_from_month_id`) USING BTREE,
  INDEX `settings_ibfk_12`(`dl_from_day_id`) USING BTREE,
  INDEX `settings_ibfk_13`(`dl_to_month_id`) USING BTREE,
  INDEX `settings_ibfk_14`(`dl_to_day_id`) USING BTREE,
  CONSTRAINT `settings_ibfk_01` FOREIGN KEY (`security_type_id`) REFERENCES `list_security_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_02` FOREIGN KEY (`replace_letter_id`) REFERENCES `list_replace_letters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_03` FOREIGN KEY (`language_id`) REFERENCES `list_languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_04` FOREIGN KEY (`language_type_id`) REFERENCES `list_language_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_05` FOREIGN KEY (`number_format_id`) REFERENCES `list_number_formats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_06` FOREIGN KEY (`calendar_type_id`) REFERENCES `list_calendar_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_07` FOREIGN KEY (`date_format_type_id`) REFERENCES `list_date_format_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_08` FOREIGN KEY (`time_zone_id`) REFERENCES `list_timezone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_09` FOREIGN KEY (`first_day_in_week_id`) REFERENCES `list_week_days` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_10` FOREIGN KEY (`daylight_state_id`) REFERENCES `list_daylight_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_11` FOREIGN KEY (`dl_from_month_id`) REFERENCES `list_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_12` FOREIGN KEY (`dl_from_day_id`) REFERENCES `list_month_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_13` FOREIGN KEY (`dl_to_month_id`) REFERENCES `list_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `settings_ibfk_14` FOREIGN KEY (`dl_to_day_id`) REFERENCES `list_month_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
BEGIN;
INSERT INTO `settings` VALUES (1, '15825032775e53156d2da658.33270918.png', '15825032775e53156d2da659.85341940.png', 'light', b'1', 'مدیریت منابع سازمان', 10, 10, 10, 10, 10, 2, 30, 10, '', '', NULL, 3, '', '', '', 1, 4, b'1', NULL, 1, 1, 1, 58, 1, 3, 1, 1, 7, 1);
COMMIT;

-- ----------------------------
-- Table structure for sys_events
-- ----------------------------
DROP TABLE IF EXISTS `sys_events`;
CREATE TABLE `sys_events`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `sys_events_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `sys_events_list_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sys_events_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for sys_events_list_statuses
-- ----------------------------
DROP TABLE IF EXISTS `sys_events_list_statuses`;
CREATE TABLE `sys_events_list_statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for sys_logs
-- ----------------------------
DROP TABLE IF EXISTS `sys_logs`;
CREATE TABLE `sys_logs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `sys_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for sys_modules
-- ----------------------------
DROP TABLE IF EXISTS `sys_modules`;
CREATE TABLE `sys_modules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `version` int(11) NOT NULL,
  `created_at` datetime(0) NOT NULL,
  `update_at` datetime(0) NOT NULL,
  `new_version` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of sys_modules
-- ----------------------------
BEGIN;
INSERT INTO `sys_modules` VALUES (1, 'مدیر سیستم', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1), (2, 'پشتیبانی', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1), (3, 'تقویم', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1), (4, 'شعبه', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1), (5, 'مکاتبات', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1), (6, 'حسابداری', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1), (7, 'پرسنلی', 1, '2019-12-12 00:00:00', '2019-12-12 00:00:00', 1);
COMMIT;

-- ----------------------------
-- Table structure for sys_modules_settings
-- ----------------------------
DROP TABLE IF EXISTS `sys_modules_settings`;
CREATE TABLE `sys_modules_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `time` time(0) NOT NULL,
  `auto_update` bit(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of sys_modules_settings
-- ----------------------------
BEGIN;
INSERT INTO `sys_modules_settings` VALUES (1, 1, 1, 1, '17:43:17', b'1');
COMMIT;

-- ----------------------------
-- Table structure for sys_sounds
-- ----------------------------
DROP TABLE IF EXISTS `sys_sounds`;
CREATE TABLE `sys_sounds`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NULL DEFAULT NULL,
  `support_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tickets_ibfk_2`(`sender_id`) USING BTREE,
  INDEX `tickets_ibfk_4`(`status_id`) USING BTREE,
  INDEX `tickets_ibfk_1`(`type_id`) USING BTREE,
  INDEX `tickets_ibfk_3`(`receiver_id`) USING BTREE,
  INDEX `support_id`(`support_id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tickets_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `tickets_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`support_id`) REFERENCES `tickets_supports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_ibfk_6` FOREIGN KEY (`category_id`) REFERENCES `tickets_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5000 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for tickets_categories
-- ----------------------------
DROP TABLE IF EXISTS `tickets_categories`;
CREATE TABLE `tickets_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of tickets_categories
-- ----------------------------
BEGIN;
INSERT INTO `tickets_categories` VALUES (1, 'پشتیبانی'), (2, 'مدیر سیستم'), (3, 'شعبه'), (4, 'پرسنلی'), (5, 'مکاتبات'), (6, 'تقویم'), (7, 'حسابداری');
COMMIT;

-- ----------------------------
-- Table structure for tickets_messages
-- ----------------------------
DROP TABLE IF EXISTS `tickets_messages`;
CREATE TABLE `tickets_messages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ticket_id`(`ticket_id`) USING BTREE,
  INDEX `sender_id`(`sender_id`) USING BTREE,
  CONSTRAINT `tickets_messages_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tickets_messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for tickets_messages_attachments
-- ----------------------------
DROP TABLE IF EXISTS `tickets_messages_attachments`;
CREATE TABLE `tickets_messages_attachments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `message_id`(`message_id`) USING BTREE,
  CONSTRAINT `tickets_messages_attachments_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `tickets_messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for tickets_status
-- ----------------------------
DROP TABLE IF EXISTS `tickets_status`;
CREATE TABLE `tickets_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of tickets_status
-- ----------------------------
BEGIN;
INSERT INTO `tickets_status` VALUES (1, 'ارسال شده'), (2, 'خوانده شده'), (3, 'پاسخ داده شده'), (4, 'بسته شده');
COMMIT;

-- ----------------------------
-- Table structure for tickets_supports
-- ----------------------------
DROP TABLE IF EXISTS `tickets_supports`;
CREATE TABLE `tickets_supports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of tickets_supports
-- ----------------------------
BEGIN;
INSERT INTO `tickets_supports` VALUES (1, 'فنی'), (2, 'فروش');
COMMIT;

-- ----------------------------
-- Table structure for tickets_types
-- ----------------------------
DROP TABLE IF EXISTS `tickets_types`;
CREATE TABLE `tickets_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of tickets_types
-- ----------------------------
BEGIN;
INSERT INTO `tickets_types` VALUES (1, 'تکی'), (2, 'گروهی');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) NULL DEFAULT NULL COMMENT 'شعبه',
  `group_id` int(11) NULL DEFAULT NULL COMMENT 'گروه کاربری',
  `status_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت کاربری',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام کاربری',
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'رمز عبور',
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کلید بازیابی رمز عبور',
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کلید اعتبار سنجی',
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد پرسنلی',
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام',
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام خانوادگی',
  `card_num` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'شماره شناسنامه',
  `codemelli` varchar(10) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'کد ملی',
  `birthplace_province_id` int(11) NULL DEFAULT NULL COMMENT 'استان محل تولد',
  `birthplace_city_id` int(11) NULL DEFAULT NULL COMMENT 'شهر  محل تولد',
  `birthday` date NULL DEFAULT NULL COMMENT 'تاریخ تولد',
  `father_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام پدر',
  `marital_status_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت تأهل',
  `religion` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'دین',
  `military_service_status_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت نظام وظیفه',
  `gender_id` int(11) NULL DEFAULT NULL COMMENT 'جنسیت',
  `employment_status_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت اشتغال',
  `requested_salary` int(11) NULL DEFAULT NULL COMMENT 'حقوق درخواستی',
  `total_work_history` int(11) NULL DEFAULT NULL COMMENT 'مجموع سابقه کاری',
  `account_number` varchar(11) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'شماره حساب بانکی',
  `account_type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع حساب',
  `type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع',
  `date_start` date NULL DEFAULT NULL COMMENT 'تاریخ شروع همکاری',
  `head_line` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL COMMENT 'توضیحات شخصی',
  `force_rollcall` bit(1) NULL DEFAULT NULL COMMENT 'حضور غیاب اجباری',
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'موبایل',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'تلفن',
  `province_id` int(11) NULL DEFAULT NULL COMMENT 'استان',
  `city_id` int(11) NULL DEFAULT NULL COMMENT 'شهر',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'ایمیل',
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'فیس بوک',
  `telegram` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'تلگرام',
  `instagram` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'اینستاگرام',
  `address` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL COMMENT 'آدرس',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'آواتار',
  `place_of_issue` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'محل صدور شناسنامه',
  `insurance_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'شماره بیمه',
  `mother_birth_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'محل تولد مادر',
  `father_birth_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'محل تولد پدر',
  `mother_first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام مادر',
  `prev_last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نام خانوادگی قبلی',
  `mother_last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'نوع خودرو',
  `passport_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'پلاک خودرو',
  `info_work_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'محل خدمت',
  `start_date` date NULL DEFAULT NULL COMMENT 'تاریخ شروع خدمت',
  `emergency_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'تلفن اضطراری',
  `call_receiver` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'مخاطب تلفن اضطراری',
  `physical_cond_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت جسمی',
  `physical_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'توضیحات وضعیت جسمی',
  `nationality` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL COMMENT 'ملیت',
  `issuance_date` date NULL DEFAULT NULL COMMENT 'تاریخ صدور شناسنامه',
  `personnel_share_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت کارمند',
  `insurance_type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع بیمه',
  `employment_type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع استخدام',
  `contract_type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع قرارداد',
  `insurance_start_date` date NULL DEFAULT NULL COMMENT 'تاریخ شروع بیمه',
  `has_machin_id` int(11) NULL DEFAULT NULL COMMENT 'اتومبیل شخصی',
  `is_owner_id` int(11) NULL DEFAULT NULL COMMENT 'وضعیت مسکن',
  `expiration` date NULL DEFAULT NULL COMMENT 'انقضاء',
  `language_id` int(11) NULL DEFAULT NULL COMMENT 'زبان مورد علاقه',
  `rtl` bit(1) NULL DEFAULT NULL COMMENT 'نوشتن متن از راست به چپ',
  `calendar_type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع تقویم',
  `date_type_id` int(11) NULL DEFAULT NULL COMMENT 'فرمت تاریخ',
  `first_day_in_week_id` int(11) NULL DEFAULT NULL COMMENT 'اولین روز هفته',
  `number_format_id` int(11) NULL DEFAULT NULL COMMENT 'فرمت اعداد',
  `daylight_state_id` int(11) NULL DEFAULT NULL COMMENT 'زمان تابستان',
  `timezone_id` int(11) NULL DEFAULT NULL COMMENT 'منطقه زمانی',
  `from_month_id` int(11) NULL DEFAULT NULL COMMENT 'از ماه',
  `from_day_id` int(11) NULL DEFAULT NULL COMMENT 'از روز',
  `to_month_id` int(11) NULL DEFAULT NULL COMMENT 'تا ماه',
  `to_day_id` int(11) NULL DEFAULT NULL COMMENT 'تا روز',
  `use_sip` bit(1) NULL DEFAULT NULL COMMENT 'SIP اجازه تماسها از طریق',
  `mode_use_sip_id` int(11) NULL DEFAULT NULL COMMENT 'SIP پیشوند تماس از طریق',
  `show_lang` bit(1) NULL DEFAULT NULL COMMENT 'نمایش کلمات ترجمه شده درصفحات',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `auth_key`(`auth_key`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `codemelli`(`codemelli`) USING BTREE,
  INDEX `status_id`(`status_id`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE,
  INDEX `province_id`(`province_id`) USING BTREE,
  INDEX `city_id`(`city_id`) USING BTREE,
  INDEX `users_ibfk_05`(`birthplace_province_id`) USING BTREE,
  INDEX `users_ibfk_06`(`birthplace_city_id`) USING BTREE,
  INDEX `users_ibfk_07`(`marital_status_id`) USING BTREE,
  INDEX `users_ibfk_08`(`military_service_status_id`) USING BTREE,
  INDEX `users_ibfk_09`(`gender_id`) USING BTREE,
  INDEX `users_ibfk_10`(`employment_status_id`) USING BTREE,
  INDEX `users_ibfk_11`(`account_type_id`) USING BTREE,
  INDEX `users_ibfk_12`(`type_id`) USING BTREE,
  INDEX `physical_cond_id`(`physical_cond_id`) USING BTREE,
  INDEX `personnel_share_id`(`personnel_share_id`) USING BTREE,
  INDEX `insurance_type_id`(`insurance_type_id`) USING BTREE,
  INDEX `employment_type_id`(`employment_type_id`) USING BTREE,
  INDEX `contract_type_id`(`contract_type_id`) USING BTREE,
  INDEX `has_machin_id`(`has_machin_id`) USING BTREE,
  INDEX `is_owner_id`(`is_owner_id`) USING BTREE,
  INDEX `organization_id`(`organization_id`) USING BTREE,
  INDEX `language_id`(`language_id`) USING BTREE,
  INDEX `calendar_type_id`(`calendar_type_id`) USING BTREE,
  INDEX `date_type_id`(`date_type_id`) USING BTREE,
  INDEX `first_day_in_week_id`(`first_day_in_week_id`) USING BTREE,
  INDEX `number_format_id`(`number_format_id`) USING BTREE,
  INDEX `daylight_state_id`(`daylight_state_id`) USING BTREE,
  INDEX `timezone_id`(`timezone_id`) USING BTREE,
  INDEX `from_month_id`(`from_month_id`) USING BTREE,
  INDEX `from_day_id`(`from_day_id`) USING BTREE,
  INDEX `to_month_id`(`to_month_id`) USING BTREE,
  INDEX `to_day_id`(`to_day_id`) USING BTREE,
  INDEX `mode_use_sip_id`(`mode_use_sip_id`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `users_list_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_10` FOREIGN KEY (`employment_status_id`) REFERENCES `users_list_employment_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_11` FOREIGN KEY (`account_type_id`) REFERENCES `users_list_account_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_12` FOREIGN KEY (`type_id`) REFERENCES `users_list_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_13` FOREIGN KEY (`physical_cond_id`) REFERENCES `users_list_physical_cond` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_14` FOREIGN KEY (`personnel_share_id`) REFERENCES `users_list_personnel_share` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_15` FOREIGN KEY (`insurance_type_id`) REFERENCES `users_list_insurance_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_16` FOREIGN KEY (`employment_type_id`) REFERENCES `users_list_employment_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_17` FOREIGN KEY (`contract_type_id`) REFERENCES `users_list_contract_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_18` FOREIGN KEY (`has_machin_id`) REFERENCES `users_list_has_machin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_19` FOREIGN KEY (`is_owner_id`) REFERENCES `users_list_is_owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_20` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_21` FOREIGN KEY (`language_id`) REFERENCES `users_list_languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_22` FOREIGN KEY (`calendar_type_id`) REFERENCES `list_calendar_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_23` FOREIGN KEY (`date_type_id`) REFERENCES `users_list_date_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_24` FOREIGN KEY (`first_day_in_week_id`) REFERENCES `users_list_first_day_in_week` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_25` FOREIGN KEY (`number_format_id`) REFERENCES `users_list_number_format` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_26` FOREIGN KEY (`daylight_state_id`) REFERENCES `list_daylight_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_27` FOREIGN KEY (`timezone_id`) REFERENCES `list_timezone` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_28` FOREIGN KEY (`from_month_id`) REFERENCES `list_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_29` FOREIGN KEY (`from_day_id`) REFERENCES `list_month_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`province_id`) REFERENCES `geo_provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_30` FOREIGN KEY (`to_month_id`) REFERENCES `list_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_31` FOREIGN KEY (`to_day_id`) REFERENCES `list_month_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_32` FOREIGN KEY (`mode_use_sip_id`) REFERENCES `users_list_mode_use_sip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_4` FOREIGN KEY (`city_id`) REFERENCES `geo_cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_5` FOREIGN KEY (`birthplace_province_id`) REFERENCES `geo_provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_6` FOREIGN KEY (`birthplace_city_id`) REFERENCES `geo_cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_7` FOREIGN KEY (`marital_status_id`) REFERENCES `users_list_marital_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_8` FOREIGN KEY (`military_service_status_id`) REFERENCES `users_list_military_service_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_9` FOREIGN KEY (`gender_id`) REFERENCES `list_genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 1, 1, 1, '09357405114', '$2y$13$tzc9OoG3VLvFrXDDpF8U2umWWaMGLORBXSRjP5lvitHGiF54pRrpa', NULL, 'qdOpoiNMCsmWkJKblSojmyJSArLltTpH', '40024043032', 'مدیر', 'سیستم', '1', '1', 11, 426, '2019-12-13', 'یعقوب', NULL, 'اسلام - شیعه', NULL, 1, NULL, 10000000, 170, '', NULL, NULL, '2019-12-16', '', b'0', '09357405114', '05132146190', 11, 426, 'hnajafi1994@gmail.com', '', '@hosseinnajafi_ir', '@hossein.najafi.94', 'بلوار طبرسی شمالی، طبرسی 24، رجب زاده 5، پلاک 4، طبقه 1+', 'default.png', '1', '2', '3', '4', '5', '6', '7', '8', '9', '2019-12-13', '10', '11', NULL, '12', '13', '2019-12-14', NULL, NULL, NULL, NULL, '2019-12-15', NULL, NULL, '2019-12-15', 1, b'1', 1, 1, 1, 1, 3, 58, 1, 2, 6, 2, b'1', 3, b'1');
COMMIT;

-- ----------------------------
-- Table structure for users_compilations
-- ----------------------------
DROP TABLE IF EXISTS `users_compilations`;
CREATE TABLE `users_compilations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `submit_type_id` int(11) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `year` int(11) NULL DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `page_number` int(11) NULL DEFAULT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `points` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `submit_type_id`(`submit_type_id`) USING BTREE,
  CONSTRAINT `users_compilations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_compilations_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `users_compilations_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_compilations_ibfk_3` FOREIGN KEY (`submit_type_id`) REFERENCES `users_compilations_list_submit_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_compilations
-- ----------------------------
BEGIN;
INSERT INTO `users_compilations` VALUES (1, 1, NULL, NULL, '123', NULL, '', NULL, '', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users_compilations_list_submit_types
-- ----------------------------
DROP TABLE IF EXISTS `users_compilations_list_submit_types`;
CREATE TABLE `users_compilations_list_submit_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_compilations_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_compilations_list_types`;
CREATE TABLE `users_compilations_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_descriptions
-- ----------------------------
DROP TABLE IF EXISTS `users_descriptions`;
CREATE TABLE `users_descriptions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `descriptions` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `users_descriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_descriptions_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `users_descriptions_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_descriptions
-- ----------------------------
BEGIN;
INSERT INTO `users_descriptions` VALUES (1, 1, 2, '<p>2</p>\r\n'), (2, 1, 1, '<p>1</p>\r\n'), (3, 1, 3, '<p>3</p>\r\n');
COMMIT;

-- ----------------------------
-- Table structure for users_descriptions_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_descriptions_list_types`;
CREATE TABLE `users_descriptions_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_descriptions_list_types
-- ----------------------------
BEGIN;
INSERT INTO `users_descriptions_list_types` VALUES (1, 'توضیحات اداری'), (2, 'توضیحات محرمانه'), (3, 'توضیحات خیلی محرمانه');
COMMIT;

-- ----------------------------
-- Table structure for users_educations
-- ----------------------------
DROP TABLE IF EXISTS `users_educations`;
CREATE TABLE `users_educations`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `degree_id` int(11) NULL DEFAULT NULL,
  `field` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `university` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `gpa` int(11) NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `evidence` smallint(6) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `points` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `degree_id`(`degree_id`) USING BTREE,
  CONSTRAINT `users_educations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_educations_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `users_educations_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_educations_ibfk_3` FOREIGN KEY (`degree_id`) REFERENCES `list_degree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_educations
-- ----------------------------
BEGIN;
INSERT INTO `users_educations` VALUES (1, 1, 1, 4, 'مهندسی مکانیک', 'آزاد اهواز', 15, '2020-01-15', '2020-01-15', 1, NULL, 0), (2, 1, 2, NULL, 'مهندسی مکانیک', 'آزاد اهواز', 15, '2020-01-15', '2020-01-15', 0, NULL, 0);
COMMIT;

-- ----------------------------
-- Table structure for users_educations_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_educations_list_types`;
CREATE TABLE `users_educations_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_educations_list_types
-- ----------------------------
BEGIN;
INSERT INTO `users_educations_list_types` VALUES (1, 'تحصیلات'), (2, 'مهارت');
COMMIT;

-- ----------------------------
-- Table structure for users_families
-- ----------------------------
DROP TABLE IF EXISTS `users_families`;
CREATE TABLE `users_families`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `nationalcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `gender_id` int(11) NULL DEFAULT NULL,
  `birthday` date NULL DEFAULT NULL,
  `birthplace` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `ratio_id` int(11) NULL DEFAULT NULL,
  `degree_id` int(11) NULL DEFAULT NULL,
  `job` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `under_assignment` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `users_families_fk1`(`user_id`) USING BTREE,
  INDEX `users_families_fk2`(`gender_id`) USING BTREE,
  INDEX `users_families_fk3`(`ratio_id`) USING BTREE,
  INDEX `users_families_fk4`(`degree_id`) USING BTREE,
  CONSTRAINT `users_families_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_families_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `list_genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_families_ibfk_3` FOREIGN KEY (`ratio_id`) REFERENCES `users_list_ratio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_families_ibfk_4` FOREIGN KEY (`degree_id`) REFERENCES `list_degree` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_families
-- ----------------------------
BEGIN;
INSERT INTO `users_families` VALUES (1, 1, 'حسین', 'نجفی', '0', 1, '1994-01-05', 'مشهد', 5, 1, 'برنامه نویس', '09357405114', 'مشهد', 1);
COMMIT;

-- ----------------------------
-- Table structure for users_favorites
-- ----------------------------
DROP TABLE IF EXISTS `users_favorites`;
CREATE TABLE `users_favorites`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `times` int(11) NULL DEFAULT NULL,
  `professional` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `users_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_favorites_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `users_favorites_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_favorites
-- ----------------------------
BEGIN;
INSERT INTO `users_favorites` VALUES (1, 1, NULL, 'asd', 123, 1);
COMMIT;

-- ----------------------------
-- Table structure for users_favorites_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_favorites_list_types`;
CREATE TABLE `users_favorites_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE,
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `users_list_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
BEGIN;
INSERT INTO `users_groups` VALUES (9, 1, 2);
COMMIT;

-- ----------------------------
-- Table structure for users_honors
-- ----------------------------
DROP TABLE IF EXISTS `users_honors`;
CREATE TABLE `users_honors`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `points` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `users_honors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_honors_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `users_honors_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_honors
-- ----------------------------
BEGIN;
INSERT INTO `users_honors` VALUES (1, 1, NULL, 'sad', 12), (2, 1, NULL, '', NULL), (3, 1, NULL, '', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users_honors_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_honors_list_types`;
CREATE TABLE `users_honors_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_honors_list_types
-- ----------------------------
BEGIN;
INSERT INTO `users_honors_list_types` VALUES (1, 'افتخارات علمی'), (2, 'افتخارات نمایندگی'), (3, 'سایر');
COMMIT;

-- ----------------------------
-- Table structure for users_list_account_type
-- ----------------------------
DROP TABLE IF EXISTS `users_list_account_type`;
CREATE TABLE `users_list_account_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_contract_type
-- ----------------------------
DROP TABLE IF EXISTS `users_list_contract_type`;
CREATE TABLE `users_list_contract_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_date_type
-- ----------------------------
DROP TABLE IF EXISTS `users_list_date_type`;
CREATE TABLE `users_list_date_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_date_type
-- ----------------------------
BEGIN;
INSERT INTO `users_list_date_type` VALUES (1, 'YYYY.MM.DD'), (2, 'DD.MM.YYYY');
COMMIT;

-- ----------------------------
-- Table structure for users_list_employment_status
-- ----------------------------
DROP TABLE IF EXISTS `users_list_employment_status`;
CREATE TABLE `users_list_employment_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_employment_type
-- ----------------------------
DROP TABLE IF EXISTS `users_list_employment_type`;
CREATE TABLE `users_list_employment_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_first_day_in_week
-- ----------------------------
DROP TABLE IF EXISTS `users_list_first_day_in_week`;
CREATE TABLE `users_list_first_day_in_week`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_first_day_in_week
-- ----------------------------
BEGIN;
INSERT INTO `users_list_first_day_in_week` VALUES (1, 'شنبه'), (2, 'یک شنبه'), (3, 'دو شنبه');
COMMIT;

-- ----------------------------
-- Table structure for users_list_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_list_groups`;
CREATE TABLE `users_list_groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'آیدی',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL COMMENT 'نام گروه',
  `admin_id` int(11) NOT NULL COMMENT 'مدیر',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_group_ibfk_1`(`admin_id`) USING BTREE,
  CONSTRAINT `users_list_groups_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_groups
-- ----------------------------
BEGIN;
INSERT INTO `users_list_groups` VALUES (2, 'واحد فروش خودرو', 1), (3, 'واحد خدمات پس از فروش', 1), (4, 'واحد فروشگاه قطعات یدکی', 1);
COMMIT;

-- ----------------------------
-- Table structure for users_list_groups_permissions
-- ----------------------------
DROP TABLE IF EXISTS `users_list_groups_permissions`;
CREATE TABLE `users_list_groups_permissions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE,
  INDEX `module_id`(`module_id`) USING BTREE,
  CONSTRAINT `users_list_groups_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `users_list_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_list_groups_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `sys_modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_groups_permissions
-- ----------------------------
BEGIN;
INSERT INTO `users_list_groups_permissions` VALUES (9, 2, 1);
COMMIT;

-- ----------------------------
-- Table structure for users_list_has_machin
-- ----------------------------
DROP TABLE IF EXISTS `users_list_has_machin`;
CREATE TABLE `users_list_has_machin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_hiring_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_list_hiring_groups`;
CREATE TABLE `users_list_hiring_groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_hiring_groups
-- ----------------------------
BEGIN;
INSERT INTO `users_list_hiring_groups` VALUES (1, 't'), (2, 'y');
COMMIT;

-- ----------------------------
-- Table structure for users_list_insurance_type
-- ----------------------------
DROP TABLE IF EXISTS `users_list_insurance_type`;
CREATE TABLE `users_list_insurance_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_is_owner
-- ----------------------------
DROP TABLE IF EXISTS `users_list_is_owner`;
CREATE TABLE `users_list_is_owner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_languages
-- ----------------------------
DROP TABLE IF EXISTS `users_list_languages`;
CREATE TABLE `users_list_languages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_languages
-- ----------------------------
BEGIN;
INSERT INTO `users_list_languages` VALUES (1, 'Persian'), (2, 'English'), (3, 'Arabic');
COMMIT;

-- ----------------------------
-- Table structure for users_list_marital_status
-- ----------------------------
DROP TABLE IF EXISTS `users_list_marital_status`;
CREATE TABLE `users_list_marital_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_military_service_status
-- ----------------------------
DROP TABLE IF EXISTS `users_list_military_service_status`;
CREATE TABLE `users_list_military_service_status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_mode_use_sip
-- ----------------------------
DROP TABLE IF EXISTS `users_list_mode_use_sip`;
CREATE TABLE `users_list_mode_use_sip`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_mode_use_sip
-- ----------------------------
BEGIN;
INSERT INTO `users_list_mode_use_sip` VALUES (1, ':sip'), (2, ':callto'), (3, ':tel');
COMMIT;

-- ----------------------------
-- Table structure for users_list_number_format
-- ----------------------------
DROP TABLE IF EXISTS `users_list_number_format`;
CREATE TABLE `users_list_number_format`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_number_format
-- ----------------------------
BEGIN;
INSERT INTO `users_list_number_format` VALUES (1, 'فارسی'), (2, 'انگلیسی'), (3, 'عربی');
COMMIT;

-- ----------------------------
-- Table structure for users_list_personnel_share
-- ----------------------------
DROP TABLE IF EXISTS `users_list_personnel_share`;
CREATE TABLE `users_list_personnel_share`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_physical_cond
-- ----------------------------
DROP TABLE IF EXISTS `users_list_physical_cond`;
CREATE TABLE `users_list_physical_cond`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_list_ratio
-- ----------------------------
DROP TABLE IF EXISTS `users_list_ratio`;
CREATE TABLE `users_list_ratio`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_ratio
-- ----------------------------
BEGIN;
INSERT INTO `users_list_ratio` VALUES (1, 'پدر'), (2, 'مادر'), (3, 'فرزند'), (4, 'همسر'), (5, 'برادر'), (6, 'خواهر');
COMMIT;

-- ----------------------------
-- Table structure for users_list_statuses
-- ----------------------------
DROP TABLE IF EXISTS `users_list_statuses`;
CREATE TABLE `users_list_statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_list_statuses
-- ----------------------------
BEGIN;
INSERT INTO `users_list_statuses` VALUES (1, 'فعال'), (2, 'غیرفعال'), (3, 'حذف');
COMMIT;

-- ----------------------------
-- Table structure for users_list_type
-- ----------------------------
DROP TABLE IF EXISTS `users_list_type`;
CREATE TABLE `users_list_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_loan_installment
-- ----------------------------
DROP TABLE IF EXISTS `users_loan_installment`;
CREATE TABLE `users_loan_installment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `date` datetime(0) NOT NULL COMMENT 'تاریخ قسط',
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL COMMENT 'مبلغ قسط',
  PRIMARY KEY (`id`) USING BTREE,
  CONSTRAINT `users_loan_installment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users_loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_loan_list_loan_types
-- ----------------------------
DROP TABLE IF EXISTS `users_loan_list_loan_types`;
CREATE TABLE `users_loan_list_loan_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_loan_list_loan_types
-- ----------------------------
BEGIN;
INSERT INTO `users_loan_list_loan_types` VALUES (1, '1');
COMMIT;

-- ----------------------------
-- Table structure for users_loan_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_loan_list_types`;
CREATE TABLE `users_loan_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_loan_list_types
-- ----------------------------
BEGIN;
INSERT INTO `users_loan_list_types` VALUES (1, 'w'), (2, 'e');
COMMIT;

-- ----------------------------
-- Table structure for users_loans
-- ----------------------------
DROP TABLE IF EXISTS `users_loans`;
CREATE TABLE `users_loans`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL COMMENT 'نوع',
  `position_id` int(11) NOT NULL COMMENT 'شغل',
  `group_id` int(11) NOT NULL COMMENT 'گروه استخدام',
  `user_id` int(11) NOT NULL COMMENT 'نام کارمند',
  `loan_type_id` int(11) NULL DEFAULT NULL COMMENT 'نوع وام',
  `date_request` date NOT NULL COMMENT 'تاریخ در خواست',
  `date_start` date NOT NULL COMMENT 'تاریخ شروع اقساط',
  `date_end` date NOT NULL COMMENT 'تاریخ پایان اقساط',
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL COMMENT 'مبلغ درخواستی',
  `istallments` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL COMMENT 'تعداد اقساط',
  `form_id` int(11) NULL DEFAULT NULL COMMENT 'فرم',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `loan_type_id`(`loan_type_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `users_loans_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `organizations_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_loans_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `users_list_hiring_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_loans_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_loans_ibfk_4` FOREIGN KEY (`loan_type_id`) REFERENCES `users_loan_list_loan_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_loans_ibfk_5` FOREIGN KEY (`type_id`) REFERENCES `users_loan_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_loans
-- ----------------------------
BEGIN;
INSERT INTO `users_loans` VALUES (2, 2, 7, 1, 1, 1, '2019-02-03', '2019-02-03', '2019-02-03', '10000', '3', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users_orders
-- ----------------------------
DROP TABLE IF EXISTS `users_orders`;
CREATE TABLE `users_orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `unit_id` int(11) NULL DEFAULT NULL,
  `position_id` int(11) NULL DEFAULT NULL,
  `calendar_id` int(11) NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `workduration` time(0) NULL DEFAULT NULL,
  `over_floating_hour` time(0) NULL DEFAULT NULL,
  `transfer_day` int(11) NULL DEFAULT NULL,
  `transfer_hour` time(0) NULL DEFAULT NULL,
  `vacation_day` int(11) NULL DEFAULT NULL,
  `vacation_hour` time(0) NULL DEFAULT NULL,
  `max_hourly_leave` time(0) NULL DEFAULT NULL,
  `min_hourly_leave` time(0) NULL DEFAULT NULL,
  `max_delay_month` time(0) NULL DEFAULT NULL,
  `supervisor_id` int(11) NULL DEFAULT NULL,
  `salary_group_id` int(11) NULL DEFAULT NULL,
  `sick_leave_day` int(11) NULL DEFAULT NULL,
  `sick_leave_hour` time(0) NULL DEFAULT NULL,
  `marriage_leave_day` int(11) NULL DEFAULT NULL,
  `marriage_leave_hour` time(0) NULL DEFAULT NULL,
  `holiday_leave_day` int(11) NULL DEFAULT NULL,
  `leave_type_id` int(11) NULL DEFAULT NULL,
  `break_calculate_type_id` int(11) NULL DEFAULT NULL,
  `overtime_enabled` bit(1) NULL DEFAULT NULL,
  `pre_overtime_enabled` bit(1) NULL DEFAULT NULL,
  `floating_enabled` bit(1) NULL DEFAULT NULL,
  `insurable` bit(1) NULL DEFAULT NULL,
  `taxable` bit(1) NULL DEFAULT NULL,
  `overtime_confirm` bit(1) NULL DEFAULT NULL,
  `pre_overtime_confirm` bit(1) NULL DEFAULT NULL,
  `cal_daily_vacation_id` int(11) NULL DEFAULT NULL,
  `floating_id` int(11) NULL DEFAULT NULL,
  `project_id` int(11) NULL DEFAULT NULL,
  `compact_row` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `users_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `users_permissions`;
CREATE TABLE `users_permissions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `module_id`(`module_id`) USING BTREE,
  CONSTRAINT `users_permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `sys_modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_reagents
-- ----------------------------
DROP TABLE IF EXISTS `users_reagents`;
CREATE TABLE `users_reagents`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `job` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `ratio_id` int(11) NULL DEFAULT NULL,
  `dating_period` int(11) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `ratio_id`(`ratio_id`) USING BTREE,
  CONSTRAINT `users_reagents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_reagents_ibfk_2` FOREIGN KEY (`ratio_id`) REFERENCES `users_list_ratio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_reagents
-- ----------------------------
BEGIN;
INSERT INTO `users_reagents` VALUES (2, 1, 'حسین', 'نجفی', '', NULL, NULL, '', '');
COMMIT;

-- ----------------------------
-- Table structure for users_resume
-- ----------------------------
DROP TABLE IF EXISTS `users_resume`;
CREATE TABLE `users_resume`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `job` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `termination` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `salary` int(11) NULL DEFAULT NULL,
  `insurance` smallint(6) NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `points` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `users_resume_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_resume_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `users_resume_list_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_resume
-- ----------------------------
BEGIN;
INSERT INTO `users_resume` VALUES (1, 1, 'test', 2, '', '2020-01-15', '2020-01-15', '', NULL, 0, '', '', NULL), (2, 1, 'test2', 2, '', '2020-01-15', '2020-01-15', '', NULL, 0, '', '', NULL);
COMMIT;

-- ----------------------------
-- Table structure for users_resume_list_type
-- ----------------------------
DROP TABLE IF EXISTS `users_resume_list_type`;
CREATE TABLE `users_resume_list_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_resume_list_type
-- ----------------------------
BEGIN;
INSERT INTO `users_resume_list_type` VALUES (1, 'سوابق داخلی'), (2, 'سوابق خارجی');
COMMIT;

-- ----------------------------
-- Table structure for users_settings
-- ----------------------------
DROP TABLE IF EXISTS `users_settings`;
CREATE TABLE `users_settings`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  CONSTRAINT `users_settings_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `users_settings_list_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_settings
-- ----------------------------
BEGIN;
INSERT INTO `users_settings` VALUES (1, '1', 1);
COMMIT;

-- ----------------------------
-- Table structure for users_settings_admins
-- ----------------------------
DROP TABLE IF EXISTS `users_settings_admins`;
CREATE TABLE `users_settings_admins`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `settings_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `settings_id`(`settings_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `users_settings_admins_ibfk_1` FOREIGN KEY (`settings_id`) REFERENCES `users_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_settings_admins_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Table structure for users_settings_list_types
-- ----------------------------
DROP TABLE IF EXISTS `users_settings_list_types`;
CREATE TABLE `users_settings_list_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci;

-- ----------------------------
-- Records of users_settings_list_types
-- ----------------------------
BEGIN;
INSERT INTO `users_settings_list_types` VALUES (1, 'w'), (2, 's'), (3, 'g');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
