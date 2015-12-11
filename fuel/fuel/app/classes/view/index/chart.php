<?php
/**
 * index/chartページ表示用ViewModel
 *
 */
class View_Index_Chart extends ViewModel {
	public function view() {
		$data = array();

		// 画像ディレクトリあるだけ取得
		$data['img_dir_list'] = File::read_dir(DOCROOT.'/assets/img', 1);
		krsort($data['img_dir_list']);

		// サイドバー配列作成
		foreach($data['img_dir_list'] as $key_img => $value_img) {
			$tmp_text = str_replace("/","",$key_img);
			$tmp_array = explode("_",$tmp_text);

			if(count($tmp_array) == 3) $data["date_list_array"][$tmp_array[0]][] = $tmp_text;
		}

		// セットされた日にち
		$data["set_date"] = $this->set_data['date_str'];
		if($data["set_date"] == "--") {
			if(date("N") == 1) {
				//月曜日のとき
				$data["set_date"] = date("Y-m-d", strtotime("-3 day"));
				$data['yesterday'] = date("Y-m-d", strtotime("-3 day"));
			}else {
				if(date("H") < 6 ) {
					$data["set_date"] = date("Y-m-d", strtotime("-1 day -6 hours"));
					$data['yesterday'] = date("Y-m-d", strtotime("-1 day -6 hours"));
				}else {
					$data["set_date"] = date("Y-m-d", strtotime("-1 day"));
					$data['yesterday'] = date("Y-m-d", strtotime("-1 day"));
				}
			}
		}else {
			$data['yesterday'] = $data["set_date"];
		}
		
		$data['file_exist_flag'] = ( array_key_exists(str_replace("-","_",$data['yesterday']).'/' , $data['img_dir_list']) ) ? true : false;
		
		// 指定日の変動データ
		$data["currency_datas"] = Model_Dailydatum::get_data_bydate($data["set_date"]);
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
				array('date', $this->set_data['date_str']),
			),
		));

		//テンプレートを変更する場合
		$this->_view = View::forge('index/chart',$data);
	}
}

