<!DOCTYPE html>
<html lang="en">

@include('layouts.includes.header')

<body>
    <div class="wrapper">

        @include('layouts.includes.sidebar')

        <div class="main">
            @include('layouts.includes.navbar')

            @yield('content')

            @include('layouts.includes.footer')
        </div>
    </div>

    @include('layouts.includes.script')

</body>

</html>
