<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whiterock Conservancy</title>
    <meta name="description" content="Whiterock Conservancy">
    <meta name="keywords" content="conservation, recreation, camping, ecology, weddings, family reunions, land management, mountain biking, mountain bike trail, horseback riding, overnight, excursion, activity, activities,
      refuge, tallgrass, prairie, ponds, fishing, family, fun, inter-generational, generation,
      oak savannah, native, plant, ecosystem, sustainable, agriculture, farm, buffalo,
      grasses, forbes, volunteers, scientists, prairie enthusiasts, preservation, children, family,
      teachers, outdoor classroom, learning, studies, collection, Iowa, natural heritage,
      mowing, brush cutting, prescribed burns, manage, restoration, process, acre, acreage,
      birding, birds, mushrooming, hiking, wildlife, viewing, watching, nature hike,
      visitors, workshops, artist, trails, visitor center, map">
    <link href="/Content/bootstrap.css" rel="stylesheet" />
    <link href="/Content/bootstrap-theme.css" rel="stylesheet" />
    <script src="/Scripts/modernizr-2.8.3.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand visible-xs">Whiterock Conservancy</a>
            </div>
            <div class="navbar-collapse collapse">
        				<ul class="nav navbar-nav navbar-right">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li><a href="{{ url('/manage/trails') }}">Trails</a></li>
                  <li><a href="{{ url('/manage/issues') }}">Issues</a></li>
        					@if (Auth::guest())
        						<li><a href="{{ url('/auth/login') }}">Login</a></li>
        						<li><a href="{{ url('/auth/register') }}">Register</a></li>
        					@else
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
        							<ul class="dropdown-menu" role="menu">
        								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
        							</ul>
        						</li>
        					@endif
        				</ul>
            </div>
        </div>
    </div>

    <div class="container body-content">
        @yield('content')

        <hr />
        <footer>
            <p>
                &copy;
                <script>document.write(new Date().getFullYear())</script> - Whiterock Conservancy<br />
                <span class="visible-lg">Large</span>
                <span class="visible-md">Medium</span>
                <span class="visible-sm">Small</span>
                <span class="visible-xs">Extra Small</span>
                <span class="visible-print">Print</span>
            </p>
        </footer>
    </div>

    <script src="/Scripts/jquery-2.1.3.min.js"></script>
    <script src="/Scripts/bootstrap.min.js"></script>
    <script src="/Scripts/respond.min.js"></script>

</body>
</html>
