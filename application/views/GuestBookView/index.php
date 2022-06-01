<div class="container">
    <div class="row mt-4">
        <h1>Guest book</h1>
    </div>

    <div class="row mt-5">
        <form action="/add-comment" method="post" class="p-5 rounded shadow-sm mb-5">
            <label for="" class="h3 text-primary mb-5">Enter your comment</label>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter name" name="name">
                <small id="emailHelp" class="form-text text-muted">Yor personal data</small>
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group mb-5">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="commentText"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
    </div>
</div>

<!-- Enter comments from server -->

<div class="container">
    <h1>Comments</h1>

    <div class="row">
        <?php
            foreach($args as $arg) {
                require 'application/views/GuestBookView/comment.php';
            }
        ?>
    </div>
</div>