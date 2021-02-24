<?php

/**
 *
 */
class Users_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }
  public function usersdetail($where='')
  {
    if ( $where != '' ) $this->db->where( $where );
    $query = $this->db->get('users');
    return $query->result();
  }
}

 ?>
