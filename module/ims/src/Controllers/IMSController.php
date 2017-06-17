<?php
/**
 * Created by PhpStorm.
 * User: fre
 * Date: 6/17/17
 * Time: 12:41 AM
 */


namespace ims\Controllers;


use ims\Services\Service;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class IMSController extends AbstractRestfulController
{
    /**
     * @var Service $ServiceManager
     */
    protected $ServiceManager;

    /**
     * WedeChurchController constructor.
     * @param Service $ServiceManager
     */
    public function __construct(Service $ServiceManager)
    {
        $this->ServiceManager = $ServiceManager;
    }


    public function getList()
    {
        return new JsonModel(array("API Controller"));
    }
    public function create($data)
    {
        $process = new APIProcess1($this->ServiceManager,$data);
        $process->Process();
        return new JsonModel($process->getMessage());
    }
}