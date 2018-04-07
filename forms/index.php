<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Отправка запроса</title>
	<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link rel="stylesheet" type="text/css" href="styles.css" /> 
</head>

<body>
<div class="rec_form" id="form_register"> 
   
	<div class="wrapper"> 						
	  
						 
	  
		<div class="procedure_detail"> 								
		
		<label>Введите СНИЛС гражданина:</label> 	
		
		
		      							 							 
        <div class="personal_info"> 	
			<label>СНИЛС:</label> 								 
            <div class="input_box">
				<input id="snils" name="snils_kl"type="text" value="" />
			</div>
			

	<span id="status_reg_err"></span> 			
        </div>
	      							 							 
		<div class="pos_right"> 
		
			<input type="submit" id="sub_but" onclick="sendReg()" value="" name="form_submit" /> 

		</div>
			
					
								
	</div>
	
</div>
<p align="center"><br>
<img src="loading11.gif" id="loading_reg" style="display:none"><span id="status_reg"></span></p>
 </body>
</html>
        	
