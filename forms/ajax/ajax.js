var request = null;
var cbwStatus = 0;

 function sendMail(){
	if (document.getElementById('snils').value != ''
	){
		createRequest();
		var url = 'mail.php';
		var form_data = '?snils=' + document.getElementById('snils').value;
		request.open("GET",url + form_data,true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded, charset=Windows-1251');
		request.onreadystatechange = updatePage;
		request.send(null);
		document.getElementById('status').innerHTML = "���� �������� ���������";
		document.getElementById('loading').style.display = "inline";
	}
	else{
		document.getElementById('status').innerHTML = "��������� �� ��� ���� �����";
		document.getElementById('krest').style.display = "inline";	
		document.getElementById('gal').style.display = "none";		
	}
}
var status_change = true;

function updatePage(){
	if ((request.readyState == 0) || (request.readyState == 1)){
		document.getElementById('status').innerHTML = "���� �������� ���������";
		document.getElementById('loading').style.display = "inline";
		document.getElementById('krest').style.display = "none";
		status_change = false; 
	}
	else if (request.readyState == 4){
		document.getElementById('loading').style.display = "none";
		document.getElementById('callback').style.display='none';
		document.getElementById('gal').style.display = "none";
 		document.getElementById('result').style.display='';
		document.getElementById('result').innerHTML = request.responseText;
		document.getElementById('status').innerHTML = "������ ���������";
		document.getElementById('gal').style.display = "inline";
		document.getElementById('krest').style.display = "none";	
		document.getElementById('req').innerHTML = "������ �������: ����� ";
		document.getElementById('resp').innerHTML = "������ ������2: -";
		status_change = true;
	}
	else if(status_change==true){
		document.getElementById('loading').style.display = "none";
		document.getElementById('status').innerHTML = "������ ���������";
		document.getElementById('gal').style.display = "inline";
		document.getElementById('krest').style.display = "none";	
		document.getElementById('req').innerHTML = "<br><br><b>������ �������:</b> ����� ";
		document.getElementById('result').innerHTML = document.getElementById('snils').value;
		document.getElementById('resp').innerHTML = "<br><br><b>������ ������2:</b> ";
		document.getElementById('result2').innerHTML = '��� ������1';
		document.getElementById('resultsnils').innerHTML = "<?php echo $snils ?>";
		status_change = false; 
	}
}