<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sign In | Clinic Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Clinic Management System" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/dts.ico">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2/src/regular/style.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/css/phosphor-overrides.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1565c0 0%, #0d47a1 50%, #1a237e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
        }
        .login-header {
            background: linear-gradient(135deg, #1e88e5 0%, #0d47a1 100%);
            padding: 40px 30px 30px;
            text-align: center;
        }
        .login-header .logo-icon {
            width: 64px;
            height: 64px;
            background: rgba(255,255,255,0.15);
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 32px;
            color: white;
            backdrop-filter: blur(10px);
        }
        .login-header h2 {
            color: white;
            font-weight: 700;
            font-size: 22px;
            margin: 0;
        }
        .login-header p {
            color: rgba(255,255,255,0.8);
            margin: 6px 0 0;
            font-size: 14px;
        }
        .login-body {
            padding: 32px 32px 28px;
        }
        .form-group {
            margin-bottom: 22px;
        }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #37474f;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .input-wrap {
            position: relative;
        }
        .input-wrap > .ph {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #90a4ae;
            font-size: 18px;
        }
        .form-control {
            height: 48px;
            border: 2px solid #e3f2fd;
            border-radius: 10px;
            padding-left: 44px;
            padding-right: 16px;
            font-size: 14px;
            font-weight: 500;
            color: #263238;
            background: #fafafa;
            transition: all 0.25s ease;
        }
        .form-control:focus {
            border-color: #1e88e5;
            background: white;
            box-shadow: 0 0 0 4px rgba(30,136,229,0.1);
            outline: none;
        }
        .input-wrap.has-toggle .form-control {
            padding-right: 48px;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: #78909c;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .password-toggle:hover {
            background: rgba(30,136,229,0.08);
            color: #1565c0;
        }
        .password-toggle:focus {
            outline: none;
            background: rgba(30,136,229,0.12);
            color: #1565c0;
        }
        .btn-login {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.3px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(30,136,229,0.35);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(30,136,229,0.45);
        }
        .alert {
            border: none;
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .alert-danger {
            background: #ffebee;
            color: #c62828;
        }
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
        }
        .alert .close {
            padding: 0;
            margin: -4px 0 0;
            opacity: 0.6;
        }
        .login-footer {
            text-align: center;
            padding: 0 32px 32px;
        }
        .login-footer small {
            color: #90a4ae;
            font-size: 12px;
        }
        @media (max-width: 480px) {
            .login-header { padding: 32px 24px 24px; }
            .login-body { padding: 24px; }
            .login-footer { padding: 0 24px 24px; }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon">
                <i class="ph ph-hospital"></i>
            </div>
            <h2>Clinic Management</h2>
            <p>Sign in to your account</p>
        </div>

        <div class="login-body">
            <?php if($this->session->flashdata('failed')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $this->session->flashdata('failed'); ?>
                </div>
            <?php endif; ?>

            <?php if($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?= validation_errors(); ?>

            <?= form_open('log_in') ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrap">
                        <i class="ph ph-user"></i>
                        <input class="form-control" type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap has-toggle">
                        <i class="ph ph-lock"></i>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off" required>
                        <button type="button" class="password-toggle" id="toggle-password" aria-label="Show password" aria-controls="password">
                            <i class="ph ph-eye"></i>
                        </button>
                    </div>
                </div>

                <button class="btn-login" type="submit" name="submit">
                    <i class="ph ph-sign-in"></i>Sign In
                </button>
            </form>
        </div>

        <div class="login-footer">
            <small>Clinic Management System &copy; <?= date('Y'); ?></small>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/app.min.js"></script>
    <script>
        (function () {
            var passwordInput = document.getElementById('password');
            var toggleButton = document.getElementById('toggle-password');

            if (!passwordInput || !toggleButton) {
                return;
            }

            var toggleIcon = toggleButton.querySelector('i');

            toggleButton.addEventListener('click', function () {
                var isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';
                toggleButton.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');

                if (toggleIcon) {
                    toggleIcon.className = isPassword ? 'ph ph-eye-slash' : 'ph ph-eye';
                }
            });
        }());
    </script>
</body>
</html>
