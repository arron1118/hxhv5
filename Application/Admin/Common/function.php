<?php
function getUserid(){
    $uid = $_SESSION['admin_user']['id'];
    return $uid;
}
/**
 *  authOne('Admin/xx/xx')
 *  <if condition="authOne($url) eq true"></if>
 **/
function authOne($url){
	$auth=new \Think\Auth();
	$result=$auth->check($url,getUserid());
	if($result){
		return true;
	}else{
		return false;
	}
}



/**
 * 设置网络请求配置
 * @param  [string] $curl 请求的URL
 * @param  [bool]   true || false 是否https请求
 * @param  [string] $method 请求方式,默认GET
 * @param  [array]  $header 请求的header参数
 * @param  [object] $data PUT请求的时候发送的数据对象
 * @return [object] 返回请求响应
 */
function ihttp_request($curl,$https=true,$method='GET',$header=array(),$data=null){
	// 创建一个新cURL资源
	$ch = curl_init();
	
	// 设置URL和相应的选项
	curl_setopt($ch, CURLOPT_URL, $curl);    //要访问的网站
	//curl_setopt($ch, CURLOPT_HEADER, false); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

	if($https){
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
	}
	if($method == 'POST'){
		curl_setopt($ch, CURLOPT_POST, true);  //发送 POST 请求
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	
	
	// 抓取URL并把它传递给浏览器
	$content = curl_exec($ch);
	if ($content  === false) {
	  return "网络请求出错: " . curl_error($ch);
	  exit();
	}
	//关闭cURL资源，并且释放系统资源
	curl_close($ch);
	
	return $content;
}

//检查是否是链接格式
function checkUrl($C_url){
    $str="/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/";  
    if (!preg_match($str,$C_url)){  
        return false;  
    }else{  
		return true;  
    }  
}  

//检查是不是HTTPS
function check_https($url){
	$str="/^https:/";
	if (!preg_match($str,$url)){  
        return false;  
    }else{  
		return true;  
    }  
}


?>