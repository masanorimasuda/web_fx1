<?php
/**
 * ベースコントローラ
 *
 * @package Page
 * @author masuda
 * @since PHP 5.6
 * @version 1.0
 */
class Controller_Base extends Controller_Template {
	/**
	 * 読み込み前 処理
	 */
	public function before()
	{
		parent::before();
		//Simpleauthオブジェクト作成
		$auth = Auth::instance('Simpleauth');
		// 現在ログインしているusernameをセット(Global変数)
		$this->current_user = $auth->check() ? Model_User::find_by_username($auth->get_screen_name()) : null;
		View::set_global('current_user', $this->current_user);


		/*
		 * 見られているページにより条件分岐
		 */
		if(in_array(Request::active()->controller, array('Controller_Index')))
		{

		}
		else if (! in_array(Request::active()->action, array('login', 'logout')))
		{
			if ($auth->check())
			{
				//groupIDを設定
				//一般ユーザ: 1
				//adminユーザ: 100
				$id_info = $auth->get_groups();
				$group_id = -1;
				//$data = array();
				if ($id_info)
				{
					foreach ($id_info as $info)
					{
						$data['now_group_id'] = $info[1];
						View::set_global('now_group_id', $data['now_group_id']);
					}
				}
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;

				if( $data['now_group_id'] < 100 ) {
					/*
					 * 一般ユーザ(最高管理者以外でないユーザの時)
					*/
					//一般ユーザはcompany/staffページへはadminページへ飛ばす
					if(in_array(Request::active()->controller, array(
						'Controller_Ownermypage'
						))) {
						Response::redirect('/admin/index');
					}
				}elseif($data['now_group_id'] == 100) {
					// 管理者ユーザの時
					if(in_array(Request::active()->controller, array(
						'Controller_Ownermypage',
						))) {
						Response::redirect('/admin/index');
					}
				}else {
					/*
					 * 最高管理者ユーザの時
					*/
					if(in_array(Request::active()->controller, array('Controller_Ownermypage')))
					{
						Response::redirect('/admin/index');
					}
				}
			}
 			else
			{
				Response::redirect('admin/login');
			}
		}
	}
}