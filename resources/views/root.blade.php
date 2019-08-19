<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resnichki</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        {{-- Scripts --}}
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/knockout-3.5.0.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('js/sammy-0.7.6.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/js.cookie.js') }}"></script>
        <script src="{{ asset('js/global.js') }}"></script>
        {{-- CSS style --}}
        <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
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
                            <a href="/" class="brand-logo">
                                <img style="border-radius: 6px;" class="z-depth-1" src="{{url('images/logo3.svg')}}">
                            </a>
                            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-med-and-down"><i class="material-icons">menu</i></a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="#main" data-bind="">Главная</a></li>
                                <li><a href="#categories" data-bind="">Категории</a></li>
                                <li><a href="#account" data-bind="visible: isLogin">Личный кабинет</a></li>
                                <li><a href="#logout" data-bind="visible: isLogin">Выход</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                {{-- side menu --}}
                <ul id="slide-out" class="sidenav">
                    <li><a class="waves-effect sidenav-close" href="#main" data-bind="">Главная</a></li>
                    <li><a class="waves-effect sidenav-close" href="#categories" data-bind="">Категории</a></li>
                    <li><a class="waves-effect sidenav-close" href="#account" data-bind="visible: isLogin">Личный кабинет</a></li>
                    <li><a class="waves-effect sidenav-close" href="#logout" data-bind="visible: isLogin">Выход</a></li>
                </ul>
            </div>
        </header>
        <main>
            <div class="container">
                {{-- progress bar --}}
                <div class="progress" data-bind="visible: preloader">
                    <div class="indeterminate"></div>
                </div>
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
            </div>
        </main>
        {{-- footer --}}
        <div class="container">
            <footer class="page-footer">
                <div class="container">
                    <div class="row">
                        <a class="white-text" href="#login">Служебный вход</a>
                    </div>
                </div>
            </footer>
        </div>
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
                },
                preloader: ko.observable(false),
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
                    this.preloader(true);
                },
                PreloaderHide: function() {
                    this.preloader(false);
                },
                ShowChunck: function (_chunck) {
                    this.HideAll();
                    this.PreloaderShow();
                    let $page = $(document.body).find("section#" + _chunck);
                    if ($page.find(">:first-child").length == 0) {
                        $.ajax({
                            url: "api/chunck/" + _chunck,
                            //data: { Chunck: _chunck },
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
                            //alert("error: " + text);
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
                            xhr.setRequestHeader("Authorization", 'Bearer '+ Cookies.get('wedding_token') /* localStorage.getItem('wedding_token') */);
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
                    switch (localStorage.getItem('user_role')/* userRole */) {
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
                    switch (localStorage.getItem('user_role')/* userRole */) {
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

            // check if user is login
            $.ajax({
                url: "api/user/checkout",
                type: 'GET',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", 'Bearer '+ Cookies.get('wedding_token') /* localStorage.getItem('wedding_token') */);
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
