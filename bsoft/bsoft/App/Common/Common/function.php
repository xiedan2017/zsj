<?php
  // 截取函数
    function subtext($text, $length){
        if(mb_strlen($text, 'utf8') > $length) 
        return mb_substr($text, 0, $length, 'utf8').'...';
        return $text;
    }
    //无限极分类函数
	function node_merge ($node,$access=null,$pid=0){
		$arr=array();
		foreach ($node as $v) {
			if(is_array($access)){
				$v['access'] = in_array($v['id'], $access) ? 1 : 0;
			}
			if($v['pid']==$pid){
				$v['child']=node_merge($node,$access,$v['id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
	function getIpApi($ip){
		$ch = curl_init();
	    $url = 'http://apis.baidu.com/showapi_open_bus/ip/ip?ip='.$ip;
	    $header = array(
	        'apikey: 549cd9ecae763b1eee9fc18d153d8e66',
	    );
	    // 添加apikey到header
	    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
	    curl_close($ch);
	    $res = json_decode($res,1);
	    return $res['showapi_res_body']['region'].$res['showapi_res_body']['city'].$res['showapi_res_body']['isp'].'机房';
	}
	// 删除文件和文件架函数
	function deleteDir($dir){
	 $handle = @opendir($dir);
	   readdir($handle);
	   readdir($handle);
	   while(false !== ($file = readdir($handle))){
	     $file = $dir.DIRECTORY_SEPARATOR.$file;
	     if(is_dir($file)){
	       deleteDir($file);             //如果是子目录就进行递归操作
	     }else{                          //如果是文件，用unlink()删除
	       @unlink($file);
	     }
	  }
	   closedir($handle);
	}
?>