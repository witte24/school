<?php
namespace Admin\Model;
use Think\Model;
class TeamModel extends Model {
	
	//array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	protected $_validate = array(
		array('name','require','不能为空'), 
		array('name','/^\S{2,20}$/','应为2~20个字符'), 
		array('name','','已存在该团队','1','unique'), 
	);

}