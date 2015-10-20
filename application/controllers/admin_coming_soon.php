<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('admin_auth');
        $this->load->library('form_validation');
        $this->load->model('Leads_model', 'leadmodel');
        $this->load->helper('url');
        $CI = get_instance();

        // Load MongoDB library instead of native db driver if required
        $this->config->item('use_mongodb', 'admin_auth') ?
                        $this->load->library('mongo_db') :
                        $this->load->database();

        $db2 = $this->load->database('forms', TRUE);
        //$this->_db_forum = $this->load->database('forum', TRUE);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'admin_auth'), $this->config->item('error_end_delimiter', 'admin_auth'));

        $this->lang->load('admin');
        $this->load->helper('language');
    }

    //redirect if needed, otherwise display the user list
    function index() {

        if (!$this->admin_auth->logged_in()) {
            //redirect them to the login page
            //redirect('admin/login', 'refresh');
            redirect('coming_soon', 'refresh');
        } elseif (!$this->admin_auth->is_admin()) { //remove this elseif if you want to enable this for non-admins
            //redirect them to the home page because they must be an administrator to view this
//			echo"not a admin user"; die;
            return show_error('You must be an administrator to view this page.');
        } else {
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $this->data['users'] = $this->admin_auth->users()->result();

            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->admin_auth->get_users_groups($user->header_user_id)->result();
            }

            //$this->_render_page('admin/index', $this->data);
            redirect('coming_soon', 'refresh');
        }
    }

    //log the user in
    function login() {
        //echo"<pre>";print_r($_SERVER); echo"</pre>";echo"<pre>"; die;
        //echo"<pre>";print_r($this); echo"</pre>";echo"<pre>"; die;
        //$url = (isset($_SESSION['referer']))? $_SESSION['referer'] : 'index';
        //unset($_SESSION['referer']);
        //	echo"<pre>";print_r($this->session->userdata);echo"</pre>";

        $url = @$this->session->userdata['reffer_page'];
        //echo"url ".$url; die;
        //	$this->session->unset_userdata('reffer_page');

        $this->data['title'] = "Login";

        //validate form input
        $this->form_validation->set_rules('identity', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {
            //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            // added for checking default password - start	
            if ($this->admin_auth->default_password(strtoupper($this->input->post('identity')), $this->input->post('password'), $remember)) {
                $this->admin_auth->set_message('You are using the Default password');
                $this->session->set_flashdata('message', $this->admin_auth->errors());
                $this->data['message'] = $this->session->flashdata('message');
                $this->data['oldpassword'] = $this->input->post('password');
                $this->_render_page('admin/defaultpassword', $this->data);
            }
            // added for checking default password - end
            else {

                if ($this->admin_auth->login(strtoupper($this->input->post('identity')), $this->input->post('password'), $remember)) {

                    //if the login is successful
                    //redirect them back to the home page
                    $this->session->set_flashdata('message', $this->admin_auth->messages());
                    //$this->load->view('admin/defaultpassword');
                    /* 	
                      $reportingid = $this->session->userdata['loginname'];
                      $user_list_ids = $this->leadmodel->get_user_list_ids($reportingid);
                      $get_assign_to_user_id = array('get_assign_to_user_id' => $user_list_ids); //set it
                      $this->session->set_userdata($get_assign_to_user_id);
                     */
                    if (isset($url)) {
                        // echo"got to this page".$url; // /leads/viewleaddetails/22457
                        redirect($url, 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }
                } else {

                    //if the login was un-successful
                    //redirect them back to the login page
                    $this->admin_auth->set_message('Invalid username or password');
                    $this->session->set_flashdata('message', $this->admin_auth->errors());
                    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                    //redirect('admin/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
                    $this->_render_page('admin/loginnew', $this->data);
                    //	$this->_render_page('admin/defaultpassword', $this->data);
                }
            }
        } else {
            //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

//			$this->_render_page('admin/login', $this->data);
            $this->_render_page('admin/loginnew', $this->data);
        }
        redirect('coming_soon', 'refresh');
    }

    //log the user out
    function logout() {
        $this->data['title'] = "Logout";

        $user = $this->admin_auth->user()->row();
        //print_r($this->session->userdata); die;

        $logout = $this->admin_auth->logoutnew($user);
        //$logout = $this->admin_auth->logout();
        //redirect them to the login page
        $this->session->set_flashdata('message', $this->admin_auth->messages());

        // redirect('admin/login', 'refresh');
        redirect('coming_soon', 'refresh');
    }

    //change password
    function change_password() {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'admin_auth') . ']|max_length[' . $this->config->item('max_password_length', 'admin_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->admin_auth->logged_in()) {
//			redirect('admin/login', 'refresh');
            redirect('admin/login', 'refresh');
        }

        $user = $this->admin_auth->user()->row();

        if ($this->form_validation->run() == false) {
            //display the form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'admin_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            //render
            $this->_render_page('admin/change_password', $this->data);
        } else {
            $identity = $this->session->userdata($this->config->item('identity', 'admin_auth'));

            $change = $this->admin_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->admin_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->admin_auth->errors());
                redirect('admin/change_password', 'refresh');
            }
        }
    }

    //forgot password
    function forgot_password() {
        $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required');
        if ($this->form_validation->run() == false) {
            //setup the input
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
            );

            if ($this->config->item('identity', 'admin_auth') == 'username') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            //set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->_render_page('admin/forgot_password', $this->data);
        } else {
            // get identity for that email
            $identity = $this->admin_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            if (empty($identity)) {
                $this->admin_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('message', $this->admin_auth->messages());
                redirect("admin/forgot_password", 'refresh');
            }

            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->admin_auth->forgotten_password($identity->{$this->config->item('identity', 'admin_auth')});

            if ($forgotten) {
                //if there were no errors
                $this->session->set_flashdata('message', $this->admin_auth->messages());
                redirect("admin/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', $this->admin_auth->errors());
                redirect("admin/forgot_password", 'refresh');
            }
        }
    }

    //reset password - final step for forgotten password
    public function reset_password($code = NULL) {
        if (!$code) {
            show_404();
        }

        $user = $this->admin_auth->forgotten_password_check($code);

        if ($user) {
            //if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'admin_auth') . ']|max_length[' . $this->config->item('max_password_length', 'admin_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                //display the form
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'admin_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                //render
                $this->_render_page('admin/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->admin_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'admin_auth')};

                    $change = $this->admin_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('message', $this->admin_auth->messages());
                        $this->logout();
                    } else {
                        $this->session->set_flashdata('message', $this->admin_auth->errors());
                        redirect('admin/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->admin_auth->errors());
            redirect("admin/forgot_password", 'refresh');
        }
    }

    //activate the user
    function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->admin_auth->activate($id, $code);
        } else if ($this->admin_auth->is_admin()) {
            $activation = $this->admin_auth->activate($id);
        }

        if ($activation) {
            //redirect them to the auth page
            $this->session->set_flashdata('message', $this->admin_auth->messages());
            redirect("admin", 'refresh');
        } else {
            //redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->admin_auth->errors());
            redirect("admin/forgot_password", 'refresh');
        }
    }

    //deactivate the user
    function deactivate($id = NULL) {
        $id = $this->config->item('use_mongodb', 'admin_auth') ? (string) $id : (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->admin_auth->user($id)->row();

            $this->_render_page('admin/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->admin_auth->logged_in() && $this->admin_auth->is_admin()) {
                    $this->admin_auth->deactivate($id);
                }
            }

            //redirect them back to the auth page
            redirect('admin', 'refresh');
        }
    }

    //create a new user
    function create_user() {
        $this->data['title'] = "Create User";

        if (!$this->admin_auth->logged_in() || !$this->admin_auth->is_admin()) {
            redirect('admin', 'refresh');
        }

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'admin_auth') . ']|max_length[' . $this->config->item('max_password_length', 'admin_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->admin_auth->register($username, $password, $email, $additional_data)) {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->admin_auth->messages());
            redirect("admin", 'refresh');
        } else {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->admin_auth->errors() ? $this->admin_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('admin/create_user', $this->data);
        }
    }

    //edit a user
    function edit_user($id) {
        $this->data['title'] = "Edit User";

        if (!$this->admin_auth->logged_in() || !$this->admin_auth->is_admin()) {
            redirect('admin', 'refresh');
        }

        $user = $this->admin_auth->user($id)->row();

        $groups = $this->admin_auth->groups()->result_array();
        $currentGroups = $this->admin_auth->get_users_groups($id)->result();

        //validate form input
        $this->form_validation->set_rules('aliasloginname', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('empname', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        //$this->form_validation->set_rules('user_mail_id', 'user_mail_id', 'required|xss_clean');
        //$this->form_validation->set_rules('reports_to_id', 'Reporting User is Required', 'required|xss_clean');
        $this->form_validation->set_rules('groups', 'Select the Group', 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }

            $data = array(
                'aliasloginname' => $this->input->post('aliasloginname'),
                'empname' => $this->input->post('empname'),
                'user_mail_id' => $this->input->post('user_mail_id'),
                'reports_to_id' => $this->input->post('reports_to_id'),
            );

            //Update the groups user belongs to
            $groupData = $this->input->post('groups');

            if (isset($groupData) && !empty($groupData)) {

                $this->admin_auth->remove_from_group('', $id);

                foreach ($groupData as $grp) {
                    $this->admin_auth->add_to_group($grp, $id);
                }
            }

            //update the password if it was posted
            if ($this->input->post('pwd')) {
                //$this->form_validation->set_rules('pwd', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

                $data['pwd'] = $this->input->post('pwd');
            }

            if ($this->form_validation->run() === TRUE) {
                //$this->admin_auth->update($user->header_user_id, $data);
                //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('message', "User Saved");
                redirect("admin", 'refresh');
            }
        }

        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->admin_auth->errors() ? $this->admin_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['aliasloginname'] = array(
            'name' => 'aliasloginname',
            'id' => 'aliasloginname',
            'type' => 'text',
            'value' => $this->form_validation->set_value('aliasloginname', $user->aliasloginname),
        );
        $this->data['empname'] = array(
            'name' => 'empname',
            'id' => 'empname',
            'type' => 'text',
            'value' => $this->form_validation->set_value('empname', $user->empname),
        );
        $this->data['user_mail_d'] = array(
            'name' => 'user_mail_id',
            'id' => 'user_mail_id',
            'type' => 'text',
            'value' => $this->form_validation->set_value('user_mail_id', $user->user_mail_id),
        );
        $this->data['reports_to_id'] = array(
            'name' => 'reports_to_id',
            'id' => 'reports_to_id',
            'type' => 'text',
            'value' => $this->form_validation->set_value('reports_to_id', $user->reports_to_id),
        );
        $this->data['pwd'] = array(
            'name' => 'pwd',
            'id' => 'pwd',
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'type' => 'password'
        );

        $this->_render_page('admin/edit_user', $this->data);
    }

    // create a new group
    function create_group() {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->admin_auth->logged_in() || !$this->admin_auth->is_admin()) {
            redirect('admin', 'refresh');
        }

        //validate form input
        //$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('description', $this->lang->line('create_group_validation_desc_label'), 'xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->admin_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->admin_auth->messages());
                redirect("admin", 'refresh');
            }
        } else {
            //display the create group form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->admin_auth->errors() ? $this->admin_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->_render_page('admin/create_group', $this->data);
        }
    }

    //edit a group
    function edit_group($id) {
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('admin', 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->admin_auth->logged_in() || !$this->admin_auth->is_admin()) {
            redirect('admin', 'refresh');
        }

        $group = $this->admin_auth->group($id)->row();

        //validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
        $this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->admin_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->admin_auth->errors());
                }
                redirect("admin", 'refresh');
            }
        }

        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->admin_auth->errors() ? $this->admin_auth->errors() : $this->session->flashdata('message')));

        //pass the user to the view
        $this->data['group'] = $group;

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_name', $group->name),
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->_render_page('admin/edit_group', $this->data);
    }

    function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function _render_page($view, $data = null, $render = false) {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $render);

        if (!$render)
            return $view_html;
    }

    function default_password() {

        $password = $this->input->post('password');
        $user_email_id = $this->input->post('emailId');
        $header_id = $this->session->userdata['default_user_id'];
        $db2 = $this->load->database('forms', TRUE);
        $sql = "update dusermaster set pwd='" . $password . "',user_mail_id='" . $user_email_id . "' where header_user_id =" . $header_id;
        $result = $db2->query($sql);

        if ($this->db->trans_status()) {
            $this->admin_auth->set_message('Your Password Updated Sucessfully');
            $this->session->set_flashdata('message', 'Your Password Updated Sucessfully');
            redirect('admin/login', 'refresh');
        }
    }

}
