<?php
/**
 * index/chartページ表示用ViewModel
 *
 */
class View_Index_Chart extends ViewModel {
	public function view() {
		$data = array();
		$data["subnav"] = $this->set_data['subnav'];
		Debug::dump(Model_Dailydatum::get_data_bydate($this->set_data['date_str']));

		$data["set_date"] = $this->set_data['date_str'];

		$data['setting_percent'] = 0.5;
		$data['currency_array'] = array(
			'AUDUSD',
			'AUDJPY',
			'USDJPY',
			'NZDJPY',
			'CNHJPY',
			'EURJPY',
			'NZDUSD',
			'EURUSD'
		);

		$data['news'] = Model_News_Before::find('all', array(
			'where' => array(
				array('date', $this->set_data['date_str']),
			),
		));

		Debug::dump($data['news']);

		//テンプレートを変更する場合
		$this->_view = View::forge('index/chart',$data);
	}
}