<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/17/17
 * Time: 7:40 AM
 */

namespace ims\Entities;


class UserProfile
    /**
     * @ORM\Entity
     * @ORM\Table(name="serProfile")
     */
{
    protected $firstName;
    protected $lastName;
}