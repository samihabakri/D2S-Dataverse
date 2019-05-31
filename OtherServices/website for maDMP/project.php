<?php
session_start();
function getArrayKeysFlat($array) {
    if(!isset($keys) || !is_array($keys)) {
        $keys = array();
    }
    foreach($array as $key => $value) {
        $keys[] = $key;
        if(is_array($value)) {
            $keys = array_merge($keys,getArrayKeysFlat($value));
        }
    }
    return $keys;
}
function parseJsonUrl($jsonUrl){
    $jsondata = file_get_contents($jsonUrl);
    $json = json_decode($jsondata, true);
    return $json ;
}


function checkNull($value){
    if(is_array($value) && sizeof($value)!= 0){
        return $value;
    }
    if(!is_array($value) && $value != ""){
        return $value ;
    }
    return null;
}


function keyExist($searchKey , $arrayOfKeys){
    foreach($arrayOfKeys as $value){
        if(strcmp($searchKey , $value)==0){
            return "Exist" ;
        }
    }
    return "notExist" ;
}

?>
<?php
$json = parseJsonUrl($_SESSION['jsonUrl']);
$keyArray = getArrayKeysFlat($json);
if(strcmp(keyExist("project", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["project"])){
    if (strcmp(keyExist("project_end", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["project"][0]["project_end"])  , "")>0) {
            $project_end = $json["dmp"]["project"][0]["project_end"];
        } else {
            $project_end = "no end date for the project";
        }
    } else {
        $project_end = "no end date for this project";
    }
    if (strcmp(keyExist("funding_status", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["funding_status"])  , "")>0) {
            $funding_status = $json["dmp"]["project"][0]["funding"][0]["funding_status"];
        } else {
            $funding_status = "no funding_status for the project";
        }
    } else {
        $funding_status = "no funding_status for this project";
    }
    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["project"][0]["title"])  , "")>0) {
            $project_title = $json["dmp"]["project"][0]["title"];
        } else {
            $project_title = "no title for the project";
        }
    } else {
        $project_title = "no title for this project";
    }
    if (strcmp(keyExist("project_start", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["project"][0]["project_start"])  , "")>0) {
            $project_start = $json["dmp"]["project"][0]["project_start"];
        } else {
            $project_start = "no start date for the project";
        }
    } else {
        $project_start = "no start date for this project";
    }
    if (strcmp(keyExist("funding", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["project"][0]["funding"])) {
        if (strcmp(keyExist("funder_id", $keyArray) , "Exist")==0) {
            if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id"])  , "")>0) {
                $funder_id = $json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id"];
            } else {
                $funder_id = "no funder_id for the project";
            }
        } else {
            $funder_id = "no funder_id for this project";
        }
    }else {
        $funder_id = "no funder_id for this project";
    }
    if (strcmp(keyExist("funding", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["project"][0]["funding"])) {
        if (strcmp(keyExist("funder_id_type", $keyArray) , "Exist")==0) {
            if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id_type"])  , "")>0) {
                $funder_id_type = $json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id_type"];
            } else {
                $funder_id_type = "no funder_id_type for the project";
            }
        } else {
            $funder_id_type = "no funder_id_type for this project";
        }
    }else {
        $funder_id_type = "no funder_id_type for this project";
    }
    if (strcmp(keyExist("grant_id", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["project"][0]["funding"][0]["grant_id"])) {
        if (strcmp(keyExist("grant_id_type", $keyArray) , "Exist")==0) {
            if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id_type"])  , "")>0) {
                $grant_id_type = $json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id_type"];
            } else {
                $grant_id_type = "no grant_id_type for the project";
            }
        } else {
            $grant_id_type = "no grant_id_type for this project";
        }
    }else {
        $grant_id_type = "no grant_id_type for this project";
    }
    if (strcmp(keyExist("grant_id", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["project"][0]["funding"][0]["grant_id"])) {
        if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id"])  , "")>0) {
            $grant_id = $json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id"];
        }else{
            $grant_id = "no grant_id for the project";
        }
    }else{
        $grant_id = "no grant_id for this project";
    }


}
//if (strcmp(keyExist("project", $keyArray) ,"Exist")==0) {
//    if (strcmp(keyExist("project_end", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["project_end"])  , "")>0) {
//            $project_end = $json["dmp"]["project"][0]["project_end"];
//        } else {
//            $project_end = "no end date for the project";
//        }
//    } else {
//        $project_end = "no end date for this project";
//    }
//}else {
//    $project_end = "no end date for this project";
//}
//if (strcmp(keyExist("project", $keyArray) ,"Exist")==0) {
//    if (strcmp(keyExist("funding_status", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["funding_status"])  , "")>0) {
//            $funding_status = $json["dmp"]["project"][0]["funding"][0]["funding_status"];
//        } else {
//            $funding_status = "no funding_status for the project";
//        }
//    } else {
//        $funding_status = "no funding_status for this project";
//    }
//}else {
//    $funding_status = "no funding_status for this project";
//}
//if (strcmp(keyExist("project", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["project"])) {
//    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["title"])  , "")>0) {
//            $project_title = $json["dmp"]["project"][0]["title"];
//        } else {
//            $project_title = "no title for the project";
//        }
//    } else {
//        $project_title = "no title for this project";
//    }
//}else {
//    $project_title = "no title for this project";
//}
//if (strcmp(keyExist("project", $keyArray) ,"Exist")==0) {
//    if (strcmp(keyExist("project_start", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["project_start"])  , "")>0) {
//            $project_start = $json["dmp"]["project"][0]["project_start"];
//        } else {
//            $project_start = "no start date for the project";
//        }
//    } else {
//        $project_start = "no start date for this project";
//    }
//}else {
//    $project_start = "no start date for this project";
//}
//if (strcmp(keyExist("funding", $keyArray) ,"Exist")==0) {
//    if (strcmp(keyExist("funder_id", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id"])  , "")>0) {
//            $funder_id = $json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id"];
//        } else {
//            $funder_id = "no funder_id for the project";
//        }
//    } else {
//        $funder_id = "no funder_id for this project";
//    }
//}else {
//    $funder_id = "no funder_id for this project";
//}
//if (strcmp(keyExist("funding", $keyArray) ,"Exist")==0) {
//    if (strcmp(keyExist("funder_id_type", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id_type"])  , "")>0) {
//            $funder_id_type = $json["dmp"]["project"][0]["funding"][0]["funder_id"]["funder_id_type"];
//        } else {
//            $funder_id_type = "no funder_id_type for the project";
//        }
//    } else {
//        $funder_id_type = "no funder_id_type for this project";
//    }
//}else {
//    $funder_id_type = "no funder_id_type for this project";
//}
//if (strcmp(keyExist("grant_id", $keyArray) ,"Exist")==0) {
//    if (strcmp(keyExist("grant_id_type", $keyArray) , "Exist")==0) {
//        if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id_type"])  , "")>0) {
//            $grant_id_type = $json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id_type"];
//        } else {
//            $grant_id_type = "no grant_id_type for the project";
//        }
//    } else {
//        $grant_id_type = "no grant_id_type for this project";
//    }
//}else {
//    $grant_id_type = "no grant_id_type for this project";
//}
//if (strcmp(keyExist("grant_id", $keyArray) , "Exist")==0) {
//    if (strcmp(checkNull($json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id"])  , "")>0) {
//        $grant_id = $json["dmp"]["project"][0]["funding"][0]["grant_id"]["grant_id"];
//    }else{
//        $grant_id = "no grant_id for the project";
//    }
//}else{
//    $grant_id = "no grant_id for this project";
//}


$project = "<ul><li>title : " . $project_title . "</li><li>project starts in : " . $project_start . "</li><li>project ends in : " . $project_end . "</li></ul>";

$funding = "<ul>";
$funding .= "<li>funder id : ".$funder_id."</li>";
$funding .= "<li>funder id type : ".$funder_id_type."</li>";
$funding .= "<li>grant id : ".$grant_id."</li>";
$funding .= "<li>grant id type: ".$grant_id_type."</li>";
$funding .= "<li>funding status : ".$funding_status."</li>";
$funding .= "</ul>";
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
            <p><?php echo $project ?></p>
        </div><!-- contentLeft -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>funding</h3>
                <p><?php echo $funding ; ?></p>
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



