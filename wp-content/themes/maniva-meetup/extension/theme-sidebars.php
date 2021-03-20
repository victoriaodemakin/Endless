<?php
// enable and register custom sidebar
add_action( 'widgets_init', 'tzmeetup_sidebar' );
function tzmeetup_sidebar(){
    if (function_exists('register_sidebar')) {
        // default sidebar array
        $sidebar_attr = array(
            'name'          => '',
            'id'            => '',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="%2$s widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="module-title"><span>',
            'after_title'   => '</span></h3>'
        );

        $id = 0;
        $sidebars = array(
            'maniva-meetup'."-sidebar-right"            =>  array("Display sidebar on all page","Sidebar Right"),
            'maniva-meetup'."-sidebar-template-home"    =>  array("Display sidebar on template home","Sidebar Template Home"),

            //HomePage
            'maniva-meetup'."-footer-one-column-center" =>  array("Display footer one column center","Footer One Column Center"),
            'maniva-meetup-footer-multi-column-1'    =>  array("Display footer multi column 1","Footer Multi Column 1"),
            'maniva-meetup-footer-multi-column-2'    =>  array("Display footer multi column 2","Footer Multi Column 2"),
            'maniva-meetup-footer-multi-column-3'    =>  array("Display footer multi column 3","Footer Multi Column 3"),
            'maniva-meetup-footer-multi-column-4'    =>  array("Display footer multi column 4","Footer Multi Column 4"),
            'maniva-meetup-footer-single'            =>  array("Display footer single","Footer Single"),

            // Sidebar archive product
            'maniva-meetup-sidebar-shop-product'    =>  array("Display sidebar top page shop","Sidebar Top Page Shop"),

            'maniva-meetup-archive-product-column-1'   =>  array("Display archive product column 1","Archive Product Column 1"),
            'maniva-meetup-archive-product-column-2'   =>  array("Display archive product column 2","Archive Product Column 2"),
            'maniva-meetup-archive-product-column-3'   =>  array("Display archive product column 3","Archive Product Column 3"),
            'maniva-meetup-archive-product-column-4'   =>  array("Display archive product column 4","Archive Product Column 4"),

            // Sidebar Shop Detail
            'maniva-meetup-sidebar-shop-detail'     =>  array("Display sidebar shop detail","Sidebar Shop Detail"),

            //Shop
            'maniva-meetup'."-footer-shop-multi-column-1"   =>  array("Display footer shop multi column 1","Footer Shop Multi Column 1"),
            'maniva-meetup'."-footer-shop-multi-column-2"   =>  array("Display footer shop multi column 2","Footer Shop Multi Column 2"),
            'maniva-meetup'."-footer-shop-multi-column-3"   =>  array("Display footer shop multi column 3","Footer Shop Multi Column 3"),
            'maniva-meetup'."-footer-shop-multi-column-4"   =>  array("Display footer shop multi column 4","Footer Shop Multi Column 4"),
            'maniva-meetup'."-footer-shop-multi-column-5"   =>  array("Display footer shop multi column 5","Footer Shop Multi Column 5"),
            'maniva-meetup'."-footer-shop-bottom"           =>  array("Display footer shop bottom","Footer Shop bottom"),

        );
        foreach ($sidebars as $key=>$value) {
            $sidebar_attr['id'] = $key;
            $sidebar_attr['description']=$value[0];
            $sidebar_attr['name'] = $value[1];
            register_sidebar($sidebar_attr);
        }
    }
}