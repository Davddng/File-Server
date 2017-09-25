<?php

// echo($dir."<br>");
// echo($page."<br>");
// echo($sort."<br>");

// echo($_POST["folderName"]);

mkdir($_POST["dir"]."/".$_POST["folderName"]);

header('Location: file.php?dir='.$_POST['dir'].'&sort='.$_POST['sort']);

?>
