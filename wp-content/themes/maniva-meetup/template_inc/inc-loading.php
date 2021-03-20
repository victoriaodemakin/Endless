<?php
$loading = ot_get_option('maniva-meetup_loading', 'off');
$tz_color = ot_get_option('maniva-meetup_TZTypecolor', '0');

if ($tz_color == 0) {
    $bg_color = ot_get_option('maniva-meetup_TZThemecolor', '');

} elseif ($tz_color == 1) {
    $bg_color = ot_get_option('maniva-meetup_TZThemecustom', '');
}
if ($loading == 'on'):
    $loading_effect = ot_get_option('maniva-meetup_typeloading', '');


    ?>
    <div id="tzloadding">
        <?php if ($loading_effect == 0): ?>
            <div class="progress">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <style>
                @keyframes wave {
                    0%, 40%, 100% {
                        transform: translate(0, 0);
                        background-color: <?php echo esc_attr($bg_color); ?>;
                    }
                    10% {
                        transform: translate(0, -15px);
                        background-color: red;
                    }
                }
            </style>
        <?php elseif ($loading_effect == 1): ?>
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <style>
                @keyframes load {
                    0% {
                        background: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?>;
                        margin-top: 25%;
                        height: 10%;
                    }
                    50% {
                        background: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?>;
                        height: 100%;
                        margin-top: 0%;
                    }
                    100% {
                        background: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?>;
                        height: 10%;
                        margin-top: 25%;
                    }
                }
            </style>
        <?php elseif ($loading_effect == 2): ?>
            <div class="loader">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <style>
                @keyframes loadingbar {
                    0% {
                    }
                    10% {
                        margin-top: 5px;
                        height: 22px;
                        border-color: #d1d8e6;
                        background-color: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?>;
                    }
                    20% {
                        margin-top: 0px;
                        height: 32px;
                        border-color: #d1d7e2;
                        background-color: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?>;
                    }
                    30% {
                        margin-top: 1px;
                        height: 30px;
                        border-color: #d1d8e6;
                        background-color: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?>;
                    }
                    40% {
                        margin-top: 3px;
                        height: 26px;
                    }
                    50% {
                        margin-top: 5px;
                        height: 22px;
                    }
                    60% {
                        margin-top: 6px;
                        height: 18px;
                    }
                    70% {
                    }
                    /* Missing frames will cause the extra delay */
                    100% {
                    }
                }
            </style>
        <?php elseif ($loading_effect == 3): ?>
            <div class="loader">
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
            <style>
                .ball {
                    background: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?> !important;
                }
            </style>
        <?php elseif ($loading_effect == 4): ?>
            <div class="loading">
                <div class="square square-c state1c"></div>
                <div class="square square-c state2c"></div>
                <style>
                    .square {
                        background: <?php if($bg_color==''){echo "#e45914";}else{ echo esc_attr($bg_color); }?> !important;;
                    }
                </style>
            </div>
        <?php endif; ?>

    </div>
<?php endif;
?>