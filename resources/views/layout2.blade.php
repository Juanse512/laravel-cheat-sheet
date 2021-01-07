<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : SimpleWork
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
  <div id="header-wrapper">
  	<div id="header" class="container">
  		<div id="logo">
  			<h1><a href="#">SimpleWork</a></h1>
  		</div>
  		<div id="menu">
  			<ul>
  				<li class="{{ Request::path() === '/' ? 'current_page_item' : '' }}"><a href="/" accesskey="1" title="">Homepage</a></li>
  				@auth<li><a class="{{ Request::is('articles/create') ? 'current_page_item' : '' }}" href="/articles/create" accesskey="2" title="">Create Article</a></li>@endauth
  				<li class = "{{ Request::path() === 'about' ? 'current_page_item' : '' }}"><a href="/about" accesskey="3" title="">About Us</a></li>
  				<li class = "{{ Request::is('articles') ? 'current_page_item' : '' }}"><a href="/articles" accesskey="4" title="">Articles</a></li>
  				@auth<li><a accesskey="5" title="">{{auth()->user()->name}}</a></li>@endauth
          @guest <li class = "{{ Request::is('login') ? 'current_page_item' : '' }}"><a href="/login" accesskey="6" title="">Log In</a></li> @endguest
          @guest <li class = "{{ Request::is('register') ? 'current_page_item' : '' }}"><a href="/register" accesskey="7" title="">Register</a></li> @endguest
          <li>@auth<form action="{{route('logout')}}" method="post">
              @csrf
              <input type="hidden" name="pdata" value="this is my POST data">
              <input class = "button is-black is-default" type="submit" value="Logout">
              </form>
              @endauth
        </li>
        </ul>
  		</div>
  	</div>
  </div>
 @yield('header')
 @yield('content')

 <div id="copyright" class="container">
 	<p style = "color: black">&copy; Untitled. All rights reserved. | Photos by <a style = "color: black" href="http://fotogrph.com/">Fotogrph</a> | Design by <a style = "color: black" href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
 </div>

</body>
</html>
