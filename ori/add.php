<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<title>Add Item</title>
</head>

<body>

<div id="header">
</div>




<div id="wrapper">


		<form method="post" action="do.php"> 
		
			<div align="center">

				<input type="hidden"	name="nAction"		id="idAction"	value="add" />
				<input type="hidden"	name="nDateTime"	id="idDateTime"	value="<?php echo date('Y-m-d H:i:s');?>" />
				<input type="hidden"	name="nUser"		id="idUser"		value="Demo" />
				
				<br />

				<label for="nItem1">Item 1：</label>
				<input name="nItem1" id="idItem1" size="40" type="input"/><br />
				  
				<label for="nDescription1">Description：</label>
				<textarea name="nDescription1" id="idDescription1" rows="3" cols="40"/></textarea>

				<br />

				<label for="nItem2">Item 2：</label>
				<input name="nItem2" id="idItem2" size="40" type="input"/><br />
				  
				<label for="nDescription2">Description：</label>
				<textarea name="nDescription2" id="idDescription2" rows="3" cols="40"/></textarea>

				<br />

				<label for="nItem3">Item 3：</label>
				<input name="nItem3" id="idItem3" size="40" type="input"/><br />
				  
				<label for="nDescription3">Description：</label>
				<textarea name="nDescription3" id="idDescription3" rows="3" cols="40"/></textarea>

				<br />

				<label for="nItem4">Item 4：</label>
				<input name="nItem4" id="idItem4" size="40" type="input"/><br />
				  
				<label for="nDescription4">Description：</label>
				<textarea name="nDescription4" id="idDescription4" rows="3" cols="40"/></textarea>

				<br />

				<label for="nItem5">Item 5：</label>
				<input name="nItem5" id="idItem5" size="40" type="input"/><br />
				  
				<label for="nDescription5">Description：</label>
				<textarea name="nDescription5" id="idDescription5" rows="3" cols="40"/></textarea>


			</div>


		<div align="center">
			<input id="idSubmit" value="Save" type="submit" />
			<input id="idSubmit" value="Reset" type="reset" />
		</div>

	 </form> 



<?php

?>



</div>



</body>
</html>