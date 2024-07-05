<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DataController extends AbstractController
{
    #[Route('/add_movie/{title}/{author}', name: 'add_movie', methods: ['GET'])]
    public function addMovie(string $title, string $author, EntityManagerInterface $entityManager): Response
    {
        $movie = (new Movie())
            ->setTitle($title)
            ->setAuthor($author)
            ->setReleaseAt(new \DateTimeImmutable('now'))
            ->setDuration(120)
        ;

        $entityManager->persist($movie);
        $entityManager->flush();

        return new Response(200);
    }

    #[Route('/best_movies', name: 'app_data')]
    public function index(): Response
    {
        $movies = [
            ["name" => "Spirited Away", "author" => "Hayao Miyazaki", "rating" => 8],
            ["name" => "Inception", "author" => "Christopher Nolan", "rating" => 4],
            ["name" => "Interstellar", "author" => "Christopher Nolan", "rating" => 6],
            ["name" => "The Matrix", "author" => "Lana and Lilly Wachowski", "rating" => 1],
            ["name" => "Forrest Gump", "author" => "Robert Zemeckis", "rating" => 10],
            ["name" => "The Lord of the Rings", "author" => "Peter Jackson", "rating" => 7],
            ["name" => "Fight Club", "author" => "David Fincher", "rating" => 2],
            ["name" => "Pulp Fiction", "author" => "Quentin Tarantino", "rating" => 1],
            ["name" => "Gladiator", "author" => "Ridley Scott", "rating" => 9],
            ["name" => "The Godfather", "author" => "Francis Ford Coppola", "rating" => 7],
            ["name" => "Jurassic Park", "author" => "Steven Spielberg", "rating" => 8],
            ["name" => "Blade Runner", "author" => "Ridley Scott", "rating" => 3],
            ["name" => "Alien", "author" => "Ridley Scott", "rating" => 9],
            ["name" => "The Silence of the Lambs", "author" => "Jonathan Demme", "rating" => 4],
            ["name" => "Mad Max: Fury Road", "author" => "George Miller", "rating" => 5],
        ];

        return $this->render('data/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
