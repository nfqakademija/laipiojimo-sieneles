<?php
/**
 * Created by PhpStorm.
 * User: matas
 * Date: 11/7/17
 * Time: 2:33 PM
 */

namespace AppBundle\EventListener;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\Provider\FacebookClient;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


class LoginEventListener
{
    private $client;
    private $em;

    public function __construct(EntityManagerInterface $em, ClientRegistry $clientRegistry)
    {
        $this->clientRegistry = $clientRegistry;
        $this->em = $em;
    }

    public function onLogin(InteractiveLoginEvent $event)
    {
        $token = $event->getAuthenticationToken()->getUser()->getFacebookToken();
        $client = $this->clientRegistry->getClient('facebook_main');
        $provider = $client->getOAuth2Provider();


        $longToken = $provider->getLongLivedAccessToken($token);
        $facebookUser = $client->fetchUserFromToken($longToken);


        $user = $this->em->getRepository(User::class)
            ->findOneBy(['facebookId' => $facebookUser->getId()]);
        $user->setFacebookPicture($facebookUser->getPictureUrl());
        $this->em->flush();
    }
}