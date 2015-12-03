<?php
/**
 * index/chart_newsページ表示用ViewModel
 *
 */
class View_Index_Chartnews extends ViewModel {
	public function view() {
		$data = array();
		$data["subnav"] = $this->set_data['subnav'];

		// セットされた日にち
		//$data["set_date"] = $this->set_data['date_str'];
		$data['set_date'] = date("Y-m-d");
		$data['yesterday'] = date("Y-m-d", strtotime("-1 day"  ));

		// 指定日の変動データ
		$data["currency_datas"] = Model_Dailydatum::get_data_bydate($data["set_date"]);
		$data['setting_percent'] = 0.5;

		// 指定日のnews一覧
		$data['news'] = Model_News_Before::find('all', array(
			'where' => array(
				array('date', $this->set_data['date_str']),
			),
		));


		//テンプレートを変更する場合
		$this->_view = View::forge('index/chartnews',$data);
	}
}