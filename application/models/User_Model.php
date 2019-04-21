<?php 

class User_Model extends CI_Model{

    var $userTable = "tm_users";
    var $subscTable = "tm_subscribe";

    function __construct(){
        parent::__construct();
    }

    function login($username, $password){
        /**
         * 
         * SELECT * FROM tm_menu_group a 
         * JOIN tp_menu_group b on b.group_menu_id = a.group_menu_id
         * join tm_menu c on c.menu_id = b.menu_id
         */
        $this->db->select('*')
            ->from($this->userTable . " as a")
            ->where(array(
                'username' => $username,
                'password' => md5($password)
            ));
        return $this->db->get()->result_array();
    }

    function getSubscriber(){
        $this->db->select('*')
            ->from($this->subscTable);
        return $this->db->get()->result_array();
    }

}