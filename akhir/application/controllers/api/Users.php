<?php
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Users extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }
  public function usersdetail_get()
  {
    $where = '';
    if (null !== $this->get('userID')) {
      $users = $this->get('userID');
      $where ="userID LIKE '" . $users ."'";
    }
    $data = $this->users_model->usersdetail($where);
    $this->response( ['usersDetail'=> $data], 200);
  }
}

?>
