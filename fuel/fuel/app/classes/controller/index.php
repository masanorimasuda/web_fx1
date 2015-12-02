<?php

class Controller_Index extends Controller_Template
{
//	public function before(){
//
//	}
	public function action_list()
	{
		$data["subnav"] = array('list'=> 'active' );

		/* ---------------------------
		 * 設定
		 ---------------------------*/
		//マッチング条件
		if(Input::get('matching_text','') != '' && Input::get('matching_text','') == "all") {
			//全部表示
			$data['all_patern'] = 'all';
		}else if(Input::get('matching_text') != '' ) {
			//GET
			$data['all_patern'] = "/" .Input::get('matching_text', '')."/i";
		}else {
			//固定
			$data['all_patern'] = "/ムーディーズ|ドル|豪|中国|米|日本|新興国|AUD|RBA|FOMC|RBA/";
			//$all_patern = "/バーナンキ|中央銀行|FRB|FOMC|RBA/i";
		}

		//取得XMLページリスト
		$data['url_array'] = array(
			"Reuters: ビジネス(日本)" => "http://feeds.reuters.com/reuters/JPBusinessNews?format=xml",
			"yahooビジネス(海外総合)" => "http://newsbiz.yahoo.co.jp/international/general_international.rss"
		);

		$data['max'] = 10; //取得件数

		$this->template->title = 'Index &raquo; List';
		$this->template->content = View::forge('index/list', $data);
	}

	public function action_chart($year,$month,$day)
	{
		$data["subnav"] = array('chart'=> 'active' );

		Debug::dump(Model_Dailydatum::get_data_bydate($year."-".$month."-".$day) );
		$this->template->title = 'Index &raquo; Chart';
		$this->template->content = View::forge('index/chart', $data);
	}

	public function action_news()
	{
		$data["subnav"] = array('news'=> 'active' );
		$this->template->title = 'Index &raquo; News';
		$this->template->content = View::forge('index/news', $data);
	}

	public function action_chart_news()
	{
		$data["subnav"] = array('chart_news'=> 'active' );
		$this->template->title = 'Index &raquo; Chart news';
		$this->template->content = View::forge('index/chart_news', $data);
	}

}
