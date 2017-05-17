<div class="main-content">
    <!-- Chuyển Nhượng -->
    <div class="column-two-third">
    	<h5 class="line">
        	<span>Chuyển Nhượng.</span>
            <div class="navbar">
                <a id="next1" class="next" href="#"><span></span></a>	
                <a id="prev1" class="prev" href="#"><span></span></a>
            </div>
        </h5>

        <div class="outertight">
        	<img src="<?php echo base_url().'uploads/'.$category1['0']['news_img']; ?>" />
            <h6 class="regular">
                <a href="<?php echo base_url().'tin-tuc/'.unicode($category1['0']['news_title']).'-'.$category1['0']['news_id'].'.html'; ?>">
                    <?php echo $category1['0']['news_title']; ?>
                </a>
            </h6>
    		<span class="meta"><?php echo default_time($category1['0']['news_time']); ?></span>
            <p align="justify"><?php echo  $category1['0']['news_description']; ?></p>
        </div>
        
        <div class="outertight m-r-no">                 	
        	<ul class="block" id="carousel">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                <li>
                    <a href="<?php echo base_url().'tin-tuc/'.unicode($category1[$i]['news_title']).'-'.$category1[$i]['news_id'].'.html'; ?>">
                        <img src="<?php echo base_url().'uploads/140x85/thumb_'.$category1[$i]['news_img']; ?>" class="alignleft" width="140px" height="85px" />
                    </a>
                    <p>
                        <span><?php echo default_time($category1[$i]['news_time']); ?></span>
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($category1[$i]['news_title']).'-'.$category1[$i]['news_id'].'.html'; ?>">
                            <?php echo $category1[$i]['news_title']; ?>
                        </a>
                    </p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- /Chuyển Nhượng -->

    <!-- Việt Nam, Anh, Tây Ban Nha, Italia -->
    <?php 
        $count = 2; 
        foreach ($category2 as $item) : 
    ?>
    <div class="column-two-third">
    	<h5 class="line">
        	<span><?php echo $item['cate_title']; ?>.</span>
            <div class="navbar">
                <a id="next<?php echo $count; ?>" class="next" href="#"><span></span></a>	
                <a id="prev<?php echo $count; ?>" class="prev" href="#"><span></span></a>
            </div>
        </h5>
        
        <div class="outerwide" style="height: 220px;" >
        	<ul class="wnews" id="carousel<?php echo $count; ?>">
                <?php for ($i = 0; $i <= 1; $i++) { ?>
            	<li>
                	<img src="<?php echo base_url().'uploads/300x185/thumb_'.$item[$i]['news_img']; ?>" class="alignleft" width="290px" height="180px" />
                    <h6 class="regular">
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($item[$i]['news_title']).'-'.$item[$i]['news_id'].'.html'; ?>">
                            <?php echo $item[$i]['news_title']; ?>
                        </a>
                    </h6>
                    <span class="meta"><?php echo default_time($item[$i]['news_time']); ?></span>
                    <p><?php echo $item[$i]['news_description']; ?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
        
        <div class="outerwide">
        	<ul class="block2">
                <?php for ($i = 2; $i <= 5; $i++) { ?>
                <li>
                    <a href="<?php echo base_url().'tin-tuc/'.unicode($item[$i]['news_title']).'-'.$item[$i]['news_id'].'.html'; ?>">
                        <img src="<?php echo base_url().'uploads/140x85/thumb_'.$item[$i]['news_img']; ?>" class="alignleft" width="140px" height="85px" />
                    </a>
                    <p>
                        <span><?php echo default_time($item[$i]['news_time']); ?></span>
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($item[$i]['news_title']).'-'.$item[$i]['news_id'].'.html'; ?>">
                            <?php echo $item[$i]['news_title']; ?>
                        </a>
                    </p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php
        $count++; 
        endforeach; 
    ?>
    <!-- /Việt Nam, Anh, Tây Ban Nha, Italia -->

    <!-- Đức, Pháp -->
    <div class="column-two-third">
        <?php 
            $count = 1;
            foreach ($category3 as $item) : 
        ?>
        
    	<div class="outertight <?php if ($count == 2) echo 'm-r-no' ?>">
        	<h5 class="line"><span><?php echo $item['cate_title']; ?>.</span></h5>
            <div class="outertight m-r-no" style="height: 350px;">
                <div style="height: 230px;">
                    <img src="<?php echo base_url().'uploads/300x185/thumb_'.$item['0']['news_img']; ?>" height="160px" width="100%" />             
                    <h6 class="regular">
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($item['0']['news_title']).'-'.$item['0']['news_id'].'.html'; ?>">
                        <?php echo $item['0']['news_title']; ?>
                        </a>
                    </h6>
                </div>
                <span class="meta" ><?php echo default_time($item['0']['news_time']); ?></span>
                <p><?php echo $item['0']['news_description']; ?></p>
            </div>
            
            <ul class="block">
                <?php for ($i = 1; $i <= 2; $i++) { ?>
                <li>
                    <a href="<?php echo base_url().'tin-tuc/'.unicode($item[$i]['news_title']).'-'.$item[$i]['news_id'].'.html'; ?>">
                        <img src="<?php echo base_url().'uploads/140x85/thumb_'.$item[$i]['news_img']; ?>" class="alignleft" width="140px" height="85px" />
                    </a>
                    <p>
                        <span><?php echo default_time($item[$i]['news_time']); ?></span>
                        <a href="<?php echo base_url().'tin-tuc/'.unicode($item[$i]['news_title']).'-'.$item[$i]['news_id'].'.html'; ?>"><?php echo $item['0']['news_title']; ?></a>
                    </p>
                </li>
                <?php } ?>
            </ul>
        </div>
        
        <?php
            $count++; 
            endforeach; 
        ?>
    </div>
    <!-- /Đức, Pháp -->
</div>