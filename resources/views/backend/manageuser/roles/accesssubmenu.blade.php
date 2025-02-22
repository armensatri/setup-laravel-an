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

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <section class="w-full px-4 mt-8 mb-5">
        <div class="max-w-[85rem] mx-auto">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto min-w-full">
              <div class="p-1.5 inline-block xl:max-w-full align-middle leading-none">
                <div class="overflow-hidden app-table-border">
                  <div class="grid app-table-grid">
                    <x-description
                      table-name="access submenus"
                      :page-data="$submenus"
                    />

                    <div class="indexs">
                      <x-indexs
                        :route="route('roles.index')"
                        name="back to roles"
                      />
                    </div>
                  </div>

                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                      <tr>
                        <x-th
                          name="no"
                        />
                        <x-th
                          name="id"
                        />
                        <x-th
                          name="ssm"
                        />
                        <x-th
                          name="submenu"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($submenus as $submenu)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <div class="my-1 center">
                              <x-td-var
                                :var="$loop->iteration . '.'"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$submenu->id"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$submenu->ssm"
                              />
                            </div>
                          </td>


                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->name"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <div class="center">
                              <input type="checkbox"
                                {{ \App\Helpers\SubmenuAccess::
                                checkaccesssubmenu($role['id'], $submenu['id']) }}
                                data-role="{{ $role['id'] }}"
                                data-submenu="{{ $submenu['id'] }}"
                                data-role-name="{{ $role['name'] ?? '' }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 rounded-md cursor-pointer access-checkbox"
                              />
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid app-table-footer">
                    @if ($submenus->lastPage() > 1)
                      <x-pagination
                        :pagination="$submenus"
                      />
                    @endif
                  </div>
                </div>
              </div>
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
          const menuId = this.getAttribute("data-submenu"); // Ambil menu_id
          const isChecked = this.checked ? 1 : 0; // 1 = Insert, 0 = Delete

          try {
            const response = await fetch("{{ route('changeaccesssubmenu') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                  .content,
              },
              body: JSON.stringify({
                role_id: roleId,
                submenu_id: menuId,
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
                window.location.href = "{{ route('accesssubmenu', [':id', ':name']) }}"
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
