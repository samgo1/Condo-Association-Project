<div class="content">
    <div name="commenter" class="commenter"><?php global $commentor_name; global $date_time;
                                                    echo $commentor_name . " posted on  " . $date_time?>
    </div>
    <span name="comment">
        <?php global $comment_text;
            echo $comment_text;
        ?>
    </span>
</div>