<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Assignment</title>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">    
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">    
    </head>
    <body style="padding-top: 50px;">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                            </ul>
                        </li>
                    </ul>                  
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->            
        </nav>
        
        <div class="row">
            <div class="col-md-2">
                <nav class="navbar navbar-inverse" style="border-radius: 0;padding-top: 10px;min-height: 720px;">    
                    <h3>Dashboard</h3>  
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ Request::is('categories') ? 'active' : '' }}"><a href="{{route('categories.index')}}">Categories</a></li>
                        <li class="{{ Request::is('sub-categories') ? 'active' : '' }}"><a href="{{route('sub-categories.index')}}">Sub-Categories</a></li>
                        <li class="{{ Request::is('partners') ? 'active' : '' }}"><a href="{{route('partners.index')}}">Partners</a></li>
                        <li class="{{ Request::is('products') ? 'active' : '' }}"><a href="{{route('products.index')}}">Products</a></li>
                    </ul>                                       
                </nav>            
            </div>
            <div class="col-md-10">
