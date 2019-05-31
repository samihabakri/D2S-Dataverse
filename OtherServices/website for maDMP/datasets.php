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
            $sensitive_data= "this dataset has no information about sensitive_data ";
        }
    } else {
        $sensitive_data= "this dataset has no information about sensitive_data";
    }
} else {
    $sensitive_data= "this dataset has no information about sensitive_data";
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
            $personal_data= "this dataset has no information about personal_data ";
        }
    } else {
        $personal_data= "this dataset has no information about personal_data";
    }
} else {
    $personal_data= "this dataset has no information about personal_data";
}

if(strcmp(keyExist("dataset", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"])){

   if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["title"])  , "")>0) {
            $dataset_title = $json["dmp"]["dataset"][0]["title"];
        } else {
            $dataset_title = "no title for the dataset";
        }
    } else {
        $dataset_title = "no title for the dataset";
    }
    if (strcmp(keyExist("type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["type"])  , "")>0) {
            $dataset_type = $json["dmp"]["dataset"][0]["type"];
        } else {
            $dataset_type = "no type for the dataset";
        }
    } else {
        $dataset_type = "no type for the dataset";
    }

    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["description"])  , "")>0) {
            $dataset_description = $json["dmp"]["dataset"][0]["description"];
        } else {
            $dataset_description = "no description for the dataset";
        }
    } else {
        $dataset_description = "no description for the dataset";
    }

    if (strcmp(keyExist("preservation_statement", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["preservation_statement"])  , "")>0) {
            $preservation_statement = $json["dmp"]["dataset"][0]["preservation_statement"];
        } else {
            $preservation_statement = "no preservation_statement for the dataset";
        }
    } else {
        $preservation_statement = "no preservation_statement for the dataset";
    }
    if (strcmp(keyExist("data_quality_assurance", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["data_quality_assurance"])  , "")>0) {
            $data_quality_assurance = $json["dmp"]["dataset"][0]["data_quality_assurance"];
        } else {
            $data_quality_assurance = "no data_quality_assurance for the dataset";
        }
    } else {
        $data_quality_assurance = "no data_quality_assurance for the dataset";
    }

    if (strcmp(keyExist("issued", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["issued"])  , "")>0) {
            $issued = $json["dmp"]["dataset"][0]["issued"];
        } else {
            $issued = "no issued date for the dataset";
        }
    } else {
        $issued = "no issued date for the dataset";
    }

    if (strcmp(keyExist("keyword", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["keyword"])  , "")>0) {
            $keyword = $json["dmp"]["dataset"][0]["keyword"];
        } else {
            $keyword = "no keyword for the dataset";
        }
    } else {
        $keyword = "no keyword for the dataset";
    }

    if (strcmp(keyExist("dataset_id", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["dataset_id"]["dataset_id"])  , "")>0) {
            $dataset_id = $json["dmp"]["dataset"][0]["dataset_id"]["dataset_id"];
        } else {
            $dataset_id = "no dataset_id for the dataset";
        }
    } else {
        $dataset_id = "no dataset_id for the dataset";
    }

    if (strcmp(keyExist("dataset_id_type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["dataset_id"]["dataset_id_type"])  , "")>0) {
            $dataset_id_type = $json["dmp"]["dataset"][0]["dataset_id"]["dataset_id_type"];
        } else {
            $dataset_id_type = "no dataset_id_type for the dataset";
        }
    } else {
        $dataset_id_type = "no dataset_id_type for the dataset";
    }

}else{
    $dataset_id_type = "no dataset_id_type for the dataset";
    $preservation_statement = "no preservation_statement for the dataset";
    $dataset_type = "no type for the dataset";
    $dataset_title = "no title for the dataset";
    $dataset_description = "no description for the dataset";
    $data_quality_assurance = "no data_quality_assurance for the dataset";
    $dataset_id = "no dataset_id for the dataset";
    $keyword = "no keyword for the dataset";
    $issued = "no issued date for the dataset";
}


if (strcmp(keyExist("distribution", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"])) {

    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["title"])  , "")>0) {
            $distribution_title = $json["dmp"]["dataset"][0]["distribution"][0]["title"];
        } else {
            $distribution_title = "no distribution_title for the dataset";
        }
    } else {
        $distribution_title = "no distribution_title for the dataset";
    }

    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["description"])  , "")>0) {
            $distribution_description  = $json["dmp"]["dataset"][0]["distribution"][0]["description"];
        } else {
            $distribution_description  = "no distribution_description for the dataset";
        }
    } else {
        $distribution_description = "no distribution_description for the dataset";
    }

    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["format"])  , "")>0) {
            $distribution_format   = $json["dmp"]["dataset"][0]["distribution"][0]["format"];
        } else {
            $distribution_format   = "no distribution_format  for the dataset";
        }
    } else {
        $distribution_format  = "no distribution_format  for the dataset";
    }

    if (strcmp(keyExist("byte_size", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["byte_size"])  , "")>0) {
            $byte_size   = $json["dmp"]["dataset"][0]["distribution"][0]["byte_size"];
        } else {
            $byte_size  = "no byte_size for the dataset";
        }
    } else {
        $byte_size  = "no byte_size for the dataset";
    }
    if (strcmp(keyExist("data_access", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["data_access"])  , "")>0) {
            $data_access   = $json["dmp"]["dataset"][0]["distribution"][0]["data_access"];
        } else {
            $data_access  = "no data_access for the dataset";
        }
    } else {
        $data_access  = "no data_access for the dataset";
    }


}else {
    $distribution_title = "no distribution_title for the dataset";
    $distribution_description = "no distribution_description for the dataset";
    $distribution_format  = "no distribution_format  for the dataset";
    $byte_size  = "no byte_size  for the dataset";
    $data_access  = "no data_access for the dataset";

}


if (strcmp(keyExist("host", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"])) {

    if (strcmp(keyExist("availability", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["availability"])  , "")>0) {
            $availability   = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["availability"];
        } else {
            $availability = "no data_access for the dataset";
        }
    } else {
        $availability  = "no availability for the dataset";
    }

    if (strcmp(keyExist("backup__frequency", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup__frequency"])  , "")>0) {
            $backup__frequency  = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup__frequency"];
        } else {
            $backup__frequency = "no backup__frequency for the dataset";
        }
    } else {
        $backup__frequency = "no backup__frequency for the dataset";
    }

    if (strcmp(keyExist("backup_type", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup_type"])  , "")>0) {
            $backup_type = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["backup_type"];
        } else {
            $backup_type = "no backup_type for the dataset";
        }
    } else {
        $backup_type = "no backup_type for the dataset";
    }

    if (strcmp(keyExist("certified_with", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["certified_with"])  , "")>0) {
            $certified_with = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["certified_with"];
        } else {
            $certified_with = "not certified_with any standard";
        }
    } else {
        $certified_with = "not certified_with any standard";
    }

    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["description"])  , "")>0) {
            $host_description = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["description"];
        } else {
            $host_description = "no description for the host";
        }
    } else {
        $host_description = "no description for the host";
    }

    if (strcmp(keyExist("geo_location", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["geo_location"])  , "")>0) {
            $geo_location = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["geo_location"];
        } else {
            $geo_location = "no geo_location for the host";
        }
    } else {
        $geo_location = "no geo_location for the host";
    }

    if (strcmp(keyExist("pid_system", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["pid_system"])  , "")>0) {
            $pid_system = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["pid_system"];
        } else {
            $pid_system = "no  pid_system for the host";
        }
    } else {
        $pid_system = "no  pid_system for the host";
    }
    if (strcmp(keyExist("support_versioning", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["support_versioning"])  , "")>0) {
            $support_versioning = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["support_versioning"];
        } else {
            $support_versioning = "no information about support_versioning for the host";
        }
    } else {
        $support_versioning = "no information about support_versioning for the host";
    }

    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["host"]["title"])  , "")>0) {
            $host_title = $json["dmp"]["dataset"][0]["distribution"][0]["host"]["title"];
        } else {
            $host_title = "no title for the host";
        }
    } else {
        $host_title = "no title for the host";
    }

    if (strcmp(keyExist("access_url", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["access_url"])  , "")>0) {
            $access_url = $json["dmp"]["dataset"][0]["distribution"][0]["access_url"];
        } else {
            $access_url = "no access_url for the dataset";
        }
    } else {
        $access_url = "no access_url for the dataset";
    }

    if (strcmp(keyExist("download_url", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["download_url"])  , "")>0) {
            $download_url = $json["dmp"]["dataset"][0]["distribution"][0]["download_url"];
        } else {
            $download_url = "no download_url for the dataset";
        }
    } else {
        $download_url = "no download_url for the dataset";
    }

    if (strcmp(keyExist("available_till", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["available_till"])  , "")>0) {
            $available_till   = $json["dmp"]["dataset"][0]["distribution"][0]["available_till"];
        } else {
            $available_till  = "no available_till date for the dataset";
        }
    } else {
        $available_till  = "no available_till date for the dataset";
    }

}else {
    $availability  = "no availability for the dataset";
    $backup__frequency = "no backup__frequency for the dataset";
    $backup_type = "no backup_type for the dataset";
    $certified_with = "not certified_with any standard";
    $host_description = "no description for the host";
    $geo_location = "no geo_location for the host";
    $pid_system = "no  pid_system for the host";
    $support_versioning = "no information about support_versioning for the host";
    $host_title = "no title for the host";
    $access_url = "no access_url for the dataset";
    $download_url = "no download_url for the dataset";
    $available_till  = "no available_till date for the dataset";

}


if (strcmp(keyExist("license", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"])) {
    if (strcmp(keyExist("license_ref", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"]["license_ref"])  , "")>0) {
            $license_ref = $json["dmp"]["dataset"][0]["distribution"][0]["license"]["license_ref"];
        } else {
            $license_ref = "no license_ref for the dataset";
        }
    } else {
        $license_ref = "no license_ref for the dataset";
    }
}else {
    $license_ref = "no license_ref for the dataset";
}

if (strcmp(keyExist("license", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"])) {
    if (strcmp(keyExist("start_date", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["distribution"][0]["license"]["start_date"])  , "")>0) {
            $start_date = $json["dmp"]["dataset"][0]["distribution"][0]["license"]["start_date"];
        } else {
            $start_date = "no start_date for the license";
        }
    } else {
        $start_date = "no start_date for the license";
    }
}else {
    $start_date = "no start_date for the license";
}




if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["description"])  , "")>0) {
            $metadata_description = $json["dmp"]["dataset"][0]["metadata"]["description"];
        } else {
            $metadata_description = "no metadata_descriptionfor the dataset";
        }
    } else {
        $metadata_description = "no metadata_descriptionfor the dataset";
    }
}else {
    $metadata_description = "no metadata_descriptionfor the dataset";
}
if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("language", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["language"])  , "")>0) {
            $metadata_language = $json["dmp"]["dataset"][0]["metadata"]["language"];
        } else {
            $metadata_language = "no metadata_language for the dataset";
        }
    } else {
        $metadata_language = "no metadata_language for the dataset";
    }
}else {
    $metadata_language = "no metadata_language for the dataset";
}

if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("metadata_id", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"])) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id"])  , "")>0) {
            $metadata_id = $json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id"];
        } else {
            $metadata_id = "no metadata_id for the dataset";
        }
    } else {
        $metadata_id = "no metadata_id for the dataset";
    }
}else {
    $metadata_id = "no metadata_id for the dataset";
}

if (strcmp(keyExist("metadata", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"])) {
    if (strcmp(keyExist("metadata_id_type", $keyArray) , "Exist")==0 && checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"])) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id_type"])  , "")>0) {
            $metadata_id_type = $json["dmp"]["dataset"][0]["metadata"]["metadata_id"]["metadata_id_type"];
        } else {
            $metadata_id_type = "no metadata_id_type for the dataset";
        }
    } else {
        $metadata_id_type = "no metadata_id_type for the dataset";
    }
}else {
    $metadata_id_type = "no metadata_id_type for the dataset";
}

if (strcmp(keyExist("security_and_privacy", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["security_and_privacy"])) {
    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["security_and_privacy"][0]["description"])  , "")>0) {
            $sac_description = $json["dmp"]["security_and_privacy"][0]["description"];
        } else {
            $sac_description= "no security and privacy description for the dataset";
        }
    } else {
        $sac_description= "no security and privacy description for the dataset";
    }
}else {
    $sac_description= "no security and privacy description for the dataset";
}

if (strcmp(keyExist("security_and_privacy", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["security_and_privacy"])) {
    if (strcmp(keyExist("title", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["security_and_privacy"][0]["title"])  , "")>0) {
            $sac_title = $json["dmp"]["security_and_privacy"][0]["title"];
        } else {
            $sac_title= "no security and privacy title for the dataset";
        }
    } else {
        $sac_title= "no security and privacy title for the dataset";
    }
}else {
    $sac_title= "no security and privacy title for the dataset";
}

if (strcmp(keyExist("technical_resource", $keyArray) ,"Exist")==0 && checkNull($json["dmp"]["dataset"][0]["technical_resource"])) {
    if (strcmp(keyExist("description", $keyArray) , "Exist")==0) {
        if (strcmp(checkNull($json["dmp"]["dataset"][0]["technical_resource"]["description"])  , "")>0) {
            $tr_description = $json["dmp"]["dataset"][0]["technical_resource"]["description"];
        } else {
            $tr_description = "no technical_resources description for the dataset";
        }
    } else {
        $tr_description = "no technical_resources description for the dataset";
    }
}else {
    $tr_description = "no technical_resources description for the dataset";
}


$dataset = "<ul><li>title : " . $dataset_title . "</li><li>type : " . $dataset_type . "</li><li>sensitive data : " . $sensitive_data . "</li><li>personal data : " . $personal_data . "</li><li>dataset_id : " . $dataset_id . "  dataset_id_type : ". $dataset_id_type ."</li><li>dataset_description : " . $dataset_description . "</li>";
 $dataset .="<li>Keyword : ".$keyword."</li><li>issued : ".$issued."</li><li>preservation_statement : ".$preservation_statement."</li>";
 $dataset .="<li>data_quality_assurance : ".$data_quality_assurance."</li></ul>";

$distribution ="<ul><li>title : ".$distribution_title."</li><li>access url : ".$access_url."</li><li>available_till : ".$available_till."</li><li>byte_size : ".$byte_size."</li>";
$distribution .="<li>data_access : ".$data_access."</li><li>distripution_description : ".$distribution_description."</li><li>download_url : ".$download_url."</li>";
$distribution .="<li>format : ".$distribution_format."</li><li>host Information :<ul><li>host_title : ".$host_title."</li><li>backup__frequency : ".$backup__frequency."</li><li>backup_type : ".$backup_type."</li><li>certified_with : ".$certified_with."</li><li>host_description : ".$host_description."</li><li>geo_location : ".$geo_location."</li><li>pid_system : ".$pid_system."</li><li>availability : ".$availability."</li><li>support_versioning : ".$support_versioning."</li></ul><li><ul>License : <li> license_ref : ".$license_ref."</li><li> start_date : ".$start_date."</li></ul></li><li>download_url : ".$download_url."</li></ul>";
$metadata = "<ul><li>description : ".$metadata_description."</li><ul><li>metadata_id : ".$metadata_id."</li><ul><li>metadata_id_type : ".$metadata_id_type."</li><ul><li>language : ".$metadata_language."</li></ul>";
$security_and_privacy = "<ul><li>title : ".$sac_title."</li><li>description : ".$sac_description."</li></li></ul>";

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
            <p><?php echo $dataset;?> </p>
            <h1>DMP datasets distribution</h1>
            <p><?php echo $distribution;?> </p>
        </div><!-- contentLeft -->
        <div id="sidebar">
            <div class="sidebar-element">
                <h3>Metadata</h3>
                <p><?php echo $metadata ; ?></p>
            </div><!--sidebar element-->
            <div class="sidebar-element">
                <h3>Security and Privacy</h3>
                <p><?php echo $security_and_privacy ; ?></p>
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



