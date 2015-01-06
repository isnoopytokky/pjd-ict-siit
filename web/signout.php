
<?php
session_start();

if(isset($_SESSION["user_name"] ))
	unset($_SESSION["user_name"] );	
if(isset($_SESSION["user_role"] ))
	unset($_SESSION["user_role"] );	

print '<meta http-equiv="refresh" content="0;url=/pjd-ict-siit/web/index.php">';