<?php
/**
 * 管理ページ
 *
 * @package Admin
 * @author masuda
 * @since PHP 5.6
 * @version 1.0
 */
class Controller_Admin extends Controller_Base
{
	public function before()
	{
		parent::before();
		//css・js
		Asset::css(array('min_file/all.css'), array(), 'add_css', false);
		Asset::js(array('min_file/all.js'), array(), 'add_js', false);

		View::set_global('subnav', array('admin'=> 'hidden' ));
		$this->template->title = "管理画面ログイン";
	}

	/**
	 * ログインページ表示
	 *
	 * @param
	 * @param
	 * @return
	 */
	public function action_login()
	{
		//simpleauthを利用
		$auth = Auth::instance('Simpleauth');
		// Already logged in
		$auth->check() and Response::redirect('admin/index');

		$val = Validation::forge();

		if (Input::method() == 'POST')
		{
			$val->add('email', 'Email or Username')
			    ->add_rule('required');
			$val->add('password', 'Password')
			    ->add_rule('required');

			if ($val->run())
			{

				// check the credentials. This assumes that you have the previous table created
				if ($auth->check() or $auth->login(Input::post('email'), Input::post('password')))
				{
					// credentials ok, go right in
					if (Config::get('auth.driver', 'Simpleauth') == 'Ormauth')
					{
						$current_user = Model\Auth_User::find_by_username($auth->get_screen_name());
					}
					else
					{
						$current_user = Model_User::find_by_username($auth->get_screen_name());
					}
					Session::set_flash('success', e('ようこそ, '.$current_user->username."様"));
					Response::redirect('admin/index');
				}
				else
				{
					$this->template->set_global('login_error', 'IDもしくはパスワードが違います。');
				}
			}
		}

		$this->template->h2_title = 'ログイン';
		$this->template->content = View::forge('admin/login', array('val' => $val), false);
	}

	/**
	 * ログアウトページ　表示
	 *
	 * @param
	 * @param
	 * @return
	 */
	public function action_logout()
	{
		//simpleauthを利用
		$auth = Auth::instance('Simpleauth');
		$auth->logout();
		Response::redirect('admin/login');
	}

	/**
	 * 管理　表示
	 *
	 * @param
	 * @param
	 * @return
	 */
	public function action_index()
	{
		$data = array();
		$this->template->content = View::forge('admin/dashboard', $data);

	}
}