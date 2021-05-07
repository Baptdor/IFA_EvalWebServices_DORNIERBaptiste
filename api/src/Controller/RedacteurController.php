<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Redacteur;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;

class RedacteurController extends AbstractController
{
    /**
     * @Route("/redacteur", name="redacteur")
     */
    public function index(): Response
    {
        return $this->render('redacteur/index.html.twig', [
            'controller_name' => 'RedacteurController',
        ]);
    }

    /**
     * @Route("/api/redacteurs", name="getRedacteurs", methods={"GET"})
     */
    public function getRedacteurs()
    {
        $em = $this->getDoctrine()->getManager();
        $redacteurs = $em->getRepository("App:Redacteur")->findAll();
        $formated = array();
        foreach($redacteurs as $redacteur)
        {
            $formated[] = [
                "id" => $redacteur->getId(),
                "nom" => $redacteur->getNom(),
                "prenom" => $redacteur->getPrenom(),
                "email" => $redacteur->getEmail()
            ];
        }
        return $this->json($formated, 200);
    }

    /**
     * @Route("/api/redacteurs/new", name="newRedacteurs", methods={"POST"})
     */
    public function newRedacteur(Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("POST"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $redacteur = new Redacteur();

                $redacteur->setNom($data->nom);
                $redacteur->setPrenom($data->prenom);
                $redacteur->setEmail($data->email);

                $em = $this->getDoctrine()->getManager();
                $em->persist($redacteur);
                $em->flush();

                return new Response("rédacteur ajouté", 201);
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/redacteurs/del/{id}", name="delRedacteur", methods={"DELETE"})
     */
    public function delRedacteur($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository("App:Article")->findAll();
        $redacteur = $em->getRepository("App:Redacteur")->findOneBy(["id" => $id]);
        $cirOK = true;
        foreach ($articles as $article)
        {
            $cirOK = $article->getCategorie() != $redacteur;
        }

        if ($cirOK)
        {
            $data = json_decode($request->getContent());

            if ($request->isMethod("DELETE"))
            {
                if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
                {
                    if (!empty($redacteur))
                    {
                        $em->remove($redacteur);
                        $em->flush();
                        return $this->json([
                            "message" => "rédacteur supprimé"
                        ], 200);
                    }
                    else
                    {
                        return $this->json([
                            "erreur" => "rédacteur non trouvé"
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
     * @Route("/api/redacteurs/update/{id}", name="updateRedacteur", methods={"PUT"})
     */
    public function updateRedacteur($id, Request $request)
    {
        $data = json_decode($request->getContent());

        if ($request->isMethod("PUT"))
        {
            if ($data->apikey == "231dbfb6-02e2-4e3a-88c4-0ff82c578e55")
            {
                $em = $this->getDoctrine()->getManager();
                $redacteur = $em->getRepository("App:Redacteur")->findOneBy(["id" => $id]);

                $redacteur->setNom($data->nom);
                $redacteur->setPrenom($data->prenom);
                $redacteur->setEmail($data->email);

                $em->persist($redacteur);
                $em->flush();

                return new Response("rédacteur modifié", 200);
            }
            else return new Response("erreur apikey", 500);
        }
        else return new Response("erreur méthode", 500);
    }

    /**
     * @Route("/api/redacteurs/{id}", name="getRedacteursById", methods={"GET"})
     */
    public function getRedacteursById($id)
    {
        $em = $this->getDoctrine()->getManager();
        $redacteur = $em->getRepository("App:Redacteur")->findOneBy(["id" => $id]);
        $formated = array();
        if (!empty($redacteur))
        {
            $formated = [
                "id" => $redacteur->getId(),
                "nom" => $redacteur->getNom(),
                "prenom" => $redacteur->getPrenom(),
                "email" => $redacteur->getEmail()
            ];
            return $this->json($formated, 200);
        }
        return $this->json([], 404);
    }
}