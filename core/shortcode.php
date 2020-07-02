<?php
// [ads_slide]
function ads_shortcode() {
    global $epv_options;
    $check = changeLang($epv_options['bottom-banner-ads'],$epv_options['bottom-banner-ads-vi']);
    $output = "<div class=\"box__ads\">";
    $output .= "<div class=\"ads__slider owl-carousel\">";
    if ( isset( $check ) && !empty( $check ) ) {
        for ($i = 0; $i < count($check); $i++){
            $url = ($check[$i]['url'] != "") ? $check[$i]['url'] : "#";
            $output .= "<a href=\"". $url ."\" title=\"\" target=\"_blank\">";
            $output .= "<img src=\"". $check[$i]['image']. "\" alt=\"\">";
            $output .= "</a>";
        }
    }
    $output .= "</div>";
    $output .= "<span>".changeLang("ADVERTISING","QUẢNG CÁO")."</span>";
    $output .= "</div>";
    return $output;
}
add_shortcode('ads_slide', 'ads_shortcode');
// [top_ads_slide]
function top_ads_shortcode() {
    global $epv_options;
    $check = changeLang($epv_options['top-banner-ads'],$epv_options['top-banner-ads-vi']);
    $output = "<div class=\"ads__box\">";
    $output .= "<div class=\"ads__slider owl-carousel\">";
    if ( isset( $check ) && !empty( $check ) ) {
        foreach ($check as $top_ads_slide) {
            $url = ($top_ads_slide['url'] != "") ? $top_ads_slide['url'] : "#";
            $output .= "<a href=\"". $url ."\" title=\"\" target=\"_blank\">";
            $output .= "<img src=\"". $top_ads_slide['image']. "\" alt=\"\">";
            $output .= "</a>";
        }
    }
    $output .= "</div>";
    $output .= "<span>".changeLang("ADVERTISING","QUẢNG CÁO")."</span>";
    $output .= "</div>";
    return $output;
}
add_shortcode('top_ads_slide', 'top_ads_shortcode');
// [bot_ads_slide]
function bot_ads_shortcode() {
    global $epv_options;
    $check = changeLang($epv_options['middle-banner-ads'],$epv_options['middle-banner-ads-vi']);
    $output = "<div class=\"box__ads\">";
    $output .= "<div class=\"ads__slider owl-carousel\">";
    if ( isset( $check ) && !empty( $check ) ) {
        foreach ($check as $top_ads_slide) {
            $url = ($top_ads_slide['url'] != "") ? $top_ads_slide['url'] : "#";
            $output .= "<a href=\"". $url ."\" title=\"\" target=\"_blank\">";
            $output .= "<img src=\"". $top_ads_slide['image']. "\" alt=\"\">";
            $output .= "</a>";
        }
    }
    $output .= "</div>";
    $output .= "<span>".changeLang("ADVERTISING","QUẢNG CÁO")."</span>";
    $output .= "</div>";
    return $output;
}
add_shortcode('bot_ads_slide', 'bot_ads_shortcode');
// [coverage_slide]
function coverage_ads_shortcode() {
    global $epv_options;
    $output = "<div class=\"media__pass__ads\">";
    $output .= "<div class=\"ads__slider owl-carousel\">";
    $check = changeLang($epv_options['coverage-ads'],$epv_options['coverage-ads-vi']);
    if ( isset( $check ) && !empty( $check ) ) {
        foreach ($check as $top_ads_slide) {
            $url = ($top_ads_slide['url'] != "") ? $top_ads_slide['url'] : "#";
            $output .= "<a href=\"". $url ."\" title=\"\" target=\"_blank\">";
            $output .= "<img src=\"". $top_ads_slide['image']. "\" alt=\"\">";
            $output .= "</a>";
        }
    }
    $output .= "</div>";
    $output .= "<span>".changeLang("ADVERTISING","QUẢNG CÁO")."</span>";
    $output .= "</div>";
    return $output;
}
add_shortcode('coverage_ads', 'coverage_ads_shortcode');
// [exhibitor-logo]
function exhibitor_shortcode() {
    global $epv_options;
    $exhibitorList = $epv_options['exhibitor-highlights'];
    $output = '<div class="partner-slider partner-slider-1 owl-carousel">';
    foreach ($exhibitorList as $exhibitorItem){
        $permalink = ($exhibitorItem["url"] != "") ? $exhibitorItem["url"] : "#";
        $output .= '<a href="'. $permalink . '" class="item" target="_blank">';
        $output .= '<img src="'. $exhibitorItem["image"] .'" alt="">';
        $output .= '</a>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('exhibitor-logo', 'exhibitor_shortcode');
// [partner-logo]
function mediaPartner_shortcode() {
    global $epv_options;
    $mediaPartnerList = $epv_options['media-partners'];
    $output = '<div class="partner-slider partner-slider-2 owl-carousel">';
    foreach ($mediaPartnerList as $mediaPartnerItem){
        $permalink = ($mediaPartnerItem["url"] != "") ? $mediaPartnerItem["url"] : "#";
        $output .= '<a href="'. $permalink . '" class="item" target="_blank">';
        $output .= '<img src="'. $mediaPartnerItem["image"] .'" alt="">';
        $output .= '</a>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('partner-logo', 'mediaPartner_shortcode');

// [partner-other-logo]
function partnerOther_shortcode() {
    global $epv_options;
    $coLocate = $epv_options['co-located'];
    $endorsed = $epv_options['endorsed-by'];
    $supported = $epv_options['supported-by'];
    $heldIn = $epv_options['held-in'];
    $officalAirline = $epv_options['offical-airline'];
    $output = '<div class="partner-other__box">';
    $output .= '<div class="box__big">';
    $output .= '<div class="item">';
    $output .= '<div class="item__text">';
    $output .= '<span>'.changeLang("Co-located with Plastic & Rubber Vietnam","Đồng sở hữu với Plastic & Rubber Việt Nam").'</span>';
    $output .= '</div>';
    $output .= '<div class="item__logo">';
    $output .= '<div class="item__logo__box">';
    foreach ($coLocate as $coLocateItem){
     $permalink = ($coLocateItem["url"] != "") ? $coLocateItem["url"] : "#";
     $output .= '<a href="'. $permalink . '" title="" target="_blank">';
     $output .= '<img src="'. $coLocateItem["image"] .'" alt="">';
     $output .= '</a>';
 }
 $output .= '</div>';
 $output .= '</div>';
 $output .= '</div>';
 $output .= '<div class="item">';
 $output .= '<div class="item__text">';
 $output .= '<span>'.changeLang("ENDORSED BY","KIỂM CHỨNG BỞI").'</span>';
 $output .= '</div>';
 $output .= '<div class="item__logo">';
 $output .= '<div class="item__logo__box">';
 foreach ($endorsed as $endorsedItem){
    $permalink = ($endorsedItem["url"] != "") ? $endorsedItem["url"] : "#";
    $output .= '<a href="'. $permalink . '" title="" target="_blank">';
    $output .= '<img src="'. $endorsedItem["image"] .'" alt="">';
    $output .= '</a>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="item">';
$output .= '<div class="item__text">';
$output .= '<span>'.changeLang("SUPPORTED BY","HỖ TRỢ BỞI").'</span>';
$output .= '</div>';
$output .= '<div class="item__logo">';
$output .= '<div class="item__logo__box">';
foreach ($supported as $supportedItem){
 $permalink = ($supportedItem["url"] != "") ? $supportedItem["url"] : "#";
 $output .= '<a href="'. $permalink . '" title="" target="_blank">';
 $output .= '<img src="'. $supportedItem["image"] .'" alt="">';
 $output .= '</a>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '<div class="box__small">';
$output .= '<div class="title">';
$output .= '<strong>'.changeLang("Held In","Tổ Chức").'</strong>';
$output .= '</div>';
foreach ($heldIn as $heldInItem){
    $permalink = ($heldInItem["url"] != "") ? $heldInItem["url"] : "#";
    $output .= '<a href="'. $permalink . '" title="" target="_blank">';
    $output .= '<img src="'. $heldInItem["image"] .'" alt="">';
    $output .= '</a>';
}
$output .= '</div>';
$output .= '<div class="box__small">';
$output .= '<div class="title">';
$output .= '<strong>'.changeLang("OFFICAL AIRLINE","HÃNG HÀNG KHÔNG").'</strong>';
$output .= '</div>';
foreach ($officalAirline as $officalAirlineItem){
    $permalink = ($officalAirlineItem["url"] != "") ? $officalAirlineItem["url"] : "#";
    $output .= '<a href="'. $permalink . '" title="" target="_blank">';
    $output .= '<img src="'. $officalAirlineItem["image"] .'" alt="">';
    $output .= '</a>';
}
$output .= '</div>';
$output .= '</div>';
return $output;
}
add_shortcode('partner-other-logo', 'partnerOther_shortcode');

// [seminar]
function seminar_shortcode() {
    global $epv_options;
    $cta_banner_bg = $epv_options['ctabanner_bg']['url'];
    $cta_banner_img = $epv_options['ctabanner_image']['url'];
    $cta_sm_title = $epv_options['ctabanner_tag'];
    $cta_title = $epv_options['ctabanner_title'];
    $cta_vertical_title = $epv_options['ctabanner_vertical_title'];
    $cta_hyperlink = $epv_options['ctabanner_hyperlink'];
    $url = ($cta_hyperlink != "") ? $cta_hyperlink : "#";
    $output = '<div class="box-hidden" style="background-image: url('. $cta_banner_bg.');">';
    $output .= '<div class="col-2">';
    $output .= '<center><img src="'. $cta_banner_img.'" alt=""></center>';
    $output .= '</div>';
    $output .= '<div class="col-2">';
    $output .= '<div class="box__gray">';
    $output .= '<div class="text">'. $cta_vertical_title .'</div>';
    $output .= '<div class="category">'. $cta_sm_title .'</div>';
    $output .= '<div class="title">'. $cta_title .'</div>';
    $output .= '<a class="more" href="'. $url .'">'.changeLang("Find our more","Tìm thêm").' <span></span></a>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    return $output;
}
add_shortcode('seminar', 'seminar_shortcode');
// [wheretonext]
function wheretonext_shortcode() {
    global $epv_options;
    $wheretonextList = changeLang($epv_options['wheretonext'],$epv_options['wheretonext-vi']);
    $output = '<section class="content-next">';
    $output .= '<div class="container">';
    $output .= '<div class="content-next_box">';
    $output .= '<h2 class="heading">'.changeLang("Where to Next","Điểm đến tiếp theo").'</h2>';
    $output .= '<div class="clearfix"></div>';
    $output .= '<div class="grids">';
    foreach ($wheretonextList as $wheretonextItem){
        $url = ($wheretonextItem['url'] != "") ? $wheretonextItem['url'] : "#";
        $output .= '<div class="grid__2" style="background-image: url('. $wheretonextItem['image']. ');">';
        $output .= '<h3 class="grid__name">'. $wheretonextItem['title'] .'</h3>';
        $output .= '<a class="grid__more" href="'. $url .'">Read more <span></span></a>';
        $output .= '</div>';
    }
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</section>';
    return $output;
}
add_shortcode('wheretonext', 'wheretonext_shortcode');

