<h2 class='h_decoration'>&nbsp;チャート　15分足 / &nbsp;<?php echo $yesterday; ?></h2>
<?php
/**
 * 下記変数セット
 *
 * $yesterday
 * $currency_datas
 * $compare_percent
 * $setting_percent
 * $chart_news_array(ニュース配列)
 */
			foreach($currency_datas as $key=>$value) {
				if(array_key_exists ( 'highest' , $value )) {
					$highlow_percent = (($value['highest'] - $value['lowest'])/$value['start'])*100;
					$compare_percent = ($value['compare']/$value['start'])*100;
				}
			?>
			<dl class="col-xs-12 col-sm-12 col-md-6">
				<dt><?php echo $value['currency']; ?></dt>
				<dd class="clearfix">
					<?php
					switch($value['currency']){
						case "AUDJPY":
						case "AUDUSD":
							$key_text = "AUD";
							break;
						case "USDJPY":
							$key_text = "USD";
							break;
						case "NZDJPY":
						case "NZDUSD":
							$key_text = "NZD";
							break;
						case "CNHJPY":
							$key_text = "CNH";
							break;
						case "EURJPY":
						case "EURUSD":
							$key_text = "EUR";
							break;
					}
					//ニュース一覧
					if(isset($chart_news_array[$key_text])) {
						foreach ($chart_news_array[$key_text] as $key_news => $value_news) {
							if($value_news['attention_rate'] == "重要度高") {
								echo "<dl style='color: red;float: left;'>";
							}else {
								echo "<dl style='float: left;'>";
							}
							echo "<dt>${value_news['textdate']}</dt>";
							echo "<dd>【${value_news['currency']}】";
							echo "</dd>";
							echo "<dd>【重要度】${value_news['attention_rate']}</dd>";
							echo "<dd>【タイトル】${value_news['title']}</dd>";
							echo "<dd>【予想】${value_news['forecast']}</dd>";
							echo "<dd>【結果】${value_news['result']}</dd>";
							echo "</dl>";
						}
					}


					$tmp_text = str_replace('-','_',"/assets/img/${yesterday}/${value['currency']}");
					echo "<img src='${tmp_text}_15.png' width='400' />";

				?>
				</dd>
			</dl>
			<table class="col-xs-12 col-sm-12 col-md-6 table table-striped table-bordered">
				<tr>
					<th>(最高値-最安値)/始値(%)</th>
					<th>(始値-終値)/始値(%)</th>
				</tr>
				<tr>
					<td><?php
					if(array_key_exists ( 'highest' , $value )) {
						if($highlow_percent >= $setting_percent || $highlow_percent <= -1 * $setting_percent) {
							echo "<dd style='color: red;'>${highlow_percent}</dd>";
						}else {
							echo "<dd>${highlow_percent}</dd>";
						}
					}
					?></td>

				
					<td><?php
					if(array_key_exists ( 'highest' , $value )) {
						if($compare_percent >= $setting_percent || $compare_percent <= -1 * $setting_percent) {
							echo "<dd style='color: red;'>" .$compare_percent ."</dd>";
						}else {
							echo "<dd>${compare_percent}</dd>";
						}
					}
					?></td>
				</tr>
			</table>
			<?php } ?>