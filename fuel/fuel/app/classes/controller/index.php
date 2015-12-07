<?php
/**
 * indexページ　Constroller
 *
 * @package Page
 * @author masuda
 * @since PHP 5.6
 * @version 1.0
 */
// class Controller_Index extends Controller_Template
class Controller_Index extends Controller_Base
{
	/**
	 * 読み込み前処理
	 */
	public function before()
	{
		parent::before();
	}

	/**
	 * 本日の重要指標・前日の通貨変動
	 * 
	 * @return [type]
	 */
	public function action_today()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);

		View::set_global('subnav', array('today'=> 'active' ));
		$this->template->title = '本日の重要指標・前日の通貨変動';
		$data["date_str"] = date("Y-m-d");

		$this->template->content = ViewModel::forge('index/today','view')->set('set_data',$data);
	}

	/**
	 * RSSページ
	 * 
	 * @return [type]
	 */
	public function action_list()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);

		View::set_global('subnav', array('rss'=> 'active'));
		$this->template->title = 'RSSからニュース取得';

		$this->template->content = ViewModel::forge('index/list','view');
	}

	/**
	 * 外部リンクページ
	 * 
	 * @return [type]
	 */
	public function action_links()
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/list.js'), array(), 'add_js', false);

		View::set_global('subnav', array('links'=> 'active'));
		$this->template->title = '外部サイトリンク';

		$this->template->content = ViewModel::forge('index/links','view');
	}



	/**
	 * チャートページ
	 * 
	 * @param  string 年4桁テキスト
	 * @param  string 月2桁テキスト
	 * @param  string 日2桁テキスト
	 * @return [type]
	 */
	public function action_chart($year = '',$month = '',$day = '')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chart.js'), array(), 'add_js', false);

		View::set_global('subnav', array('chart'=> 'active'));
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'チャート';
		$this->template->content = ViewModel::forge('index/chart','view')->set('set_data',$data);
	}

	/**
	 * ニュース
	 */
	public function action_news($year = '',$month = '',$day = '')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/news.js'), array(), 'add_js', false);

		View::set_global('subnav', array('news'=> 'active'));
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'ニュース';
		$this->template->content = ViewModel::forge('index/news','view')->set('set_data',$data);
	}

	/**
	 * チャート・ニュース
	 * 
	 * @param  string 年4桁テキスト
	 * @param  string 月2桁テキスト
	 * @param  string 日2桁テキスト
	 * @return [type]
	 */
	public function action_chartnews($year = '2015',$month = '01',$day = '01')
	{
		//css・js
		Asset::css(array('min_file/list.css'), array(), 'add_css', false);
		Asset::js(array('min_file/chartnews.js'), array(), 'add_js', false);

		View::set_global('subnav', array('chartnews'=> 'active'));
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'チャート・ニュース';
		$this->template->content = ViewModel::forge('index/chartnews','view')->set('set_data',$data);
	}

}
