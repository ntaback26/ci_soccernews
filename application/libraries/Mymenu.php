<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymenu
{
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Mcategory');
       
    }

    public function top_menu() {
        $data = $this->CI->Mcategory->listAll();

        $cate_id = $this->CI->uri->segment(4);
        echo '<ul class="sf-menu">';
        foreach ($data as $key => $value) {
            if ($value['parent_id'] == 0) {
                if ($value['cate_id'] == $cate_id 
                    || $this->CI->Mcategory->getParentById($cate_id) == $value['cate_id']) {
                    echo '<li class="current">';  
                } else {
                    echo '<li>';
                }
                // Kiểm tra có chuyên mục con hay không ?
                $check = FALSE; // FALSE <=> không có chuyên mục con
                $child = array();
                foreach ($data as $key2 => $value2) {
                    if ($value2['parent_id'] == $value['cate_id']) {
                        $check = TRUE;
                        $child[$value2['cate_id']] = $value2; 
                    }
                }
                echo "<a href='".base_url()."chuyen-muc/$value[cate_id]/".unicode($value['cate_title']).".html'>$value[cate_title].</a>";     
                if ($check == TRUE) { 
                    echo '<ul>';
                    foreach ($child as $key2 => $value2) {
                        echo '<li>';
                        echo '<i class="icon-right-open"></i>';
                        echo "<a href='".base_url()."chuyen-muc/$value2[cate_id]/".unicode($value2['cate_title']).".html'>$value2[cate_title].</a>";     ;
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
        }
    }

    public function bottom_menu() {
        $data  = $this->CI->Mcategory->listAllOfRoot();
        $total = $this->CI->Mcategory->countAllOfRoot();
        echo '<div style="width: 50%; float:left;">';
        for ($i = 0; $i < $total/2; $i++) {
            echo '<li>';
            echo '<a href="'.base_url().'chuyen-muc/'.$data[$i]['cate_id'].'/'.unicode($data[$i]['cate_title']).'.html">';
            echo '<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;'; 
            echo $data[$i]['cate_title'];
            echo '</a>';
            echo '</li>';
        }
        echo '</div>';
        echo '<div style="width: 50%; float:left;">';
        for ($i = $total/2; $i < $total; $i++) {
            echo '<li>';
            echo '<a href="'.base_url().'chuyen-muc/'.$data[$i]['cate_id'].'/'.unicode($data[$i]['cate_title']).'.html">';
            echo '<i class="fa fa-chevron-right"></i>&nbsp;&nbsp;'; 
            echo $data[$i]['cate_title'];
            echo '</a>';
            echo '</li>';
        }
        echo '</div>';
    } 
}
?>
