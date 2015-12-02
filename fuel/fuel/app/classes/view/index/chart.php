<?php
/**
 * index/chartページ表示用ViewModel
 *
 * データ取得・データ加工
 *
 */
class View_Index_Chart extends ViewModel {
	public function view() {
		$data = array();
		$data["subnav"] = $this->set_data['subnav'];
		Debug::dump(Model_Dailydatum::get_data_bydate($this->set_data['date_str']));

		//テンプレートを変更する場合
		$this->_view = View::forge('index/chart',$data);
	}
}