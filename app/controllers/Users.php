<?php
ob_start();
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        $this->topicModel = $this->model('Topic');
    }
    public function login()
    {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];
        // check for the post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => ''
            ];
            // validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Pls enter a username';
            }


            // validate pass
            if (empty($data['password'])) {
                $data['passwordError'] = 'Pls enter a pass';
            }
            // check if all error are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if ($loggedInUser) {

                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Pass or username is incorrect.Pls try again';
                    $this->view('users/login', $data);
                }
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => '',
                'emailError' => ''
            ];
        }
        $this->view('users/login', $data);
    }
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['role'] = $user->role;
        if ($_SESSION['role'] == 1) {
            header('Location:' . URLROOT . '/users/admin/');
        } else if ($_SESSION['role'] == 0) {
            header('Location:' . URLROOT . '/users/author/' . $_SESSION['user_id']);
        } else {
            header('location:' . URLROOT . '/pages/index');
        }
    }
    public function register()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPass' => '',
            'emailError' => '',
            'usernameError' => '',
            'passwordError' => '',
            'confirmPassError' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPass' => trim($_POST['confirmPass']),
                'emailError' => '',
                'usernameError' => '',
                'passwordError' => '',
                'confirmPassError' => ''
            ];
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            // validate username on letter and number
            if (empty($data['username'])) {
                $data['usernameError'] = "PLS enter ur name.";
            } else if (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = "Name can only contain letter and number.";
            } else {
                $userTest =  $this->userModel->findUserByName($data['username']);
                if (!empty($userTest)) {
                    $data['usernameError'] = "Username has already been taken";
                }
            }
            // validate email
            if (empty($data['email'])) {
                $data['emailError'] = "PLS enter ur Email.";
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "PLS enter correct format.";
            } else {
                // check if email exist
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = "Email already taken";
                }
            }
            // validate pass on length and numeric values
            if (empty($data['password'])) {
                $data['passwordError'] = "PLS enter Pass";
            } else if (strlen($data['password']) < 6) {
                $data['passwordError'] = "Pass must be at least 8 char";
            } else if (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = "Pass must have at least one numeric value.";
            }
            // validate confirm pass
            if (empty($data['confirmPass'])) {
                $data['confirmPassError'] = "PLS enter Pass";
            } else {
                if ($data['password'] != $data['confirmPass']) {
                    $data['confirmPassError'] = "Pass do not match.Pls try again";
                }
            }
            // Make sure that errors are empty
            if (
                empty($data['usernameError']) && empty($data['emailError'])
                && empty($data['passwordError']) && empty($data['confirmPassError'])
            ) {
                // Hash pass
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                // Register user from model functions
                if ($this->userModel->register($data)) {
                    // redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }
        }
        $this->view('users/register', $data);
    }
    public function logout()
    {
        // unset($_SESSION['user_id']);
        // unset($_SESSION['username']);
        // unset($_SESSION['email']);
        // unset($_SESSION['role']);
        // unset($_SESSION);
        // array_map(function($s){
        //     if(isset($s)){
        //         unset($s);
        //     }
        // },$_SESSION);
        // foreach($_SESSION as $sess){
        //     if(isset($sess)){
        //         unset($sess);
        //     }
        // }

        foreach ($_SESSION as $key => $val) {
            if (isset($val)) {
                echo  'Key :' . $key;
                echo '<br>';
                echo 'Val: ' . $val;
                echo '<br>';
                unset($_SESSION["$key"]);
                session_destroy();
            }
        }


        header('location:' . URLROOT . '/users/login');
    }
    public function admin()
    {
        $data = [
            'users' => '',
            'topics' => '',
            'posts' => ''
        ];
        $users = $this->userModel->getUser();
        $topics = $this->topicModel->findAllTopic();
        $posts = $this->postModel->findAll();
        $data = [
            'users' => $users,
            'topics' => $topics,
            'posts' => $posts,
        ];
        $this->view('users/admin/index', $data);
    }
    public function delete_author($id)
    {
        $user = $this->userModel->findUserById($id);

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/admin/");
        } else if ($user->role == $_SESSION['role']) {
            header("Location: " . URLROOT . "/users/admin/");
        }
        $data = [
            'user' => $user,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''

        ];

        if ($this->userModel->delete($id)) {
            header("Location: " . URLROOT . "/users/admin/");
        } else {
            die('Some thing went wrong.Pls try again');
        }
    }
    public function update_author($id)
    {
        $user = $this->userModel->findUserById($id);
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/users/admin/");
        } else if ($user->role == $_SESSION['role']) {
            header("Location: " . URLROOT . "/users/admin/");
        }

        $data = [
            'user' => $user,
            'id' => '',
            'username' => '',
            'email' => '',
            'role' => '',
            'usernameError' => '',
            'emailError' => '',
            'roleError' => ''

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'user' => $user,
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'usernameError' => '',
                'emailError' => '',
                'roleError' => '',
            ];
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            if (empty($data['username'])) {
                $data['emailError'] = 'Title of the page can not be empty';
            } else if (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = "Name can only contain letter and number.";
            }
            if (empty($data['email'])) {
                $data['emailError'] = 'Body of the page can not be empty';
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "PLS enter correct format.";
            }
            if (empty($data['role'])) {
                $data['roleError'] = 'Role can not be empty';
            }
            if ($data['role'] == '1') {
                $data['role'] = 1;
                echo 'admin login';
            } else if ($data['role'] == '0') {
                $data['role'] == 0;
                echo 'author login';
            }
            if ($data['username'] == $this->userModel->findUserById($id)->username) {
                $data['usernameError'] = 'At least change the name';
            }
            if ($data['email'] == $this->userModel->findUserById($id)->email) {
                $data['emailError'] = 'At least change the email';
            }
            if (empty($data['usernameError']) || empty($data['emailError'])) {
                if ($this->userModel->update($data)) {
                    header("Location:" . URLROOT . "/users/admin/");
                } else {
                    die('Something went wrong,pls try again LOL');
                }
            } else {
                $this->view('users/admin/update_author', $data);
            }
        }
        $this->view('users/admin/update_author', $data);
    }
    public function status($id)
    {
        $data = [
            'id' => '',
            'status' => '',

        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['status'] == '1') {
                $data['status'] = true;
            } else {
                $data['status'] = false;
            }
            $data['id'] = $id;
            if ($this->userModel->status($data)) {

                header("Location: " . URLROOT . "/users/admin/");
            } else {
                echo 'Opps, something went wrong.Pls contact later';
            }
        }
    }
    public function author($id)
    {
        $posts = $this->postModel->findPostByAuthor($id);
        $users = $this->userModel->findUserById($id);
        if ($users || $posts) {
            $data = [
                'post' => $posts,
                'user' => $users
            ];
        } else {
            header('Location:' . URLROOT . '/pages/error404');
        }

        $this->view('users/author/index', $data);
    }
    public function authEmail()
    {
        $data = [
            'email' => '',
            'cfEmail' => '',
            'emailError' => '',
            'cfEmailError' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'cfEmail' => trim($_POST['cfEmail']),
                'token' => '',
                'emailError' => '',
                'cfEmailError' => ''

            ];
            // validate pass
            if (empty($data['cfEmail'])) {
                $data['cfEmailError'] = 'Pls re-enter email';
            }
            if ($data['email'] !== $data['cfEmail']) {
                $data['cfEmailError'] = 'Pls enter correct confirm email';
            }
            // validate email
            if (empty($data['email'])) {
                $data['emailError'] = "PLS enter ur Email.";
            } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "PLS enter correct format.";
            } else {
                // check if email exist
                if (!$this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = "There is no email exist like the one you have provided";
                }
            }
            if ($this->userModel->cItE($data)) {
                $data['emailError'] = 'Each email can only reset once per time';
            }
            // check if all error are empty
            if (empty($data['emailError']) && empty($data['cfEmailError'])) {
                // generate a unique random token of length 100
                $token = bin2hex(random_bytes(50));
                $data['token'] = $token;
                $_SESSION['email'] = $data['email'];
                $_SESSION['token'] = $token;
                $this->userModel->nRsP($data);
                $this->sendMail($data, $token);
                header('Location: ' . URLROOT . '/users/account/pending');
                exit();
            } else {
                $this->userModel->dRsP($data);
                $this->view('users/account/authEmail', $data);
            }
        }
        $this->view('users/account/authEmail', $data);
    }
    public function sendMail($data, $token)
    {
        $to = $data['email'];
        $subjects = "Reset your pass word on " . URLROOT;
        $msg = 'Hi there, click on this <a href="' . URLROOT .  '/users/account/nPass?token=' . $token . '"';
        $msg = wordwrap($msg, 70);
        $header = "From : " . $data['email'];
        mail($to, $subjects, $msg, $header);
    }
    public function pending()
    {
        $this->view('users/account/pending');
    }
    public function nPass()
    {
        $data = [
            'email' => '',
            'password' => '',
            'token' => '',
            'cfPassWord' => '',
            'passwordError' => '',
            'cfPassWordError' => '',
        ];
        if (isset($_SESSION['email'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => $_SESSION['email'],
                    'password' => trim($_POST['password']),
                    'token' => $_SESSION['token'],
                    'cfPassWord' => trim($_POST['cfPassWord']),
                    'passwordError' => '',
                    'cfPassWordError' => ''

                ];
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
                // validate pass on length and numeric values
                if (empty($data['password'])) {
                    $data['passwordError'] = "PLS enter Pass";
                } else if (strlen($data['password']) < 6) {
                    $data['passwordError'] = "Pass must be at least 8 char";
                } else if (preg_match($passwordValidation, $data['password'])) {
                    $data['passwordError'] = "Pass must have at least one numeric value.";
                }
                // validate cfpass
                if (empty($data['cfPassWord'])) {
                    $data['cfPassWordError'] = "Pls enter confirm pass";
                }
                if ($data['password'] !== $data['cfPassWord']) {
                    $data['cfPassWordError'] = 'Pls enter correct confirm password';
                }

                // check if all error are empty
                if (empty($data['passwordError']) && empty($data['cfPassWordError'])) {
                    // Hash pass
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->userModel->nP($data);
                    $this->userModel->dRsP($data);
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    $this->view('users/account/nPass', $data);
                }
            }
            $this->view('users/account/nPass', $data);
        } else {
            header('Location: ' . URLROOT . '/pages/error404');
        }
    }
    public function backUpDb($tables = '*')
    {
    }
}
