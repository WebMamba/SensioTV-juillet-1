<?php

namespace App\Amdb;

use App\Entity\Movie;
use App\Events\ImportMovieEvent;
use App\Security\Voter\MovieImportVoter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieImporter
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly EntityManagerInterface $entityManager,
        private readonly string $apiHost,
        private readonly string $apiKey,
        private readonly AuthorizationCheckerInterface $authorizationChecker,
        private readonly EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function importMovie(string $title): void
    {
        $response = $this->httpClient->request('GET', $this->apiHost, [
            'query' => [
                't' => $title,
                'apiKey' => $this->apiKey,
                ],
        ]);

        $data = $response->toArray();

        $movie = (new Movie())
            ->setAuthor($data['Writer'])
            ->setTitle($data['Title'])
            ->setDuration((int) $data['Runtime'])
        ;

        if ($this->authorizationChecker->isGranted(MovieImportVoter::MOVIE_IMPORT, $movie)) {
            $this->entityManager->persist($movie);
            $this->entityManager->flush();

            $this->eventDispatcher->dispatch(new ImportMovieEvent($movie));

            return;
        }

        throw new AccessDeniedHttpException();
    }
}
