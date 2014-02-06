<?php
/*
 * Author: Marijn
 * Created on: 16/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<?php
//Load custom view, done this way to display a view within this template view
//This way I can create multiple 'islands', need for ie the homepage
$this->load->view('template/tmpHeader_view');
?>

<?php
//Display aside: default = Yes
if (!(isset($aside_visible))) {
    $aside_display = '';
} else {
    $aside_display = 'style="display: none;"';
}
?>
    <!-- Script Toggle article -->
    <script>
        $(document).ready(function () {
            var toggle = true;
            //var txt = '';
            $('.toggle').click(function () {
                //txt = $(this).text();
                //Hide / show next element
                $(this).next().slideToggle("slow");
                /*if (toggle == true) {
                 $(this).text(txt.replace('▲', '▼'));
                 toggle = false;
                 } else {
                 $(this).text(txt.replace('▼', '▲'));
                 toggle = true;
                 }*/
            });
        });
    </script>
    <!-- Script Twitter timeline -->
    <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");
    </script>

    <!-- Start container for page-content -->
    <div id="page">

        <!-- Start Content page -->
        <section>
            <!-- Section can contain multiple islands = articles (i.e. index page) but always at least 1
            <!-- Start article> -->
            <article>
                <?php
                //Load custom view, done this way to display a view within this template view
                //This way I can create multiple 'island', need for ie the homepage
                $this->load->view($view);
                ?>
                <!-- End article -->
            </article>
            <!-- End Content page -->
        </section>

        <!-- Start Aside Calendar / Twitter Timeline -->
        <aside <?php echo $aside_display; ?>>
            <!-- Start Event calendar -->
            <div id="event-calendar">

                <!-- End Event calendar -->
            </div>
            <!-- Start Twitter timeline -->
            <div id="twitter-timeline">
                <a class="twitter-timeline"
                   width="200"
                   height="500"
                   data-link-color="#1c8017"
                   data-chrome="nofooter noscrollbar"
                   href="https://twitter.com/Marijn_Martens"
                   data-widget-id="416921452827275264">Tweets by @Marijn_Martens</a>
                <!-- End Twitter timeline -->
            </div>
            <!-- End Aside -->
        </aside>
        <div class="clear"></div>

        <!-- End container for page-content -->
    </div>

<?php
//Load custom view, done this way to display a view within this template view
//This way I can create multiple 'island', need for ie the homepage
$this->load->view('template/tmpFooter_view');
?>