<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Redacteur;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    /**
     * @Route("/api/articles", name="getArticles", methods={"GET"})
     */
    public function getArticles()
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository("App:Article")->findAll();
        $formated = array();
        foreach($articles as $article)
        {
            $formated[] = [
                "id" => $article->getId(),
                "titre" => $article->getTitre(),
                "resumeCourt" => $article->getResumeCourt(),
                "description" => $article->getDescription(),
                "categorie" => [
                    "id" => $article->getCategorie()->getId(),
                    "libelle" => $article->getCategorie()->getLibelle()
                ],
                "redacteur" => [
                    "id" => $article->getRedacteur()->getId(),
                    "nom" => $article->getRedacteur()->getNom(),
                    "prenom" => $article->getRedacteur()->getPrenom(),
                    "email" => $article->getRedacteur() ->getEmail()
                ]
            ];
        }
        return $this->json($formated, 200);
    }

    /**
     * @Route("/api/articles/new", name="newArticle", methods={"POST"})
     */
    public function newArticle(Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("POST"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $article = new Article();

                $article->setTitre($data->titre);
                $article->setDescription($data->description);
                $resumeCourt = strlen($data->description) <= 128 ? $data->description : substr($data->description, 0, 125)."...";
                $article->setResumeCourt($resumeCourt);
                $categorie = $this->getDoctrine()->getRepository("App:Categorie")->findOneBy(["id" => $data->categorie]);
                $article->setCategorie($categorie);
                $redacteur = $this->getDoctrine()->getRepository("App:Redacteur")->findOneBy(["id" => $data->redacteur]);
                $article->setRedacteur($redacteur);

                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                return new Response("article ajouté", 201);
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/articles/del/{id}", name="delArticle", methods={"DELETE"})
     */
    public function delArticle($id, Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("DELETE"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $em = $this->getDoctrine()->getManager();
                $article = $em->getRepository("App:Article")->findOneBy(["id" => $id]);
                if (!empty($article))
                {
                    $em->remove($article);
                    $em->flush();
                    return $this->json([
                        "message" => "article supprimé"
                    ], 200);
                }
                else
                {
                    return $this->json([
                        "erreur" => "article non trouvé"
                    ], 404);
                }
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/articles/update/{id}", name="updateArticle", methods={"PUT"})
     */
    public function updateArticle($id, Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("PUT"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $em = $this->getDoctrine()->getManager();
                $article = $em->getRepository("App:Article")->findOneBy(["id" => $id]);

                $article->setTitre($data->titre);
                $article->setDescription($data->description);
                $resumeCourt = strlen($data->description) <= 128 ? $data->description : substr($data->description, 0, 125)."...";
                $article->setResumeCourt($resumeCourt);
                $categorie = $this->getDoctrine()->getRepository(Categorie::class)->findOneBy(["id" => $data->categorie]);
                $article->setCategorie($categorie);
                $redacteur = $this->getDoctrine()->getRepository(Redacteur::class)->findOneBy(["id" => $data->redacteur]);
                $article->setRedacteur($redacteur);

                $em->persist($article);
                $em->flush();

                return new Response("article modifié", 200);
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/articles/{id}", name="getArticlesById", methods={"GET"})
     */
    public function getArticlesById($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository("App:Article")->findOneBy(["id" => $id]);
        $formated = array();
        if (!empty($article))
        {
            $formated = [
                "id" => $article->getId(),
                "titre" => $article->getTitre(),
                "resumeCourt" => $article->getResumeCourt(),
                "description" => $article->getDescription(),
                "categorie" => [
                    "id" => $article->getCategorie()->getId(),
                    "libelle" => $article->getCategorie()->getLibelle()
                ],
                "redacteur" => [
                    "id" => $article->getRedacteur()->getId(),
                    "nom" => $article->getRedacteur()->getNom(),
                    "prenom" => $article->getRedacteur()->getPrenom(),
                    "email" => $article->getRedacteur() ->getEmail()
                ]
            ];
            return $this->json($formated, 200);
        }
        return $this->json([], 404);
    }
}
