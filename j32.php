<?php

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>jQuery.MiniCalendar</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <div id="wrap">
        <div id="mini-calendar"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script src="js/jquery.minicalendar.js"></script>
    <script type="text/javascript">
        (function($) {
            $(function() {
                $('#mini-calendar').miniCalendar();
            });
        })(jQuery);
    </script>
</body>
</html>