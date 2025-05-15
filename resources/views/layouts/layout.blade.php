<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Responsive Sidebar Example</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      overflow-x: hidden;
    }
    /* Sidebar styles */
    #sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      right: 0; /* Right side for RTL */
      width: 250px;
      background-color: #343a40;
      transition: width 0.3s;
      padding-top: 60px;
      z-index: 1040;
    }
    #sidebar.collapsed {
      width: 80px;
    }
    #sidebar .nav-link {
      color: white;
      font-size: 1rem;
    }
    #sidebar .nav-link:hover {
      background-color: #495057;
      color: white;
    }
    #sidebar .nav-link i {
      width: 30px;
      text-align: center;
    }
    #sidebar.collapsed .nav-link span {
      display: none;
    }
    /* Content area */
    #content {
      margin-right: 250px;
      transition: margin-right 0.3s;
      padding: 20px;
    }
    #content.expanded {
      margin-right: 80px;
    }
    /* Responsive: on small screens, sidebar becomes offcanvas */
    @media (max-width: 768px) {
      #sidebar {
        position: fixed;
        top: 0;
        right: -250px;
        height: 100vh;
        width: 250px;
        transition: right 0.3s;
        z-index: 1050;
      }
      #sidebar.show {
        right: 0;
      }
      #content {
        margin-right: 0;
      }
      #content.expanded {
        margin-right: 0;
      }
      #sidebar.collapsed {
        width: 250px;
      }
    }
  </style>
</head>
<body>

<!-- Toggle button -->
<button id="toggleBtn" class="btn btn-primary position-fixed" style="top:10px; right: 10px; z-index:1100;">
  <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<nav id="sidebar" class="bg-dark">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center">
        <i class="fas fa-home"></i> <span>خانه</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center">
        <i class="fas fa-book"></i> <span>کتاب‌ها</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link d-flex align-items-center" data-bs-toggle="collapse" href="#catalogMenu" role="button" aria-expanded="false" aria-controls="catalogMenu">
        <i class="fas fa-list"></i> <span>فهرست‌ها</span>
        <i class="fas fa-chevron-down ms-auto"></i>
      </a>
      <div class="collapse" id="catalogMenu">
        <ul class="nav flex-column ps-3">
          <li class="nav-item"><a href="#" class="nav-link">نویسندگان</a></li>
          <li class="nav-item"><a href="#" class="nav-link">ژانرها</a></li>
          <li class="nav-item"><a href="#" class="nav-link">ناشران</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center">
        <i class="fas fa-book-reader"></i> <span>کتاب‌های امانت داده شده</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link d-flex align-items-center">
        <i class="fas fa-chart-line"></i> <span>گزارشات</span>
      </a>
    </li>
  </ul>
</nav>

<!-- Main content -->
<div id="content">
  <h1>محتوای صفحه</h1>
  <p>اینجا محتوا قرار می‌گیرد...</p>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const toggleBtn = document.getElementById('toggleBtn');
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('content');

  function isSmallScreen() {
    return window.innerWidth <= 768;
  }

  toggleBtn.addEventListener('click', () => {
    if (isSmallScreen()) {
      // On small screen: toggle sidebar drawer
      sidebar.classList.toggle('show');
    } else {
      // On large screen: toggle collapse width
      sidebar.classList.toggle('collapsed');
      content.classList.toggle('expanded');
    }
  });

  // Hide sidebar drawer on clicking any link (small screen)
  sidebar.querySelectorAll('a.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      if (isSmallScreen()) {
        sidebar.classList.remove('show');
      }
    });
  });

  // Optional: close sidebar drawer on clicking outside (small screen)
  document.addEventListener('click', (e) => {
    if (isSmallScreen() && sidebar.classList.contains('show')) {
      if (!sidebar.contains(e.target) && e.target !== toggleBtn) {
        sidebar.classList.remove('show');
      }
    }
  });

  // On window resize, remove classes for consistency
  window.addEventListener('resize', () => {
    if (!isSmallScreen()) {
      sidebar.classList.remove('show');
    } else {
      sidebar.classList.remove('collapsed');
      content.classList.remove('expanded');
    }
  });
</script>

</body>
</html>
