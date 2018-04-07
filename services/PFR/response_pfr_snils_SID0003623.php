<?php 
//include('../../classes/validation/SnilsValidation.php');
//Проверяем на валидность СНИЛС
//echo validateSnils($snils);
$snils = stripcslashes($_GET['snils']);
include('request_pfr_snils_SID0003623.php');
echo "<b>Данные запроса: </b>СНИЛС ".$snils."<br><br>";
$response = $client->__getLastResponse();

//выдергиваем из XML нужный атрибут
$domDocument = new DOMDocument();
$domDocument->loadXML($response);
$base64pfr=array();
$results=$domDocument->getElementsByTagName("AppData");
foreach($results as $result)
{
    foreach($result->childNodes as $node)
    {
        if($node instanceof DOMElement)
        {
            array_push($base64pfr, $node->textContent);
        }
    }

}

//декодируем из Base64 в XML
$encodedData = $base64pfr[2];
$decocedData = base64_decode($encodedData);
$xml = new SimpleXMLElement($decocedData);

//Парсим и выводим ответ
echo "<b>Данные ответа:</b><br>"; 
foreach ($xml->СтраховойНомер as $el1) {
	echo "<b>Страховой номер (СНИЛС): </b>".$el1."<br />";
}
foreach ($xml->ФИО as $el) {
	echo "<b>Фамилия: </b>".$el->Фамилия."<br />";
	echo "<b>Имя: </b>".$el->Имя."<br />";
	echo "<b>Отчество: </b>".$el->Отчество."<br />";
}
foreach ($xml->Пол as $el2) {
	echo "<b>Пол: </b>".$el2."<br />";
}
foreach ($xml->ДатаРождения as $el3) {
	echo "<b>Дата рождения: </b>".$el3."<br />";
}	
foreach ($xml->МестоРождения as $el4) {
	echo "<b>Место рождения</b><br>";		
	echo "<b>Тип места рождения: </b>".$el4->ТипМестаРождения."<br />";
	echo "<b>Город рождения: </b>".$el4->ГородРождения."<br />";
	echo "<b>Район рождения: </b>".$el4->РайонРождения."<br />";
	echo "<b>Регион рождения: </b>".$el4->РегионРождения."<br />";
	echo "<b>Страна рождения: </b>".$el4->СтранаРождения."<br />";		
}	
foreach ($xml->АдресРегистрации as $el5) {
	echo "<b>Адрес регистрации: </b>".$el5."<br />";
}	
foreach ($xml->УдостоверяющийДокумент as $el6) {
	echo "<b>Удостоверяющий документ</b><br>";		
	echo "<b>Тип удостоверяющего документа: </b>".$el6->ТипУдостоверяющего."<br />";
	echo "<b>Наименование удостоверяющего документа: </b>".$el6->Документ->НаименованиеУдостоверяющего."<br />";
	echo "<b>Серия и номер удостоверяющего документа: </b>серия ".$el6->Документ->СерияРимскиеЦифры." ".$el6->Документ->СерияРусскиеБуквы.", номер ".$el6->Документ->НомерУдостоверяющего."<br />";		
	echo "<b>Дата выдачи: </b>".$el6->Документ->ДатаВыдачи."<br />";		
}
?>
