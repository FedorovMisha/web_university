<?php
    if (isset($_SESSION["userName"])) {
        if ($_SESSION["userName"] == "admin") {
            echo  '<a href="/api-edit-blog?blogId='.$item->id.'">EditComment</a>';
         }
    }

    ?>
<div class="p-3 rounded border border-1 mb-5">
    <strong><?php echo $item->label; echo $item->id; ?></strong>
    <img src="/<?php echo $item->imagePath; ?>" style="height: 50vh;" class="w-100" alt="">
    <p><?php echo $item->description; ?></p>
    <?php
        if(isset($_SESSION["login"])) {
            require "application/views/BlogAdminView/inputComment.php";
        }
    ?>
    <p class="my-4">
        <a class="btn btn-primary w-100" data-bs-toggle="collapse" href="#multiCollapseExample-<?php echo $item->id; ?>"
            role="button" aria-expanded="false"
            aria-controls="multiCollapseExample-<?php echo $item->id; ?>">Comments</a>
    </p>
    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample-<?php echo $item->id; ?>">
                <div class="" id="comments-<?php echo $item->id; ?>">
                    <?php 

                    $item->fetch(); 

                    if(isset($item->comments)) {
                        foreach($item->comments as $comment) {
                            require "application/views/BlogAdminView/comment.php";
                        }
                    } else {
                        print_r("Empty");
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>