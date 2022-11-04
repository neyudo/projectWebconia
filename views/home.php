<?php
    $allConference = new ConferenceModelController();
    $allDataArray = $allConference->read();
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
                            
                            <div class="col-3">
                                <div class="card" >
                                    <!-- 
                                        Mit hilfe von Bootstrap und popover
                                        generieren wir eine Card mit der Inhalt von die product_descriiption
                                        aber jetzt zeigen wir die ganze Info und nicht nur 45 Buchstaben
                                     -->
                                    <img 
                                        title="<?php echo $value['conference_city'] ?>"
                                        src="./public/assets/img/<?php echo $value['conference_image'] ?>"
                                        class="card-img-top imgpop" 
                                        alt="<?php echo $value['conference_city'] ?>"
                                        data-bs-toggle="popover" 
                                        data-bs-trigger="hover focus" 
                                        data-bs-content="<?php echo $value['conference_city'] ?>"
                                    >
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $value['conference_city'] ?></h5>
                                        <form action="?r=post" method="post">
                                            <input type="hidden" name="conference_id" id="conference_id" value="<?php echo $value['conference_id'] ?>">
                                            <button class="btn btn-primary" type="submit" name="btnAction" value="add">
                                                read more
                                            </button>
                                        </form>
                                        

                                    </div>
                                </div>
                            </div>
                    <?php }
                    ?>

                </div>
            </div>
<?php }?>
