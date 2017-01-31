<?php
// src/Devschool/BiblioBundle/Controller/DefaultController.phpnamespace Symfony\BiblioBundle\Controller;

namespace Symfony\BiblioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
        $films = $this->getDoctrine()->getRepository('SymfonyBiblioBundle:Film')->findAll();
        $titre_de_la_page = 'Livres de la bibliothèques';

        return $this->render(
            'SymfonyBiblioBundle:Film:list.html.twig',
            ['film' => $films, 'titre' => $titre_de_la_page]
        );
    }

    /**
     * @Route("/livre/{id}", requirements={"id": "\d+"}, name="page_films")
     */
    public function showAction($id)
    {
        $films = $this->getDoctrine()->getRepository('SymfonyBiblioBundle:Film')->find($id);

        return $this->render(
            'SymfonyBiblioBundle:Film:show.html.twig',
            ['film' => $films]
        );
    }
}