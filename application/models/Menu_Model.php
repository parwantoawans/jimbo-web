<?php 

class Menu_Model extends CI_Model{

    var $menuTable = "tm_menu";
    var $mapMenuTable = "tp_menu_group";
    var $groupMenu = "tm_menu_group";

    function __construct(){
        parent::__construct();
    }

    function getMenuList(){
        /**
         * 
         * SELECT * FROM tm_menu_group a 
         * JOIN tp_menu_group b on b.group_menu_id = a.group_menu_id
         * join tm_menu c on c.menu_id = b.menu_id
         */
        $this->db->select('*')
            ->from($this->groupMenu . " as a")
            ->join($this->mapMenuTable . " as b", "b.group_menu_id = a.group_menu_id")
            ->join($this->menuTable . " as c", "c.menu_id = b.menu_id");
        return $this->db->get()->result_array();
    }

}