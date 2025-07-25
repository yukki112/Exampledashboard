<?php
// --- PHP PLACEHOLDER LOGIC ---
// In a real application, these values would come from your session or database after login.
$isLoggedIn = true; // Assume user is logged in for demonstration
$userName = "Admin Marcus"; // Example user name

// Simulate a scenario where NO profile picture is uploaded
// To test with a picture, change this to a valid URL like:
// $userProfilePic = "https://via.placeholder.com/50/FF5733/FFFFFF?text=AM"; // Example PFP URL
$userProfilePic = ""; // Set to empty string to simulate no picture uploaded

// Determine if a profile picture URL exists and is not empty
$hasProfilePic = !empty($userProfilePic);
// --- END PHP PLACEHOLDER LOGIC ---
?>

<header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
    <h1 class="text-3xl font-bold">Dashboard</h1>

    <?php if ($isLoggedIn) : ?>
        <div class="flex items-center space-x-3">
            <?php if ($hasProfilePic) : ?>
                <img src="<?php echo htmlspecialchars($userProfilePic); ?>"
                     alt="<?php echo htmlspecialchars($userName); ?>'s Profile Picture"
                     class="w-10 h-10 rounded-full object-cover border-2 border-blue-400">
            <?php else : ?>
                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-400">
                    <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            <?php endif; ?>
            <span class="text-lg font-medium hidden md:block"><?php echo htmlspecialchars($userName); ?></span>
        </div>
    <?php endif; ?>
</header>

<section class="p-8 bg-white rounded-lg shadow-md mb-8">
    <div class="mb-4">
        <p class="text-lg font-semibold">Welcome, Admin Marcus!</p>
        <p class="text-gray-600">Overview of your emergency communication system.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-red-100 p-5 rounded-lg shadow-sm border border-red-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-red-800">Active Alerts</h3>
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-red-900 mt-2">3</p>
            <p class="text-sm text-red-700">Currently ongoing emergency alerts</p>
        </div>

        <div class="bg-blue-100 p-5 rounded-lg shadow-sm border border-blue-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-blue-800">Total Registered Users</h3>
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="4 3 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 19.222V18a3 3 0 00-3-3H9a3 3 0 00-3 3v1.222A2 2 0 007.222 21h9.556A2 2 0 0017 19.222zM12 11a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
            </div>
            <p class="text-3xl font-bold text-blue-900 mt-2">1,245</p>
            <p class="text-sm text-blue-700">Users registered in the system</p>
        </div>

        <div class="bg-green-100 p-5 rounded-lg shadow-sm border border-green-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-green-800">Notifications Today</h3>
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-green-900 mt-2">28</p>
            <p class="text-sm text-green-700">Notifications dispatched in the last 24h</p>
        </div>

        <div class="bg-purple-100 p-5 rounded-lg shadow-sm border border-purple-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-purple-800">System Health</h3>
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-3xl font-bold text-purple-900 mt-2">Normal</p>
            <p class="text-sm text-purple-700">All systems operational</p>
        </div>
    </div>
</section>

<section class="p-8 bg-white rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Alerts</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alert ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Time</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">EMG-2025-001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Fire Hazard</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-semibold">Active</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2025-07-23 14:30 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">View</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Resolve</a>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">EMG-2025-002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Weather Warning</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-600 font-semibold">Pending</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2025-07-23 11:00 AM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">View</a>
                        <a href="#" class="text-green-600 hover:text-green-900">Activate</a>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">EMG-2025-003</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Public Safety</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-semibold">Active</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2025-07-23 09:15 AM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">View</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Resolve</a>
                    </td>
                </tr>
                 <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">EMG-2025-004</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">System Maintenance</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-semibold">Completed</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2025-07-22 17:00 PM</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">View Log</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="p-8 bg-white rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg shadow-md flex items-center justify-center transition-colors duration-200">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            New Mass Notification
        </button>
        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-lg shadow-md flex items-center justify-center transition-colors duration-200">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Create New Alert Category
        </button>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-6 rounded-lg shadow-md flex items-center justify-center transition-colors duration-200">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM12 14v5m-3-2h6"></path>
                </svg>
            Manage Users
        </button>
    </div>
</section>

<section class="p-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Communication Channels Status</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">SMS Gateway:</span>
            <span class="text-green-600 font-semibold">Operational</span>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">Email Service:</span>
            <span class="text-green-600 font-semibold">Operational</span>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">Mobile App Push:</span>
            <span class="text-green-600 font-semibold">Operational</span>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">Voice Broadcast:</span>
            <span class="text-orange-600 font-semibold">Degraded (High Load)</span>
        </div>
    </div>
</section>