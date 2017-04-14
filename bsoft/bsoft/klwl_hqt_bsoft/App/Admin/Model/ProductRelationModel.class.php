<?php
namespace Admin\Model;
use Think\Model\RelationModel;
Class ProductRelationModel extends RelationModel{
	//定义主表名称
	protected $tableName = 'product';
	//定义关联关系
	protected $_link = array(
		'productcate'=>array(
			'mapping_type'=>self::BELONGS_TO,     //多对多关系
			'foreign_key'=>'cate',
			'as_fields'=>'name:catename',             //name表示要用的字段，cate表示要映射到谁上面
		)
	);
}