<?php
class myfunctions
{
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
	}
	
	function incoming($str)
	{
		return(addslashes(htmlspecialchars($str)));
	} 
	
	function outgoing($str)
	{
		$str=str_replace("'","&rsquo;",$str);
		return(stripslashes(htmlspecialchars_decode($str)));
	}
	
	function setURL($str)
	{
		$str=str_replace("/","-",str_replace(" ","-",$this->outgoing($str)));
		return($str);
	}
	/*
	function settingName($id,$sql)
	{
		$myval=$sql->select_field("setting_name","tbl_settings","setting_id='$id'");
		return($this->outgoing($myval));
	}
	
	function settingValue($id,$sql)
	{
		$myval=$sql->select_field("setting_value","tbl_settings","setting_id='$id'");
		return($this->outgoing($myval));
	}
	*/
	function settingValue($setting_name,$sql)
	{
		$myval=$sql->select_field("setting_value","tbl_settings","setting_name='$setting_name'");
		return($this->outgoing($myval));
	}
		
	function getEmail($sql)
	{
		$myval=$sql->select_field("admin_email","tbl_admin","admin_id=1");
		return($myval);
	}
	
	function setEmail($email,$sql)
	{
		$sql->update_sql("tbl_admin",array("admin_email"),array($email),"admin_id=1");
		return;
	}
	
	function showContent($sn,$sql)
	{
		$fquery=$sql->select_sql(array("*"),"tbl_contents","sn='$sn'");
		$frow=$sql->fetch_array($fquery);
		return($this->outgoing($frow['content']));
	}
	
	function showMessage()
	{
		$fquery=$sql->select_sql(array("*"),"tbl_message");
		$frow=$sql->fetch_array($fquery);
		return($this->outgoing($frow[3]));
	}
	
	function titleTag($sn,$sql)
	{
		$fquery=$sql->select_sql(array("*"),"tbl_contents","sn='$sn'");
		$frow=$sql->fetch_array($fquery);
		if(empty($frow['title_tag']) and $sn!=1)
		{
			return $this->titleTag(1,$sql);
		}
		return($this->outgoing($frow['title_tag']));
	}
	
	function metaKeywords($sn,$sql)
	{
		$fquery=$sql->select_sql(array("*"),"tbl_contents","sn='$sn'");
		$frow=$sql->fetch_array($fquery);
		if(empty($frow['meta_keywords']) and $sn!=1)
		{
			return $this->metaKeywords(1,$sql);
		}
		return($this->outgoing($frow['meta_keywords']));
	}
	
	function metaDescription($sn,$sql)
	{
		$fquery=$sql->select_sql(array("*"),"tbl_contents","sn='$sn'");
		$frow=$sql->fetch_array($fquery);
		if(empty($frow['meta_description']) and $sn!=1)
		{
			return $this->metaDescription(1,$sql);
		}
		return($this->outgoing($frow['meta_description']));
	}
	
	function showTitle($sn,$sql)
	{
		$fquery=$sql->select_sql(array("*"),"tbl_contents","sn='$sn'");
		$frow=$sql->fetch_array($fquery);
		return($this->outgoing($frow['location']));
	}
	
	function redirect($url,$msg="")
	{
		if($msg=="")
		{
			echo "<script language='javascript'>document.location='".$url."';</script>";
		}
		else
		{
			echo "<script language='javascript'>alert('".$msg."')</script>";
			echo "<script language='javascript'>document.location='".$url."'</script>";
		}
	}
	
	function findexts($filename) 
	{ 
		$filename=strtolower($filename); 
		$exts=split("[/\\.]",$filename); 
		$n=count($exts)-1; 
		$exts=$exts[$n]; 
		return $exts; 
	}
	
	
	
	function showTitleList($myname,$selected="Mr")
	{
		?>
		<select name='<?php echo $myname; ?>' style="width: 50px">
			<option value='Mrs' <?php if($selected=="Mrs") echo "selected"; ?>> Mrs </option>		
			<option value='Miss' <?php if($selected=="Miss") echo "selected"; ?>> Miss </option>		
			<option value='Ms' <?php if($selected=="Ms") echo "selected"; ?>> Ms </option>		
			<option value='Mr' <?php if($selected=="Mr") echo "selected"; ?>> Mr </option>		
			<option value='Dr' <?php if($selected=="Dr") echo "selected"; ?>> Dr </option>		
		</select>
		<?php
	}
	}
	?>
    
	