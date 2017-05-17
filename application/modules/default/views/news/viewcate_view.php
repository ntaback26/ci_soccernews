<div class="breadcrumbs column">
<p><?php echo $path; ?></p>
</div>

<div class="main-content">

    <div class="column-two-third">

    <?php  
        $total = count($data);
        if ($total == 0) {
            echo '<h1>Không có dữ liệu</h1>';
        } else {
    ?>      
        
        <!-- First news -->
        <div id="review-first">
            <div class="main-slider">
                <div class="badg">
                    <p><a href="#">MỚI NHẤT.</a></p>
                </div>

                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="<?php echo base_url().'uploads/'.$data['0']['news_img']; ?>" />
                            <p class="flex-caption">
                                <a href="<?php echo base_url().'tin-tuc/'.unicode($data['0']['news_title']).'-'.$data['0']['news_id'].'.html'; ?>">
                                    <?php echo $data['0']['news_title']; ?>
                                </a>
                                <?php echo $data['0']['news_description']; ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- /First news -->

        <!-- Other news -->
        <div id="review-other">
            <div class="outerwide">
                <ul class="wnews">
                    <?php for ($i = 1; $i < $total; $i++) { ?>
                    <li>
                        <img src="<?php echo base_url().'uploads/300x185/thumb_'.$data[$i]['news_img']; ?>" class="alignleft" width="280px" height="170px" />
                        <h6 class="regular">
                            <a href="<?php echo base_url().'tin-tuc/'.unicode($data[$i]['news_title']).'-'.$data[$i]['news_id'].'.html'; ?>">
                                <?php echo $data[$i]['news_title']; ?>
                            </a>
                        </h6>
                        <span class="meta"><?php echo default_time($data[$i]['news_time']); ?></span>
                        <p><?php echo $data[$i]['news_description']; ?></p>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- /Other news -->

        <?php echo $page_links;  ?>

    <?php
        }
    ?>

    </div>

</div>
<!-- /Main Content -->


