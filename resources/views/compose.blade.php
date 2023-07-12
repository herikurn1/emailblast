<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Summarecon Email Blast</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->




    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link href="/css/hasna_css/compose.css" rel="stylesheet">
</head>

<body>

    <div>
        <div class="wrapper1">
            <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
                <img src="hasna_img/img.navbar.jpg" alt="Description of the image" class="image-style">
                <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="/home"><b>HOME</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/history"><b>HISTORY</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="openSearchBar()"><b>SEARCH</b></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="search-bar" id="searchbar">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Date">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="wrapper">
            
            <div class="wrapper-navbar-sidebar">
                <div class="sidebar">
                    <div class="button-menu-select-2">
                        <ul class="menu">
                            <li><a href="#">Select Template</a></li>
                        </ul>
                    </div>
                    <div class="button-menu-select">
                        <ul class="menu">
                            <li><a href="/create">Create Email</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="headline-drafts h-100">
                <h1>Composing Email</h1>
                <div class="contents2 h-auto" style="min-height: 67vh;">
                    <div class="login-form mt-0 p-5 h-100 bg-transparent">
                        <form id="form-compose-email" action="/compose/send" method="POST">
                            @csrf
                            <input type="number" id="id" name="id" value="{{ $mail->id ?? 0 }}" hidden required>
                            <div class="form-group">
                                <input name="title" type="title" class="form-control w-100" id="inputTitle" value="{{ $mail->title ?? '' }}"
                                    placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <input name="subject" type="subject" class="form-control w-100" id="inputSubject" value="{{ $mail->subject ?? '' }}"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <input name="from_email" type="email" class="form-control w-100" id="inputEmail" value="{{ $mail->from_email ?? '' }}"
                                    placeholder="From (ex: admin@gmail.com)" required>
                            </div>
                            <div class="form-group">
                                <textarea name="from" class="form-control2" id="from" placeholder="From (ex: administrator)" cols="60" rows="5"
                                    style="animation: reverse" required>{{ $mail->from ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="to" class="form-control2" id="to" placeholder="To (ex: operator)" cols="60" rows="5"
                                    style="animation: reverse" required>{{ $mail->to ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="cc" class="form-control2" id="cc" cols="120" rows="5" placeholder="Bcc/Cc (ex: admin@gmail.com, operator@gmail.com)">{{ $mail->cc ?? '' }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="contents3">
                    <div class="row mt-4 plus float-right" style="margin-right: 1px">
                        <div class="col">
                            <button id="btn-submit-form-compose-email" type="submit" form="form-compose-email" class="col btn btn-green-moon btn-rounded" style="font-weight: bold">
                                Save as Draft
                            </button>
                        </div>
                        <div class="col">
                            <button id="btn-submit-form-compose-email" type="submit" form="form-compose-email" class="col btn btn-orange-moon btn-rounded" style="font-weight: bold">
                                Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        var counter = 0;

        function openSearchBar() {
            counter++;
            const search_box = document.getElementById("searchbar");
            if (counter % 2 == 0) {
                search_box.style.display = "none"
            } else {
                search_box.style.display = "block"
            }
        }
    </script>
</body>

</html>
