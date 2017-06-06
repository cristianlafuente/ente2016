<?php
if (!isset($_GET['page'])) {
    include("pages/homepage.php");
} else {
    //include("pages/".$_GET['page'].".php");
    include("pages/".$_GET['page']);
}
?>