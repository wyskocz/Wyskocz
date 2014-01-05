<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace Pz\WyskoczBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AuthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('_username');
        $builder->add('_password', 'password');
        $builder->add('zaloguj', 'submit');
    }

    public function getName()
    {
        return 'sign_in';
    }
}