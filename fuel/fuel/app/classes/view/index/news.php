<?php
/**
 * index/newsページ表示用ViewModel
 *
 */
class View_Index_News extends ViewModel {
	public function view() {
		$data = array();
		$data["subnav"] = $this->set_data['subnav'];

		//テンプレートを変更する場合
		$this->_view = View::forge('index/news',$data);
	}
}