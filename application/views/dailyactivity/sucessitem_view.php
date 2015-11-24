<!DOCTYPE html>
<html>
    <head>
        <link href="<?= base_url() ?>public/css/styles.css" rel="stylesheet" type="text/css">
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <title>Success View</title>
    </head>
    <script language="javascript">
        //window.opener.location.href=window.opener.location.href;
        window.location.href='http://10.1.2.40/salescrmv3/dailyactivity'
        var msg = "Product Added Sucessfully..!";
        alert(msg);
        var timer = setInterval(function () {
            if (msg.closed) {
                clearInterval(timer);
                alert('closed');
            }
        }, 1000);
        self.close();

    </script>
   

</html>
