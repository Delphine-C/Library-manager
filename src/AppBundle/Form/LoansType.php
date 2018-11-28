<?php

namespace AppBundle\Form;

use AppBundle\Entity\Patrons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LoansType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('book', EntityType::class, [
                'class' => 'AppBundle:Books',
                'choice_label' => 'title'
            ])
            ->add('patron', EntityType::class, [
                'class' => 'AppBundle:Patrons',
                'choice_label' => function (Patrons $patrons) {
                    return $patrons->getFirstName() . ' ' . $patrons->getLastName();
                }
            ])
            ->add('loanedOn', DateType::class)
            ->add('returnBy', DateType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Loans'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_loans';
    }


}
