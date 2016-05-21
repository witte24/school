<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class TeacherModel extends RelationModel {
	
	//array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	protected $_validate = array(
		array('name','require','名字不能为空'), 
		array('name','/^\S{2,20}$/','名字应为2~20个字符'),
		array('edubg','require','学历不能为空'), 
		array('title','require','职称不能为空'), 
		array('title','/^\S{2,60}$/','自定义职称应为2~60个字符',2),
		array('office','/^\S{2,20}$/','办公室应为2~20个字符',2),
		array('webpage','/^\S{5,100}$/','个人网页应为5~100个字符',2),
		// array('team','require','所属团队不能为空'),  //没做相应检测，可优化
		array('field','/^\S{2,400}$/','研究领域应为2~400个字符',2),
	);
	
	protected $_link = array(
		'teamMsg' => array(
			'mapping_type' => self::MANY_TO_MANY,
			'class_name' => 'Team',
			'mapping_name' => 'teamMsg',
			'foreign_key' => 'tid',
			'relation_foreign_key' => 'teamid ',
			'relation_table' => 'tp_tm2tch' ,//此处应显式定义中间表名称，且不能使用C函数读取表前缀
			// 'as_fields' => "cdate,name:teamname"
		)
	);

}