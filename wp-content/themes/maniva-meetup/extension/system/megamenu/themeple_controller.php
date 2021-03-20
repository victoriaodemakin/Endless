<?php


if(! class_exists('maniva_meetup_controller')){

    /**
     * themeple_controller
     *
     * @package
     * @author roshi
     * @copyright roshi[www.themeforest.net/user/roshi]
     * @version 2012
     * @access public
     */
    class maniva_meetup_controller extends maniva_meetup_custom_menu {

        var $base_data;
        var $db_options_prefix;
        var $admin_pages = array();
        var $page_elements = array();
        var $subs = array();
        var $options = array();
        var $current;
        /**
         * themeple_controller::themeple_controller()
         *
         * @param mixed $base_data
         * @return
         */
        function maniva_meetup_controller_frontend( $base_data ){

            parent::maniva_meetup_custom_menu_frontend();

        }

    }


}



?>