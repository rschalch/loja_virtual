<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}


	class Verify extends CI_Controller {

		public function index() {

			$this->load->model('User');

			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$data = array(
				'email' => $email,
				'senha' => sha1($password)
			);

			if ($this->User->checkadmin($data)) {
				$row = $this->User->get_session_data($email);
				$this->session->set_userdata($row);
				redirect('gerente/produtos');
			}
			elseif ($this->User->checkuser($data)) {
				$row = $this->User->get_session_data($email);
				$this->session->set_userdata($row);
				redirect('kit/1');
			}
			else {
				$message = 'Falha na autenticação. Verifique os dados de login ou tente mais tarde.';
				$this->session->set_flashdata('message', $message);
				redirect('login');
			}
		}
	}