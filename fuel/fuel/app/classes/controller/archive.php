<?php
/**
 * Archiveページ　Constroller
 *
 * @package Page
 * @author masuda
 * @since PHP 5.6
 * @version 1.0
 */
class Controller_Archive extends Controller_Base
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
	 * チャートページ
	 * 
	 * @param  string 年4桁テキスト
	 * @param  string 月2桁テキスト
	 * @param  string 日2桁テキスト
	 * @return [type]
	 */
	public function action_chart($year = '',$month = '',$day = '')
	{
		View::set_global('subnav', array('chart'=> 'active'));
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'チャート';
		$this->template->content = ViewModel::forge('archive/chart','view')->set('set_data',$data);
	}

	/**
	 * ニュース
	 */
	public function action_news($year = '',$month = '',$day = '')
	{
		View::set_global('subnav', array('news'=> 'active'));
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'ニュース';
		$this->template->content = ViewModel::forge('archive/news','view')->set('set_data',$data);
	}

	/**
	 * チャート・ニュース
	 * 
	 * @param  string 年4桁テキスト
	 * @param  string 月2桁テキスト
	 * @param  string 日2桁テキスト
	 * @return [type]
	 */
	public function action_chartnews($year = '',$month = '',$day = '')
	{
		View::set_global('subnav', array('chartnews'=> 'active'));
		$data["date_str"] = $year."-".$month."-".$day;

		$this->template->title = 'チャート・ニュース';
		$this->template->content = ViewModel::forge('archive/chartnews','view')->set('set_data',$data);
	}

}
