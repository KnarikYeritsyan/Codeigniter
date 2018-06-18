<?php
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_news($email = FALSE)
    {
        if ($email === FALSE)
        {
            $query = $this->db->get('users');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row_array();
    }

    public function registration($insert)
    {
        $this->db->insert('users', $insert);
    }

    public function login($email,$password)
    {
        $querypass = $this->db->select('*')->from('users')->where('email', $email)->get();

        if ($querypass->num_rows()>0)
        {
            $row = $querypass->row_array();
           if ( !$resultpass = password_verify($password, $row['password']))
           {
               return false;
           }
            return true;
        }else{
            return false;
        }

    }
    public function getUsers()
    {
       /* $users = array(
            [
                'first_name'=>'User1 name',
                'last_name'=>'User1 surname',
                'age'=>23,
                'location'=>'Armenia'
            ],[
                'first_name'=>'User2 name',
                'last_name'=>'User2 surname',
                'age'=>20,
                'location'=>'USA'
            ],[
                'first_name'=>'User3 name',
                'last_name'=>'User3 surname',
                'age'=>50,
                'location'=>'Armenia'
            ]
        );*/

        $query = "SELECT * FROM usersuser";
        $result = $this->db->query($query);
        $users = $result->result();
        return $users;
    }

    public function getProfile($id)
    {
//        $this->load->database();
        $query = "SELECT * FROM users WHERE user_id = ".$id;
        $result= $this->db->query($query);
        return $result->row();
    }
}