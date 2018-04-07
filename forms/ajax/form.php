<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Отправка запроса</title>
	<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<script type="text/javascript" src="xmlhttprequest.js"></script>
	<script type="text/javascript" src="ajax.js"></script>
</head>

<body>
<form id="cbform" action="mail.php" method="get">
<h2>Отправка запроса SID0003623 "Запрос на получение данных лицевого счета застрахованного лица по страховому номеру индивидуального лицевого счета"</h2>
	<table>
     	<tr>
        	<td align="right"><b>СНИЛС</b></td>
            <td><input type="text" name="snils" id="snils" style="width:300px;"></td>
			<td><input type="button" value="Отправить запрос" id="butt" onClick="sendMail()"></td>
        </tr>
	</table>
	<img src="loading4.gif" id="loading" style="display:none">&nbsp;
	<img src="gal.png" id="gal" style="display:none; width:20px; height:20px;">&nbsp;
	<img src="krest.png" id="krest" style="display:none; width:20px; height:20px;">&nbsp;
	<span id="status"></span>
	<span id="req"></span>
	<span id="result"></span>
	<span id="resp"></span>
	<span id="result2"></span>
	<span id="resultsnils"></span>


	
</form>
</body>
</html>


