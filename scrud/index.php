<?php
include_once("views/_header.php");
include_once("views/_menu.php");

$apikey = json_decode(file_get_contents("includes/apikey.json"))->apikey;

$uc = isset($_REQUEST["uc"]) ? $_REQUEST["uc"] : "Home";

switch ($uc)
{
    case "Article":
        include("controllers/ArticleController.php");
        break;
    
    case "Categorie":
        include("controllers/CategorieController.php");
        break;

    case "Redacteur":
        include("controllers/RedacteurController.php");
        break;

    case "Home":
        include("controllers/HomeController.php");
        break;

    default:
        header('Location: index.php');
        break;
}

include_once("views/_footer.php");
?>