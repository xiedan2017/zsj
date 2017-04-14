<?php
namespace Index\Model;
use Think\Model\RelationModel;
Class ProductcateRelationModel extends RelationModel{
	//定义主表名称
	protected $tableName = 'productcate';
	//定义关联关系
	protected $_link = array(
		'product'=>array(
			'mapping_type'=>self::HAS_MANY,     //多对多关系
			'foreign_key'=>'cate',
			//'as_fields'=>'name:cate',             //name表示要用的字段，cate表示要映射到谁上面
		)
	);
}