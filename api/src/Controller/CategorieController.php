<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Categorie;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    /**
     * @Route("/api/categories", name="getCategories", methods={"GET"})
     */
    public function getCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("App:Categorie")->findAll();
        $formated = array();
        foreach($categories as $categorie)
        {
            $formated[] = [
                "id" => $categorie->getId(),
                "libelle" => $categorie->getLibelle()
            ];
        }
        return $this->json($formated, 200);
    }

    /**
     * @Route("/api/categories/new", name="newCategorie", methods={"POST"})
     */
    public function newCategorie(Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("POST"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $categorie = new Categorie();

                $categorie->setLibelle($data->libelle);

                $em = $this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();

                return new Response("catégorie ajoutée", 201);
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/categories/del/{id}", name="delCategorie", methods={"DELETE"})
     */
    public function delCategorie($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository("App:Article")->findAll();
        $categorie = $em->getRepository("App:Categorie")->findOneBy(["id" => $id]);
        $cirOK = true;
        foreach ($articles as $article)
        {
            $cirOK = $article->getCategorie() != $categorie;
        }

        if ($cirOK)
        {
            $data = json_decode($request->getContent());
            
            if ($request->isMethod("DELETE"))
            {
                if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
                {
                    if (!empty($categorie))
                    {
                        $em->remove($categorie);
                        $em->flush();
                        return $this->json([
                            "message" => "catégorie supprimée"
                        ], 200);
                    }
                    else
                    {
                        return $this->json([
                            "erreur" => "catégorie non trouvée"
                        ], 404);
                    }
                }
                else return new Response("erreur apikey", 500);
            }
            else return new Response("erreur méthode", 500);
        }
        else return new Response("erreur contrainte intégrité référentielle", 500);
    }

    /**
     * @Route("/api/categories/update/{id}", name="updateCategorie", methods={"PUT"})
     */
    public function updateCategorie($id, Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("PUT"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $em = $this->getDoctrine()->getManager();
                $categorie = $em->getRepository("App:Categorie")->findOneBy(["id" => $id]);

                $categorie->setLibelle($data->libelle);

                $em->persist($categorie);
                $em->flush();

                return new Response("catégorie modifiée", 200);
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/categories/{id}", name="getCategoriesById", methods={"GET"})
     */
    public function getCategoriesById($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("App:Categorie")->findOneBy(["id" => $id]);
        $formated = array();
        if (!empty($categorie))
        {
            $formated = [
                "id" => $categorie->getId(),
                "libelle" => $categorie->getLibelle()
            ];
            return $this->json($formated, 200);
        }
        return $this->json([], 404);
    }
}
