  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/6.10.0/ajv.min.js"></script>
  </head>
  <body>
    <h2>Validating maDMP against RDA DMP schema</h2><br>
  	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
      Choose your schema file:
      <br>
      <br>
      <input type='file' accept='.json,.txt' onchange='openFile(event)'>
      <br>
      <br>

      maDMP:<br><textarea rows="20" cols="100" id="dataID"  placeholder="Paste your maDMP here please!!"></textarea><br><br>
    </form>
    <button onclick="validate_json()">Test Validation</button>
    <br><br>
    <label id="result"></label>

    <script>
      var schemaFile = '';
     function validate_json()
     {

        var maDMP = JSON.parse(document.getElementById("dataID").value.toString());
        var schema = JSON.parse(schemaFile.toString());
        //console.log(jsonf);
        //console.log("jsonf");
        console.log(maDMP);
        console.log("maDMP");




  		var ajv = new Ajv(); // options can be passed, e.g. {allErrors: true}
  		var validate = ajv.compile(schema);
  		var valid = validate(maDMP);
  		if (!valid) {
        document.getElementById('result').innerHTML = "Not validated maDMP" ;
        console.log("invalid");
      }

      else {
        document.getElementById('result').innerHTML = "Validated maDMP" ;
        console.log("valid");
      }
    }
    //Open file
    var openFile = function(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){

        schemaFile = reader.result;
        console.log("schemaFile");
        console.log(schemaFile);


        };
        reader.readAsText(input.files[0]);
      };


  </script>
</body>
</html>



