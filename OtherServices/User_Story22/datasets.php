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
if (strcmp(keyExist("sensitive_data", $keyArray) , "Exist")==0) {
    if (strcmp(checkNull($json["dmp"]["dataset"][0]["sensitive_data"])    , "")>0) {
        if ($json["dmp"]["dataset"][0]["sensitive_data"] == "yes") {
            $sensitive_data = "this dataset has sensitive_data ";
        }  else if ($json["dmp"]["dataset"][0]["sensitive_data"] == "no") {
            $sensitive_data = "this dataset hasnot any sensitive_data ";
        } else if ($json["dmp"]["dataset"][0]["sensitive_data"] == "unknown") {
            $sensitive_data = "this dataset has an unknown sensitive_data";
        } else {
            $sensitive_data= "";
        }
    } else {
        $sensitive_data= "";
    }
} else {
    $sensitive_data= "";
}
if (strcmp(keyExist("personal_data", $keyArray) , "Exist")==0) {
    if (strcmp(checkNull($json["dmp"]["dataset"][0]["personal_data"])    , "")>0) {
        if ($json["dmp"]["dataset"][0]["personal_data"] == "yes") {
            $personal_data = "this dataset has personal_data ";
        }  else if ($json["dmp"]["dataset"][0]["personal_data"] == "no") {
            $personal_data = "this dataset hasnot any personal_data ";
        } else if ($json["dmp"]["dataset"][0]["personal_data"] == "unknown") {
            $personal_data = "this dataset has an unknown personal_data";
        } else {
            $personal_data= "";
        }
    } else {
        $personal_data= "";
    }
} else {
    $personal_data= "";
}

if(strcmp(keyExist("dataset", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"])){

   if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["title"])  , "")>0) {
            $dataset_title = $json["dmp"]["dataset"][0]["title"];
        } else {
            $dataset_title = "";
        }
    } else {
        $dataset_title = "";
    }
    if (strcmp(keyExist("type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["type"])  , "")>0) {
            $dataset_type = $json["dmp"]["dataset"][0]["type"];
        } else {
            $dataset_type = "";
        }
    } else {
        $dataset_type = "";
    }

    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["description"])  , "")>0) {
            $dataset_description = $json["dmp"]["dataset"][0]["description"];
        } else {
            $dataset_description = "";
        }
    } else {
        $dataset_description = "";
    }

    if (strcmp(keyExist("preservation_statement", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["preservation_statement"])  , "")>0) {
            $preservation_statement = $json["dmp"]["dataset"][0]["preservation_statement"];
        } else {
            $preservation_statement = "";
        }
    } else {
        $preservation_statement = "";
    }
    if (strcmp(keyExist("data_quality_assurance", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["data_quality_assurance"])  , "")>0) {
            $data_quality_assurance = $json["dmp"]["dataset"][0]["data_quality_assurance"];
        } else {
            $data_quality_assurance = "";
        }
    } else {
        $data_quality_assurance = "";
    }

    if (strcmp(keyExist("issued", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["issued"])  , "")>0) {
            $issued = $json["dmp"]["dataset"][0]["issued"];
        } else {
            $issued = "";
        }
    } else {
        $issued = "";
    }

    if (strcmp(keyExist("keyword", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["keyword"])  , "")>0) {
            $keyword = $json["dmp"]["dataset"][0]["keyword"];
        } else {
            $keyword = "";
        }
    } else {
        $keyword = "";
    }

    if (strcmp(keyExist("dataset_id", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["dataset_id"]["dataset_id"])  , "")>0) {
            $dataset_id = $json["dmp"]["dataset"][0]["dataset_id"]["dataset_id"];
        } else {
            $dataset_id = "";
        }
    } else {
        $dataset_id = "";
    }

    if (strcmp(keyExist("dataset_id_type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["dataset_id"]["dataset_id_type"])  , "")>0) {
            $dataset_id_type = $json["dmp"]["dataset"][0]["dataset_id"]["dataset_id_type"];
        } else {
            $dataset_id_type = "";
        }
    } else {
        $dataset_id_type = "";
    }

}else{
    $dataset_id_type = "";
    $preservation_statement = "";
    $dataset_type = "";
    $dataset_title = "";
    $dataset_description = "";
    $data_quality_assurance = "";
    $dataset_id = "";
    $keyword = "";
    $issued = "";
}


if (strcmp(keyExist("distribution", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"])) {

    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["title"])  , "")>0) {
            $distribution_title = $json["dmp"]["dataset"][0]["distribution"][0]["title"];
        } else {
            $distribution_title = "";
        }
    } else {
        $distribution_title = "";
    }

    if (strcmp(keyExist("descript", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["description"])  , "")>0) {
            $distribution_description  = $json["dmp"]["dataset"][0]["distribution"][0]["description"];
        } else {
            $distribution_description  = "";
        }
    } else {
        $distribution_description = "";
    }

    if (strcmp(keyExist("format", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["format"])  , "")>0) {
            $distribution_format   = $json["dmp"]["dataset"][0]["distribution"][0]["format"];
        } else {
            $distribution_format   = "";
        }
    } else {
        $distribution_format  = "";
    }

    if (strcmp(keyExist("byte_size", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["byte_size"])  , "")>0 ) {
            $byte_size   = $json["dmp"]["dataset"][0]["distribution"][0]["byte_size"];
        } else {
            $byte_size  = "";
        }
    } else {
        $byte_size  = "";
    }
    if (strcmp(keyExist("data_access", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["data_access"])  , "")>0) {
            $data_access   = $json["dmp"]["dataset"][0]["distribution"][0]["data_access"];
        } else {
            $data_access  = "";
        }
    } else {
        $data_access  = "";
    }


}else {
    $distribution_title = "";
    $distribution_description = "";
    $distribution_format  = "";
    $byte_size  = "";
    $data_access  = "";

}


if (strcmp(keyExist("host", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"])) {

    if (strcmp(keyExist("availability", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["availability"])  , "")>0) {
            $availability   = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["availability"];
        } else {
            $availability = "";
        }
    } else {
        $availability  = "";
    }

    if (strcmp(keyExist("backup__frequency", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup__frequency"])  , "")>0) {
            $backup__frequency  = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup__frequency"];
        } else {
            $backup__frequency = "";
        }
    } else {
        $backup__frequency = "";
    }

    if (strcmp(keyExist("backup_type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup_type"])  , "")>0) {
            $backup_type = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup_type"];
        } else {
            $backup_type = "";
        }
    } else {
        $backup_type = "";
    }

    if (strcmp(keyExist("certified_with", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["certified_with"])  , "")>0) {
            $certified_with = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["certified_with"];
        } else {
            $certified_with = "";
        }
    } else {
        $certified_with = "";
    }

    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["description"])  , "")>0) {
            $host_description = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["description"];
        } else {
            $host_description = "";
        }
    } else {
        $host_description = "";
    }

    if (strcmp(keyExist("geo_location", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["geo_location"])  , "")>0) {
            $geo_location = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["geo_location"];
        } else {
            $geo_location = "";
        }
    } else {
        $geo_location = "";
    }

    if (strcmp(keyExist("pid_system", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["pid_system"])  , "")>0) {
            $pid_system = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["pid_system"];
        } else {
            $pid_system = "";
        }
    } else {
        $pid_system = "";
    }
    if (strcmp(keyExist("support_versioning", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["support_versioning"])  , "")>0) {
            $support_versioning = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["support_versioning"];
        } else {
            $support_versioning = "";
        }
    } else {
        $support_versioning = "";
    }

    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["title"])  , "")>0) {
            $host_title = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["title"];
        } else {
            $host_title = "";
        }
    } else {
        $host_title = "";
    }

    if (strcmp(keyExist("access_url", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["access_url"])  , "")>0) {
            $access_url = $json["dmp"]["dataset"][0]["distribution"][0]["access_url"];
        } else {
            $access_url = "";
        }
    } else {
        $access_url = "";
    }

    if (strcmp(keyExist("download_url", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["download_url"])  , "")>0) {
            $download_url = $json["dmp"]["dataset"][0]["distribution"][0]["download_url"];
        } else {
            $download_url = "";
        }
    } else {
        $download_url = "";
    }

    if (strcmp(keyExist("available_till", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["available_till"])  , "")>0) {
            $available_till   = $json["dmp"]["dataset"][0]["distribution"][0]["available_till"];
        } else {
            $available_till  = "";
        }
    } else {
        $available_till  = "";
    }

}else {
    $availability  = "";
    $backup__frequency = "";
    $backup_type = "";
    $certified_with = "";
    $host_description = "";
    $geo_location = "";
    $pid_system = "";
    $support_versioning = "";
    $host_title = "";
    $access_url = "";
    $download_url = "";
    $available_till  = "";

}


if (strcmp(keyExist("license", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"])) {
    if (strcmp(keyExist("license_ref", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"][0]["license_ref"]),"")>0) {
            $license_ref = $json["dmp"]["dataset"][0]["distribution"][0]["license"][0]["license_ref"];
        } else {
            $license_ref = "";
        }
    } else {
        $license_ref = "";
    }
}else {
    $license_ref = "";
}

if (strcmp(keyExist("license", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"])) {
    if (strcmp(keyExist("start_date", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"][0]["start_date"])  , "")>0) {
            $start_date = $json["dmp"]["dataset"][0]["distribution"][0]["license"][0]["start_date"];
        } else {
            $start_date = "";
        }
    } else {
        $start_date = "";
    }
}else {
    $start_date = "";
}




if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("descriptio", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["description"])  , "")>0) {
            $metadata_description = $json["dmp"]["dataset"][0]["metadata"]["description"];
        } else {
            $metadata_description = "";
        }
    } else {
        $metadata_description = "";
    }
}else {
    $metadata_description = "";
}
if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("languag", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["language"])  , "")>0) {
            $metadata_language = $json["dmp"]["dataset"][0]["metadata"]["language"];
        } else {
            $metadata_language = "";
        }
    } else {
        $metadata_language = "";
    }
}else {
    $metadata_language = "";
}

if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("metadata_i", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"])) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id"])  , "")>0) {
            $metadata_id = $json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id"];
        } else {
            $metadata_id = "";
        }
    } else {
        $metadata_id = "";
    }
}else {
    $metadata_id = "";
}

if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("metadata_id_typ", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"])) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id_type"])  , "")>0) {
            $metadata_id_type = $json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id_type"];
        } else {
            $metadata_id_type = "";
        }
    } else {
        $metadata_id_type = "";
    }
}else {
    $metadata_id_type = "";
}

if (strcmp(keyExist("security_and_privacy", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["security_and_privacy"])) {
    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["security_and_privacy"][0]["description"])  , "")>0) {
            $sac_description = $json["dmp"]["security_and_privacy"][0]["description"];
        } else {
            $sac_description= "";
        }
    } else {
        $sac_description= "";
    }
}else {
    $sac_description= "";
}

if (strcmp(keyExist("security_and_privacy", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["security_and_privacy"])) {
    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["security_and_privacy"][0]["title"])  , "")>0) {
            $sac_title = $json["dmp"]["security_and_privacy"][0]["title"];
        } else {
            $sac_title= "";
        }
    } else {
        $sac_title= "";
    }
}else {
    $sac_title= "";
}

if (strcmp(keyExist("technical_resource", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["technical_resource"])) {
    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["technical_resource"]["description"])  , "")>0) {
            $tr_description = $json["dmp"]["dataset"][0]["technical_resource"]["description"];
        } else {
            $tr_description = "";
        }
    } else {
        $tr_description = "";
    }
}else {
    $tr_description = "";
}
?>

<html><head>
    <meta charset="UTF-8"/>
    <title>json object display</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="header">
    <a href="main.php"><img src="images/tuwienLogo.png" alt="logo"/></a><h1>JSON Object Displayer</h1>
</div><!--  HEADER  -->
<div id="navigation">
    <ul>
        <li><a href="main.php">Dmp</a></li>
        <li><a href="project.php">Project</a></li>
        <li><a href="datasets.php">Datasets</a></li>
    </ul><!-- navigation unordered list -->
</div><!--  NAVIGATION  -->
<div id="container">
    <div id="content">
        <div id="contentLeft">
            <h1>DMP datasets</h1>
            <ul itemscope itemtype="http://schema.org/Dataset">
                <li>title :<span  id="_name1" itemprop="name"><?php echo $dataset_title ;?></span></li>
                <li>type : <?php echo $dataset_type ;?></li>
                <li>sensitive data : <?php echo $sensitive_data; ?></li>
                <li>personal data : <?php echo $personal_data ;?></li>
                <li>dataset id:<span  id="_identifier3" itemprop="identifier"><?php echo $dataset_id; ?></span></li>
                <li>dataset id type: <?php echo $dataset_id_type; ?></li>
                <li>dataset description:<span  id="_description2" itemprop="description"><?php echo $dataset_description; ?></span></li>
                <li>Keyword : <?php echo $keyword ;?></li>
                <li>issued :<span  id="_datePublished7" itemprop="datePublished" content="2015-07-27T15:30"> <?php echo $issued ;?></span></li>
                <li>preservation statement : <?php echo $preservation_statement ;?></li>
                <li>data quality assurance : <?php echo $data_quality_assurance ;?></li>
            </ul>
            <h1>DMP datasets distribution</h1>
            <ul>
                <li>title : <?php echo $distribution_title ;?></li>
                <li>access url : <?php echo $access_url ;?></li>
                <li>available_till : <?php echo $available_till; ?></li>
                <li>byte_size : <?php echo $byte_size ;?></li>
                <li>data_access :<span  id="_sourceOrganization6" itemprop="sourceOrganization"><?php echo $data_access; ?></span></li>
                <li>distripution_description: <?php echo $distribution_description; ?></li>
                <li id="_distribution4" itemprop="distribution" itemscope itemtype="http://schema.org/DataDownload">
                    download_url :
<span itemprop="contentUrl"><?php echo $download_url; ?></span> </li>
                
<span itemscope itemtype="http://schema.org/Dataset" itemref="_name1 _description2 _identifier3 _sourceOrganization6 _datePublished7"><li itemprop="distribution" itemscope itemtype="http://schema.org/DataDownload" itemref="_contentUrl13">format :
<span itemprop="encodingFormat"> <?php echo $distribution_format ;?></span></li>
                <li>host Information  : 
                <ul>
                    <li>host_title :<?php echo $host_title ;?></li>
                    <li>backup__frequency :<?php echo $backup__frequency ;?></li>
                    <li>backup_type :<?php echo $backup_type ;?></li>
                    <li>certified_with :<?php echo $certified_with ;?></li>
                    <li>host_description :<?php echo $host_description ;?></li>
                    <li>geo_location :
<span itemprop="spatialCoverage"><?php echo $geo_location ;?></span></li>
                    <li>pid_system :<?php echo $pid_system ;?></li>
                    <li>availability :<?php echo $availability ;?></li>
                    <li>support_versioning :<?php echo $support_versioning ;?></li>
                </ul>
                </li>
                <li>License  : 
                <ul>
                    <li>license_ref :
<span itemprop="license"><?php echo $license_ref ;?></span></li>
                    <li>start_date :<?php echo $start_date ;?></li>
                </ul>
                </li></span>
                <li>download_url :
<span id="_contentUrl13" itemprop="contentUrl"><?php echo $download_url ;?></span></li>
            </ul>
        </div><!--  contentLeft  -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>Metadata</h3>
            <ul>
                <li>description : <?php echo $metadata_description ;?></li>
                <li>metadata_id : <?php echo $metadata_id ;?></li>
                <li>metadata_id_type : <?php echo $metadata_id_type; ?></li>
                <li>language : <?php echo $metadata_language ;?></li>
            </ul>         
               </div><!-- sidebar element -->
            <div class="sidebar-element">
                <h3>Security and Privacy</h3>
            <ul>
                <li>title : <?php echo $sac_title ;?></li>
                <li>description : <?php echo $sac_description ;?></li>
            
            </ul>                
            </div><!-- sidebar element -->
        </div><!--  sidebar  -->
    </div><!--  content  -->
</div><!--  container  -->
<div id="footer">
    <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="">contact us</a></li>
        <li><a href="">about us</a></li>
    </ul><!-- footer unordered list -->
<p>&copy;2019 RamiAttaallah.com</p>
    </div><!--  FOOTER  -->





</body></html>