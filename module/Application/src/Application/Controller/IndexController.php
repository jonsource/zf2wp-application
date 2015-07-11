<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

$wpdb = null;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        global $wpdb;

        $wM = $this->getServiceLocator()->get('wpdbManager');

        $wpdb = $wM->getWpdb();

        $default = array(
            'post_type'         => 'mfcc_dog',
            'posts_per_page'    => -1,
            'post_status'       => 'publish',
            'order'             => 'ASC',
            'category_name'     => 'k-adopci'
        );

        $query = new \WP_Query($default);
        var_dump($query->get_posts());
        die();


        $post = $wM->getPostById(30);
        var_dump($post);

        echo "<br><br>";

        $post = $wM->getPostById(30,true);
        var_dump($post);

        return new ViewModel();
    }
}
