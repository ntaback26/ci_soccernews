<div class="breadcrumbs column">
	<p><?php echo $path; ?></p>
</div>

<!-- Main Content -->
<div class="main-content">
    
    <!-- Single -->
    <div class="column-two-third single">
        <!-- News detail -->
        <h5 class="title"><?php echo $data['news_title']; ?></h5>
        <span class="meta"><?php echo default_time($data['news_time']); ?></a></span>       
        <p><?php echo $data['news_detail']; ?></p>
        <p class="author">(<?php echo $data['news_author']; ?>)</p>
        <ul class="sharebox">
            <li><a href="#"><span class="twitter">Tweet</span></a></li>
            <li><a href="#"><span class="pinterest">Pin it</span></a></li>
            <li><a href="#"><span class="facebook">Like</span></a></li>
        </ul>
        
        <!-- Related news -->
        <div class="relatednews">
            <h5 class="line"><span>TIN LIÊN QUAN.</span></h5>
            <ul>
                <?php foreach ($related as $item) : ?>
                <li>
                    <a href="<?php echo base_url().'tin-tuc/'.unicode($item['news_title']).'-'.$item['news_id'].'.html'; ?>">
                        <img src="<?php echo base_url().'uploads/140x85/thumb_'.$item['news_img']; ?>" width="140px" height="85px" />
                    </a>
                    <p>
                        <span><?php echo default_time($item['news_time']); ?></span>
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($item['news_title']).'-'.$item['news_id'].'.html'; ?>">
                            <?php echo $item['news_title']; ?>
                        </a>
                    </p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
    </div>
    <!-- /Single -->
    
</div>
