 <!--begin::Container-->
 <div class="container-fluid">
     <!--begin::Row-->
     <div class="row">
         <div class="col-sm-6">
             <h3 class="mb-0">@yield('title')</h3>
         </div>
         <div class="col-sm-6">
             <ol class="breadcrumb float-sm-end">
                 <li class="breadcrumb-item"><a
                         href="{{ route(config('admlte.dashboard_url')) }}">{{ admlte_translate('home') }}</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">{{ Request::path() }}</li>
             </ol>
         </div>
     </div>
     <!--end::Row-->
 </div>
