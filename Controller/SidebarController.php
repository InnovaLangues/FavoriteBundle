<?php

namespace Innova\FavoriteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Innova\FavoriteBundle\Manager\FavoriteManager;

/**
 * Class SidebarController
 *
 * @category   Controller
 * @package    Innova
 * @subpackage FavoriteBundle
 * @author     Innovalangues <contact@innovalangues.net>
 * @copyright  2013 Innovalangues
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 * @version    0.1
 * @link       http://innovalangues.net
 *
 * @Route(
 *      "favorites",
 *      name    = "innova_favorite_sidebar",
 *      service = "innova_favorite.controller.sidebar"
 * )
 */
class SidebarController
{
	/**
	 * Favorite Manager
	 * @var \Innova\FavoriteBundle\Manager\FavoriteManager
	 */
	protected $favoriteManager;
	
	/**
	 * Class constructor
	 * @param \Innova\FavoriteBundle\Manager\FavoriteManager $favoriteManager
	 */
	public function __construct(FavoriteManager $favoriteManager)
	{
		$this->favoriteManager = $favoriteManager;
	}
	
    /**
     * Display sidebar
     * @Route(
     *      "/",
     *      name    = "innova_path_editor_new",
     *      options = {"expose" = true}
     * )
     * @Method("GET")
     * @Template("InnovaFavoriteBundle::sidebar.html.twig")
     */
    public function displayAction()
    {
    	$favorites = $this->favoriteManager->getUserFavorites();
    	
        return array (
        	'favorites' => $favorites,
        );
    }
}