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
        CCERMS || Registration
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="canonical" href="https://www.creative-tim.com/product/material-kit-pro" />
    <meta name="keywords"
        content="bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, material, material kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, premium bootstrap 4 ui kit, premium template, bootstrap 4 template">
    <meta name="description"
        content="Start Your Development With A Badass Bootstrap 4 UI Kit inspired by Material Design">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <link href="../assets/css/material-kit.mind1f1.css?v=2.2.0" rel="stylesheet" />

</head>

<body class="signup-page sidebar-collapse">
    <div class="page-header header-filter"
        style="background-image: url('../assets/img/bg8.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <h2 class="card-title text-center">Registration</h2>
                        <div class="card-body">
                            <div class="profile-tabs">
                                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#work" role="tab" data-toggle="tab">
                                            <i class="material-icons">person</i>
                                            Student
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#connections" role="tab" data-toggle="tab">
                                            <i class="material-icons">people</i>
                                            Research Personnel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active work" id="work">
                                    <div class="row">
                                        <div class="col-md-7 ml-auto mr-auto ">
                                            <h4 class="title text-center" style="color:black;">Student</h4>
                                            <form method="POST" action="{{ route('register') }}" class="form">
                                                @csrf
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">account_circle</i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name') }}" placeholder="Full Name">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('name') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">email</i>
                                                            </span>
                                                        </div>
                                                        <input type="email" name="email"  class="form-control"
                                                            value="{{ old('email') }}" placeholder="Email">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('email') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">lock</i>
                                                            </span>
                                                        </div>
                                                        <input type="password" name="password"
                                                            class="form-control" placeholder="Password">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('password') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">lock</i>
                                                            </span>
                                                        </div>
                                                        <input type="password"
                                                            name="password_confirmation" class="form-control"
                                                            placeholder="Confirm Password">
                                                    </div>
                                                </span>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">school</i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control selectpicker"
                                                            data-style="btn btn-link" name="course">
                                                            @foreach($courses as $course)
                                                            <option id="course" value="{{ $course->crs_id }}">{{ $course->crs_title }}</option>
                                                            @endforeach


                                                        </select>
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('password') }}</strong>
                                                <br>

                                                <button type="submit"
                                                    class="btn btn-danger btn-block brn-round"><i class="material-icons">forward</i> Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane connections" id="connections">
                                    <div class="row">
                                        <div class="col-md-7 ml-auto mr-auto ">
                                            <h4 class="title text-center" style="color:black;">Research Personnel</h4>
                                            <form method="POST" action="{{ route('registerrp') }}" class="form">
                                                @csrf
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">account_circle</i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name') }}" placeholder="Full Name">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('name') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">email</i>
                                                            </span>
                                                        </div>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ old('email') }}" placeholder="Email">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('email') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">lock</i>
                                                            </span>
                                                        </div>
                                                        <input type="password" name="password"
                                                            class="form-control" placeholder="Password">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('password') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">lock</i>
                                                            </span>
                                                        </div>
                                                        <input type="password"
                                                            name="password_confirmation" class="form-control"
                                                            placeholder="Confirm Password">
                                                    </div>
                                                </span>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">local_library</i>
                                                            </span>
                                                        </div>
                                                        <input type="text" name="specialty"  class="form-control"
                                                            value="{{ old('specialty') }}" placeholder="Specialization">
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('specialty') }}</strong>
                                                <br>
                                                <span class="bmd-form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">account_circle</i>
                                                            </span>
                                                        </div>
                                                        <select  class="form-control selectpicker"
                                                            data-style="btn btn-link" name="usertype">
                                                            @foreach($usertypes as $usertype)
                                                                <option id="usertype" value="{{ $usertype->typ_id }}">{{ $usertype->typ_title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </span>
                                                <strong>{{ $errors->first('usertype') }}</strong>
                                                <br>

                                                <button type="submit"
                                                    class="btn btn-danger btn-block brn-round"> <i class="material-icons">forward</i>Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
    <script src="../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
    <!--	Plugin for Small Gallery in Product Page -->
    <script src="../assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
    <!-- Plugins for presentation and navigation  -->
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-kit.mind1f1.js?v=2.2.0" type="text/javascript"></script>
</body>


</html>
