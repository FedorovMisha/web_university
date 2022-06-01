<div class="container">
    <h1 class="my-5">Blog</h1>
    <?php
        foreach($args["blogs"] as $item) {
            require "application/views/BlogAdminView/blog.php";
        }
    ?>
</div>

<div class="container my-5">
    <?php

        for($i = 1; $i <= $args["pageCount"]; $i++) {
            $cp = $args["currentPage"];
            $p = $i;
            $dis = $i == $args["currentPage"] ? "disabled" : "";
            echo <<<EOL
            <a href="/blogs?p=$p" class="btn $dis btn-primary mx-2" $dis>$i</a>
            EOL;
        }
    ?>
</div>