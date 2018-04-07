<?php
//24.07.2017 Сервис ПФР SID0003623 "Запрос на получение данных лицевого счета застрахованного лица по страховому номеру индивидуального лицевого счета"
ini_set("soap.wsdl_cache_enabled", "0");
//1. Объявляем переменные
$wsdlurl = 'http://10.28.5.46:8080/wsdl/federal.pfr.3833?wsdl';

//2. Инициализация SOAP-клиента
$client = new SoapClient($wsdlurl, array('trace'=> true, 'exceptions' => false, 'encoding' => 'UTF-8'));
 
//4. Входные данные запроса - тело запроса Body

$body = array(
	"Message" => array(
			"Sender" => array(    
				'Code' => "146101281",
				'Name' => 'Региональная система межведомственного электронного взаимодействия Амурской области'
				),
			"Recipient" => array(
				'Code' => "PFRF01001",
				'Name' => 'Пенсионный фонд РФ'
				),
			"Originator" => array(
				'Code' => "146101281",
				'Name' => 'Региональная система межведомственного электронного взаимодействия Амурской области'
				),
			'TypeCode' => "GSRV",
			'Status' => "REQUEST",
			'Date' => "2013-02-28T09:54:03.239Z",
			'ExchangeType' => "2"
	),
	"MessageData" => array(
			"AppData" => array(    
				'Type' => "REQUEST",
				"Properties" => array(
					"Property" => array(
					0 => array(
						"PropertyName" => "SNILS",
						"PropertyValue" => "$snils"),
					1 => array(
						"PropertyName" => "TYPE_QUERY",
						"PropertyValue" => "ЗАПРОС_ДАННЫХ_О_ЗЛ_ПО_СНИЛС")				
					),
				
				),
				'FilePFR' => '',
			),
	),
);


// Выполнение запроса к серверу
$result = $client->Process($body);

//Запись логов
$requestpfr = $client->__getLastRequest();
$responsepfr = $client->__getLastResponse();
$filenamerequestpfr = '../../logs/request_pfr_SID0003623-'.date("Ymj-His").'.xml';
$filenameresponsepfr = '../../logs/response_pfr_SID0003623'.date("Ymj-His").'.xml';
file_put_contents($filenamerequestpfr, $requestpfr);
file_put_contents($filenameresponsepfr, $responsepfr);

//6. Вывод отладочной информации в случае возникновения ошибки
if (is_soap_fault($result)) { echo("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring}, detail: {$result->detail})"); }

?>
