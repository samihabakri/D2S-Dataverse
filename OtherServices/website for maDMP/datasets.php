<?php
session_start();
function parseJsonUrl($jsonUrl){
    $jsondata = file_get_contents($jsonUrl);
    $json = json_decode($jsondata, true);
    return $json ;
}

function looping($array){
    $x = "<ul>";
    $distribution = "no information for distribution";
    $security_and_privacy = "no information for security and privacy";
    $metadata = "no information for metadata";
    foreach ($array as $key => $value) {
        if(is_array($value)){
            foreach($value as $key2 => $value2){
                if(strcmp($key2 , "distribution")== 0) {
                    $distribution = looping($array[$key]['distribution'])[0];
                }else if(strcmp($key2 , "metadata")== 0) {
                    $metadata = looping($array[$key]['metadata'])[0];
                }else if(strcmp($key2 , "technical_resource")== 0) {
                    $x.= "<h2>technical_resource</h2>";
                    $x.= looping($array[$key]['technical_resource'])[0];
                }else if(strcmp($key2 , "security_and_privacy")== 0) {
                    $security_and_privacy = looping($array[$key]['security_and_privacy'])[0];
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
    $returnValue = array($x , $distribution , $metadata , $security_and_privacy);
    return $returnValue;
}


?>
<?php
$json = parseJsonUrl($_SESSION['jsonUrl']);
$dataset = looping($json['dmp']['dataset']);

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
            <h1>DMP datasets</h1>
            <p><?php echo $dataset[0];?> </p>
        </div><!-- contentLeft -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>Distribution</h3>
                <p><?php echo $dataset[1];?> </p>
            </div><!--sidebar element-->
            <div class="sidebar-element">
                <h3>Metadata</h3>
                <p><?php echo $dataset[2];?> </p>
            </div><!--sidebar element-->
            <div class="sidebar-element">
                <h3>Security and Privacy</h3>
                <p><?php echo $dataset[3];?> </p>
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


