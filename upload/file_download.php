<?
    $getFile = $_GET['filepath'];
    $filePath = $_SERVER['DOCUMENT_ROOT']."/heon/img/".$getFile;

    $fileSize = filesize($filePath);
    $pathParts = pathinfo($filePath);
    $fileName = $pathParts['basename'];

    header("Prama: public");
    header("Expires: 0");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$fileName");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: $fileSize");

    ob_clean();
    flush();
    readfile($filePath);
?>