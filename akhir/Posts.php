<?php
use Restserver\Libraries\REST_Controller;

/**
 *
 */
class Posts extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('posts_model');
  }
  public function postsdetail_get()
  {
    $where = '';
    if (null !== $this->get('post_id')) {
      $posts = $this->get('post_id');
      $where ="post_id LIKE '" . $posts ."'";
    }else{
      $posts = $this->get('post_id');
      $where ="post_id LIKE '" . $posts ."'";
    }
    $data = $this->posts_model->postsdetail($where);
    $this->response( ['postsDetail'=> $data], 200);
  }

  public function postssearch_get($title = '')
  {
    $title = $this->get('posttitle');
    $where = '';
    if($title=='')
    {
      $where='';
    }
    else {
      $where="a.title LIKE '%".$title."%' OR a.tags LIKE '%".$title."%' OR a.paragraph LIKE '%".$title."%'OR b.username LIKE '%".$title."%'" ;
}
$data = $this->posts_model->postsearch($where);
$this->response(['title'=>$data]);
  }

  //POST API
  public function postsDetailLike_get(){

      $data = $this->posts_model->postlike();
      $this->response( ['postsDetail'=> $data], 200);
    }

  //POST API
  public function postsdetailnew_get()
      {
        $where = '';
        if (null !== $this->get('post_id')) {
          $posts = $this->get('post_id');
          $where = $posts ."ASC";
        }
        $data = $this->posts_model->postsnew($where);
        $this->response( ['postsDetail'=> $data], 200);
      }




}

?>
