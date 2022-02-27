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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_cache 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `rwup_cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_cache` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- 正在导出表  rwup.rwup_config 的数据：~2 rows (大约)
/*!40000 ALTER TABLE `rwup_config` DISABLE KEYS */;
INSERT INTO `rwup_config` (`id`, `name`, `k`, `v`, `data_type`, `created_at`, `updated_at`) VALUES
	(2, '应用名称', 'app', '项目管理系统', 'string', '2022-02-16 10:59:55', '2022-02-21 10:58:03'),
	(4, '时区', 'timezone', 'Asia/Shanghai', 'string', '2022-02-22 03:54:21', '2022-02-22 03:54:21');
/*!40000 ALTER TABLE `rwup_config` ENABLE KEYS */;

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

-- 正在导出表  rwup.rwup_directory 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `rwup_directory` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_directory` ENABLE KEYS */;

-- 导出  表 rwup.rwup_doc 结构
CREATE TABLE IF NOT EXISTS `rwup_doc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `directory_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `title` varchar(100) NOT NULL DEFAULT '',
  `stitle` varchar(50) NOT NULL DEFAULT '',
  `sign` varchar(100) NOT NULL DEFAULT '',
  `content` text DEFAULT NULL,
  `content_json` text DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `is_rw` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_rb` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_ww` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `is_wb` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `share_code` varchar(100) NOT NULL DEFAULT '',
  `is_share` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `ord` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `project_id` (`project_id`,`directory_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_doc 的数据：0 rows
/*!40000 ALTER TABLE `rwup_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_doc` ENABLE KEYS */;

-- 导出  表 rwup.rwup_doc_log 结构
CREATE TABLE IF NOT EXISTS `rwup_doc_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `doc_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `title` varchar(100) NOT NULL DEFAULT '',
  `stitle` varchar(50) NOT NULL DEFAULT '',
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_doc_log 的数据：0 rows
/*!40000 ALTER TABLE `rwup_doc_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_doc_log` ENABLE KEYS */;

-- 导出  表 rwup.rwup_doc_member 结构
CREATE TABLE IF NOT EXISTS `rwup_doc_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doc_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `type` varchar(10) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_doc_member 的数据：0 rows
/*!40000 ALTER TABLE `rwup_doc_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_doc_member` ENABLE KEYS */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_log 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `rwup_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_log` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_permission 的数据：~77 rows (大约)
/*!40000 ALTER TABLE `rwup_permission` DISABLE KEYS */;
INSERT INTO `rwup_permission` (`id`, `name`, `permission`, `group_id`, `type`, `created_at`, `updated_at`) VALUES
	(150, '登录', 'api.open.login', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:56:35'),
	(151, '退出', 'api.open.logout', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:56:35'),
	(152, '公共配置', 'api.open.config', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:56:35'),
	(153, '首页', 'api.home.dashboard', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:14'),
	(154, '个人信息', 'api.profile.info', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:35'),
	(155, '资料更新', 'api.profile.update', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:35'),
	(156, '重置密码', 'api.profile.password', 1, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:35'),
	(157, '用户配置', 'api.profile.config', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(158, '缓存列表', 'api.cache.list', 3, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:57'),
	(159, '缓存信息', 'api.cache.info', 3, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:57'),
	(160, '缓存清理', 'api.cache.clean', 3, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:57'),
	(161, '缓存删除', 'api.cache.del', 3, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:57'),
	(162, '配置列表', 'api.config.list', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(163, '配置信息', 'api.config.info', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(164, '配置增加', 'api.config.add', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(165, '配置编辑', 'api.config.update', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(166, '配置删除', 'api.config.del', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(167, '日志列表', 'api.log.list', 8, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:14'),
	(168, '日志信息', 'api.log.info', 8, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:14'),
	(169, '权限列表', 'api.permission.list', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(170, '权限信息', 'api.permission.info', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(171, '权限增加', 'api.permission.add', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(172, '权限更新', 'api.permission.update', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(173, '权限删除', 'api.permission.del', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(174, '权限转移', 'api.permission.shift', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(175, '权限配置', 'api.permission.config', 6, 1, '2022-02-27 09:00:00', '2022-02-27 09:11:01'),
	(176, '权限路由重置', 'api.permission.route', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(177, '权限分组', 'api.permission.group.list', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(178, '权限分组信息', 'api.permission.group.info', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(179, '权限分组增加', 'api.permission.group.add', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(180, '权限分组更新', 'api.permission.group.update', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(181, '权限分组删除', 'api.permission.group.del', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:22'),
	(182, '角色列表', 'api.role.list', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(183, '角色信息', 'api.role.info', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(184, '角色增加', 'api.role.add', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(185, '角色更新', 'api.role.update', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(186, '角色删除', 'api.role.del', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(187, '会话列表', 'api.session.list', 2, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:08'),
	(188, '会话信息', 'api.session.info', 2, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:08'),
	(189, '会话清理', 'api.session.clean', 2, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:08'),
	(190, '会话删除', 'api.session.del', 2, 1, '2022-02-27 09:00:00', '2022-02-27 09:07:08'),
	(191, '用户列表', 'api.user.list', 5, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:48'),
	(192, '用户信息', 'api.user.info', 5, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:48'),
	(193, '用户新增', 'api.user.add', 5, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:48'),
	(194, '用户更新', 'api.user.update', 5, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:48'),
	(195, '用户删除', 'api.user.del', 5, 1, '2022-02-27 09:00:00', '2022-02-27 09:06:48'),
	(196, '权限批量查询', 'api.acl.batch.query', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:32'),
	(197, '权限批量设置', 'api.acl.batch.set', 4, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:32'),
	(198, '角色权限查询', 'api.acl.role.query', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(199, '角色权限设置', 'api.acl.role.set', 7, 1, '2022-02-27 09:00:00', '2022-02-27 09:13:20'),
	(200, '项目列表', 'api.project.list', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(201, '项目信息', 'api.project.info', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(202, '项目新增', 'api.project.add', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(203, '项目更新', 'api.project.update', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(204, '项目删除', 'api.project.del', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(205, '项目成员', 'api.project.member.list', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(206, '项目成员信息', 'api.project.member.info', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(207, '项目成员新增', 'api.project.member.add', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(208, '项目成员更新', 'api.project.member.update', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(209, '项目成员删除', 'api.project.member.del', 9, 1, '2022-02-27 09:00:00', '2022-02-27 09:09:23'),
	(210, '目录列表', 'api.directory.list', 20, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:15'),
	(211, '目录信息', 'api.directory.info', 20, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:15'),
	(212, '目录新增', 'api.directory.add', 20, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:15'),
	(213, '目录更新', 'api.directory.update', 20, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:15'),
	(214, '目录删除', 'api.directory.del', 20, 1, '2022-02-27 09:00:00', '2022-02-27 09:10:15'),
	(215, '文档列表', 'api.doc.list', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(216, '文档信息', 'api.doc.info', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(217, '文档增加', 'api.doc.add', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(218, '文档更新', 'api.doc.update', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(219, '文档删除', 'api.doc.del', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(220, '文档权限查询', 'api.doc.access.info', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(221, '文档权限设置', 'api.doc.access.update', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(222, '文档内容更新', 'api.doc.content', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(223, '文件上传', 'api.doc.upload', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(224, '文档目录树', 'api.doc.tree', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(225, '文档搜索', 'api.doc.search', 10, 1, '2022-02-27 09:00:00', '2022-02-27 09:08:56'),
	(226, '阅读文档', 'api.doc.read', 10, 2, '2022-02-27 09:22:30', '2022-02-27 09:57:19');
/*!40000 ALTER TABLE `rwup_permission` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_permission_group 的数据：~11 rows (大约)
/*!40000 ALTER TABLE `rwup_permission_group` DISABLE KEYS */;
INSERT INTO `rwup_permission_group` (`id`, `pid`, `name`, `ord`, `created_at`, `updated_at`) VALUES
	(1, 0, '默认用户', 1, NULL, NULL),
	(2, 0, '会话管理', 7, NULL, NULL),
	(3, 0, '缓存管理', 5, NULL, NULL),
	(4, 0, '权限管理', 4, NULL, NULL),
	(5, 0, '用户管理', 2, NULL, NULL),
	(6, 0, '配置管理', 6, NULL, NULL),
	(7, 0, '角色管理', 3, NULL, NULL),
	(8, 0, '日志管理', 8, NULL, NULL),
	(9, 0, '项目管理', 20, NULL, '2022-02-27 09:08:09'),
	(10, 0, '文档管理', 21, NULL, '2022-02-27 09:08:16'),
	(20, 0, '目录管理', 22, '2022-02-27 09:09:59', '2022-02-27 09:10:03');
/*!40000 ALTER TABLE `rwup_permission_group` ENABLE KEYS */;

-- 导出  表 rwup.rwup_project 结构
CREATE TABLE IF NOT EXISTS `rwup_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `sname` varchar(100) NOT NULL DEFAULT '',
  `sign` varchar(100) NOT NULL DEFAULT '',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0 COMMENT '创建人',
  `doc_num` int(10) unsigned NOT NULL DEFAULT 0,
  `bug_num` int(10) unsigned NOT NULL DEFAULT 0,
  `test_num` int(10) unsigned NOT NULL DEFAULT 0,
  `doc_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `doc_updater` bigint(20) unsigned NOT NULL DEFAULT 0,
  `ord` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `sign` (`sign`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_project 的数据：0 rows
/*!40000 ALTER TABLE `rwup_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_project` ENABLE KEYS */;

-- 导出  表 rwup.rwup_project_member 结构
CREATE TABLE IF NOT EXISTS `rwup_project_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `manage` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '管理权限',
  `doc_read` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '文档读',
  `doc_write` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '文档写',
  `test_read` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `test_write` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `bug_read` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `bug_write` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_project_member 的数据：0 rows
/*!40000 ALTER TABLE `rwup_project_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_project_member` ENABLE KEYS */;

-- 导出  表 rwup.rwup_role 结构
CREATE TABLE IF NOT EXISTS `rwup_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_role 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `rwup_role` DISABLE KEYS */;
INSERT INTO `rwup_role` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '开发者', '2022-02-27 09:54:37', '2022-02-27 09:54:37', NULL);
/*!40000 ALTER TABLE `rwup_role` ENABLE KEYS */;

-- 导出  表 rwup.rwup_role_permission 结构
CREATE TABLE IF NOT EXISTS `rwup_role_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `permission` varchar(100) NOT NULL DEFAULT '' COMMENT '角色对应权限',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- 正在导出表  rwup.rwup_role_permission 的数据：~12 rows (大约)
/*!40000 ALTER TABLE `rwup_role_permission` DISABLE KEYS */;
INSERT INTO `rwup_role_permission` (`id`, `role_id`, `permission`, `created_at`, `updated_at`) VALUES
	(12, 1, 'api.open.login', NULL, NULL),
	(13, 1, 'api.open.logout', NULL, NULL),
	(14, 1, 'api.open.config', NULL, NULL),
	(15, 1, 'api.home.dashboard', NULL, NULL),
	(16, 1, 'api.profile.info', NULL, NULL),
	(17, 1, 'api.profile.update', NULL, NULL),
	(18, 1, 'api.profile.password', NULL, NULL),
	(19, 1, 'api.doc.info', NULL, NULL),
	(20, 1, 'api.doc.upload', NULL, NULL),
	(21, 1, 'api.doc.tree', NULL, NULL),
	(22, 1, 'api.doc.search', NULL, NULL),
	(23, 1, 'api.doc.read', NULL, NULL);
/*!40000 ALTER TABLE `rwup_role_permission` ENABLE KEYS */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 正在导出表  rwup.rwup_token 的数据：~0 rows (大约)
/*!40000 ALTER TABLE `rwup_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `rwup_token` ENABLE KEYS */;

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- 正在导出表  rwup.rwup_user 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `rwup_user` DISABLE KEYS */;
INSERT INTO `rwup_user` (`id`, `username`, `salt`, `password`, `name`, `phone`, `roles`, `status`, `is_super`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'IFMzJJXcsZTwxMEGv5EdCSJeZMUMC9JoyLoa9TB6', '0270949e7726a035df0de6100cd29e19', '超级管理员', '15555555555', '', 1, 1, '127.0.0.1', '2022-02-17 08:56:19', '2022-02-27 09:57:52', NULL);
/*!40000 ALTER TABLE `rwup_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
