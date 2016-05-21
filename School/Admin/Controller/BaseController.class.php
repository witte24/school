<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	
	public function _initialize(){
		$this->checkLogin();
	}
	
    public function checkLogin(){
		if( ! ($name=I('session.name',0)) ){
			$this->redirect("Admin/Login/login");
		}else{
			$this->name = $name;
			$this->aid = I('session.aid',0);
		}
    }
}