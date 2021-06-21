<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Actor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('poster')
            ->add('synopsis')
            ->add('country')
            ->add('year')
            ->add('category', null, ['choice_label' => 'name'])
        ;
        $builder->add('actors', EntityType::class, [
            'class' => Actor::class,
            'choice_label' => 'name',
            'multiple' => true,
            'expanded' => true,
            'by_reference' => false,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
