<!DOCTYP HTML>
<html>

<head>
  <link rel="stylesheet" href="style.css" >

<style>
    h1{
        color: #fff;
    }

</style>
</head>
<body>
<?php
function recursion_print($element){
        $count = 1;
    
        foreach($element as $key => $value){
            if(is_array($value)){
                echo "<h1>".$key."</h1>";
                $count+= 1;
                recursion_print($value);
            }else{
                 echo "
                        <table>
                            <tr>
                                <th>".$key."</th>
                            </tr>
                    <tr>
                   <td>".$value."</td>
                    </tr>"; 
                    echo "</table>";
            }
        }
}
    
    
    echo"<a";
?>
<?php
    
    
    if(isset($_POST['show']) ){
        
        
        
   
//we can put the url instead of the file name so we take the url from the user and put it as a parameter of the file_get_content() method
$jsondata = file_get_contents($_POST['tabel']);
$json = json_decode($jsondata , true);
recursion_print($json);
        }
?>
     
    </body>

</html>