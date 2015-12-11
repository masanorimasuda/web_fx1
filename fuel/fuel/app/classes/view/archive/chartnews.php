<?php
/**
 * index/chart_newsページ表示用ViewModel
 *
 */
class View_Archive_Chartnews extends ViewModel {
	public function view() {
		$data = array();

		// 画像ディレクトリあるだけ取得
		$data['img_dir_list'] = File::read_dir(DOCROOT.'/assets/img', 1);
		krsort($data['img_dir_list']);

		// サイドバー配列作成
		$array_count = 0;
		foreach($data['img_dir_list'] as $key_img => $value_img) {
			$tmp_text = str_replace("/","",$key_img);
			if($array_count == 0) {
				// セットされた日にち
				$set_date = ($this->set_data['date_str'] == "--") ? str_replace("_","-",$tmp_text) : $this->set_data['date_str'];
			}

			$tmp_array = explode("_",$tmp_text);

			if(count($tmp_array) == 3) $data["date_list_array"][$tmp_array[0]][] = $tmp_text;
			$array_count++;
		}

		// 日付調整
		$data['set_date'] = date("Y-m-d", strtotime("${set_date}"));
		$data['yesterday'] = date("Y-m-d", strtotime("${set_date}"));

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
		$this->_view = View::forge('archive/chartnews',$data);
	}
}