<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class TeacherViewModel extends ViewModel {
	public $viewFields = array(
		'Teacher'=>array('tid ','name','picture','title','edubg',
			'office','webpage','field',),
		'Tm2tch'=>array('teamid','_on'=>'Teacher.tid=Tm2tch.tid'),
		'Team'=>array('name'=>'teamName', '_on'=>'Tm2tch.teamid=Team.teamid'),
	);
}