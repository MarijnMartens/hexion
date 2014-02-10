<?php

/* 23
 * Author: Marijn
 * Created on: 11/01/2014
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$base_url = $this->config->item('base_url');
?>

<html>
<head>
    <title>TEST FACEBOOK</title>
    <script src="<?php echo $base_url; ?>js/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<?php
$ses_user = $this->session->userdata('User');
if (empty($ses_user)) {
    echo img(array
    ('src' => base_url() . 'assets/facebook.jpg', 'id' => 'facebook', 'style' => 'cursor:pointer;float:left;margin-left: 300px;'));
} else {
    echo '<img src="https://graph.facebook.com/' . $ses_user
        ['id'] . '/picture" width="30" height="30"/><div>' . $ses_user
        ['name'] . '</div>';
    echo '<a href="' . $this->session->userdata
            ('logout') . '">Logout</a>';
}
?>

<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function () {
        FB.init({
            appId: '<?php echo $this->config->item('appID'); ?>',
            cookie: true,
            status: true, xfbml: true, oauth: true
        });
    }
        (function (d) {
            var js, id = 'facebook-jssdk', ref = d.getElementsByTagName
                ('script')[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement('script');
            js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));
    $('#facebook').click(function (e) {
        FB.login(function (response) {
            if (response.authResponse) {
                parent.location = '<?php echo $base_url; ?>test_facebook/fblosgin';
            }
        }, {scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'});
    });
</script>

</body>
</html>
