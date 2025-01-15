<?php

namespace App\Controller;
use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ArticleController extends AbstractController{

    private string $imagesDirectory;

    public function __construct(#[Autowire('%images_directory%')] string $imagesDirectory)
    {
        $this->imagesDirectory = $imagesDirectory;
    }

    #[Route('/article', name: 'app_article')]
    public function new(Request $request ,ManagerRegistry $m): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gestion de l'image

            $image = $form['image']->getData();
            if ($image){
            /*$fileimage = uniqid().'.'.$image->guessExtension();
            $image->move($this->imagesDirectory,$fileimage);
            $article ->setImage($fileimage);*/
            $fileinfo = pathinfo($image->getClientOriginalName());
            $fileExtension = $fileinfo['extension'];
            $fileimage = uniqid() . '.' . $fileExtension;
            $image->move($this->imagesDirectory,$fileimage);
            $article ->setImage($fileimage);

            }
            $m->getManager()->persist($article);
            $m->getManager()->flush();

            return $this->redirectToRoute('article_success');
        }

        return $this->render('article/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/article/success", name="article_success")
     */
    public function success(): Response
    {
        return new Response('Article créé avec succès!');
    }
}