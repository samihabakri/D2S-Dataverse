  <!DOCTYPE html>
  <html>
  <head>
  	<title>
    </title>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/6.10.0/ajv.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  </head>
  <body>
    <textarea rows="5" cols="5" id="vocabularyID" style="display:none;" >
        <?php
        $myfile = fopen("vocabulary.json", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("vocabulary.json"));
        fclose($myfile);
        ?>
    </textarea>
    <label id="schmaID" style="display:none;"><?php
        $myfile = fopen("schema.json", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("schema.json"));
        fclose($myfile);
        ?>
    </label>
    <br>
    <h2>Validating maDMP against RDA DMP schema</h2>
    <br>
    maDMP:
  	<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
      <br>
      <textarea rows="20" cols="100" id="dataID"  placeholder="Paste your maDMP here please!!"></textarea><br>
    </form>
    <button onclick="validate()">Test Validation</button>
    <br><br>
    <label id="resultID"></label>
    <br>
    <label id="detailedResultID"></label>

    <script type="text/javascript">
      var maDMP;
      var maDMPJSON;
      var schema;
      var schemaJSON;
      var vocabulary;
      var vocabularyJSON;




      //var maDMPJSON=JSON.parse(maDMP.substring(1, maDMP.length));




      function validate()
      {
        var maDMP = document.getElementById("dataID").value;
        console.log("maDMP");
        console.log(maDMP);

        var maDMPJSON = JSON.parse(maDMP);//.substring(1, maDMP.length));
        console.log("maDMPJSON");
        console.log(maDMPJSON);

        var schema = document.getElementById("schmaID").textContent;
        console.log("schema");
        console.log(schema);

        var schemaJSON = JSON.parse(schema.substring(1, schema.length));
        console.log("schemaJSON");
        console.log(schemaJSON);

        var vocabulary = document.getElementById("vocabularyID").textContent;
        console.log("vocabulary");
        console.log(vocabulary);

        var vocabularyJSON = JSON.parse(vocabulary);
        console.log("vocabularyJSON");
        console.log(vocabularyJSON);


        var ajv = new Ajv(); // options can be passed, e.g. {allErrors: true}
        //ajv.addMetaSchema(require('ajv/lib/refs/json-schema-draft-06.json'));
    		var validate = ajv.compile(schemaJSON);
    		var valid = validate(maDMPJSON);
    		if (!valid) {
          document.getElementById('resultID').innerHTML = "Not validated maDMP" ;
          console.log("invalid");
          validate_voc(vocabularyJSON,maDMPJSON);
        }

        else {
          document.getElementById('resultID').innerHTML = "Validated maDMP" ;
          console.log("valid");
          validate_voc(vocabulary,maDMPJSON);
        }
      }













  </script>
</body>
</html>



