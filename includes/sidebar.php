 <?php
  $page =  substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); //this is the sidebar active code 
  $sql = mysqli_query($conn, "SELECT id, logoimage, title, status FROM sitesetting");
  $result = mysqli_fetch_array($sql) ;
 ?>

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">

     <img src="site-settings/images/settingimage/<?Php echo $result ['logoimage']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">W3care</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
       <!-- <img src="site-settings/images/settingimage/<?Php echo $result ['logoimage']; ?>" class="img-circle elevation-2" alt="User Image"> -->
         <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
          <!-- menu-open -->
           <a href="#" class="nav-link <?=$page=="dashbord.php"?'active':'';?>">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="dashbord.php" class="nav-link ">
                 <!-- <i class="far fa-circle nav-icon"></i> -->
                 <i class="nav-icon fas fa-desktop"></i>
                 <p>Dashboard v1</p>
               </a>
             </li>
           </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="logout.php" class="nav-link">
                 <!-- <i class="fas fa-sign-out-alt logout-icon"></i> -->
                 <i class="nav-icon fas fa-sign-out-alt logout-icon"></i>
                 <p>Logout</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link <?=$page=="show-client.php"?'active':'';?>">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Client
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-client.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Add Clint</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link <?=$page=="show-category.php"?'active':'';?>">
             <i class="nav-icon fas fa-book"></i>
             <p>
               Category
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-category.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Add Category</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link <?=$page=="show-project.php"?'active':'';?>">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Project
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-project.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Add Project</p>
               </a>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link <?=$page=="show-settings.php"?'active':'';?> <?=$page=="show-social.php"?'active':'';?>">
             <i class="nav-icon fas fa-cog"></i>
             <p>
               Settings
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-settings.php" class="nav-link <?=$page=="show-settings.php"?'active':'';?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Header Setting</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="show-social.php" class="nav-link <?=$page=="show-social.php"?'active':'';?>">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Social Media Setting</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link <?=$page=="show-banner.php"?'active':'';?>">
             <i class="nav-icon fas fa-flag"></i>
             <p>
               Banner
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-banner.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Add Banner</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link <?=$page=="show-static-pages.php"?'active':'';?><?=$page=="show-about.php"?'active':'';?><?=$page=="show-resume.php"?'active':'';?>">
           <i class="nav-icon fas fa-file-alt"></i>
             <p>
               Static pages
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-static-pages.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Add Static pages</p>
               </a>
             </li>
           </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-about.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>About</p>
               </a>
             </li>
           </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-resume.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Resume</p>
               </a>
             </li>
           </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-faq.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Faq</p>
               </a>
             </li>
           </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-term.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Term</p>
               </a>
             </li>
           </ul>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="show-privacy.php" class="nav-link">
                 <i class="far fa-plus-square nav-icon"></i>
                 <p>Privacy</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-header">EXAMPLES</li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-book"></i>
             <p>
               Pages
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="pages/examples/invoice.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Invoice</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/profile.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Profile</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/e-commerce.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>E-commerce</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/projects.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Projects</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/project-add.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Project Add</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/project-edit.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Project Edit</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/project-detail.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Project Detail</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/contacts.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Contacts</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/faq.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>FAQ</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/contact-us.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Contact us</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon far fa-plus-square"></i>
             <p>
               Extras
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Login & Register v1
                   <i class="fas fa-angle-left right"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item">
                   <a href="pages/examples/login.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Login v1</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="pages/examples/register.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Register v1</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="pages/examples/forgot-password.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Forgot Password v1</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="pages/examples/recover-password.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Recover Password v1</p>
                   </a>
                 </li>
               </ul>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>
                   Login & Register v2
                   <i class="fas fa-angle-left right"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item">
                   <a href="pages/examples/login-v2.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Login v2</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="pages/examples/register-v2.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Register v2</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Forgot Password v2</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="pages/examples/recover-password-v2.html" class="nav-link">
                     <i class="far fa-circle nav-icon"></i>
                     <p>Recover Password v2</p>
                   </a>
                 </li>
               </ul>
             </li>
             <li class="nav-item">
               <a href="pages/examples/lockscreen.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Lockscreen</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Legacy User Menu</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/language-menu.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Language Menu</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/404.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Error 404</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/500.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Error 500</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/pace.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Pace</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/examples/blank.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Blank Page</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="starter.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Starter Page</p>
               </a>
             </li>
           </ul>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
 <!-- Main Sidebar Container end -->


<!-- Profile Update model -->

 <!-- <div class="modal fade" id="ProfileModal" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h4>Add Employee Details</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
      
       <div class="modal-body">
         <form id="myform" method="POST">
           <div class="form-group">
             <label for="name">name</label>
             <input type="text" name="name" id="name" required class="form-control" placeholder="Enter your name">
           </div>
           <div class="form-group">
             <label for="address">Description</label>
             <textarea name="description" id="description" rows="4" cols="40" required class="form-control"></textarea>
             
           </div>
           <div class="modal-footer">
             <button type="submit" id="insert-data" data-dismiss="modal" class="btn btn-success">Save</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div> -->

 <!-- Profile Update model -->

 <!-- <script>
  // Example JavaScript code for handling a click event on a sidebar option
const sidebarOptions = document.querySelectorAll('.sidebar li a');

sidebarOptions.forEach(option => {
  option.addEventListener('click', (event) => {
    // Prevent default link behavior
    event.preventDefault();

    // Add your custom logic here, e.g., show additional content, update main area, etc.
  });
});

 </script> -->