<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Dashboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link type="text/css" href="{{ asset('css/admin/main.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/admin/all.min.css') }}"/>
   </head>
   <body>
      @include("admin.sidebar")
      <main class="content">
         @include("admin.header")
         <div class="d-flex justify-content-between w-100 flex-wrap mt-4">
           <div class="mb-3 mb-lg-0">
              <h1 class="h4">Dashboard</h1>
           </div>
         </div>
         <div class="row justify-content-lg-center mt-4">
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
               <div class="card border-light shadow-sm">
                  <div class="card-body">
                     <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                           <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0" style="margin-right: 1.5rem;"><span class="fa fa-download"></span></div>
                           <div class="d-sm-none">
                              <h2 class="h5">Today</h2>
                              <h3 class="mb-1"><%= total_today %></h3>
                           </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                           <div class="d-none d-sm-block">
                              <h2 class="h5">Today</h2>
                              <h3 class="mb-1"><%= total_today %></h3>
                           </div>
                           <div class="small mt-2">
                             <% if(rate_today >= 0) { %>
                               <span class="fas fa-angle-up text-success"></span>
                               <span class="text-success font-weight-bold"><%= rate_today %>%</span> Since Yesterday
                             <% } else { %>
                               <span class="fas fa-angle-down text-danger"></span>
                               <span class="text-danger font-weight-bold"><%= rate_today %>%</span> Since Yesterday
                             <% } %>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
               <div class="card border-light shadow-sm">
                  <div class="card-body">
                     <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                           <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0" style="margin-right: 1.5rem;"><span class="fa fa-download"></span></div>
                           <div class="d-sm-none">
                              <h2 class="h5">This Week</h2>
                              <h3 class="mb-1"><%= total_one_week %></h3>
                           </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                           <div class="d-none d-sm-block">
                              <h2 class="h5">This Week</h2>
                              <h3 class="mb-1"><%= total_one_week %></h3>
                           </div>
                           <div class="small mt-2">
                             <% if(rate_week >= 0) { %>
                               <span class="fas fa-angle-up text-success"></span>
                               <span class="text-success font-weight-bold"><%= rate_week %>%</span> Since last Week
                             <% } else { %>
                               <span class="fas fa-angle-down text-danger"></span>
                               <span class="text-danger font-weight-bold"><%= rate_week %>%</span> Since last Week
                             <% } %>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4 mb-4">
               <div class="card border-light shadow-sm">
                  <div class="card-body">
                     <div class="row d-block d-xl-flex align-items-center">
                        <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                           <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0" style="margin-right: 1.5rem;"><span class="fa fa-download"></span></div>
                           <div class="d-sm-none">
                              <h2 class="h5">This Month</h2>
                              <h3 class="mb-1"><%= total_one_month %></h3>
                           </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                           <div class="d-none d-sm-block">
                              <h2 class="h5">This Month</h2>
                              <h3 class="mb-1"><%= total_one_month %></h3>
                           </div>
                           <div class="small mt-2">
                             <% if(rate_month >= 0) { %>
                               <span class="fas fa-angle-up text-success"></span>
                               <span class="text-success font-weight-bold"><%= rate_month %>%</span> Since last month
                             <% } else { %>
                               <span class="fas fa-angle-down text-danger"></span>
                               <span class="text-danger font-weight-bold"><%= rate_month %>%</span> Since last month
                             <% } %>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 mb-4">
               <div class="card border-0 bg-blueish shadow">
                  <div class="card-header d-sm-flex flex-row align-items-center border-yellow-200 flex-0">
                     <div class="d-block mb-3 mb-sm-0">
                        <div class="fs-5 fw-normal mb-2">Number of Downloads</div>
                        <h2 class="fs-3 fw-extrabold"><%= total_downloads %></h2>
                        <div class="small mt-2">
                           <span class="fw-normal me-2">Yesterday</span>
                           <% if(rate_today >= 0) { %>
                              <span class="fas fa-angle-up text-success"></span>
                              <span class="text-success font-weight-bold"><%= rate_today %>%</span>
                            <% } else { %>
                              <span class="fas fa-angle-down text-danger"></span>
                              <span class="text-danger font-weight-bold"><%= rate_today %>%</span>
                            <% } %>
                        </div>
                     </div>
                  </div>
                  <div class="card-body p-2">
                     <div id="total_chart"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Row -->
         <div class="row">
            <div class="col-12 col-xl-12 mb-4">
               <div class="card border-0 shadow">
                  <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                     <div class="d-block">
                        <div class="mb-3">
                           <h2 class="fs-3 fw-extrabold">Downloads per Source</h2>
                        </div>
                        <div class="d-flex">
                           <div class="d-flex align-items-center me-3 lh-130">
                              <span class="dot rounded-circle bg-secondary me-2"></span>
                              <span class="fw-normal small">Num Downloads</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body p-2">
                     <div id="chart_per_source"></div>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/admin/apexcharts.min.js') }}"></script>
      <script src="{{ asset('js/admin/sidebar.js') }}"></script>
      <script src="{{ asset('js/admin/charts.js') }}"></script>

   </body>
</html>
