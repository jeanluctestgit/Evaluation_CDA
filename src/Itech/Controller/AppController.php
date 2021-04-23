<?php
namespace Itech\Controller;


use Itech\Model\User;
use Itech\Repository\UserManager;
use Simplex\Service\Form;
use Simplex\Service\Hydrator;
use Simplex\Templating;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController
{
    public function index(Request $request): Response
    {
        $security = false;
        if(isset($_SESSION['security'])){
          $security = $_SESSION['security'];
        }
        $templating = new Templating();

        return new Response(
            $templating->render('Itech::index.php', ['security' => $security]),
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }
}