# Host: localhost  (Version: 5.5.53)
# Date: 2019-02-23 15:05:30
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "hbv5_about"
#

DROP TABLE IF EXISTS `hbv5_about`;
CREATE TABLE `hbv5_about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `picname` varchar(255) DEFAULT NULL COMMENT '缩略图地址',
  `shortcontent` varchar(50) DEFAULT NULL COMMENT '缩略内容',
  `content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author` int(11) NOT NULL DEFAULT '0' COMMENT '修改文章管理员的id',
  `show` tinyint(3) NOT NULL DEFAULT '0' COMMENT '审核状态  1==通过，前台允许展示',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '所属栏目',
  `url` varchar(50) NOT NULL DEFAULT '' COMMENT '网址优化',
  PRIMARY KEY (`about_id`),
  KEY `type` (`type`),
  KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='关于我们';

#
# Data for table "hbv5_about"
#

/*!40000 ALTER TABLE `hbv5_about` DISABLE KEYS */;
INSERT INTO `hbv5_about` VALUES (1,'关于我们',NULL,NULL,'<p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">---我们随时具备以专业的精神、专业的技能和专业的设备为您提供个性化企业管理咨询服务；</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">---我们具备各行业深入的实践工作经验和扎实的管理理论基础；</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">---我们充分具备创新的管理思维，简洁、实效的管理方式方法；</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">---我们自身所具备的现代化管理制度与完善的售后服务系统将为您提供安全信任的保证；</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">与客户建立长期战略性合作是我们最根本的经营理念！</span><br/>&nbsp;</p><p><span style=\"margin: 0px; padding: 0px; font-size: 20px;\"><strong style=\"margin: 0px; padding: 0px;\">公 司 优 势</strong></span><br/></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">----创新的思维、简洁、务实的咨询风格；</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">----优良的代表性顾客与反馈；</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">----与企业长期战略性合作的经营理念。</span></p><p><span style=\"margin: 0px; padding: 0px; font-size: 16px;\">我们的合作客户，既有大型企业集团和上市公司，也有中小企业；既有国有企业和集体企业、也有民营企业和外商投资企业； 我们在实践中形成了独特的价值观和工作原则。万信发挥学习型组织的优势，与建筑行业协会及多家业内行业组织机构建立了长期合作伙伴关系。</span></p><p><br/></p>','2018-07-16 11:46:03',90,1,3,'about'),(2,'联系我们',NULL,NULL,'<p><br/></p><h2 style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: \"><strong style=\"padding: 0px; margin: 0px;\">XXX有限公司</strong></h2><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: \">地址：xxx</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(51, 51, 51); font-family: \"><br/>24小时电话：18xxxxxxx</p><p><br/></p>','2018-05-02 17:20:03',90,1,3,'contactus'),(3,'加入我们',NULL,NULL,'<p><strong>招聘PHP程序员</strong></p><p>任职要求：<br/></p><p>1、 计算机相关专业专科以上学历，1年以上网站开发经验（有大型电子商务网站开发经验优先）</p><p>2、 精通PHP，能独立完成如会员、权限、消息系统等项目模块开发；</p><p>3、 熟悉MYSQL，精通MYSQL数据库的优化技术者优先；</p><p>4、 熟悉ThinkPHP框架 能独立承担项目模块开发任务；</p><p>5、 熟悉Linux+Apache+php+mysql相关知识,熟练应用服务器配置优先；</p><p>6、 熟悉相关Web开发技术、熟悉HTML、XML、JavaScript、 DHTML、CSS</p><p>7、 熟练运用memcache等缓存计术</p><p>8、 有良好的编码习惯和技术文档编写能力；</p><p>岗位要求：<br/></p><p>1、负责公司网站整体规划、功能设计、程序开发工作；</p><p>2、负责公司各网站开发与测试，维护已有程序的升级和错误更正;</p><p>3、负责网站完善及必要的二次开发；</p><p>4、负责开发设计网站新功能，协同完成网站升级工作;</p><p>5、负责系统性能优化和技术攻关。</p><p>职位福利：除工资外可额有额外的网站盈利分红，公司实行双休制，尤其可往管理职位发展。</p><p>6. 熟悉SEO者，有招聘类网站开发经验者优先考虑</p><p><br/></p><p><strong>招聘C#程序员</strong></p><p>职位要求：</p><p>1.熟悉.net平台上的开发技术，精通c#开发，1年以上实际项目开发经验；</p><p>2.有较强的编程能力，能够完成较复杂的交互流程设计和实现；</p><p>3.熟悉sql server2008数据库，熟悉sql语句优化和数据库设计优化；</p><p>4.有较好的编码习惯,熟悉EF框架优先考虑；</p><p>5.有良好的自我管理能力和一定的项目管理能力；</p><p>6.较强的沟通学习能力，对技术有热情有探索精神；</p><p>7.工作认真，有责任心，踏实肯干，富有团队精神。</p><p><br/></p><p><strong>招聘电话客服</strong></p><p>岗位职责：</p><p>1、负责有效的客户管理和沟通；</p><p>2、负责组织公司产品的售后服务工作；</p><p>3、建立客户档案并跟踪服务质量；</p><p>4、根据公司提供的客户资料定期进行有效的关系维护。</p><p>任职资格：</p><p>1、18-30岁，口齿清晰，普通话流利；</p><p>2、良好的执行力和团队合作精神；</p><p>3、具有较强的学习能力；</p><p>4、 熟悉互联网，电脑操作熟练，能熟练应用各种办公自动化软件（WORD、EXCEL等）；</p><p>5、具有良好的学习能力、理解能力、文字表达能力；</p><p>上班时间：六天八小时单休制，8:30~18:00，中间午休一个半小时。</p><p><br/></p><p><strong>招聘销售精英</strong></p><p>工作内容：</p><p>1、根据公司提供客户源，有效进行跟进开发需求；</p><p>2、利用公司平台，有效做好产品推广；</p><p>3、善于分析市场与客户需求，并完成销售目标。</p><p>职位要求：</p><p>1、18-28岁，有销售经验者优先考虑录用；</p><p>2、普通话标准，具备较强的沟通能力与表达能力；</p><p>3、熟悉各类电脑办公软件，懂一定的推广技巧与基本的计算机操作；</p><p>4、善于团结同事，具备团队意识，拥有团队精神。</p><p>公司福利：</p><p>1、带薪培训，能快速进入工作状态；</p><p>2、成熟的晋升制度，我们更加注重员工的成长与晋升发展空间；</p><p>3、严格执行国家节假日标准，每年两次员工旅游；</p><p>4、公司团队活动非常多（聚餐、郊游、运动会、篮球赛、羽毛球赛、撕名牌活动、生日会等）；</p><p>5、无责底薪（2800—4000）+高提成+丰厚奖金，综合薪资6000—15000元，配备办公电脑、手机通讯；</p><p>6、公司购买五险一金，各类带薪休假（法定假日、年假、婚假、产假、陪产假、带薪年假等）。</p><p><br/></p>','2018-05-02 17:20:04',90,1,3,'joinus'),(4,'广告服务',NULL,NULL,'<p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">广告热线</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">联系人：xxx</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">联系电话：xxx</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">固话：xxx</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">邮箱：</span><a href=\"http://mailto:12345679@qq.com\" target=\"_self\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;\">xxx</span></a></p><p><br/></p>','2018-05-02 17:22:10',90,1,2,'ad'),(5,'意见反馈',NULL,NULL,'<p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">广大用户老铁，为提高用户体验以及为大家提供更优质的服务，请将您的意见告诉我们.</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size:14px;font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#444444\">我们会在三个工作日内响应您的反馈。</span></p><p><br/></p>','2018-05-02 17:22:12',90,1,1,'feedback'),(6,'常见问题',NULL,NULL,'<p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"font-size: 14px; text-indent: 2em; font-family: 微软雅黑, sans-serif; color: rgb(68, 68, 68);\">1、xxx</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><span style=\"color: rgb(68, 68, 68); font-family: 微软雅黑, sans-serif; font-size: 14px; text-indent: 2em;\">2、xxx</span></p><p style=\";margin-bottom:0;text-indent:36px;line-height:30px;background:white\"><br/></p><p><br/></p>','2018-05-08 11:57:15',90,1,1,'problem'),(7,'更多帮助',NULL,NULL,'<p>如需帮助，请直接联系客服人员。</p>','2018-05-08 11:57:29',90,0,1,'more'),(8,'全职猎聘','/Public/img/in_a1_tu1.jpg','我们建筑全行业提供全职猎聘','<p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">万信集团&nbsp;</span></strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">公司全职业务是由几位多年从事猎头服务的专业人士共同创立独立部门、独立部门专注于高端人才寻访服务的人力资源服务供应。至今在我们的优势领域内为国内知名企业成功地推荐了大量所需的高端管理人才与研发人才，并以优异的合作成绩成为客户长期卓越的战略性合作伙伴。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">我们的咨询顾问团队，由高素质的专业人士组成，成员拥有不同的行业背景及优秀的国内工作经历，行业知识和HR经验丰富，判断候选人准确。我们咨询团队所建立起来的强大服务支持能力，覆盖整个大中华区。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">我们以客户需求为导向，匹配合适人才。以</span><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">“又快又好”“专业才能卓越”</span></strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">为最佳业务实践。以具有专业禀赋的灵活性和高效率，从咨询角度为客户提供增强核心竞争力的人力资源解决方案。服务的快捷和优质，使我们在行业内口碑卓著。</span></p><p><br/></p>','2018-07-16 10:31:31',90,1,4,'qzlp'),(9,'兼职挂证','/Public/img/in_a1_tu2.jpg','我们建筑全行业提供兼职挂证','<p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">万信&nbsp;</span></strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">2011</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">年成立至今已经从事高级人才寻访5个年头，先后为<strong style=\"margin: 0px; padding: 0px;\">300</strong>余家企业提供过近<strong style=\"margin: 0px; padding: 0px;\">100000</strong>个高级岗位的猎头服务；凭借对现代人力资源管理理论的深刻理解与多年人力资源管理实践经验的丰富积累，为合作企业解决了资质人员困乏问题，也同时为人员解决了证书闲置、积压问题。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">公司致力于与企业，人才建立起长期的战略合作关系。通过我们的猎头服务，帮助客户获得优秀的人才，在市场竞争中保持优势。通过我们的猎头服务，帮助人才获得职业发展的机会。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">我们拥有一批专业的人力资源顾问，他们各自的专业背景为企业招聘工作的顺利完成提供有力的支持。我们追求“更准，更快，更稳健”的工作风格，为企业在最短时间内提供最合适的候选人是我们追求的目标。在企业和候选人达成意向后帮助双方做好沟通工作，为候选人提供必要的咨询，促成人选顺利到位是我们工作的重要组成部分。</span></p><p><br/></p>','2018-07-16 10:31:32',90,1,4,'jzgk'),(10,'资质代办','/Public/img/in_a1_tu3.jpg','我们建筑全行业提供资质代办','<p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 30px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(80, 80, 80); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp; &nbsp; &nbsp;</span></strong><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(80, 80, 80); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">资质团队介绍</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">深圳市诚悦信息咨询有限公司是深圳万信信息咨询有限公司旗下一家专业从事建筑企业资质代理的公司。公司是由熟悉建委资质管理规定、流程方法、规范和发展动态的专家领衔，并具备优秀的管理和业务开发经验。 公司以客户的满意度和所应用信息咨询的价值作为衡量公司成功与否的标准。 公司主打代办资质、城市园林绿化资质、劳务分包资质、专业承包资质、施工总承包资质、设计资质、设计施工一体化资 质、送变电工程设计资质、工程造价咨询企业资质、工程勘查设计资质、工程监理企业资质、工程招标代理资质、资质升级 （三升二、二升一）、资质备案、资质变更、资质转让、安全生产许可证、人员职称、建造师招聘、建造师招聘等。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">目前，我国工程建设规模庞大，每年约有45万项在建工程，建设投资超过8万亿元。建筑企业超过12万家，从业人员近5000万。尽管人数众多，但从业人员素质和工程项目管理水平却参差不齐，专业理论水平和文化程度总体偏低。在建造师执业资格制度建立之前，为了规范我国工程建设行为，不断提高工程建设管理水平。2000年，建设部在向国务院汇报深化建设管理体制改革设想时提出：“调整和完善现行的专业技术人员注册分类，在现有注册建筑师、结构工程师、监理工程师、造价工程师的基础上，增设建造师。实行建造师执业资格制度后，大、中型项目的建筑业企业项目经理须逐步由取得注册建造师资格的人员担任，以提高项目经理素质，保证工程质量。”&nbsp;</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">成功案例</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 施工总承包资质成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 劳务分包资质成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 专业承包资质成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 北京园林绿化新办成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 安全生产许可证成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 设计施工一体成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 房屋建筑工程总承包成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">● 建设部工程类综合壹级成功案例之一</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 30px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><p><br/></p>','2018-07-16 10:31:36',90,1,4,'zzdb'),(11,'学历提升','','我们建筑全行业提供人才信息','<p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">深圳市诚悦信息咨询有限公司</span></strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（68建筑招聘网）可以报名培训考试各阶段学历，已经与全国35所院校达成合作共识，专业为就职者，企业白领，高薪阶级解决学历难问题，通过报名考试培训获取不同等次，不同学校的高学历文凭进行岗位升职，就职应聘，加薪，找工作难等问题，获取的文凭均可到国家学信网网站进行查询，如今万信集团（555招聘网）旗下六家不同地区的公司100多号业务员通过专业的培训均可为每位来报名考试提升学历的客户提供优质的服务，为社会就业人士解决了学历低等问题。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">在21世纪的今天，由于近年高考扩招，越来越多的学生可以进入高校就读，这样全民的文化程度也得到了提高。社会竞争越来越激烈，工作要求越来越高。因此，学历的高低显得特别的重要。没有学历的成人在工作中职称评审、升职、注册类证书报考等方面就会遇到困难。以下先给大家说说学历在工作生活中的重要性！&nbsp;</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（一）找工作</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">由于学历原因，会丧失许多理想的工作机会。当然，高学历并不必然能促成事业成功，许多没有学历的人一样创业很成功，但当今社会通常学历越高工作机会越多，发展速度越快。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（二）工资定级</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">目前，我国国家机关和事业单位基本都是按照学历定工资，本科工资比专科工资高一档次，较规范的企业也是按学历定工资，如在苏州、上海、深圳等地外资企业或国内知名企业上班，上岗工资本科工资比专科工资高500元以上是正常的，而且本科以上的奖金和提升机会都比专科相对多一些。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（三）人事改革</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">许多单位（尤其是国家机关和事业单位）提拔干部、竞选领导基本条件都是本科以上学历，即使自己完全可以胜任，却没有竞选资格，机遇摆在面前却抓不住，如大多专科学校，竞聘中层领导岗位，如系主任，基本上都是要求硕士或博士，本科都没有机会，而且不少单位如学校或法院等会规定一定年限（连一些小学都是如此），在职人员若在规定年限拿不到本科及以上文凭，在人事改革中会直接导致下岗，即专科以下即使找到工作，在以后的工作中可能面临下岗失业的危险。所以，成人不但要有学历，而且要争取拥有高学历。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（四）考证</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">许多国家执业资格证都要求学历，如现在公证员、律师、法官和检察官的司法考试报名条件要求必须是本科以上学历，国家承认均可，考造价师、建造师、监理工程师、安全工程师、药师等对学历具有要求，无学历将无缘取得这些证书。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（五）考公务员</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">公务员工作稳定，待遇较高，压力较小，又有权力，现在许多人都想做公务员，而人事部规定，公务员岗位需要通过公务员考试，现在大多数公务员岗位都要求本科以上才有资格报考。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">（六）职称评定</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">如今各类职称评定几乎都与学历挂钩，中级职称要求具备大专以上学历，在评定高级职称时专科以下基本上没有机会，而现在许多的单位的主管领导几乎都是由高级职称的人担任的，没有高级职称会丧失许多当主管领导的机会，而没有本科，又会丧失评高级职称的机会。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">总之，有个国家承认的高等教育学历在当今社会无疑很重要，平时看似没有用，当需要学历时，再去着手，不仅需要花更多的时间和金钱，重要的是人生的机遇也丧失许多了，所以建议已踏入工作岗位的18周岁以上的成人选择成人高等教育提升自己的学历，为自己赢得更多的机会。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: \"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">21</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">世纪科学技术是第一生产力，世界的竞争归根结底是人才的竞争，让我们努力研习，在条件允许下尽可能的提升自己的学历，为实现个人及中华民族的伟大复兴而努力！</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 30px; color: rgb(68, 68, 68); font-family: \">&nbsp;</p><p><br/></p>','2018-07-16 10:31:36',90,1,4,'xlts'),(12,'项目对接','/Public/img/in_a1_tu4.jpg','我们建筑大行业提供人才资源','<p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">职称</span></strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\"><br/>&nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">职称最初源于职务名称，理论上职称是指专业技术人员的专业技术水平、能力，以及成就的等级称号，是反映专业技术人员的技术水平、工作能力的标志。随着社会发展的需要，逐步产生了对专业技术人员的水平评价与聘任岗位相分离的需要，即“评聘分离”，职称的概念也相应发生了变化。聘任的岗位称之为“专业技术职务”，简称职务；而专业技术人员的水平则以“专业技术职务任职资格”来标识，简称职称。<br/>&nbsp; &nbsp; &nbsp; 就学术而言，它具有学衔的性质；就专业技术水平而言，它具有岗位的性质。专业技术人员拥有何种专业技术职称，表明他具有何种学术水平或从事何种工作岗位，象征着一定的身份。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 20px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">职称级别</span></strong><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\"><br/>&nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">职称分为正高级、副高级、中级、助理级、技术员级5个级别。其中，中等职业学校教师、播音、卫生技术、农业技术、档案、文物博物、图书资料、群众文化、技校教师、经济、会计、统计、审计、工程技术、计划生育、党校教师系列（专业）设5个级别。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">高校教师、新闻、科学研究、出版、教练员、翻译、艺术系列、律师、公证系列（专业）设正高级、副高级、中级、助理级4个级别。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">中小学教师设正高级、副高级、中级、助理级、员级5个级别。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 28px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; text-indent: 32px; background: white;\"><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑, sans-serif; color: rgb(111, 111, 111);\">现职称与国家职业资格证书并轨，对应关系：高级职称相当于国家一级职业资格证，中级职称相当于国家二级职业资格证，初级职称相当于国家三级职业资格证。</span></p><p style=\"margin-top: 0px; margin-bottom: 8px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); border: 0px; line-height: 30px; color: rgb(68, 68, 68); font-family: &quot;Microsoft Yahei&quot;, 微软雅黑, &quot;Hiragino Sans GB&quot;, tahoma, arial, 宋体; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;</p><p><br/></p>','2018-07-16 10:31:22',90,0,4,'xmdj'),(14,'服务项目；la','/Public/Upload/about_img/2018-07-14/2018-07-14_1898730773.jpg','服务羡慕的内容介绍啦','<p>艾丝凡</p>','2018-07-16 10:31:15',90,0,4,'fuwuxm');
/*!40000 ALTER TABLE `hbv5_about` ENABLE KEYS */;

#
# Structure for table "hbv5_ad"
#

DROP TABLE IF EXISTS `hbv5_ad`;
CREATE TABLE `hbv5_ad` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '广告位置ID',
  `ad_link` varchar(255) DEFAULT '' COMMENT '链接地址。',
  `ad_code` text NOT NULL COMMENT '图片地址',
  `show` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示  1=是  2=否',
  `target` tinyint(1) NOT NULL DEFAULT '0' COMMENT '点击打开方式 1== _blank 新窗口打开 2 == _self 在本页打开',
  PRIMARY KEY (`ad_id`),
  KEY `enabled` (`show`),
  KEY `position_id` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='自用 广告管理';

#
# Data for table "hbv5_ad"
#

/*!40000 ALTER TABLE `hbv5_ad` DISABLE KEYS */;
INSERT INTO `hbv5_ad` VALUES (1,1,'javascript:;','/Public/img/banner1.jpg',1,1),(2,1,'javascript:;','/Public/img/banner2.jpg',1,1),(3,2,'javascript:;','/Public/Upload/a_pic/2018-06-22/2018-06-22_1065326441.jpg',1,1);
/*!40000 ALTER TABLE `hbv5_ad` ENABLE KEYS */;

#
# Structure for table "hbv5_admin_nav"
#

DROP TABLE IF EXISTS `hbv5_admin_nav`;
CREATE TABLE `hbv5_admin_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "hbv5_admin_nav"
#

/*!40000 ALTER TABLE `hbv5_admin_nav` DISABLE KEYS */;
INSERT INTO `hbv5_admin_nav` VALUES (1,0,'系统设置','Admin/ShowNav/config','cog',4),(2,1,'菜单管理','Admin/Nav/index','',1),(4,0,'权限控制','Admin/ShowNav/rule','expeditedssl',5),(7,4,'权限管理','Admin/Rule/index','',1),(8,4,'用户组管理','Admin/Rule/group','',2),(9,4,'管理员列表','Admin/Rule/admin_user_list','',3),(45,0,'系统基本参数','javascript:;','',6),(47,45,'Email参数','Admin/System/email','',2),(48,45,'数据库配置','Admin/System/db','',1),(56,0,'专业目录分类','Admin/Major/major_list','',2),(62,0,'资讯','Admin/News/news_list','',3),(63,0,'会员管理','Admin/showUsers/index','',1),(64,63,'会员列表','Admin/Users/Users_list','',NULL),(65,0,'关于我们','Admin/About/About_list','',3),(66,0,'友情链接','Admin/Link/link_list','',3),(67,63,'站内信','Admin/Message/Message_list','',NULL),(70,0,'资质目录分类','Admin/Zizhimenu/Zizhimenu_list','',2),(71,4,'功能开关','Admin/Switch/switch_list','',NULL),(72,0,'广告管理','Admin/Ad/Ad_list','',NULL),(79,0,'全部信息管理','Admin/showMIS/index','',2),(80,79,'挂靠信息','Admin/Recruitment/rt_list','',NULL),(81,79,'资质信息','Admin/Zizhi/zz_list','',NULL),(82,79,'简历库信息','Admin/Jzjlk/jlk_list','',NULL),(83,0,'我的信息管理','Admin/showMyMIS/index','',2),(84,83,'我的挂靠信息','Admin/Recruitment/my_rt_list','',NULL),(85,83,'我的资质信息','Admin/Zizhi/my_zz_list','',NULL),(86,83,'我的简历库信息','Admin/Jzjlk/my_jlk_list','',NULL),(87,83,'发布信息','Admin/Users/publish','',1),(88,45,'网站基本信息','Admin/System/web_info','',NULL),(89,79,'限制关键词发帖管理','Admin/System/gjc_text','',NULL);
/*!40000 ALTER TABLE `hbv5_admin_nav` ENABLE KEYS */;

#
# Structure for table "hbv5_admin_users"
#

DROP TABLE IF EXISTS `hbv5_admin_users`;
CREATE TABLE `hbv5_admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；mb_password加密',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像，相对于upload/avatar目录',
  `email` varchar(100) DEFAULT NULL COMMENT '登录邮箱',
  `email_code` varchar(60) DEFAULT NULL COMMENT '激活码',
  `phone` bigint(11) unsigned DEFAULT NULL COMMENT '手机号',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `register_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` varchar(16) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `last_login_time` int(10) unsigned DEFAULT '0' COMMENT '最后登录时间',
  `person` varchar(20) DEFAULT '' COMMENT '联系人',
  `weixin` varchar(50) DEFAULT '' COMMENT '微信',
  `qq` varchar(15) DEFAULT '',
  `province` smallint(6) DEFAULT '0',
  `city` smallint(6) DEFAULT '0',
  `address` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "hbv5_admin_users"
#

/*!40000 ALTER TABLE `hbv5_admin_users` DISABLE KEYS */;
INSERT INTO `hbv5_admin_users` VALUES (88,'系统自动发送','','/Upload/avatar/user1.jpg','','',NULL,2,1449199996,'',0,'禁止删除此帐号','','',289,290,'1'),(89,'manager','81afb91b9b3cda25','/Public/Upload/a_pic/2018-06-25/2018-06-25_2062353532.png','456@qq.com','',13533333333,1,1449199996,'',0,'manager','','',114,121,'4'),(90,'yongkun','dfc4a0d334f40c2b','/Public/Upload/admin_img/2018-06-13/2018-06-18_1026021695.jpeg','123456@qq.com',NULL,13555555555,1,1528876819,'',0,'yongkun','weixin','123456',40,56,'15'),(94,'may','ee6f254ff06a38a6','','0',NULL,0,2,1525683409,'',0,'may','','',0,0,''),(96,'admin','f53e310927be9899','/Public/Upload/a_pic/2018-05-19/2018-05-18_669567418.jpg','11@qq.com',NULL,13555555555,1,1526718601,'',0,'admin','weixin','123456',124,131,'上海长宁区'),(101,'ordinary','6759f124c8206122','/Public/Upload/admin_img/2018-07-04/2018-07-04_1359478121.jpeg','11@ordinary.com',NULL,13535911111,1,1530670029,'',0,'ordinary','多点','',114,115,'ss');
/*!40000 ALTER TABLE `hbv5_admin_users` ENABLE KEYS */;

#
# Structure for table "hbv5_auth_group"
#

DROP TABLE IF EXISTS `hbv5_auth_group`;
CREATE TABLE `hbv5_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text COMMENT '规则id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户组表';

#
# Data for table "hbv5_auth_group"
#

/*!40000 ALTER TABLE `hbv5_auth_group` DISABLE KEYS */;
INSERT INTO `hbv5_auth_group` VALUES (1,'超级管理员',1,'6,96,20,1,2,3,4,5,64,21,7,8,9,10,11,12,13,14,15,16,123,19,144,145,146,147,239,240,199,200,138,139,140,241,242,243,148,149,151,152,153,159,160,161,162,163,164,219,173,174,175,176,177,178,220,179,180,181,182,183,184,193,194,195,197,198,201,202,203,204,205,206,207,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238'),(9,'管理员',1,'6,96,239,240,138,241,242,243,159,160,161,162,163,164,219,173,174,175,176,177,178,220,179,180,181,182,183,184,201,202,203,204,205,206,207,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238'),(12,'普通成员',1,'6,96,239,240,233,234,235,236,237,238'),(13,'广告管理',1,'6,96,239,240,201,202,203,204,205,206,207'),(14,'资讯管理',1,'6,96,239,240,159,160,161,162,163,164,219'),(15,'关于我们管理',1,'6,96,239,240,173,174,175,176,177,178,220'),(16,'友情链接管理',1,'6,96,239,240,179,180,181,182,183,184');
/*!40000 ALTER TABLE `hbv5_auth_group` ENABLE KEYS */;

#
# Structure for table "hbv5_auth_group_access"
#

DROP TABLE IF EXISTS `hbv5_auth_group_access`;
CREATE TABLE `hbv5_auth_group_access` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `group_id` int(11) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `group_id` (`group_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='用户组明细表';

#
# Data for table "hbv5_auth_group_access"
#

/*!40000 ALTER TABLE `hbv5_auth_group_access` DISABLE KEYS */;
INSERT INTO `hbv5_auth_group_access` VALUES (89,9),(90,1),(92,1),(94,14),(96,1),(100,12),(100,14),(101,12),(101,14);
/*!40000 ALTER TABLE `hbv5_auth_group_access` ENABLE KEYS */;

#
# Structure for table "hbv5_auth_rule"
#

DROP TABLE IF EXISTS `hbv5_auth_rule`;
CREATE TABLE `hbv5_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='规则表';

#
# Data for table "hbv5_auth_rule"
#

/*!40000 ALTER TABLE `hbv5_auth_rule` DISABLE KEYS */;
INSERT INTO `hbv5_auth_rule` VALUES (1,20,'Admin/ShowNav/nav','菜单管理',1,1,''),(2,1,'Admin/Nav/index','菜单列表',1,1,''),(3,1,'Admin/Nav/add','添加菜单',1,1,''),(4,1,'Admin/Nav/edit','修改菜单',1,1,''),(5,1,'Admin/Nav/delete','删除菜单',1,1,''),(6,0,'Admin/Index/index','后台首页',1,1,''),(7,21,'Admin/Rule/index','权限管理',1,1,''),(8,7,'Admin/Rule/add','添加权限',1,1,''),(9,7,'Admin/Rule/edit','修改权限',1,1,''),(10,7,'Admin/Rule/delete','删除权限',1,1,''),(11,21,'Admin/Rule/group','用户组管理',1,1,''),(12,11,'Admin/Rule/add_group','添加用户组',1,1,''),(13,11,'Admin/Rule/edit_group','修改用户组',1,1,''),(14,11,'Admin/Rule/delete_group','删除用户组',1,1,''),(15,11,'Admin/Rule/rule_group','分配权限',1,1,''),(16,11,'Admin/Rule/check_user','添加成员',1,1,''),(19,21,'Admin/Rule/admin_user_list','管理员列表',1,1,''),(20,0,'Admin/ShowNav/config','系统设置',1,1,''),(21,0,'Admin/ShowNav/rule','权限控制',1,1,''),(64,1,'Admin/Nav/order','菜单排序',1,1,''),(96,6,'Admin/Index/information','欢迎界面',1,1,''),(123,11,'Admin/Rule/add_user_to_group','设置为管理员',1,1,''),(138,0,'javascript:;','系统基本参数',1,1,''),(139,138,'Admin/System/email','Email参数',1,1,''),(140,138,'Admin/System/db','数据库配置',1,1,''),(144,19,'Admin/Rule/edit_admin_status','修改登录状态',1,1,''),(145,19,'Admin/Rule/add_admin','添加管理员',1,1,''),(146,19,'Admin/Rule/edit_admin','修改管理员',1,1,''),(147,19,'Admin/Rule/delete_admin','删除管理员用户',1,1,''),(148,0,'Admin/major','专业目录分类',1,1,''),(149,148,'Admin/Major/major_list','专业分类',1,1,''),(151,149,'Admin/Major/add','添加菜单',1,1,''),(152,149,'Admin/Major/edit','修改菜单',1,1,''),(153,149,'Admin/Major/delete','删除菜单',1,1,''),(159,0,'Admin/showNews/index','资讯',1,1,''),(160,159,'Admin/News/news_list','资讯列表',1,1,''),(161,160,'Admin/News/news_add','添加文章',1,1,''),(162,160,'Admin/News/news_edit','编辑文章',1,1,''),(163,160,'Admin/News/delete','删除文章',1,1,''),(164,160,'Admin/News/edit_news_status','修改状态',1,1,''),(173,0,'Admin/showAbout/index','关于我们',1,1,''),(174,173,'Admin/About/About_list','文章列表',1,1,''),(175,174,'Admin/About/About_add','添加文章',1,1,''),(176,174,'Admin/About/About_edit','编辑文章',1,1,''),(177,174,'Admin/About/delete','删除文章',1,1,''),(178,174,'Admin/About/edit_about_status','修改状态',1,1,''),(179,0,'Admin/showLink/index','友情链接',1,1,''),(180,179,'Admin/Link/link_list','链接列表',1,1,''),(181,180,'Admin/Link/Link_add','添加链接',1,1,''),(182,180,'Admin/Link/Link_edit','修改链接',1,1,''),(183,180,'Admin/Link/delete','删除链接',1,1,''),(184,180,'Admin/Link/order','链接排序',1,1,''),(193,0,'Admin/showZizhimenu/index','资质目录分类',1,1,''),(194,193,'Admin/Zizhimenu/Zizhimenu_list','资质分类',1,1,''),(195,194,'Admin/Zizhimenu/add','添加菜单',1,1,''),(197,194,'Admin/Zizhimenu/edit','修改菜单',1,1,''),(198,194,'Admin/Zizhimenu/delete','删除菜单',1,1,''),(199,21,'Admin/Switch/switch_list','功能开关',1,1,''),(200,199,'Admin/Switch/edit','修改',1,1,''),(201,0,'Admin/showAd/index','广告管理',1,1,''),(202,201,'Admin/Ad/Ad_list','广告列表',1,1,''),(203,202,'Admin/Ad/Ad_add','添加广告',1,1,''),(204,202,'Admin/Ad/Ad_edit','编辑广告',1,1,''),(205,202,'Admin/Ad/delete','删除',1,1,''),(206,202,'Admin/Ad/edit_Ad_status','修改状态',1,1,''),(207,202,'Admin/Ad/add_img','添加图片',1,1,''),(208,167,'Admin/Users/users_yyzz_edit','营业执照审核',1,1,''),(209,167,'Admin/Users/users_yzzj_edit','优质中介审核',1,1,''),(219,160,'Admin/News/preview','预览文章',1,1,''),(220,174,'Admin/About/preview','预览文章',1,1,''),(221,0,'Admin/showMIS/index','全部信息管理',1,1,''),(222,221,'Admin/Recruitment/rt_list','挂靠信息',1,1,''),(223,222,'Admin/Recruitment/edit_rt_status','审核',1,1,''),(224,222,'Admin/Recruitment/preview','预览',1,1,''),(225,222,'Admin/Recruitment/delete','删除',1,1,''),(226,221,'Admin/Zizhi/zz_list','资质信息',1,1,''),(227,226,'Admin/Zizhi/preview','预览',1,1,''),(228,226,'Admin/Zizhi/delete','删除',1,1,''),(229,221,'Admin/Jzjlk/jlk_list','简历库信息',1,1,''),(230,229,'Admin/Jzjlk/edit_jlk_status','审核',1,1,''),(231,229,'Admin/Jzjlk/preview','预览',1,1,''),(232,229,'Admin/Jzjlk/delete','删除',1,1,''),(233,0,'Admin/showMyMIS/index','我的信息管理',1,1,''),(234,233,'Admin/Recruitment/my_rt_list','我的挂靠信息',1,1,''),(235,233,'Admin/Zizhi/my_zz_list','我的资质信息',1,1,''),(236,233,'Admin/Jzjlk/my_jlk_list','我的简历库信息',1,1,''),(237,233,'Admin/Users/publish','发布信息',1,1,''),(238,233,'Admin/Users/publish_edit','编辑发布的信息',1,1,''),(239,19,'Admin/Rule/userinfo','个人资料修改',1,1,''),(240,19,'Admin/Rule/pwd','修改密码',1,1,''),(241,138,'Admin/System/web_info','网站基本信息',1,1,''),(242,241,'Admin/System/store_logo','网站LOGO修改',1,1,''),(243,138,'Admin/System/gjc_text','限制关键词发帖管理',1,1,'');
/*!40000 ALTER TABLE `hbv5_auth_rule` ENABLE KEYS */;

#
# Structure for table "hbv5_config"
#

DROP TABLE IF EXISTS `hbv5_config`;
CREATE TABLE `hbv5_config` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) DEFAULT NULL COMMENT '配置的key键名',
  `value` text COMMENT '配置的val值',
  `inc_type` varchar(64) DEFAULT NULL COMMENT '配置分组',
  `desc` varchar(50) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`),
  KEY `inc_type` (`inc_type`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "hbv5_config"
#

/*!40000 ALTER TABLE `hbv5_config` DISABLE KEYS */;
INSERT INTO `hbv5_config` VALUES (1,'site_url','http://www..cn','web_info',NULL),(2,'record_no','粤12345678号-2','web_info',NULL),(3,'store_name','阿里爸爸','web_info',NULL),(4,'store_logo','/Public/Upload/logo/2018-06-22/2018-06-22_736745086.png','web_info',NULL),(5,'store_title','资质代办|一级建造师招聘|二级建造师招聘网','web_info',NULL),(6,'store_desc','国内专业权威的证书招聘平台,专业服务于建筑招聘人才招聘,建筑资质代办,建造师招聘,建筑招聘综合信息平台.找资质代办,建造师招聘网及招聘价格信息','web_info',NULL),(7,'store_keyword','招聘网,一级建造师招聘,二级建造师招聘,建造师招聘，资质代办,建筑资质代办,人才招聘，证书招聘','web_info',NULL),(8,'contact','','web_info',NULL),(9,'phone','123456789','web_info',NULL),(10,'address','南山区西丽镇留仙大道1001号','web_info',NULL),(11,'qq','123456789','web_info',NULL),(12,'qq2','123456789','web_info',NULL),(13,'qq3','123456789','web_info',NULL),(14,'service_phone','service_phone','web_info',NULL),(15,'service_qq','service_qq','web_info',NULL),(16,'service_call','service_call','web_info',NULL),(17,'top_qq_group','top_qq_group','web_info',NULL),(18,'top_qq','top_qq','web_info',NULL),(19,'mobile','123456789','web_info',NULL),(20,'province','28240','web_info',NULL),(21,'city','28558','web_info',NULL),(22,'district','28571','web_info',NULL),(23,'style_js','&lt;script&gt;\nlayui.use([\'layer\', \'form\'], function(){\n  var layer = layui.layer\n  ,form = layui.form;\n// layer.msg(\'Hello World\');\n});\n&lt;/script&gt;','web_info',NULL),(24,'form_submit','ok','web_info',NULL),(25,'store_user_logo','','web_info',NULL),(26,'smtp_server','smtp.qq.com','smtp',NULL),(27,'smtp_port','25','smtp',NULL),(28,'smtp_user','123456@qq.com','smtp',NULL),(29,'smtp_pwd','123456','smtp',NULL),(30,'regis_smtp_enable','0','smtp',NULL),(31,'test_eamil','123456@qq.com','smtp',NULL),(32,'inc_type','smtp','smtp',NULL),(33,'file','','web_info',NULL),(34,'gjc_text','www.wf88881.com|www.wf7000.com|www.wf6000.com|wf88881.com|wf7000.com|wf6000.com|17095891111|18987938555|170-9589-1111|18187909333|缅甸万丰国际|小勐拉皇家国际|小勐拉|皇家国际|万丰老百胜娱乐|万丰老百胜|老百胜官网|皇家国际娱乐会所|娱乐会所|万丰国际|缅甸皇家开户|游戏网址|香港抽血验性|性别鉴定|香港蓓婴医疗|蓓婴医疗|香港现代医学专科|验血查男女|香港验血|贷款|裸贷|yongkun|挂靠|gk|爆破|bp|性服务|新建户|发帖|精华帖|嫖娼|招嫖|赌博|办假证|嫖赌|找小姐|嫖|办理学信网|运毒|吸毒|贩毒|毒品|瘾君子|真实毕业证|waz16898|新科教育培训中心|招自考成人毕业证|208133368|办毕业证|统招教育|32165749|自学考试证书|66287891|82681726|投资基金|借贷信息|北京科技公司|融资租赁|金融服务|证券投资|私募基金|投资顾问|基金公司|金融公司|投资公司|基金管理|金融信息|保险经纪|资本控股|中企祥和|股权投资|注册资本|注册公司|中元信达|代办真实|出生证明|教育机构|医学证明|全套档案|医院内部|郭海龙|国家局核名|商业保理|额贷公司|投资担保|雨正企业|雨正咨询|文化传媒公司|霍尔果斯|办理资金|办证|企业商标|投资管理|项目投资|租赁公司|投资控股|拍卖公司|控股公司|医疗器械|资产管理|注销代办|两把刷子|中盈网互联网|假证|车辆异地违章代办|空壳公司|资金流水|公关|包装|炸药|真枪|弹药|军火|武器|枪支|军火|办理真实成人毕业证|办理真实本科毕业证|学院毕业证|82215739|网络教育证书|统招教育证书|成人教育证书|205762226|赤峰学院的毕业证|大学自考毕业证|毕业|学院学位证|学位证|畢业|文凭档案|学院文凭|代注册办理|代办|毕業|畢業|职业学院|私网包杀|万丰娱乐城|维加斯|娱乐公司','web_info',NULL),(36,'color_subject','FF4DD5','color',''),(37,'color_ny_hover_on','C93DA8','color',''),(39,'color_switch','off','color',''),(43,'beian_recordQuery','','web_info',NULL),(44,'beian_recordQuery_number','','web_info',NULL);
/*!40000 ALTER TABLE `hbv5_config` ENABLE KEYS */;

#
# Structure for table "hbv5_diqu"
#

DROP TABLE IF EXISTS `hbv5_diqu`;
CREATE TABLE `hbv5_diqu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(3) NOT NULL DEFAULT '0',
  `city` varchar(20) NOT NULL DEFAULT '',
  `Ishot` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IX_zm_diqu` (`parentid`),
  KEY `IX_zm_diqu_1` (`city`)
) ENGINE=MyISAM AUTO_INCREMENT=486 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "hbv5_diqu"
#

/*!40000 ALTER TABLE `hbv5_diqu` DISABLE KEYS */;
INSERT INTO `hbv5_diqu` VALUES (1,0,'北京',1),(2,1,'东城区',0),(3,1,'西城区',0),(4,1,'崇文区',0),(5,1,'宣武区',0),(6,1,'朝阳区',0),(7,1,'丰台区',0),(8,1,'石景山区',0),(9,1,'海淀区',0),(10,1,'门头沟区',0),(11,1,'房山区',0),(12,1,'通州区',0),(13,1,'顺义区',0),(14,1,'昌平区',0),(15,1,'大兴区',0),(16,1,'怀柔区',0),(17,1,'平谷区',0),(18,1,'密云县',0),(19,1,'延庆县',0),(20,0,'上海',1),(21,20,'黄浦区',0),(22,20,'卢湾区',0),(23,20,'徐汇区',0),(24,20,'长宁区',0),(25,20,'静安区',0),(26,20,'普陀区',0),(27,20,'闸北区',0),(28,20,'虹口区',0),(29,20,'杨浦区',0),(30,20,'闵行区',0),(31,20,'宝山区',0),(32,20,'嘉定区',0),(33,20,'浦东新区',0),(34,20,'金山区',0),(35,20,'松江区',0),(36,20,'青浦区',0),(37,20,'南汇区',0),(38,20,'奉贤区',0),(39,20,'崇明县',0),(40,0,'天津',1),(41,40,'和平区',0),(42,40,'河东区',0),(43,40,'河西区',0),(44,40,'南开区',0),(45,40,'河北区',0),(46,40,'红桥区',0),(47,40,'塘沽区',0),(48,40,'汉沽区',0),(49,40,'大港区',0),(50,40,'东丽区',0),(51,40,'西青区',0),(52,40,'津南区',0),(53,40,'北辰区',0),(54,40,'武清区',0),(55,40,'宝坻区',0),(56,40,'宁河县',0),(57,40,'静海县',0),(58,40,'蓟县',0),(59,0,'重庆',1),(60,59,'万州区',0),(61,59,'涪陵区',0),(62,59,'渝中区',0),(63,59,'大渡口区',0),(64,59,'江北区',0),(65,59,'沙坪坝区',0),(66,59,'九龙坡区',0),(67,59,'南岸区',0),(68,59,'北碚区',0),(69,59,'万盛区',0),(70,59,'双桥区',0),(71,59,'渝北区',0),(72,59,'巴南区',0),(73,59,'黔江区',0),(74,59,'长寿区',0),(75,59,'江津区',0),(76,59,'合川区',0),(77,59,'永川区',0),(78,59,'南川区',0),(79,59,'綦江县',0),(80,59,'潼南县',0),(81,59,'铜梁县',0),(82,59,'大足县',0),(83,59,'荣昌县',0),(84,59,'璧山县',0),(85,59,'梁平县',0),(86,59,'城口县',0),(87,59,'丰都县',0),(88,59,'垫江县',0),(89,59,'武隆县',0),(90,59,'忠县',0),(91,59,'开县',0),(92,59,'云阳县',0),(93,59,'奉节县',0),(94,59,'巫山县',0),(95,59,'巫溪县',0),(96,59,'石柱土家族自治县',0),(97,59,'秀山土家族苗族自治县',0),(98,59,'酉阳土家族苗族自治县',0),(99,59,'彭水苗族土家族自治县',0),(100,0,'黑龙江',0),(101,100,'哈尔滨',1),(102,100,'齐齐哈尔',0),(103,100,'鸡西',0),(104,100,'鹤岗',0),(105,100,'双鸭山',0),(106,100,'大庆',0),(107,100,'伊春',0),(108,100,'佳木斯',0),(109,100,'七台河',0),(110,100,'牡丹江',0),(111,100,'黑河',0),(112,100,'绥化',0),(113,100,'大兴安岭地区',0),(114,0,'吉林',1),(115,114,'长春',1),(116,114,'吉林',0),(117,114,'四平',0),(118,114,'辽源',0),(119,114,'通化',0),(120,114,'白山',0),(121,114,'松原',0),(122,114,'白城',0),(123,114,'延边朝鲜族自治州',0),(124,0,'辽宁',0),(125,124,'沈阳',0),(126,124,'大连',1),(127,124,'鞍山',0),(128,124,'抚顺',0),(129,124,'本溪',0),(130,124,'丹东',0),(131,124,'锦州',0),(132,124,'营口',0),(133,124,'阜新',0),(134,124,'辽阳',0),(135,124,'盘锦',0),(136,124,'铁岭',0),(137,124,'朝阳',0),(138,124,'葫芦岛',0),(139,0,'山东',0),(140,139,'济南',1),(141,139,'青岛',0),(142,139,'淄博',0),(143,139,'枣庄',0),(144,139,'东营',0),(145,139,'烟台',0),(146,139,'潍坊',0),(147,139,'济宁',0),(148,139,'泰安',0),(149,139,'威海',0),(150,139,'日照',0),(151,139,'莱芜',0),(152,139,'临沂',0),(153,139,'德州',0),(154,139,'聊城',0),(155,139,'滨州',0),(156,139,'菏泽',0),(157,0,'山西',0),(158,157,'太原',0),(159,157,'大同',0),(160,157,'阳泉',0),(161,157,'长治',0),(162,157,'晋城',0),(163,157,'朔州',0),(164,157,'晋中',0),(165,157,'运城',0),(166,157,'忻州',0),(167,157,'临汾',0),(168,157,'吕梁',0),(169,0,'陕西',0),(170,169,'西安',1),(171,169,'铜川',0),(172,169,'宝鸡',0),(173,169,'咸阳',0),(174,169,'渭南',0),(175,169,'延安',0),(176,169,'汉中',0),(177,169,'榆林',0),(178,169,'安康',0),(179,169,'商洛',0),(180,0,'河北',0),(181,180,'石家庄',0),(182,180,'唐山',0),(183,180,'秦皇岛',0),(184,180,'邯郸',0),(185,180,'邢台',0),(186,180,'保定',0),(187,180,'张家口',0),(188,180,'承德',0),(189,180,'沧州',0),(190,180,'廊坊',0),(191,180,'衡水',0),(192,0,'河南',0),(193,192,'郑州',0),(194,192,'开封',0),(195,192,'洛阳',0),(196,192,'平顶山',0),(197,192,'安阳',0),(198,192,'鹤壁',0),(199,192,'新乡',0),(200,192,'焦作',0),(201,192,'济源',0),(202,192,'濮阳',0),(203,192,'许昌',0),(204,192,'漯河',0),(205,192,'三门峡',0),(206,192,'南阳',0),(207,192,'商丘',0),(208,192,'信阳',0),(209,192,'周口',0),(210,192,'驻马店',0),(211,0,'湖北',0),(212,211,'武汉',1),(213,211,'黄石',0),(214,211,'十堰',0),(215,211,'宜昌',0),(216,211,'襄樊',0),(217,211,'鄂州',0),(218,211,'荆门',0),(219,211,'孝感',0),(220,211,'荆州',0),(221,211,'黄冈',0),(222,211,'咸宁',0),(223,211,'随州',0),(224,211,'恩施土家族苗族自治州',0),(225,211,'仙桃',0),(226,211,'潜江',0),(227,211,'天门',0),(228,211,'神农架林区',0),(229,0,'湖南',0),(230,229,'长沙',1),(231,229,'株洲',0),(232,229,'湘潭',0),(233,229,'衡阳',0),(234,229,'邵阳',0),(235,229,'岳阳',0),(236,229,'常德',0),(237,229,'张家界',0),(238,229,'益阳',0),(239,229,'郴州',0),(240,229,'永州',0),(241,229,'怀化',0),(242,229,'娄底',0),(243,229,'湘西土家族苗族自治州',0),(244,0,'海南',0),(245,244,'海口',0),(246,244,'三亚',0),(247,244,'五指山',0),(248,244,'琼海',0),(249,244,'儋州',0),(250,244,'文昌',0),(251,244,'万宁',0),(252,244,'东方',0),(253,244,'定安县',0),(254,244,'屯昌县',0),(255,244,'澄迈县',0),(256,244,'临高县',0),(257,244,'白沙黎族自治县',0),(258,244,'昌江黎族自治县',0),(259,244,'乐东黎族自治县',0),(260,244,'陵水黎族自治县',0),(261,244,'保亭黎族苗族自治县',0),(262,244,'琼中黎族苗族自治县',0),(263,0,'江苏',0),(264,263,'南京',0),(265,263,'无锡',0),(266,263,'徐州',0),(267,263,'常州',0),(268,263,'苏州',0),(269,263,'南通',0),(270,263,'连云港',0),(271,263,'淮安',0),(272,263,'盐城',0),(273,263,'扬州',0),(274,263,'镇江',0),(275,263,'泰州',0),(276,263,'宿迁',0),(277,0,'江西',0),(278,277,'南昌',1),(279,277,'景德镇',0),(280,277,'萍乡',0),(281,277,'九江',0),(282,277,'新余',0),(283,277,'鹰潭',0),(284,277,'赣州',0),(285,277,'吉安',0),(286,277,'宜春',0),(287,277,'抚州',0),(288,277,'上饶',0),(289,0,'广东',0),(290,289,'广州',1),(291,289,'韶关',0),(292,289,'深圳',1),(293,289,'珠海',0),(294,289,'汕头',0),(295,289,'佛山',0),(296,289,'江门',0),(297,289,'湛江',0),(298,289,'茂名',0),(299,289,'肇庆',0),(300,289,'惠州',0),(301,289,'梅州',0),(302,289,'汕尾',0),(303,289,'河源',0),(304,289,'阳江',0),(305,289,'清远',0),(306,289,'东莞',0),(307,289,'中山',0),(308,289,'潮州',0),(309,289,'揭阳',0),(310,289,'云浮',0),(311,0,'广西',0),(312,311,'南宁',0),(313,311,'柳州',0),(314,311,'桂林',0),(315,311,'梧州',0),(316,311,'北海',0),(317,311,'防城港',0),(318,311,'钦州',0),(319,311,'贵港',0),(320,311,'玉林',0),(321,311,'百色',0),(322,311,'贺州',0),(323,311,'河池',0),(324,311,'来宾',0),(325,311,'崇左',0),(326,0,'云南',0),(327,326,'昆明',1),(328,326,'曲靖',0),(329,326,'玉溪',0),(330,326,'保山',0),(331,326,'昭通',0),(332,326,'丽江',0),(333,326,'思茅',0),(334,326,'临沧',0),(335,326,'楚雄彝族自治州',0),(336,326,'红河哈尼族彝族自治州',0),(337,326,'文山壮族苗族自治州',0),(338,326,'西双版纳傣族自治州',0),(339,326,'大理白族自治州',0),(340,326,'德宏傣族景颇族自治州',0),(341,326,'怒江傈僳族自治州',0),(342,326,'迪庆藏族自治州',0),(343,0,'贵州',0),(344,343,'贵阳',0),(345,343,'六盘水',0),(346,343,'遵义',0),(347,343,'安顺',0),(348,343,'铜仁地区',0),(349,343,'黔西南布依族苗族自治州',0),(350,343,'毕节地区',0),(351,343,'黔东南苗族侗族自治州',0),(352,343,'黔南布依族苗族自治州',0),(353,0,'四川',0),(354,353,'成都',1),(355,353,'自贡',0),(356,353,'攀枝花',0),(357,353,'泸州',0),(358,353,'德阳',0),(359,353,'绵阳',0),(360,353,'广元',0),(361,353,'遂宁',0),(362,353,'内江',0),(363,353,'乐山',0),(364,353,'南充',0),(365,353,'眉山',0),(366,353,'宜宾',0),(367,353,'广安',0),(368,353,'达州',0),(369,353,'雅安',0),(370,353,'巴中',0),(371,353,'资阳',0),(372,353,'阿坝藏族羌族自治州',0),(373,353,'甘孜藏族自治州',0),(374,353,'凉山彝族自治州',0),(375,0,'内蒙古',0),(376,375,'呼和浩特',0),(377,375,'包头',0),(378,375,'乌海',0),(379,375,'赤峰',0),(380,375,'通辽',0),(381,375,'鄂尔多斯',0),(382,375,'呼伦贝尔',0),(383,375,'巴彦淖尔',0),(384,375,'乌兰察布',0),(385,375,'兴安盟',0),(386,375,'锡林郭勒盟',0),(387,375,'阿拉善盟',0),(388,0,'宁夏',0),(389,388,'银川',0),(390,388,'石嘴山',0),(391,388,'吴忠',0),(392,388,'固原',0),(393,388,'中卫',0),(394,0,'甘肃',0),(396,394,'兰州',0),(397,394,'嘉峪关',0),(398,394,'金昌',0),(399,394,'白银',0),(400,394,'天水',0),(401,394,'武威',0),(402,394,'张掖',0),(403,394,'平凉',0),(404,394,'酒泉',0),(405,394,'庆阳',0),(406,394,'定西',0),(407,394,'陇南',0),(408,394,'临夏回族自治州',0),(409,394,'甘南藏族自治州',0),(410,0,'青海',0),(411,410,'西宁',0),(412,410,'海东地区',0),(413,410,'海北藏族自治州',0),(414,410,'黄南藏族自治州',0),(415,410,'海南藏族自治州',0),(416,410,'果洛藏族自治州',0),(417,410,'玉树藏族自治州',0),(418,410,'海西蒙古族藏族自治州',0),(419,0,'西藏',0),(420,419,'拉萨',0),(421,419,'昌都地区',0),(422,419,'山南地区',0),(423,419,'日喀则地区',0),(424,419,'那曲地区',0),(425,419,'阿里地区',0),(426,419,'林芝地区',0),(427,0,'新疆',0),(428,427,'乌鲁木齐',0),(429,427,'克拉玛依',0),(430,427,'吐鲁番地区',0),(431,427,'哈密地区',0),(432,427,'昌吉回族自治州',0),(433,427,'博尔塔拉蒙古自治州',0),(434,427,'巴音郭楞蒙古自治州',0),(435,427,'阿克苏地区',0),(436,427,'克孜勒苏柯尔克孜自治州',0),(437,427,'喀什地区',0),(438,427,'和田地区',0),(439,427,'伊犁哈萨克自治州',0),(440,427,'塔城地区',0),(441,427,'阿勒泰地区',0),(442,427,'石河子',0),(443,427,'阿拉尔',0),(444,427,'图木舒克',0),(445,427,'五家渠',0),(446,0,'安徽',0),(447,446,'合肥',0),(448,446,'芜湖',0),(449,446,'蚌埠',0),(450,446,'淮南',0),(451,446,'马鞍山',0),(452,446,'淮北',0),(453,446,'铜陵',0),(454,446,'安庆',0),(455,446,'黄山',0),(456,446,'滁州',0),(457,446,'阜阳',0),(458,446,'宿州',0),(459,446,'巢湖',0),(460,446,'六安',0),(461,446,'亳州',0),(462,446,'池州',0),(463,446,'宣城',0),(464,0,'浙江',0),(465,464,'杭州',0),(466,464,'宁波',0),(467,464,'温州',0),(468,464,'嘉兴',0),(469,464,'湖州',0),(470,464,'绍兴',0),(471,464,'金华',0),(472,464,'衢州',0),(473,464,'舟山',0),(474,464,'台州',0),(475,464,'丽水',0),(476,0,'福建',0),(477,476,'福州',0),(478,476,'厦门',1),(479,476,'莆田',0),(480,476,'三明',0),(481,476,'泉州',0),(482,476,'漳州',0),(483,476,'南平',0),(484,476,'龙岩',0),(485,476,'宁德',0);
/*!40000 ALTER TABLE `hbv5_diqu` ENABLE KEYS */;

#
# Structure for table "hbv5_index_menu"
#

DROP TABLE IF EXISTS `hbv5_index_menu`;
CREATE TABLE `hbv5_index_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` int(3) NOT NULL DEFAULT '0',
  `pic` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT NULL,
  `show` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "hbv5_index_menu"
#

/*!40000 ALTER TABLE `hbv5_index_menu` DISABLE KEYS */;
INSERT INTO `hbv5_index_menu` VALUES (1,3,'/Public/img/news_tu1.jpg','javascript:;',1),(2,4,'/Public/img/news_tu2.jpg','javascript:;',1),(3,2,'/Public/img/news_tu3.jpg','javascript:;',1),(4,5,'/Public/img/news_tu4.jpg','javascript:;',1);
/*!40000 ALTER TABLE `hbv5_index_menu` ENABLE KEYS */;

#
# Structure for table "hbv5_jzjlk"
#

DROP TABLE IF EXISTS `hbv5_jzjlk`;
CREATE TABLE `hbv5_jzjlk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户 ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '信息类型',
  `examine` tinyint(1) NOT NULL DEFAULT '1' COMMENT '审核情况。1==通过 0==审核中',
  `classid` smallint(6) NOT NULL DEFAULT '0' COMMENT '专业分类',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '专业子分类',
  `content` text NOT NULL COMMENT '内容详情',
  `regtype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '注册情况（初始注册、转注册、两者均可）',
  `cerstatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '证书状态',
  `price` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格范围',
  `period` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格范围年限',
  `purpose` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用途（挂资质、挂项目）',
  `academic_title` smallint(3) NOT NULL DEFAULT '0' COMMENT '职称要求',
  `specialty` smallint(6) NOT NULL DEFAULT '0' COMMENT '职称的分类',
  `experience` tinyint(1) NOT NULL DEFAULT '0' COMMENT '工作年限',
  `degree` tinyint(1) NOT NULL DEFAULT '0' COMMENT '学历',
  `province` int(5) NOT NULL DEFAULT '0' COMMENT '省份',
  `city` int(6) NOT NULL DEFAULT '0' COMMENT '城市',
  `sprovince` int(5) NOT NULL DEFAULT '0' COMMENT '社保 省份',
  `scity` int(6) NOT NULL DEFAULT '0' COMMENT '社保 城市',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `phone` varchar(15) DEFAULT '' COMMENT '简历手机号码',
  `email` varchar(60) DEFAULT '' COMMENT '邮箱',
  `person` varchar(20) DEFAULT '' COMMENT '联系人名称',
  `qq` varchar(20) DEFAULT '' COMMENT 'QQ',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否内部员工上传 状态 1=是，0=否',
  `browser` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `zssy` tinyint(3) NOT NULL DEFAULT '0' COMMENT '证书适用',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 保密 1 男 2 女',
  `birthday` varchar(20) DEFAULT NULL COMMENT '生日',
  `show` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否展示。0=展示  1=否',
  `post_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '发信息所在的ip',
  PRIMARY KEY (`id`),
  KEY `addtime` (`addtime`),
  KEY `type` (`type`,`province`,`city`,`show`),
  KEY `type_2` (`type`,`show`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`,`classid`,`cid`,`province`,`city`),
  KEY `user_id_3` (`user_id`,`province`,`city`),
  KEY `查专业类型和省份` (`type`,`classid`,`cid`,`province`,`city`,`show`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='兼职简历库';

#
# Data for table "hbv5_jzjlk"
#

/*!40000 ALTER TABLE `hbv5_jzjlk` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_jzjlk` ENABLE KEYS */;

#
# Structure for table "hbv5_link"
#

DROP TABLE IF EXISTS `hbv5_link`;
CREATE TABLE `hbv5_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT '',
  `links` varchar(255) DEFAULT '',
  `showorder` smallint(6) NOT NULL DEFAULT '0',
  `pic` varchar(250) DEFAULT '',
  `target` tinyint(3) NOT NULL DEFAULT '0' COMMENT '点击打开方式 1== _blank 新窗口打开 2 == _self 在本页打开',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='有情链接';

#
# Data for table "hbv5_link"
#

/*!40000 ALTER TABLE `hbv5_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_link` ENABLE KEYS */;

#
# Structure for table "hbv5_major"
#

DROP TABLE IF EXISTS `hbv5_major`;
CREATE TABLE `hbv5_major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `showorder` int(11) DEFAULT '0',
  `parentid` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `titles` varchar(250) DEFAULT '',
  `keywords` varchar(250) DEFAULT '',
  `description` text,
  `content` text,
  `isdanye` int(11) DEFAULT '0',
  `lienum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='专业分类';

#
# Data for table "hbv5_major"
#

/*!40000 ALTER TABLE `hbv5_major` DISABLE KEYS */;
INSERT INTO `hbv5_major` VALUES (1,'一级建造师',1,0,1,'','','',NULL,-1,1),(2,'二级建造师',2,0,1,'','','',NULL,-1,2),(3,'建筑师',8,0,1,'','','',NULL,-1,3),(4,'咨询师',9,0,1,'','','',NULL,-1,4),(5,'中级职称',4,0,1,'','','',NULL,-1,5),(6,'监理师',10,0,1,'','','',NULL,-1,1),(7,'结构师',7,0,1,'','','',NULL,-1,3),(8,'造价师',11,0,1,'','','',NULL,-1,2),(9,'电气工程师',12,0,1,'','','',NULL,-1,2),(10,'土木工程师',13,0,1,'','','',NULL,-1,2),(11,'公用设备工程师',14,0,1,'','','',NULL,-1,2),(12,'资质办理与升级',15,888,1,'','','',NULL,-1,1),(13,'其它',16,0,1,'','','',NULL,-1,3),(16,'通信与广电',6,1,2,'','','',NULL,-1,1),(17,'矿业工程',7,1,2,'','','','',-1,1),(18,'港口与航道',9,1,2,'','','','',-1,1),(19,'建筑工程',1,1,2,'','','',NULL,-1,1),(20,'机电工程',2,1,2,'','','',NULL,-1,1),(21,'市政公用',4,1,2,'','','',NULL,-1,1),(22,'公路工程',3,1,2,'','','',NULL,-1,1),(23,'铁路工程',8,1,2,'','','',NULL,-1,1),(24,'水利水电',5,1,2,'','','',NULL,-1,1),(25,'建筑工程',1,2,2,'','','',NULL,-1,2),(26,'机电工程',1,2,2,'','','',NULL,-1,2),(27,'水利水电工程',1,2,2,'','','',NULL,-1,2),(28,'市政公用工程',1,2,2,'','','',NULL,-1,2),(29,'矿业工程',1,2,2,'','','',NULL,-1,2),(30,'公路工程',1,2,2,'','','',NULL,-1,2),(31,'一级建筑师',1,3,2,'','','',NULL,-1,3),(32,'二级建筑师',1,3,2,'','','',NULL,-1,3),(33,'环境工程和生态建设',1,4,2,'','','',NULL,0,4),(34,'市政公用工程/给排水',1,4,2,'','','',NULL,-1,4),(35,'其他',10,4,2,'','','',NULL,-1,4),(36,'工民建',1,5,2,'','','',NULL,-1,5),(37,'给排水',1,5,2,'','','',NULL,-1,5),(38,'园林绿化/风景园林',1,5,2,'','','',NULL,-1,5),(39,'建筑/建筑施工',1,5,2,'','','',NULL,-1,5),(40,'水利水电/化工',1,5,2,'','','',NULL,-1,5),(41,'暖通/暖通空调/热处理',1,5,2,'','','',NULL,-1,5),(42,'其他',20,5,2,'','','',NULL,-1,5),(43,'建设部',1,6,2,'','','',NULL,-1,1),(44,'水利部',1,6,2,'','','',NULL,-1,1),(45,'交通部',1,6,2,'','','',NULL,-1,1),(46,'一级结构师',1,7,2,'','','',NULL,-1,2),(47,'二级结构师',1,7,2,'','','',NULL,-1,2),(48,'建设部',1,8,2,'','','',NULL,-1,2),(49,'水利部',1,8,2,'','','',NULL,-1,2),(50,'交通部',1,8,2,'','','',NULL,-1,2),(51,'供配电',1,9,2,'','','',NULL,-1,3),(52,'发输变电',1,9,2,'','','',NULL,-1,3),(53,'港口航道',1,10,2,'','','',NULL,-1,3),(54,'注册岩土工程师',1,10,2,'','','',NULL,-1,3),(55,'给水排水',1,11,2,'','','',NULL,-1,3),(56,'动力',1,11,2,'','','',NULL,-1,3),(57,'暖通空调',1,11,2,'','','',NULL,-1,3),(58,'施工劳务分包资质',1,12,2,'','','',NULL,-1,4),(59,'园林绿化资质',1,12,2,'','','',NULL,-1,4),(60,'其他资质',10,12,2,'','','',NULL,-1,4),(61,'城市规划师',1,13,2,'','','',NULL,-1,4),(62,'环评师',1,13,2,'','','',NULL,-1,4),(64,'化工工程师',1,13,2,'','','',NULL,0,4),(65,'其他',10,13,2,'','','',NULL,-1,4),(72,'水利水电',1,10,2,'','','',NULL,-1,3),(73,'公路/铁路/民航',1,4,2,'','','',NULL,-1,4),(74,'城市轨道交通',1,4,2,'','','',NULL,0,4),(75,'水电/核电/火电',1,4,2,'','','',NULL,-1,4),(76,'煤炭/石化',1,4,2,'','','',NULL,0,4),(77,'石油天然气',1,4,2,'','','',NULL,0,4),(78,'化工/医药',1,4,2,'','','',NULL,0,4),(79,'建筑/建筑材料',1,4,2,'','','',NULL,-1,4),(80,'机械/电子',1,4,2,'','','',NULL,-1,4),(81,'轻工/纺织/化纤',1,4,2,'','','',NULL,0,4),(82,'钢铁/有色冶金',1,4,2,'','','',NULL,0,4),(83,'农业/林业',1,4,2,'','','',NULL,0,4),(84,'通信/广播电影电视',1,4,2,'','','',NULL,0,4),(85,'地质/测量/岩土工程',1,4,2,'','','',NULL,0,4),(86,'港口河海工程',1,4,2,'','','',NULL,0,4),(87,'城市规划',1,4,2,'','','',NULL,0,4),(88,'综合经济',1,4,2,'','','',NULL,-1,4),(89,'房地产估价师',1,13,2,'','','',NULL,-1,4),(90,'注册税务师',1,13,2,'','','',NULL,-1,4),(91,'注册会计师',1,13,2,'','','',NULL,0,4),(92,'环保工程师',1,13,2,'','','',NULL,-1,4),(93,'土地估价师',1,13,2,'','','',NULL,-1,4),(94,'安全评价师',1,13,2,'','','',NULL,-1,4),(96,'设备监理师',1,13,2,'','','',NULL,0,4),(97,'资产评估师',1,13,2,'','','',NULL,-1,4),(98,'物业管理师',1,13,2,'','','',NULL,-1,4),(99,'质量工程师',1,13,2,'','','',NULL,0,4),(101,'概预算工程师',1,13,2,'','','',NULL,0,4),(102,'招标师',1,13,2,'','','',NULL,-1,4),(103,'施工专业承包资质',1,12,2,'','','',NULL,-1,4),(104,'施工总承包资质',1,12,2,'','','',NULL,-1,4),(105,'设计施工一体化',1,12,2,'','','',NULL,-1,4),(106,'建筑设计',1,5,2,'','','',NULL,-1,5),(107,'市政/公路',1,5,2,'','','',NULL,-1,5),(108,'造价工程/概预算',1,5,2,'','','',NULL,-1,5),(109,'土木工程/道路与桥梁',1,5,2,'','','',NULL,-1,5),(110,'经济师专业类',1,5,2,'','','',NULL,-1,5),(111,'电气/电力',1,5,2,'','','',NULL,-1,5),(112,'机械/自动化类',1,5,2,'','','',NULL,-1,5),(113,'船舶/冷冻类',1,5,2,'','','',NULL,-1,5),(114,'计算机/电子/通信',1,5,2,'','','',NULL,-1,5),(115,'装饰设计类',1,5,2,'','','',NULL,0,5),(116,'测量/测绘',1,5,2,'','','',NULL,-1,5),(117,'环境/环保',1,5,2,'','','',NULL,-1,5),(118,'总图',1,5,2,'','','',NULL,-1,5),(119,'九大员',1,13,2,'','','',NULL,0,3),(120,'技术工种',1,13,2,'','','',NULL,0,3),(121,'特殊工种',1,13,2,'','','',NULL,0,3),(122,'技工证',17,0,1,'','','',NULL,-1,4),(123,'初级技工证',1,122,2,'','','',NULL,-1,1),(124,'中级技工证',1,122,2,'','','',NULL,-1,1),(125,'高级技工证',1,122,2,'','','',NULL,-1,1),(126,'八大员',18,0,1,'','','',NULL,-1,4),(127,'施工员',1,126,2,'','','',NULL,-1,1),(128,'质量员',1,126,2,'','','',NULL,-1,1),(129,'安全员',1,126,2,'','','',NULL,-1,1),(130,'机械员',1,126,2,'','','',NULL,-1,1),(131,'造价员',1,126,2,'','','',NULL,-1,1),(132,'劳务员',1,126,2,'','','',NULL,-1,1),(133,'材料员',1,126,2,'','','',NULL,-1,1),(134,'资料员',1,126,2,'','','',NULL,-1,1),(135,'燃气/焊接',1,5,2,'','','',NULL,-1,5),(136,'初级职称',3,0,1,'','','',NULL,0,1),(137,'工民建',1,136,2,'','','',NULL,-1,5),(138,'给排水',1,136,2,'','','',NULL,-1,5),(139,'园林绿化/风景园林',1,136,2,'','','',NULL,-1,5),(140,'建筑/建筑施工',1,136,2,'','','',NULL,-1,5),(141,'水利水电/化工',1,136,2,'','','',NULL,-1,5),(142,'暖通/暖通空调/热处理',1,136,2,'','','',NULL,-1,5),(143,'建筑设计',1,136,2,'','','',NULL,-1,5),(144,'市政/公路',1,136,2,'','','',NULL,-1,5),(145,'造价工程/概预算',1,136,2,'','','',NULL,-1,5),(146,'土木工程/道路与桥梁',1,136,2,'','','',NULL,-1,5),(147,'经济师专业类',1,136,2,'','','',NULL,-1,5),(148,'电气/电力',1,136,2,'','','',NULL,-1,5),(149,'机械/自动化类',1,136,2,'','','',NULL,-1,5),(150,'船舶/冷冻类',1,136,2,'','','',NULL,-1,5),(151,'计算机/电子/通信',1,136,2,'','','',NULL,-1,5),(152,'装饰设计类',1,136,2,'','','',NULL,-1,5),(153,'测量/测绘',1,136,2,'','','',NULL,-1,5),(154,'环境/环保',1,136,2,'','','',NULL,-1,5),(155,'总图',1,136,2,'','','',NULL,-1,5),(156,'燃气/焊接',1,136,2,'','','',NULL,-1,5),(157,'其他',1,136,2,'','','',NULL,-1,5),(158,'高级职称',5,0,1,'','','',NULL,-1,5),(159,'工民建',1,158,2,'','','',NULL,-1,5),(160,'给排水',1,158,2,'','','',NULL,-1,5),(161,'园林绿化/风景园林',1,158,2,'','','',NULL,-1,5),(162,'建筑/建筑施工',1,158,2,'','','',NULL,-1,5),(163,'水利水电/化工',1,158,2,'','','',NULL,-1,5),(164,'暖通/暖通空调/热处理',1,158,2,'','','',NULL,-1,5),(165,'建筑设计',1,158,2,'','','',NULL,-1,5),(166,'市政/公路',1,158,2,'','','',NULL,-1,5),(167,'造价工程/概预算',1,158,2,'','','',NULL,-1,5),(168,'土木工程/道路与桥梁',1,158,2,'','','',NULL,-1,5),(169,'经济师专业类',1,158,2,'','','',NULL,-1,5),(170,'电气/电力',1,158,2,'','','',NULL,-1,5),(171,'机械/自动化类',1,158,2,'','','',NULL,-1,5),(172,'船舶/冷冻类',1,158,2,'','','',NULL,-1,5),(173,'计算机/电子/通信',1,158,2,'','','',NULL,-1,5),(174,'装饰设计类',1,158,2,'','','',NULL,-1,5),(175,'测量/测绘',1,158,2,'','','',NULL,-1,5),(176,'环境/环保',1,158,2,'','','',NULL,-1,5),(177,'总图',1,158,2,'','','',NULL,-1,5),(178,'燃气/焊接',1,158,2,'','','',NULL,-1,5),(179,'其他',1,158,2,'','','',NULL,-1,5),(180,'注册测绘师',1,13,2,'','','',NULL,-1,4),(184,'新能源',1,4,2,'','','',NULL,-1,4),(185,'岩土',1,5,2,'','','',NULL,-1,5),(186,'岩土',1,158,2,'','','',NULL,-1,5),(187,'岩土',1,136,2,'','','',NULL,-1,1),(188,'结构',1,136,2,'','','',NULL,-1,1),(189,'结构',1,5,2,'','','',NULL,-1,5),(190,'结构',1,158,2,'','','',NULL,-1,5),(191,'民航与机场',1,1,2,'','','','',0,1);
/*!40000 ALTER TABLE `hbv5_major` ENABLE KEYS */;

#
# Structure for table "hbv5_message"
#

DROP TABLE IF EXISTS `hbv5_message`;
CREATE TABLE `hbv5_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '管理者id',
  `message` text NOT NULL COMMENT '站内信内容',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '个体消息：0，全体消息1',
  `category` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT ' 系统消息：0，活动消息：1',
  `send_time` int(10) unsigned NOT NULL COMMENT '发送时间',
  `data` text COMMENT '消息序列化内容',
  PRIMARY KEY (`message_id`),
  KEY `category` (`category`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "hbv5_message"
#

/*!40000 ALTER TABLE `hbv5_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_message` ENABLE KEYS */;

#
# Structure for table "hbv5_news"
#

DROP TABLE IF EXISTS `hbv5_news`;
CREATE TABLE `hbv5_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '资讯类型（公告通知、挂靠心得、考证注册、政策解读、行业前沿、建筑职场）',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content` text NOT NULL COMMENT '内容详情',
  `author` int(11) NOT NULL DEFAULT '0' COMMENT '后台帐号id 就是作者名称',
  `browser` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '文章关键词',
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `show` tinyint(3) NOT NULL DEFAULT '0' COMMENT '审核状态  1==通过，前台允许展示',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='新闻资讯';

#
# Data for table "hbv5_news"
#

/*!40000 ALTER TABLE `hbv5_news` DISABLE KEYS */;
INSERT INTO `hbv5_news` VALUES (1,1,'网站新公告','<p>本站已开通，请多多关注。</p>',90,30,'','2018-07-16 10:50:06',1),(2,1,'公告2','<p>公告2</p>',90,4,'','2018-06-22 16:37:15',1),(3,2,'招聘心得啦','<p>招聘心得啦</p>',90,0,'招聘心得啦','2018-09-21 11:32:45',1),(4,3,'公司新闻','<p>公司新闻</p>',90,0,'公司新闻','2018-09-21 11:33:50',0),(5,4,'行业新闻','<p>行业新闻</p>',90,1,'行业新闻','2018-09-21 11:34:15',1),(6,5,'建筑资讯','<p>建筑资讯</p>',90,0,'建筑资讯','2018-09-21 11:34:09',1);
/*!40000 ALTER TABLE `hbv5_news` ENABLE KEYS */;

#
# Structure for table "hbv5_recruitment"
#

DROP TABLE IF EXISTS `hbv5_recruitment`;
CREATE TABLE `hbv5_recruitment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户 ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '信息类型',
  `type_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型显示，在哪个栏目显示的，1（在招聘栏目），2（在求职栏目）',
  `examine` tinyint(1) NOT NULL DEFAULT '1' COMMENT '审核情况。1==通过 0==审核中',
  `classid` smallint(6) NOT NULL DEFAULT '0' COMMENT '专业分类',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '专业子分类',
  `cid_dj` smallint(6) NOT NULL DEFAULT '0' COMMENT '资质等级',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '信息标题',
  `content` text NOT NULL COMMENT '内容详情',
  `regtype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '注册情况（初始注册、转注册、两者均可）',
  `cerstatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '证书状态',
  `zssy` tinyint(3) NOT NULL DEFAULT '0' COMMENT '证书适用',
  `price` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格范围',
  `period` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格范围年限',
  `purpose` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用途（挂资质、挂项目）',
  `academic_title` smallint(3) NOT NULL DEFAULT '0' COMMENT '职称要求',
  `specialty` smallint(6) NOT NULL DEFAULT '0' COMMENT '职称的分类',
  `experience` tinyint(1) NOT NULL DEFAULT '0' COMMENT '工作年限',
  `degree` tinyint(1) NOT NULL DEFAULT '0' COMMENT '学历',
  `province` int(5) NOT NULL DEFAULT '0' COMMENT '省份',
  `city` int(6) NOT NULL DEFAULT '0' COMMENT '城市',
  `sprovince` int(5) NOT NULL DEFAULT '0' COMMENT '社保 省份',
  `scity` int(6) NOT NULL DEFAULT '0' COMMENT '社保 城市',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `browser` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `job` varchar(16) DEFAULT '' COMMENT '职位',
  `yxt_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '优信推 开始推广时间',
  `yxt_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '优信推 结束推广时间',
  `dyd_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '钉一钉 开始推广时间',
  `dyd_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '钉一钉 结束推广时间',
  `szd_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '首页置顶 开始推广时间',
  `szd_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '首页置顶 结束推广时间',
  `nzd_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '内页置顶 开始推广时间',
  `nzd_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '内页置顶 结束推广时间',
  `show` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否展示。0=展示  1=否',
  `post_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '发信息所在的ip',
  PRIMARY KEY (`id`),
  KEY `dyd_endtime` (`dyd_endtime`),
  KEY `szd_endtime` (`szd_endtime`,`addtime`),
  KEY `type` (`type`,`province`,`city`,`show`),
  KEY `type_2` (`type`,`classid`,`province`,`city`,`show`),
  KEY `user_id` (`user_id`,`show`),
  KEY `user_id_2` (`user_id`,`type`,`show`,`addtime`),
  KEY `yxt_endtime` (`yxt_endtime`),
  KEY `查专业类型和省份` (`type`,`classid`,`cid`,`province`,`city`,`show`),
  KEY `帖子的正常排序` (`nzd_endtime`,`addtime`),
  KEY `examine` (`examine`,`show`,`type_show`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='招聘发布的信息';

#
# Data for table "hbv5_recruitment"
#

/*!40000 ALTER TABLE `hbv5_recruitment` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_recruitment` ENABLE KEYS */;

#
# Structure for table "hbv5_switch"
#

DROP TABLE IF EXISTS `hbv5_switch`;
CREATE TABLE `hbv5_switch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '功能介绍',
  `content` varchar(255) DEFAULT NULL COMMENT '功能介绍详情',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态开关 1=开，0=关',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='功能的开关';

#
# Data for table "hbv5_switch"
#

/*!40000 ALTER TABLE `hbv5_switch` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_switch` ENABLE KEYS */;

#
# Structure for table "hbv5_users_message"
#

DROP TABLE IF EXISTS `hbv5_users_message`;
CREATE TABLE `hbv5_users_message` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `message_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '消息id',
  `category` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '系统消息0，活动消息',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '查看状态：0未查看，1已查看 , 2已删除',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '个体消息：0，全体消息1',
  PRIMARY KEY (`rec_id`),
  KEY `message_id` (`message_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

#
# Data for table "hbv5_users_message"
#

/*!40000 ALTER TABLE `hbv5_users_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_users_message` ENABLE KEYS */;

#
# Structure for table "hbv5_zizhi"
#

DROP TABLE IF EXISTS `hbv5_zizhi`;
CREATE TABLE `hbv5_zizhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户 ID',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '信息类型',
  `classid` smallint(6) NOT NULL DEFAULT '0' COMMENT '专业分类',
  `cid` smallint(6) NOT NULL DEFAULT '0' COMMENT '专业子分类',
  `cid_dj` smallint(6) NOT NULL DEFAULT '0' COMMENT '资质等级',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '信息标题',
  `content` text NOT NULL COMMENT '内容详情',
  `regtype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '注册情况（初始注册、转注册、两者均可）',
  `cerstatus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '证书状态',
  `price` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格范围',
  `period` tinyint(1) NOT NULL DEFAULT '0' COMMENT '价格范围年限',
  `purpose` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用途（挂资质、挂项目）',
  `academic_title` smallint(3) NOT NULL DEFAULT '0' COMMENT '职称要求',
  `specialty` smallint(6) NOT NULL DEFAULT '0' COMMENT '职称的分类',
  `experience` tinyint(1) NOT NULL DEFAULT '0' COMMENT '工作年限',
  `degree` tinyint(1) NOT NULL DEFAULT '0' COMMENT '学历',
  `province` int(5) NOT NULL DEFAULT '0' COMMENT '省份',
  `city` int(6) NOT NULL DEFAULT '0' COMMENT '城市',
  `sprovince` int(5) NOT NULL DEFAULT '0' COMMENT '社保 省份',
  `scity` int(6) NOT NULL DEFAULT '0' COMMENT '社保 城市',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `browser` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `yxt_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '优信推 开始推广时间',
  `yxt_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '优信推 结束推广时间',
  `dyd_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '钉一钉 开始推广时间',
  `dyd_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '钉一钉 结束推广时间',
  `szd_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '首页置顶 开始推广时间',
  `szd_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '首页置顶 结束推广时间',
  `nzd_addtime` int(11) NOT NULL DEFAULT '0' COMMENT '内页置顶 开始推广时间',
  `nzd_endtime` int(11) NOT NULL DEFAULT '0' COMMENT '内页置顶 结束推广时间',
  `show` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否展示。0=展示  1=否',
  `post_ip` varchar(15) NOT NULL DEFAULT '0' COMMENT '发信息所在的ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='资质代办 发布的信息';

#
# Data for table "hbv5_zizhi"
#

/*!40000 ALTER TABLE `hbv5_zizhi` DISABLE KEYS */;
/*!40000 ALTER TABLE `hbv5_zizhi` ENABLE KEYS */;

#
# Structure for table "hbv5_zizhi_menu"
#

DROP TABLE IF EXISTS `hbv5_zizhi_menu`;
CREATE TABLE `hbv5_zizhi_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '资质名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `level` tinyint(3) NOT NULL DEFAULT '0' COMMENT '导航等级',
  `show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示。 0==显示，1==否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='资质菜单';

#
# Data for table "hbv5_zizhi_menu"
#

/*!40000 ALTER TABLE `hbv5_zizhi_menu` DISABLE KEYS */;
INSERT INTO `hbv5_zizhi_menu` VALUES (1,'施工总承包',0,1,0),(2,'呜呜呜搜索',2,2,0),(3,'专业承包',0,1,0),(7,'地基基础工程',3,2,0),(13,'工程设计',0,1,0),(14,'工程设计专业',13,2,0),(18,'起重设备安装工程',3,2,0),(23,'工程造价',0,1,0),(24,'工程监理',0,1,0),(30,'其他资质',0,1,0),(31,'施工劳务序列',30,2,0),(34,'电力工程',1,2,0),(35,'冶金工程',1,2,0),(36,'石油化工',1,2,0),(37,'机电工程',1,2,0),(38,'电子与智能化',3,2,0),(39,'消防设施工程',3,2,0),(40,'防水防腐保温',3,2,0),(41,'隧道工程',3,2,0),(42,'钢结构工程',3,2,0),(43,'模板脚手架',3,2,0),(44,'建筑装修装饰',3,2,0),(45,'建筑机电安装',3,2,0),(46,'建筑幕墙',3,2,0),(47,'古建筑工程',3,2,0),(48,'城市及道路照明',3,2,0),(49,'输变电工程',3,2,0),(50,'环保工程',3,2,0),(51,'特种工程',3,2,0),(52,'工程设计专项',0,1,0),(53,'建筑装饰',52,2,0),(54,'建筑智能化',52,2,0),(55,'建筑幕墙',52,2,0),(56,'轻型钢结构',52,2,0),(57,'风景园林',52,2,0),(58,'环境工程设计',52,2,0),(59,'消防设施',52,2,0),(60,'照明工程设计',52,2,1),(61,'造价',23,2,0),(63,'工程招标代理',30,2,0),(69,'三级',64,3,0),(78,'建筑工程',1,2,0),(84,'一级',34,3,0),(85,'二级',34,3,0),(86,'三级',34,3,0),(88,'一级',35,3,0),(89,'二级',35,3,0),(90,'三级',35,3,0),(91,'一级',37,3,0),(92,'二级',37,3,0),(93,'三级',37,3,0),(95,'一级',36,3,0),(96,'二级',36,3,0),(97,'三级',36,3,0),(99,'一级',78,3,0),(100,'二级',78,3,0),(101,'三级',78,3,0),(102,'一级',7,3,0),(103,'二级',7,3,0),(104,'三级',7,3,0),(105,'一级',18,3,0),(106,'二级',18,3,0),(107,'三级',18,3,0),(108,'一级',38,3,0),(109,'二级',38,3,0),(110,'一级',39,3,0),(111,'二级',39,3,0),(112,'一级',40,3,0),(113,'二级',40,3,0),(114,'一级',41,3,0),(115,'二级',41,3,0),(116,'三级',41,3,0),(117,'一级',42,3,0),(118,'二级',42,3,0),(119,'三级',42,3,0),(120,'不分等级',43,3,0),(121,'一级',44,3,0),(122,'二级',44,3,0),(123,'一级',45,3,0),(124,'二级',45,3,0),(125,'三级',45,3,0),(126,'一级',46,3,0),(127,'二级',46,3,0),(128,'一级',47,3,0),(129,'二级',47,3,0),(130,'三级',47,3,0),(131,'一级',48,3,0),(132,'二级',48,3,0),(133,'三级',48,3,0),(134,'一级',49,3,0),(135,'二级',49,3,0),(136,'三级',49,3,0),(137,'一级',50,3,0),(138,'二级',50,3,0),(139,'三级',50,3,0),(140,'不分等级',51,3,0),(141,'甲级',14,3,0),(142,'乙级',14,3,0),(143,'丙级',14,3,0),(144,'丁级',14,3,0),(145,'甲级',53,3,0),(146,'乙级',53,3,0),(147,'丙级',53,3,0),(148,'甲级',54,3,0),(149,'乙级',54,3,0),(150,'甲级',55,3,0),(151,'乙级',55,3,0),(152,'甲级',56,3,0),(153,'乙级',56,3,0),(154,'甲级',57,3,0),(155,'乙级',57,3,0),(156,'甲级',58,3,0),(157,'乙级',58,3,0),(158,'甲级',59,3,0),(159,'乙级',59,3,0),(160,'甲级',60,3,0),(161,'乙级',60,3,0),(162,'甲级',61,3,0),(163,'乙级',61,3,0),(164,'综合资质',24,2,0),(165,'专业资质',24,2,0),(166,'事务所',24,2,0),(167,'甲级',164,3,0),(168,'甲级',165,3,0),(169,'乙级',165,3,0),(170,'丙级',165,3,0),(171,'不分等级',166,3,0),(172,'不分等级',31,3,0),(173,'甲级',63,3,0),(174,'乙级',63,3,0),(175,'暂定级',63,3,0),(181,'公路工程',1,2,1),(182,'铁路工程',1,2,1),(183,'港口与航道工程',1,2,1),(184,'水利水电工程',1,2,1),(185,'矿山工程',1,2,1),(186,'市政公用工程',1,2,1),(187,'通信工程',1,2,1),(188,'预伴混凝土',3,2,1),(189,'桥梁工程',3,2,1),(190,'公路路面工程',3,2,1),(191,'公路路基工程',3,2,1),(192,'公路交通工程',3,2,1),(193,'铁路电务工程',3,2,1),(194,'铁路铺轨架梁工程',3,2,1),(195,'铁路电气化工程',3,2,1),(196,'机场场道工程',3,2,1),(197,'民航空管工程及机场弱电系统工程',3,2,1),(198,'机场目视助航工程',3,2,1),(199,'港口与海岸工程',3,2,1),(200,'航道工程',3,2,1),(201,'通航建筑物工程',3,2,1),(202,'港航设备安装及水上交管工程',3,2,1),(203,'水工金属结构制作与安装工程',3,2,1),(204,'水利水电机电安装工程',3,2,1),(205,'河湖整治工程',3,2,1),(206,'核工程',3,2,1),(207,'海洋石油工程',3,2,1),(208,'城市园林绿化企业资质',30,2,1),(209,'城市园林绿化企业资质标准',208,3,1),(210,'工程设计综合资质',13,2,1),(211,'工程设计行业资质',13,2,1),(212,'工程设计专项资质',13,2,1),(213,'工程勘察资质',0,1,1),(214,'工程勘察综合资质',213,2,1),(215,'工程勘察专业资质',213,2,1),(216,'工程勘察劳务资质',213,2,1),(217,'城乡规划编制单位资质标准',30,2,1),(219,'物业服务企业资质标准',30,2,1),(220,'房地产开发企业资质标准',30,2,1);
/*!40000 ALTER TABLE `hbv5_zizhi_menu` ENABLE KEYS */;
