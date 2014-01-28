<?php

namespace Innova\FavoriteBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Claroline\CoreBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContextInterface;

class FavoriteManager
{
    /**
     * Object Manager
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $om;
    
    /**
     * Security context
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    protected $securityContext;
    
    /**
     * Class constructor
     * @param \Doctrine\Common\Persistence\ObjectManager                $objectManager
     * @param \Symfony\Component\Security\Core\SecurityContextInterface $securityContext
     */
    public function __construct(
        ObjectManager            $objectManager,
        SecurityContextInterface $securityContext
    ) {
        $this->om              = $objectManager;
        $this->securityContext = $securityContext;
    }
    
    public function getUserFavorites(User $user = null)
    {
        if (empty($user)) {
            $user = $this->securityContext->getToken()->getUser();
        }
        
        // Get all shortcuts of user
        $favorites = $this->om->getRepository('ClarolineCoreBundle:Resource\ResourceNode')->findBy(array (
            'class' => 'Claroline\CoreBundle\Entity\Resource\ResourceShortcut',
            'creator' => $user,
        ));
    
        return $favorites;
    }
}