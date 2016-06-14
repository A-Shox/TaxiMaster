<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon start -->
    <link rel="apple-touch-icon" sizes="57x57" href="/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/img/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/img/favicon/manifest.json">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#000000">
    <!-- Favicon end -->

    <title>Taxi Master</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        html, body, #wrapper {
            height: 100%;
            /*overflow: hidden;*/
        }

    </style>

</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Taxi Master - {{\Illuminate\Support\Facades\Auth::user()->userLevel->name}}</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> {{ Auth::user()->firstName . ' ' . Auth::user() ->lastName}} <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>--}}
                    {{--</li>--}}
                    <li class="divider"></li>
                    <li>
                        <a href="/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 1)->get()))
                    <li class="active">
                        <a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                @endif
                @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 2)->get()))
                    <li>
                        <a href="/neworder"><i class="fa fa-fw fa-plus"></i> New Hire</a>
                    </li>
                @endif
                @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 3)->get()))
                    <li>
                        <a href="/ongoing-orders"><i class="fa fa-fw fa-clock-o"></i> On Going Orders</a>
                    </li>
                @endif
                @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 4)->get()))
                    <li>
                        <a href="/finished-orders"><i class="fa fa-fw fa-history"></i> Order History</a>
                    </li>
                @endif
                @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 5)->get()))
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i
                                    class="fa fa-fw fa-users"></i>
                            Accounts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="/accounts/new"><i class="fa fa-fw fa-user"></i> New Account</a>
                            </li>
                            <li>
                                <a href="/accounts/view"><i class="fa fa-fw fa-list"></i> View Accounts</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-taxi"></i>
                        Taxis <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse">
                        @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 7)->get()))
                            <li>
                                <a href="/taxis/new"><i class="fa fa-fw fa-plus"></i> New Taxi</a>
                            </li>
                        @endif
                        @if(count(\App\UserLevelPrivilege::where('user_level_id', \Illuminate\Support\Facades\Auth::user()->userLevel->id)->where('privilege_id', 8)->get()))
                            <li>
                                <a href="/taxis/view"><i class="fa fa-fw fa-pencil-square-o"></i> View Taxis</a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        @yield('content')
    </div>
</div>
<!-- /#wrapper -->

<!-- Morris Charts JavaScript -->
<script src="/js/plugins/morris/raphael.min.js"></script>
<script src="/js/plugins/morris/morris.min.js"></script>
<script src="/js/plugins/morris/morris-data.js"></script>

</body>

</html>
