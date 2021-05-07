<?php
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "listCategorie";

switch ($action)
{
    case "listCategorie":
        $url = "http://localhost:8000/api/categories";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $categories = json_decode(curl_exec($ch));
        curl_close($ch);

        include("views/Categorie/listCategorie.php");
        break;
    
    case "newCategorie":
        if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "true")
        {
            if (empty($_POST)) header("Location: index.php?uc=Categorie");
            else
            {
                $url = "http://localhost:8000/api/categories/new";
                $data = array(
                    "libelle" => htmlentities($_REQUEST["categorieLibelle"]),
                    "apikey" => $apikey
                );
                $data_json = json_encode($data);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                header("Location: index.php?uc=Categorie");
            }
        }
        else include("views/Categorie/newCategorie.php");
        break;

    case "updtCategorie":
        if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "true")
        {
            if (empty($_POST)) header("Location: index.php?uc=Categorie");
            else
            {
                $url = "http://localhost:8000/api/categories/update/".$_REQUEST["id"];
                $data = array(
                    "libelle" => htmlentities($_REQUEST["categorieLibelle"]),
                    "apikey" => $apikey
                );
                $data_json = json_encode($data);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Content-Length: ".strlen($data_json)));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                header("Location: index.php?uc=Categorie");
            }
        }
        else 
        {
            if (isset($_REQUEST["id"])) 
            {
                $url = "http://localhost:8000/api/categories/".$_REQUEST["id"];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $categorie = json_decode(curl_exec($ch));
                curl_close($ch);

                include("views/Categorie/updtCategorie.php");
            }
            else header("Location: index.php?uc=Categorie");
        }
        break;

    case "delCategorie":
        if (isset($_REQUEST["id"]))
        {
            $url = "http://localhost:8000/api/categories/del/".$_REQUEST["id"];
            $data = array(
                "apikey" => $apikey
            );
            $data_json = json_encode($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
            $response = curl_exec($ch);
            curl_close($ch);
        }

        header("Location: index.php?uc=Categorie");
        break;

    default:
        header("Location: index.php?uc=Categorie");
        break;
}
?>