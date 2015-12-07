<?php
/**
 * index/listページ表示用ViewModel
 *
 */
class View_Index_Links extends ViewModel {
	public function view() {
		$data = array();

		/* ---------------------------
		 * 設定
		 ---------------------------*/
		//マッチング条件
		if(Input::get('matching_text','') != '') {
			switch (Input::get('matching_text','')) {
				case 'all':
					//全部表示
					$data['all_patern'] = 'all';
					break;
				default:
					$data['all_patern'] = "/".Input::get('matching_text', '')."/i";
					break;
			}
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

		//テンプレートを変更する場合
		$this->_view = View::forge('index/links',$data);
	}
}