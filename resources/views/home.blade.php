<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Download videos from social media online and save them to your PC or Phone. Our video downloader lets you save videos in high quality MP4 format online and for free.">
      <title>Video Downloader - Download Videos From Social Media Online</title>
      <meta name="msapplication-TileColor" content="#b91d47">
      <meta name="theme-color" content="#ffffff">
      <link rel="stylesheet" href="{{ asset('css/public.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
      <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />

   </head>
   <body class="toggle-loading preload home">
      <div id="top" class="prevent-click d-lg-none"></div>
      <nav class="navbar navbar-expand-md ">
        <div class="container">
       <a class="navbar-brand" title="Video Downloader" href="/">indir1.net</a>
       <button class="toggle-button d-lg-none" type="button" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
           <span class="fa fa-bars"></span>
       </button>

       <div class="justify-content-lg-end d-none d-lg-block" id="navbarsExampleDefault">
           <ul class="navbar-nav me-auto mb-2 mb-md-0">
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Downloaders<span class="fa fa-chevron-down"></span></a>
                   <ul class="dropdown-menu" aria-labelledby="dropdown01">
                       <li><a title="Youtube Downloader" class="dropdown-item @if ($dw == 'youtube') checked @endif" href="/?downloader=youtube"><span class="fa fa-check"></span> Youtube Downloader</a></li>
                       <li><a title="Facebook Downloader" class="dropdown-item @if ($dw == 'facebook') checked @endif" href="/?downloader=facebook"><span class="fa fa-check"></span> Facebook Downloader</a></li>
                       <li><a title="Twitter Downloader" class="dropdown-item @if ($dw == 'twitter') checked @endif" href="/?downloader=twitter"><span class="fa fa-check"></span> Twitter Downloader</a></li>
                       <li><a title="Instagram Downloader" class="dropdown-item @if ($dw == 'instagram') checked @endif" href="/?downloader=instagram"><span class="fa fa-check"></span> Instagram Downloader</a></li>
                       <li><a title="Reddit Downloader" class="dropdown-item @if ($dw == 'reddit') checked @endif" href="/?downloader=reddit"><span class="fa fa-check"></span> Reddit Downloader</a></li>
                       <li><a title="Tiktok Downloader" class="dropdown-item @if ($dw == 'tiktok') checked @endif" href="/?downloader=tiktok"><span class="fa fa-check"></span> Tiktok Downloader</a></li>
                       <li><a title="Tedtalk Downloader" class="dropdown-item @if ($dw == 'tedtalk') checked @endif" href="/?downloader=tedtalk"><span class="fa fa-check"></span> Tedtalk Downloader</a></li>
                       <li><a title="Vlive Downloader" class="dropdown-item @if ($dw == 'vlive') checked @endif" href="/?downloader=vlive"><span class="fa fa-check"></span> Vlive Downloader</a></li>
                       <li><a title="Vimeo Downloader" class="dropdown-item @if ($dw == 'vimeo') checked @endif" href="/?downloader=vimeo"><span class="fa fa-check"></span> Vimeo Downloader</a></li>
                       <li><a title="SoundCloud Downloader" class="dropdown-item @if ($dw == 'soundcloud') checked @endif" href="/?downloader=soundcloud"><span class="fa fa-check"></span> SoundCloud Downloader</a></li>
                       <li><a title="Izlesene Downloader" class="dropdown-item @if ($dw == 'izlesene') checked @endif" href="/?downloader=izlesene"><span class="fa fa-check"></span> Izlesene Downloader</a></li>
                   </ul>
               </li>
           </ul>
       </div>

       <div class="nav-mobile d-lg-none">
         <ul class="nav-mobile-menu list-unstyled">
         <li><a title="Youtube Downloader" class="dropdown-item @if ($dw == 'youtube') checked @endif" href="/?downloader=youtube"><span class="fa fa-check"></span> Youtube Downloader</a></li>
            <li><a title="Facebook Downloader" class="dropdown-item @if ($dw == 'facebook') checked @endif" href="/?downloader=facebook"><span class="fa fa-check"></span> Facebook Downloader</a></li>
            <li><a title="Twitter Downloader" class="dropdown-item @if ($dw == 'twitter') checked @endif" href="/?downloader=twitter"><span class="fa fa-check"></span> Twitter Downloader</a></li>
            <li><a title="Instagram Downloader" class="dropdown-item @if ($dw == 'instagram') checked @endif" href="/?downloader=instagram"><span class="fa fa-check"></span> Instagram Downloader</a></li>
            <li><a title="Reddit Downloader" class="dropdown-item @if ($dw == 'reddit') checked @endif" href="/?downloader=reddit"><span class="fa fa-check"></span> Reddit Downloader</a></li>
            <li><a title="Tiktok Downloader" class="dropdown-item @if ($dw == 'tiktok') checked @endif" href="/?downloader=tiktok"><span class="fa fa-check"></span> Tiktok Downloader</a></li>
            <li><a title="Tedtalk Downloader" class="dropdown-item @if ($dw == 'tedtalk') checked @endif" href="/?downloader=tedtalk"><span class="fa fa-check"></span> Tedtalk Downloader</a></li>
            <li><a title="Vlive Downloader" class="dropdown-item @if ($dw == 'vlive') checked @endif" href="/?downloader=vlive"><span class="fa fa-check"></span> Vlive Downloader</a></li>
            <li><a title="Vimeo Downloader" class="dropdown-item @if ($dw == 'vimeo') checked @endif" href="/?downloader=vimeo"><span class="fa fa-check"></span> Vimeo Downloader</a></li>
            <li><a title="SoundCloud Downloader" class="dropdown-item @if ($dw == 'soundcloud') checked @endif" href="/?downloader=soundcloud"><span class="fa fa-check"></span> SoundCloud Downloader</a></li>
            <li><a title="Izlesene Downloader" class="dropdown-item @if ($dw == 'izlesene') checked @endif" href="/?downloader=izlesene"><span class="fa fa-check"></span> Izlesene Downloader</a></li>
         </ul>
       </div>
   </div>
      </nav>
      <section class="hero-container bb bt pb-5">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="hero text-center mt-md-5  py-5 px-3">
                    @if ($dw == 'youtube')
                      <h1>Youtube <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'facebook')
                      <h1>Facebook <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'twitter')
                      <h1>Twitter <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'instagram')
                      <h1>Instagram <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'reddit')
                      <h1>Reddit <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'tiktok')
                      <h1>Tiktok <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'tedtalk') 
                      <h1>Tedtalk <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'vlive') 
                      <h1>Vlive <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'vimeo') 
                      <h1>Vimeo <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'soundcloud') 
                      <h1>SoundCloud <span class='blue'>Video</span> Downloader</h1>
                    @elseif($dw == 'izlesene') 
                      <h1>Izlesene <span class='blue'>Video</span> Downloader</h1>
                    @else  
                      <h1><span class='blue'>Video</span> Downloader</h1>
                    @endif
                     <p class="lead mt-3 mt-lg-5">indir1.net downloader is a fast and free way to download and save social media videos as MP4's. </br> Start by putting the video URL in the box below and click Go.</p>
                  </div>
                  <p class="alert alert-yellow text-center col-lg-12 col-xl-10 p-4 ml-auto mr-auto mb-5">There was an issue generating the download links for this video. Please check the URL and try again</p>
                  <div class="row">
                     <div class="progress-container d-none col-lg-12 col-xl-10 mb-lg-5 m-auto">
                        <div class="progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                     <div class="search-input col-lg-12 col-xl-10 mb-lg-5 m-auto" >
                        <form id="video-form" class="form-inline text-center mb-0">
                           <div class="input-group w-lg-100 w-80 mb-3 mb-lg-0 position-relative">
                              <input type="text" name="url" class="form-control video-link" onclick="this.setSelectionRange(0, this.value.length)" placeholder="Paste video URL..." required="">
                              @if ($dw == 'youtube') 
                              <span class="social-icon fab blue fa-youtube position-absolute"></span>
                              @elseif($dw == 'facebook') 
                              <span class="social-icon fab blue fa-facebook position-absolute"></span>   
                              @elseif($dw == 'twitter') 
                              <span class="social-icon fab blue fa-twitter position-absolute"></span>
                              @elseif($dw == 'instagram') 
                              <span class="social-icon fab blue fa-instagram position-absolute"></span>
                              @elseif($dw == 'tiktok') 
                              <span class="social-icon fab blue fa-tiktok position-absolute"></span>
                              @elseif($dw == 'reddit') 
                              <span class="social-icon fab blue fa-reddit position-absolute"></span>
                              @elseif($dw == 'tedtalk') 
                              <span class="social-icon fab blue fa-tedtalk position-absolute"></span>
                              @elseif($dw == 'vlive') 
                              <span class="social-icon fab blue fa-video position-absolute"></span>
                              @elseif($dw == 'vimeo') 
                              <span class="social-icon fab blue fa-vimeo position-absolute"></span>
                              @elseif($dw == 'soundcloud') 
                              <span class="social-icon fab blue fa-soundcloud position-absolute"></span>
                              @elseif($dw == 'izlesene') 
                              <span class="social-icon fab blue fa-video position-absolute"></span>
                              @else 
                              <span class="social-icon fab blue fa-youtube position-absolute"></span>
                              @endif
                           </div>
                           <button type="submit" class="btn btn-submit btn-primary btn-form ml-lg-3">Go</button>
                        </form>
                        <p class="disclaimer text-center">By using our service you are accepting our <a href='#'>Terms</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="pt-3 pb-4 download-box d-none">
         <div class="container">
            <div class="row">
               <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
                  <div class="row">
                     <div class="col-md-4 position-relative">
                        <div class="p-3">
                           <div class="card-header p-0 position-relative z-index-1">
                              <a href="javascript:;" class="d-block">
                              <img src="#" class="w-100 border-radius-lg shadow">
                              </a>
                           </div>
                           <h5 class="mt-3 title"></h5>
                           <p id="duration"></p>
                           <div class="social-share">
                              <div class="share-icons-sm relative">
                                 <a href="https://www.facebook.com/sharer.php?u=https://indir1.net" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://indir1.net','facebook','height=500,width=800,resizable=1,scrollbars=yes'); return false;" data-label="Facebook" rel="noopener noreferrer nofollow" target="_blank" class="btn btn-facebook btn-simple rounded p-2">
                                 <i class="fab fa-facebook"></i>
                                 </a>
                                 <a href="https://twitter.com/share?url=https://indir1.net" onclick="window.open('https://twitter.com/share?url=https://indir1.net','twitter','height=500,width=800,resizable=1,scrollbars=yes'); return false;" rel="noopener noreferrer nofollow" target="_blank" class="btn btn-twitter btn-simple rounded p-2">
                                 <i class="fab fa-twitter"></i>
                                 </a>
                                 <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://indir1.net" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url=https://indir1.net','linkedin','height=500,width=800,resizable=1,scrollbars=yes'); return false;" rel="noopener noreferrer nofollow" target="_blank" class="btn btn-linkedin btn-simple rounded p-2">
                                 <i class="fab fa-linkedin"></i>
                                 </a>
                                 <a href="https://www.reddit.com/submit?url=https://indir1.net&amp;title=Indir1" onclick="window.open('https://www.reddit.com/submit?url=https://indir1.net&amp;title=indir1','reddit','height=500,width=800,resizable=1,scrollbars=yes'); return false;" rel="noopener noreferrer nofollow" target="_blank" class="btn btn-reddit btn-simple rounded p-2">
                                 <i class="fab fa-reddit"></i>
                                 </a>
                                 <a href="https://tumblr.com/widgets/share/tool?canonicalUrl=https://indir1.net" onclick="window.open('https://tumblr.com/widgets/share/tool?canonicalUrl=https://indir1.net','tumblr','height=500,width=800,resizable=1,scrollbars=yes'); return false;" target="_blank" class="btn btn-tumblr btn-simple rounded p-2" rel="noopener noreferrer nofollow">
                                 <i class="fab fa-tumblr"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <hr class="vertical dark">
                     </div>
                     <div class="col-md-8 position-relative">
                        <div class="p-3">
                           <ul class="nav nav-pills nav-fill p-1 rounded-bottom-0" role="tablist">
                              <li class="nav-item d-none" id="video_items">
                                 <a class="nav-link mb-0 px-0 py-1" href="javascript:;" id="video-tab" data-bs-toggle="tab" data-bs-target="#video">
                                 <span class="ms-1">Video</span>
                                 </a>
                              </li>
                              <li class="nav-item d-none" id="vid_w_s_item">
                                  <a class="nav-link mb-0 px-0 py-1" href="javascript:;" id="video-without-sound-tab" data-bs-toggle="tab" data-bs-target="#video-without-sound">
                                      <span class="ms-1">Without Sound</span>
                                  </a>
                              </li>
                              <li class="nav-item d-none" id="audio_items">
                                  <a class="nav-link mb-0 px-0 py-1" href="javascript:;" id="audio-tab" data-bs-toggle="tab" data-bs-target="#audio">
                                      <span class="ms-1">Audio</span>
                                  </a>
                              </li>
                           </ul>
                           <div class="tab-content">
                              <div class="card h-100 tab-pane fade rounded-top-0" id="video" role="tabpanel" aria-labelledby="video-tab">
                                 <div class="card-body table-responsive">
                                    <table class="table">
                                       <tbody id="tbody_video">
                                          <tr>
                                             <th>Resolution</th>
                                             <th>Size</th>
                                             <th>Download</th>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="card h-100 tab-pane fade rounded-top-0" id="video-without-sound" role="tabpanel" aria-labelledby="video-without-sound-tab">
                                 <div class="card-body table-responsive">
                                    <table class="table">
                                       <tbody id="tbody_vid_w_s">
                                          <tr>
                                             <th>Resolution</th>
                                             <th>Size</th>
                                             <th>Download</th>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                              <div class="card h-100 tab-pane fade rounded-top-0" id="audio" role="tabpanel" aria-labelledby="audio-tab">
                                 <div class="card-body table-responsive">
                                    <table class="table">
                                       <tbody id="tbody_audio">
                                          <tr>
                                             <th>Resolution</th>
                                             <th>Size</th>
                                             <th>Download</th>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="steps bb text-center">
         <div class="container">
            <div class="row">
               <div class="section-intro col-md-12">
                  <h2>How to save videos</h2>
                  <div class="divider"></div>
                  <p>Download your favorite videos by following the three simple steps below.</p>
               </div>
               <div class="col-lg-4">
                  <span class="fa fa-video"></span>
                  <h3>1. Find The Video</h3>
                  <p>Copy the video URL by right clicking the video and selecting copy.</p>
               </div>
               <div class="col-lg-4">
                  <span class="fa fa-video"></span>
                  <h3>2. Paste The Video</h3>
                  <p>Paste the link into the input field above and hit the Go button.</p>
               </div>
               <div class="col-lg-4">
                  <span class="fa fa-video"></span>
                  <h3>3. Download The File</h3>
                  <p>Click on the video file you would like to download. Thats it.</p>
               </div>
            </div>
         </div>
      </section>
      <section class="faq bb">
         <div class="container">
            <div class="row">
               <div class="section-intro text-center col-md-12">
                  <h2>Frequent Questions</h2>
                  <div class="divider"></div>
                  <p>Please check out our FAQ below. Don't see an answer to your question? Feel free to <a href='#'>contact us.</a></p>
               </div>
               <div class="col-md-12">
                  <div class="faq-container">
                    <% faqs.forEach(f => 
                     <div class="question">
                        <h3 class="mb-0"><%= f.faq_q %></h3>
                        <span class="fa fa-minus"></span>
                        <span class="fa fa-plus"></span>
                        <p class="mt-4"><%= f.faq_ans %></p>
                     </div>
                  <% }) %>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <footer class="footer">
         <div class="container">
            <div class="col-lg-11 m-auto">
               <a class="navbar-brand" href="/">indir1.net</a>
               <div class="nav-footer mb-4">
                  <a title="Video Downloader" href="/">Video Downloader</a>
                  <a title="Terms of Service" href="#">Terms of Service</a>
                  <a title="Privacy Policy" href="#">Privacy Policy</a>
                  <a title="Contact" href="#">Contact</a>
               </div>
               <div class="social-icons">
                  <a href="https://www.facebook.com/sharer/sharer.php?u=https://indir1.net"><span class="fab fa-facebook"></span></a>
                  <a href="https://twitter.com/share?text=Best+Video+Downloader+-+Download+Social+Media+Videos+Online&url=https://indir1.net"><span class="fab fa-twitter"></span></a>
                  <a href="https://vk.com/share.php?url=https://indir1.net"><span class="fab fa-vk"></span></a>
                  <a href="https://wa.me/?text=https://indir1.net+-+Video+Downloader+-+Download+Social+Media+Videos+Online"><span class="fab fa-whatsapp"></span></a>
                  <a href="https://www.tumblr.com/share/link?url=https://indir1.net"><span class="fab fa-tumblr"></span></a>
               </div>
               <p class="disclaimer">We are not affiliated, associated, authorized, endorsed by, or in any way officially connected with any of websites we support. We do not host any videos or images on our servers, all rights belong to their respective owners.</p>
               <p class="copyright">&copy; 2022 indir1.net. All rights reserved</p>
            </div>
         </div>
      </footer>
      <a class="scroll-to-top rounded" href="#top" style="display: none;">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Load the javascript! -->
      <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/public.js') }}"></script>
      <script src="{{ asset('js/downloader.js') }}"></script>

   </body>
</html>
