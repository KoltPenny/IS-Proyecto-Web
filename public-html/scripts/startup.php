<?php
session_start();
if (!isset($_SESSION['usr']))
{
    echo "new";
}
else
{
    echo "1";
}
?>