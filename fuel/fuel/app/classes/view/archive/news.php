<?php
/**
 * index/newsページ表示用ViewModel
 *
 */
class View_Archive_News extends ViewModel {
	public function view() {
		$data = array();

		// セットされた日にち
		$data["set_date"] = $this->set_data['date_str'];
		if($data["set_date"] == "--") {
			$data['set_date'] = date("Y-m-d");
		}

		// news一覧取得
		$data['news'] = Model_News_Before::find('all', array(
			'where' => array(
				array('date', $data["set_date"]),
			),
		));
		// date一覧

		$query = DB::select('date')->from('news_befores');
		$data['news_datelist'] = $query->distinct()->execute()->as_array('date');
		krsort($data['news_datelist']);

		//テンプレートを変更する場合
		$this->_view = View::forge('archive/news',$data);
	}
}