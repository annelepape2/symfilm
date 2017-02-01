<?php
// src/Symfony/BiblioBundle/Controller/DefaultController.php
namespace Symmfony\BiblioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="page_accueil")
     */
    public function indexAction()
    {
        return $this->render('SymfonyBiblioBundle:Default:index.html.twig');
    }

    /**
     * @Route("/films", name="page_films")
     */
    public function listAction()
    {
        $film = $this->getDoctrine()->getRepository('SymfonyBiblioBundle:Film')->findAll();

        $titre_de_la_page = 'Films de la bibliothèques';

        return $this->render(
            'SymfonyBiblioBundle:Film:list.html.twig',
            ['film' => $film, 'titre' => $titre_de_la_page]
        );
    }

    /**
     * @Route("/film/{id}", requirements={"id": "\d+"}, name="page_film")
     */
    public function showAction($id)
    {
        $film = $this->getDoctrine()->getRepository('SymfonyBiblioBundle:Film')->find($id);

        return $this->render(
            'SymfonyBiblioBundle:Film:show.html.twig',
            ['film' => $film]
        );
    }


}