<?php
if (isset($_REQUEST["controller"])) {
    if ($_REQUEST["controller"]=="user_connect") {
        require_once(ROOT."/Controllers/users.controller.php");
    }
}else {
    require_once(ROOT."/Controllers/users.controller.php");
}
