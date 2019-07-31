<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wedding</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        {{-- Scripts --}}
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/knockout-3.5.0.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('js/sammy-0.7.6.min.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        {{-- CSS style --}}
        <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            {{-- main menu --}}
            <nav>
                <div class="nav-wrapper">
                    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-med-and-down"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="#main" data-bind="">Главная</a></li>
                        <li><a href="#categories" data-bind="">Категории</a></li>
                    </ul>
                </div>
            </nav>
            {{-- side menu --}}
            <ul id="slide-out" class="sidenav">
                <li><a class="waves-effect sidenav-close" href="#main" data-bind="">Главная</a></li>
                <li><a class="waves-effect sidenav-close" href="#categories" data-bind="">Категории</a></li>
            </ul>
            {{-- progress bar --}}
            <div class="progress" data-bind="visible: preloader">
                <div class="indeterminate"></div>
            </div>
            {{-- main window sections --}}
            <section id="main" data-bind="visible: sections.main" class="row"></section>
            <section id="categories" data-bind="visible: sections.categories" class="row"></section>
        </div>

        {{-- main script --}}
        <script>
            // root object
            let RootViewModel = {
                // properties
                sections: {
                    main: ko.observable(true),
                    categories: ko.observable(false),
                },
                preloader: ko.observable(false),
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
                            alert("error: " + text);
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
                /* this.get('#!logout', function () {
                    AMM_ViewModel.showPreloader(true);
                    $.ajax({
                        url: "api/logout",
                        type: 'PUT'
                    }).done(function (resp) {
                        if (resp.error !== null && resp.error !== "") {
                            AMM_ViewModel.showPreloader(false);
                            alert(resp.error);
                        }
                        else {
                            AMM_ViewModel.showPreloader(false);
                            isLogin = false;
                            userLogin = "";
                            AMM_ViewModel.SetLogout();
                            location.hash = "#!login";
                        }
                    }).fail(function (xhr, status, text) {
                        AMM_ViewModel.showPreloader(false);
                        alert("error: " + text);
                    });
                }); */
                this.get('/', function() {
                    location.hash = "#main";
                });
                this.get('#:chunck', function () {
                    RootViewModel.HideAll();
                    RootViewModel.ShowChunck(this.params['chunck']);
                });
            }).run();

            // side menu activation
            $(document).ready(function () {
                $('.sidenav').sidenav();
            });

            // events for pages visualisation
            let mainVisibleEvent = new Event("MainVisible");
            let categoriesVisibleEvent = new Event("CategoriesVisible");

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
        </script>
    </body>
</html>
