<div class="container">
    <div class="column">
    	<!-- Logo -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo $public_path; ?>img/logo.png" title="Bóng Đá" /></a>
        </div>
        
        <!-- Search form -->
        <div class="search">
            <form action="#" method="post">
                <input type="text" value="Search." onblur="if(this.value=='') this.value='Search.';" onfocus="if(this.value=='Search.') this.value='';" class="ft"/>
                <input type="submit" value="" class="fs">
            </form>
        </div>
        
        <!-- Nav -->
        <nav id="nav">
            <?php $this->mymenu->top_menu(); ?>
        </nav>
        <!-- /Nav -->
    </div>
</div>