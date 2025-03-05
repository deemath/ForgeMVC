<?php 

/**
 * logout class
 */
class Logout
{
	use Controller;

	public function Ask(){
		$this->view('Supervisor/logout');
	}

	public function index()
	{

		if(!empty($_SESSION['USER']))
			unset($_SESSION['USER']);
			session_unset();
		redirect('home');
	}

}
