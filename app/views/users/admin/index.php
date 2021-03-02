<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<?php if (isLoggedIn()) : ?>
    <?php if (isAdmin()) : ?>
        <div class="container">

            <div class="row" style="margin-top: 100px; margin-bottom:100px">

                <h1>Admin panel</h1>
                <ul>
                    <li>
                        <h3>User account</h3>
                    </li>
                </ul>
                <table class="table" id="customers">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Allowed to interact</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($data['users'] as $user) : ?>

                            <tr>
                                <td><?php echo $user->id  ?></td>
                                <td><?php if ($user->role == $_SESSION['role']) echo "Not allowed." ?></td>
                                <td><?php echo $user->username  ?></td>
                                <td><?php echo $user->email  ?></td>
                                <td><?php if ($user->role == 1) {
                                        echo 'Admin';
                                    } else {
                                        echo 'author';
                                    }  ?></td>
                                <td>
                                    <a href="<?php echo URLROOT . "/users/delete_author/" . $user->id ?>">Delete</a> |
                                    <form action="<?php echo URLROOT . "/users/status/" . $user->id ?>" method="POST">
                                        <?php if ($user->status == true) {
                                            echo '<input type="hidden" name="status" value="0">';
                                            echo '<button>suspended</button>';
                                        } else {
                                            echo '<input type="hidden" name="status" value="1">';
                                            echo '<button>Not suspended</button>';
                                        }
                                        ?>

                                    </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <br>
                <hr>
                <br>
                <ul>
                    <li>
                        <h3>Topics </h3>
                    </li>
                </ul>
                <h4><a href="<?php echo URLROOT . "/topics/create" ?>">Create topic</a></h4>
                <table class="table" id="topics">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Author had created topic</th>
                            <th>Topic name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php foreach ($data['topics'] as $topic) : ?>
                        <tr>
                            <td><?php echo $topic->id  ?></td>
                            <td><?php
                                foreach ($data['users'] as $user) {
                                    if ($topic->user_id == $user->id) {
                                        echo $user->username;
                                    }
                                }
                                ?></td>
                            <td><?php echo $topic->name  ?></td>
                            <td><?php echo $topic->created_at  ?></td>
                            <td><?php echo $topic->updated_at  ?></td>
                            <td><a href="<?php echo URLROOT . "/topics/delete/" . $topic->id ?>">Delete</a> | <a href="<?php echo URLROOT . "/topics/update/" . $topic->id ?>">Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <hr>
                <br>
                <ul>
                    <li>
                        <h3>Posts </h3>
                    </li>
                </ul>
                <table class="table" id="posts">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Author </th>
                            <th>Post name</th>
                            <th>Views</th>
                            <th>Images</th>
                            <th>Summary</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php foreach ($data['posts'] as $post) : ?>
                        <tr>
                            <td><?php echo $post->id  ?></td>
                            <td><?php
                                foreach ($data['users'] as $user) {
                                    if ($user->id == $post->user_id) {
                                        echo $user->username;
                                    }
                                }
                                ?></td>
                            <td><?php echo $post->title  ?></td>
                            <td><?php echo $post->views  ?></td>
                            <td> <img style="width: 100px;" src="<?php echo URLROOT . '/public/img/' . $post->image; ?>" alt="">
                            </td>
                            <td><?php echo $post->summary  ?></td>
                            <td><?php echo $post->created_at  ?></td>
                            <td><?php echo $post->updated_at  ?></td>
                            <td>
                                <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="post"> <button>Delete</button> </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php elseif (!isAdmin()) : ?>

                <a href="<?php echo URLROOT; ?>/index">Ur account not allowed to display this.Back to home page</a>

            <?php endif; ?>
            </div>

        </div>
    <?php endif; ?>
    <?php
    require APPROOT . '/views/includes/footer.php';
    ?>