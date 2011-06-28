<?php
/**
 * TomatoCMS
 * 
 * LICENSE
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE Version 2 
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-2.0.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@tomatocms.com so we can send you a copy immediately.
 * 
 * @copyright	Copyright (c) 2009-2010 TIG Corporation (http://www.tig.vn)
 * @license		http://www.gnu.org/licenses/gpl-2.0.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @version 	$Id: Widget.php 3563 2010-07-11 10:50:58Z huuphuoc $
 * @since		2.0.7
 */

class News_Widgets_DashboardArticle_Widget extends Tomato_Widget_Dashboard 
{
	protected function _prepareShow()
	{
		$limit = $this->_request->getParam('limit', 5);
		
		$conn = Tomato_Db_Connection::factory()->getMasterConnection();
		$articleDao = Tomato_Model_Dao_Factory::getInstance()->setModule('news')->getArticleDao();
		$articleDao->setDbConnection($conn);
		$articles = $articleDao->find(0, $limit, array('status' => 'inactive'));
		
		$this->_view->assign('articles', $articles);
	}
}
