
<!-- header -->
<header id="header" class="app-header navbar" role="menu">
<!-- navbar header -->
<div class="navbar-header bg-dark">
  <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
    <i class="glyphicon glyphicon-cog"></i>
  </button>
  <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
    <i class="glyphicon glyphicon-align-justify"></i>
  </button>
  <!-- brand -->
  <a href="/app" class="navbar-brand text-lt">
    <img src="{{ asset('img/logo.png') }}" alt="." class="">
    <span class="hidden-folded m-l-xs">Laravel</span>
  </a>
  <!-- / brand -->
</div>
<!-- / navbar header -->

<!-- navbar collapse -->
<div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
  <!-- buttons -->
  <div class="nav navbar-nav hidden-xs">
    <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
      <i class="fa fa-dedent fa-fw text"></i>
      <i class="fa fa-indent fa-fw text-active"></i>
    </a>
  </div>
  <!-- / buttons -->

  <!-- nabar right -->
  <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
        <span class="hidden-sm hidden-md">管理者</span> <b class="caret"></b>
      </a>
      <!-- dropdown -->
      <ul class="dropdown-menu animated fadeInRight w">
        <li>
          <a href="/setting">
            <span>設定</span>
          </a>
        </li>
        <li>
          <a href="/settinguser">
            <span>ユーザ追加</span>
          </a>
        </li>
        <li>
          <a href="{{ route('logout') }}">
              ログアウト
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
      </ul>
      <!-- / dropdown -->
    </li>
  </ul>
  <!-- / navbar right -->
</div>
<!-- / navbar collapse -->
</header>
<!-- / header -->