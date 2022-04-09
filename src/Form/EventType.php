<?php

namespace App\Form;

use App\Entity\Events;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

use Symfony\Component\Form\FormBuilderInterface;


class EventType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
      $builder
        ->add('name', TextType::class, [
            'label' => false,
              'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px; margin-top:70px', 'placeholder'=>'Name']
        ])
        ->add('date', DateType::class, [
            'label' => 'Start Date',
              'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px']
        ])
        ->add('time', TimeType::class, [
            'label' => 'Start Time',
              'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px']
        ])
        ->add('description', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Event Description']
        ])
        ->add('imagethumbnail', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Image Thumbnail']
        ])
        ->add('image', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Image']
        ])
        ->add('capacity', NumberType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Number of Tickets available']
        ])
        ->add('email', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Venue Email']
        ])
        ->add('phone', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Venue Phone']
        ])
        ->add('address', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Venue Address']
        ])
        ->add('website', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Venue Website']
        ])
        ->add('type', TextType::class, [
            'label' => false,
            'attr' => ['class' => 'form-control w-50', 'style' => 'margin-bottom:15px', 'placeholder'=>'Event Type, i.e. Festival/Musical etc.']
        ])
          ->add('save', SubmitType::class, [
              'attr' => ['class' => 'btn w-25', 'style' => 'margin-bottom:15px']
          ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
      $resolver->setDefaults([
          'data_class' => Events::class,
      ]);
  }
}