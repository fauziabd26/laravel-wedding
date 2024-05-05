 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
       <a class="nav-link " href="{{ route('dashboard.index') }}">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->

     <hr />

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
         <i class="bi bi-menu-button-wide"></i><span>Wedding</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
         <li>
           <a href="{{ route('wedding.index') }}">
             <i class="bi bi-circle"></i><span>Wedding</span>
           </a>
         </li>
         <li>
           <a href="{{ route('bride.index') }}">
             <i class="bi bi-circle"></i><span>Bride & Groom</span>
           </a>
         </li>
         <li>
           <a href="{{ route('story.index') }}">
             <i class="bi bi-circle"></i><span>Story</span>
           </a>
         </li>
         <li>
           <a href="{{ route('events.index') }}">
             <i class="bi bi-circle"></i><span>Event</span>
           </a>
         </li>
         <li>
           <a href="{{ route('gallery.index') }}">
             <i class="bi bi-circle"></i><span>Gallery</span>
           </a>
         </li>
         <li>
           <a href="{{ route('wishes.index') }}">
             <i class="bi bi-circle"></i><span>Wishes</span>
           </a>
         </li>
         <li>
           <a href="{{ route('gift.index') }}">
             <i class="bi bi-circle"></i><span>Gift</span>
           </a>
         </li>
       </ul>
     </li><!-- End Components Nav -->

     <hr />

     <li class="nav-heading">Pages</li>

     <li class="nav-item">
       <a class="nav-link collapsed" href="{{ route('user.show', Auth::user()->id) }}">
         <i class="bi bi-person"></i>
         <span>Profile</span>
       </a>
     </li><!-- End Profile Page Nav -->

     <hr />

   </ul>

 </aside><!-- End Sidebar-->