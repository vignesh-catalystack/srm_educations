<?php
require_once __DIR__ . '/includes/auth.php';

if (admin_is_logged_in()) {
    header('Location: index.php');
    exit;
}

$error = '';
$redirect = $_GET['redirect'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $redirect = $_POST['redirect'] ?? '';

    if ($username === ADMIN_LOGIN_USERNAME && $password === ADMIN_LOGIN_PASSWORD) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        if (is_string($redirect) && strpos($redirect, '/admin/') !== false) {
            header('Location: ' . $redirect);
        } else {
            header('Location: index.php');
        }
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN | SRM Education</title>
    <meta name="robots" content="noindex, nofollow, noarchive">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700;800&family=Rajdhani:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; }
        .brand { font-family: 'Rajdhani', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-100">
    <div class="min-h-screen grid lg:grid-cols-2">
        <div class="hidden lg:flex items-center justify-center bg-gradient-to-br from-[#1A1A2E] to-[#0B1022] text-white p-14">
            <div class="max-w-md">
                <img src="../assets/images/srm-main-logo.png" alt="SRM" class="h-14 mb-7">
                <h1 class="brand text-5xl font-bold tracking-tight leading-tight">
                    ADMIN <span class="text-[#FF6B2B]">CENTRAL</span>
                </h1>
                <p class="mt-4 text-slate-300 text-base">Secure access to applications, enquiries, and gallery management.</p>
            </div>
        </div>

        <div class="flex items-center justify-center p-6 sm:p-10">
            <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-slate-100 p-7 sm:p-9">
                <div class="mb-7">
                    <p class="text-xs uppercase tracking-[0.22em] font-bold text-slate-400">SRM Education</p>
                    <h2 class="brand text-3xl font-bold text-[#1A1A2E] mt-1">Admin Login</h2>
                </div>

                <?php if ($error): ?>
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 text-red-600 text-sm font-semibold px-4 py-3">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form method="post" class="space-y-4">
                    <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($redirect); ?>">

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Username</label>
                        <input
                            type="text"
                            name="username"
                            required
                            autocomplete="username"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-[#FF6B2B]/20 focus:border-[#FF6B2B]"
                            placeholder="Enter username"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Password</label>
                        <input
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-[#FF6B2B]/20 focus:border-[#FF6B2B]"
                            placeholder="Enter password"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#FF6B2B] hover:bg-[#f25b17] text-white font-bold py-3.5 transition-all shadow-lg shadow-[#FF6B2B]/20"
                    >
                        Sign In
                    </button>
                </form>

                <p class="mt-5 text-xs text-slate-400">
                    Default login: <span class="font-bold text-slate-600">admin</span> / <span class="font-bold text-slate-600">admin@123</span>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
