<?php
/*
 *  util.file_mime_fileinfo.php
 *  gitphp: A PHP git repository browser
 *  Component: Utility - file mimetype using fileinfo
 *
 *  Copyright (C) 2009 Christopher Han <xiphux@gmail.com>
 */

function file_mime_fileinfo($buffer)
{
	if ($buffer && function_exists("finfo_buffer")) {
		$finfo = finfo_open(FILEINFO_MIME, GitPHP_Config::GetInstance()->GetValue('magicdb', '/usr/share/misc/magic.mgc'));
		if ($finfo) {
			$mime = finfo_buffer($finfo, $buffer, FILEINFO_MIME);
			if ($mime && strpos($mime,"/")) {
				if (strpos($mime,";"))
					$mime = strtok($mime, ";");
				return $mime;
			}
		}
	}
	
	return FALSE;
}

?>
