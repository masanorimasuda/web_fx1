<?php
/**
 * トップページ　Constroller
 *
 * @package AdminPage
 * @author masuda
 * @since PHP 5.6
 * @version 1.0
 */
class Controller_Index extends Controller_Template
{
	/**
	 * 読み込み前処理
	 */
	public function before()
	{
		parent::before();
	}

	public function action_list()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);


		$data["subnav"] = array('list'=> 'active' );
		$this->template->title = 'Index &raquo; List';

		$this->template->content = ViewModel::forge('index/list','view')->set('set_data',$data);
	}

	public function action_chart($year,$month,$day)
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chart.js'), array(), 'add_js', false);


		$data["subnav"] = array('chart'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;
		$this->template->title = 'Index &raquo; Chart';

		$this->template->content = ViewModel::forge('index/chart','view')->set('set_data',$data);
	}

	public function action_news()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/news.js'), array(), 'add_js', false);

		$data["subnav"] = array('news'=> 'active' );
		$this->template->title = 'Index &raquo; News';

		$this->template->content = ViewModel::forge('index/news','view')->set('set_data',$data);
	}

	public function action_chartnews()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chartnews.js'), array(), 'add_js', false);

		$data["subnav"] = array('chart_news'=> 'active' );
		$this->template->title = 'Index &raquo; Chart news';
		$contents = File::read_dir(DOCROOT, 2);
		Debug::dump($contents);

		$this->template->content = ViewModel::forge('index/chartnews','view')->set('set_data',$data);
	}

}
