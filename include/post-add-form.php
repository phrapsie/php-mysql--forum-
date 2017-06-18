<div class="container mt-5">

    <div class="row interesting mb-5">

        <div class="col-md-6 befixed-sm">
            <form action="post-add-controller.php" method='get'>
                <div class="form-group">
                    <div class="form-group">
<input type="hidden" name='date' value='<?php echo date('Y-m-d H:i:s')
?>' required>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                    </div>
                    <label for="post-content">Write a post...</label>
                    <textarea class="form-control" name="post-content" id="post-content" rows="3" required></textarea>
                    <button type="submit" class="btn btn-block btn-danger my-4">Submit the message</button>
            </form>
            </div>
        </div>


        <div class="card col-md-6 next-to-fixed">


<?php

$query = "SELECT * FROM comments";
$posts_result = $conn->query($query);

while($row = $posts_result->fetch_assoc()){
    echo  '<div class="card-block post">
                <blockquote class="card-blockquote">
                    <h1>'.$row['title'].'</h1>
                    <p>'.$row['content'].'</p>
                    <footer>
                        <p class="left">Author: <b>'.$row['author'].'</b></p>
                        <p class="right">Added: <b>'.$row['date'].'</b></p>
                    </footer>
                </blockquote>
            </div>';
}

?>

    </div>

</div>