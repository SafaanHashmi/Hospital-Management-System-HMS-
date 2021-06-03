<?php
	function pr($arr)
	{
		echo"<pre>";
		print_r($arr);
	}
	
	function prx($arr)
	{
		echo"<pre>";
		print_r($arr);
		die();
	}

	function get_safe_value($con,$str)
	{
		if($str!='')
		{
			$str=trim($str);
			return mysqli_real_escape_string($con,$str);
		}
	}


    function get_product($con,$limit='',$cat_id='',$product_id='')
	{
		$sql="select product.*,category.Categories from product,category where product.Status=1 ";
		if($cat_id!='')
		{
			$sql.=" and product.categories_id= $cat_id ";
		}
		if($product_id!='')
		{
			$sql.=" and product.ID= $product_id ";
		}
		$sql.=" and product.categories_id= category.ID ";
		$sql.=" order by product.ID desc";
		if($limit!='')
		{
			$sql.=" limit $limit";
		}
		$res=mysqli_query($con,$sql);
		$data=array();
		while($row=mysqli_fetch_assoc($res))
		{
			$data[]=$row;
		}
		return $data;
	}
	

?>