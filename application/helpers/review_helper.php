<?php  
    function review() {
        $CI =& get_instance();
        $CI->load->model('Mnews');
        $popular = $CI->Mnews->getPopular(5);
        $latest = $CI->Mnews->getLatest(5);

        echo '<div id="tabs">';
        echo '<ul>';
        echo '<li><a href="#tabs1">Tin nóng.</a></li>';
        echo '<li><a href="#tabs2">Tin mới nhất.</a></li>';
        echo '</ul>';
        echo '<div id="tabs1">';
        echo '<ul>';
        foreach ($popular as $item) {
            echo '<li>';
            echo '<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<a href="'.base_url().'tin-tuc/'.unicode($item['news_title']).'-'.$item['news_id'].'.html" class="title">';
            echo $item['news_title']; 
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo  '</div>';
        echo '<div id="tabs2">';
        echo '<ul>';
        foreach ($latest as $item) {
            echo '<li>';
            echo '<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<a href="'.base_url().'tin-tuc/'.unicode($item['news_title']).'-'.$item['news_id'].'.html" class="title">';
            echo $item['news_title']; 
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo  '</div>';
        echo '</div>';
    }
?>

