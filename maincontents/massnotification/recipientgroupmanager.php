<?php
// --- PHP PLACEHOLDER LOGIC ---
// Assume user is logged in for demonstration
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Set to empty string for no picture, or a valid URL
$hasProfilePic = !empty($userProfilePic);

// Placeholder for recipient groups (in a real app, these would come from a database)
$recipientGroups = [
    ['id' => 'all_users', 'name' => 'All Registered Users', 'count' => 1245],
    ['id' => 'barangay_a', 'name' => 'Barangay A Residents', 'count' => 350],
    ['id' => 'barangay_b', 'name' => 'Barangay B Residents', 'count' => 420],
    ['id' => 'emergency_responders', 'name' => 'Emergency Responders', 'count' => 55],
    ['id' => 'school_officials', 'name' => 'School Officials', 'count' => 30],
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Recipient Group Manager</h1>

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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Organize Your Contacts</h2>
        <p class="text-gray-700 leading-relaxed">
            Efficiently manage and categorize your recipients into customizable groups. This allows for quick and accurate targeting of alerts based on various criteria such as location, role, or risk level.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Manage Recipient Groups</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($recipientGroups as $group) : ?>
                <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2"><?php echo htmlspecialchars($group['name']); ?></h3>
                        <p class="text-gray-600 text-sm">Members: <span class="font-bold"><?php echo number_format($group['count']); ?></span></p>
                    </div>
                    <div class="mt-4 flex space-x-3">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Edit
                        </button>
                        <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            View Members
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Create New Group
            </button>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Import & Export Contacts</h2>
        <p class="text-gray-700 mb-4">
            Bulk import contacts from a CSV file or export existing group members.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Import Contacts (CSV)</h3>
                <label for="csv_upload" class="block text-sm font-medium text-gray-700 mb-1">Upload CSV File</label>
                <input type="file" id="csv_upload" accept=".csv" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-2">Expected CSV format: Name, Phone Number, Email (optional), Group Name (optional)</p>
                <button class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Import
                </button>
            </div>

            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Export Group</h3>
                <label for="export_group_select" class="block text-sm font-medium text-gray-700 mb-1">Select Group to Export</label>
                <select id="export_group_select" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Choose a Group --</option>
                    <?php foreach ($recipientGroups as $group) : ?>
                        <option value="<?php echo htmlspecialchars($group['id']); ?>"><?php echo htmlspecialchars($group['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Export CSV
                </button>
            </div>
        </div>
    </section>

    <div class="flex justify-end space-x-4 mt-6">
        <button type="button" class="inline-flex justify-center py-2 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
            Cancel
        </button>
        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            Save Changes
        </button>
    </div>
</div>