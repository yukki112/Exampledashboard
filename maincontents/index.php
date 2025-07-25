<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard - Emergency Communication System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to lay out sidebar and content */
            min-height: 100vh;
            overflow: hidden; /* Prevent body from scrolling */
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

        /* Specific styles for main content scrolling */
        #main-content-area {
            overflow-y: auto; /* Enable vertical scrolling for main content */
            height: 100vh; /* Ensure it takes full viewport height for scrolling context */
        }
    </style>
</head>
<body class="bg-gray-100">

    <?php include '../sidebar/sidebar.php'; // Path to your sidebar.php ?>

    <div id="main-content-area" class="flex-grow p-8 text-gray-800">
        <?php
        // Determine which content to load based on a query parameter
        $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default to dashboard if no 'page' parameter is set

        switch ($page) {
            case 'dashboard':
                include 'dashboard.php';
                break;
            case 'message_composer':
                include 'massnotification/messagecomposer.php';
                break;
            case 'channel_selector':
                include 'massnotification/channelselector.php';
                break;
            case 'recipient_group_manager':
                include 'massnotification/recipientgroupmanager.php';
                break;
            case 'delivery_status_tracker':
                include 'massnotification/deliverystatustracker.php';
                break;
            case 'priority_broadcast_controller': // ADD THIS NEW CASE
                include 'massnotification/prioritybroadcastcontroller.php';
                break;
            // Add other cases for your main modules here
            default:
                // Fallback for any unknown page requests
                include 'dashboard.php';
                break;
        }
        ?>
    </div>

</body>
</html>