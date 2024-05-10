 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard.index') }}">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->

     <hr />

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/wedding') ? '' : 'collapsed' }}" href="{{ route('wedding.index') }}">
         <i class="bi bi-heart-fill"></i>
         <span>Wedding</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/bride') ? '' : 'collapsed' }}" href="{{ route('bride.index') }}">
         <i class="bi bi-person"></i>
         <span>Pengantin</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/story') ? '' : 'collapsed' }}" href="{{ route('story.index') }}">
         <i class="ri ri-file-paper-2-fill"></i>
         <span>Cerita Cinta</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/events') ? '' : 'collapsed' }}" href="{{ route('events.index') }}">
         <i class="bi bi-card-checklist"></i>
         <span>Acara</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/gallery') ? '' : 'collapsed' }}" href="{{ route('gallery.index') }}">
         <i class="bx bxs-photo-album"></i>
         <span>Galeri</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/wishes') ? '' : 'collapsed' }}" href="{{ route('wishes.index') }}">
         <i class="bi bi-chat-text"></i>
         <span>Ucapan</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/gift') ? '' : 'collapsed' }}" href="{{ route('gift.index') }}">
         <i class="bi bi-gift-fill"></i>
         <span>Pemberian</span>
       </a>
     </li>

     <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/gift') ? '' : 'collapsed' }}" href="{{ route('gift.index') }}">
         <i class="bi bi-share-fill"></i>
         <span>Mengundang Orang</span>
       </a>
     </li>

     <hr />

     <li class="nav-heading">Pages</li>

     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('user.show', Auth::user()->id) ? '' : 'collapsed' }}" href="{{ route('user.show', Auth::user()->id) }}">
         <i class="bi bi-person"></i>
         <span>Profile</span>
       </a>
     </li>

     @if(Auth::user()->is_admin == 1)
     <li class="nav-item">
       <a class="nav-link {{ request()->routeIs('user.index') ? '' : 'collapsed' }}" href="{{ route('user.index') }}">
         <i class="bi bi-person-plus"></i>
         <span>User</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('bank.index') ? '' : 'collapsed' }}" href="{{ route('bank.index') }}">
          <i class="bi bi-currency-dollar"></i>
          <span>Bank</span>
        </a>
      </li>
      @endif

     <hr />

   </ul>

 </aside><!-- End Sidebar-->