<?php
define("ROOT", str_replace("\Publics","",$_SERVER['DOCUMENT_ROOT']));

require_once(ROOT."/config/bootstrap.php");
session_start();
require_once(ROOT."/config/routeur.php");


