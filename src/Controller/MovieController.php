<?php

namespace App\Controller;

use App\Amdb\MovieImporter;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movie')]
class MovieController extends AbstractController
{
    #[Route('/by-genre', name: 'app_movie_by_genre', methods: 'GET')]
    public function byGenre(): Response
    {
        return $this->render('movie/by_genre.html.twig');
    }

    #[Route('/fake-cart', name: 'app_user_cart', methods: 'GET')]
    public function cart(): Response
    {
        return $this->render('movie/by_genre.html.twig');
    }

    #[Route('/details', name: 'app_movie_details', methods: 'GET')]
    public function details(): Response
    {
        return $this->render('movie/details.html.twig');
    }

    #[Route('/latest', name: 'app_movie_latest', methods: 'GET')]
    public function latest(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findTenLastMovies();

        return $this->render('movie/latest.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/player', name: 'app_movie_player', methods: 'GET')]
    public function player(): Response
    {
        return $this->render('movie/player.html.twig');
    }

    #[Route('/top-rated', name: 'app_movie_top_rated', methods: 'GET')]
    public function topRated(): Response
    {
        return $this->render('movie/top_rated.html.twig');
    }

    #[Route('/import/{title}', name: 'app_movie_import')]
    public function import(string $title, MovieImporter $movieImporter): Response
    {
        $movieImporter->importMovie($title);

        return new Response('', Response::HTTP_CREATED);
    }
}
