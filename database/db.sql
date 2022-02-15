-- --------------------------------------------------------
-- 主机:                           localhost
-- 服务器版本:                        10.4.7-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 导出  表 rwup.rwup_cache 结构
CREATE TABLE IF NOT EXISTS `rwup_cache` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '缓存名称',
  `k` varchar(100) NOT NULL DEFAULT '' COMMENT '缓存标识',
  `v` text NOT NULL DEFAULT '' COMMENT '序列化缓存数据',
  `expire` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sign` (`k`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_config 结构
CREATE TABLE IF NOT EXISTS `rwup_config` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
  `k` varchar(50) NOT NULL DEFAULT '' COMMENT '键名',
  `v` varchar(3000) NOT NULL DEFAULT '' COMMENT '配置值',
  `data_type` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `k` (`k`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_directory 结构
CREATE TABLE IF NOT EXISTS `rwup_directory` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) unsigned NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL DEFAULT '',
  `project_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `ord` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_doc 结构
CREATE TABLE IF NOT EXISTS `rwup_doc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `directory_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL DEFAULT '',
  `sname` varchar(50) NOT NULL DEFAULT '',
  `content` text DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `deny_read` text DEFAULT NULL,
  `deny_write` text DEFAULT NULL,
  `share_code` varchar(100) NOT NULL DEFAULT '',
  `is_share` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `ord` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_doc_log 结构
CREATE TABLE IF NOT EXISTS `rwup_doc_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `doc_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL DEFAULT '',
  `sname` varchar(50) NOT NULL DEFAULT '',
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_log 结构
CREATE TABLE IF NOT EXISTS `rwup_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `type` int(10) unsigned NOT NULL DEFAULT 0,
  `msg` varchar(200) NOT NULL DEFAULT '',
  `details` varchar(3000) NOT NULL DEFAULT '',
  `target` bigint(20) unsigned NOT NULL DEFAULT 0,
  `ip` varchar(20) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `created_at` (`created_at`),
  KEY `adminer_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_permission 结构
CREATE TABLE IF NOT EXISTS `rwup_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '权限名称',
  `permission` varchar(100) NOT NULL DEFAULT '' COMMENT '权限标识',
  `group_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '权限类型',
  `type` tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT 'api权限或自定义权限',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item` (`permission`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_permission_group 结构
CREATE TABLE IF NOT EXISTS `rwup_permission_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '父分组',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分组名称',
  `ord` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '排序',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_project 结构
CREATE TABLE IF NOT EXISTS `rwup_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '创建人',
  `manager` varchar(1000) NOT NULL DEFAULT '' COMMENT '管理用户ID',
  `allow_read` text DEFAULT NULL COMMENT '可读用户ID',
  `allow_write` text DEFAULT NULL COMMENT '可写用户ID',
  `doc_num` int(10) unsigned NOT NULL DEFAULT 0,
  `bug_num` int(10) unsigned NOT NULL DEFAULT 0,
  `test_num` int(10) unsigned NOT NULL DEFAULT 0,
  `doc_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `doc_updater` bigint(20) unsigned NOT NULL DEFAULT 0,
  `ord` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_role 结构
CREATE TABLE IF NOT EXISTS `rwup_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_role_permission 结构
CREATE TABLE IF NOT EXISTS `rwup_role_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `permission` varchar(100) NOT NULL DEFAULT '' COMMENT '角色对应权限',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1515 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_token 结构
CREATE TABLE IF NOT EXISTS `rwup_token` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `platform` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `token` char(40) NOT NULL DEFAULT '',
  `token_key` char(40) NOT NULL DEFAULT '',
  `expire` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sess` (`token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

-- 数据导出被取消选择。

-- 导出  表 rwup.rwup_user 结构
CREATE TABLE IF NOT EXISTS `rwup_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `salt` char(40) NOT NULL DEFAULT '' COMMENT '密码盐',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '名字',
  `phone` varchar(15) NOT NULL DEFAULT '' COMMENT '手机',
  `roles` varchar(200) NOT NULL DEFAULT '' COMMENT '角色ID集合 逗号分隔',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态',
  `is_super` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否超级管理员',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `created_at` int(10) unsigned DEFAULT 0,
  `updated_at` int(10) unsigned DEFAULT 0,
  `deleted_at` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- 数据导出被取消选择。

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
