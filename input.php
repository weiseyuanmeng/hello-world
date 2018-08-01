<?php
class input{

	//定义函数，对数据进行检查
	function post( $content ){
		if( $content == '' ){
			return false;
		}
		else{
				
			//禁止使用的用户名
			$n = array('江泽民','毛泽东','习近平');
			foreach( $n as $name ){
				if( $content == $name ){
					return false;
				}
			}

			return true;
		}

	}
}