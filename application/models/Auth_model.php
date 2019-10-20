<?php
class Auth_model extends CI_Model
{
    public function register($username, $email, $password)
    {
        $this->db->insert('admin', ['username' => $username, 'email' => $email, 'password' => md5($password)]);
    }

    public function login($username, $password)
    {
        $chek = $this->db->get_where('admin', ['username' => $username, 'password' => md5($password)]);
        if ($chek->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
