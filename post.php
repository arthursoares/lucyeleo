<?php

	$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';
	$mensagem = '<html><body><h1>RSVP</h1><p>Nome:' . $_POST['NOME'] .'</p><p>E-mail: '. $_POST['EMAIL'] .'</p><p>Telefone: ' . $_POST['TELEFONE'] . '</p><p>Endereço: ' . $_POST['ENDERECO'] . '</p><p>Acompanhantes: ' . $_POST['ACOMPANHANTES'] . '</p></body></html>';
	$mensagem_txt = 'Nome: ' . $_POST['NOME'] .'/n E-mail: '. $_POST['EMAIL'] .'/n Telefone: ' . $_POST['TELEFONE'] . '/n Endereço: ' . $_POST['ENDERECO'] . '/n Acompanhantes: ' . $_POST['ACOMPANHANTES'];

	$postString = '{
	"key": "l3CREPlqlK0Ku7YEvGpXHw",
	"message": {
	    "html": "' . $mensagem . '",
	    "text": "' . $mensagem_txt .'",
	    "subject": "[RSVP] Lucy & Leo",
	    "from_email": "rsvp@lucyeleo.com",
	    "from_name": "RSVP Lucy & Leo",
	    "to": [
	        {
	            "email": "leo@lobato.org",
	            "name": "Leonardo Lobato"
	        },
	        {
	            "email": "lucy@lobato.org",
	            "name": "Lucy Henriques"
	        }

	    ],
	    "headers": {

	    },
	    "track_opens": true,
	    "track_clicks": true,
	    "auto_text": true,
	    "url_strip_qs": true,
	    "preserve_recipients": true,

	    "merge": true,
	    "global_merge_vars": [

	    ],
	    "merge_vars": [

	    ],
	    "tags": [

	    ],
	    "google_analytics_domains": [

	    ],
	    "google_analytics_campaign": "...",
	    "metadata": [

	    ],
	    "recipient_metadata": [

	    ],
	    "attachments": [

	    ]
	},
	"async": false
	}';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

	$result = curl_exec($ch);

	header("refresh:3;url=http://lucyeleo.com");
?>
<body>
<?php include_once("analyticstracking.php") ?>
Obrigado! Aguardamos ansiosos por voc&ecirc;s! :)
</body>