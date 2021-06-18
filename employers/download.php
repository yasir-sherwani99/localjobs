<?php
	ignore_user_abort(true);
	
	set_time_limit(0);
	
	$path = "../members/member_cvs/";
	
	$dl_file = preg_replace("([^\w\s\d-_~,;:\[\]\(\].]|[\.]{2,})", '', $_GET['download_file']);
	
	$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL);
	
	$fullpath = $path.$dl_file;
	
	if($fd = fopen($fullpath, "r")){
		$fsize = filesize($fullpath);
		$path_parts = pathinfo($fullpath);
		$ext = strtolower($path_parts["extension"]);
		
		switch($ext){
			case "pdf":
				 header("Content-type: application/pdf");
        		 header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
				 break;
				 
			default:
  			      header("Content-type: application/octet-stream");
        		  header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        		  break;

		}
		
		header("Content-length: $fsize");
    	header("Cache-control: private"); //use this to open files directly
    	while(!feof($fd)) {
        	$buffer = fread($fd, 2048);
        	echo $buffer;
    	}

	}
	
	fclose($fd);
	exit;

?>