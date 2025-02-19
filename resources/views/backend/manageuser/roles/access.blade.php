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
                      table-name="access menu"
                      :page-data="$menus"
                    />
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
                          name="sm"
                        />
                        <x-th
                          name="menu"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($menus as $menu)
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
                                :var="$menu->id"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$menu->sm"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$menu->name"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <div class="center">
                              <input type="checkbox"
                              {{ \App\Helpers\LoginAccess::checkaccess($role['id'], $menu['id']) }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 rounded-md cursor-pointer"
                              />
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid app-table-footer">
                    @if ($menus->lastPage() > 1)
                      <x-pagination
                        :pagination="$menus"
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
@endSection
