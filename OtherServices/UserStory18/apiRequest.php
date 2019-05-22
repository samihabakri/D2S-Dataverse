<?php
if (isset($_POST['dataverse'])) {
    $ch = curl_init();
    $apiKey = "0085bf0a-210f-4477-8455-ef5a40fb9d8b";
    $url = "https://demo.dataverse.org/api/dataverses/" . $_POST['identifier'] . "?key=$apiKey";

    $data = array (
        'name' => $_POST["dataverse"],
        'alias' => $_POST["identifier"],
        'dataverseContacts' =>
            array (
                0 =>
                    array (
                        'contactEmail' =>$_POST["email"]
                    )
                            ),

        'dataverseType' => $_POST["dataverseType"]
    );
    $payload = json_encode($data);

// Prepare new cURL resource
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
    );
    $server_output = curl_exec($ch);

    curl_close($ch);
    var_dump($server_output);
    if ($server_output == "OK") {
        echo "<script>alert('true')</script>";
    } else {
        die($server_output);
        echo "<script>alert('$server_output')</script>";
    }
} else {
    echo "<script type=\"text/javascript\">location.href ='/index.html'</script>";
}