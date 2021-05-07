<?php
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "listArticle";

switch ($action)
{
    case "listArticle":
        $url = "http://localhost:8000/api/articles";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $articles = json_decode(curl_exec($ch));
        curl_close($ch);

        if (isset($_REQUEST["search"]) && !empty($_REQUEST["search"]))
        {
            $search = strtolower(htmlentities($_REQUEST["search"]));
            $searchArticles = array();
            foreach ($articles as $article) 
            {
                if (substr_count(strtolower($article->titre), $search) || substr_count(strtolower($article->categorie->libelle), $search))
                    $searchArticles[] = $article;
            }
            $articles = $searchArticles;
        }
        
        include("views/Article/listArticle.php");
        break;
    
    case "newArticle":
        if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "true")
        {
            if (empty($_POST)) header("Location: index.php?uc=Article");
            else
            {
                $url = "http://localhost:8000/api/articles/new";
                $data = array(
                    "titre" => htmlentities($_REQUEST["articleTitre"]),
                    "description" => htmlentities($_REQUEST["articleDescription"]),
                    "categorie" => htmlentities($_REQUEST["articleCategorie"]),
                    "redacteur" => htmlentities($_REQUEST["articleRedacteur"]),
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

                header("Location: index.php?uc=Article");
            }
        }
        else 
        {
            $url = "http://localhost:8000/api/categories";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $categories = json_decode(curl_exec($ch));
            curl_close($ch);

            $url = "http://localhost:8000/api/redacteurs";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $redacteurs = json_decode(curl_exec($ch));
            curl_close($ch);

            include("views/Article/newArticle.php");
        }
        break;

    case "updtArticle":
        if (isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "true")
        {
            if (empty($_POST)) header("Location: index.php?uc=Article");
            else
            {
                $url = "http://localhost:8000/api/articles/update/".$_REQUEST["id"];
                $data = array(
                    "titre" => htmlentities($_REQUEST["articleTitre"]),
                    "description" => htmlentities($_REQUEST["articleDescription"]),
                    "categorie" => htmlentities($_REQUEST["articleCategorie"]),
                    "redacteur" => htmlentities($_REQUEST["articleRedacteur"]),
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

                header("Location: index.php?uc=Article");
            }
        }
        else 
        {
            if (isset($_REQUEST["id"])) 
            {
                $url = "http://localhost:8000/api/categories";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $categories = json_decode(curl_exec($ch));
                curl_close($ch);
    
                $url = "http://localhost:8000/api/redacteurs";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $redacteurs = json_decode(curl_exec($ch));
                curl_close($ch);

                $url = "http://localhost:8000/api/articles/".$_REQUEST["id"];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $article = json_decode(curl_exec($ch));
                curl_close($ch);

                include("views/Article/updtArticle.php");
            }
            else header("Location: index.php?uc=Article");
        }
        break;

    case "delArticle":
        if (isset($_REQUEST["id"]))
        {
            $url = "http://localhost:8000/api/articles/del/".$_REQUEST["id"];
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

        header("Location: index.php?uc=Article");
        break;

    default:
        header("Location: index.php?uc=Article");
        break;
}
?>