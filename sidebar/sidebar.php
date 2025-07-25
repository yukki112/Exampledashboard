<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to lay out sidebar and content */
            min-height: 100vh;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }
    </style>
</head>
<body class="bg-gray-100">

    <?php
    // Get the current page from the URL query parameter
    // This variable is assumed to be available because sidebar.php is included by index.php
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    // Define which pages belong to the 'Mass Notification' submenu
    $massNotificationPages = [
        'message_composer',
        'channel_selector',
        'recipient_group_manager',
        'delivery_status_tracker',
        'priority_broadcast_controller' // ADD THIS NEW PAGE
    ];

    // Check if the current page is one of the mass notification pages
    $isMassNotificationSubmenuActive = in_array($currentPage, $massNotificationPages);

    // Set classes and data attributes based on the active state
    $submenuToggleState = $isMassNotificationSubmenuActive ? 'open' : 'closed';
    $submenuHiddenClass = $isMassNotificationSubmenuActive ? '' : 'hidden';
    ?>

    <div id="sidebar" class="w-64 bg-gray-900 shadow-xl p-6 flex flex-col h-screen overflow-y-auto custom-scrollbar flex-shrink-0 scroll-smooth">

        <div class="mb-8 text-2xl font-bold text-white flex items-center justify-center">
            <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
           Administrator
        </div>

        <nav class="flex-grow">
            <ul>
                <li class="mb-3">
                    <a href="../maincontents/index.php?page=dashboard" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center
                        <?php echo ($currentPage == 'dashboard') ? 'bg-gray-700 text-white' : ''; ?>">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo ($currentPage == 'dashboard') ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 001 1h3m-6-10v10a1 1 0 001 1h3"></path>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="mass-notification-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isMassNotificationSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $submenuToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isMassNotificationSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592L2 13V7a2 2 0 012-2h7zm0 13.358l2.757 3.322c.1.12.2.22.3.3h1.34c.16 0 .3-.07.4-.18l2.7-3.21a2 2 0 00.5-1.57V7a2 2 0 00-2-2h-7z"></path>
                                </svg>
                                <span class="font-medium">Mass Notification</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isMassNotificationSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="mass-notification-submenu" class="ml-6 mt-2 space-y-2 <?php echo $submenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=message_composer" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'message_composer') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'message_composer') ? 'bg-white' : ''; ?>"></span>
                                    Message Composer
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=channel_selector" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'channel_selector') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'channel_selector') ? 'bg-white' : ''; ?>"></span>
                                    Channel Selector
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=recipient_group_manager" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'recipient_group_manager') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'recipient_group_manager') ? 'bg-white' : ''; ?>"></span>
                                    Recipient Group Manager
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=delivery_status_tracker" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'delivery_status_tracker') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'delivery_status_tracker') ? 'bg-white' : ''; ?>"></span>
                                    Delivery Status Tracker
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=priority_broadcast_controller" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'priority_broadcast_controller') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'priority_broadcast_controller') ? 'bg-white' : ''; ?>"></span>
                                    Priority Broadcast Controller
                                </a>
                            </li>
                            </ul>
                    </div>
                </li>

                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16L2 12l4-4"></path>
                        </svg>
                        <span class="font-medium">Alert Categories</span>
                    </a>
                </li>

                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                        <span class="font-medium">Two-Way Comms</span>
                    </a>
                </li>

                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span class="font-medium">Auto Warnings</span>
                    </a>
                </li>

                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        <span class="font-medium">Multilingual</span>
                    </a>
                </li>

                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="font-medium">Subscriptions</span>
                    </a>
                </li>

                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="font-medium">Audit Log</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="mt-auto pt-6 border-t border-gray-700">
            <ul>
                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <span class="font-medium">Users</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 2v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="font-medium">Reports</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="font-medium">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="font-medium">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('mass-notification-toggle');
            const submenu = document.getElementById('mass-notification-submenu');

            if (toggleButton && submenu) {
                // Initial state set by PHP, so no need for JavaScript to manage initial visibility
                // if the PHP logic handles it correctly on page load.
                // The JavaScript below will only handle click events.

                toggleButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    const isHidden = submenu.classList.contains('hidden');

                    if (isHidden) {
                        submenu.classList.remove('hidden');
                        toggleButton.setAttribute('data-state', 'open');
                        toggleButton.querySelector('svg:last-child').classList.add('rotate-90');
                    } else {
                        submenu.classList.add('hidden');
                        toggleButton.setAttribute('data-state', 'closed');
                        toggleButton.querySelector('svg:last-child').classList.remove('rotate-90');
                    }
                });
            }
        });
    </script>

</body>
</html>