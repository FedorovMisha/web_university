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

<script>

    function sendBlog(id) {
        console.log("ok");
        let formData = new FormData();
        let doc = document.getElementById(`commentText-${id}`);
        formData.append("text", doc.value);
        formData.append("blogId", id);
        formData.append("login", '<?php print_r($_SESSION['login']); ?>');
        formData.append("userId",'<?php print_r($_SESSION['userId']); ?>');
        formData.append("userName", '<?php print_r($_SESSION['userName']); ?>');

        fetch('./api/send-comment', {
            body: formData,
            method: 'POST',
            credentials: 'same-origin'
        }).then(resp => resp.json())
        .then((json) => {
            let doc = document.getElementById(`comments-${id}`);
            doc.innerHTML += `<div class="my-4 bg-light shadow-sm p-4"><p class="mb-1">${json.userEmail}</p><p class="mb-1">${json.userName}</p><p class="mb-3">${json.text}</p></div>`;
            
        });
    }

</script>
