<?php
/*
 * Initialize the options before anything else.
 */

add_action('admin_init', 'maniva_meetup_theme_options', 1);

/*
 * Build the custom settings & update OptionTree.
*/


function maniva_meetup_theme_options()
{

    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option('option_tree_settings', array());

    // Pattern
    $patterns = array();
    if ($dir = opendir(get_template_directory() . '/images/patterns/')) {
        while (false !== ($file = readdir($dir))) {
            if ($file != '..' && $file != '.') {
                $patterns[] = array(
                    'value' => trim($file),
                    'label' => 'Click on pattern to preview',
                    'src' => get_template_directory_uri() . '/images/patterns/' . $file, 40, 40, true
                );
            }
        }
        // Close directory handle
        closedir($dir);
    }
    $logo_default = get_template_directory_uri() . '/images/logo-2.png';
    $logo_default_event = get_template_directory_uri() . '/images/logo-header-3.png';
    $image_backtop_default = get_template_directory_uri() . '/images/back_top_meetup.png';
    $background_img_footer = get_template_directory_uri() . '/images/bg_image_footer.png';
    $background_img_subscribe = get_template_directory_uri() . '/images/bg_image_subscribe.png';

    $menus = get_terms('nav_menu', array('hide_empty' => true));
    global $menuArray1;
    $menuArray1 = array(
        array(
            'value' => '',
            'label' => __('None', 'maniva-meetup'),
        ),
    );
    foreach ($menus as $menu) {
        $menuArray1[$menu->name] =
            array(
                'value' => $menu->name,
                'label' => $menu->name,
            );


    }

    $maniva_meetup_font_option = array(
        array(
            'value' => 'ABeeZee',
            'label' => esc_html__('ABeeZee', 'maniva-meetup'),
        ),
        array(
            'value' => 'Abel',
            'label' => esc_html__('Abel', 'maniva-meetup'),
        ),
        array(
            'value' => 'Abril Fatface',
            'label' => esc_html__('Abril Fatface', 'maniva-meetup'),
        ),
        array(
            'value' => 'Aclonica',
            'label' => esc_html__('Aclonica', 'maniva-meetup'),
        ),
        array(
            'value' => 'Acme',
            'label' => esc_html__('Acme', 'maniva-meetup'),
        ),
        array(
            'value' => 'Actor',
            'label' => esc_html__('Actor', 'maniva-meetup'),
        ),
        array(
            'value' => 'Adamina',
            'label' => esc_html__('Adamina', 'maniva-meetup'),
        ),
        array(
            'value' => 'Advent Pro',
            'label' => esc_html__('Advent Pro', 'maniva-meetup'),
        ),
        array(
            'value' => 'Aguafina Script',
            'label' => esc_html__('Aguafina Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Akronim',
            'label' => esc_html__('Akronim', 'maniva-meetup'),
        ),
        array(
            'value' => 'Aladin',
            'label' => esc_html__('Aladin', 'maniva-meetup'),
        ),
        array(
            'value' => 'Aldrich',
            'label' => esc_html__('Aldrich', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alef',
            'label' => esc_html__('Alef', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alegreya',
            'label' => esc_html__('Alegreya', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alegreya SC',
            'label' => esc_html__('Alegreya SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alegreya Sans',
            'label' => esc_html__('Alegreya Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alegreya Sans SC',
            'label' => esc_html__('Alegreya Sans SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alex Brush',
            'label' => esc_html__('Alex Brush', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alfa Slab One',
            'label' => esc_html__('Alfa Slab One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alice',
            'label' => esc_html__('Alice', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alike',
            'label' => esc_html__('Alike', 'maniva-meetup'),
        ),
        array(
            'value' => 'Alike Angular',
            'label' => esc_html__('Alike Angular', 'maniva-meetup'),
        ),
        array(
            'value' => 'Allan',
            'label' => esc_html__('Allan', 'maniva-meetup'),
        ),
        array(
            'value' => 'Allerta',
            'label' => esc_html__('Allerta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Allerta Stencil',
            'label' => esc_html__('Allerta Stencil', 'maniva-meetup'),
        ),
        array(
            'value' => 'Allura',
            'label' => esc_html__('Allura', 'maniva-meetup'),
        ),
        array(
            'value' => 'Almendra',
            'label' => esc_html__('Almendra', 'maniva-meetup'),
        ),
        array(
            'value' => 'Almendra Display',
            'label' => esc_html__('Almendra Display', 'maniva-meetup'),
        ),
        array(
            'value' => 'Almendra SC',
            'label' => esc_html__('Almendra SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Amarante',
            'label' => esc_html__('Amarante', 'maniva-meetup'),
        ),
        array(
            'value' => 'Amaranth',
            'label' => esc_html__('Amaranth', 'maniva-meetup'),
        ),
        array(
            'value' => 'Amatic SC',
            'label' => esc_html__('Amatic SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Amethysta',
            'label' => esc_html__('Amethysta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Anaheim',
            'label' => esc_html__('Anaheim', 'maniva-meetup'),
        ),
        array(
            'value' => 'Andada',
            'label' => esc_html__('Andada', 'maniva-meetup'),
        ),
        array(
            'value' => 'Andika',
            'label' => esc_html__('Andika', 'maniva-meetup'),
        ),
        array(
            'value' => 'Angkor',
            'label' => esc_html__('Angkor', 'maniva-meetup'),
        ),
        array(
            'value' => 'Annie Use Your Telescope',
            'label' => esc_html__('Annie Use Your Telescope', 'maniva-meetup'),
        ),
        array(
            'value' => 'Anonymous Pro',
            'label' => esc_html__('Anonymous Pro', 'maniva-meetup'),
        ),
        array(
            'value' => 'Antic',
            'label' => esc_html__('Antic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Antic Didone',
            'label' => esc_html__('Antic Didone', 'maniva-meetup'),
        ),
        array(
            'value' => 'Antic Slab',
            'label' => esc_html__('Antic Slab', 'maniva-meetup'),
        ),
        array(
            'value' => 'Anton',
            'label' => esc_html__('Anton', 'maniva-meetup'),
        ),
        array(
            'value' => 'Arapey',
            'label' => esc_html__('Arapey', 'maniva-meetup'),
        ),
        array(
            'value' => 'Arbutus',
            'label' => esc_html__('Arbutus', 'maniva-meetup'),
        ),
        array(
            'value' => 'Arbutus Slab',
            'label' => esc_html__('Arbutus Slab', 'maniva-meetup'),
        ),
        array(
            'value' => 'Architects Daughter',
            'label' => esc_html__('Architects Daughter', 'maniva-meetup'),
        ),
        array(
            'value' => 'Archivo Black',
            'label' => esc_html__('Archivo Black', 'maniva-meetup'),
        ),
        array(
            'value' => 'Archivo Narrow',
            'label' => esc_html__('Archivo Narrow', 'maniva-meetup'),
        ),
        array(
            'value' => 'Arimo',
            'label' => esc_html__('Arimo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Arizonia',
            'label' => esc_html__('Arizonia', 'maniva-meetup'),
        ),
        array(
            'value' => 'Armata',
            'label' => esc_html__('Armata', 'maniva-meetup'),
        ),
        array(
            'value' => 'Artifika',
            'label' => esc_html__('Artifika', 'maniva-meetup'),
        ),
        array(
            'value' => 'Arvo',
            'label' => esc_html__('Arvo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Asap',
            'label' => esc_html__('Asap', 'maniva-meetup'),
        ),
        array(
            'value' => 'Asset',
            'label' => esc_html__('Asset', 'maniva-meetup'),
        ),
        array(
            'value' => 'Astloch',
            'label' => esc_html__('Astloch', 'maniva-meetup'),
        ),
        array(
            'value' => 'Asul',
            'label' => esc_html__('Asul', 'maniva-meetup'),
        ),
        array(
            'value' => 'Atomic Age',
            'label' => esc_html__('Atomic Age', 'maniva-meetup'),
        ),
        array(
            'value' => 'Aubrey',
            'label' => esc_html__('Aubrey', 'maniva-meetup'),
        ),
        array(
            'value' => 'Audiowide',
            'label' => esc_html__('Audiowide', 'maniva-meetup'),
        ),
        array(
            'value' => 'Autour One',
            'label' => esc_html__('Autour One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Average',
            'label' => esc_html__('Average', 'maniva-meetup'),
        ),
        array(
            'value' => 'Average Sans',
            'label' => esc_html__('Average Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Averia Gruesa Libre',
            'label' => esc_html__('Averia Gruesa Libre', 'maniva-meetup'),
        ),
        array(
            'value' => 'Averia Libre',
            'label' => esc_html__('Averia Libre', 'maniva-meetup'),
        ),
        array(
            'value' => 'Averia Sans Libre',
            'label' => esc_html__('Averia Sans Libre', 'maniva-meetup'),
        ),
        array(
            'value' => 'Averia Serif Libre',
            'label' => esc_html__('Averia Serif Libre', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bad Script',
            'label' => esc_html__('Bad Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Balthazar',
            'label' => esc_html__('Balthazar', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bangers',
            'label' => esc_html__('Bangers', 'maniva-meetup'),
        ),
        array(
            'value' => 'Basic',
            'label' => esc_html__('Basic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Battambang',
            'label' => esc_html__('Battambang', 'maniva-meetup'),
        ),
        array(
            'value' => 'Baumans',
            'label' => esc_html__('Baumans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bayont',
            'label' => esc_html__('Bayon', 'maniva-meetup'),
        ),
        array(
            'value' => 'Belgrano',
            'label' => esc_html__('Belgrano', 'maniva-meetup'),
        ),
        array(
            'value' => 'Belleza',
            'label' => esc_html__('Belleza', 'maniva-meetup'),
        ),
        array(
            'value' => 'BenchNine',
            'label' => esc_html__('BenchNine', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bentham',
            'label' => esc_html__('Bentham', 'maniva-meetup'),
        ),
        array(
            'value' => 'Berkshire Swash',
            'label' => esc_html__('Berkshire Swash', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bevan',
            'label' => esc_html__('Bevan', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bigelow Rules',
            'label' => esc_html__('Bigelow Rules', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bigshot One',
            'label' => esc_html__('Bigshot One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bilbo',
            'label' => esc_html__('Bilbo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bilbo Swash Caps',
            'label' => esc_html__('Bilbo Swash Caps', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bitter',
            'label' => esc_html__('Bitter', 'maniva-meetup'),
        ),
        array(
            'value' => 'Black Ops One',
            'label' => esc_html__('Black Ops One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bokor',
            'label' => esc_html__('Bokor', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bonbon',
            'label' => esc_html__('Bonbon', 'maniva-meetup'),
        ),
        array(
            'value' => 'Boogaloo',
            'label' => esc_html__('Boogaloo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bowlby One',
            'label' => esc_html__('Bowlby One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bowlby One SC',
            'label' => esc_html__('Bowlby One SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Brawler',
            'label' => esc_html__('Brawler', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bree Serif',
            'label' => esc_html__('Bree Serif', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bubblegum Sans',
            'label' => esc_html__('Bubblegum Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Bubbler One',
            'label' => esc_html__('Bubbler One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Buda',
            'label' => esc_html__('Buda', 'maniva-meetup'),
        ),
        array(
            'value' => 'Buenard',
            'label' => esc_html__('Buenard', 'maniva-meetup'),
        ),
        array(
            'value' => 'Butcherman',
            'label' => esc_html__('Butcherman', 'maniva-meetup'),
        ),
        array(
            'value' => 'Butterfly Kids',
            'label' => esc_html__('Butterfly Kids', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cabin',
            'label' => esc_html__('Cabin', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cabin Condensed',
            'label' => esc_html__('Cabin Condensed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cabin Sketch',
            'label' => esc_html__('Cabin Sketch', 'maniva-meetup'),
        ),
        array(
            'value' => 'Caesar Dressing',
            'label' => esc_html__('Caesar Dressing', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cagliostro',
            'label' => esc_html__('Cagliostro', 'maniva-meetup'),
        ),
        array(
            'value' => 'Calligraffitti',
            'label' => esc_html__('Calligraffitti', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cambo',
            'label' => esc_html__('Cambo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Candal',
            'label' => esc_html__('Candal', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cantarell',
            'label' => esc_html__('Cantarell', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cantata One',
            'label' => esc_html__('Cantata One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cantora One',
            'label' => esc_html__('Cantora One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Capriola',
            'label' => esc_html__('Capriola', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cardo',
            'label' => esc_html__('Cardo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Carme',
            'label' => esc_html__('Carme', 'maniva-meetup'),
        ),
        array(
            'value' => 'Carrois Gothic',
            'label' => esc_html__('Carrois Gothic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Carrois Gothic SC',
            'label' => esc_html__('Carrois Gothic SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Carter One',
            'label' => esc_html__('Carter One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Caudex',
            'label' => esc_html__('Caudex', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cedarville Cursive',
            'label' => esc_html__('Cedarville Cursive', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ceviche One',
            'label' => esc_html__('Ceviche One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Changa One',
            'label' => esc_html__('Changa One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chango',
            'label' => esc_html__('Chango', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chau Philomene One',
            'label' => esc_html__('Chau Philomene One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chela One',
            'label' => esc_html__('Chela One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chelsea Market',
            'label' => esc_html__('Chelsea Market', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chenla',
            'label' => esc_html__('Chenla', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cherry Cream Soda',
            'label' => esc_html__('Cherry Cream Soda', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cherry Swash',
            'label' => esc_html__('Cherry Swash', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chewy',
            'label' => esc_html__('Chewy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chicle',
            'label' => esc_html__('Chicle', 'maniva-meetup'),
        ),
        array(
            'value' => 'Chivo',
            'label' => esc_html__('Chivo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cinzel',
            'label' => esc_html__('Cinzel', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cinzel Decorative',
            'label' => esc_html__('Cinzel Decorative', 'maniva-meetup'),
        ),
        array(
            'value' => 'Clicker Script',
            'label' => esc_html__('Clicker Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Coda',
            'label' => esc_html__('Coda', 'maniva-meetup'),
        ),
        array(
            'value' => 'Coda Caption',
            'label' => esc_html__('Coda Caption', 'maniva-meetup'),
        ),
        array(
            'value' => 'Codystar',
            'label' => esc_html__('Codystar', 'maniva-meetup'),
        ),
        array(
            'value' => 'Combo',
            'label' => esc_html__('Combo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Comfortaa',
            'label' => esc_html__('Comfortaa', 'maniva-meetup'),
        ),
        array(
            'value' => 'Coming Soon',
            'label' => esc_html__('Coming Soon', 'maniva-meetup'),
        ),
        array(
            'value' => 'Concert One',
            'label' => esc_html__('Concert One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Condiment',
            'label' => esc_html__('Condiment', 'maniva-meetup'),
        ),
        array(
            'value' => 'Content',
            'label' => esc_html__('Content', 'maniva-meetup'),
        ),
        array(
            'value' => 'Contrail One',
            'label' => esc_html__('Contrail One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Convergence',
            'label' => esc_html__('Convergence', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cookie',
            'label' => esc_html__('Cookie', 'maniva-meetup'),
        ),
        array(
            'value' => 'Copse',
            'label' => esc_html__('Copse', 'maniva-meetup'),
        ),
        array(
            'value' => 'Corben',
            'label' => esc_html__('Corben', 'maniva-meetup'),
        ),
        array(
            'value' => 'Courgette',
            'label' => esc_html__('Courgette', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cousine',
            'label' => esc_html__('Cousine', 'maniva-meetup'),
        ),
        array(
            'value' => 'Coustard',
            'label' => esc_html__('Coustard', 'maniva-meetup'),
        ),
        array(
            'value' => 'Covered By Your Grace',
            'label' => esc_html__('Covered By Your Grace', 'maniva-meetup'),
        ),
        array(
            'value' => 'Crafty Girls',
            'label' => esc_html__('Crafty Girls', 'maniva-meetup'),
        ),
        array(
            'value' => 'Creepster',
            'label' => esc_html__('Creepster', 'maniva-meetup'),
        ),
        array(
            'value' => 'Crete Round',
            'label' => esc_html__('Crete Round', 'maniva-meetup'),
        ),
        array(
            'value' => 'Crimson Text',
            'label' => esc_html__('Crimson Text', 'maniva-meetup'),
        ),
        array(
            'value' => 'Croissant One',
            'label' => esc_html__('Croissant One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Crushed',
            'label' => esc_html__('Crushed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cuprum',
            'label' => esc_html__('Cuprum', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cutive',
            'label' => esc_html__('Cutive', 'maniva-meetup'),
        ),
        array(
            'value' => 'Cutive Mono',
            'label' => esc_html__('Cutive Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Damion',
            'label' => esc_html__('Damion', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dancing Script',
            'label' => esc_html__('Dancing Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dangrek',
            'label' => esc_html__('Dangrek', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dawning of a New Day',
            'label' => esc_html__('Dawning of a New Day', 'maniva-meetup'),
        ),
        array(
            'value' => 'Days One',
            'label' => esc_html__('Days One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Delius',
            'label' => esc_html__('Delius', 'maniva-meetup'),
        ),
        array(
            'value' => 'Delius Swash Caps',
            'label' => esc_html__('Delius Swash Caps', 'maniva-meetup'),
        ),
        array(
            'value' => 'Delius Unicase',
            'label' => esc_html__('Delius Unicase', 'maniva-meetup'),
        ),
        array(
            'value' => 'Denk One',
            'label' => esc_html__('Denk One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Devonshire',
            'label' => esc_html__('Devonshire', 'maniva-meetup'),
        ),
        array(
            'value' => 'Didact Gothic',
            'label' => esc_html__('Didact Gothic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Diplomata',
            'label' => esc_html__('Diplomata', 'maniva-meetup'),
        ),
        array(
            'value' => 'Diplomata SC',
            'label' => esc_html__('Diplomata SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Domine',
            'label' => esc_html__('Domine', 'maniva-meetup'),
        ),
        array(
            'value' => 'Donegal One',
            'label' => esc_html__('Donegal One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Doppio One',
            'label' => esc_html__('Doppio One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dorsa',
            'label' => esc_html__('Dorsa', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dosis',
            'label' => esc_html__('Dosis', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dr Sugiyama',
            'label' => esc_html__('Dr Sugiyama', 'maniva-meetup'),
        ),
        array(
            'value' => 'Droid Sans',
            'label' => esc_html__('Droid Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Droid Sans Mono',
            'label' => esc_html__('Droid Sans Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Droid Serif',
            'label' => esc_html__('Droid Serif', 'maniva-meetup'),
        ),
        array(
            'value' => 'Duru Sans',
            'label' => esc_html__('Duru Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Dynalight',
            'label' => esc_html__('Dynalight', 'maniva-meetup'),
        ),
        array(
            'value' => 'EB Garamond',
            'label' => esc_html__('EB Garamond', 'maniva-meetup'),
        ),
        array(
            'value' => 'Eagle Lake',
            'label' => esc_html__('Eagle Lake', 'maniva-meetup'),
        ),
        array(
            'value' => 'Eater',
            'label' => esc_html__('Eater', 'maniva-meetup'),
        ),
        array(
            'value' => 'Economica',
            'label' => esc_html__('Economica', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ek Mukta',
            'label' => esc_html__('Ek Mukta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Electrolize',
            'label' => esc_html__('Electrolize', 'maniva-meetup'),
        ),
        array(
            'value' => 'Elsie',
            'label' => esc_html__('Elsie', 'maniva-meetup'),
        ),
        array(
            'value' => 'Elsie Swash Caps',
            'label' => esc_html__('Elsie Swash Caps', 'maniva-meetup'),
        ),
        array(
            'value' => 'Emblema One',
            'label' => esc_html__('Emblema One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Emilys Candy',
            'label' => esc_html__('Emilys Candy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Engagement',
            'label' => esc_html__('Engagement', 'maniva-meetup'),
        ),
        array(
            'value' => 'Englebert',
            'label' => esc_html__('Englebert', 'maniva-meetup'),
        ),
        array(
            'value' => 'Enriqueta',
            'label' => esc_html__('Enriqueta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Erica One',
            'label' => esc_html__('Erica One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Esteban',
            'label' => esc_html__('Esteban', 'maniva-meetup'),
        ),
        array(
            'value' => 'Euphoria Script',
            'label' => esc_html__('Euphoria Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ewert',
            'label' => esc_html__('Ewert', 'maniva-meetup'),
        ),
        array(
            'value' => 'Exo',
            'label' => esc_html__('Exo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Exo 2',
            'label' => esc_html__('Exo 2', 'maniva-meetup'),
        ),
        array(
            'value' => 'Expletus Sans',
            'label' => esc_html__('Expletus Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fanwood Text',
            'label' => esc_html__('Fanwood Text', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fascinate',
            'label' => esc_html__('Fascinate', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fascinate Inline',
            'label' => esc_html__('Fascinate Inline', 'maniva-meetup'),
        ),
        array(
            'value' => 'Faster One',
            'label' => esc_html__('Faster One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fasthand',
            'label' => esc_html__('Fasthand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fauna One',
            'label' => esc_html__('Fauna One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Federant',
            'label' => esc_html__('Federant', 'maniva-meetup'),
        ),
        array(
            'value' => 'Federo',
            'label' => esc_html__('Federo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Felipa',
            'label' => esc_html__('Felipa', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fenix',
            'label' => esc_html__('Fenix', 'maniva-meetup'),
        ),
        array(
            'value' => 'Finger Paint',
            'label' => esc_html__('Finger Paint', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fira Mono',
            'label' => esc_html__('Fira Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fira Sans',
            'label' => esc_html__('Fira Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fjalla One',
            'label' => esc_html__('Fjalla One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fjord One',
            'label' => esc_html__('Fjord One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Flamenco',
            'label' => esc_html__('Flamenco', 'maniva-meetup'),
        ),
        array(
            'value' => 'Flavors',
            'label' => esc_html__('Flavors', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fondamento',
            'label' => esc_html__('Fondamento', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fontdiner Swanky',
            'label' => esc_html__('Fontdiner Swanky', 'maniva-meetup'),
        ),
        array(
            'value' => 'Forum',
            'label' => esc_html__('Forum', 'maniva-meetup'),
        ),
        array(
            'value' => 'Francois One',
            'label' => esc_html__('Francois One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Freckle Face',
            'label' => esc_html__('Freckle Face', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fredericka the Great',
            'label' => esc_html__('Fredericka the Great', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fredoka One',
            'label' => esc_html__('Fredoka One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Freehand',
            'label' => esc_html__('Freehand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fresca',
            'label' => esc_html__('Fresca', 'maniva-meetup'),
        ),
        array(
            'value' => 'Frijole',
            'label' => esc_html__('Frijole', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fruktur',
            'label' => esc_html__('Fruktur', 'maniva-meetup'),
        ),
        array(
            'value' => 'Fugaz One',
            'label' => esc_html__('Fugaz One', 'maniva-meetup'),
        ),
        array(
            'value' => 'GFS Didot',
            'label' => esc_html__('GFS Didot', 'maniva-meetup'),
        ),
        array(
            'value' => 'GFS Neohellenic',
            'label' => esc_html__('GFS Neohellenic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gabriela',
            'label' => esc_html__('Gabriela', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gafata',
            'label' => esc_html__('Gafata', 'maniva-meetup'),
        ),
        array(
            'value' => 'Galdeano',
            'label' => esc_html__('Galdeano', 'maniva-meetup'),
        ),
        array(
            'value' => 'Galindo',
            'label' => esc_html__('Galindo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gentium Basic',
            'label' => esc_html__('Gentium Basic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gentium Book Basic',
            'label' => esc_html__('Gentium Book Basic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Geo',
            'label' => esc_html__('Geo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Geostar',
            'label' => esc_html__('Geostar', 'maniva-meetup'),
        ),
        array(
            'value' => 'Geostar Fill',
            'label' => esc_html__('Geostar Fill', 'maniva-meetup'),
        ),
        array(
            'value' => 'Germania One',
            'label' => esc_html__('Germania One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gilda Display',
            'label' => esc_html__('Gilda Display', 'maniva-meetup'),
        ),
        array(
            'value' => 'Give You Glory',
            'label' => esc_html__('Give You Glory', 'maniva-meetup'),
        ),
        array(
            'value' => 'Glass Antiqua',
            'label' => esc_html__('Glass Antiqua', 'maniva-meetup'),
        ),
        array(
            'value' => 'Glegoo',
            'label' => esc_html__('Glegoo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gloria Hallelujah',
            'label' => esc_html__('Gloria Hallelujah', 'maniva-meetup'),
        ),
        array(
            'value' => 'Goblin One',
            'label' => esc_html__('Goblin One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gochi Hand',
            'label' => esc_html__('Gochi Hand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gorditas',
            'label' => esc_html__('Gorditas', 'maniva-meetup'),
        ),
        array(
            'value' => 'Goudy Bookletter 1911',
            'label' => esc_html__('Goudy Bookletter 1911', 'maniva-meetup'),
        ),
        array(
            'value' => 'Graduate',
            'label' => esc_html__('Graduate', 'maniva-meetup'),
        ),
        array(
            'value' => 'Grand Hotel',
            'label' => esc_html__('Grand Hotel', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gravitas One',
            'label' => esc_html__('Goblin One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Great Vibes',
            'label' => esc_html__('Great Vibes', 'maniva-meetup'),
        ),
        array(
            'value' => 'Griffy',
            'label' => esc_html__('Griffy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gruppo',
            'label' => esc_html__('Gruppo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Gudea',
            'label' => esc_html__('Gudea', 'maniva-meetup'),
        ),
        array(
            'value' => 'Habibi',
            'label' => esc_html__('Habibi', 'maniva-meetup'),
        ),
        array(
            'value' => 'Halant',
            'label' => esc_html__('Halant', 'maniva-meetup'),
        ),
        array(
            'value' => 'Hammersmith One',
            'label' => esc_html__('Hammersmith One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Hanalei',
            'label' => esc_html__('Hanalei', 'maniva-meetup'),
        ),
        array(
            'value' => 'Hanalei Fill',
            'label' => esc_html__('Hanalei Fill', 'maniva-meetup'),
        ),
        array(
            'value' => 'Handlee',
            'label' => esc_html__('Handlee', 'maniva-meetup'),
        ),
        array(
            'value' => 'Hanuman',
            'label' => esc_html__('Hanuman', 'maniva-meetup'),
        ),
        array(
            'value' => 'Happy Monkey',
            'label' => esc_html__('Happy Monkey', 'maniva-meetup'),
        ),
        array(
            'value' => 'Headland One',
            'label' => esc_html__('Headland One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Henny Penny',
            'label' => esc_html__('Henny Penny', 'maniva-meetup'),
        ),
        array(
            'value' => 'Herr Von Muellerhoff',
            'label' => esc_html__('Herr Von Muellerhoff', 'maniva-meetup'),
        ),
        array(
            'value' => 'Hind',
            'label' => esc_html__('Hind', 'maniva-meetup'),
        ),
        array(
            'value' => 'Holtwood One SC',
            'label' => esc_html__('Holtwood One SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Homemade Apple',
            'label' => esc_html__('Homemade Apple', 'maniva-meetup'),
        ),
        array(
            'value' => 'Homenaje',
            'label' => esc_html__('Homenaje', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell DW Pica',
            'label' => esc_html__('IM Fell DW Pica', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell DW Pica SC',
            'label' => esc_html__('IM Fell DW Pica SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell Double Pica',
            'label' => esc_html__('IM Fell Double Pica', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell Double Pica SC',
            'label' => esc_html__('IM Fell Double Pica SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell English',
            'label' => esc_html__('IM Fell English', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell English SC',
            'label' => esc_html__('IM Fell English SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell French Canon',
            'label' => esc_html__('IM Fell French Canon', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell French Canon SC',
            'label' => esc_html__('IM Fell French Canon SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell Great Primer',
            'label' => esc_html__('IM Fell Great Primer', 'maniva-meetup'),
        ),
        array(
            'value' => 'IM Fell Great Primer SC',
            'label' => esc_html__('IM Fell Great Primer SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Iceberg',
            'label' => esc_html__('Iceberg', 'maniva-meetup'),
        ),
        array(
            'value' => 'Iceland',
            'label' => esc_html__('Iceland', 'maniva-meetup'),
        ),
        array(
            'value' => 'Imprima',
            'label' => esc_html__('Imprima', 'maniva-meetup'),
        ),
        array(
            'value' => 'Inconsolata',
            'label' => esc_html__('Inconsolata', 'maniva-meetup'),
        ),
        array(
            'value' => 'Inder',
            'label' => esc_html__('Inder', 'maniva-meetup'),
        ),
        array(
            'value' => 'Indie Flower',
            'label' => esc_html__('Indie Flower', 'maniva-meetup'),
        ),
        array(
            'value' => 'Inika',
            'label' => esc_html__('Inika', 'maniva-meetup'),
        ),
        array(
            'value' => 'Irish Grover',
            'label' => esc_html__('Irish Grover', 'maniva-meetup'),
        ),
        array(
            'value' => 'Istok Web',
            'label' => esc_html__('Istok Web', 'maniva-meetup'),
        ),
        array(
            'value' => 'Italiana',
            'label' => esc_html__('Italiana', 'maniva-meetup'),
        ),
        array(
            'value' => 'Italianno',
            'label' => esc_html__('Italianno', 'maniva-meetup'),
        ),
        array(
            'value' => 'Jacques Francois',
            'label' => esc_html__('Jacques Francois', 'maniva-meetup'),
        ),
        array(
            'value' => 'Jacques Francois Shadow',
            'label' => esc_html__('Jacques Francois Shadow', 'maniva-meetup'),
        ),
        array(
            'value' => 'Jim Nightshade',
            'label' => esc_html__('Jim Nightshade', 'maniva-meetup'),
        ),
        array(
            'value' => 'Jockey One',
            'label' => esc_html__('Jockey One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Jolly Lodger',
            'label' => esc_html__('Jolly Lodger', 'maniva-meetup'),
        ),
        array(
            'value' => 'Josefin Sans',
            'label' => esc_html__('Josefin Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Josefin Slab',
            'label' => esc_html__('Josefin Slab', 'maniva-meetup'),
        ),
        array(
            'value' => 'Joti One',
            'label' => esc_html__('Joti One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Judson',
            'label' => esc_html__('Judson', 'maniva-meetup'),
        ),
        array(
            'value' => 'Julee',
            'label' => esc_html__('Julee', 'maniva-meetup'),
        ),
        array(
            'value' => 'Julius Sans One',
            'label' => esc_html__('Julius Sans One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Junge',
            'label' => esc_html__('Junge', 'maniva-meetup'),
        ),
        array(
            'value' => 'Jura',
            'label' => esc_html__('Jura', 'maniva-meetup'),
        ),
        array(
            'value' => 'Just Another Hand',
            'label' => esc_html__('Just Another Hand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Just Me Again Down Here',
            'label' => esc_html__('Just Me Again Down Here', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kalam',
            'label' => esc_html__('Kalam', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kameron',
            'label' => esc_html__('Kameron', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kantumruy',
            'label' => esc_html__('Kantumruy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Karla',
            'label' => esc_html__('Karla', 'maniva-meetup'),
        ),
        array(
            'value' => 'Karma',
            'label' => esc_html__('Karma', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kaushan Script',
            'label' => esc_html__('Kaushan Scriptd', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kavoon',
            'label' => esc_html__('Kavoon', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kdam Thmor',
            'label' => esc_html__('Kdam Thmor', 'maniva-meetup'),
        ),
        array(
            'value' => 'Keania One',
            'label' => esc_html__('Keania One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kelly Slab',
            'label' => esc_html__('Kelly Slab', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kenia',
            'label' => esc_html__('Kenia', 'maniva-meetup'),
        ),
        array(
            'value' => 'Khand',
            'label' => esc_html__('Khand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Khmer',
            'label' => esc_html__('Khmer', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kite One',
            'label' => esc_html__('Kite One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Knewave',
            'label' => esc_html__('Knewave', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kotta One',
            'label' => esc_html__('Kotta One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Koulen',
            'label' => esc_html__('Koulen', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kranky',
            'label' => esc_html__('Kranky', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kreon',
            'label' => esc_html__('Kreon', 'maniva-meetup'),
        ),
        array(
            'value' => 'Kristi',
            'label' => esc_html__('Kristi', 'maniva-meetup'),
        ),
        array(
            'value' => 'Krona One',
            'label' => esc_html__('Krona One', 'maniva-meetup'),
        ),
        array(
            'value' => 'La Belle Aurore',
            'label' => esc_html__('La Belle Aurore', 'maniva-meetup'),
        ),
        array(
            'value' => 'Laila',
            'label' => esc_html__('Laila', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lancelot',
            'label' => esc_html__('Lancelot', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lato',
            'label' => esc_html__('Lato', 'maniva-meetup'),
        ),
        array(
            'value' => 'League Script',
            'label' => esc_html__('League Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Leckerli One',
            'label' => esc_html__('Leckerli One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ledger',
            'label' => esc_html__('Ledger', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lekton',
            'label' => esc_html__('Lekton', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lemon',
            'label' => esc_html__('Lemon', 'maniva-meetup'),
        ),
        array(
            'value' => 'Libre Baskerville',
            'label' => esc_html__('Libre Baskerville', 'maniva-meetup'),
        ),
        array(
            'value' => 'Life Savers',
            'label' => esc_html__('Life Savers', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lilita One',
            'label' => esc_html__('Lilita One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lily Script One',
            'label' => esc_html__('Lily Script One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Limelight',
            'label' => esc_html__('Limelight', 'maniva-meetup'),
        ),
        array(
            'value' => 'Linden Hill',
            'label' => esc_html__('Linden Hill', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lobster',
            'label' => esc_html__('Lobster', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lobster Two',
            'label' => esc_html__('Lobster Two', 'maniva-meetup'),
        ),
        array(
            'value' => 'Londrina Outline',
            'label' => esc_html__('Londrina Outline', 'maniva-meetup'),
        ),
        array(
            'value' => 'Londrina Shadow',
            'label' => esc_html__('Londrina Shadow', 'maniva-meetup'),
        ),
        array(
            'value' => 'Londrina Sketch',
            'label' => esc_html__('Londrina Sketch', 'maniva-meetup'),
        ),
        array(
            'value' => 'Londrina Solid',
            'label' => esc_html__('Londrina Solid', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lora',
            'label' => esc_html__('Lora', 'maniva-meetup'),
        ),
        array(
            'value' => 'Love Ya Like A Sister',
            'label' => esc_html__('Love Ya Like A Sister', 'maniva-meetup'),
        ),
        array(
            'value' => 'Loved by the King',
            'label' => esc_html__('Loved by the King', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lovers Quarrel',
            'label' => esc_html__('Lovers Quarrel', 'maniva-meetup'),
        ),
        array(
            'value' => 'Luckiest Guy',
            'label' => esc_html__('Luckiest Guy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lusitana',
            'label' => esc_html__('Lusitana', 'maniva-meetup'),
        ),
        array(
            'value' => 'Lustria',
            'label' => esc_html__('Lustria', 'maniva-meetup'),
        ),
        array(
            'value' => 'Macondo',
            'label' => esc_html__('Macondo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Macondo Swash Caps',
            'label' => esc_html__('Macondo Swash Caps', 'maniva-meetup'),
        ),
        array(
            'value' => 'Magra',
            'label' => esc_html__('Magra', 'maniva-meetup'),
        ),
        array(
            'value' => 'Maiden Orange',
            'label' => esc_html__('Maiden Orange', 'maniva-meetup'),
        ),
        array(
            'value' => 'Marcellus',
            'label' => esc_html__('Marcellus', 'maniva-meetup'),
        ),
        array(
            'value' => 'Marcellus SC',
            'label' => esc_html__('Marcellus SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Marck Script',
            'label' => esc_html__('Marck Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Margarine',
            'label' => esc_html__('Margarine', 'maniva-meetup'),
        ),
        array(
            'value' => 'Marko One',
            'label' => esc_html__('Marko One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Marmelad',
            'label' => esc_html__('Marmelad', 'maniva-meetup'),
        ),
        array(
            'value' => 'Marvel',
            'label' => esc_html__('Marvel', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mate',
            'label' => esc_html__('Mate', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mate SC',
            'label' => esc_html__('Mate SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Maven Pro',
            'label' => esc_html__('Maven Pro', 'maniva-meetup'),
        ),
        array(
            'value' => 'McLaren',
            'label' => esc_html__('McLaren', 'maniva-meetup'),
        ),
        array(
            'value' => 'Meddon',
            'label' => esc_html__('Meddon', 'maniva-meetup'),
        ),
        array(
            'value' => 'MedievalSharp',
            'label' => esc_html__('MedievalSharp', 'maniva-meetup'),
        ),
        array(
            'value' => 'Medula One',
            'label' => esc_html__('Medula One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Megrim',
            'label' => esc_html__('Megrim', 'maniva-meetup'),
        ),
        array(
            'value' => 'Meie Script',
            'label' => esc_html__('Meie Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'League Script',
            'label' => esc_html__('League Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Merienda',
            'label' => esc_html__('Merienda', 'maniva-meetup'),
        ),
        array(
            'value' => 'Merienda One',
            'label' => esc_html__('Merienda One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Merriweather',
            'label' => esc_html__('Merriweather', 'maniva-meetup'),
        ),
        array(
            'value' => 'Merriweather Sans',
            'label' => esc_html__('Merriweather Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Metal',
            'label' => esc_html__('Metal', 'maniva-meetup'),
        ),
        array(
            'value' => 'Metal Mania',
            'label' => esc_html__('Metal Mania', 'maniva-meetup'),
        ),
        array(
            'value' => 'Metamorphous',
            'label' => esc_html__('Metamorphous', 'maniva-meetup'),
        ),
        array(
            'value' => 'Metrophobic',
            'label' => esc_html__('Metrophobic', 'maniva-meetup'),
        ),
        array(
            'value' => 'Michroma',
            'label' => esc_html__('Michroma', 'maniva-meetup'),
        ),
        array(
            'value' => 'Milonga',
            'label' => esc_html__('Milonga', 'maniva-meetup'),
        ),
        array(
            'value' => 'Miltonian',
            'label' => esc_html__('Miltonian', 'maniva-meetup'),
        ),
        array(
            'value' => 'Miltonian Tattoo',
            'label' => esc_html__('Miltonian Tattoo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Miniver',
            'label' => esc_html__('Miniver', 'maniva-meetup'),
        ),
        array(
            'value' => 'Miss Fajardose',
            'label' => esc_html__('Miss Fajardose', 'maniva-meetup'),
        ),
        array(
            'value' => 'Modern Antiqua',
            'label' => esc_html__('Modern Antiqua', 'maniva-meetup'),
        ),
        array(
            'value' => 'Molengo',
            'label' => esc_html__('Molengo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Molle',
            'label' => esc_html__('Molle', 'maniva-meetup'),
        ),
        array(
            'value' => 'Monda',
            'label' => esc_html__('Monda', 'maniva-meetup'),
        ),
        array(
            'value' => 'Monofett',
            'label' => esc_html__('Monofett', 'maniva-meetup'),
        ),
        array(
            'value' => 'Monoton',
            'label' => esc_html__('Monoton', 'maniva-meetup'),
        ),
        array(
            'value' => 'Monsieur La Doulaise',
            'label' => esc_html__('Monsieur La Doulaise', 'maniva-meetup'),
        ),
        array(
            'value' => 'Montaga',
            'label' => esc_html__('Montaga', 'maniva-meetup'),
        ),
        array(
            'value' => 'Montez',
            'label' => esc_html__('Montez', 'maniva-meetup'),
        ),
        array(
            'value' => 'Montserrat',
            'label' => esc_html__('Montserrat', 'maniva-meetup'),
        ),
        array(
            'value' => 'Montserrat Alternates',
            'label' => esc_html__('Montserrat Alternates', 'maniva-meetup'),
        ),
        array(
            'value' => 'Montserrat Subrayada',
            'label' => esc_html__('Montserrat Subrayada', 'maniva-meetup'),
        ),
        array(
            'value' => 'Moul',
            'label' => esc_html__('Moul', 'maniva-meetup'),
        ),
        array(
            'value' => 'Moulpali',
            'label' => esc_html__('Moulpali', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mountains of Christmas',
            'label' => esc_html__('Mountains of Christmas', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mouse Memoirs',
            'label' => esc_html__('Mouse Memoirs', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mr Bedfort',
            'label' => esc_html__('Mr Bedfort', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mr Dafoe',
            'label' => esc_html__('Mr Dafoe', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mr De Haviland',
            'label' => esc_html__('Mr De Haviland', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mrs Saint Delafield',
            'label' => esc_html__('Mrs Saint Delafield', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mrs Sheppards',
            'label' => esc_html__('Mrs Sheppards', 'maniva-meetup'),
        ),
        array(
            'value' => 'Muli',
            'label' => esc_html__('Muli', 'maniva-meetup'),
        ),
        array(
            'value' => 'Mystery Quest',
            'label' => esc_html__('Mystery Quest', 'maniva-meetup'),
        ),
        array(
            'value' => 'Neucha',
            'label' => esc_html__('Neucha', 'maniva-meetup'),
        ),
        array(
            'value' => 'Neuton',
            'label' => esc_html__('Neuton', 'maniva-meetup'),
        ),
        array(
            'value' => 'New Rocker',
            'label' => esc_html__('New Rocker', 'maniva-meetup'),
        ),
        array(
            'value' => 'News Cycle',
            'label' => esc_html__('News Cycle', 'maniva-meetup'),
        ),
        array(
            'value' => 'Niconne',
            'label' => esc_html__('Niconne', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nixie One',
            'label' => esc_html__('Nixie One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nobile',
            'label' => esc_html__('Nobile', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nokora',
            'label' => esc_html__('Nokora', 'maniva-meetup'),
        ),
        array(
            'value' => 'Norican',
            'label' => esc_html__('Norican', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nosifer',
            'label' => esc_html__('Nosifer', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nothing You Could Do',
            'label' => esc_html__('Nothing You Could Do', 'maniva-meetup'),
        ),
        array(
            'value' => 'Noticia Text',
            'label' => esc_html__('Noticia Text', 'maniva-meetup'),
        ),
        array(
            'value' => 'Noto Sans',
            'label' => esc_html__('Noto Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Noto Serif',
            'label' => esc_html__('Noto Serif', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Cut',
            'label' => esc_html__('Nova Cut', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Flat',
            'label' => esc_html__('Nova Flat', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Mono',
            'label' => esc_html__('Nova Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Oval',
            'label' => esc_html__('Nova Oval', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Round',
            'label' => esc_html__('Nova Round', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Script',
            'label' => esc_html__('Nova Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Slim',
            'label' => esc_html__('Nova Slim', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nova Square',
            'label' => esc_html__('Nova Square', 'maniva-meetup'),
        ),
        array(
            'value' => 'Numans',
            'label' => esc_html__('Numans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Nunito',
            'label' => esc_html__('Nunito', 'maniva-meetup'),
        ),
        array(
            'value' => 'Odor Mean Chey',
            'label' => esc_html__('Odor Mean Chey', 'maniva-meetup'),
        ),
        array(
            'value' => 'Offside',
            'label' => esc_html__('Offside', 'maniva-meetup'),
        ),
        array(
            'value' => 'Old Standard TT',
            'label' => esc_html__('Old Standard TT', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oldenburg',
            'label' => esc_html__('Oldenburg', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oleo Script',
            'label' => esc_html__('Oleo Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oleo Script Swash Caps',
            'label' => esc_html__('Oleo Script Swash Caps', 'maniva-meetup'),
        ),
        array(
            'value' => 'Open Sans',
            'label' => esc_html__('Open Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Open Sans Condensed',
            'label' => esc_html__('Open Sans Condensed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oranienbaum',
            'label' => esc_html__('Oranienbaum', 'maniva-meetup'),
        ),
        array(
            'value' => 'Orbitron',
            'label' => esc_html__('Orbitron', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oregano',
            'label' => esc_html__('Oregano', 'maniva-meetup'),
        ),
        array(
            'value' => 'Orienta',
            'label' => esc_html__('Orienta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Original Surfer',
            'label' => esc_html__('Original Surfer', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oswald',
            'label' => esc_html__('Oswald', 'maniva-meetup'),
        ),
        array(
            'value' => 'Over the Rainbow',
            'label' => esc_html__('Over the Rainbow', 'maniva-meetup'),
        ),
        array(
            'value' => 'Overlock',
            'label' => esc_html__('Overlock', 'maniva-meetup'),
        ),
        array(
            'value' => 'Overlock SC',
            'label' => esc_html__('Overlock SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ovo',
            'label' => esc_html__('Ovo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oxygen',
            'label' => esc_html__('Oxygen', 'maniva-meetup'),
        ),
        array(
            'value' => 'Oxygen Mono',
            'label' => esc_html__('Oxygen Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'PT Mono',
            'label' => esc_html__('PT Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'PT Sans',
            'label' => esc_html__('PT Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'PT Sans Caption',
            'label' => esc_html__('PT Sans Caption', 'maniva-meetup'),
        ),
        array(
            'value' => 'PT Sans Narrow',
            'label' => esc_html__('PT Sans Narrow', 'maniva-meetup'),
        ),
        array(
            'value' => 'PT Serif',
            'label' => esc_html__('PT Serif', 'maniva-meetup'),
        ),
        array(
            'value' => 'PT Serif Caption',
            'label' => esc_html__('PT Serif Caption', 'maniva-meetup'),
        ),
        array(
            'value' => 'Pacifico',
            'label' => esc_html__('Pacifico', 'maniva-meetup'),
        ),
        array(
            'value' => 'Paprika',
            'label' => esc_html__('Paprika', 'maniva-meetup'),
        ),
        array(
            'value' => 'Parisienne',
            'label' => esc_html__('Parisienne', 'maniva-meetup'),
        ),
        array(
            'value' => 'Passero One',
            'label' => esc_html__('Passero One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Passion One',
            'label' => esc_html__('Passion One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Pathway Gothic One',
            'label' => esc_html__('Pathway Gothic One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Patrick Hand',
            'label' => esc_html__('Patrick Hand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Patrick Hand SC',
            'label' => esc_html__('Patrick Hand SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Patua One',
            'label' => esc_html__('Patua One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Paytone One',
            'label' => esc_html__('Paytone One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Peralta',
            'label' => esc_html__('Peralta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Permanent Marker',
            'label' => esc_html__('Permanent Marker', 'maniva-meetup'),
        ),
        array(
            'value' => 'Petit Formal Script',
            'label' => esc_html__('Petit Formal Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Petrona',
            'label' => esc_html__('Petrona', 'maniva-meetup'),
        ),
        array(
            'value' => 'Philosopher',
            'label' => esc_html__('Philosopher', 'maniva-meetup'),
        ),
        array(
            'value' => 'Piedra',
            'label' => esc_html__('Piedra', 'maniva-meetup'),
        ),
        array(
            'value' => 'Pinyon Script',
            'label' => esc_html__('Pinyon Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Pirata One',
            'label' => esc_html__('Pirata One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Plaster',
            'label' => esc_html__('Plaster', 'maniva-meetup'),
        ),
        array(
            'value' => 'Play',
            'label' => esc_html__('Play', 'maniva-meetup'),
        ),
        array(
            'value' => 'Playball',
            'label' => esc_html__('Playball', 'maniva-meetup'),
        ),
        array(
            'value' => 'Playfair Display',
            'label' => esc_html__('Playfair Display', 'maniva-meetup'),
        ),
        array(
            'value' => 'Playfair Display SC',
            'label' => esc_html__('Playfair Display SC', 'maniva-meetup'),
        ),
        array(
            'value' => 'Podkova',
            'label' => esc_html__('Podkova', 'maniva-meetup'),
        ),
        array(
            'value' => 'Poiret One',
            'label' => esc_html__('Poiret One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Poller One',
            'label' => esc_html__('Poller One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Poly',
            'label' => esc_html__('Poly', 'maniva-meetup'),
        ),
        array(
            'value' => 'Pompiere',
            'label' => esc_html__('Pompiere', 'maniva-meetup'),
        ),
        array(
            'value' => 'Pontano Sans',
            'label' => esc_html__('Pontano Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Poppins',
            'label' => esc_html__('Poppins', 'maniva-meetup'),
        ),
        array(
            'value' => 'Port Lligat Sans',
            'label' => esc_html__('Port Lligat Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Port Lligat Slab',
            'label' => esc_html__('Port Lligat Slab', 'maniva-meetup'),
        ),
        array(
            'value' => 'Prata',
            'label' => esc_html__('Prata', 'maniva-meetup'),
        ),
        array(
            'value' => 'Preahvihear',
            'label' => esc_html__('Preahvihear', 'maniva-meetup'),
        ),
        array(
            'value' => 'Press Start 2P',
            'label' => esc_html__('Press Start 2P', 'maniva-meetup'),
        ),
        array(
            'value' => 'Princess Sofia',
            'label' => esc_html__('Princess Sofia', 'maniva-meetup'),
        ),
        array(
            'value' => 'Prociono',
            'label' => esc_html__('Prociono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Prosto One',
            'label' => esc_html__('Prosto One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Puritan',
            'label' => esc_html__('Puritan', 'maniva-meetup'),
        ),
        array(
            'value' => 'Purple Purse',
            'label' => esc_html__('Purple Purse', 'maniva-meetup'),
        ),
        array(
            'value' => 'Quando',
            'label' => esc_html__('Quando', 'maniva-meetup'),
        ),
        array(
            'value' => 'Quantico',
            'label' => esc_html__('Quantico', 'maniva-meetup'),
        ),
        array(
            'value' => 'Quattrocento',
            'label' => esc_html__('Quattrocento', 'maniva-meetup'),
        ),
        array(
            'value' => 'Quattrocento Sans',
            'label' => esc_html__('Quattrocento Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Questrial',
            'label' => esc_html__('Questrial', 'maniva-meetup'),
        ),
        array(
            'value' => 'Quicksand',
            'label' => esc_html__('Quicksand', 'maniva-meetup'),
        ),
        array(
            'value' => 'Quintessential',
            'label' => esc_html__('Quintessential', 'maniva-meetup'),
        ),
        array(
            'value' => 'Qwigley',
            'label' => esc_html__('Qwigley', 'maniva-meetup'),
        ),
        array(
            'value' => 'Racing Sans One',
            'label' => esc_html__('Racing Sans One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Radley',
            'label' => esc_html__('Radley', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rajdhani',
            'label' => esc_html__('Rajdhani', 'maniva-meetup'),
        ),
        array(
            'value' => 'Raleway',
            'label' => esc_html__('Raleway', 'maniva-meetup'),
        ),
        array(
            'value' => 'Raleway Dots',
            'label' => esc_html__('Raleway Dots', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rambla',
            'label' => esc_html__('Rambla', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rammetto One',
            'label' => esc_html__('Rammetto One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ranchers',
            'label' => esc_html__('Ranchers', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rancho',
            'label' => esc_html__('Rancho', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rationale',
            'label' => esc_html__('Rationale', 'maniva-meetup'),
        ),
        array(
            'value' => 'Redressed',
            'label' => esc_html__('Redressed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Reenie Beanie',
            'label' => esc_html__('Reenie Beanie', 'maniva-meetup'),
        ),
        array(
            'value' => 'Revalia',
            'label' => esc_html__('Revalia', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ribeye',
            'label' => esc_html__('Ribeye', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ribeye Marrow',
            'label' => esc_html__('Ribeye Marrow', 'maniva-meetup'),
        ),
        array(
            'value' => 'Righteous',
            'label' => esc_html__('Righteous', 'maniva-meetup'),
        ),
        array(
            'value' => 'Risque',
            'label' => esc_html__('Risque', 'maniva-meetup'),
        ),
        array(
            'value' => 'Roboto',
            'label' => esc_html__('Roboto', 'maniva-meetup'),
        ),
        array(
            'value' => 'Roboto Condensed',
            'label' => esc_html__('Roboto Condensed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Roboto Slab',
            'label' => esc_html__('Roboto Slab', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rochester',
            'label' => esc_html__('Rochester', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rock Salt',
            'label' => esc_html__('Rock Salt', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rokkitt',
            'label' => esc_html__('Rokkitt', 'maniva-meetup'),
        ),
        array(
            'value' => 'Romanesco',
            'label' => esc_html__('Romanesco', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ropa Sans',
            'label' => esc_html__('Ropa Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rosario',
            'label' => esc_html__('Rosario', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rosarivo',
            'label' => esc_html__('Rosarivo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rouge Script',
            'label' => esc_html__('Rouge Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rozha One',
            'label' => esc_html__('Rozha One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rubik Mono One',
            'label' => esc_html__('Rubik Mono One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rubik One',
            'label' => esc_html__('Rubik One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ruda',
            'label' => esc_html__('Ruda', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rufina',
            'label' => esc_html__('Rufina', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ruge Boogie',
            'label' => esc_html__('Ruge Boogie', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ruluko',
            'label' => esc_html__('Ruluko', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rum Raisin',
            'label' => esc_html__('Rum Raisin', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ruslan Display',
            'label' => esc_html__('Ruslan Display', 'maniva-meetup'),
        ),
        array(
            'value' => 'Russo One',
            'label' => esc_html__('Russo One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ruthie',
            'label' => esc_html__('Ruthie', 'maniva-meetup'),
        ),
        array(
            'value' => 'Rye',
            'label' => esc_html__('Rye', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sacramento',
            'label' => esc_html__('Sacramento', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sail',
            'label' => esc_html__('Sail', 'maniva-meetup'),
        ),
        array(
            'value' => 'Salsa',
            'label' => esc_html__('Salsa', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sanchez',
            'label' => esc_html__('Sanchez', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sancreek',
            'label' => esc_html__('Sancreek', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sansita One',
            'label' => esc_html__('Sansita One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sarina',
            'label' => esc_html__('Sarina', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sarpanch',
            'label' => esc_html__('Sarpanch', 'maniva-meetup'),
        ),
        array(
            'value' => 'Satisfy',
            'label' => esc_html__('Satisfy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Scada',
            'label' => esc_html__('Scada', 'maniva-meetup'),
        ),
        array(
            'value' => 'Schoolbell',
            'label' => esc_html__('Schoolbell', 'maniva-meetup'),
        ),
        array(
            'value' => 'Seaweed Script',
            'label' => esc_html__('Seaweed Script', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sevillana',
            'label' => esc_html__('Sevillana', 'maniva-meetup'),
        ),
        array(
            'value' => 'Seymour One',
            'label' => esc_html__('Seymour One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Shadows Into Light',
            'label' => esc_html__('Shadows Into Light', 'maniva-meetup'),
        ),
        array(
            'value' => 'Shadows Into Light Two',
            'label' => esc_html__('Shadows Into Light Two', 'maniva-meetup'),
        ),
        array(
            'value' => 'Shanti',
            'label' => esc_html__('Shanti', 'maniva-meetup'),
        ),
        array(
            'value' => 'Share',
            'label' => esc_html__('Share', 'maniva-meetup'),
        ),
        array(
            'value' => 'Share Tech',
            'label' => esc_html__('Share Tech', 'maniva-meetup'),
        ),
        array(
            'value' => 'Share Tech Mono',
            'label' => esc_html__('Share Tech Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Shojumaru',
            'label' => esc_html__('Shojumaru', 'maniva-meetup'),
        ),
        array(
            'value' => 'Short Stack',
            'label' => esc_html__('Short Stack', 'maniva-meetup'),
        ),
        array(
            'value' => 'Siemreap',
            'label' => esc_html__('Siemreap', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sigmar One',
            'label' => esc_html__('Sigmar One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Signika',
            'label' => esc_html__('Signika', 'maniva-meetup'),
        ),
        array(
            'value' => 'Signika Negative',
            'label' => esc_html__('Signika Negative', 'maniva-meetup'),
        ),
        array(
            'value' => 'Simonetta',
            'label' => esc_html__('Simonetta', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sintony',
            'label' => esc_html__('Sintony', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sirin Stencil',
            'label' => esc_html__('Sirin Stencil', 'maniva-meetup'),
        ),
        array(
            'value' => 'Six Caps',
            'label' => esc_html__('Six Caps', 'maniva-meetup'),
        ),
        array(
            'value' => 'Skranji',
            'label' => esc_html__('Skranji', 'maniva-meetup'),
        ),
        array(
            'value' => 'Slabo 13px',
            'label' => esc_html__('Slabo 13px', 'maniva-meetup'),
        ),
        array(
            'value' => 'Slabo 27px',
            'label' => esc_html__('Slabo 27px', 'maniva-meetup'),
        ),
        array(
            'value' => 'Slackey',
            'label' => esc_html__('Slackey', 'maniva-meetup'),
        ),
        array(
            'value' => 'Smokum',
            'label' => esc_html__('Smokum', 'maniva-meetup'),
        ),
        array(
            'value' => 'Smythe',
            'label' => esc_html__('Smythe', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sniglet',
            'label' => esc_html__('Sniglet', 'maniva-meetup'),
        ),
        array(
            'value' => 'Snippet',
            'label' => esc_html__('Snippet', 'maniva-meetup'),
        ),
        array(
            'value' => 'Snowburst One',
            'label' => esc_html__('Snowburst One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sofadi One',
            'label' => esc_html__('Sofadi One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sofia',
            'label' => esc_html__('Sofia', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sonsie One',
            'label' => esc_html__('Sonsie One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sorts Mill Goudy',
            'label' => esc_html__('Sorts Mill Goudy', 'maniva-meetup'),
        ),
        array(
            'value' => 'Source Code Pro',
            'label' => esc_html__('Source Code Pro', 'maniva-meetup'),
        ),
        array(
            'value' => 'Source Sans Pro',
            'label' => esc_html__('Source Sans Pro', 'maniva-meetup'),
        ),
        array(
            'value' => 'Source Serif Pro',
            'label' => esc_html__('Source Serif Pro', 'maniva-meetup'),
        ),
        array(
            'value' => 'Special Elite',
            'label' => esc_html__('Special Elite', 'maniva-meetup'),
        ),
        array(
            'value' => 'Spicy Rice',
            'label' => esc_html__('Spicy Rice', 'maniva-meetup'),
        ),
        array(
            'value' => 'Spinnaker',
            'label' => esc_html__('Spinnaker', 'maniva-meetup'),
        ),
        array(
            'value' => 'Spirax',
            'label' => esc_html__('Spirax', 'maniva-meetup'),
        ),
        array(
            'value' => 'Squada One',
            'label' => esc_html__('Squada One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Stalemate',
            'label' => esc_html__('Stalemate', 'maniva-meetup'),
        ),
        array(
            'value' => 'Stalinist One',
            'label' => esc_html__('Stalinist One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Stardos Stencil',
            'label' => esc_html__('Stardos Stencil', 'maniva-meetup'),
        ),
        array(
            'value' => 'Stint Ultra Condensed',
            'label' => esc_html__('Stint Ultra Condensed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Stint Ultra Expanded',
            'label' => esc_html__('Stint Ultra Expanded', 'maniva-meetup'),
        ),
        array(
            'value' => 'Stoke',
            'label' => esc_html__('Stoke', 'maniva-meetup'),
        ),
        array(
            'value' => 'Strait',
            'label' => esc_html__('Strait', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sue Ellen Francisco',
            'label' => esc_html__('Sue Ellen Francisco', 'maniva-meetup'),
        ),
        array(
            'value' => 'Sunshiney',
            'label' => esc_html__('Sunshiney', 'maniva-meetup'),
        ),
        array(
            'value' => 'Supermercado One',
            'label' => esc_html__('Supermercado One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Suwannaphum',
            'label' => esc_html__('Suwannaphum', 'maniva-meetup'),
        ),
        array(
            'value' => 'Swanky and Moo Moo',
            'label' => esc_html__('Swanky and Moo Moo', 'maniva-meetup'),
        ),
        array(
            'value' => 'Syncopate',
            'label' => esc_html__('Syncopate', 'maniva-meetup'),
        ),
        array(
            'value' => 'Tangerine',
            'label' => esc_html__('Tangerine', 'maniva-meetup'),
        ),
        array(
            'value' => 'Taprom',
            'label' => esc_html__('Taprom', 'maniva-meetup'),
        ),
        array(
            'value' => 'Tauri',
            'label' => esc_html__('Tauri', 'maniva-meetup'),
        ),
        array(
            'value' => 'Teko',
            'label' => esc_html__('Teko', 'maniva-meetup'),
        ),
        array(
            'value' => 'Telex',
            'label' => esc_html__('Telex', 'maniva-meetup'),
        ),
        array(
            'value' => 'Tenor Sans',
            'label' => esc_html__('Tenor Sans', 'maniva-meetup'),
        ),
        array(
            'value' => 'Text Me One',
            'label' => esc_html__('Text Me One', 'maniva-meetup'),
        ),
        array(
            'value' => 'The Girl Next Door',
            'label' => esc_html__('The Girl Next Door', 'maniva-meetup'),
        ),
        array(
            'value' => 'Tienne',
            'label' => esc_html__('Tienne', 'maniva-meetup'),
        ),
        array(
            'value' => 'Tinos',
            'label' => esc_html__('Tinos', 'maniva-meetup'),
        ),
        array(
            'value' => 'Titan One',
            'label' => esc_html__('Titan One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Titillium Web',
            'label' => esc_html__('Titillium Web', 'maniva-meetup'),
        ),
        array(
            'value' => 'Trade Winds',
            'label' => esc_html__('Trade Winds', 'maniva-meetup'),
        ),
        array(
            'value' => 'Trocchi',
            'label' => esc_html__('Trocchi', 'maniva-meetup'),
        ),
        array(
            'value' => 'Trochut',
            'label' => esc_html__('Trochut', 'maniva-meetup'),
        ),
        array(
            'value' => 'Trykker',
            'label' => esc_html__('Trykker', 'maniva-meetup'),
        ),
        array(
            'value' => 'Tulpen One',
            'label' => esc_html__('Tulpen One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ubuntu',
            'label' => esc_html__('Ubuntu', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ubuntu Condensed',
            'label' => esc_html__('Ubuntu Condensed', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ubuntu Mono',
            'label' => esc_html__('Ubuntu Mono', 'maniva-meetup'),
        ),
        array(
            'value' => 'Ultra',
            'label' => esc_html__('Ultra', 'maniva-meetup'),
        ),
        array(
            'value' => 'Uncial Antiqua',
            'label' => esc_html__('Uncial Antiqua', 'maniva-meetup'),
        ),
        array(
            'value' => 'Underdog',
            'label' => esc_html__('Underdog', 'maniva-meetup'),
        ),
        array(
            'value' => 'Unica One',
            'label' => esc_html__('Unica One', 'maniva-meetup'),
        ),
        array(
            'value' => 'UnifrakturCook',
            'label' => esc_html__('UnifrakturCook', 'maniva-meetup'),
        ),
        array(
            'value' => 'UnifrakturMaguntia',
            'label' => esc_html__('UnifrakturMaguntia', 'maniva-meetup'),
        ),
        array(
            'value' => 'Unkempt',
            'label' => esc_html__('Unkempt', 'maniva-meetup'),
        ),
        array(
            'value' => 'Unlock',
            'label' => esc_html__('Unlock', 'maniva-meetup'),
        ),
        array(
            'value' => 'Unna',
            'label' => esc_html__('Unna', 'maniva-meetup'),
        ),
        array(
            'value' => 'VT323',
            'label' => esc_html__('VT323', 'maniva-meetup'),
        ),
        array(
            'value' => 'Vampiro One',
            'label' => esc_html__('Vampiro One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Varela',
            'label' => esc_html__('Varela', 'maniva-meetup'),
        ),
        array(
            'value' => 'Varela Round',
            'label' => esc_html__('Varela Round', 'maniva-meetup'),
        ),
        array(
            'value' => 'Vast Shadow',
            'label' => esc_html__('Vast Shadow', 'maniva-meetup'),
        ),
        array(
            'value' => 'Vesper Libre',
            'label' => esc_html__('Vesper Libre', 'maniva-meetup'),
        ),
        array(
            'value' => 'Vibur',
            'label' => esc_html__('Vibur', 'maniva-meetup'),
        ),
        array(
            'value' => 'Vidaloka',
            'label' => esc_html__('Vidaloka', 'maniva-meetup'),
        ),
        array(
            'value' => 'Viga',
            'label' => esc_html__('Viga', 'maniva-meetup'),
        ),
        array(
            'value' => 'Voces',
            'label' => esc_html__('Voces', 'maniva-meetup'),
        ),
        array(
            'value' => 'Volkhov',
            'label' => esc_html__('Volkhov', 'maniva-meetup'),
        ),
        array(
            'value' => 'Vollkorn',
            'label' => esc_html__('Vollkorn', 'maniva-meetup'),
        ),
        array(
            'value' => 'Voltaire',
            'label' => esc_html__('Voltaire', 'maniva-meetup'),
        ),
        array(
            'value' => 'Waiting for the Sunrise',
            'label' => esc_html__('Waiting for the Sunrise', 'maniva-meetup'),
        ),
        array(
            'value' => 'Wallpoet',
            'label' => esc_html__('Wallpoet', 'maniva-meetup'),
        ),
        array(
            'value' => 'Walter Turncoat',
            'label' => esc_html__('Walter Turncoat', 'maniva-meetup'),
        ),
        array(
            'value' => 'Warnes',
            'label' => esc_html__('Warnes', 'maniva-meetup'),
        ),
        array(
            'value' => 'Wellfleet',
            'label' => esc_html__('Wellfleet', 'maniva-meetup'),
        ),
        array(
            'value' => 'Wendy One',
            'label' => esc_html__('Wendy One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Wire One',
            'label' => esc_html__('Wire One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Yanone Kaffeesatz',
            'label' => esc_html__('Yanone Kaffeesatz', 'maniva-meetup'),
        ),
        array(
            'value' => 'Yellowtail',
            'label' => esc_html__('Yellowtail', 'maniva-meetup'),
        ),
        array(
            'value' => 'Yeseva One',
            'label' => esc_html__('Yeseva One', 'maniva-meetup'),
        ),
        array(
            'value' => 'Yesteryear',
            'label' => esc_html__('Yesteryear', 'maniva-meetup'),
        ),
        array(
            'value' => 'Zeyada',
            'label' => esc_html__('Zeyada', 'maniva-meetup'),
        ),

    );
    $nightclub_font_option_style = array(
        array(
            'value' => '100',
            'label' => '100 Thin',
            'src' => ''
        ),
        array(
            'value' => '100italic',
            'label' => '100 Thin Italic',
            'src' => ''
        ),
        array(
            'value' => '200',
            'label' => '200 Extra-Light',
            'src' => ''
        ),
        array(
            'value' => '200italic',
            'label' => '200 Extra-Light Italic',
            'src' => ''
        ),
        array(
            'value' => '300',
            'label' => '300 Light',
            'src' => ''
        ),
        array(
            'value' => '300italic',
            'label' => '300 Light Italic',
            'src' => ''
        ),
        array(
            'value' => '400',
            'label' => '400 Regular',
            'src' => ''
        ),
        array(
            'value' => '400italic',
            'label' => '400 Regular Italic',
            'src' => ''
        ),
        array(
            'value' => '500',
            'label' => '500 Medium',
            'src' => ''
        ),
        array(
            'value' => '500italic',
            'label' => '500 Medium Italic',
            'src' => ''
        ),
        array(
            'value' => '600',
            'label' => '600 Semi-Bold',
            'src' => ''
        ),
        array(
            'value' => '600italic',
            'label' => '600 Semi-Bold Italic',
            'src' => ''
        ),
        array(
            'value' => '700',
            'label' => '700 Bold',
            'src' => ''
        ),
        array(
            'value' => '700italic',
            'label' => '700 Bold Italic',
            'src' => ''
        ),
        array(
            'value' => '800',
            'label' => '800 Extra-Bold',
            'src' => ''
        ),
        array(
            'value' => '800italic',
            'label' => '800 Extra-Bold Italic',
            'src' => ''
        ),
        array(
            'value' => '900',
            'label' => '900 Black',
            'src' => ''
        ),
        array(
            'value' => '900italic',
            'label' => '900 Black Italic',
            'src' => ''
        ),
    );

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $custom_settings = array(
        'contextual_help' => array(
            'content' => array(
                array(
                    'id' => 'general_help',
                    'title' => 'General',
                    'content' => '<p>Help content goes here!</p>'
                ),
            ),
            'sidebar' => '<p>Sidebar content goes here!</p>'
        ),
        'sections' => array(
            array(
                'id' => 'TzGlobalOption',
                'title' => esc_html__('General Options', 'maniva-meetup'),
            ),
            array(
                'id' => 'logo',
                'title' => esc_html__('Logo & Favicon', 'maniva-meetup'),
            ),
            array(
                'id' => 'headertop_option',
                'title' => esc_html__('Header Top Options', 'maniva-meetup'),
            ),
            array(
                'id' => 'breadcrumb',
                'title' => esc_html__('Option Breadcrumb', 'maniva-meetup'),
            ),
            array(
                'id' => 'social_network',
                'title' => esc_html__('Social Network', 'maniva-meetup'),
            ),
            array(
                'id' => 'TzSyle',
                'title' => esc_html__('Font Option', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZFamily',
                'title' => esc_html__('Family', 'maniva-meetup'),
            ),
            array(
                'id' => 'CustomFamily',
                'title' => esc_html__('Custom', 'maniva-meetup'),
            ),
            array(
                'id' => 'TzCustomCss',
                'title' => esc_html__('Custom Css', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZThemecolor',
                'title' => esc_html__('Theme Color', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZBackground',
                'title' => esc_html__('Background', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZBlog',
                'title' => esc_html__('Blog Option', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZSingleBlog',
                'title' => esc_html__('Single Blog', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZShop',
                'title' => esc_html__('Shop option', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZShopDetail',
                'title' => __('Shop Detail Option', 'maniva-meetup'),
            ),
            array(
                'id' => 'TZEventCalendar',
                'title' => __('Event Calendar', 'maniva-meetup'),
            ),
            array(
                'id' => '404',
                'title' => esc_html__('404 Page', 'maniva-meetup'),
            ),
            array(
                'id' => 'copyright',
                'title' => esc_html__('Copyright', 'maniva-meetup'),
            ),
            array(
                'id' => 'archive_product_multi',
                'title' => esc_html__('Multi Column Sidebar Archive Product', 'maniva-meetup'),
            ),
            array(
                'id' => 'footer_multi',
                'title' => esc_html__('Footer Multi Column Options', 'maniva-meetup'),
            ),
            array(
                'id' => 'footer_multi_shop',
                'title' => esc_html__('Footer Multi Column Shop', 'maniva-meetup'),
            ),
            array(
                'id' => 'footer_single',
                'title' => esc_html__('Footer Single', 'maniva-meetup'),
            ),

        ),

        'settings' => array(

            /* Start TzGlobalOption */
            array(
                'label' => esc_html__('Loading', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_loading',
                'type' => 'on-off',
                'desc' => esc_html__('On/Off site loading', 'maniva-meetup'),
                'std' => 'off',
                'section' => 'TzGlobalOption',
            ),
            array(
                'label' => esc_html__('Type loading', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_typeloading',
                'type' => 'select',
                'desc' => esc_html__('Select one', 'maniva-meetup'),
                'std' => '',
                'section' => 'TzGlobalOption',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('Effect 1', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Effect 2', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '2',
                        'label' => esc_html__('Effect 3 (like facebook loading)', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '3',
                        'label' => esc_html__('Effect 4', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '4',
                        'label' => esc_html__('Effect 5', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'label' => esc_html__('Limit excerpt', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_porlimitexcerpt',
                'type' => 'text',
                'desc' => esc_html__('Limit text for excerpt', 'maniva-meetup'),
                'std' => '',
                'section' => 'TzGlobalOption',
            ),
            array(
                'id' => 'maniva-meetup' . '_tzmaniva_rtl',
                'label' => esc_html__('Right to left', 'maniva-meetup'),
                'desc' => '',
                'std' => '0',
                'type' => 'select',
                'section' => 'TzGlobalOption',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('No', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Yes', 'maniva-meetup'),
                    )
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_ChooseBackTop',
                'label' => esc_html__('Chose Type Back To Top', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'select',
                'section' => 'TzGlobalOption',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('Image', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Font Awesome', 'maniva-meetup'),
                    )
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_AnimateBackTop',
                'label' => esc_html__('Disable animate effect Back To Top', 'maniva-meetup'),
                'desc' => '',
                'std' => '0',
                'type' => 'select',
                'section' => 'TzGlobalOption',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('Enabled', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Disabled', 'maniva-meetup'),
                    )
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_PositionBackTop',
                'label' => esc_html__('Position Back To Top', 'maniva-meetup'),
                'desc' => '',
                'std' => '0',
                'type' => 'select',
                'section' => 'TzGlobalOption',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('Right', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Left', 'maniva-meetup'),
                    )
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_on_off_back_top',
                'label' => esc_html__('On/Off Back Top', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TzGlobalOption',
            ),
            array(
                'id' => 'maniva-meetup' . '_scrolling_back_top',
                'label' => esc_html__('It Appears When Scrolling', 'maniva-meetup'),
                'std' => 'off',
                'type' => 'on-off',
                'desc' => 'Page Shop Default Only Use Scrolling',
                'section' => 'TzGlobalOption',
            ),
            array(
                'id' => 'maniva-meetup' . '_image_backTop',
                'label' => esc_html__('Upload Image Back To Top', 'maniva-meetup'),
                'desc' => esc_html__('Please choose an image  back to top.', 'maniva-meetup'),
                'std' => $image_backtop_default,
                'type' => 'upload',
                'section' => 'TzGlobalOption',
            ),
            array(
                'label' => esc_html__('Font Awesome', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_FontAwesomeBackTop',
                'type' => 'text',
                'desc' => esc_html__('EX:fa-angle-up, link <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a>', 'maniva-meetup'),
                'std' => 'fa-angle-up',
                'section' => 'TzGlobalOption',
            ),
            array(
                'id' => 'maniva-meetup' . '_ChooseFooterType',
                'label' => esc_html__('Choose Footer Type', 'maniva-meetup'),
                'type' => 'select',
                'desc' => esc_html__('Use of page category, single, archive, author, tag, search, 404, event', 'maniva-meetup'),
                'std' => '1',
                'section' => 'TzGlobalOption',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => esc_html__('Type 1 - One Column Center', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '2',
                        'label' => esc_html__('Type 2 - Multi column', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '3',
                        'label' => esc_html__('Type 3 - One Column Center & Multi column', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '4',
                        'label' => esc_html__('Type 4 - Footer Single', 'maniva-meetup'),
                    ),
                ),

            ),
            /* End Global Option */

            /* Start Logo & Favicon */
            array(
                'id' => 'maniva-meetup' . '_logotype',
                'label' => esc_html__('Logo Type', 'maniva-meetup'),
                'desc' => esc_html__('select type for logo text or image', 'maniva-meetup'),
                'std' => '1',
                'type' => 'select',
                'section' => 'logo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => esc_html__('Logo image', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '0',
                        'label' => esc_html__('Logo text', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_logoText',
                'label' => esc_html__('Logo Name', 'maniva-meetup'),
                'desc' => '',
                'std' => 'logo',
                'type' => 'text',
                'section' => 'logo',
            ),
            array(
                'id' => 'maniva-meetup' . '_logoText',
                'label' => esc_html__('Logo Text', 'maniva-meetup'),
                'desc' => esc_html__('logo name for your website', 'maniva-meetup'),
                'std' => 'Maniva',
                'type' => 'text',
                'section' => 'logo',
            ),
            array(
                'id' => 'maniva-meetup' . '_logoTextcolor',
                'label' => esc_html__('Color logo', 'maniva-meetup'),
                'desc' => esc_html__('logo text color', 'maniva-meetup'),
                'std' => '',
                'type' => 'colorpicker',
                'section' => 'logo',
            ),
            array(
                'id' => 'maniva-meetup' . '_logo',
                'label' => esc_html__('Upload Logo', 'maniva-meetup'),
                'desc' => esc_html__('Please choose an image  to use for logo.', 'maniva-meetup'),
                'std' => $logo_default,
                'type' => 'upload',
                'section' => 'logo',
            ),
            array(
                'id' => 'maniva-meetup' . '_favicon_onoff',
                'label' => esc_html__('Enable Favicon', 'maniva-meetup'),
                'desc' => esc_html__('Show or hide Favicon', 'maniva-meetup'),
                'std' => 'no',
                'type' => 'select',
                'section' => 'logo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'maniva-meetup'),
                        'src' => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'maniva-meetup'),
                        'src' => ''
                    )
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_favicon',
                'label' => esc_html__('Upload Favicon Icon', 'maniva-meetup'),
                'desc' => esc_html__('Please choose an image  to use for favicon.', 'maniva-meetup'),
                'std' => '',
                'type' => 'upload',
                'section' => 'logo',
            ),
            /* End Logo & Favicon */

            /* Start header top option */
            array(
                'id' => 'maniva-meetup' . 'type-menu',
                'label' => esc_html__('Type menu', 'maniva-meetup'),
                'std' => '1',
                'type' => 'select',
                'section' => 'headertop_option',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Type 1', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 2,
                        'label' => esc_html__('Type 2', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . 'position-on-desktop',
                'label' => esc_html__('Type position of header on desktop', 'maniva-meetup'),
                'std' => '1',
                'type' => 'select',
                'section' => 'headertop_option',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Relative', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 2,
                        'label' => esc_html__('Fixed', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . 'position-mobile',
                'label' => esc_html__('Type position of header on mobile', 'maniva-meetup'),
                'std' => '1',
                'type' => 'select',
                'section' => 'headertop_option',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Relative', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 2,
                        'label' => esc_html__('Fixed', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . 'on-off-header-top',
                'label' => esc_html__('Show Or Hide Header Top', 'maniva-meetup'),
                'desc' => 'Option User Of Header Top',
                'std' => '1',
                'type' => 'select',
                'section' => 'headertop_option',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Show Header Top', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 2,
                        'label' => esc_html__('Only Show Email And Phone', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 3,
                        'label' => esc_html__('Only Show Social Network', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 4,
                        'label' => esc_html__('Hide Header Top', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . 'position-header-top',
                'label' => esc_html__('Position Top Header', 'maniva-meetup'),
                'std' => '1',
                'type' => 'select',
                'section' => 'headertop_option',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => esc_html__('Left', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 2,
                        'label' => esc_html__('Center', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 3,
                        'label' => esc_html__('Right', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . 'on-off-button-search',
                'label' => esc_html__('On/Off Button Search Top', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'headertop_option',
            ),
            array(
                'id' => 'maniva-meetup' . 'TzHeaderTopOption',
                'label' => esc_html__('Header Top Option', 'maniva-meetup'),
                'desc' => esc_html__('Config mail support end phone number.Note: only Menu Type 2', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'headertop_option',
                'rows' => '5',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_TzHeaderTopMail',
                'label' => esc_html__('Mail', 'maniva-meetup'),
                'desc' => esc_html__('Mail support', 'maniva-meetup'),
                'std' => 'info@maniva.com',
                'type' => 'text',
                'section' => 'headertop_option',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzHeaderTopPhone',
                'label' => esc_html__('Phone', 'maniva-meetup'),
                'desc' => '',
                'std' => '+44 40 8873432',
                'type' => 'text',
                'section' => 'headertop_option',
            ),
            /* End header top option */

            /* Start Breadcrumb */
            array(
                'id' => 'maniva-meetup' . 'tzBreadcrumb',
                'label' => esc_html__('Breadcrumb Option page blog', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'breadcrumb',
                'rows' => '5',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . 'tzBreadcrumb_on_off',
                'label' => esc_html__('On/Off Breadcrumb', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'breadcrumb',
            ),
            array(
                'id' => 'maniva-meetup' . '_tzBreadcrumb_blogColor',
                'label' => esc_html__('Background Breadcrumb', 'maniva-meetup'),
                'desc' => esc_html__('Background Breadcrumb', 'maniva-meetup'),
                'std' => '',
                'type' => 'colorpicker',
                'section' => 'breadcrumb',
            ),
            array(
                'id' => 'maniva-meetup' . '_tzBreadcrumb_blogTextColor',
                'label' => esc_html__('Color Text Breadcrumb', 'maniva-meetup'),
                'desc' => esc_html__('Color Text Breadcrumb', 'maniva-meetup'),
                'std' => '',
                'type' => 'colorpicker',
                'section' => 'breadcrumb',
            ),
            /* End Breadcrumb */

            /* Start social_network */
            array(
                'id' => 'maniva-meetup' . '_social_network_facebook',
                'label' => esc_html__('Facebook', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Facebook icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_twitter',
                'label' => esc_html__('Twitter', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Twitter icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_flickr',
                'label' => esc_html__('Flickr', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Flickr icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_behance',
                'label' => esc_html__('Behance', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Behance icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_instagram',
                'label' => esc_html__('Instagram', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Instagram icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_digg',
                'label' => esc_html__('Digg', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Digg icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_dribbble',
                'label' => esc_html__('Dribbble', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Dribbble icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_linkedin',
                'label' => esc_html__('Linkedin', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Linkedin icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''

            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_dropbox',
                'label' => esc_html__('Dropbox', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Dropbox icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_google-plus',
                'label' => esc_html__('Google Plus', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Google Plus icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_foursquare',
                'label' => esc_html__('Foursquare', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Foursquare icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_pinterest',
                'label' => esc_html__('Pinterest', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Pinterest icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_myspace',
                'label' => esc_html__('My space', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and My space icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_skype',
                'label' => esc_html__('Skype', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Skype icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_tumblr',
                'label' => esc_html__('Tumblr', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Tumblr icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_vimeo',
                'label' => esc_html__('Vimeo', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Vimeo icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_social_network_youtube',
                'label' => esc_html__('Youtube', 'maniva-meetup'),
                'desc' => esc_html__('Place the link you want and Youtube icon will appear. To remove it, just leave it blank.', 'maniva-meetup'),
                'std' => '',
                'type' => 'text',
                'section' => 'social_network',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            /* End social_network */

            /* Start Font Family */
            array(
                'id' => 'maniva-meetup' . '_TzSyle',
                'label' => esc_html__('StyleConfig', 'maniva-meetup'),
                'desc' => esc_html__('Config for Content, Main Menu, Big Headings, Small Headings, custom style', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'TzSyle',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '-select-font-theme',
                'label' => esc_html__('Choose Use Fonts', 'maniva-meetup'),
                'desc' => esc_html__('option font type', 'maniva-meetup'),
                'std' => 1,
                'type' => 'select',
                'section' => 'TZFamily',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => 'Default',
                    ),
                    array(
                        'value' => 2,
                        'label' => 'Font Family',
                    ),
                    array(
                        'value' => 3,
                        'label' => 'Custom Fonts vs CSS',
                    ),

                ),
            ),
            array(
                'id' => 'maniva-meetup' . '-font-text-family',
                'label' => esc_html__('Font Family', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'TZFamily',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => 'tz-text-font-family'
            ),
            array(
                'id' => 'maniva-meetup' . '-font-content',
                'label' => esc_html__('Content', 'maniva-meetup'),
                'desc' => esc_html__('All theme texts except headings and menu', 'maniva-meetup'),
                'type' => 'select',
                'std' => 'Raleway',
                'section' => 'TZFamily',
                'class' => 'TzFontStylet',
                'choices' => $maniva_meetup_font_option,
            ),
            array(
                'id' => 'maniva-meetup' . '-font-menu',
                'label' => esc_html__('Main Menu', 'maniva-meetup'),
                'desc' => esc_html__('Header menu', 'maniva-meetup'),
                'type' => 'select',
                'std' => 'Raleway',
                'section' => 'TZFamily',
                'class' => 'TzFontStylet',
                'choices' => $maniva_meetup_font_option,
            ),
            array(
                'id' => 'maniva-meetup' . '-font-headings',
                'label' => esc_html__('Big Headings', 'maniva-meetup'),
                'desc' => esc_html__('H1, H2, H3 & H4 headings', 'maniva-meetup'),
                'type' => 'select',
                'std' => 'Raleway',
                'section' => 'TZFamily',
                'class' => 'TzFontStylet',
                'choices' => $maniva_meetup_font_option,
            ),
            array(
                'id' => 'maniva-meetup' . '-font-headings-small',
                'label' => esc_html__('Small Headings', 'maniva-meetup'),
                'desc' => esc_html__('H5 & H6 headings', 'maniva-meetup'),
                'type' => 'select',
                'std' => 'Raleway',
                'section' => 'TZFamily',
                'class' => 'TzFontStylet',
                'choices' => $maniva_meetup_font_option,
            ),
            array(
                'id' => 'maniva-meetup' . '-font-info-google',
                'label' => esc_html__('Google Fonts', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'TZFamily',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => 'tz-text-font-family'
            ),
            array(
                'id' => 'maniva-meetup' . '-font-weight',
                'label' => esc_html__('Google Fonts Style & Weight', 'theme-text-domain'),
                'desc' => esc_html__('Some of the fonts in the Google Fonts Directory support multiple styles. For a complete list of available font subsets please see <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a>.', 'maniva-meetup'),
                'std' => '',
                'type' => 'checkbox',
                'section' => 'TZFamily',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => 'tz-check-font-weight',
                'operator' => 'and',
                'choices' => $nightclub_font_option_style
            ),
            array(
                'label' => esc_html__('Google Fonts Subset', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '-font-subset',
                'type' => 'text',
                'desc' => esc_html__('Specify which subsets should be downloaded. Multiple subsets should be separated with coma (,)', 'maniva-meetup'),
                'class' => '',
                'section' => 'TZFamily',
            ),
            array(
                'id' => 'maniva-meetup' . '_CustomFamily',
                'label' => esc_html__('Custom', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'CustomFamily',
                'class' => 'tz-text-font-family'
            ),
            array(
                'label' => esc_html__('Font | Name (Please use only letters or spaces, eg. Patua One)', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '-font-custom',
                'type' => 'text',
                'desc' => esc_html__('Name for Custom Font uploaded below. Font will show on fonts list after click the Save Changes button.', 'maniva-meetup'),
                'class' => '',
                'section' => 'CustomFamily',
            ),
            array(
                'id' => 'maniva-meetup' . '-font-custom-woff',
                'label' => esc_html__('Font | .woff', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            array(
                'id' => 'maniva-meetup' . '-font-custom-ttf',
                'label' => esc_html__('Font | .ttf', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            array(
                'id' => 'maniva-meetup' . 'font-custom-svg',
                'label' => esc_html__('Font | .svg', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            array(
                'id' => 'maniva-meetup' . 'font-custom-eot',
                'label' => esc_html__('Font | .eot', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),

            array(
                'label' => esc_html__('Font 2 | Name (Please use only letters or spaces, eg. Patua One)', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '-font-custom2',
                'type' => 'text',
                'desc' => esc_html__('Name for Custom Font uploaded below. Font will show on fonts list after click the Save Changes button.', 'maniva-meetup'),
                'class' => 'tz-font-custom-family',
                'section' => 'CustomFamily',
            ),
            array(
                'id' => 'maniva-meetup' . '-font-custom2-woff',
                'label' => esc_html__('Font 2 | .woff', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            array(
                'id' => 'maniva-meetup' . '-font-custom2-ttf',
                'label' => esc_html__('Font 2 | .ttf', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            array(
                'id' => 'maniva-meetup' . 'font-custom2-svg',
                'label' => esc_html__('Font 2 | .svg', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            array(
                'id' => 'maniva-meetup' . 'font-custom2-eot',
                'label' => esc_html__('Font 2 | .eot', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'CustomFamily',
                'class' => 'tz-font-custom-family'
            ),
            /* End Font Family */

            /* Start custom css */
            array(
                'id' => 'maniva-meetup' . '_TzCustomCss',
                'label' => esc_html__('Code CSS', 'maniva-meetup'),
                'desc' => esc_html__('Paste your custom CSS, the !important tag may be needed.', 'maniva-meetup'),
                'std' => '',
                'type' => 'css',
                'section' => 'TzCustomCss',
            ),
            /* End custom css */

            /* Start Theme color */
            array(
                'id' => 'maniva-meetup' . '_TZTypecolor',
                'label' => esc_html__('Config Color Them', 'maniva-meetup'),
                'desc' => '',
                'std' => '0',
                'type' => 'select',
                'section' => 'TZThemecolor',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => esc_html__('Default Color', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '1',
                        'label' => esc_html__('Custom Color', 'maniva-meetup'),
                    )
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_TZThemecolor',
                'label' => esc_html__('Choose color', 'maniva-meetup'),
                'desc' => '',
                'sdt' => '',
                'type' => 'radio-image',
                'section' => 'TZThemecolor',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => '',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/Bright_red.jpg'
                    ),
                    array(
                        'value' => '#fece15',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/yellow.jpg'
                    ),
                    array(
                        'value' => '#e45914',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/orange.jpg'
                    ),
                    array(
                        'value' => '#e80f60',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/pink.jpg'
                    ),
                    array(
                        'value' => '#53c5a9',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/green.jpg'
                    ),
                    array(
                        'value' => '#57a6f0',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/blue.jpg'
                    ),
                    array(
                        'value' => '#77be32',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/limegreen.jpg'
                    ),
                    array(
                        'value' => '#d786fe',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/violet.jpg'
                    ),
                    array(
                        'value' => '#9b59b6',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/blueviolet.jpg'
                    ),
                    array(
                        'value' => '#c0392b',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/firebrick.jpg'
                    ),
                    array(
                        'value' => '#4cddf3',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/skyblue.jpg'
                    ),
                    array(
                        'value' => '#f2333a',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/red.jpg'
                    ),
                    array(
                        'value' => '#3333f2',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/darkblue.jpg'
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . '_TZThemecustom',
                'label' => esc_html__('Choose Color', 'maniva-meetup'),
                'std' => '',
                'type' => 'colorpicker-opacity',
                'section' => 'TZThemecolor',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZCustomColorFooter',
                'label' => esc_html__('Background Color Footer', 'maniva-meetup'),
                'std' => '',
                'type' => 'colorpicker-opacity',
                'section' => 'TZThemecolor',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZCustomColorFooterBottom',
                'label' => esc_html__('Background Color Footer Bottom', 'maniva-meetup'),
                'std' => '',
                'desc' => 'Use Of Footer Multi Column Options',
                'type' => 'colorpicker-opacity',
                'section' => 'TZThemecolor',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZCustomColorFooterShop',
                'label' => esc_html__('Background Color Footer Shop', 'maniva-meetup'),
                'std' => '',
                'desc' => 'Use Of Footer Multi Column Shop',
                'type' => 'colorpicker-opacity',
                'section' => 'TZThemecolor',
            ),

            /* End Theme color */

            /* Background */
            array(
                'id' => 'cbackground',
                'label' => esc_html__('Background', 'maniva-meetup'),
                'desc' => esc_html__('Default background for Post, Page, Portfolio, Category, Archive, Seach page.', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'TZBackground',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_background_type',
                'label' => esc_html__('Background Type', 'maniva-meetup'),
                'desc' => esc_html__('You can choose the background you want between our pre-provided pattern and your custom image.', 'maniva-meetup'),
                'std' => 'none',
                'type' => 'select',
                'section' => 'TZBackground',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => 'none',
                        'label' => esc_html__('Default', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 'pattern',
                        'label' => esc_html__('Pattern', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 'single_image',
                        'label' => esc_html__('Single image', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_TZBackgroundColor',
                'label' => esc_html__('Color code', 'maniva-meetup'),
                'desc' => esc_html__('Background color code', 'maniva-meetup'),
                'std' => '',
                'type' => 'colorpicker',
                'section' => 'TZBackground',
            ),
            array(
                'id' => 'maniva-meetup' . '_background_pattern',
                'label' => esc_html__('Choose Pattern', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'radio-image',
                'section' => 'TZBackground',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => 'background_pattern',
                'choices' => $patterns
            ),
            array(
                'id' => 'maniva-meetup' . '_background_single_image',
                'label' => esc_html__('Single Image Background', 'maniva-meetup'),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'TZBackground',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            /* End Background */

            /* Start Blog */
            array(
                'id' => 'maniva-meetup' . '_TZBlogSidebar',
                'label' => esc_html__('Show Sidebar', 'maniva-meetup'),
                'type' => 'select',
                'desc' => '',
                'std' => 'show',
                'section' => 'TZBlog',
                'choices' => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'maniva-meetup'),
                    ),
                ),

            ),
            array(
                'id' => 'maniva-meetup' . 'blog_single_slideshows_show',
                'label' => esc_html__('Show hide slider client', 'maniva-meetup'),
                'type' => 'select',
                'desc' => '',
                'std' => 'hide',
                'section' => 'TZBlog',
                'choices' => array(
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_background_image_slider_client',
                'label' => esc_html__('Image Background slider client', 'maniva-meetup'),
                'desc' => esc_html__('Only use page category and single', 'maniva-meetup'),
                'std' => '',
                'type' => 'upload',
                'section' => 'TZBlog',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_item_slideshows_client',
                'label' => esc_html__('Number item slider', 'maniva-meetup'),
                'desc' => esc_html__('Only use page category and single', 'maniva-meetup'),
                'type' => 'numeric-slider',
                'std' => 5,
                'section' => 'TZBlog',
                'min_max_step' => '1,100',
            ),
            array(
                'label' => esc_html__('Slides Client', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_blog_single_slideshows',
                'type' => 'list-item',
                'desc' => esc_html__('Only use page category and single', 'maniva-meetup'),
                'section' => 'TZBlog',
                'class' => '',
                'settings' => array(
                    array(
                        'id' => 'maniva-meetup' . '_blog_single_slideshow_item',
                        'label' => esc_html__('Image', 'maniva-meetup'),
                        'type' => 'upload',
                        'class' => 'portfolio-slideshow-item',
                    ),
                    array(
                        'label' => esc_html__('Link image client', 'maniva-meetup'),
                        'id' => 'maniva-meetup' . '_blog_single_slideshow_item_link',
                        'type' => 'text',
                        'class' => '',
                    ),
                )
            ),
            /* End Blog */

            /* Start Single Blog */
            array(
                'id' => 'TZBlog',
                'label' => esc_html__('Option Single Blog', 'maniva-meetup'),
                'desc' => esc_html__('Option Single Blog', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'TZSingleBlog',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_TZSingleBlogSidebar',
                'label' => esc_html__('Sidebar Option', 'maniva-meetup'),
                'type' => 'select',
                'desc' => '',
                'std' => 'show',
                'section' => 'TZSingleBlog',
                'choices' => array(
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'maniva-meetup'),
                    ),
                ),

            ),
            array(
                'id' => 'maniva-meetup' . '_TZSingleBlogImage',
                'label' => esc_html__('On/Off Image Post', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZSingleBlogSliderImage',
                'label' => esc_html__('On/Off Image Post Type Slider', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZSingleBlogVideo',
                'label' => esc_html__('On/Off Video Post', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZSingleBlogAudio',
                'label' => esc_html__('On/Off Audio Post', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . 'tzAvata_blog_on_off',
                'label' => esc_html__('On/Off Avatar', 'maniva-meetup'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSingleAvatarSocial',
                'label' => esc_html__('On/Off Avatar Social', 'maniva-meetup'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSingleNumberComment',
                'label' => esc_html__('On/Off Number Comment', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSingleBtnShare',
                'label' => esc_html__('On/Off Button Share', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSingleTag',
                'label' => esc_html__('On/Off Tag', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSingleAuthor',
                'label' => esc_html__('On/Off Author', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . 'tzRelated_Post_on_off',
                'label' => esc_html__('On/Off Related Posts', 'maniva-meetup'),
                'std' => 'off',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSingleCommentForm',
                'label' => esc_html__('On/Off Comment Form', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            array(
                'id' => 'maniva-meetup' . '_TzSinglePreNext',
                'label' => esc_html__('On/Off Previous-Next', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZSingleBlog',
            ),
            /* End Single Blog */

            /* Start Shop */
            array(
                'id' => 'maniva-meetup' . 'breadcrumb-shop-on-off',
                'label' => esc_html__('On/Off Breadcrumb Shop', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZShop',
            ),
            array(
                'id' => 'maniva-meetup' . '_bk_breadcrumb_shop',
                'label' => esc_html__('Upload Background Image Breadcrumb Shop', 'maniva-meetup'),
                'desc' => esc_html__('Please choose an image  to use for Breadcrumb Shop.', 'maniva-meetup'),
                'std' => '',
                'type' => 'upload',
                'section' => 'TZShop',
            ),
            array(
                'id' => 'maniva-meetup' . '_event_on_breadcrumb_shop',
                'label' => esc_html__('Event on Breadcrumb shop', 'maniva-meetup'),
                'desc' => '',
                'std' => '<p>Could not you decide? <a target="_blank" href="http://www.templaza.com/">Contact Us,</a> we help your styling FREE...</p>',
                'type' => 'textarea',
                'section' => 'TZShop',
                'rows' => '5',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_TZLimitProductPageShop',
                'label' => __('Limit product page shop', 'maniva-meetup'),
                'desc' => __('Limit product page shop', 'maniva-meetup'),
                'std' => '12',
                'type' => 'text',
                'section' => 'TZShop',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_column_item_product',
                'label' => esc_html__('Cloumn Item Product', 'maniva-meetup'),
                'section' => 'TZShop',
                'std' => '4',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'recently-viewed-on-off',
                'label' => esc_html__('On/Off Recently Viewed', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZShop',
            ),
            array(
                'id' => 'maniva-meetup' . '_TZTextRecentlyViewed',
                'label' => __('Text recently viewed', 'maniva-meetup'),
                'desc' => __('Text recently viewed ', 'maniva-meetup'),
                'std' => 'recently viewed',
                'type' => 'text',
                'section' => 'TZShop',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_TZLimitProductRecentlyViewed',
                'label' => __('Limit product recently viewed', 'maniva-meetup'),
                'desc' => __('Limit product recently viewed ', 'maniva-meetup'),
                'std' => '8',
                'type' => 'text',
                'section' => 'TZShop',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . '_column_item_recently_viewed',
                'label' => esc_html__('Cloumn Item Recently Viewed', 'maniva-meetup'),
                'section' => 'TZShop',
                'std' => '4',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                )
            ),
            /* End Shop */

            /* Start Shop Detail */
            array(
                'id' => 'maniva-meetup' . '_TZShopDetailSidebar',
                'label' => esc_html__('Show Sidebar', 'maniva-meetup'),
                'type' => 'select',
                'desc' => '',
                'std' => 'hide',
                'section' => 'TZShopDetail',
                'choices' => array(
                    array(
                        'value' => 'hide',
                        'label' => esc_html__('Hide', 'maniva-meetup'),
                    ),
                    array(
                        'value' => 'show',
                        'label' => esc_html__('Show', 'maniva-meetup'),
                    ),
                ),

            ),
            array(
                'id' => 'maniva-meetup' . 'related-products-on-off',
                'label' => esc_html__('On/Off Related Products', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZShopDetail',
            ),
            array(
                'id' => 'maniva-meetup' . 'best-seller-products-on-off',
                'label' => esc_html__('On/Off Best Seller Products', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZShopDetail',
            ),
            array(
                'id' => 'maniva-meetup' . 'recent-view-product-on-off',
                'label' => esc_html__('On/Off Recent View Product ', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'TZShopDetail',
            ),
            /* End Shop Detail */

            /* Start Event Calendar */
            array(
                'id' => 'maniva-meetup' . '_logo_event_calendar',
                'label' => esc_html__('Upload Logo', 'maniva-meetup'),
                'desc' => esc_html__('logo use for header event calendar.', 'maniva-meetup'),
                'std' => $logo_default_event,
                'type' => 'upload',
                'section' => 'TZEventCalendar',
            ),
            array(
                'id' => 'maniva-meetup' . 'bk-img_header',
                'label' => esc_html__('Background Image Header Of Event Calendar', 'maniva-meetup'),
                'desc' => esc_html__('Size background img 1920x99', 'maniva-meetup'),
                'std' => '',
                'type' => 'upload',
                'section' => 'TZEventCalendar',
            ),
            /* End Event Calendar */

            /* Start 404 */
            array(
                'id' => 'maniva-meetup' . '_404_page_content',
                'label' => esc_html__('404 Page Content', 'maniva-meetup'),
                'desc' => '',
                'std' => '<p>The page or journal you are looking for cannot be found</p>',
                'type' => 'textarea',
                'section' => '404',
                'rows' => '15',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            /* End 404 */

            /* Start Copyright */
            array(
                'id' => 'maniva-meetup' . '_copyright',
                'label' => esc_html__('Copyright', 'maniva-meetup'),
                'desc' => '',
                'std' => '<p>Copyright &copy; <a target="_blank" href="http://www.templaza.com/">Templaza</a></p>',
                'type' => 'textarea',
                'section' => 'copyright',
                'rows' => '15',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            /* End Copyright */

            /* archive product multi */
            array(
                'id' => 'maniva-meetup' . 'on-off-sidebar-archive-product',
                'label' => esc_html__('On/Off Sidebar Archive Product', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'archive_product_multi',
            ),
            array(
                'id' => 'maniva-meetup-sidebar-archive-product',
                'label' => esc_html__('Sidebar Archive Product Multi Column Option', 'maniva-meetup'),
                'desc' => esc_html__('Config column number of Sidebar Archive Product.', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'archive_product_multi',
                'rows' => '5',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup-archive-product-image',
                'label' => '',
                'desc' => '',
                'sdt' => '',
                'type' => 'radio-image',
                'section' => 'archive_product_multi',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => 1,
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' => 2,
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' => 3,
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' => 4,
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'label' => esc_html__('Number of Sidebar Archive Product Multi Columns.', 'maniva-meetup'),
                'id' => 'maniva-meetup-archive-product-columns',
                'desc' => esc_html__('Select the number of columns to display in the archive product.', 'maniva-meetup'),
                'section' => 'archive_product_multi',
                'std' => '4',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3'
                    ),
                    array(
                        'value' => '2',
                        'label' => '2'
                    ),
                    array(
                        'value' => '1',
                        'label' => '1'
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup-archive-product-width1',
                'label' => esc_html__('Archive product width 1', 'maniva-meetup'),
                'desc' => esc_html__('config width for sidebar archive product', 'maniva-meetup'),
                'section' => 'archive_product_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup-archive-product-width2',
                'label' => esc_html__('Archive product width 2', 'maniva-meetup'),
                'desc' => esc_html__('config width for sidebar archive product', 'maniva-meetup'),
                'section' => 'archive_product_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup-archive-product-width3',
                'label' => esc_html__('Archive product width 3', 'maniva-meetup'),
                'desc' => esc_html__('config width for sidebar archive product', 'maniva-meetup'),
                'section' => 'archive_product_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup-archive-product-width4',
                'label' => esc_html__('Archive product width 4', 'maniva-meetup'),
                'desc' => esc_html__('config width for sidebar archive product', 'maniva-meetup'),
                'section' => 'archive_product_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            /* archive product multi */

            /* Start footer multi */
            array(
                'id' => 'maniva-meetup' . 'footer_description',
                'label' => esc_html__('Footer Multi Column Option', 'maniva-meetup'),
                'desc' => esc_html__('Config column number of footer multi column.', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'footer_multi',
                'rows' => '5',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . 'footer_image',
                'label' => '',
                'desc' => '',
                'sdt' => '',
                'type' => 'radio-image',
                'section' => 'footer_multi',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => 'footer1',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' => 'footer2',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' => 'footer3',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' => 'footer4',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer4.jpg'
                    ),
                )
            ),
            array(
                'label' => esc_html__('Number of Footer Multi Columns.', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_footer_columns',
                'desc' => esc_html__('Select the number of columns to display in the footer.', 'maniva-meetup'),
                'section' => 'footer_multi',
                'std' => '4',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3'
                    ),
                    array(
                        'value' => '2',
                        'label' => '2'
                    ),
                    array(
                        'value' => '1',
                        'label' => '1'
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth1',
                'label' => esc_html__('Footer width 1', 'maniva-meetup'),
                'desc' => esc_html__('config width for footer', 'maniva-meetup'),
                'section' => 'footer_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth2',
                'label' => esc_html__('Footer width 2', 'maniva-meetup'),
                'desc' => esc_html__('config width for footer', 'maniva-meetup'),
                'section' => 'footer_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth3',
                'label' => esc_html__('Footer width 3', 'maniva-meetup'),
                'desc' => esc_html__('config width for footer', 'maniva-meetup'),
                'section' => 'footer_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth4',
                'label' => esc_html__('Footer width 4', 'maniva-meetup'),
                'desc' => esc_html__('config width for footer', 'maniva-meetup'),
                'section' => 'footer_multi',
                'std' => '3',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            /* End footer multi */

            /* Start Footer Multi Shop */
            array(
                'id' => 'maniva-meetup' . 'footerShop_description',
                'label' => esc_html__('Footer Multi Column Shop Option', 'maniva-meetup'),
                'desc' => esc_html__('Config column number of footer multi column Shop.', 'maniva-meetup'),
                'std' => '',
                'type' => 'textblock-titled',
                'section' => 'footer_multi_shop',
                'rows' => '5',
                'post_type' => '',
                'taxonomy' => '',
                'class' => ''
            ),
            array(
                'id' => 'maniva-meetup' . 'footerShop_image',
                'label' => '',
                'desc' => '',
                'sdt' => '',
                'type' => 'radio-image',
                'section' => 'footer_multi_shop',
                'class' => '',
                'choices' => array(
                    array(
                        'value' => 'footer1',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer1.jpg'
                    ),
                    array(
                        'value' => 'footer2',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer2.jpg'
                    ),
                    array(
                        'value' => 'footer3',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer3.jpg'
                    ),
                    array(
                        'value' => 'footer4',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer4.jpg'
                    ),
                    array(
                        'value' => 'footer5',
                        'label' => '',
                        'src' => get_template_directory_uri() . '/extension/assets/images/footer5.jpg'
                    ),
                )
            ),
            array(
                'label' => esc_html__('Number of Footer Multi Columns Shop.', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_footerShop_columns',
                'desc' => esc_html__('Select the number of columns to display in the footer.', 'maniva-meetup'),
                'section' => 'footer_multi_shop',
                'std' => '5',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth1_shop',
                'label' => 'Footer width 1',
                'desc' => 'config width for footer',
                'section' => 'footer_multi_shop',
                'std' => '2',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth2_shop',
                'label' => 'Footer width 2',
                'desc' => 'config width for footer',
                'section' => 'footer_multi_shop',
                'std' => '2',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth3_shop',
                'label' => 'Footer width 3',
                'desc' => 'config width for footer',
                'section' => 'footer_multi_shop',
                'std' => '2',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth4_shop',
                'label' => 'Footer width 4',
                'desc' => 'config width for footer',
                'section' => 'footer_multi_shop',
                'std' => '2',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'id' => 'maniva-meetup' . 'footerwidth5_shop',
                'label' => 'Footer width 5',
                'desc' => 'config width for footer',
                'section' => 'footer_multi_shop',
                'std' => '4',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => '1',
                    ),
                    array(
                        'value' => '2',
                        'label' => '2',
                    ),
                    array(
                        'value' => '3',
                        'label' => '3',
                    ),
                    array(
                        'value' => '4',
                        'label' => '4',
                    ),
                    array(
                        'value' => '5',
                        'label' => '5',
                    ),
                    array(
                        'value' => '6',
                        'label' => '6',
                    ),
                    array(
                        'value' => '7',
                        'label' => '7',
                    ),
                    array(
                        'value' => '8',
                        'label' => '8',
                    ),
                    array(
                        'value' => '9',
                        'label' => '9',
                    ),
                    array(
                        'value' => '10',
                        'label' => '10',
                    ),
                    array(
                        'value' => '11',
                        'label' => '11',
                    ),
                    array(
                        'value' => '12',
                        'label' => '12',
                    ),
                )
            ),
            array(
                'label' => esc_html__('Title Background Footer', 'maniva-meetup'),
                'id' => 'maniva-meetup' . '_tzFooter_Titlebg',
                'type' => 'text',
                'desc' => '',
                'std' => '',
                'section' => 'footer_multi_shop',
            ),
            /* End Footer Multi Shop */
            /* Starts Footer Single*/
            array(
                'id' => 'maniva-meetup' . 'on-off-subscribe',
                'label' => esc_html__('On/Off Subscribe', 'maniva-meetup'),
                'desc' => '',
                'std' => '1',
                'type' => 'select',
                'section' => 'footer_single',
                'desc' => esc_html__('In Appearance > Widgets, add Multicolor Subscribe Widget to Footer Single to show the subscribe form. .', 'maniva-meetup'),
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => esc_html__('On', 'maniva-meetup'),
                    ),
                    array(
                        'value' => '0',
                        'label' => esc_html__('Off', 'maniva-meetup'),
                    ),

                ),
            ),
            array(
                'id' => 'maniva-meetup' . '_background_img_subscribe',
                'label' => esc_html__('Upload background subscribe', 'maniva-meetup'),
                'std' => $background_img_subscribe,
                'type' => 'upload',
                'section' => 'footer_single',
            ),
            array(
                'id' => 'maniva-meetup' . 'on-off-social',
                'label' => esc_html__('On/Off Social', 'maniva-meetup'),
                'std' => 'on',
                'type' => 'on-off',
                'section' => 'footer_single',
                'desc' => esc_html__('Social Network to add social links.', 'maniva-meetup'),
            ),


            array(
                'id' => 'maniva-meetup' . 'choose_menu',
                'label' => esc_html__('Choose Menu', 'maniva-meetup'),
                'std' => '',
                'type' => 'select',
                'section' => 'footer_single',
                'choices' => $menuArray1,
            ),
            array(
                'id' => 'maniva-meetup' . '_background_img_footer',
                'label' => esc_html__('Upload background', 'maniva-meetup'),
                'desc' => esc_html__('Please choose an image  to use for background.', 'maniva-meetup'),
                'std' => $background_img_footer,
                'type' => 'upload',
                'section' => 'footer_single',
            ),
            array(
                'id' => 'maniva-meetup' . 'on-off-overlay',
                'label' => esc_html__('On/Off Overlay', 'maniva-meetup'),
                'std' => 'on',
                'desc' => '',
                'type' => 'on-off',
                'section' => 'footer_single',
            ),

            /* End Footer Single*/

        ),
    );

    /* allow settings to be filtered before saving */

    $custom_settings = apply_filters('option_tree_settings_args', $custom_settings);

    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option('option_tree_settings', $custom_settings);
    }

}


?>
