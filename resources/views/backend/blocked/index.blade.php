{{-- <div class="flex flex-col items-center justify-center min-h-screen">
  <h1 class="text-2xl font-bold text-red-600">Akses Diblokir</h1>
  <p class="text-gray-700">Anda tidak memiliki akses ke halaman ini.</p>

  <a href="{{ \App\Helpers\LoginAccess::getDashboardRoute() }}"
    class="px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
    Kembali ke Dashboard
  </a>
</div> --}}

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

  <body class="bg-blue-500">
    <section class=" dark:bg-gray-900">
      <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
          <div class="max-w-screen-sm mx-auto text-center">
              <h1 class="mb-4 font-extrabold tracking-tight text-7xl lg:text-9xl text-primary-600 dark:text-primary-500">404</h1>
              <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 md:text-4xl dark:text-white">Something's missing.</p>
              <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't find that page. You'll find lots to explore on the home page. </p>
              <a href="#" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back to Homepage</a>
          </div>
      </div>
    </section>
  </body>
</html>

