<?php
function admin() {
    $CI = &get_instance();
     $CI->load->model('admin_model');
    $user_id = $CI->session->userdata['logged_in']['user_id'];
    if (($user_id != "")) {

        $login_sesstion = $CI->session->userdata['logged_in']['login_sesstion'];
        $data = $CI->admin_model->select_data_where('user', 'login_sesstion', $login_sesstion);
        if($data)
        {
            return true;
        }
        else
        {
            redirect('admin/login/logout', 'refresh');
        }
        
    } else {
        // die;
        redirect('admin/login/logout', 'refresh');
    }
}



