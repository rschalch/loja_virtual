<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


	class Auth
	{

		public function attempt($view, $data = null)
		{
			// Assigning by reference using the original CodeIgniter object rather than copying it.
			$CI =& get_instance();

			if (!$CI->session->userdata('nome'))
			{
				$message = 'Faça o login antes de continuar.';
				$CI->session->set_flashdata('message', $message);
				redirect('login');
			}
			else
			{
				$CI->load->view('i_header', $data);
				$CI->load->view($view, $data);
				$CI->load->view('i_footer');
			}
		}

		public function manage($view, $data = null)
		{
			// Assigning by reference using the original CodeIgniter object rather than copying it.
			$CI =& get_instance();

			if ($CI->session->userdata('tipo') != 'admin')
			{
				$message = 'Faça o login antes de continuar.';
				$CI->session->set_flashdata('message', $message);
				redirect('login');
			}
			else
			{
				$CI->load->view('i_admin_header', $data);
				$CI->load->view($view, $data);
				$CI->load->view('i_footer');
			}
		}
	}