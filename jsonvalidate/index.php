<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/6.5.3/ajv.min.js"></script>
	 

</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
		Schema:<br>   <input type="text" name="schema" id="schemaID" value=""><br>
		JSON File:<br><input type="text" name="data" id="dataID" value=""><br><br>
	  		          <input type="submit" value="Test Validation">
	</form>
	 
  	<script>
  		
  		//var schemar=document.getElementById("schemaID").value ;
  		//var jsonf=document.getElementById("dataID").value ;
   		

   		var schema = JSON.parse('{"type": "object","properties":{"firstname":{"type": "string"},"lastname": {"type": "string"},"age": {"type": "integer"}}}');
  		var jsonf = JSON.parse('{"firstname": "Ahmad","lastname": "Alhirthani","age":33}');//if you change 33 into Thirty three the result will change.

				


		var ajv = new Ajv(); // options can be passed, e.g. {allErrors: true}
		var validate = ajv.compile(schema);
		var valid = validate(jsonf);
		if (!valid) {alert("Not validated");}
		else {
			alert("validated");
		}

	
	</script>
</body>
</html>



