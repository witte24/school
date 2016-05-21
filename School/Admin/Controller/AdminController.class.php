<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController {

	//管理员列表
	public function adminList(){
		$this->isSuper();
		$admin = D('admin');
		$count = $admin->count();
		$Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show = $Page->show();// 分页显示输出
		$adminMsgs = $admin->limit($Page->firstRow.','.$Page->listRows)->
		field('aid,name,rname,lphone,sphone,email,cdate')->select();//数据
		$this->page = $show;
		$this->adminMsgs = $adminMsgs;
		$this->num = 1; //用于标记个数
		$this->display();
	}
	
	//当前登录管理员信息
	public function adminMsg(){
		$admin = D('admin');
		$where['aid'] = I('aid');
		$myMsg = $admin->where($where)->
		field('aid,name,rname,lphone,sphone,email,cdate')->select();
		$this->myMsg = $myMsg[0];
		$this->display();
	}
	
	//修改个人新信息
	public function alterMyMsg(){
		//得到当前个人信息
		$admin = D('admin');
		$where['aid'] = I('aid');
		$this->aid = I('aid');
		$myMsg = $admin->where($where)->
		field('aid,name,rname,lphone,sphone,email')->select();
		$this->myMsg = $myMsg[0];
		
		$this->issuper = I('issuper');
		
		//判断信息正确性
		if(IS_AJAX){
			if(!$admin->create()){
				$error =$this->getErrorArr($admin->getError());
				$data['status'] = false;
				$data['content'] = $error;
				$this->ajaxReturn($data);
				return;
			}else{
				$aid = I('aid');
				$where['aid'] = $aid;
				$pwd = $admin->where($where)->getField('pwd');
				$admin->pwd = $pwd; //防止丢失密码
				if( $admin->save()){
					$data['status'] = true;
					$data['content']['aid'] = $aid;
					$data['content']['issuper'] = I('issuper');
					$this->ajaxReturn($data);
				}else{
					$data['status'] = false;
					$data['content']['name'] = '信息没有做任何修改';
					$this->ajaxReturn($data);
				}
				return;
			}
				return;
		}
		$this->display();
	}
	
	//修改密码
	public function alterPwd(){
		if(IS_AJAX){
			$admin = D('admin');
			
			//动态验证
			$rules = array(
			array('pwd','require','原密码不能为空'), 
			array('newpwd','require','新密码不能为空'), 
			array('newpwd2','require','请再次输入'), 
			array('newpwd','/\S{6,25}/','密码长度为6~25字符'), 
			);
			//create失败
			if(!$admin->validate($rules)->create()){
				$error =$this->getErrorArr($admin->getError());
				$data['status'] = false;
				$data['content'] = $error;
				$this->ajaxReturn($data);
				return;
			}else{
				//验证原密码
				if( !$admin->checkOldPwd($admin->aid,$admin->pwd ) ){
					$data['status'] = false;
					$data['content']['oldpwd'] = '原密码错误';
					$data['content']['newpwd2'] = '*'; //修复原密码、再输一次同时提示
					$this->ajaxReturn($data);
					return;
				}else{//验证新密码
					//两次输入不一致
					if( I(newpwd)!=I(newpwd2) ){
						$data['status'] = false;
						$data['content']['oldpwd'] = '*';
						$data['content']['newpwd2'] = '两次输入不一致';
						$this->ajaxReturn($data);
						return;
					}else{
						$aid = I('aid');
						$where['aid'] = $aid;
						$myMsg = $admin->find($aid);
						$myMsg['pwd'] = sha1(md5(I('newpwd')));
						$admin->where($where)->save($myMsg);
						$data['status'] = true;
						$data['content']['newpwd2'] = '两';
						$this->ajaxReturn($data);
					}
				}				
			}
		}
		$this->display();
	}
	
	public function delAdmin(){
		$this->isSuper();
		$aid = I('aid');
		$admin = M('admin');
		if($admin->delete($aid) ){
			$this->redirect('Admin/Admin/adminList');
		}else{
			$this->error('删除失败',U('Admin/Admin/adminList') );
		}
	}
	
	public function addAdmin(){
		$this->isSuper();
		if(IS_AJAX){
			$rules = array(
			array('name','require','用户名不能为空'), 
			array('name','/\S{2,25}/','用户名长度为2~25字符'), 
			array('newpwd','require','新密码不能为空'), 
			array('newpwd','/\S{6,25}/','密码长度为6~25字符'), 
			array('newpwd2','require','请再次输入'), 
			array('rname','/\S{2,25}/','姓名长度为2~25字符'),
			array('lphone','/^1[34578]\d{9}$/','手机长号错误',2), //手机长号格式
			array('sphone','/^[123456789]\d{3,6}$/','短号应为4~8位数字',2), //手机长号格式			
			array('email','email','邮箱地址错误',2), //邮箱格式
			);
			
			$admin = D('admin');
			if(!$admin->validate($rules)->create()){
				$error =$this->getErrorArr($admin->getError());
				// $error['name'] = $admin->getError();
				$data['status'] = false;
				$data['content'] = $error;
				$this->ajaxReturn($data);
				return;
			}else{
				if(I(newpwd)!=I(newpwd2)  ){
					$data['status'] = false;
					$data['content']['newpwd2']="两次输入不一致";
					$this->ajaxReturn($data);
					exit;
				}
				
				$aid = I('aid');
				$where['aid'] = $aid;
				$pwd = sha1(md5(I('newpwd')));
				$admin->pwd = $pwd;
				$admin->cdate = date('Y-m-d');
				if( $admin->add()){
					$data['status'] = true;
					$this->ajaxReturn($data);
				}else{
					$data['status'] = false;
					$data['content']['name'] = '服务器错误';
					$this->ajaxReturn($data);
				}
				return;
			}
				return;
		}
		$this->display();
	}
	
/*---------------------------------以下为私有函数------------------------------------------*/
	
	//得到错误信息数组，数组用于返回前端(修改个人信息)
	private function getErrorArr($error){
		$err['name'] = '*';
		$err['oldpwd'] = "*";
		$err['newpwd'] = "*";
		$err['newpwd2'] = "*";
		$err['rname'] = '*';
		$err['lphone'] = ' ';
		$err['sphone'] = ' ';
		$err['email'] = ' ';
		
		if($error == '用户名不能为空'){
			$err['name'] = $error;
			return $err;
		}
		if($error == '用户名长度为2~25字符'){
			$err['name'] = $error;
			return $err;
		}
		if($error == '原密码不能为空'){
			$err['oldpwd'] = $error;
			return $err;
		}
		if($error == '新密码不能为空'){
			$err['newpwd'] = $error;
			return $err;
		}
		if($error == '密码长度为6~25字符'){
			$err['newpwd'] = $error;
			return $err;
		}
		if($error == '请再次输入'){
			$err['newpwd2'] = $error;
			return $err;
		}
		if($error == '姓名不能为空'){
			$err['rname'] = $error;
			return $err;
		}
		if($error == '姓名长度为2~25字符'){
			$err['rname'] = $error;
			return $err;
		}
		if($error == '手机长号错误'){
			$err['lphone'] = $error;
			return $err;
		}
		if($error == '短号应为4~8位数字'){
			$err['sphone'] = $error;
			return $err;
		}
		if($error == '邮箱地址错误'){
			$err['email'] = $error;
			return $err;
		}
		
	}
	
	//判断是否为超级管理员，如不是跳转到主页
	private function isSuper(){
		if( !I('session.super',0) ){
			$this->error('对不起，只有超级管理员有此权限！<br>正跳转到主页...',U('Admin/Index/right'),2 );
			exit;
		}
	}

}