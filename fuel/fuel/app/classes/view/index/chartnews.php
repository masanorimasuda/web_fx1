<?php
/**
 * index/chart_newsページ表示用ViewModel
 *
 */
class View_Index_Chartnews extends ViewModel {
	public function view() {
		$data = array();
		$data["subnav"] = $this->set_data['subnav'];

		//テンプレートを変更する場合
		$this->_view = View::forge('index/chartnews',$data);
	}
}