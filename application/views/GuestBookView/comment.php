<div class="my-3 shadow-sm px-5 py-2">
    <div class="row">
        <p class="my-0"> <strong>Name: </strong>
            <small><?php echo $arg->userName; ?></small>
        </p>
        <br>
        <p> <strong>Email: </strong>
            <small><?php echo $arg->email; ?></small>
        </p>
        <br>
        <p> <strong>Date: </strong>
            <small><?php echo $arg->date; ?></small>
        </p>
    </div>
    <div class="row">
        <strong>Comment: </strong>
        <p><?php echo $arg->text; ?></p>
    </div>
</div>