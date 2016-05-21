<?php
namespace Admin\Controller;
use Think\Controller;
class TeamController extends BaseController {
	public function addTeam(){
		if(IS_AJAX){
			$team = D('team');
			if(!$team->create()){
				$error = $team->getError();
				$data['status'] = false;
				$data['content']['name'] = $error;
				$this->ajaxReturn($data);
				return;
			}else{
				$team->cdate = date("Y-m-d");
				if( $team->add()){
					$data['status'] = true;
					$this->ajaxReturn($data);
				}else{
					$data['status'] = false;
					$data['content']['name'] = '服务器错误';
					$this->ajaxReturn($data);
				}
				return;
			}
		}
		$this->display();
	}
	
	public function teamList(){
		$team = D('team');
		$teamRes = $team->select();
		$this->teamRes = $teamRes;
		$this->display();
	}
	
	public function alterTeam(){
		$teamRes['teamid'] = I('teamid');
		$teamRes['name'] = I('name');
		$this->teamRes = $teamRes;
		if(IS_AJAX){
			$team = D('team');
			if(!$team->create()){
				$error = $team->getError();
				$data['status'] = false;
				$data['content']['name'] = $error;
				$this->ajaxReturn($data);
				return;
			}else{
				$where['teamid'] = $team->teamid;
				if( $team->where($where)->save() ){
					$data['status'] = true;
					$this->ajaxReturn($data);
				}else{
					$data['status'] = false;
					$data['content']['name'] = "信息未修改";
					$this->ajaxReturn($data);
				}
				return;
			}
		}
		$this->display();
	}

}