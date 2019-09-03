/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-09-03 18:17:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `category` tinyint(10) DEFAULT '0',
  `visitable` tinyint(1) DEFAULT '0',
  `content` longtext,
  `markdown_code` longtext,
  `update` int(50) DEFAULT NULL,
  `created` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'Kaleoz-store前后端分离API设计', '1', '0', '<h3 id=\"h3-kaleoz-store-api-\"><a name=\"Kaleoz-store前后端分离API设计\" class=\"reference-link\"></a><span class=\"header-link octicon octicon-link\"></span>Kaleoz-store前后端分离API设计</h3><p>Kaleoz-store v2版本实现前后端分离以取代原kaloez-store由PHP输出html的方式。原Kaleos-store中PHP的业务逻辑改由API实现。</p>\n<blockquote>\n<ul>\n<li>由于前后端分离，前台改用API获取数据</li><li>前后台所需数据结构不同，后台直接使用了Model返回需要的数据结构</li><li>后台数据结构不能满足前台需求</li><li>故前台数据改用Service处理</li><li>前台Service命名约定以Store为前缀</li></ul>\n</blockquote>\n<p>Service的继承关系，以获取游戏数据的StoreGameService为例，如下：</p>\n<pre><code>// 为子类service提供model及共用方法\nclass ModelService extends Tuki_Model\n{\n\n}\n\n// 为前台提供游戏相关数据\nclass StoreGameService extends ModelService\n{\n\n    public static function getGameById($gameId)\n    {\n        self::getConn()-&gt;from(\'game\')\n            -&gt;joinLeft(\'language\', \'l.code=g.language\', \'name AS language\')\n            -&gt;joinLeft(\'platform\', \'p.code=g.platform\', \'name AS platform\')\n            -&gt;joinLeft(\'company\', \'c.id=g.publisher_id\', \'name AS publisher\');\n        self::getConn()-&gt;where(\'g.id=?\', $gameId);\n        return self::getConn()-&gt;limit(1)-&gt;select()-&gt;fetch();\n    }\n\n}\n</code></pre>', '### Kaleoz-store前后端分离API设计\n\nKaleoz-store v2版本实现前后端分离以取代原kaloez-store由PHP输出html的方式。原Kaleos-store中PHP的业务逻辑改由API实现。\n\n> * 由于前后端分离，前台改用API获取数据\n> * 前后台所需数据结构不同，后台直接使用了Model返回需要的数据结构\n> * 后台数据结构不能满足前台需求\n> * 故前台数据改用Service处理\n> * 前台Service命名约定以Store为前缀\n\nService的继承关系，以获取游戏数据的StoreGameService为例，如下：\n\n```\n// 为子类service提供model及共用方法\nclass ModelService extends Tuki_Model\n{\n\n}\n\n// 为前台提供游戏相关数据\nclass StoreGameService extends ModelService\n{\n\n    public static function getGameById($gameId)\n    {\n        self::getConn()->from(\'game\')\n            ->joinLeft(\'language\', \'l.code=g.language\', \'name AS language\')\n            ->joinLeft(\'platform\', \'p.code=g.platform\', \'name AS platform\')\n            ->joinLeft(\'company\', \'c.id=g.publisher_id\', \'name AS publisher\');\n        self::getConn()->where(\'g.id=?\', $gameId);\n        return self::getConn()->limit(1)->select()->fetch();\n    }\n\n}\n\n```', null, '2019');
