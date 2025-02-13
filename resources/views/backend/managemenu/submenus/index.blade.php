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
              <div class="p-1.5 inline-block align-middle leading-none">
                <div class="overflow-hidden app-table-border">
                  <div class="grid app-table-grid">
                    <x-description
                      table-name="Submenus"
                      :page-data="$submenus"
                    />

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('submenus.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/submenus">
                            <x-search
                              search="submenus"
                              placeholder="Search data submenu"
                            />
                          </form>
                        </div>

                        <div class="backup">
                          <x-backup
                            table-name="submenus"
                          />
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('submenus.create')"
                            button-name="submenu"
                          />
                        </div>
                      </div>
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
                          name="menu"
                        />
                        <x-th
                          name="ssm"
                        />
                        <x-th
                          name="name"
                        />
                        <x-th
                          name="route"
                        />
                        <x-th
                          name="active"
                        />
                        <x-th
                          name="routename"
                        />
                        <x-th
                          name="url"
                        />
                        <x-th
                          name="active"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($submenus as $submenu)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <div class="center">
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
                            <x-td-var
                              :var="$submenu->menu->name"
                            />
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

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->route"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->active"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->routename"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->url"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-bg
                              :bg="$submenu->active()['bg']"
                              :text="$submenu->active()['text']"
                              :var="$submenu->active()['active']"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$submenu->id"

                              :show="route(
                                'submenus.show', $submenu->url
                              )"

                              :edit="route(
                                'submenus.edit', $submenu->url
                                )"

                              :delete="route(
                                'submenus.destroy', $submenu->url
                              )"
                            />
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
@endSection
