<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/6.5.3/ajv.min.js"></script>
	<script src="schema.js"></script>
	<script src="data.js"></script>

</head>
<body>
	<script>
		document.addEventListener('DOMContentLoaded', onLoad);
		function onLoad(){
			var ajv=new Ajv();
			var valid=ajv.validate(schema,jsonData);
			if(!valid) console.log(ajv.errors);
		}
	</script>

</body>
</html>
