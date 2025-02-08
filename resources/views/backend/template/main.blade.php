<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>

    <!-- VITE TAILWIND CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- DEFAULT FONT INTER -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- ICON BOOTSTRAP -->
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"
    />

    <!-- ICON FONTAWESOME -->
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
  </head>

  <body x-data="{
    page: 'ecommerce',
    'stickyMenu': false,
    'sidebarToggle': false,
    'scrollTop': false
    }">

    <div class="flex h-screen overflow-hidden bg-slate-100">
      <!-- SIDEBAR -->
      @include('backend.template.sidebar')

      <div class="relative flex flex-col flex-1 overflow-x-hidden">
        <!-- NAVBAR -->
        @include('backend.template.navbar')

        <!-- CONTENT-BACKEND -->
        @yield('content-backend')
      </div>
    </div>

    <!-- JS BACKEND -->
    <script src="/backend/js/backend.js"></script>
  </body>
</html>
