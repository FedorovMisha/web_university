<div class="d-flex">
    <input type="text" id="commentText-<?php echo $item->id; ?>" class="form-control me-5" placeholder="Comment">
    <button class="btn btn-primary" onclick="sendBlog('<?php echo $item->id; ?>')">Submit</button>
</div>
