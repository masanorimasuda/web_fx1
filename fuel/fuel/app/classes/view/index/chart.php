<?php
/**
 * index/chartページ表示用ViewModel
 *
 */
class View_Index_Chart extends ViewModel {
	public function view() {
		$data = array();
		$data["subnav"] = $this->set_data['subnav'];

		// 画像ディレクトリあるだけ取得
		$data['img_dir_list'] = File::read_dir(DOCROOT.'/assets/img', 2);
		//Debug::dump($contents);

		// セットされた日にち
		$data["set_date"] = $this->set_data['date_str'];



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
		$this->_view = View::forge('index/chart',$data);
	}
}