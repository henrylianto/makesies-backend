<?php

/**
 *
 */
class Posts_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }
  public function postsDetail($where='')
  {
    $this->db->select('b.username, a.*');
    $this->db->from('posts a');
    $this->db->join('users b','ON (a.userID = b.userID)');
    if ( $where != '' ) $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }

  public function postsearch($where='')
  {
    /* SQL = SELECT b.username, a.*
FROM users AS b
INNER JOIN posts AS a ON(a.userID = b.userID)
WHERE title LIKE var title */
    $this->db->select('b.username, a.*');
    $this->db->from('posts a');
    $this->db->join('users b','ON (a.userID = b.userID)');
    if ( $where != '' ) $this->db->where( $where );
    $query = $this->db->get();
    return $query->result();
  }

  //POST MODEL
    public function postlike(){
      /* SQL = SELECT b.username, a.*
  		FROM users AS b
  		INNER JOIN posts AS a ON(a.userID = b.userID)
  		ORDER BY column var */
      $this->db->select('b.username, a.*');
      $this->db->from('posts a');
      $this->db->join('users b','ON (a.userID = b.userID)');
      $this->db->order_by('LikeCount ','DESC');
      $query = $this->db->get();
      return $query->result();
    }

    //POST MODEL
    public function postsnew($where=''){
            /* SQL = SELECT b.username, a.*
            FROM users AS b
            INNER JOIN posts AS a ON(a.userID = b.userID)
            ORDER BY waktu varASC|DESC */
            $this->db->select('b.username, a.*');
            $this->db->from('posts a');
            $this->db->join('users b','ON (a.userID = b.userID)');
            if ( $where != '' ) $this->db->order_by('waktu ', $where );
            $query = $this->db->get();
            return $query->result();
          }
    
}
 ?>
