<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response; //*This is important for response
use Symfony\Component\Routing\Annotation\Route; //!Important for routing

class HelloController  extends AbstractController
{
    private array $messages = [
       
        ['message' => 'Hello', 'created' => '2022/06/12'],
        ['message' => 'Hi', 'created' => '2022/04/12'],
        ['message' => 'Bye!', 'created' => '2021/05/12']
    ];
    

    #[Route('/', name:'app_index')]
    public function index():Response
    {

        return new Response(implode(" ,",$this->messages));
    }

    #[Route('/messages{id}',name:'app_show_one')]
    public function showOne($id):Response
    {
        return  $this->render('hello/ex1.html.twig',
        [
            'messages' => $this->messages[$id]
        ]
        );
        //return new Response($this->messages[$id]);
    }
}

?>