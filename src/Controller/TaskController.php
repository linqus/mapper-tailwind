<?php

namespace App\Controller;

use App\Entity\Task;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task/new', name: 'app_task')]
    public function new(Request $request): Response
    {
        $task = new Task();
        $task->setTask('Write a book!');
        $task->setDueDate(new DateTimeImmutable('next year'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, [
                'label' => 'Create Task',
            ])
            ->getForm();


    }
}
