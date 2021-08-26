<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	PLEASE READ ME
    ===	Documentation === 
	
	**methods : 5
		*method index() :: display
		*method trash() :: display
		*method edit() :: display
		*method add_process() :: process_only
		*method edit_process() :; process_only
		*method delete() :; process_only
		*method remove() :: process_only
		*method remove_all() :: process_only
		*method recovery() :: process_only
*/


class rekanan extends CI_Controller {
    
	public $rolename = "user";
    public $menu = "Users Account";
    public $menu_alias = "Users";
    public $icon = "icon-users";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Panel_layout');
		if(check_session($this->rolename) == false){
			redirect('auth/logout');
			die();
		}
	}

	public function index($page = 'List')
	{
		$data['title'] = $this->menu;
		$data['sub_title'] = 'All Data';
		$data['menu'] = $this->menu;
		$data['menu_alias'] = $this->menu_alias;
		$data['desc_menu'] = "";
		$data['sub_menu'] = $page ;
        $data['icon'] = $this->icon;
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;
        
		$data['action_form'] = site_url(current_role()."/".$this->menu_alias."/add_process");
		$data['html_form'] = $this->load->view('pages/'.$this->rolename.'/'.$this->menu_alias.'/v_form', $data, TRUE);
		$data['html_add_new'] = $this->load->view('pages/'.$this->rolename.'/'.$this->menu_alias.'/v_add', $data, TRUE);

		$data['datatable'] = $this->crud->get('users', '*')->result();
		$data['trash_count'] = $this->crud->get_trash('users', '*')->num_rows();
		$this->panel_layout->load('layout/panel/v_layout','pages/'.$this->rolename.'/'.$this->menu_alias.'/v_index', $data);
	}

	public function trash($page = 'List')
	{
		$data['title'] = $this->menu;
		$data['sub_title'] = "Trash";
		$data['menu'] = $this->menu;
		$data['menu_alias'] = $this->menu_alias;
		$data['desc_menu'] = "";
		$data['sub_menu'] = $page ;
        $data['icon'] = $this->icon;

		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$data['action_form'] = site_url(current_role().'/'.$this->menu_alias.'/add_process');
		$data['html_form'] = $this->load->view('pages/'.$this->rolename.'/'.$this->menu_alias.'/v_form', $data, TRUE);
		$data['html_add_new'] = $this->load->view('pages/'.$this->rolename.'/'.$this->menu_alias.'/v_add', $data, TRUE);

		$data['datatable'] = $this->crud->get_trash('users', '*', 'deleted_at ASC')->result();
		$this->panel_layout->load('layout/panel/v_layout','pages/'.$this->rolename.'/'.$this->menu_alias.'/v_index', $data);
	}

	public function edit($id = null)
	{
		if($id == null){
			redirect(site_url(current_role().'/'.$this->menu_alias));
		}

		$data['title'] = $this->menu;
		$data['sub_title'] = 'Data';
		$data['menu'] = $this->menu;
		$data['menu_alias'] = $this->menu_alias;
		$data['desc_menu'] = "";
		$data['sub_menu'] = "Edit" ;
        $data['icon'] = $this->icon;

		$data['row'] = $this->crud->get_where('users', '*', ['id' => $id])->row();

		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$data['action_form'] = site_url(current_role().'/'.$this->menu_alias."/edit_process/".$id);
		$data['html_form'] = $this->load->view('pages/'.$this->rolename.'/'.$this->menu_alias.'/v_form', $data, TRUE);

		$this->panel_layout->load('layout/panel/v_layout','pages/'.$this->rolename.'/'.$this->menu_alias.'/v_edit', $data);
	}


	public function add_process()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}	

		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		// get input from user
		$input = $this->input->post(null, true);
		
		$data = [
			'username' => $input['username'],
			'name' => $input['name'],
			'phone_number' => $input['phone_number'],
			'email' => $input['email'],
			'password' => password_hash(DEFAULT_PASS, PASSWORD_BCRYPT),
			'is_active' => empty($input['is_active']) ? 0 : 1,
			'roleid' => $input['roleid'],
		];

		$check = $this->crud->get_where_or('users', 'id', ['email' => $input['email']], ['username' => @$emp->no_badge])->num_rows();
		if($check > 0){
			$response = array(
				'status' => 0,
				'message' => 'Username atau Email sudah terdaftar!',
				'return_url' => '#',
				'csrf' => $csrf
			);
			exit(json_encode($response));
		}
		$data['avatar'] = 'avatar.png';
		$insert = $this->db->insert('users', $data);

		if($insert){
			$id = $this->db->insert_id();
			//check apakah upload avatar?
			if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
				$config['upload_path']          =  FCPATH.'assets/avatar/';
				$config['allowed_types']        =  'jpg|jpeg|png|JPG|JPEG|PNG';
				$config['encrypt_name']         =  TRUE;
				$config['file_ext_tolower']     =  TRUE;
				$config['detect_mime']			=  TRUE;

				$this->upload->initialize($config);
				if ($this->upload->do_upload('avatar'))
				{
					$file_data = $this->upload->data();
					// Resize Image
					if ($file_data['file_size'] > 1024) {
						resize_avatar('',$file_data['file_name']);
					}
					$file_name = $file_data['file_name'];
					$data['avatar'] = $file_name;
				}
			}
			$response = array(
				'status' => 1,
				'message' => 'Data baru berhasil disimpan',
				'return_url' => $input['submit'] == 'submit' ? site_url(current_role().'/'.$this->menu_alias.'/index/Add') : site_url(current_role().'/'.$this->menu_alias),
				'csrf' => $csrf
			);

		}else{
			$response = array(
				'status' => 0,
				'message' => 'Data baru gagal disimpan!. Silahkan diulang kembali',
				'return_url' => '#',
				'csrf' => $csrf
			);
		}
		echo json_encode($response);
	}

	public function edit_process($id = null)
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		if($id == NULL){
			$response = array(
				'status' => 0,
				'message' => 'Edit gagal. Data tidak ditemukan ',
				'return_url' => '#',
				'csrf' => $csrf
			);
			echo json_encode($response);
			die();
		}
			
		// get input from user
		$input = $this->input->post(null, true);
		
		$data = [
			'name' => $input['name'],
			'phone_number' => $input['phone_number'],
			'is_active' => empty($input['is_active']) ? 0 : 1,
			'roleid' => $input['roleid'],
		];

		if(!empty($input['is_reset'])){
			$data['password'] = password_hash(DEFAULT_PASS, PASSWORD_BCRYPT);
		}

		//check apakah upload avatar?
		if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
			$config['upload_path']          =  FCPATH.'assets/avatar/';
			$config['allowed_types']        =  'jpg|jpeg|png|JPG|JPEG|PNG';
			$config['encrypt_name']         =  TRUE;
			$config['file_ext_tolower']     =  TRUE;
			$config['detect_mime']			=  TRUE;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('avatar'))
			{
				$file_data = $this->upload->data();
				// Resize Image
				if ($file_data['file_size'] > 1024) {
					resize_avatar('',$file_data['file_name']);
				}
				$file_name = $file_data['file_name'];
				$data['avatar'] = $file_name;
			}else{
				$response = array(
					'status' => 0,
					'message' => 'Error upload. Detail: '.$this->upload->display_errors(),
					'return_url' => '#',
					'csrf' => $csrf
				);
				echo json_encode($response);
				die();
			} 
		}

		$update = $this->crud->update('users', $data, ['id' => $id]);
		if($update){
			$response = array(
				'status' => 1,
				'message' => 'Perubahan data berhasil disimpan',
				'return_url' => $input['submit'] == 'submit' ? '#edit' : site_url(current_role().'/'.$this->menu_alias),
				'csrf' => $csrf
			);

		}else{
			$response = array(
				'status' => 0,
				'message' => 'Perubahan data gagal disimpan!. Silahkan diulang kembali',
				'return_url' => '#',
				'csrf' => $csrf
			);
		}
		echo json_encode($response);
	}

	public function reset_password_process($id = null)
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		//csrf init
		$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		if($id == NULL){
			$response = array(
				'status' => 0,
				'message' => 'Proses gagal. Data tidak ditemukan ',
				'return_url' => '#',
				'csrf' => $csrf
			);
			echo json_encode($response);
			die();
		}
			
		// get input from user
		$input = $this->input->post(null, true);
		$data = [
			'password' => password_hash(DEFAULT_PASS, PASSWORD_BCRYPT),
		];
		$update = $this->crud->update('users', $data, ['id' => $id]);
		if($update){
			$response = array(
				'status' => 1,
				'message' => 'Reset berhasil',
				'return_url' => '#',
				'csrf' => $csrf
			);

		}else{
			$response = array(
				'status' => 0,
				'message' => 'Reset password gagal!. Silahkan diulang kembali',
				'return_url' => '#',
				'csrf' => $csrf
			);
		}
		echo json_encode($response);
	}

	public function delete($id = null)
	{
		if($id == NULL){
			$response = array(
				'status' => 0,
				'message' => 'Delete Data Gagal ',
                'return_url' => '#'
			);
			echo json_encode($response);
			die();
        }
        
        $detele  =	$this->crud->delete('users', array('id' => $id));
        if($detele)
        {
            $response = array(
                'status' => 1,
                'message' => 'Delete Data Berhasil',
                'return_url' => site_url(current_role().'/'.$this->menu_alias)
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Delete Data Gagal. Silahkan diulang',
                'return_url' => '#'
            );
        }
		
		echo json_encode($response);
	}

	public function remove($id = null)
	{
		if($id == NULL){
			$response = array(
				'status' => 0,
				'message' => 'Remove Data Sampah Gagal ',
                'return_url' => '#'
			);
			echo json_encode($response);
			die();
        }
        
        $detele  =	$this->crud->delete_permanent('users', array('id' => $id));
        if($detele)
        {
            $response = array(
                'status' => 1,
                'message' => 'Remove Data Sampah Berhasil',
                'return_url' => site_url(current_role().'/'.$this->menu_alias.'/trash')
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Remove Data Sampah Gagal. Silahkan diulang',
                'return_url' => '#'
            );
        }
		echo json_encode($response);
	}

	public function remove_all()
	{
        $detele  =	$this->crud->delete_all_permanent('users', array('is_deleted' => '1'));
        if($detele)
        {
            $response = array(
                'status' => 1,
                'message' => 'Mengosongkan Sampah Berhasil',
                'return_url' => site_url(current_role().'/'.$this->menu_alias.'/trash')
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Mengosongkan Sampah Gagal. Silahkan diulang',
                'return_url' => '#'
            );
        }
		echo json_encode($response);
	}

	public function recovery($id = null)
	{
		if($id == NULL){
			$response = array(
				'status' => 0,
				'message' => 'Recovery Data Gagal ',
                'return_url' => '#'
			);
			echo json_encode($response);
			die();
        }
        
        $detele  =	$this->crud->recovery('users', array('id' => $id));
        if($detele)
        {
            $response = array(
                'status' => 1,
                'message' => 'Recovery Data Berhasil',
                'return_url' => site_url(current_role().'/'.$this->menu_alias.'/trash')
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Recovery Data Gagal. Silahkan diulang',
                'return_url' => '#'
            );
        }
		echo json_encode($response);
	}

}
