<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
   <a class="navbar-brand me-lg-5" href="/">
   <img class="navbar-brand-dark" src="images/download-arrow.svg"/>
   </a>
   <div class="d-flex align-items-center">
      <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
   </div>
</nav>
<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
   <div class="sidebar-inner px-4 pt-3">
      <div class="user-card d-flex d-md-none justify-content-between justify-content-md-center pb-4">
         <div class="d-flex align-items-center">
            <div class="avatar-lg me-4">
               <img src="images/<%= current_user.profile_pic %>" class="card-img-top rounded-circle border-white">
            </div>
            <div class="d-block">
               <h2 class="h5 mb-3">Hi, <%= current_user.username %></h2>
               <a href="/logout" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                  <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  Sign Out
               </a>
            </div>
         </div>
         <div class="collapse-close d-md-none">
            <a href="#sidebarMenu" data-bs-toggle="collapse"
               data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
               aria-label="Toggle navigation">
               <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
               </svg>
            </a>
         </div>
      </div>
      <ul class="nav flex-column pt-3 pt-md-0">
         <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
            <img src="images/download-arrow.svg" height="20" width="20">
            </span>
            <span class="mt-1 sidebar-text">indir1 Overview</span>
            </a>
         </li>

         <li class="nav-item <% if(locals.dash_active) { %> <%= dash_active %> <% } %>">
            <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center justify-content-between">
               <span>
                  <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                       <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                       <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                  </span>
                  <span class="sidebar-text">Dashboard</span>
               </span>
            </a>
         </li>
         <li class="nav-item <% if(locals.latest_active) { %> <%= latest_active %> <% } %>">
            <a href="{{ route('latest') }}" class="nav-link d-flex align-items-center justify-content-between">
               <span>
                  <span class="sidebar-icon">
                     <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                        <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                     </svg>
                  </span>
                  <span class="sidebar-text">Latest Downloads</span>
               </span>
            </a>
         </li>
         <li class="nav-item <% if(locals.faq_active) { %> <%= faq_active %> <% } %>">
            <a href="{{ route('faq') }}" class="nav-link">
               <span class="sidebar-icon">
                 <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
               </span>
               <span class="sidebar-text">FAQs</span>
            </a>
         </li>
         <li class="nav-item <% if(locals.proxy_active) { %> <%= proxy_active %> <% } %>">
            <a href="{{ route('proxy_list') }}" class="nav-link">
               <span class="sidebar-icon">
                  <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg> 
               </span>
               <span class="sidebar-text">Proxy List</span>
            </a>
         </li>
         <li class="nav-item <% if(locals.manage_active) { %> <%= manage_active %> <% } %>">
            <a href="{{ route('manage_admins') }}" class="nav-link">
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
              </span>
               <span class="sidebar-text">Manage Admins</span>
            </a>
         </li>
      </ul>
   </div>
</nav>