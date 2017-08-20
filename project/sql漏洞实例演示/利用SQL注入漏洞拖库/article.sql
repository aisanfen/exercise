/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : injection

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2012-01-12 20:22:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `content` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`articleid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '利用SQL注入漏洞拖库', '看到了吧，一个经构造后的sql语句竟有如此可怕的破坏力，相信你看到这后，开始对sql注入有了一个理性的认识了吧~\r\n没错，SQL注入就是这么容易。但是，要根据实际情况构造灵活的sql语句却不是那么容易的。有了基础之后，自己再去慢慢摸索吧。\r\n有没有想过，如果经由后台登录窗口提交的数据都被管理员过滤掉特殊字符之后呢？这样的话，我们的万能用户名’ or 1=1#就无法使用了。但这并不是说我们就毫无对策，要知道用户和数据库打交道的途径不止这一条。\r\n更多关于SQL注入的信息请看我的另一篇博文：利用SQL注入拖库');
INSERT INTO `article` VALUES ('2', 'SQL注入漏洞防不胜防', 'select * from users where username=\'\' or 1=1#\' and password=md5(\'\')\r\n语义分析：“#”在mysql中是注释符，这样井号后面的内容将被mysql视为注释内容，这样就不会去执行了，换句话说，以下的两句sql语句等价：\r\nselect * from users where username=\'\' or 1=1#\' and password=md5(\'\')\r\n等价于\r\nselect * from users where username=\'\' or 1=1\r\n \r\n因为1=1永远是都是成立的，即where子句总是为真，将该sql进一步简化之后，等价于如下select语句：\r\nselect * from users\r\n没错，该sql语句的作用是检索users表中的所有字段\r\n小技巧：如果不知道’ or 1=1#中的单引号的作用，可以自己echo 下sql语句，就一目了然了。');
INSERT INTO `article` VALUES ('3', 'SQL的定义', ' SQL注入是从正常的WWW端口访问，而且表面看起来跟一般的Web页面访问没什么区别， 所以目前市面的防火墙都不会对ＳＱＬ注入发出警报，如果管理员没查看IIS日志的习惯，可能被入侵很长时间都不会发觉。\r\n        随着B/S模式应用开发的发展，使用这种模式编写应用程序的程序员也越来越多。但是由于这个行业的入门门槛不高，程序员的水平及经验也参差不齐，相当大一部分程序员在编写代码的时候，没有对用户输入数据的合法性进行判断，使应用程序存在安全隐患。用户可以提交一段数据库查询代码，根据程序返回的结果，获得某些他想得知的数据，这就是所谓的SQL Injection，即SQL注入。\r\n        SQL注入是从正常的WWW端口访问，而且表面看起来跟一般的Web页面访问没什么区别，所以目前市面的防火墙都不会对SQL注入发出警报，如果管理员没查看IIS日志的习惯，可能被入侵很长时间都不会发觉。\r\n        但是，SQL注入的手法相当灵活，在注入的时候会碰到很多意外的情况。能不能根据具体情况进行分析，构造巧妙的SQL语句，从而成功获取想要的数据，是高手与“菜鸟”的根本区别。');
