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
if(isset($_POST['show']) || $_SESSION['jsonUrl']!="") {
    if($_SESSION['jsonUrl'] == ""){
        $_SESSION['jsonUrl'] = $_POST['tabel'];
        $json = parseJsonUrl($_SESSION['jsonUrl']);

    }else{
        $json = parseJsonUrl($_SESSION['jsonUrl']);
    }
    $keyArray = getArrayKeysFlat($json);
    if (strcmp(keyExist("title", $keyArray),"Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["title"]), "")>0) {
            $title = $json["dmp"]["title"];
        } else {
            $title = "no title for this dmp ";
        }
    } else {
        $title = "no title for this dmp ";
    }
    if (strcmp(keyExist("created", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["created"])  , "")>0) {
            $created = $json["dmp"]["created"];
        } else {
            $created = "no created date for this dmp";
        }
    } else {
        $created = "no created date for this dmp";
    }
    if (strcmp(keyExist("description", $keyArray) ,"Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["description"])   , "")>0) {
            $description = $json["dmp"]["description"];
        } else {
            $description = "no key exist";
        }
    } else {
        $description = "no key exist";
    }
    if (strcmp(keyExist("ethical_issues_description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["ethical_issues_description"])   , "")>0) {
            $ethical_issues_description = $json["dmp"]["ethical_issues_description"];
        } else {
            $ethical_issues_description = "no ethical_issues_description for this dmp";
        }
    } else {
        $ethical_issues_description = "no ethical_issues_description for this dmp";
    }
    if (strcmp(keyExist("ethical_issues_exist", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["ethical_issues_exist"])    , "")>0) {
            if ($json["dmp"]["ethical_issues_exist"] == "yes") {
                $ethical_issues_exist = "the dmp has ethical issue";
            } else if ($json["dmp"]["ethical_issues_exist"] == "no") {
                $ethical_issues_exist = "the dmp has not ethical issue";
            } else {
                $ethical_issues_exist = "the dmp has unknown ethical issue";
            }
        } else {
            $ethical_issues_exist = "no ethical_issues_exist for this dmp";
        }
    } else {
        $ethical_issues_exist = "no ethical_issues_exist for this dmp";
    }
    if (strcmp(keyExist("ethical_issues_report", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["ethical_issues_report"]) , "")>0) {
            $ethical_issues_report = $json["dmp"]["ethical_issues_report"];
        } else {
            $ethical_issues_report = "no ethical_issues_report for this report";
        }
    } else {
        $ethical_issues_report = "no ethical_issues_report for this report";
    }
    if (strcmp(keyExist("language", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["language"])   , "")>0) {
            $language = $json["dmp"]["language"];
        } else {
            $language = "no information about language for this dmp";
        }
    } else {
        $language = "no information about language for this dmp";
    }
    if (strcmp(keyExist("modified", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["modified"])   , "")>0) {
            $modified = $json["dmp"]["modified"];
        } else {
            $modified = "no information about language for this dmp";
        }
    } else {
        $modified = "no modified date available for this dmp";
    }
    if (strcmp(keyExist("contact_id", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["contact"]["contact_id"]["contact_id"])   , "")>0) {
            $contact_id = $json["dmp"]["contact"]["contact_id"]["contact_id"];
        } else {
            $contact_id = "no information about contact_id for this dmp";
        }
    } else {
        $language = "no information about contact_id for this dmp";
    }
    if (strcmp(keyExist("contact_id_type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["contact"]["contact_id"]["contact_id_type"])   , "")>0) {
            $contact_id_type = $json["dmp"]["contact"]["contact_id"]["contact_id_type"];
        } else {
            $contact_id_type = "no contact_id_type for this dmp";
        }
    } else {
        $contact_id_type = "no contact_id_type for this dmp";
    }
    if (strcmp(keyExist("name", $keyArray) ,"Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["contact"]["name"])   , "")>0) {
            $contact_name = $json["dmp"]["contact"]["name"];
        } else {
            $contact_name = "no contact name for this dmp";
        }
    } else {
        $contact_name = "no contact name for this dmp";
    }
    if (strcmp(keyExist("mail", $keyArray) ,"Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["contact"]["mail"])   , "")>0) {
            $contact_mail = $json["dmp"]["contact"]["mail"];
        } else {
            $contact_mail = "no contact mail for this dmp";
        }
    } else {
        $contact_mail = "no contact mail for this dmp";
    }
    if (strcmp(keyExist("currency_code", $keyArray) ,"Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["cost"]["currency_code"])   , "")>0) {
            $currency_code = $json["dmp"]["cost"]["currency_code"];
        } else {
            $currency_code = "no currency_code for this dmp";
        }
    } else {
        $currency_code = "no currency_code for this dmp";
    }
    if (strcmp(keyExist("cost", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["cost"])) {
        if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
            if (strcmp(checkNull($json["dmp"]["cost"]["description"])  , "")>0) {
                $cost_description = $json["dmp"]["cost"]["description"];
            } else {
                $cost_description = "no description for the cost";
            }
        } else {
            $cost_description = "no description for this cost";
        }
    }else {
        $cost_description = "no description for this cost";
    }
    if (strcmp(keyExist("cost", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["cost"])) {
        if (strcmp(keyExist("title", $keyArray) ,"Exist")==0) {
            if (strcmp(checkNull($json["dmp"]["cost"]["title"])    , "")>0) {
                $cost_title = $json["dmp"]["cost"]["title"];
            } else {
                $cost_title = "no title for the cost";
            }
        } else {
            $cost_title = "no title for this cost";
        }
    }else{
        $cost_title = "no title for this cost";
    }
    if (strcmp(keyExist("value", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["cost"]["value"])    , "")>0) {
            $cost_value = $json["dmp"]["cost"]["value"];
        } else {
            $cost_value = "no cost_value for this dmp";
        }
    } else {
        $cost_value = "no cost_value for this dmp";
    }
    if (strcmp(keyExist("contributor_type", $keyArray) ,"Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dm_staff"]["contributor_type"])   , "")>0) {
            $contributor_type = $json["dmp"]["dm_staff"]["contributor_type"];
        } else {
            $contributor_type = "no contributor_type for this dm_staff";
        }
    } else {
        $contributor_type = "no contributor_type for this dm_staff";
    }
    if (strcmp(keyExist("mbox", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dm_staff"]["mbox"])    , "")>0) {
            $mbox = $json["dmp"]["dm_staff"]["mbox"];
        } else {
            $mbox = "no mbox information for this dm_staff";
        }
    } else {
        $mbox = "no mbox information for this dm_staff";
    }
    if(strcmp(keyExist("dm_staff", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["dm_staff"])){
        if (strcmp(keyExist("name", $keyArray) , "Exist")==0) {
            if (strcmp(checkNull($json["dmp"]["dm_staff"]["name"])    , "")>0) {
                $dm_staff_name = $json["dmp"]["dm_staff"]["name"];
            } else {
                $dm_staff_name = "no name for this dm_staff";
            }
        } else {
            $dm_staff_name = "no name for this dm_staff";
        }
    }else{
        $dm_staff_name = "no name for this dm_staff";
    }
    if(strcmp(keyExist("dm_staff", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["dm_staff"])) {
        if (strcmp(keyExist("staff_id_type", $keyArray), "Exist") == 0) {
            if (strcmp(checkNull($json["dmp"]["dm_staff"]["staff_id"]["staff_id_type"]), "") > 0) {
                $staff_id_type = $json["dmp"]["dm_staff"]["staff_id"]["staff_id_type"];
            } else {
                $staff_id_type = "no staff_id_type for this dm_staff";
            }
        } else {
            $staff_id_type = "no staff_id_type for this dm_staff";
        }
    }else{
        $staff_id_type = "no staff_id_type for this dm_staff";
    }
    if (strcmp(keyExist("dmp_id", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dmp_id"]["dmp_id"])   , "")>0) {
            $dmp_id = $json["dmp"]["dmp_id"]["dmp_id"];
        } else {
            $dmp_id = "no dmp_id for this dmp";
        }
    } else {
        $dmp_id = "no dmp_id for this dmp";
    }
    if (strcmp(keyExist("dmp_id_type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dmp_id"]["dmp_id_type"])    , "")>0) {
            $dmp_id_type = $json["dmp"]["dmp_id"]["dmp_id_type"];
        } else {
            $dmp_id_type = "no dmp_id_type for this dmp";
        }
    } else {
        $dmp_id_type = "no dmp_id_type for this dmp";
    }

    $cost = "<ul><li>title : " . $cost_title . "</li><li>description : " . $cost_description . "</li><li>value : " . $cost_value . "</li><li>currency_code : " . $currency_code . "</li></ul>";
    $dm_staff = "<ul><li>name : " . $dm_staff_name . "</li><li>contributor_type :" . $contributor_type . "</li><li>mbox :" . $contributor_type . "</li><li>staff_id_type :" . $staff_id_type . "</li></ul>>";
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
            <h1><?php echo $title ;?></h1>
            <p>this dmp is  : <?php echo $description ;?></p>
            <p>and created on : <?php echo $created ;?> and modified on :<?php echo $modified; ?></p>
            <p>this dmp is written in the language that its key is : <?php echo $language ;?>. and <?php echo $ethical_issues_exist;?> </p>
            <h2> dmp costs </h2>
            <p><?php echo $cost;?> </p>
            <h2> ethical_issues_report </h2>
            <p><?php echo $ethical_issues_report;?> </p>
            <h2> ethical_issues_description </h2>
            <p><?php echo $ethical_issues_description;?> </p>
        </div><!-- contentLeft -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>Contact</h3>
                <ul>
                    <ul>
                        <li>contact_id : <?php echo $contact_id ;?> </li>
                        <li>contact_id_type : <?php echo $contact_id_type ;?> </li>
                    </ul>
                    <li>Name : <?php echo $contact_name ;?> </li>
                    <li>Mail : <?php echo $contact_mail ;?> </li>
                </ul>
            </div><!--sidebar element-->
            <div class="sidebar-element">
                <h3>Data Management Staff</h3>
                    <?php echo $dm_staff ;?>
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



