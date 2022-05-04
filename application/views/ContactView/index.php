<div class="container">
    <form action="/contact/send" method="POST" class="my-5">

        <h2 class="my-5">Send message</h2>

        <div class="container p-5">
            <?php
                if(isset($args)) {
                    foreach($args as $value) {
                        echo '<p>'.$value.'</p>';
                    }
                }
            ?>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="Email" class="form-control" id="mail" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="row">
            <div class="col">
                <button class="btn btn-primary w-100" type="submit">Send</button>
            </div>
            <div class="col">
                <button class="btn btn-danger w-50" type="reset">Cancel</button>
            </div>
        </div>
    </form>

</div>

<div class="container p-5">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae, blanditiis quisquam mollitia vitae consectetur magnam. Perferendis saepe quae recusandae, nihil a at, incidunt beatae sequi pariatur tempora suscipit ex consequatur.</p>
</div>