<div class="postContainer">
    <div class="postLabel">
        <span name="userInfo">
            <?php
                //global $name; global $date_time;
                echo $author_name . " posted on  " . $date_time;
            ?>
        </span>
        <i class="material-icons">arrow_forward</i>
        <span name="groupInfo">
            Groups:
            <?php
            //global $groups; global $num_of_groups;
            for ($i=0; $i< $num_of_groups; $i++){
                if ($i == $num_of_groups -1){
                    echo $groups[$i][0];
                } else {
                    echo $groups[$i][0] . ", ";
                }
            }
            ?>
        </span>
    </div>
    <div name="content" class="content">
        <?php echo $content_text; 
        
            if ($content_img != null){
                echo "
                <div class=\"imageContainer\">
                    <img class=\"image\" src=\"posts_pictures/jackie.jpg\" alt=\"\" height=\"25%\" width=\"25%\">
                </div>";
            }
        ?>
    </div>

    <?php

        // display the comments part
        $sql = "SELECT commentor_id, text, date_time FROM `comment` WHERE post_id = '{$post_id}'";
        //global $conn;
        $result = $conn->query($sql);

        $commentor_id;
        if ($result->num_rows > 0){
            echo '<div class="postLabel">Comments</div>';
            while ($comment = $result->fetch_row())
            {
                $commentor_id = $comment[0];
                $comment_text = $comment[1];
                $date_time = $comment[2];

                $sql = "SELECT name FROM `member` WHERE id = '{$commentor_id}'";

                $result2 = $conn->query($sql);

                $commentor_name = $result2->fetch_row()[0];

                include "comment.php";

            }

        }


        // display post comment
        //global $permission;
        //global $post_id;

        if ($permission === 'view and comment' || $permission === 'view, comment and link')
        {

            echo '<form action="/Condo-Association-Project/controllers/commentCreate.php" method="post">';
            echo "    <input type=\"hidden\" id=\"date_time\" name=\"date_time\" value=\"" . date('Y-m-d H:i:s') . "\" >";
            echo '    <input type="text" name="comment">';
            echo "    <input type=\"hidden\" name=\"commentor_id\" value=\"" . $member_id . "\" >";
            echo "    <input type=\"hidden\" name=\"post_id\" value=\"" . $post_id . "\" >";
            echo '    <button class="btn" type="submit">Comment</button>';
            echo '</form>';

        }

        if ($author_id === $member_id){
            echo '<form action="/Condo-Association-Project/controllers/postDelete.php" method="post">';
            echo "    <input type=\"hidden\" name=\"post_id\" value=\"" . $post_id . "\" >";
            echo '    <br><button class="btn" type="submit">Delete Post</button>';
            echo '</form>';
        }

echo '</div>';