<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	
    public function login(){
		$admin = D('Admin');
		$aid = $admin->checkLong(); //检测是否长登陆，若是设置相关session,返回aid
			
		//是长登陆，返回成功状态，HTML文件实现跳转
		if( I('session.name',0) ){
			$this->redirect('Admin/Index/index');
		}
			
		if(isset($_COOKIE['name'])){
			$this->assign('name',I(cookie.name));
		}
		
		if(IS_AJAX){
			$aid = $admin->checkLong(); //检测是否长登陆，若是设置相关session,返回aid
			
			//是长登陆，返回成功状态，HTML文件实现跳转
			if( I('session.name',0) ){
				$data['status'] = true;
				$this->ajaxReturn($data);
				return;
			}
			
			if(isset($_COOKIE['name'])){
				$this->assign('name',I(cookie.name));
			}
			
			//登陆信息有误，返回错误信息
			$aid = 0;
			$ajaxData['name'] = I('name') ;
			$ajaxData['pwd'] = I('pwd');
			$remember = I('remember');
				// $data['status'] = false;
				// $data['content'] = $_POST['pwd'].'....';
				// $this->ajaxReturn($data);
				// exit;
			
			
			if(!$admin->create() ){
				$error = $admin->getError();
				$data['status'] = false;
				$data['content'] = $error;
				$this->ajaxReturn($data);
				return;
			}
			
			if( !($aid = $admin->checkUser($admin->name,$admin->pwd)) ){
				$data['status'] = false;
				// $data['content'] = $remember;
				$data['content'] = '账号或密码错误';
				$this->ajaxReturn($data);
				return;
			}
			
			// 此处坑爹，$remember为字符串.....
			if($remember == 'false'){
					$data['status'] = true;
					$this->ajaxReturn($data);
					$this->redirect('Admin/Index/index');
				return;
			}else{
                $salt = $this->random_str(16);
                //第二分身标识
                $identifier = md5($salt . md5(I("username") . $salt));
                //永久登录标识
                $token = md5(uniqid(rand(), true));
                //长登录有效时间(1周)
                $timeout = time()+3600*24*7;
                //存入cookie
				cookie('auth',"$identifier:$token",3600*24*7);
                // setcookie('auth',"$identifier:$token",$timeout);
				$adminData['identifier'] = $identifier;
				$adminData['token'] = $token;
				$adminData['time'] = $timeout;
				$where['aid'] = $aid;
                $sql = $admin->where($where)->save($adminData); 
				
				$data['status'] = true;
				$this->ajaxReturn($data);
				$this->redirect('Admin/Index/index');
				return;
			}
		}
		
		
		
		$this->display();
    }
	
	private function random_str($length){
        //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $str = '';
        $arr_len = count($arr);
        for ($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $arr_len-1);
            $str.=$arr[$rand];
        }
        return $str;
    }

	
	
	
	
	public function logout(){
		session('name',null);
		session('super',null);
		cookie('auth',null);
		$this->redirect("login");
	}
}