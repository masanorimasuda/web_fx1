<?php
/**
 * index/todayページ表示用ViewModel
 *
 */
class View_Index_Today extends ViewModel {
	public function view() {
		$data = array();
		
		// 日付設定(newsデータベースの最新の日付)
		$data['set_date'] = Model_News_Before::query()->max("date");
		$data['yesterday'] = date("Y-m-d", strtotime("${data['set_date']} -1 day"));

		// 指定日の変動データ
		$data["currency_datas"] = Model_Dailydatum::get_data_bydate($data["yesterday"]);
		if (empty($data["currency_datas"])) {
			array_push($data["currency_datas"],array('currency' => 'AUDUSD'));
			array_push($data["currency_datas"],array('currency' => 'AUDJPY'));
			array_push($data["currency_datas"],array('currency' => 'USDJPY'));
			array_push($data["currency_datas"],array('currency' => 'NZDJPY'));
			array_push($data["currency_datas"],array('currency' => 'CNHJPY'));
			array_push($data["currency_datas"],array('currency' => 'EURJPY'));
			array_push($data["currency_datas"],array('currency' => 'NZDUSD'));
			array_push($data["currency_datas"],array('currency' => 'EURUSD'));
		}
		$data['setting_percent'] = 0.5;

		// 指定日のnews一覧
		$data['news'] = Model_News_Before::find('all', array(
			'where' => array(
				array('date', $data['set_date']),
			),
		));

		//テンプレートを変更する場合
		$this->_view = View::forge('index/today',$data);
	}
}

