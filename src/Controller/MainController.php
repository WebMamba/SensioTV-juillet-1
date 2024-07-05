<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main_index', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/contact', name: 'app_main_contact', methods: 'GET')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig');
    }

    #[Route('/movie/login', name: 'app_main_login', methods: 'GET')]
    public function login(): Response
    {
        return $this->render('main/login.html.twig');
    }

    #[Route('/password-recovering', name: 'app_main_password_recovering', methods: 'GET')]
    public function passwordRecovering(): Response
    {
        return $this->render('main/password_recovering.html.twig');
    }

    #[Route('/trailer-player', name: 'app_main_trailer_player', methods: 'GET')]
    public function trailerPlayer(): Response
    {
        return $this->render('main/trailer_player.html.twig');
    }
}
