<?php
if(@$_FILES["attach"]["error"] == 0) {
    if(@$_FILES["attach"]['size'] > 0 && $_FILES["attach"]['size'] < 102400) {
        $typeAccepted = ["image/jpeg", "image/gif", "image/png"];
        $blackext = ["pht", "phtml", "html", "swf", "htm"];
        $filearr = pathinfo($_FILES["attach"]["name"]);

        if(!in_array($_FILES["attach"]['type'], $typeAccepted)) {
            exit("type error");
        }
        if(in_array($filearr["extension"], $blackext) || !stripos($filearr["extension"],'php')) {
            exit("extension error");
        }
        $filename = md5(chr(mt_rand(0,255))) . "." . $filearr["extension"];
        if(move_uploaded_file($_FILES["attach"]["tmp_name"], $filename)) {
            echo htmlspecialchars("upload success, new filename is {$filename}");
        } else {
            echo "upload error!";
        }
    }
} else {
    echo "no upload file";
}
?>
<form action="./y1geB4ckkkd00R.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="102400" />
    file upload:
    <input type="file" name="attach" >
    <input type="submit" value="Upload Image">
</form>
