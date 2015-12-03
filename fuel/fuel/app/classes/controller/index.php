<?php
/**
 * 前ページ　Constroller
 *
 * @package Page
 * @author masuda
 * @since PHP 5.6
 * @version 1.0
 */
// class Controller_Index extends Controller_Template
class Controller_Index  extends Controller_Base
{
	/**
	 * 読み込み前処理
	 */
	public function before()
	{
		parent::before();
	}

	public function action_today()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);

		$data["subnav"] = array('today'=> 'active' );
		$this->template->title = '本日の重要指標・前日の通貨変動';
		$data["date_str"] = date("Y-m-d");

		$this->template->content = ViewModel::forge('index/today','view')->set('set_data',$data);
	}

	public function action_list()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);

		$data["subnav"] = array('rss'=> 'active' );
		$this->template->title = 'Index &raquo; List';

		$this->template->content = ViewModel::forge('index/list','view')->set('set_data',$data);
	}

	public function action_chart($year = '2015',$month = '01',$day = '01')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chart.js'), array(), 'add_js', false);

		$data["subnav"] = array('chart'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'Index &raquo; Chart';
		$this->template->content = ViewModel::forge('index/chart','view')->set('set_data',$data);
	}

	public function action_news($year = '2015',$month = '01',$day = '01')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/news.js'), array(), 'add_js', false);

		$data["subnav"] = array('news'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'Index &raquo; News';
		$this->template->content = ViewModel::forge('index/news','view')->set('set_data',$data);
	}

	public function action_chartnews($year = '2015',$month = '01',$day = '01')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chartnews.js'), array(), 'add_js', false);

		$data["subnav"] = array('chartnews'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'Index &raquo; Chart news';
		$this->template->content = ViewModel::forge('index/chartnews','view')->set('set_data',$data);
	}

}
