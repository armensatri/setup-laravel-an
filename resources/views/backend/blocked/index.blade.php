<div class="flex flex-col items-center justify-center min-h-screen">
  <h1 class="text-2xl font-bold text-red-600">Akses Diblokir</h1>
  <p class="text-gray-700">Anda tidak memiliki akses ke halaman ini.</p>

  <a href="{{ \App\Helpers\LoginAccess::getDashboardRoute() }}"
    class="px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
    Kembali ke Dashboard
  </a>
</div>
