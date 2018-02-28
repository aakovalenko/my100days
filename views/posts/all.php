<?php
/* @var $posts app\models\Posts */
?>
 <div class="body-content">

        <div class="row">

                <?php foreach ($posts as $post): ?>
            <div class="col-lg-12">
                <h2><?=$post->title; ?></h2>
                <p><?=$post->text; ?>

                </p>

            </div>
                <?php endforeach;?>


        </div>

    </div>