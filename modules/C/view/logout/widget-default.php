<?php
Session::unsetUID();
Session::unsetUNM();
Session::unsetUT();
session_destroy();
Core::redir("index.php");
?>
