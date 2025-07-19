<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/img/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="font-size: 12px">Digital Library</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li> <a href="{{ route('user-dashboard') }}"><i class='bx bx-home-alt'></i>Dashboard</a></li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
                </li>
                <li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
                </li>
                <li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
                </li>
                <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
                </li>
                <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
                </li>
                <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
                </li>
                <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-plus'></i>
                </div>
                <div class="menu-title">Adding</div>
            </a>
            <ul>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-book'></i>
                        </div>
                        <div class="menu-title">
                            <span
                                style="color: black; margin-right: 5px; font-size: 12px; background-color: goldenrod; font-weight: bold; padding: 2px 4px; border-radius: 5px;">New
                            </span> Book
                        </div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.book.create') }}"><i class='bx bx-radio-circle'></i>
                                create </a>
                        </li>
                        <li> <a href="{{ route('admin.book.list') }}"><i class='bx bx-radio-circle'></i>
                                Book List </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-book'></i>
                        </div>
                        <div class="menu-title">
                            <span
                                style="color: black; margin-right: 5px; font-size: 12px; background-color: goldenrod; font-weight: bold; padding: 2px 4px; border-radius: 5px;">New
                            </span> Authors
                        </div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.author.create') }}"><i class='bx bx-radio-circle'></i>
                                create </a>
                        </li>
                        <li> <a href="{{ route('admin.author.index') }}"><i class='bx bx-radio-circle'></i>
                                Authors List </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-book'></i>
                        </div>
                        <div class="menu-title">
                            <span
                                style="color: black; margin-right: 5px; font-size: 12px; background-color: goldenrod; font-weight: bold; padding: 2px 4px; border-radius: 5px;">New
                            </span> Posts
                        </div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('admin.post.create') }}"><i class='bx bx-radio-circle'></i>
                                create </a>
                        </li>
                        <li> <a href="{{ route('posts.index') }}"><i class='bx bx-radio-circle'></i>
                                View Post </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

    </ul>
