<?php

setcookie("username","", time() - 7200);
header("refresh");
?>