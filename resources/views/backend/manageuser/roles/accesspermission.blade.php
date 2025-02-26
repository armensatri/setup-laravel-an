@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-4 mt-8 mb-5">
        <div class="app-cse-border">

          <div class=" rounded-2xl">
            <div class="grid h-[320px] grid-cols-1 overflow-y-scroll gap-8
              md:grid-cols-2 lg:grid-cols-3">
              @foreach ($groupper as $controller => $permissions)
                <fieldset>
                  <legend class="mb-2 ml-2 text-sm font-medium tracking-wide text-red-600">
                    {{ ucfirst($controller) }}Controller
                  </legend>

                  @foreach ($permissions as $permission)
                    <div class="flex items-center px-1 ml-1">
                      <div>
                        <div class="flex items-center">
                          <input type="checkbox"
                            {{ \App\Helpers\PermissionAccess::
                            checkaccesspermission($role->id, $permission->id) }}
                            data-role="{{ $role->id }}"
                            data-permission="{{ $permission->id }}"
                            data-role-name="{{ $role->name ?? '' }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 rounded-md cursor-pointer access-checkbox"
                          />
                        </div>
                      </div>

                      <div class="font-normal
                        text-gray-600 text-[15px] whitespace-nowrap p-2 py-1.5 tracking-wide">
                        {{ $permission->id }} - {{ $permission->name }}
                      </div>
                    </div>
                  @endforeach
                </fieldset>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".access-checkbox").forEach((checkbox) => {
        checkbox.addEventListener("change", async function () {
          const roleId = this.getAttribute("data-role"); // Ambil role_id
          const roleName = this.getAttribute("data-role-name"); // Ambil role_name
          const menuId = this.getAttribute("data-permission"); // Ambil menu_id
          const isChecked = this.checked ? 1 : 0; // 1 = Insert, 0 = Delete

          try {
            const response = await fetch("{{ route('changeaccesspermission') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                  .content,
              },
              body: JSON.stringify({
                role_id: roleId,
                permission_id: permissionId,
                is_checked: isChecked,
              }),
            });

            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
              Swal.fire({
                title: "Success",
                text: result.message,
                icon: "success",
              }).then(() => {
                window.location.href = "{{ route('accesspermission', [':id', ':name']) }}"
                  .replace(":id", roleId)
                  .replace(":name", encodeURIComponent(roleName)); // Ganti kedua parameter
              });
            } else {
              throw new Error(result.message);
            }
          } catch (error) {
            console.error("Error:", error);
            Swal.fire("Error", "Something went wrong!", "error");
            this.checked = !this.checked; // Revert jika error
          }
        });
      });
    });
  </script>
@endSection
