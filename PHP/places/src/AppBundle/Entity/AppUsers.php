<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="app_users", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_C2502824F85E0677", columns={"username"}), @ORM\UniqueConstraint(name="UNIQ_C2502824E7927C74", columns={"email"})})
 * @ORM\Entity
 */
class AppUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=25, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=25, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=25, nullable=false)
     */
    private $lastname;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json_array", nullable=false)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="dummy_roles", type="string", length=16, nullable=true)
     */
    private $dummyRoles;

    /**
     * @var string
     *
     * @ORM\Column(name="plain_assword", type="string", length=16, nullable=true)
     */
    private $plainAssword;


}

