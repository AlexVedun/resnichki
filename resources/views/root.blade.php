<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resnichki</title>

        {{-- Icons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
        {{-- CSS style --}}
        <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        {{-- Scripts --}}
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/knockout-3.5.0.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('js/sammy-0.7.6.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/js.cookie.js') }}"></script>
        <script src="{{ asset('js/global.js') }}"></script>
    </head>
    <body>
        <header>
            <div class="container">
                {{-- main menu --}}
                <div class="custom-nav">
                    <nav class="">
                        <div class="nav-wrapper">
                            {{-- <div class="brand-logo">
                                <img class="responsive-img" src="{{url('images/logo.png')}}">
                            </div> --}}
                            <a href="#main" class="brand-logo">
                                <img style="border-radius: 0px;" class="z-depth-0" src="{{url('images/logo_wo_border.svg')}}">
                                <img hidden id="logo-with-border" style="border-radius: 0px;" class="z-depth-0" src="{{url('images/logo.svg')}}">
                            </a>
                            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-med-and-down"><i class="material-icons">menu</i></a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="#main" data-bind="" class="tooltipped main-menu" data-position="bottom" data-tooltip="Главная"><i class="material-icons black-text">home</i></a></li>
                                <li><a href="#categories" data-bind="" class="tooltipped main-menu" data-position="bottom" data-tooltip="Категории"><i class="material-icons black-text">view_comfy</i></a></li>
                                <li><a href="#login" data-bind="hidden: isLogin" class="tooltipped main-menu" data-position="bottom" data-tooltip="Вход"><i class="icon ion-md-log-in black-text"></i></a></li>
                                <li><a href="#account" data-bind="visible: isLogin" class="tooltipped main-menu" data-position="bottom" data-tooltip="Личный кабинет"><i class="material-icons black-text">account_circle</i></a></li>
                                <li><a href="#logout" data-bind="visible: isLogin" class="tooltipped main-menu" data-position="bottom" data-tooltip="Выход"><i class="icon ion-md-log-out black-text"></i></a></li>
                                {{-- <li><a href="#main" data-bind="" class="tooltipped main-menu" data-position="bottom" data-tooltip="Главная"><img href="{{ asset('images/home.svg') }}"></a></li>
                                <li><a href="#categories" data-bind="" class="tooltipped main-menu" data-position="bottom" data-tooltip="Категории"><i class="material-icons black-text">view_comfy</i></a></li>
                                <li><a href="#login" data-bind="hidden: isLogin" class="tooltipped main-menu" data-position="bottom" data-tooltip="Вход"><i class="icon ion-md-log-in black-text"></i></a></li>
                                <li><a href="#account" data-bind="visible: isLogin" class="tooltipped main-menu" data-position="bottom" data-tooltip="Личный кабинет"><i class="material-icons black-text">account_circle</i></a></li>
                                <li><a href="#logout" data-bind="visible: isLogin" class="tooltipped main-menu" data-position="bottom" data-tooltip="Выход"><i class="icon ion-md-log-out black-text"></i></a></li> --}}
                            </ul>
                        </div>
                    </nav>
                </div>

                {{-- side menu --}}
                <ul id="slide-out" class="sidenav">
                    <li>
                        <div class="background center-align">
                            <img class="z-depth-0 logo-image" src="{{url('images/logo.svg')}}">
                        </div>
                    </li>
                    <li><div class="divider"></div></li>
                    <li><a class="waves-effect sidenav-close" href="#main" data-bind=""><i class="material-icons black-text">home</i>Главная</a></li>
                    <li><a class="waves-effect sidenav-close" href="#categories" data-bind=""><i class="material-icons black-text">view_comfy</i>Категории</a></li>
                    <li><a class="waves-effect sidenav-close" href="#login" data-bind="hidden: isLogin"><i class="small icon ion-md-log-in black-text"></i>Вход</a></li>
                    <li><a class="waves-effect sidenav-close" href="#account" data-bind="visible: isLogin"><i class="material-icons black-text">account_circle</i>Личный кабинет</a></li>
                    <li><a class="waves-effect sidenav-close" href="#logout" data-bind="visible: isLogin"><i class="small icon ion-md-log-out black-text"></i>Выход</a></li>
                </ul>
            </div>
        </header>
        {{-- progress bar --}}
        <div class="preloader-background">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <main>
            <div class="container">
                {{-- main window sections --}}
                <section id="main" data-bind="visible: sections.main" class="row"></section>
                <section id="categories" data-bind="visible: sections.categories" class="row"></section>
                <section id="category" data-bind="visible: sections.category" class="row"></section>
                <section id="offer" data-bind="visible: sections.offer" class="row"></section>
                <section id="user" data-bind="visible: sections.user" class="row"></section>
                <section id="performer" data-bind="visible: sections.performer" class="row"></section>
                <section id="login" data-bind="visible: sections.login" class="row"></section>
                <section id="admin" data-bind="visible: sections.admin" class="row"></section>
                <section id="offer_editor" data-bind="visible: sections.offer_editor" class="row"></section>
                <section id="add_user" data-bind="visible: sections.add_user" class="row"></section>
                <section id="category_editor" data-bind="visible: sections.category_editor" class="row"></section>
                <section id="change_password" data-bind="visible: sections.change_password" class="row"></section>
            </div>
        </main>
        {{-- footer --}}
        {{-- <div class="container">
            <footer class="page-footer">
                <div class="container">
                    <div class="row">
                        <a class="white-text" href="#login">Служебный вход</a>
                    </div>
                </div>
            </footer>
        </div> --}}
        {{-- Modal window --}}
        <div id="message-modal" class="modal">
            <div class="modal-content">
                <!-- Место для динамического добавления контента на клиенте -->
                <span class="center-align"><h4></h4></span>
                <div id="modal-message">

                </div>
            </div>
            <div class="modal-footer">
                <a id="modalOk" href="" class="modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>

        <div id="yesno-modal" class="modal">
            <div class="modal-content">
                <!-- Место для динамического добавления контента на клиенте -->
                <span class="center-align"><h4></h4></span>
                <div id="modal-message">

                </div>
            </div>
            <div class="modal-footer">
                <a id="modalNo" href="" class="modal-close waves-effect waves-red btn-flat">Отмена</a>
                <a id="modalOk" href="" class="modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>

        {{-- main script --}}
        <script>
            // root object
            let RootViewModel = {
                // properties
                sections: {
                    main: ko.observable(true),
                    categories: ko.observable(false),
                    category: ko.observable(false),
                    offer: ko.observable(false),
                    user: ko.observable(false),
                    performer: ko.observable(false),
                    login: ko.observable(false),
                    admin: ko.observable(false),
                    offer_editor: ko.observable(false),
                    add_user: ko.observable(false),
                    category_editor: ko.observable(false),
                    change_password: ko.observable(false),
                },
                isLogin: ko.observable(false),
                // methods
                HideAll: function() {
                    for (const key in this.sections) {
                        if (this.sections.hasOwnProperty(key)) {
                            const element = this.sections[key];
                            element(false);
                        }
                    }
                },
                PreloaderShow: function() {
                    $('.preloader-background').fadeIn('fast');
                },
                PreloaderHide: function() {
                    $('.preloader-background').fadeOut('fast');
                },
                ShowChunck: function (_chunck) {
                    this.HideAll();
                    this.PreloaderShow();
                    let $page = $(document.body).find("section#" + _chunck);
                    if ($page.find(">:first-child").length == 0) {
                        $.ajax({
                            url: "api/chunck/" + _chunck,
                            type: 'GET'
                        }).done(function (html) {
                            if (html) {
                                RootViewModel.PreloaderHide();
                                $page.html(html);
                                RootViewModel.sections[_chunck](true);
                            }
                        }).fail(function (xhr, status, text) {
                            RootViewModel.PreloaderHide();
                            ShowModalError('#main', xhr);
                        });
                    } else {
                        this.PreloaderHide();;
                        this.sections[_chunck](true);
                    }
                },
            }

            // main object activating
            ko.applyBindings(RootViewModel);

            // routing
            Sammy(function () {
                this.get('#logout', function () {
                    RootViewModel.PreloaderShow();
                    $.ajax({
                        url: "api/logout",
                        type: 'GET',
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader("Authorization", 'Bearer '+ Cookies.get('wedding_token'));
                        }
                    }).done(function (resp) {
                        RootViewModel.isLogin(false);
                        localStorage.removeItem('user_role');
                        RootViewModel.PreloaderHide();
                        location.hash = "#main";
                    }).fail(function (xhr, status, text) {
                        RootViewModel.PreloaderHide();
                        //alert("error: " + text);
                        location.hash = "#main";
                    });
                });
                this.get('#account', function(){
                    switch (localStorage.getItem('user_role')) {
                        case 'admin':
                            location.hash = '#admin';
                            break;
                        case 'perf':
                            location.hash = '#performer';
                            break;
                        default:
                            location.hash = '/';
                    }
                });
                this.get('#admin', function() {
                    switch (localStorage.getItem('user_role')) {
                        case 'admin':
                            RootViewModel.HideAll();
                            RootViewModel.ShowChunck('admin');
                            break;
                        case 'perf':
                            ShowMessageBox('Ошибка!', 'Вы не авторизованы для выполнения этой операции!', '#main');
                            break;
                        default:
                            location.hash = '/';
                    }
                });
                this.get('/', function() {
                    location.hash = "#main";
                });
                this.get('#:chunck', function () {
                    RootViewModel.HideAll();
                    RootViewModel.ShowChunck(this.params['chunck']);
                });
                this.get('#:chunck/:param', function () {
                    RootViewModel.HideAll();
                    chunckParams['param'] = this.params['param'];
                    RootViewModel.ShowChunck(this.params['chunck']);
                });
            }).run();

            // side menu activation
            $(document).ready(function () {
                $('.sidenav').sidenav();
            });

            $(document).ready(function(){
                $('.modal').modal();
            });

            $(document).ready(function(){
                $('.tooltipped').tooltip();
            });

            // events for pages visualisation
            let mainVisibleEvent = new Event("MainVisible");
            let categoriesVisibleEvent = new Event("CategoriesVisible");
            let categoryVisibleEvent = new Event("CategoryVisible");
            let offerVisibleEvent = new Event("OfferVisible");
            let userVisibleEvent = new Event("UserVisible");
            let performerVisibleEvent = new Event("PerformerVisible");
            let adminVisibleEvent = new Event("AdminVisible");
            let offerEditorVisibleEvent = new Event("OfferEditorVisible");
            let addUserVisibleEvent = new Event("AddUserVisible");
            let categoryEditorVisibleEvent = new Event("CategoryEditorVisible");
            let changePasswordVisibleEvent = new Event("ChangePasswordVisible");

            RootViewModel.sections.main.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(mainVisibleEvent);
                }
            });

            RootViewModel.sections.categories.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(categoriesVisibleEvent);
                }
            });

            RootViewModel.sections.category.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(categoryVisibleEvent);
                }
            });

            RootViewModel.sections.offer.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(offerVisibleEvent);
                }
            });

            RootViewModel.sections.user.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(userVisibleEvent);
                }
            });

            RootViewModel.sections.performer.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(performerVisibleEvent);
                }
            });

            RootViewModel.sections.admin.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(adminVisibleEvent);
                }
            });

            RootViewModel.sections.offer_editor.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(offerEditorVisibleEvent);
                }
            });

            RootViewModel.sections.add_user.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(addUserVisibleEvent);
                }
            });

            RootViewModel.sections.category_editor.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(categoryEditorVisibleEvent);
                }
            });

            RootViewModel.sections.change_password.subscribe(function (newValue) {
                if (newValue) {
                    document.dispatchEvent(changePasswordVisibleEvent);
                }
            });

            // check if user is login
            $.ajax({
                url: "api/user/checkout",
                type: 'GET',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", 'Bearer '+ Cookies.get('wedding_token'));
                }
            }).done(function (resp) {
                RootViewModel.isLogin(true);
                localStorage.setItem('user_role', resp.role);
                //userRole = resp.role;
            })
            .fail(function (xhr, status, text) {
                if(location.hash == '#performer' || location.hash == '#admin') {
                    RootViewModel.isLogin(false);
                    location.hash = '#login';
                }
            });
        </script>
    </body>
</html>
