#许愿墙之表白墙版

##服务器部署帮助

>使用说明

	1.上传文件至服务器.
	--------------------	
	2.数据库参数
	Database:"wishwall"
	Table:"wishwall_love"
	field:ID,toWho,fromWho,time,color,text
	可手动创建数据库"wishwall",
	然后运行"creatTable.sql"中sql命令创建数据表,
	最后运行"dataInsert.sql"中sql命令,导入部分内测时的数据.
	---------------------------------------------------------
	3.修改"load.php","submit.php","search.php"中数据库的相关参数.
	--------------------------------------------------------------

>Tips
	
	表白墙只能在手机微信客户端中打开
	PC端弹出二维码

>修改
	
	浏览器(userAgent)的判断放到后台
	修补了部分bug和可能被攻击的地方
	PC端页面加了二维码
	将代码统一用jQuery进行了重写
	简单的过滤下垃圾回复
	代码简单重构了一下
	对已经存入数据库的留言数据进行了缓存
	(原则上认为只加不删)
	2015年4月28日
