<?php 
//1(1) ����һ���������������ϵ�ÿһ���ڵ㣬��ʾһ��С����
  //С����
   class Child{
     public $no;
	 public $next=null;
	 //��������
	 public function __construct($no){
	    $this->no=$no;
	 }
   }
   //����һ��ָ���һ��С���ѵ�����
   $first=null;
   $n=4000;//$n��ʾ�м���С����
   //дһ������������һ���ĸ�С���ѵĻ�������
   //һ�ᣬ��������ķ���&$first
   /**
   addChild�����������ǣ���$n��С��������һ����������$first������ָ��û�������ĵ�һ������
   **/
   function addChild(&$first,$n){
      //��ȥ����
	  //1. ͷ��㲻�ܶ� $first���ܶ���
	  $cur=null;
	  for($i=0;$i<$n;$i++){
		 
	     $child= new Child($i+1);
		 //��ô����һ����������
		 if($i==0){
		   $first=$child;
		  
		   $first->next=$child;
		   $cur=$first;
		 }else{
		   $cur->next=$child;
		   $child->next=$first;
		   $cur=$cur->next;
		  
		 }
		
	  }
   }
   //�������Ե�С������ʾ�������ͷ$first ��������
   function showChild($first){
     //���� $cur�����ǰ������Ǳ��������������Բ��ܶ���
	 $cur=$first;
	  while($cur->next!=$first){
	   //��ʾ
	   echo '<br/>С���ı����'.$cur->no;
	   $cur=$cur->next;
	  }
	  //���˳�whileѭ��ʱ���Ѿ����˻��������������Ի�Ҫ����һ��������
	  //С���ڵ�
	  //��ʾ
	  echo '<br/>С���ı����'.$cur->no;
   }
  $m=31;
  $k=20;
  //����򻯣��ӵ�һ��С����ʼ������2.������Ȧ��˳��
  function countChild($first,$m,$k){
  //˼������Ϊ�����ҵ�һ��С������Ҫ�����ӻ���������ɾ��
  //Ϊ���ܹ�ɾ��ĳ��С����������Ҫһ�������������ñ���ָ���С��
  //��$firstǰ��
			$tail=$first;
			  while($tail->next!=$first){
				 $tail=$tail->next;
			  }
  //���ǵ��ӵڼ����˿�ʼ����
			for($i=0;$i<$k-1;$i++){
			$tail=$tail->next;
			$first=$first->next;
			}
			//���˳�whileѭ��ʱ�����ǵ�$tail��ָ����������С��
			//��$first��$tail����ƶ�
			//�ƶ�һ�Σ��൱����2�£�
			//�ƶ�2�Σ��൱������3�£���Ϊ�Լ�����ʱ���ǲ���Ҫ���ģ�
			while($tail!=$first){
			//��$tail==$first��˵��ֻ�����һ�����ˡ�
			  for($i=0;$i<$m-1;$i++){
			   $tail=$tail->next;
			   $first=$first->next;
			  }
			  echo '<br/>��Ȧ���˵ı����'.$first->no;
			  //��$firstָ��Ľڵ�С��ɾ����������
			  $first=$first->next;
			  $tail->next=$first;
			}
			echo '<br/>�������ȦȦ���˵ı����'.$tail->no;
  
  }
   addChild($first,$n);
  
   showChild($first);//������
   //������������Ϸ��
   countChild($first,$m,$k);
   ?>


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   


?>
</html>