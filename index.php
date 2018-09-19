<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'kRSMbOWtBrISPZafvGKBihuVlj2L / nOlcNxtXembLwTZ1h + dUUWZxKW / 5x06TMFrWH3VxoouRPPOzWmjgguxrHPQNVPd3i3W0lVIh284Gc3YYu6muVKBXOrjJGNHj + 7gtSLubidYY / ZhPuW / 737D3QdB04t89 / 1O / w1cDnyilFU ='; //sesuaikan 
$channelSecret = '0a5655b698a0b613edfddf0f1051dc1a';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
