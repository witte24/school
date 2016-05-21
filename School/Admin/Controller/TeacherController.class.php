<?php
namespace Admin\Controller;
use Think\Controller;
class TeacherController extends BaseController {
	public function addTeacher(){
		$team = M('team');
		$teamRes = $team->select();
		$this->teamRes = $teamRes;
		
/*   		//测试关联
		$teacher = D("teacher");
		$teacherRes = $teacher->relation(true)->select();
		dump($teacherRes);  */ 
 		
  		if(IS_AJAX){
			$teacher = D("teacher");
			if(!$teacher->create() ){
				$date['status']=false;
				$date['content']['name'] = $teacher->getError();
				$this->ajaxReturn($date);
			}else{
				$team = I('team');
				$temp=0;
				$i = 0;
 				foreach($team as $valus ){
					$msg[$i]['tid'] = $valus; //tid而不是teamid，此处是重点，调试了一下午才解决
					$msg[$i]["cdate"] = date("Y-m-d");
					$teacher->teamMsg = $msg;
					$i++;
				}
				if( $teacher->relation(true)->add() ){
					$date['status']=true;
					$this->ajaxReturn($date);
				}else{
					$date['status']=false;
					$date['content']['name'] = "服务器错误";
					$this->ajaxReturn($date);
				}
			}
		}
		$this->display();   
	}
	
	public function teacherList(){
		//团队信息
		$team = M('team');
		$teamRes = $team->select();
		$this->teamRes = $teamRes;
		if(IS_AJAX){
			$teacher = D("teacher");
			//团队select控件发送ajax请求
			if( I("type")=="team" ){
				// $teacherRes = $teacher->relation(true)->select();
				$this->teacherRes = "";
				$date['status']=false;
				$date['content']['name'] = I("teamType");
				$this->ajaxReturn($date);
				return;
			}
			if( I("type")=="content" ){
				
			}

		}
		//首次进入教师列表
		$teacher = D("teacher");
		$count = $teacher->count();
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show = $Page->show();// 分页显示输出
		$teacherRes = $teacher->limit($Page->firstRow.','.$Page->listRows)->select();//数据
		$this->page = $show;
		$this->teacherRes = $teacherRes;
		$this->display();
	}
	
	public function teacherList2(){
		$Model = D("TeacherView");
		$where['teamid'] = 2;
		$res = $Model->where($where)->select();
		dump($res);
	}
	
	public function demo(){
		if(IS_AJAX){
			$saveImgUrl = I("saveImgUrl");
			$content = I("content");
			// $date['content'] = mysql_real_escape_string() ;
			$date['content'] = mysql_real_escape_string($content)  ;
			$date['status']=true;
			$this->ajaxReturn($date);
		}
		$this->display();
	}

	public function delUselsPic(){
		if(IS_AJAX){
			$delImgUrl = I("delImgUrl");
			foreach($delImgUrl as $var ){
				//原因：绝对路径无法删除图片，改为./形式
				$pattern = "/^\/school/";
				$var = preg_replace($pattern,".",$var);
				$date['content'] = unlink($var);
			}
			// $date['content'] = unlink("/school/Public/Uploads/editor/image/20160514/20160514073749_87354.jpg");
			// $date['content'] = $_SERVER['HTTP_HOST'];
			$date['status']=true;
			$this->ajaxReturn($date);
		}
	}
	
	public function upPic(){
		
		if( IS_AJAX ){
			$delPic = I("delPic");
			unlink($delPic);
			$this->ajaxReturn($delPic);
		}else{
			if( $_FILES['pic']['tmp_name']!='' ){
				$this->upload();
			}
		}
	}
	
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 8*1024*1024 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg','ico');// 设置附件上传类型
		$upload->rootPath = './'; // 设置附件上传根目录
		$upload->savePath = './Public/Uploads/'; // 设置附件上传（子）目录
		// 上传文件
		$info = $upload->uploadOne($_FILES['pic']);
		if(!$info) {// 上传错误提示错误信息
			echo false; //
		}else{// 上传成功 获取上传文件信息
			$addr = $info['savepath'].$info['savename'];
			echo $addr;
			echo I("delPic");
		}
	}
}