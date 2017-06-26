<?php

namespace AppBundle\Form;

use AppBundle\Entity\Department;

use AppBundle\Repository\DepartmentRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('department', EntityType::class, [
                'placeholder' => 'Choose a Department',
                'class' => Department::class,
                'query_builder' => function(DepartmentRepository $repo){
                    return $repo->getDepartmentOrderedByNameASC();
                }

            ])
            ->add('age')
            ->add('isEmployee', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false,
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Teacher'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_teacher_form_type';
    }
}
