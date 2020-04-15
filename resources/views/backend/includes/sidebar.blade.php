          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel">
                <div class="pull-left image">
                  <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info" style="color:#000;">
                  <p>{{ access()->user()->name }}</p>
                  <!-- Status -->
                  <a href="#" style="color: #000;"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
              </div>

              <!-- search form (Optional) -->
              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="{{ trans('strings.search_placeholder') }}"/>
                  <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
              <!-- /.search form -->

              <!-- Sidebar Menu -->
              <ul class="sidebar-menu">
                <!--<li class="header" style="background-color:#fff;color:#000;">{{-- trans('menus.general') --}}</li> -->

                <!-- Optionally, you can add icons to the links -->
                <li class="{{ Active::pattern('admin/dashboard') }}"><a href="{!!route('admin.dashboard')!!}"><span>{{ trans('menus.dashboard') }}</span></a></li>

                  @permission('view-access-management')
                  <!--<li class="{{ Active::pattern('admin/access/*') }}"><a href="{!!url('admin/access/users')!!}"><span>{{-- trans('menus.access_management') --}}</span></a></li> -->
                  @endauth

                  @permission('view-menus-management')
                  <!--<li class="{{ Active::pattern('admin/menus/*') }}"><a href="{!!url('admin/menus')!!}"><span>{{ trans('menus.menus_management') }}</span></a></li>-->
                  @endauth

                  @permission('view-pages-management')
                  <!--<li class="{{ Active::pattern('admin/pages/*') }}"><a href="{!!url('admin/pages')!!}"><span>{{ trans('menus.pages_management') }}</span></a></li>
                  -->
                  @endauth

                  @permission('view-groups-management')
                  <!--<li class="{{ Active::pattern('admin/groups/*') }}"><a href="{!!url('admin/groups')!!}"><span>{{ trans('menus.groups_management') }}</span></a></li>
                  -->
                  @endauth

                  @permission('view-billing-management')
                  <!--<li class="{{ Active::pattern('admin/billing/*') }}">
                  <a href="#"> {!!url('admin/billing/users')!!}"<span>{{ trans('menus.billing_management') }}</span></a></li>
                  -->
                  @endauth



                  <li class="{{ Active::pattern(array('admin/wine/*', 'admin/wine')) }} treeview">
                      <a href="#">
                          <span>{{ trans('menus.portfolio_management') }}</span>
                          <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu {{ Active::pattern(array('admin/wine/*', 'admin/wine'), 'menu-open') }}" style="display: none; {{ Active::pattern(array('admin/wine/*', 'admin/wine'), 'display: block;') }}">
                          <li class="{{ Active::pattern('admin/wine/index') }}">
                              <a href="{!! url('admin/wine') !!}">{{ trans('menus.show_wine') }}</a>
                          </li>
                          <li class="{{ Active::pattern('admin/wine/create') }}">
                              <a href="{!! url('admin/wine/create') !!}">{{ trans('menus.add_wine') }}</a>
                          </li>

                      </ul>
                  </li>

                  <li class="{{ Active::pattern(array('admin/wine/inventory_locations/*', 'admin/wine/inventory_locations')) }} treeview">
                      <a href="#">
                          <span>Locations</span>
                          <i class="fa fa-angle-left pull-right"></i>
                      </a>

                      <ul class="treeview-menu {{ Active::pattern(array('admin/wine/inventory_locations/*', 'admin/wine/inventory_locations'), 'menu-open') }}" style="display: none; {{ Active::pattern('admin/wine/wine_locations*', 'display: block;') }}">
                          <li class="{{ Active::pattern('admin/wine/inventory_locations') }}">
                              <a href="{!! url('admin/wine/inventory_locations/create') !!}">{{ trans('menus.locations') }}</a>
                          </li>
                      </ul>
                  </li>

                  <li class="{{ Active::pattern(array('admin/wine/inventory/*', 'admin/wine/inventory')) }} treeview">
                      <a href="#">
                          <span>Inventory</span>
                          <i class="fa fa-angle-left pull-right"></i>
                      </a>

                      <ul class="treeview-menu {{ Active::pattern(array('admin/wine/inventory/*', 'admin/wine/inventory'), 'menu-open') }}" style="display: none; {{ Active::pattern('admin/wine/inventory*', 'display: block;') }}">
                          <li class="{{ Active::pattern('admin/wine/inventory') }}">
                              <a href="{!! url('admin/wine/inventory/create') !!}">{{ trans('menus.add_inventory') }}</a>
                          </li>
                          <li class="{{ Active::pattern('admin/csvimport/imported') }}">
                              <a href="{!! url('admin/wine/inventory/remove') !!}">{{ trans('menus.remove_inventory') }}</a>
                          </li>

                          <li class="{{ Active::pattern('admin/csvimport/imported') }}">
                              <a href="{!! url('admin/wine/inventory/transfer') !!}">{{ trans('menus.transfer_inventory') }}</a>
                          </li>
                      </ul>
                  </li>


<!--
                  <li class="{{-- Active::pattern('admin/settings/*') --}} treeview">
                      <a href="#">
                          <span>{{-- trans('menus.settings') --}}</span>
                          <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu {{-- Active::pattern('admin/settings/*', 'menu-open') --}}" style="display: none; {{-- Active::pattern('admin/settings/*', 'display: block;') --}}">
                          <li class="{{-- Active::pattern('admin/settings') --}}">
                              <a href="{!! url('admin/settings') !!}">{{-- trans('menus.settings_general') --}}</a>
                          </li>
                      </ul>
                  </li> -->

              </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>
