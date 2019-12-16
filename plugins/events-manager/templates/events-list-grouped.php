<?php
/*
 * Default Events List Template
 * This page displays a list of events, called during the em_content() if this is an events list page.
 * You can override the default display settings pages by copying this file to yourthemefolder/plugins/events-manager/templates/ and modifying it however you need.
 * You can display events however you wish, there are a few variables made available to you:
 * 
 * $args - the args passed onto EM_Events::output()
 * 
 */
$args = apply_filters('em_content_events_args', $args);

if( get_option('dbem_css_evlist') ) echo "<div class='css-events-list'>";
?>
<div id="em-wrapper">
    <?php
    //echo EM_Events::output_grouped($args); //note we're grabbing the content, not em_get_events_list_grouped function
    $monthCurrentEvent="";
    $i=0;
    $EM_Events = EM_Events::get( array( 'scope' => 'future' ) );
    foreach( $EM_Events as $EM_Event ){
        
        // GET START & END DATE , and transform format to be translated
        $startDateEvent = new DateTime($EM_Event->event_start_date);
        $endDateEvent = new DateTime($EM_Event->event_end_date);
        $locale = get_locale();
        setlocale(LC_TIME, $locale);
        
        $monthEvent = $endDateEvent->format('M Y');
        
        if ($monthEvent != $monthCurrentEvent) {
            if ($i > 0) {echo "</div>";} // Close .event-loop . !!!!
            
            echo "<h2>".$monthEvent."</h2>"; 
            ?>
            <div class='event-loop'>
            <?php
        }
    ?>
        <a class="event-post" href="<?php echo $EM_Event->output('#_EVENTURL'); ?>">
            <div>
                <p><?php //echo $EM_Event->output('#_EVENTDATES'); 
                    echo strftime("%d %B %Y", strtotime($startDateEvent->format('d M Y')));
                    if ($endDateEvent != $startDateEvent ) {
                        echo " → ";
                        echo strftime("%d %B %Y", strtotime($endDateEvent->format('d M Y')));
                    }
                    ?></p>
                <h3><?php echo $EM_Event->output('#_EVENTNAME');?></h3>
            </div>
            <figure class="event-img">
                <?php 
                if( $EM_Event->output('#_EVENTIMAGE') ) {
                    echo $EM_Event->output('#_EVENTIMAGE'); 
                } else {
                    if (catch_that_image() ==  "no_image" ){
                       echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
                    } else {
                        echo '<img src="';
                        echo catch_that_image();
                        echo '" alt="" />'; 
                    }   
                }
                ?>
            </figure>
        </a>   
    <?php
        $monthCurrentEvent = $monthEvent;
        $i++;
     }
    ?>
</div>

<?php
if( get_option('dbem_css_evlist') ) echo "</div>"; ?>