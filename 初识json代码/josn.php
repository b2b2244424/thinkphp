<?php
/*
��json_encode��������ת����json�ַ���
*/
$arr = array(
    'Name'=>'������',
	'Age'=>20
);
$jsonencode = json_encode($arr);
echo $jsonencode;
/*********************************************************************************************************************************************** next ****/
/*
03
 *   ��json_encode֮ǰ���������������������ݶ���urlencode()����һ�£�Ȼ��json_encode()ת����json�ַ������������urldecode()�������������ת������
04
 *  ʹ���ض�function������������Ԫ��������
05
 *  @param  string  &$array     Ҫ������ַ���
06
 *  @param  string  $function   Ҫִ�еĺ���
07
 *  @return boolean $apply_to_keys_also     �Ƿ�ҲӦ�õ�key��
08
 *  @access public
09
 *
10
*/
 function arrayRecursive(&$array,$function,$apply_to_keys_also = false){
	  static $recursive_counter = 0;
	  if(++$recursive_counter > 1000){
		  die('possible deep recursion attack');
	  }
	 
	  foreach ($array as $key =>$value){
		  if(is_array($value)){
			  arrayRecursive($array[$key],$function, $apply_to_keys_also);
		  }else{
			  $array[$key] = $function($value);
		  }
		  if($apply_to_keys_also && is_string($key)){
			  $new_key = $function($key);
			  if($new_key != $key){
				  $array[$new_key] = $array[$key];
				  unset($array[$key]);
			  }
		  }
	  }
	  $recursive_counter--;
 }

/*
36
 *
37
 *  ������ת��ΪJSON�ַ������������ģ�
38
 *  @param  array   $array      Ҫת��������
39
 *  @return string      ת���õ���json�ַ���
40
 *  @access public
41
 *
42
 */
function JSON($array){
	arrayRecursive($array,'urlencode', true);
	$json = json_encode($array);
	return urldecode($json);
}
$array = array(
  'Name'=>'������',
  'Age'=>25
);
echo JSON($array);

/******************************************************************************************************************************************* next ********/

/*����һ���û���*/
class user{
	public $id;
	public $username;
	public $passwd;
	public $email;
	
	function __construct($id,$username,$passwd,$email){
		$this->id =$id;
		$this->username = $username;
		$this->passwd = $passwd;
		$this->email = $email;
	}
}
//ʵ�����������󣬷ֱ𸳲�ͬ��ֵ
$user = new user(1,"anguangli","123456","353125014@qq.com");
$users = new user(2,"yangxiaomao","456789","yangxiaomao@126.com");
//�������json_encode����ֵ
echo json_encode($user)."<br/>";
echo json_encode($users);

/******************************************************************************************************************************************** next *******/


?>