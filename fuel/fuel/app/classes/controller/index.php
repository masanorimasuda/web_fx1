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

	// 本日の重要指標・前日の通貨変動
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

	// RSSページ
	public function action_list()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);

		$data["subnav"] = array('rss'=> 'active' );
		$this->template->title = 'RSSからニュース取得・外部サイトリンク';

		$this->template->content = ViewModel::forge('index/list','view')->set('set_data',$data);
	}

	// チャートページ
	public function action_chart($year = '',$month = '',$day = '')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chart.js'), array(), 'add_js', false);

		$data["subnav"] = array('chart'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'チャート';
		$this->template->content = ViewModel::forge('index/chart','view')->set('set_data',$data);
	}

	// ニュース
	public function action_news($year = '',$month = '',$day = '')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/news.js'), array(), 'add_js', false);

		$data["subnav"] = array('news'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'ニュース';
		$this->template->content = ViewModel::forge('index/news','view')->set('set_data',$data);
	}

	// チャート・ニュース
	public function action_chartnews($year = '2015',$month = '01',$day = '01')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chartnews.js'), array(), 'add_js', false);

		$data["subnav"] = array('chartnews'=> 'active' );
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'チャート・ニュース';
		$this->template->content = ViewModel::forge('index/chartnews','view')->set('set_data',$data);
	}

}
