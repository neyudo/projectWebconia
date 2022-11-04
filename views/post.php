<?php
    $conference_id = $_POST[ 'conference_id' ];
    $allConference = new ConferenceModelController();
    $allComments = new CommentsModelController();
    $allCommentsArray = $allComments->read( $conference_id );
    $allDataArray = $allConference->read( $conference_id );
    #var_dump( $allDataArray );

    if ( empty( $allDataArray ) ) {?>
        <div class="card-body">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Oh nein! </strong>
            </div>
        </div>
<?php
    } else {?>
            <br>
            <div class="container">
                <div class="row">
                    <?php 
                        foreach ($allDataArray as $key => $value) { ?>
                            <main class='container'>
                                    <div class='row mb-2'>
                                        <div class='col-md-8'>
                                            <div class='blog-post'>
                                                
                                                <h2 class='blog-post-title'>Conference</h2>
                                                <p class='blog-post-meta'>
                                                    Year: <?php echo date( "Y",strtotime($value[ 'conference_year' ] ) ) ?>
                                                </p>
                                                <p>
                                                    International: <?php echo $value[ 'conference_international' ]  ? "Ja" : "Nein" ?>
                                                </p>
                                                <p>
                                                    CITY: <?php echo $value[ 'conference_city' ]?>
                                                </p>
                                                <img src="./public/assets/img/<?php echo $value['conference_image'] ?>" alt="<?php echo $value['conference_city'] ?>">
                                            </div>    
                                        </div>
                                    </div>
                                <p>
                                    <a href='./'>Back </a>
                                </p>
                            </main>
                    <?php } ?>
                </div>
            </div>
<?php }
    if ( 
            isset(  $_POST['crud'] )
            && $_POST[ 'crud' ] == 'create'
            && isset( $_POST[ 'conference_id' ] ) 
            && $_POST[ 'comment_email' ] != ''
            && $_POST[ 'comment_author' ] != ''
            && $_POST[ 'comment_text' ] != ''
     ) {
        #Wir ckecken ob files name nicht lehr ist das heißt der User hat doch etwas  
        $datetime = date_create()->format('Y-m-d H:i:s');
        $newCommentArray = array(
            "comment_author" => htmlspecialchars( $_POST[ 'comment_author' ] ),
            "comment_email" => htmlspecialchars( $_POST[ 'comment_email' ] ),
            "comment_text" => htmlspecialchars( $_POST[ 'comment_text' ] ),
            "conference_id" => htmlspecialchars( $_POST[ 'conference_id' ] ),
            "comment_create_date" => $datetime
        );
        $allComments->create( $newCommentArray );
        header("Refresh:0; url=./");  
    }
?>
<br>
<hr>
<br>
<div class="container">
    <form action="?r=post"  method="post" >
        <div class="row bootstrap snippets bootdeys">
            <div class="col-md-4 col-sm-4">
                <div class="comment-wrapper">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <br>
                            <label for="comment_email">Email:</label>
                            <br>
                            <input type="email" name="comment_email" id="comment_email" class="form-control" require>
                            <br>
                            <label for="comment_author">Name:</label>
                            <br>
                            <input type="text" name="comment_author" id="comment_author" class="form-control">
                            <br>
                            <label for="comment_text">Titel:</label>
                            <textarea name="comment_text" id="comment_text" class="form-control" placeholder="writer a comment..." rows="2"></textarea>
                            <br>
                            <input type='hidden' name='conference_id' id='conference_id' value='<?php echo $conference_id ?>'>
                            <input type='hidden' name='crud' id='crud' value='create'>
                            <button class="btn btn-primary" type="submit" name="btnAction" value="add">
                                Post
                            </button>
                            <!-- <button type="button" class="btn btn-info pull-right">Post</button>
                            <div class="clearfix"></div> -->
                            <hr>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </form>
</div>
<div class="container">
<ul class="media-list">
<?php
    if ( empty( $allCommentsArray ) ) {

    } else {
            foreach ($allCommentsArray as $key => $value) {
        ?>
                <li class='media'>
                            <a href='#' class='pull-left'>
                                <img src='https://bootdey.com/img/Content/user_1.jpg' alt='' class='img-circle'>
                            </a>
                            <div class='media-body'>
                                <span class='text-muted pull-right'>
                                    <small class='text-muted'><?php echo $value[ 'comment_create_date' ] ?></small>
                                </span>
                                <strong class='text-success'><?php echo $value[ 'comment_author' ] ?></strong>
                                <p>
                                    <?php echo $value[ 'comment_text' ] ?>
                                </p>
                            </div>
                    </li>
        <?php }} ?>
</ul>
<br>
