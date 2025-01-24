<?php

// no cron do servidor add * * * * *	curl -s https://projetos.agendarhora.com/api/nomedaapi.php

$url = "https://graph.facebook.com/v21.0/544155972112980/messages";
$accessToken = "addaquiseutoken"; // Substitua pelo seu token de acesso.

$data = array(
    "messaging_product" => "whatsapp",
    "to" => "NUMEROCADASTRADO", // Substitua pelo número do destinatário.
    "type" => "template",
    "template" => array(
        "name" => "hello_world",
        "language" => array(
            "code" => "en_US"
        )
    )
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $accessToken",
    "Content-Type: application/json"
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Erro: ' . curl_error($ch);
} else {
    echo 'Resposta: ' . $response;
}

curl_close($ch);

?>
