<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>
    CCERMS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />

  {{-- laravel css --}}
  <link rel="stylesheet" href="/css/app.css">

  {{-- material kit css --}}
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="/assets/css/material-kit.mind1f1.css?v=2.2.0" rel="stylesheet" />

 </head>

<body class="landing-page sidebar-collapse">

  <div id="app">

    <router-view > </router-view>
  </div>

  {{-- material js --}}
  <script src="/js/app.js"></script>
  <script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/moment.min.js"></script>
  <script src="/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <script src="/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
  <script src="/assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
  <script src="/assets/js/material-kit.mind1f1.js?v=2.2.0" type="text/javascript"></script>
  {{-- now ui js --}}
</body>

</html>
