<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 6/12/17
 * Time: 2:25 PM
 */

namespace ims\Services;


use ims\Entities\Privilege;
use ims\Entities\User;

interface ServicesMethods
{
    /**
     * User Table
     * @return mixed
     */
    public function addUser(User $user);
    public function getUser(User $user);
    public function getUserByID(User $user);
    public function checkUser(User $user);
    public function updateUser(User $user);
    public function removeUser(User $user);

    /**
     * Company Privilege
     * @return mixed
     */
    public function addPrivilege(Privilege $privilege);
    public function getPrivilege(Privilege $privilege);
    public function getAllPrivilege();
    public function getLessPrivilege(Privilege $privilege);
}