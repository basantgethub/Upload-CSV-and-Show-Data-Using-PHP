<?php 
if (isset($_FILES['csv']['size']) > 0) { 
    //get the csv file 
    $file = $_FILES['csv']['tmp_name']; 
    $name = $_FILES['csv']['name'];
    //loop through the csv file and insert into database 
	if (($handle = fopen($file,"r")) !== FALSE) {
	   fgetcsv($handle);   
	   while (($data = fgetcsv($handle, 1000, ",","'")) !== FALSE) {
			$num = count($data);
			for ($c=0; $c < $num; $c++) {
			  $col[$c] = $data[$c];
			}
			print_r($col);die;
		}
		fclose($handle);
	}
} 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html>
