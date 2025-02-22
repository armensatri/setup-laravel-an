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

  <body class="flex items-center justify-center h-screen bg-sky-100">
    <section class="dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto text-center">
                <div class="mb-4 text-4xl font-extrabold tracking-wide text-red-700 uppercase lg:text-5xl text-primary-600">
                  Access blocked
                </div>

                <p class="mb-4 text-lg font-medium tracking-wide text-gray-600 dark:text-gray-700">Anda tidak ada akses ke halaman ini</p>
                <a href="{{ \App\Helpers\LoginAccess::getDashboardRoute() }}">
                  <button type="button" class="inline-flex items-center px-3.5 py-2 text-sm font-medium tracking-wider text-white bg-blue-600 border border-transparent rounded-xl gap-x-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    back dashboard
                  </button>
                </a>
            </div>
        </div>
    </section>
</body>

</html>

