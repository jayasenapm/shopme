<?php
session_start();
if(session_destroy())
	echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
//redirect('location: index.html');
exit;




?>