<?php

use function PHPSTORM_META\type;

class Topics extends Controller
{
    public function __construct()
    {
        $this->topicModel = $this->model('Topic');
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        // $user = $this->userModel->getUser();
        $data = [
            'topics' => '',
            // 'users' => ''
            'posts' => ''
        ];
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'];
        } else {
            $page = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($page - 1) * $no_of_records_per_page;
        $total_records_sql = $this->postModel->countPages();
        $total_row = $total_records_sql->{'COUNT(*)'};
        $total_pages = ceil($total_row / $no_of_records_per_page);
        $topics = $this->topicModel->findAllTopicWithPage($offset, $no_of_records_per_page);
        $data = [
            'topics' => $topics,
            // 'users' => $user,
            'total_pages' => $total_pages,
            'pages' => $page,
        ];
        $posts = $this->topicModel->findPostByTopic();
        $data['posts']  = $posts;
        // foreach ($data['topics'] as $topic) {
        //     // echo "<h2>Topics $topic->id </h2>";
        //     // print_r($topic);
        //     // echo '<br>';
        //     foreach ($data['posts'] as $post) {
        //         // echo "<h2>Posts $post->id </h2>";
        //         // print_r($post);
        //         // echo '<br>';
        //         if ($topic->id == $post->topic_id) {
        //             print_r($post);
        //             echo '<br>';
        //         }
        //     }
        // }
        // die();
        // $yourObject->{'duration-123'}
        $this->view('topics/index', $data);
    }
    public function create()
    {
        if (!isLoggedIn() && !isAdmin()) {
            header('Location:' . URLROOT . '/topics');
        }
        $data = [
            'name' => '',
            'nameError' => ''

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'user_id' => trim($_SESSION['user_id']),
                'name' => trim($_POST['name']),
                'nameError' => ''
            ];
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            // validate username on letter and number
            if (empty($data['name'])) {
                $data['nameError'] = "PLS enter ur topic.";
            } else {
                $topicTest =  $this->topicModel->findTopicByName($data['name']);
                if ($topicTest) {
                    $data['nameError'] = "Topic has already been taken";
                }
            }
            if (empty($data['nameError'])) {

                if ($this->topicModel->addTopic($data)) {
                    header("Location: " . URLROOT . "/topics");
                } else {
                    die('Something went wrong, pls try again LOL');
                }
            } else {
                $this->view('topics/create', $data);
            }
        };


        $this->view('topics/create', $data);
    }
    public function update($topic_id)
    {
        if (!isLoggedIn() && isAdmin()) {
            header('Location:' . URLROOT . '/topics');
        }
        $topic = $this->topicModel->findTopicById($topic_id);
        $data = [];
        if (!isLoggedIn() && isAdmin()) {
            header("Location: " . URLROOT . "/topics");
        } else if ($topic->user_id != $_SESSION['user_id']) {
            header("Location: " . URLROOT . "/topics");
        }
        $data = [
            'topic_id' => $topic_id,
            'topic' => $topic,
            'user_id' => trim($_SESSION['user_id']),
            'name' => '',
            'nameError' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'topic_id' => $topic_id,
                'topic' => $topic,
                'user_id' => trim($_SESSION['user_id']),
                'name' => trim($_POST['name']),
                'nameError' => ''
            ];
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            // validate username on letter and number
            if (empty($data['name'])) {
                $data['nameError'] = "PLS enter ur topic.";
            } else {
                $topicTest =  $this->topicModel->findTopicByName($data['name']);
                if ($topicTest) {
                    $data['nameError'] = "Topic has already been taken";
                }
            }
            if (empty($data['nameError'])) {

                if ($this->topicModel->updateTopic($data)) {
                    header("Location: " . URLROOT . "/topics");
                } else {
                    die('Something went wrong, pls try again LOL');
                }
            } else {
                $this->view('topics/update', $data);
            }
        }
        $this->view('topics/update', $data);
    }
    public function delete($id)
    {

        if (isLoggedIn() && isAdmin()) {
            header("Location: " . URLROOT . "/topics");
        }
        // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($this->topicModel->deleteTopic($id)) {
            header("Location: " . URLROOT . "/topics");
        } else {
            die('Some thing went wrong.Pls try again');
        }
    }
    public function topic($topic_id)
    {
        $user = $this->userModel->getUser();
        $topic = $this->topicModel->findTopicById($topic_id);
        $data = [];
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'];
        } else {
            $page = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($page - 1) * $no_of_records_per_page;
        $total_records_sql = $this->postModel->countPages();
        $total_row = $total_records_sql->{'COUNT(*)'};
        $total_pages = ceil($total_row / $no_of_records_per_page);
        $posts = $this->topicModel->findPost($topic_id, $offset, $no_of_records_per_page);
        $data = [
            'posts' => $posts,
            'users' => $user,
            'topic' => $topic,
            'total_pages' => $total_pages,
            'pages' => $page

        ];
        $this->view('topics/topic', $data);
    }
}
