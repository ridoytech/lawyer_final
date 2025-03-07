<?php
session_start();

// session_destroy() করার আগে user_type সংরক্ষণ করুন
if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
}

// সেশন ডেটা আনসেট এবং ধ্বংস করুন
session_unset();
session_destroy();

// user_type অনুসারে রিডিরেক্ট করুন
if (isset($user_type)) {
    if ($user_type == 'customer') {
        header('Location: ../index.php');
        exit();
    } elseif ($user_type == 'doctor' || $user_type == 'admin') {
        header('Location: index.php');
        exit();
    }
} else {
    // যদি user_type সেট না থাকে, ডিফল্ট রিডিরেক্ট
    header('Location: ../index.php');
    exit();
}
?>
