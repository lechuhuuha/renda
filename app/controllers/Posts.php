<?php

class Posts extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->topicModel = $this->model('Topic');
    }

    public function index()
    {
        $user = $this->userModel->getUser();
        $data = [
            'posts' => '',
            'users' => ''
        ];
        // lấy page từ url nếu ko có thì lấy mặc định
        // bản ghi của mỗi page .Mặc định là 10
        // lấy số tổng số bản ghi 
        // tổng số trang = tổng số bản ghi/tổng số bản ghi mỗi trang được render
        // offset=trang hiện tại -1 * số trang tối đa được render
        // Thực hiện truy vấn sql bằng offset và số bản ghi tối đa được render
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
        $posts = $this->postModel->findALlPost($offset, $no_of_records_per_page);
        $data = [
            'posts' => $posts,
            'users' => $user,
            'total_pages' => $total_pages,
            'pages' => $page

        ];

        // $yourObject->{'duration-123'}
        $this->view('posts/index', $data);
    }
    public function create()
    {
        if (!isLoggedIn()) {
            header('Location:' . URLROOT . '/posts');
        }
        // $topics = $this->postModel->findAllTopics();
        $topics =  $this->topicModel->findAllTopic();

        $data = [
            'topics' => $topics,
            'title' => '',
            'summary' => '',
            'body' => '',
            'image' => '',
            'titleError' => '',
            'bodyError' => '',
            'imageError' => '',
            'summaryError' => '',
            'topicError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'topics' => $topics,
                'topics_name' => trim($_POST['topic_name']),
                'user_id' => trim($_SESSION['user_id']),
                'title' => trim($_POST['title']),
                'summary' => trim($_POST['summary']),
                'image' => $_FILES['image'],
                'body' => trim($_POST['body']),
                'titleError' => '',
                'summaryError' => '',
                'bodyError' => '',
                'imageError' => '',
                'topicError' => ''
            ];
            $image_name = basename($_FILES['image']['name']);
            $image_path = URLROOT . '/public/img/' . $image_name;
            $type = $_FILES['image']['type'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];
            $path = '..\public\img/' . $image_name;
            // $data['image'] = $image_name;
            if (empty($data['image'])) {
                $data['imageError'] = 'Image of the post can not be empty';
            } else if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif") {
                if (!file_exists($image_path)) {
                    if ($size < 2000000) {
                        move_uploaded_file($temp, $path);
                        $data['image'] = $image_name;
                    } else {
                        $data['imageError'] = 'File too large.Pls upload file less than 2MB';
                    }
                } else {
                    $data['imageError'] = 'File already exits...Check uploader file';
                }
            } else {
                $data['imageError'] = 'Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION';
            }
            // title validation
            if (empty($data['title'])) {
                $data['titleError'] = 'Title of the page can not be empty';
            }
            // topic name validation
            if (empty($data['topics_name'])) {
                $data['topicError'] = 'Topic of the post can not be empty';
            }
            // summary validation
            if (empty($data['summary'])) {
                $data['summaryError'] = 'Summary of the page can not be empty';
            }
            // body validation
            if (empty($data['body'])) {
                $data['bodyError'] = 'Body of the page can not be empty';
            }

            // if all required then procress to upload if not then back to the create page
            if (empty($data['titleError']) && empty($data['summaryError']) && empty($data['bodyError']) && empty($data['topicError']) && empty($data['imageError'])) {
                if ($this->postModel->addPost($data)) {
                  $postByTitle =  $this->postModel->findPostByTitle($data);
                  $data['post_id'] = $postByTitle;
                    if ($this->postModel->addTopic($data)) {
                        header("Location:" . URLROOT . "/posts");
                    }
                } else {
                    die('Something went wrong,pls try again LOL');
                }
            } else {
                $this->view('posts/create', $data);
            }
        }

        $this->view('posts/create', $data);
    }
    public function post($id)
    {
        $post = $this->postModel->findPostById($id);
        // if (!isLoggedIn()) {
        //     header("Location: " . URLROOT . "/posts");
        // } else if ($post->user_id != $_SESSION['user_id']) {
        //     header("Location: " . URLROOT . "/posts");
        // }   
        $data = [];
        if (isset($post)) {
            $data = [
                'post' => $post
            ];
            $user = $this->userModel->findUserById($data['post']->user_id);


            $this->postModel->incsView($data);

            // $cmt = $this->postModel->showCmt($id);
            $data = [
                'post' => $post,
                'user' => $user,
                // 'cmt' => $cmt,
            ];
            $this->view('posts/post', $data);
        }

        $this->view('posts/post', $data);
    }
    public function update($id)
    {
        $post = $this->postModel->findPostById($id);

        if (isAdmin() || !isMyPost($post) ) {

            header("Location: " . URLROOT . "/posts");
        }

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } else if ($post->user_id != $_SESSION['user_id']) {
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'post' => $post,
            'user_id' => '',
            'title' => '',
            'summary' => '',
            'image' => '',
            'body' => '',
            'titleError' => '',
            'summaryError' => '',
            'imageError' => '',
            'bodyError' => ''

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            if ($_FILES['image']['size'] == 0) {
                $data = [
                    'id' => $id,
                    'post' => $post,
                    'user_id' => trim($_SESSION['user_id']),
                    'summary' => trim($_POST['summary']),
                    'title' => trim($_POST['title']),
                    'image' => $data['post']->image,
                    'body' => trim($_POST['body']),
                    'titleError' => '',
                    'summaryError' => '',
                    'imageError' => '',
                    'bodyError' => ''
                ];
            } else {
                $data = [
                    'id' => $id,
                    'post' => $post,
                    'user_id' => trim($_SESSION['user_id']),
                    'summary' => trim($_POST['summary']),
                    'title' => trim($_POST['title']),
                    'image' => $_FILES['image'],
                    'body' => trim($_POST['body']),
                    'titleError' => '',
                    'summaryError' => '',
                    'imageError' => '',
                    'bodyError' => ''
                ];
            }

            if ($data['image']) {
                $image_name = basename($_FILES['image']['name']);
                $image_path = URLROOT . '/public/img/' . $image_name;
                $type = $_FILES['image']['type'];
                $size = $_FILES['image']['size'];
                $temp = $_FILES['image']['tmp_name'];
                $path = '..\public\img/' . $image_name;
            }

            // image validation
            if (empty($data['image'])) {
                $data['imageError'] = 'Image of the post can not be empty';
            } else if ($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif") {
                if (!file_exists($image_path)) {
                    if ($size < 2000000) {
                        move_uploaded_file($temp, $path);
                        $data['image'] = $image_name;
                    } else {
                        $data['imageError'] = 'File too large.Pls upload file less than 2MB';
                    }
                } else {
                    $data['imageError'] = 'File already exits...Check uploader file';
                }
            } else {
                $data['imageError'] = 'Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION';
            }
            // title validation
            if (empty($data['title'])) {
                $data['titleError'] = 'Title of the page can not be empty';
            }
            // body validation
            if (empty($data['body'])) {
                $data['bodyError'] = 'Body of the page can not be empty';
            }
            // summary validation
            if (empty($data['summary'])) {
                $data['summaryError'] = 'Summary of the page can not be empty';
            }
            // Check if title is the same
            if ($data['title'] == $this->postModel->findPostById($id)->title) {
                $data['titleError'] = 'At least change the title';
            }
            // Check if the body is the same
            if ($data['body'] == $this->postModel->findPostById($id)->body) {
                $data['bodyError'] = 'At least change the body';
            }
            if ($data['summary'] == $this->postModel->findPostById($id)->summary) {
                $data['summaryError'] = 'At least change the summary';
            }
            if ((empty($data['titleError']) ||  empty($data['bodyError']) ||  empty($data['summaryError'])) || empty($data['imageError'])) {
                if ($this->postModel->updatePost($data)) {
                    header("Location:" . URLROOT . "/posts");
                } else {
                    die('Something went wrong,pls try again LOL');
                }
            } else {
                $this->view('posts/update', $data);
            }
        }

        $this->view('posts/update', $data);
    }
    public function delete($id)
    {
        $post = $this->postModel->findPostById($id);

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        }
        $data = [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if ($this->postModel->deletePost($id)) {
                header("Location: " . URLROOT . "/posts");
            } else {
                die('Some thing went wrong.Pls try again');
            }
        }
    }
    public function search()
    {
        $data = [
            'posts' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $title = $_POST['title'];
            $post = $this->postModel->searchPost($title);
            if ($post) {
                $data = [
                    'posts' => $post,
                ];
            } else {
                header('Location:' . URLROOT . '/pages/error404');
            }
        }
        $this->view('posts/search', $data);
    }
}
