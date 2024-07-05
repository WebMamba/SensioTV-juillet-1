<?php

namespace App\Security\Voter;

use App\Entity\Movie;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class MovieImportVoter extends Voter
{
    public const MOVIE_IMPORT = 'MOVIE_IMPORT';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return $attribute === self::MOVIE_IMPORT && $subject instanceof Movie;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        /** @var User $user */
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        return $user->getName() === $subject->getAuthor();
    }
}
