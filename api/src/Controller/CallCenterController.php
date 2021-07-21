<?php


namespace App\Controller;

//use Symfony\Component\HttpKernel\Attribute\AsController;
use App\Entity\CallCenter;

/**
 * Class CallCenterController
 * @package App\Controller
 */
class CallCenterController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    public function __invoke(CallCenter $callCenter)
    {
        sleep(rand(1000, 15000));
    }


}