<?php
class Cmts extends Controller
{
    public function __construct()
    {
        //$this->userModel = $this->model('User');
        $this->cmtModel = $this->model('Cmt');
    }


    public function addCmt()
    {
        if (isset($_POST['addComment'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                'content' => trim($_POST['comment']),
                'post_id' => trim($_POST['postID']),
            ];
            if ($this->cmtModel->addCmt($data)) {
              $cmt =  $this->cmtModel->getCmtByContent($data['content']);
              $data['cmt_id'] = $cmt->id;
                if ($this->cmtModel->addCmtPost($data)) {
                    $response = 'add succeed';
                    exit($response);
                }
            }
        }
    }
    public function error404()
    {
        $this->view('pages/error404');
    }
}
