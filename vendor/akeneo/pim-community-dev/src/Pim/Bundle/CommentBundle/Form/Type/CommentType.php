<?php

namespace Pim\Bundle\CommentBundle\Form\Type;

use Pim\Bundle\CommentBundle\Repository\CommentRepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Comment type
 *
 * @author    Olivier Soulet <olivier.soulet@akeneo.com>
 * @author    Julien Janvier <julien.janvier@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class CommentType extends AbstractType
{
    /** @var CommentRepositoryInterface */
    protected $repository;

    /** @var TranslatorInterface  */
    protected $translator;

    /** @var string */
    protected $dataClass;

    /**
     * @param CommentRepositoryInterface $repository
     * @param TranslatorInterface        $translator
     * @param string                     $dataClass
     */
    public function __construct(CommentRepositoryInterface $repository, TranslatorInterface $translator, $dataClass)
    {
        $this->repository = $repository;
        $this->translator = $translator;
        $this->dataClass = $dataClass;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $placeholder = (true === $options['is_reply']) ? 'comment.placeholder.reply' : 'comment.placeholder.new';
        $placeholder = $this->translator->trans($placeholder);

        $builder
            ->add(
                'body',
                'textarea',
                ['label' => false, 'attr' => ['placeholder' => $placeholder, 'class' => 'exclude']]
            )
            ->add('resourceName', 'hidden')
            ->add('resourceId', 'hidden');

        if (true === $options['is_reply']) {
            $builder->add('parent', 'pim_object_identifier', ['multiple' => false, 'repository' => $this->repository]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => $this->dataClass,
                'is_reply'   => false
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pim_comment_comment';
    }
}
