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
		//css・js
		Asset::css(array('min_file/all.css'), array(), 'add_css', false);
		Asset::js(array('min_file/all.js'), array(), 'add_js', false);


	}

	/**
	 * 本日の重要指標・前日の通貨変動
	 * 
	 * @return [type]
	 */
	public function action_today()
	{

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
		View::set_global('subnav', array('links'=> 'active'));
		$this->template->title = '外部サイトリンク';

		$this->template->content = ViewModel::forge('index/links','view');
	}
}
