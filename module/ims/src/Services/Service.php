<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/12/17
 * Time: 2:24 PM
 */

namespace ims\Services;

use Doctrine\ORM\EntityManager;
use ims\Entities\Privilege;
use ims\Entities\User;
use ims\Entities\PartnerProfile;

class Service implements ServicesMethods
{
    /**
     * @var EntityManager $EntityManager
     */
    protected $EntityManager;

    /**
     * Service constructor.
     * @param EntityManager $EntityManager
     */
    public function __construct(EntityManager $EntityManager)
    {
        $this->EntityManager = $EntityManager;
    }

    public function addUser(User $user)
    {
        $user->setId(null);
        $user->setIsActive(1);
        $user->setIsDeleted(0);
        $user->setCreatedDate(new \DateTime('now'));
        $user->setUpdatedDate(new \DateTime('now'));
        $user->setUserPass(sha1($user->getUserPass()));
        $this->EntityManager->persist($user);
        $this->EntityManager->flush();
        if($user->getId()){
            return $user;
        }else{
            return null;
        }
    }

    public function getUser(User $user)
    {
        if($user->getId()){
            $foundUser = $this->EntityManager->getRepository(User::class)->find($user->getId());
            return $foundUser;
        }else{
            return null;
        }
    }

    public function getUserByID(User $user)
    {
        $allUser = $this->EntityManager->getRepository(User::class)->findAll();
        foreach ($allUser as $_user){
            /**
             * @var User $_user
             */
            if($user->getId() == $_user->getId()){
                return $_user;
            }
        }
        return null;
    }

    public function checkUser(User $user)
    {
        $allUsers = $this->EntityManager->getRepository(User::class)->findAll();
        foreach ($allUsers as $_user){
            /**
             * @var User $_user
             */
            if(($_user->getUserPass() == sha1($user->getUserPass())) &&
                (($_user->getUserName() == $user->getUserName()) || ($_user->getEmail() == $user->getEmail()))){
                return $_user;
            }
        }
        return null;
    }

    public function updateUser(User $user)
    {
        if($user->getId()){
            $this->EntityManager->persist($user);
            $this->EntityManager->flush();
            if($user->getId()){
                return $user;
            }else{
                return null;
            }
        }
    }

    public function removeUser(User $user)
    {
        if($user){
            /**
             * @var User $foundUser
             */
            $foundUser = $this->getUser($user);
            if($foundUser){
                $this->EntityManager->remove($foundUser);
                $this->EntityManager->flush();
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function addPrivilege(Privilege $privilege)
    {
        $privilege->setId(null);
        $privilege->setIsActive(1);
        $privilege->setIsDeleted(0);
        $privilege->setCreatedDate(new \DateTime('now'));
        $privilege->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($privilege);
        $this->EntityManager->flush();
        if($privilege->getId()){
            return $privilege;
        }else{
            return null;
        }
    }

    public function getPrivilege(Privilege $privilege)
    {
        if($privilege->getId()){
            $foundPrivilege = $this->EntityManager->getRepository(Privilege::class)->find($privilege->getId());
            return $foundPrivilege;
        }else{
            return null;
        }
    }

    public function getAllPrivilege()
    {
        $foundPrivileges = [];
        $allPrivileges = $this->EntityManager->getRepository(Privilege::class)->findAll();
        foreach ($allPrivileges as $privilege){
            /**
             * @var Privilege $privilege
             */
            if($privilege->getId()>2){
                $foundPrivileges[] = $privilege->getArray();
            }
        }
        return $foundPrivileges;
    }

    public function getLessPrivilege(Privilege $partinerProfile)
    {
        $foundPrivileges = [];
        $allPrivileges = $this->EntityManager->getRepository(Privilege::class)->findAll();
        foreach ($allPrivileges as $_privilege){
            /**
             * @var Privilege $_privilege
             */
            if($privilege->getId()<3){
                if($privilege->getId() <= $_privilege->getId()){
                    $foundPrivileges[] = $_privilege->getArray();
                }
            }else{
                if($privilege->getId() < $_privilege->getId()){
                    $foundPrivileges[] = $_privilege->getArray();
                }
            }
        }
        return $foundPrivileges;
    }

    public function addUserProfile(PartnerProfile $partinerProfile)
    {
        $userProfile->setId(null);
        $userProfile->setIsActive(1);
        $userProfile->setIsDeleted(0);
        $userProfile->setCreatedDate(new \DateTime('now'));
        $userProfile->setUpdatedDate(new \DateTime('now'));
        $this->EntityManager->persist($userProfile);
        $this->EntityManager->flush();
        if($userProfile->getId()){
            return $userProfile;
        }else{
            return null;
        }

    }

    public function getUserProfile(PartnerProfile $partinerProfile)
    {
    }
    public function updateUserProfile(PartnerProfile $partinerProfile)
    {
    }
    public function removeUserProfile(PartnerProfile $partinerProfile)
    {
    }

}