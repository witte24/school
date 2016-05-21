<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
	
	//array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
	protected $_validate = array(
		array('name','require','用户名不能为空'), //用户名不为空
		array('pwd','require','密码不能为空'), //密码不为空
		array('rname','require','姓名不能为空'), //姓名不为空
		
		array('name','/\S{2,25}/','用户名长度为2~25字符'), 
		array('rname','/\S{2,25}/','姓名长度为2~25字符'), 
		array('email','email','邮箱地址错误',2), //邮箱格式
		array('lphone','/^1[34578]\d{9}$/','手机长号错误',2), //手机长号格式
		array('sphone','/^[123456789]\d{3,6}$/','短号应为4~8位数字',2), //手机长号格式
	);
	
	protected $_auto = array (
		array('pwd','encryptPwd',3,'callback') , // 对password字段在新增和编辑的时候使md5函数处理
	);
	
	function encryptPwd($pwd){
		return sha1(md5($pwd) );
	}

	//检测登录信息是否正确
	public function checkUser($name,$pwd){
		$where['name'] = $name;
		$where['pwd'] = $pwd;
		if( $admin = $this->where($where)->find()){
			session('name',$name );
			session('aid',$admin['aid'] );
			if($admin['issuper']){
				session('super',1);
			}
			return $admin['aid'];
		}else{
			return false;
		}
	}
	
	//检测数据库中是否存在与cookie一致的数据
	public function checkLong(){
		$now = time(); //当前时间戳
		
		//得到当前cookie的信息
		list($identifier,$token) = explode(':',$_COOKIE['auth']);
		if (ctype_alnum($identifier) && ctype_alnum($token)){
            $authMsg['identifier'] = $identifier;
            $authMsg['token'] = $token;
        }else{
            return false;
        }
		
		//数据库取出信息
		$where['identifier'] = $authMsg['identifier'];
		$info = $this->where($where)->select();
		$info = $info[0];
		if($info != null){
			if( $authMsg['token']==$info['token'] && $now < $info['time'] ){
				session("name",$info['name']);
				session("aid",$info['aid']);
				if($info['issuper']){
					session('super',1);
				}
				return $info['aid'];
			}
		}
		return false;
	} 
	
	//检测原密码是否正确
	public function checkOldPwd( $aid,$pwd ){
		$where['aid'] = $aid;
		$where['pwd'] = $pwd;
		if( $admin = $this->where($where)->find()){
			return true;
		}else{
			return false;
		}
	}
	
}