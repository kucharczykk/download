<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\SubmitButtonTypeInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use function Sodium\add;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse|Response
     */
    public function register (Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createFormBuilder()
            ->add('uzytkownik')
            ->add('password',RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label'=> 'Hasło'],
                'second_options' => ['label' => 'Potwierdź hasło']
            ])

            ->add('rejestracja', SubmitType::class, [
                    'attr' => [
                     'class' => 'btn btn-success float-right'
                    ]

                ])
                -> getForm();

        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $data =  $form->getData();
            $user = new User();
            $user->setUsername($data ['username']);
            $user->setPassword(
                $passwordEncoder->encodePassword($user, $data['password'])
            );
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
            ]);

    }
}
