<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-image" role="button" aria-expanded="false"
        aria-controls="sidebar-special">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M21.9999 14.7024V16.0859C21.9999 16.3155 21.9899 16.5471 21.9699 16.7767C21.6893 19.9357 19.4949 22 16.3286 22H7.67126C6.06806 22 4.71535 21.4797 3.74341 20.5363C3.36265 20.1864 3.042 19.7753 2.7915 19.3041C3.12217 18.9021 3.49291 18.462 3.85363 18.0208C4.46485 17.289 5.05603 16.5661 5.42677 16.0959C5.97788 15.4142 7.43078 13.6196 9.44481 14.4617C9.85563 14.6322 10.2164 14.8728 10.547 15.0833C11.3586 15.6247 11.6993 15.7851 12.2705 15.4743C12.9017 15.1335 13.3125 14.4617 13.7434 13.76C13.9739 13.388 14.2043 13.0281 14.4548 12.6972C15.547 11.2736 17.2304 10.8926 18.6332 11.7348C19.3346 12.1559 19.9358 12.6872 20.4969 13.2276C20.6172 13.3479 20.7374 13.4592 20.8476 13.5695C20.9979 13.7198 21.4989 14.2211 21.9999 14.7024Z"
                    fill="currentColor"></path>
                <path opacity="0.4"
                    d="M16.3387 2H7.67134C4.27455 2 2 4.37607 2 7.91411V16.086C2 17.3181 2.28056 18.4119 2.79158 19.3042C3.12224 18.9022 3.49299 18.4621 3.85371 18.0199C4.46493 17.2891 5.05611 16.5662 5.42685 16.096C5.97796 15.4143 7.43086 13.6197 9.44489 14.4618C9.85571 14.6323 10.2164 14.8729 10.5471 15.0834C11.3587 15.6248 11.6994 15.7852 12.2705 15.4734C12.9018 15.1336 13.3126 14.4618 13.7435 13.759C13.9739 13.3881 14.2044 13.0282 14.4549 12.6973C15.5471 11.2737 17.2305 10.8927 18.6333 11.7349C19.3347 12.1559 19.9359 12.6873 20.497 13.2277C20.6172 13.348 20.7375 13.4593 20.8477 13.5696C20.998 13.7189 21.499 14.2202 22 14.7025V7.91411C22 4.37607 19.7255 2 16.3387 2Z"
                    fill="currentColor"></path>
                <path
                    d="M11.4543 8.79668C11.4543 10.2053 10.2809 11.3783 8.87313 11.3783C7.46632 11.3783 6.29297 10.2053 6.29297 8.79668C6.29297 7.38909 7.46632 6.21509 8.87313 6.21509C10.2809 6.21509 11.4543 7.38909 11.4543 8.79668Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Image Processing</span>
        <i class="right-icon">
            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </i>
    </a>
    <ul class="sub-nav collapse" id="sidebar-image" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('inprocessbooking') ? 'active' : '' }}"
                href="{{ route('inprocessbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> INP </i>
                <span class="item-name">In-Process Bookings</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special" role="button" aria-expanded="false"
        aria-controls="sidebar-special">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4"
                    d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z"
                    fill="currentColor"></path>
                <path
                    d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z"
                    fill="currentColor"></path>
                <path
                    d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z"
                    fill="currentColor"></path>
                <path
                    d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Booking Mgmt</span>
        <i class="right-icon">
            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </i>
    </a>
    <ul class="sub-nav collapse" id="sidebar-special" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('pendingbooking') ? 'active' : '' }}" href="{{ route('pendingbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> PEN </i>
                <span class="item-name">Pending Bookings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('acceptbooking') ? 'active' : '' }} " href="{{ route('acceptbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> ACC </i>
                <span class="item-name">Accepted Bookings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('rejectbooking') ? 'active' : '' }}" href="{{ route('rejectbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> REJ </i>
                <span class="item-name">Rejected Bookings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('allbooking') ? 'active' : '' }}" href="{{ route('allbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> ALL </i>
                <span class="item-name">All Bookings</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::is('unsignedbooking') ? 'active' : '' }}" href="{{ route('unsignedbooking') }}">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4"
                    d="M16.6643 21.9897H7.33488C5.88835 22.0796 4.46781 21.5781 3.3989 20.6011C2.4219 19.5312 1.92041 18.1107 2.01032 16.6652V7.33482C1.92041 5.88932 2.4209 4.46878 3.3979 3.39889C4.46781 2.42189 5.88835 1.92041 7.33488 2.01032H16.6643C18.1089 1.92041 19.5284 2.4209 20.5973 3.39789C21.5733 4.46878 22.0758 5.88832 21.9899 7.33482V16.6652C22.0788 18.1107 21.5783 19.5312 20.6013 20.6011C19.5314 21.5781 18.1109 22.0796 16.6643 21.9897Z"
                    fill="currentColor"></path>
                <path
                    d="M17.0545 10.3976L10.5018 16.9829C10.161 17.3146 9.7131 17.5 9.24574 17.5H6.95762C6.83105 17.5 6.71421 17.4512 6.62658 17.3634C6.53895 17.2756 6.5 17.1585 6.5 17.0317L6.55842 14.7195C6.56816 14.261 6.75315 13.8317 7.07446 13.5098L11.7189 8.8561C11.7967 8.77805 11.9331 8.77805 12.011 8.8561L13.6399 10.4785C13.747 10.5849 13.9028 10.6541 14.0683 10.6541C14.4286 10.6541 14.7109 10.3615 14.7109 10.0102C14.7109 9.83463 14.6428 9.67854 14.5357 9.56146C14.5065 9.52244 12.9554 7.97805 12.9554 7.97805C12.858 7.88049 12.858 7.71463 12.9554 7.61707L13.6078 6.95366C14.2114 6.34878 15.1851 6.34878 15.7888 6.95366L17.0545 8.22195C17.6485 8.81707 17.6485 9.79268 17.0545 10.3976Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Unsigned Bookings</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-pickup" role="button" aria-expanded="false"
        aria-controls="sidebar-special">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4"
                    d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                    fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Pick-Up Mgmt</span>
        <i class="right-icon">
            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </i>
    </a>
    <ul class="sub-nav collapse" id="sidebar-pickup" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('otwbooking') ? 'active' : '' }}" href="{{ route('otwbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> OTW </i>
                <span class="item-name">On the Way</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('collectedbooking') ? 'active' : '' }}"
                href="{{ route('collectedbooking') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> COL </i>
                <span class="item-name">Collected</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::is('collectorlist') ? 'active' : '' }}" href="{{ route('collectorlist') }}">
        <i class="icon">
            <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24"
                fill="none">
                <path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z"
                    fill="currentColor" stroke="currentColor" />
                <path
                    d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20"
                    stroke="currentColor" />
            </svg>
        </i>
        <span class="item-name">Collector Availability</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-superadmin" role="button" aria-expanded="false"
        aria-controls="sidebar-superadmin">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                    fill="currentColor"></path>
                <path opacity="0.4"
                    d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">User</span>
        <i class="right-icon">
            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </i>
    </a>
    <ul class="sub-nav collapse" id="sidebar-superadmin" data-bs-parent="#sidebar-menu">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('superadminlist') ? 'active' : '' }}" href="{{ route('superadminlist') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> S </i>
                <span class="item-name">Superadmin List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('adminlist') ? 'active' : '' }}" href="{{ route('adminlist') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> A </i>
                <span class="item-name">Admin List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('sp.collectorlist') ? 'active' : '' }}" href="{{ route('sp.collectorlist') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> C </i>
                <span class="item-name">Collector List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('clientlist') ? 'active' : '' }}" href="{{ route('clientlist') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> C </i>
                <span class="item-name">Client List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('adduser') ? 'active' : '' }}" href="{{ route('adduser') }}">
                <i class="icon">
                    <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor">
                            </circle>
                        </g>
                    </svg>
                </i>
                <i class="sidenav-mini-icon"> + </i>
                <span class="item-name">Add Users</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link {{ Route::is('analytic') ? 'active' : '' }}" href="{{ route('analytic') }}">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10.1528 5.55559C10.2037 5.65925 10.2373 5.77027 10.2524 5.8844L10.5308 10.0243L10.669 12.1051C10.6705 12.3191 10.704 12.5317 10.7687 12.7361C10.9356 13.1326 11.3372 13.3846 11.7741 13.3671L18.4313 12.9316C18.7196 12.9269 18.998 13.0347 19.2052 13.2313C19.3779 13.3952 19.4894 13.6096 19.5246 13.8402L19.5364 13.9802C19.2609 17.795 16.4592 20.9767 12.6524 21.7981C8.84555 22.6194 4.94186 20.8844 3.06071 17.535C2.51839 16.5619 2.17965 15.4923 2.06438 14.389C2.01623 14.0624 1.99503 13.7326 2.00098 13.4026C1.99503 9.31279 4.90747 5.77702 8.98433 4.92463C9.47501 4.84822 9.95603 5.10798 10.1528 5.55559Z"
                    fill="currentColor"></path>
                <path opacity="0.4"
                    d="M12.8701 2.00082C17.43 2.11683 21.2624 5.39579 22.0001 9.81229L21.993 9.84488L21.9729 9.89227L21.9757 10.0224C21.9652 10.1947 21.8987 10.3605 21.784 10.4945C21.6646 10.634 21.5014 10.729 21.3217 10.7659L21.2121 10.7809L13.5313 11.2786C13.2758 11.3038 13.0214 11.2214 12.8314 11.052C12.6731 10.9107 12.5719 10.7201 12.5433 10.5147L12.0277 2.84506C12.0188 2.81913 12.0188 2.79102 12.0277 2.76508C12.0348 2.55367 12.1278 2.35384 12.2861 2.21023C12.4444 2.06662 12.6547 1.9912 12.8701 2.00082Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Recycle Analytic</span>
    </a>
</li>
{{-- <li class="nav-item">
    <a class="nav-link {{ Route::is('multi-profile') ? 'active' : '' }}" href="{{ route('multi-profile') }}">
        <i class="icon">
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z"
                    fill="currentColor"></path>
                <path opacity="0.4"
                    d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z"
                    fill="currentColor"></path>
            </svg>
        </i>
        <span class="item-name">Profile</span>
    </a>
</li> --}}
