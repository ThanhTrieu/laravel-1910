<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virus corona</title>
    {{--  nhung bootstrap css  --}}
    <link href="{{asset('test/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main>
    <div class="container">
        <div class="row my-3" style="min-height: 650px;">
            <div class="col col-12">
                <h1>Thong tin dich benh covid-19</h1>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Quoc gia</th>
                            <th>Nhiem benh</th>
                            <th>Tu vong</th>
                            <th>Khoi benh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // khai bao bien
                            $tongNhiem = 0;
                            $tongTV = 0;
                            $tongKhoi = 0;
                        @endphp

                        @foreach($corona as $key => $item)
                            @php
                                $tongNhiem += $item['nhiem_benh'];
                                $tongTV += $item['tu_vong'];
                                $tongKhoi += $item['khoi_benh'];
                            @endphp
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td> {{ $item['country'] }}</td>
                                <td> {{ number_format($item['nhiem_benh']) }}</td>
                                <td> {{ number_format($item['tu_vong']) }}</td>
                                <td> {{ number_format($item['khoi_benh']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-dark text-white">
                            <td colspan="2">Tong</td>
                            <td>{{ number_format($tongNhiem) }}</td>
                            <td>{{ number_format($tongTV) }}</td>
                            <td>{{ number_format($tongKhoi) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark py-5">
    <div class="container">
        <div class="row my-3">
            <div class="col col-12">
                <p class="text-white text-center">This is content</p>
            </div>
        </div>
    </div>
</footer>

{{--nhung jquery--}}
<script type="text/javascript" src="{{asset('test/js/jquery-3.5.1.min.js')}}"></script>
</body>
</html>
