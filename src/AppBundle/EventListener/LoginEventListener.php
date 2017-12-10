<?php

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

        if (null == $user->getFacebookPicture()) {
            $saveto = __DIR__.'/../../../web/uploads/fb';
            $ch = curl_init($facebookUser->getPictureUrl());
            $fp = fopen(sprintf('%s/%s.%s', $saveto, $facebookUser->getId(), 'jpg'), 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
            $user->setFacebookPicture($facebookUser->getId() . '.jpg');
            $this->em->flush();
        }
    }
}
