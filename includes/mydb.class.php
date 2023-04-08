<?php
class mydb
{
	function mydb($sqlserver, $sqluser, $sqlpassword, $database, $persistency = true)
	{
		$this->persistency = false;
		$this->user = $sqluser;
		$this->password = $sqlpassword;
		$this->server = $sqlserver;

		if($this->persistency)
		{
			$this->db_connect_id = @mysql_pconnect($this->server, $this->user, $this->password);
		}
		else
		{
			$this->db_connect_id = @mysqli_connect($this->server, $this->user, $this->password);
		}
		if($this->db_connect_id)
		{

			if($database != "")
			{

				$this->dbname = $database;
				$dbselect = @mysqli_select_db($this->dbname);
				if(!$dbselect)
				{
					@mysqli_close($this->db_connect_id);
					$this->db_connect_id = $dbselect;
				}
			}
			return $this->db_connect_id;
		}
		else
		{
			return false;
		}
	}
	
	function query($sql)
	{
		$result = mysqli_query($sql);
		if($result)
		{
			return $result;
		}
		else
		{
			echo mysql_error();
		}
	}

	function fetch_array($result)
	{
		return mysql_fetch_array($result);
	}
	
	function count_row($result)
	{
		return mysql_num_rows($result);
	}
	
	function insert_id()
	{
		return mysql_insert_id();
	}
	
	function redirect($url)
	{
		echo "<script language='javascript'>document.location='".$url."';</script>";
	}
	
	//$my_res=$mydba->select_sql(array("*"),"table_name");
	//$my_res=$mydba->select_sql(array("*"),"table_name","where_field_name='where_field_val'");
	//$my_res=$mydba->update_sql("table_name",array("field1","field2",....),array("val1","val2",....),"where_field_name='where_field_val'");
	//$my_res=$mydba->insert_sql("table_name",array("field1","field2",....),array("val1","val2",....));
	//$my_res=$mydba->delete_sql("table_name","where_field_name='where_field_val'");
	//$my_res=$mydba->execute_sql("enter_here_your_sql");
	
	function select_sql($field_names="*", $table_name, $where_clause="" , $limit_clause="", $getsql="",$fetch="")
	{		
		$i=0;
		$field_part = "";
		foreach($field_names as $field_name)
		{
			if($field_name=="*")
			{
				$field_part .=$field_name.", ";
			}
			else
			{
				$field_part .="'".$field_name."', ";
			}
			$i++;
		}
		$field_part=substr($field_part,0,strlen($field_part)-2);
		if($where_clause == "" && $limit_clause == "")
		{
			$sql = "SELECT ".$field_part." FROM ".$table_name;
		}
		if($where_clause == "" && $limit_clause != "")
		{
			$sql = "SELECT ".$field_part." FROM ".$table_name." LIMIT ".$limit_clause;
		}
		if($where_clause != "" && $limit_clause == "")
		{
			$sql="SELECT ".$field_part." FROM ".$table_name." WHERE ".$where_clause;
		}
		if($where_clause != "" && $limit_clause != "")
		{
			$sql="SELECT ".$field_part." FROM ".$table_name." WHERE ".$where_clause." LIMIT ".$limit_clause;
		}
		if($getsql == "sql")
			return $sql;
		else if($fetch == "fetch")
			return mysql_fetch_array(mysqli_query($sql));
		else
			return mysqli_query($sql);  
	}
	
	function select_field($field_names, $table_name, $where_clause="")
	{		
		if($where_clause=="")
		{
			$sql="SELECT ".$field_names." FROM ".$table_name.";";
		}
		else
		{
			$sql="SELECT ".$field_names." FROM ".$table_name." WHERE ".$where_clause.";";
		}
		$rs=mysqli_query($sql); 
		$row=mysql_fetch_array($rs);
		return($row[$field_names]);
	}
	
	function update_sql($table_name, $field_names, $field_values, $which_record)
	{
		$i=0;
		$set_part='';
		foreach($field_names as $field_name)
		{
			$set_part .=$field_name."='".$field_values[$i]."', ";
			$i++;
		}
		$set_part=substr($set_part,0,strlen($set_part)-2);
		$sql="UPDATE ".$table_name." SET ".$set_part." WHERE ".$which_record.";";
		return mysqli_query($sql);
	}
	
	function insert_sql($table_name, $field_names, $field_values)
	{
		$i=0;
		$field_part='';
		$val_part='';
		foreach($field_names as $field_name)
		{
			$field_part .=$field_name.", ";
			$val_part   .="'".$field_values[$i]."', ";
			$i++;
		}
		$field_part=substr($field_part,0,strlen($field_part)-2);
		$val_part=substr($val_part,0,strlen($val_part)-2);
		$sql="INSERT INTO ".$table_name." (".$field_part.") VALUES (".$val_part.");";
		return mysqli_query($sql);
	}
	
	function delete_sql($table_name, $which_record="")
	{
		if($which_record=="")
		{
			$sql="DELETE FROM ".$table_name.";";
		}
		else
		{
			$sql="DELETE FROM ".$table_name." WHERE ".$which_record.";";
		}
		return mysqli_query($sql);
	}
	
	function addcol_sql($table_name, $field_names, $field_types, $field_sizes)
	{
		$i=0;
		$field_part='';
		$val_part='';
		foreach($field_names as $field_name)
		{
			$query_part.=$field_name." ".$field_types[$i]."(".$field_sizes[$i]."), ";
			$i++;
		}
		$query_part=substr($query_part,0,strlen($query_part)-2);
		$sql="ALTER TABLE ".$table_name." add ".$query_part.";";
		return mysqli_query($sql);
	}
	
	function changecol_sql($table_name, $field_names, $field_types, $field_sizes)
	{
		$i=0;
		$field_part='';
		$val_part='';
		foreach($field_names as $field_name)
		{
			$query_part.=$field_name." ".$field_name." ".$field_types[$i]."(".$field_sizes[$i]."), ";
			$i++;
		}
		$query_part=substr($query_part,0,strlen($query_part)-2);
		$sql="alter table ".$table_name." change ".$query_part.";";
		return mysqli_query($sql);
	}
	
	function delcol_sql($table_name, $field_name)
	{
		$sql="alter table ".$table_name." drop column ".$field_name.";";
		return mysqli_query($sql);
	}
	
	function NumberDisplayTotwodigit($number)
	{
		$n=explode(".",$number);
	
		$cnt=strlen($n[1]);
		//echo $cnt;exit();
		if($cnt == 2)
		{
			return($number);
		}
		else if($cnt == 0)
		{
			return($n[0].".00");
		}
		else if($cnt == 1)
		{
			return($number."0");
		}
		else if($cnt > 2)
		{
			return($n[0].".".substr($n[1],0,2));
		}
	}

    function dbname()
	{
		$r=mysqli_query("SELECT DATABASE()") or die(mysql_error());
    	return($dbname=mysql_result($r,0));
	}
	
	function selectTable($table_name)
	{    
		$myquery="select * from ".$table_name;
		$result=mysqli_query($myquery);
		if($result == 0)
		{
			echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
		}
		elseif (@mysql_num_rows($result) == 0)
		{
			echo("<b>Query completed. No results returned.</b><br>");
		}
		else
		{
			echo "<table border='1' class='mytext4'><tr>";
			for($i=0;$i<mysql_num_fields($result);$i++)
			{
				echo "<th>".mysql_field_name($result,$i)."</th>";
			}
			echo "</tr>";
			for($i=0;$i<mysql_num_rows($result);$i++)
			{
				echo "<tr>";
				$row = mysql_fetch_row($result);
				for($j = 0;$j < mysql_num_fields($result);$j++) 
				{
					echo "<td>".$row[$j]."</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}  
	}
	
}
?>