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

}
?>

        <html>

        <head>
            <meta charset="UTF-8">
            <title>json object display</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>

        <body>
            <div id="header">
                <a href="main.php"><img src="images/tuwienLogo.png" alt="logo"></a>
                <h1>JSON Object Displayer</h1>
            </div>
            <!-- HEADER -->
            <div id="navigation">
                <ul>
                    <li><a href="main.php">Dmp</a></li>
                    <li><a href="project.php">Project</a></li>
                    <li><a href="datasets.php">Datasets</a></li>
                </ul>
                <!--navigation unordered list-->
            </div>
            <!-- NAVIGATION -->
            <div id="container">
                <div id="content">
                    <div id="contentLeft">

                        <h1>
                            <?php echo $title ;?>
                        </h1>
                        <ul itemscope itemtype="http://schema.org/Report">
                            <li>title :<span itemprop="name"><?php echo $title ;?></span></li>
                            <li>description :<span itemprop="description"><?php echo $description ;?></span></li>
                            <li>created on :
                                <span itemprop="datePublished"><?php echo $created ;?></span></li>
                            <li>modified : <span itemprop="dateModified"><?php echo $modified; ?></span></li>
                            <li>dmp is written in the language :<span itemprop="inLanguage"><?php echo $language ;?></span>
                            </li>
                            <li>ethical_issues_exist :
                                <?php echo $ethical_issues_exist; ?>
                            </li>
                        </ul>
                        <h2> dmp costs </h2>
                        <ul itemscope itemtype="http://schema.org/PriceSpecification">
                            <li>title : <span itemprop="name"></span>
                                <?php echo $cost_title ;?>
                            </li>
                            <li>description :<span itemprop="description"> <?php echo $cost_description ;?></span></li>
                            <li>value : <span itemprop="price" itemprop="price"><?php echo $cost_value; ?></span></li>
                            <li>currency_code :<span itemprop="priceCurrency"> <?php echo $currency_code ;?></span></li>
                        </ul>
                        <h2> ethical_issues_report </h2>
                        <p itemscope itemtype="http://schema.org/Organization"><span itemprop="ethicsPolicy"><?php echo $ethical_issues_report;?></span></p>
                        <h2> ethical_issues_description </h2>
                        <p>
                            <?php echo $ethical_issues_description;?> </p>

                    </div>
                    <!-- contentLeft -->
                    <div id="sidebar">
                        <div class="sidebar-element">
                            <h3>Contact</h3>
                            <ul itemscope itemtype="http://schema.org/Person/ContactPoint">
                                <li>contact_id :<span itemprop="url"><?php echo $contact_id ;?></span></li>
                                <li>contact_id_type :<span><?php echo $contact_id_type ;?></span></li>
                                <li>name: <span itemprop="name"><?php echo $contact_name ;?></span></li>
                                <li>Mail : <span itemprop="email"><?php echo $contact_mail ;?></span></li>
                            </ul>
                        </div>
                        <!--sidebar element-->
                        <div class="sidebar-element">
                            <h3>Data Management Staff</h3>
                            <ul>
                                <li>name :
                                    <?php echo $dm_staff_name ;?>
                                </li>
                                <li>contributor_type :
                                    <?php echo $contributor_type ;?>
                                </li>
                                <li>mbox :
                                    <?php echo $contributor_type; ?>
                                </li>
                                <li>staff_id_type :
                                    <?php echo $staff_id_type ;?>
                                </li>
                            </ul>

                        </div>
                        <!--sidebar element-->
                    </div>
                    <!-- sidebar -->
                </div>
                <!-- content -->
            </div>
            <!-- container -->
            <div id="footer">
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="">contact us</a></li>
                    <li><a href="">about us</a></li>
                </ul>
                <!--footer unordered list-->
                <p>&copy;2019 RamiAttaallah.com</p>
            </div>
            <!-- FOOTER -->

        </body>

        </html>
