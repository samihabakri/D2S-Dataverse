<?php
session_start();
function parseJsonUrl($jsonUrl){
    $jsondata = file_get_contents($jsonUrl);
    $json = json_decode($jsondata, true);
    return $json ;
}

function looping($array){
    $x = "<ul>";
    $contact = "no information about contact";
    $cost = "no information about cost";
    $dm_staff = "no information about dmp staff";
    foreach ($array as $key => $value) {
        if(strcmp($key , "project")== 0 || strcmp($key , "dataset")== 0 ){
            continue;
        }else{
            if(is_array($value)){

                foreach($value as $key2 => $value2){
                    if(strcmp($key , "cost")== 0) {
                        $cost= looping($array[$key])[0];
                    }else if(strcmp($key , "contact")== 0) {
                        $contact= looping($array[$key])[0];
                    }else if(strcmp($key , "dm_staff")== 0) {
                        $dm_staff= looping($array[$key])[0];
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
    }
    $x .= "</ul>";
    $returnValue = array($x , $contact , $cost , $dm_staff);
    return $returnValue;
}

?>
<?php
if(isset($_POST['show']) || $_SESSION['jsonUrl']!="") {
    if ($_SESSION['jsonUrl'] == "") {
        $_SESSION['jsonUrl'] = $_POST['tabel'];
        $json = parseJsonUrl($_SESSION['jsonUrl']);

    } else {
        $json = parseJsonUrl($_SESSION['jsonUrl']);
    }
    $dmp = looping($json['dmp']);
}
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
            <p><?php echo $dmp[0] ;?></p>
        </div><!-- contentLeft -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>Contact</h3>
                <p><?php echo $dmp[1] ;?></p>
            </div><!--sidebar element-->
            <div class="sidebar-element">
                <h3>Cost</h3>
                <p><?php echo $dmp[2] ;?></p>
            </div><!--sidebar element-->
            <div class="sidebar-element">
                <h3>Dmp_staff</h3>
                <p><?php echo $dmp[3] ;?></p>
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


