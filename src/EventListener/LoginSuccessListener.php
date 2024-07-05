<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

final class LoginSuccessListener
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[AsEventListener(event: LoginSuccessEvent::class)]
    public function onLoginSuccessEvent(LoginSuccessEvent $event): void
    {
        /** @var User $user */
        $user = $event->getUser();

        $user->setLastConnexion(new \DateTimeImmutable());
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
