<div class="container">
    <!-- Tin nóng -->
    <div class="main-slider">
        <div class="badg">
            <p>TIN NÓNG.</p>
        </div>
        <div class="flexslider">
            <ul class="slides">
                <?php  
                    foreach ($popular as $key => $value) :
                ?>
                <li>
                    <img src="<?php echo base_url().'uploads/'.$value['news_img']; ?>" height="370px" />
                    <p class="flex-caption">
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($value['news_title']).'-'.$value['news_id'].'.html'; ?>">
                            <?php echo $value['news_title']; ?>
                        </a>
                        <?php echo $value['news_description']; ?>
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <!-- Tin mới nhất -->
    <div class="slider2">
        <div class="badg">
            <p>MỚI NHẤT.</p>
        </div>
        <a href="<?php echo base_url().'tin-tuc/'.unicode($latest['0']['news_title']).'-'.$latest['0']['news_id'].'.html'; ?>">
            <img src="<?php echo base_url().'uploads/'.$latest['0']['news_img']; ?>" height="215px" width="100%" />
        </a>
        <p class="caption">
            <a href="<?php echo base_url().'tin-tuc/'.unicode($latest['0']['news_title']).'-'.$latest['0']['news_id'].'.html'; ?>">
                <?php echo $latest[0]['news_title']; ?>
            </a>
        </p>
    </div>
    
    <div class="slider3">
        <a href="<?php echo base_url().'tin-tuc/'.unicode($latest['1']['news_title']).'-'.$latest['1']['news_id'].'.html'; ?>">
            <img src="<?php echo base_url().'uploads/300x185/thumb_'.$latest['1']['news_img']; ?>" height="135px" />
        </a>
        <p class="caption">
            <a href="<?php echo base_url().'tin-tuc/'.unicode($latest['1']['news_title']).'-'.$latest['1']['news_id'].'.html'; ?>">
                <?php echo $latest[1]['news_title']; ?>
            </a>
        </p>
    </div>

    <div class="slider3">
        <a href="<?php echo base_url().'tin-tuc/'.unicode($latest['2']['news_title']).'-'.$latest['2']['news_id'].'.html'; ?>">
            <img src="<?php echo base_url().'uploads/300x185/thumb_'.$latest['2']['news_img']; ?>" height="135px" />
        </a>
        <p class="caption">
            <a href="<?php echo base_url().'tin-tuc/'.unicode($latest['2']['news_title']).'-'.$latest['2']['news_id'].'.html'; ?>">
                <?php echo $latest[2]['news_title']; ?>
            </a>
        </p>
    </div>
</div> 