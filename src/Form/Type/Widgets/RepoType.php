<?php

namespace Shapecode\Devliver\Form\Type\Widgets;

use Shapecode\Devliver\Entity\RepoInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class RepoType
 *
 * @package Shapecode\Devliver\Form\Type\Widgets
 * @author  Nikita Loges
 */
class RepoType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', RepoTypeType::class, [
            'required'    => true,
            'label'       => 'Typ',
            'constraints' => [
                new NotBlank()
            ]
        ]);

        $builder->add('url', TextType::class, [
            'required'    => false,
            'label'       => 'Repository URL or path (bitbucket git repositories need the trailing .git)',
            'constraints' => [
                new NotBlank()
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RepoInterface::class
        ]);
    }

}
