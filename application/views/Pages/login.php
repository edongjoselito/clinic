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
    <link href="<?= base_url(); ?>assets/css/fonts.css" rel="stylesheet" type="text/css" />
    <style>
        * { font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif; }
        body {
            min-height: 100vh;
            margin: 0;
            background: #eef3f9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .login-shell {
            display: flex;
            width: 100%;
            max-width: 920px;
            min-height: 560px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(15, 45, 90, 0.14);
        }

        /* ===== Brand panel ===== */
        .brand-panel {
            flex: 0 0 380px;
            background: linear-gradient(160deg, #1e88e5 0%, #1565c0 55%, #0d47a1 100%);
            color: #fff;
            padding: 48px 42px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        .brand-panel::before {
            content: '';
            position: absolute;
            top: -90px; right: -90px;
            width: 280px; height: 280px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }
        .brand-panel::after {
            content: '';
            position: absolute;
            bottom: -120px; left: -80px;
            width: 300px; height: 300px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }
        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }
        .brand-logo .mark {
            width: 46px; height: 46px;
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .brand-logo .mark i { color: #fff; }
        .brand-logo span { font-weight: 700; font-size: 17px; letter-spacing: 0.2px; }
        .brand-copy { margin-top: auto; position: relative; z-index: 1; }
        .brand-copy h1 {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.25;
            margin: 0 0 14px;
        }
        .brand-copy p {
            color: rgba(255,255,255,0.82);
            font-size: 14px;
            line-height: 1.6;
            margin: 0 0 26px;
        }
        .brand-feats { list-style: none; margin: 0; padding: 0; }
        .brand-feats li {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255,255,255,0.9);
            font-size: 13.5px;
            font-weight: 500;
            padding: 7px 0;
        }
        .brand-feats li i {
            width: 26px; height: 26px;
            background: rgba(255,255,255,0.14);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        /* ===== Form panel ===== */
        .form-panel {
            flex: 1;
            padding: 56px 56px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-panel .heading { margin-bottom: 30px; }
        .form-panel .heading h2 {
            color: #1c2b3a;
            font-weight: 700;
            font-size: 24px;
            margin: 0 0 6px;
        }
        .form-panel .heading p { color: #8a9bb0; font-size: 14px; margin: 0; }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #5a6b7d;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .input-wrap { position: relative; }
        .input-wrap > .ph {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9fb0c0;
            font-size: 17px;
        }
        .form-control {
            height: 48px;
            border: 1.5px solid #dfe7ee;
            border-radius: 10px;
            padding-left: 44px;
            padding-right: 16px;
            font-size: 14px;
            font-weight: 500;
            color: #1c2b3a;
            background: #f8fafc;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            border-color: #1e88e5;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(30,136,229,0.1);
            outline: none;
        }
        .input-wrap.has-toggle .form-control { padding-right: 48px; }
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
        .password-toggle:hover, .password-toggle:focus {
            outline: none;
            background: rgba(30,136,229,0.08);
            color: #1565c0;
        }
        .btn-login {
            width: 100%;
            height: 50px;
            margin-top: 6px;
            background: linear-gradient(135deg, #1e88e5 0%, #1565c0 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: 0.3px;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(30,136,229,0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(30,136,229,0.4);
        }
        .alert {
            border: none;
            border-radius: 10px;
            padding: 13px 16px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .alert-danger { background: #fdecea; color: #c62828; }
        .alert-success { background: #e8f5e9; color: #2e7d32; }
        .alert .close { padding: 0; margin: -4px 0 0; opacity: 0.6; }
        .error { color: #c62828; font-size: 12.5px; font-weight: 600; margin: -12px 0 16px; }
        .login-footer { margin-top: 34px; text-align: center; }
        .login-footer small { color: #9fb0c0; font-size: 12px; }

        /* Compact brand header on small screens */
        .brand-panel .brand-copy { display: block; }
        @media (max-width: 820px) {
            body { padding: 0; }
            .login-shell { flex-direction: column; min-height: 100vh; border-radius: 0; max-width: none; }
            .brand-panel { flex: none; padding: 26px 28px; min-height: 0; }
            .brand-panel::before, .brand-panel::after { display: none; }
            .brand-copy { margin-top: 0; }
            .brand-copy h1 { font-size: 19px; margin-bottom: 4px; }
            .brand-copy p, .brand-feats { display: none; }
            .form-panel { padding: 34px 26px 30px; }
        }
    </style>
</head>
<body>

    <div class="login-shell">

        <!-- Brand panel -->
        <div class="brand-panel">
            <div class="brand-logo">
                <span class="mark"><i class="ph ph-hospital"></i></span>
                <span>Clinic Management</span>
            </div>
            <div class="brand-copy">
                <h1>Run your clinic,<br>beautifully simple.</h1>
                <p>Appointments, patient records, billing and reports — everything in one place.</p>
                <ul class="brand-feats">
                    <li><i class="ph ph-calendar-check"></i>Appointments &amp; patient queue</li>
                    <li><i class="ph ph-stethoscope"></i>Diagnoses &amp; medical history</li>
                    <li><i class="ph ph-receipt"></i>Billing, receipts &amp; reports</li>
                </ul>
            </div>
        </div>

        <!-- Form panel -->
        <div class="form-panel">
            <div class="heading">
                <h2>Welcome back</h2>
                <p>Sign in to your account to continue</p>
            </div>

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

            <div class="login-footer">
                <small>Clinic Management System &copy; <?= date('Y'); ?></small>
            </div>
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
