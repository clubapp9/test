          <!-- Main Header -->
          <header class="main-header">

            <!-- Logo -->
            <a href="{!!route('home')!!}" class="logo"><img src="{!!route('home')!!}/vintvine.png"
                                                            style="width:2.5em;height:2.5em;"></a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menus.language-picker.language') }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li>{!! link_to('lang/en', trans('menus.language-picker.langs.en')) !!}</li>
					  <li>{!! link_to('lang/es', trans('menus.language-picker.langs.es')) !!}</li>
					  <li>{!! link_to('lang/fr-FR', trans('menus.language-picker.langs.fr-FR')) !!}</li>
                      <li>{!! link_to('lang/it', trans('menus.language-picker.langs.it')) !!}</li>
                      <li>{!! link_to('lang/pl', trans('menus.language-picker.langs.pl')) !!}</li>
                      <li>{!! link_to('lang/pt-BR', trans('menus.language-picker.langs.pt-BR')) !!}</li>
                      <li>{!! link_to('lang/ru', trans('menus.language-picker.langs.ru')) !!}</li>    
                      <li>{!! link_to('lang/sv', trans('menus.language-picker.langs.sv')) !!}</li>
                    </ul>
                  </li>-->

                  <!-- Messages: style can be found in dropdown.less-->

                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image 2 the navbar-->
                      <img src="{!! access()->user()->picture !!}" class="user-image" alt="User Image"/>
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs">{{ access()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                        <img src="{!! access()->user()->picture !!}" class="img-circle" alt="User Image" />
                        <p>
                          {{ access()->user()->name }}
                          <small>{{ trans('strings.member_since') }}</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                        <div class="col-xs-4 text-center">
                          <a href="#">Link</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Link</a>
                        </div>
                        <div class="col-xs-4 text-center">
                          <a href="#">Link</a>
                        </div>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">{{ trans('navs.button') }}</a>
                        </div>
                        <div class="pull-right">
                          <a href="{!!url('auth/logout')!!}" class="btn btn-default btn-flat">{{ trans('navs.logout') }}</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
