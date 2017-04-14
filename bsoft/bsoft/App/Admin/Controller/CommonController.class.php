<?php
namespace Admin\Controller;
use Think\Controller;
Class CommonController extends Controller{
	//自动运行方法判断权限和是否登录
	Public function _initialize(){
		if(!isset($_SESSION['username'])){
		   $this->redirect(MODULE_NAME.'/Login/index');
		}
	}
	//发送邮件
	public function sendMail($to, $subject, $body = '', $attachment = null) { //$to 收件者 $subject主题 $body 内容  $attachment附件
	    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
	    if (!preg_match($pattern, $to)) {
	        return "email_error";
	    }
	    //邮件服务器配置
	    $detail = S('emailconfig');
	    $title = getGb2312("素材火发送excel到邮箱");
	    import('@.Class.phpmailer.phpmailer','','.php');
	    $mail = new PHPMailer(); //PHPMailer对象
	    $mail->CharSet = 'GB2312'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
	    $mail->Encoding = "base64";
	    $mail->IsSMTP();  // 设定使用SMTP服务
	    $mail->SMTPDebug = 0;                     // 关闭SMTP调试功能
	    $mail->SMTPAuth = true;                  // 启用 SMTP 验证功能
	    $mail->SMTPSecure = 'SSL';                 // 使用安全协议
	    $mail->Host = $detail['smpt'];  // SMTP 服务器
	    $mail->Port = "25";  // SMTP服务器的端口号
	    $mail->Username = $detail['account'];  // SMTP服务器用户名
	    $mail->Password = $detail['pwd'];  // SMTP服务器密码
	    $mail->Subject = getGb2312($subject); //邮件标题
	    $mail->SetFrom($detail['account'], $title);
	    $mail->MsgHTML(getGb2312($body));
	    $mail->AddAddress(getGb2312($to), $title);
	    if (is_array($attachment)) { // 添加附件
	        foreach ($attachment as $file) {
	            is_file($file) && $mail->AddAttachment($file);
	        }
	    }
	    $rs = $mail->Send() ? true : $mail->ErrorInfo;
	    return $rs;
	}
	//导出数据表
	Public function Down($data,$name){
		$dir=dirname(__FILE__);
		import('@.Class.PHPExcel','','.php');
		$obj=new PHPExcel();          //实例化对象
		$objSheet=$obj->getActiveSheet();   //获取当前的活动sheet的操作对象
		$objSheet->setTitle('导出记录');          //给当前活动sheet设置名称
		$objSheet->fromArray($data);              //直接加载数据（数组）来填充数据
		$objWriter = PHPExcel_IOFactory::createWriter($obj,'Excel2007');  //按照指定格式生成excel文件
		$objWriter->save($dir.'/Down/('.date('Y-m-d').').xlsx');                             //保存excel文件与某个目录之下
		$filename = $dir.'/Down/('.date('Y-m-d').').xlsx';
		header('content-disposition:attachment;filename='.$name.'('.date('Y-m-d').').xlsx');
		header('content-length:'.filesize($filename));
		readfile($filename);
	}
	//图片上传方法，$path为Uploads下的文件夹的名称，返回上传信息
	public function uploads($path = 'product'){
	    import('ORG.Net.UploadFile');
		$upload = new UploadFile();                                  // 实例化上传类
		$upload->maxSize  = 3145728 ;  
		$upload->subType  = 'date';                                  // 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg','webm','doc');    // 设置附件上传类型
		$upload->savePath =  'Uploads/'.$path.'/';                                  
		if(!$upload->upload()){                                 
			$this->error($upload->getErrorMsg());                    // 上传错误提示错误信息
		}else{                                                    
		 	return $upload->getUploadFileInfo();                   // 上传成功 获取上传文件信息
		}
	}
	public function uploadsImages($path){
		//允许上传文件格式
		$typeArr = array("jpg", "png", "gif", "jpeg", "mov", "gears", "html5", "html4", "silverlight", "flash"); 
		$path = "Uploads/".$path."/"; //上传路径
		if (isset($_POST)) {
		    $name = $_FILES['file']['name'];
		    $size = $_FILES['file']['size'];
		    $name_tmp = $_FILES['file']['tmp_name'];
		    if (empty($name)) {
		        echo json_encode(array("error" => "您还未选择文件"));
		        exit;
		    }
		    $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型
		    if (!in_array($type, $typeArr)) {
		        echo json_encode(array("error" => "清上传指定类型的文件！","type"=>"types"));
		        exit;
		    }
		    if ($size > (50000 * 1024)) { //上传大小
		        echo json_encode(array("error" => "文件大小已超过50000KB！","type"=>"size"));
		        exit;
		    }
		    $pic_name = time() . rand(10000, 99999) . "." . $type; //文件名称
		    $pic_url = $path . $pic_name; //上传后图片路径+名称
		    if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
		        echo json_encode(array("error" => "0", "pic" => __ROOT__.'/'.$pic_url, "name" => $pic_name));
		    } else {
		        echo json_encode(array("error" => "上传有误，清检查服务器配置！","type"=>"config"));
		    }
		}
	}
	// 数据删除方法$table为删除的数据表、$control为要跳转的控制器
	Public function del($id='',$table='',$control=''){
		if (M($table)->delete($id)) {
			$this->success('删除成功！！！',U(MODULE_NAME.'/'.$control.'/index'));
		}else{
			$this->error('删除失败！！！');
		}
	}
	// 数据添加方法$table为添加的数据表、$data为添加的数据、$control为要跳转的控制器
	public function adddata($table='',$data='',$control=''){
		if (M($table)->add($data)) {
			$this->success('添加成功！！！',U(MODULE_NAME.'/'.$control.'/index'));
		}else{
			$this->error('添加失败！！！');
		}
	}
	// 数据添加方法$table为添加的数据表、$data为修改的数据、$control为要跳转的控制器
    public function savedata($table='',$data='',$control=''){
		if (M($table)->save($data)) {
			$this->success('修改成功！！！',U(MODULE_NAME.'/'.$control.'/index'));
		}else{
			$this->error('修改失败！！！');
		}
	}
	// 批量删除函数$table为批量删除的对象表，$data表示批量删除的数组一般为$('post')
	public function delall($table,$data){
		$del = implode($data,',');                       //数组转字符串用于批量删除
		if(M($table)->delete($del)){
			$this->success('删除成功！！！');
		}else{
			$this->error('删除失败！！！');
		}
	}
	//$table为分页表名，$num分页显示数据,返回limit值和page
	public function Page($table,$num,$where){
		$count= M($table)->where($where)->count();
		$page= new \Think\Page($count,$num);
		$limit = $page->firstRow . ','. $page->listRows;
		$page=$page->show();
		$arr = array();
		$arr['limit'] = $limit;
		$arr['page'] = $page;
		return $arr;
	}
	//添加排序
	public function sortAsc($table){
		$db = M($table);
		foreach($_POST as $id => $sort){
			$db->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->success('排序成功');
	}
}
?>