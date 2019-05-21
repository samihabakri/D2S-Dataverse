  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/6.5.3/ajv.min.js"></script>
  </head>
  <body>
    <h2>Validating maDMP against RDA DMP schema</h2><br>
  	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
      Choose your schema file:
      <br>
      <br>
      <input type='file'  accept=".js,.txt" onchange='openFile(event)'>
      <br>
      <br>

      maDMP:<br><textarea rows="20" cols="100" id="dataID"  placeholder="Paste your maDMP here please!!"></textarea><br><br>
    </form>
    <button onclick="validate_json()">Test Validation</button>
    <br><br>
    <label id="result"></label>

    <script>
      var schemaJSON = '';
     function validate_json()
     {
        var jsonf =document.getElementById("dataID").value ;
        var maDMP = JSON.parse(jsonf.toString());
        var schema = JSON.parse(schemaJSON.toString());


  		var ajv = new Ajv(); // options can be passed, e.g. {allErrors: true}
  		var validate = ajv.compile(schema);
  		var valid = validate(maDMP);
  		if (!valid) {

        document.getElementById('result').innerHTML = "invalid json schema" ;
        console.log("invalid")

      }
      else {
        document.getElementById('result').innerHTML = "valid json schema" ;
        console.log("valid")
      }
    }
    //Open file
    var openFile = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function(){
          var text = reader.result;
          console.log(reader.result);
          schemaJSON = text;

        };
        reader.readAsText(input.files[0]);
      };


  </script>
</body>
</html>



