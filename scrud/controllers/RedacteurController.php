<?php
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "listRedacteur";

switch ($action)
{
    case "listRedacteur":
        $url = "http://localhost:8000/api/redacteurs";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $redacteurs = json_decode(curl_exec($ch));
        curl_close($ch);

        include("views/Redacteur/listRedacteur.php");
        break;
    
    case "newRedacteur":
        if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "true")
        {
            if (empty($_POST)) header("Location: index.php?uc=Redacteur");
            else
            {
                $url = "http://localhost:8000/api/redacteurs/new";
                $data = array(
                    "nom" => htmlentities($_REQUEST["redacteurNom"]),
                    "prenom" => htmlentities($_REQUEST["redacteurPrenom"]),
                    "email" => htmlentities($_REQUEST["redacteurEmail"]),
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

                header("Location: index.php?uc=Redacteur");
            }
        }
        else include("views/Redacteur/newRedacteur.php");
        break;

    case "updtRedacteur":
        if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "true")
        {
            if (empty($_POST)) header("Location: index.php?uc=Redacteur");
            else
            {
                $url = "http://localhost:8000/api/redacteurs/update/".$_REQUEST["id"];
                $data = array(
                    "nom" => htmlentities($_REQUEST["redacteurNom"]),
                    "prenom" => htmlentities($_REQUEST["redacteurPrenom"]),
                    "email" => htmlentities($_REQUEST["redacteurEmail"]),
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

                header("Location: index.php?uc=Redacteur");
            }
        }
        else 
        {
            if (isset($_REQUEST["id"])) 
            {
                $url = "http://localhost:8000/api/redacteurs/".$_REQUEST["id"];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $redacteur = json_decode(curl_exec($ch));
                curl_close($ch);

                include("views/Redacteur/updtRedacteur.php");
            }
            else header("Location: index.php?uc=Redacteur");
        }
        break;

    case "delRedacteur":
        if (isset($_REQUEST["id"]))
        {
            $url = "http://localhost:8000/api/redacteurs/del/".$_REQUEST["id"];
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

        header("Location: index.php?uc=Redacteur");
        break;

    default:
        header("Location: index.php?uc=Redacteur");
        break;
}
?>