<?php
// 1. Start session to gain access to it
session_start();

// 2. Wipe all session data
$_SESSION = array();
session_unset();
session_destroy();

// 3. Clear the session cookie from the browser
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

/* 4. REDIRECT: We do it two ways to be safe.
   The PHP header is the 'correct' way, but the JavaScript 
   window.location is the 'guaranteed' way if headers are blocked.
*/
header("Location: ../index.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logging out...</title>
    <script type="text/javascript">
        // This is the safety net. If the page stays white, this kicks in.
        window.location.href = "../index.php";
    </script>
</head>
<body>
    <p>Redirecting to login... If not, <a href="../index.php">click here</a>.</p>
</body>
</html>