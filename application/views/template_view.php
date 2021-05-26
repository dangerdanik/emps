<?php
/*session_start();
debug($_SESSION);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Сотрдники</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link href="/css/addons/datatables.min.css" rel="stylesheet"></link>
    <script src="/js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/addons/datatables.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/admin.js"></script>
    <link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
</head>
<body>
<br>
<div class="container">
    <a href="/">На главную</a>
</div>
<div class="container">
    <div id="page">

        <div id="content">
            <div class="box">
                <?php include 'application/views/' . $content_view; ?>
            </div>
            <br class="clearfix"/>
        </div>
        <br class="clearfix"/>
    </div>
    <div id="page-bottom">
        <div id="page-bottom-sidebar">

        </div>
        <div id="page-bottom-content">

        </div>
        <br class="clearfix"/>
    </div>
</div>
<div class="container">
    <a href="/">Сотрудники</a> &copy; <?= date("Y") ?></a>
</div>
</body>
</html>