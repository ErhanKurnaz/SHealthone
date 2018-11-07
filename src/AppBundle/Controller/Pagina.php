<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 7-11-2018
 * Time: 12:46
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Pagina extends Controller
{
    /**
     * @Route("/page/{naam}")
     */
    public function showAction($naam) {
        return $this->render('page/show.html.twig', [
           'name' => $naam
        ]);
    }
}