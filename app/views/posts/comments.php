<style type="text/css">
    .comment {
        margin-bottom: 20px;
    }

    .user {
        font-weight: bold;
        color: black;
    }

    .time,
    .reply {
        color: gray;
    }

    .userComment {
        color: #000;
    }

    .replies .comment {
        margin-top: 20px;

    }

    .replies {
        margin-left: 20px;
    }

    #registerModal input,
    #logInModal input {
        margin-top: 10px;
    }
</style>
<div>
    <textarea class="form-control" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
    <button style="float:right" class="btn-primary btn" onclick="isReply = false;" id="addComment">Add Comment</button>
</div>
<div>
    <p id="numComments"><?php echo $data['numComments']->total_cmts ?> Comments</p>
    <div class="userComments">
        <?php foreach ($data['cmts'] as $cmt) : ?>
            <div class="comment">
                <div class="user">Senaid <span class="time"><?php echo $cmt->created_at ?></span></div>
                <div class="userComment"><?php echo $cmt->content ?></div>
                <div class="reply"><a href="javascript:void(0)" data-commentid="20" onclick="reply(this)">REPLY</a></div>
                <?php foreach ($data['reps'] as $rep) : ?>
                    <?php if ($rep->cmt_id == $cmt->id) : ?>
                        <div class="replies">
                            <div class="comment">
                                <div class="user">Senaid <span class="time"><?php echo $rep->created_at ?></span></div>
                                <div class="userComment"><?php echo $rep->content ?></div>
                                <div class="reply"><a href="javascript:void(0)" data-commentid="19" onclick="reply(this)">REPLY</a></div>
                                <div class="replies">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                        </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="replyRow" style="display:none">
        <div>
            <textarea class="form-control" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
            <button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
            <button style="float:right" class="btn-default btn" onclick="$('.replyRow').hide();">Close</button>
        </div>
    </div>
</div>
<script>
    var isReply = false,
        max = <?php echo $data['numComments']->total_cmts ?>;
    $(document).ready(function() {
        $("#addComment, #addReply").on('click', function() {
            var comment;
            alert(isReply);
            if (!isReply)
                comment = $("#mainComment").val();
            else
                comment = $("#replyComment").val();

            if (comment.length > 5) {
                $.ajax({
                    url: '<?php echo URLROOT . '/cmts/addCmt'   ?>',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        addComment: 1,
                        comment: comment,
                        isReply: isReply,
                        postID: '<?php echo $data['post']->id ?>'
                    },
                    success: function(response) {
                        max++;
                        $("#numComments").text(max + " Comments");

                        // if (!isReply) {
                        //     $(".userComments").prepend(response);
                        //     $("#mainComment").val("");
                        // } else {
                        //     commentID = 0;
                        //     $("#replyComment").val("");
                        //     $(".replyRow").hide();
                        //     $('.replyRow').parent().next().append(response);
                        // }
                        document.write(response);
                    }
                });
            } else
                alert('Please Check Your Inputs');
        });

    })

    function reply(caller) {
        commentID = $(caller).attr('data-commentID');
        $(".replyRow").insertAfter($(caller));
        $('.replyRow').show();
    }

    function getAllComments(start, max) {
        if (start > max) {
            return;
        }

        $.ajax({
            url: 'index.php',
            method: 'POST',
            dataType: 'text',
            data: {
                getAllComments: 1,
                start: start
            },
            success: function(response) {
                $(".userComments").append(response);
                getAllComments((start + 20), max);
            }
        });
    }
</script>