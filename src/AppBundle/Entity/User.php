<?php
/**
 * Created by PhpStorm.
 * User: matas
 * Date: 10/30/17
 * Time: 5:00 PM
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    protected $facebook_id;

    /**
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    protected $facebook_access_token;
//
//    /**
//     * @ORM\Column(name="google_id", type="string", length=255, nullable=true)
//     */
//    protected $google_id;
//
//    /**
//     * @ORM\Column(name="google_access_token", type="string", length=255, nullable=true)
//     */
//    protected $google_access_token;
}