  <!DOCTYPE html>
  <html>
  <head>
    <style>
        form {text-align: center;}
        body {background-color: powderblue;}
        h1   {color: blue;
              text-align: center}
        h2   {text-align: center}
        h3   {padding-left: 97px}
        div {margin-left: 100PX}
        #detailedResultID,#invaildresultID {color: red; font-size: 23PX}

    </style>
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ajv/6.10.0/ajv.bundle.js"></script>
    <script src="bundle.js"></script>
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
    <h1>Validating maDMP against RDA DMP schema</h2>
    <h2>Tool for validating machine actionable data management plan against RDA DMP standard schema</h2>
    <h3>maDMP:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
      <textarea style="" rows="30" cols="150" id="dataID"  placeholder="Paste your maDMP here please!!"></textarea><br>
    </form>
    <div>
        <button style="padding: auto; display:block" onclick="validate()">Test Validation</button><br>
        <label id="vaildresultID"></label>
        <label id="invaildresultID"></label><br><br>
        <label id="detailedResultID"></label>
    </div>
    <script type="text/javascript">
      function validate(){
        document.getElementById('vaildresultID').innerHTML = "";
        document.getElementById('invaildresultID').innerHTML = "";
        document.getElementById('detailedResultID').innerHTML = "";
        var maDMP = document.getElementById("dataID").value;
        var maDMPJSON = JSON.parse(maDMP);//.substring(1, maDMP.length));
        var schema = document.getElementById("schmaID").textContent;
        var schemaJSON = JSON.parse(schema.substring(1, schema.length));

        var ajv = new Ajv(); // options can be passed, e.g. {allErrors: true}
        var validate = ajv.compile(schemaJSON);
        var valid = validate(maDMPJSON);
        if (!valid) {
            console.log("validate.errors");
            console.log(validate.errors);
            document.getElementById('invaildresultID').innerHTML = "Not validated maDMP" ;
            document.getElementById('detailedResultID').innerHTML = JSON.stringify(validate.errors, null, 4);
            console.log("invalid");
        }
        else {
            document.getElementById('vaildresultID').innerHTML = "Validated maDMP" ;
            console.log("valid");
        }


      }
    </script>
</body>
</html>
