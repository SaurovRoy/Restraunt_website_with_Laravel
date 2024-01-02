<x-app-layout >
  
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
    <title>
      @yield('title')
    </title>
  </head>
  <body>
    
        
      <div class="container-scroller">
        @include('admin.navbar')
        @yield('body')
      </div>
        @include('admin.adminjs')
  </body>
</html>