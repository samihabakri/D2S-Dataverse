<?php
session_start();
function parseJsonUrl($jsonUrl){
    $jsondata = file_get_contents($jsonUrl);
    $json = json_decode($jsondata, true);
    return $json ;
}

function looping($array){
    $x = "<ul>";
    $funding = "no information about funding";
    foreach ($array as $key => $value) {
        if(is_array($value)){
            foreach($value as $key2 => $value2){
                if(strcmp($key2 , "funding")== 0) {
                    $funding = looping($array[$key]['funding'])[0];
                }else{
                    if(is_array($value2)){
                        $x.= "<ul>".looping($value2)[0]."</ul>";
                    }else{
                        $x.= "<li>".$key2." == ".$value2."</li>";
                    }
                }
            }
        }else{
            $x.= "<li>".$key." == ".$value."</li>";
        }
    }
    $x .= "</ul>";
    $returnValue = array($x , $funding);
    return $returnValue;
}


?>
<?php
$json = parseJsonUrl($_SESSION['jsonUrl']);
$projectValue = looping($json['dmp']['project']);

 ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>json object display</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div id="header">
    <a href="main.php"><img src="images/tuwienLogo.png" alt="logo"></a><h1>JSON Object Displayer</h1>
</div><!-- HEADER -->
<div id="navigation">
    <ul>
        <li><a href="main.php">Dmp</a></li>
        <li><a href="project.php">Project</a></li>
        <li><a href="datasets.php">Datasets</a></li>
    </ul><!--navigation unordered list-->
</div><!-- NAVIGATION -->
<div id="container">
    <div id="content">
        <div id="contentLeft">
            <h1>DMP project/s</h1>
            <p><?php echo $projectValue[0] ?></p>
        </div><!-- contentLeft -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>Funding</h3>
                <p><?php echo $projectValue[1] ?></p>
            </div><!--sidebar element-->
        </div><!-- sidebar -->
    </div><!-- content -->
</div><!-- container -->
<div id="footer">
    <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="">contact us</a></li>
        <li><a href="">about us</a></li>
    </ul><!--footer unordered list-->
    <p>&copy;2019 howtodisplayjsonobject.com</p>
</div><!-- FOOTER -->
</body>
</html>



