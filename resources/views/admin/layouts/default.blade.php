<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
        | M4FM Admin
        @show
    </title>

    <!-- global css -->
    <link href="{{ asset('admin-assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('admin-assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .colorpicker-right:after {
            top: -16px;
        }

        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .image-preview-input-title {
            margin-left: 2px;
        }

        .image_radius {
            border-top-right-radius: 4px !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 4px !important;
        }

        .fileinput .thumbnail>img {
            width: 100%;
        }

        .color_a {
            color: #333;
        }

        .btn-file>input {
            width: auto;
        }

        .form-image-size {
            width: 180px;
            border: solid 1px;
            display: inline-block;
        }

        .theme_datatable {
            border: solid 1px #f1f3f6;
            background: #eff1f4;
            box-shadow: -7px -7px 10px rgb(255 255 255), 7px 7px 10px #d8dbe2;
            border-radius: 10px;
        }

        .theme_bg {
            background: #eff1f4;
        }

        .datatable-icon {
            width: 50px;
            max-height: 50px;
            background: white;
        }

        .btn.btn-sm {
            font-size: 12px !important;
        }
    </style>

    <!-- Flat Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->

<body class="skin-josh">
    <header class="header">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <img src="{{ asset('admin-assets/images/logo.png') }}" class="" alt="logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right toggle">
                <ul class="nav navbar-nav  list-inline">

                    <li class=" nav-item dropdown user user-menu">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            @if(Sentinel::getUser()->pic)
                            <img src="{{ Sentinel::getUser()->pic }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />

                            @elseif(Sentinel::getUser()->gender === "male")
                            <img src="{{ asset('admin-assets/images/authors/avatar3.png') }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />

                            @elseif(Sentinel::getUser()->gender === "female")
                            <img src="{{ asset('admin-assets/images/authors/avatar5.png') }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />

                            @else
                            <img src="{{ asset('admin-assets/images/authors/no_avatar.jpg') }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />
                            @endif
                            <div class="riot">
                                <div>
                                    <p class="user_name_max">{{ Sentinel::getUser()->first_name }} {{
                                        Sentinel::getUser()->last_name }}</p>
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                @if(Sentinel::getUser()->pic)
                                <img src="{{  Sentinel::getUser()->pic }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />

                                @elseif(Sentinel::getUser()->gender === "male")
                                <img src="{{ asset('admin-assets/images/authors/avatar3.png') }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />

                                @elseif(Sentinel::getUser()->gender === "female")
                                <img src="{{ asset('admin-assets/images/authors/avatar5.png') }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />
                                @else
                                <img src="{{ asset('admin-assets/images/authors/no_avatar.jpg') }}" alt="img" height="35px" width="35px" class="rounded-circle img-fluid float-left" />
                                @endif
                                <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{
                                    Sentinel::getUser()->last_name }}</p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="float-right">
                                    <a href="{{ URL::to('admin/logout') }}">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <div class="wrapper ">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side ">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <!-- <div class="nav_icons">
                    <ul class="sidebar_threeicons">
                        <li>
                            <a href="{{ URL::to('admin/advanced_tables') }}">
                                <i class="livicon" data-name="table" title="Advanced tables" data-loop="true"
                                   data-color="#418BCA" data-hc="#418BCA" data-s="25"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/gallery') }}">
                                <i class="livicon" data-name="image" title="Gallery" data-loop="true"
                                   data-color="#F89A14" data-hc="#F89A14" data-s="25"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/users') }}">
                                <i class="livicon" data-name="user" title="Users" data-loop="true"
                                   data-color="#6CC66C" data-hc="#6CC66C" data-s="25"></i>
                            </a>
                        </li>
                    </ul>
                </div> -->
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    @include('admin.layouts._left_menu')
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            <!-- Notifications -->
            <div id="notific">

            </div>

            <!-- Content -->
            @yield('content')

        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('admin-assets/js/admin.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendors/colorpicker/js/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/js/pages/color-picker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('admin-assets/js/pages/form_examples.js') }}"></script>
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{asset('vendors/tinymce/js/tinymce.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/js/pages/editor.js') }}" type="text/javascript"></script>


    <!-- input mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/jquery.inputmask.min.js" integrity="sha512-zdfH1XdRONkxXKLQxCI2Ak3c9wNymTiPh5cU4OsUavFDATDbUzLR+SYWWz0RkhDmBDT0gNSUe4xrQXx8D89JIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".sort-code").inputmask("99-99-99");
        $(".national-insurance-number").inputmask("AA 99 99 99 A");
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });


            tinymce.init({
                selector: '.theme_tinymce',

                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code',
                    'emoticons textcolor paste'
                ],
                paste_as_text: true,
                menubar: 'edit view insert format tools table',
                toolbar1: 'formatselect | bold italic strikethrough  | link | alignleft aligncenter alignright alignjustify  | numlist bullist   | removeformat',
                toolbar2: "media | fontsizeselect fontselect forecolor emoticons",
                image_advtab: true,
                forced_root_block: false,
                fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
                font_formats: 'Roboto=Roboto,Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana',
                content_style: 'body { font-family: Roboto, Helvetica,Arial,sans-serif; font-size:16px }',
                content_css: [
                    '//fonts.googleapis.com/css?family=Roboto:400,400i,500,900',
                    '//www.tinymce.com/css/codepen.min.css'
                ]
            });
            tinymce.init({
                selector: '.theme_heading_tinymce',

                paste_as_text: true,
                theme: 'modern',
                plugins: [
                    "paste",
                    'textcolor'
                ],
                menubar: false,

                forced_root_block: false,
                toolbar1: "fontsizeselect | fontselect | forecolor | bold italic strikethrough | removeformat",

                fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
                font_formats: 'Roboto=Roboto,Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana',
                content_style: 'body { font-family: Roboto, Helvetica,Arial,sans-serif; font-size:16px }',
                content_css: [
                    '//fonts.googleapis.com/css?family=Roboto:400,400i,500,900',
                    '//www.tinymce.com/css/codepen.min.css'
                ]
            });
        });
    </script>

    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Flat picker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".flat-picker").flatpickr({

        });
    </script>
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-2').select2({

            });
        });
    </script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Bootstrap custom file input -->
    <script>
        $('.custom-file-input').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>


    <!-- end of global js -->
    <!-- begin page level js -->

    @stack('scripts')
    @yield('footer_scripts')
    <!-- end page level js -->
</body>

</html>