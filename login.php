<?php
$host = 'localhost';
$dbname = 'studiohomeart_db';
$user = 'root';        
$pass = '';            

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die('Ошибка подключения к базе данных');
}

session_start();


if (isset($_SESSION['admin'])) {
    header('Location: admin.php');
    exit;
}

$error = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();
        
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['username'];
            header('Location: admin.php');
            exit;
        } else {
            $error = 'Неверный логин или пароль';
        }
    } else {
        $error = 'Заполните все поля';
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['reg_username'] ?? '';
    $password = $_POST['reg_password'] ?? '';
    $confirm = $_POST['reg_confirm'] ?? '';
    
    if ($username && $password && $confirm) {
        if ($password !== $confirm) {
            $error = 'Пароли не совпадают';
        } elseif (strlen($password) < 6) {
            $error = 'Пароль должен быть не менее 6 символов';
        } else {
            // Проверка существования пользователя
            $check = $pdo->prepare("SELECT id FROM admins WHERE username = ?");
            $check->execute([$username]);
            
            if ($check->fetch()) {
                $error = 'Такой логин уже существует';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
                
                if ($stmt->execute([$username, $hash])) {
                    $success = 'Регистрация успешна! Теперь можно войти.';
                } else {
                    $error = 'Ошибка при регистрации';
                }
            }
        }
    } else {
        $error = 'Заполните все поля';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход для администратора</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            padding: 20px;
        }
        .login-box {
            background: white;
            max-width: 400px;
            width: 100%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .login-tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
        .tab-btn {
            flex: 1;
            padding: 10px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #666;
        }
        .tab-btn.active {
            color: #2d3748;
            border-bottom: 2px solid #2d3748;
            margin-bottom: -2px;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            background: #2d3748;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background: #1a202c;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .error {
            background: #fee;
            color: #c00;
            border: 1px solid #fcc;
        }
        .success {
            background: #efe;
            color: #0a0;
            border: 1px solid #cfc;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #718096;
            text-decoration: none;
        }
        .back-link:hover {
            color: #2d3748;
        }
    </style>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function(m,e,t,r,i,k,a){
        m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
    })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=108460822', 'ym');

    ym(108460822, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/108460822" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1 style="text-align:center; margin-bottom:20px;">StudioHomeArt</h1>
            
            <div class="login-tabs">
                <button class="tab-btn active" onclick="showTab('login')">Вход</button>
                <button class="tab-btn" onclick="showTab('register')">Регистрация</button>
            </div>
            
            <?php if (isset($error) && $error): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if (isset($success) && $success): ?>
                <div class="message success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <!-- Форма входа -->
            <div id="login-tab" class="tab-content active">
                <form method="POST">
                    <input type="hidden" name="login" value="1">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Логин" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Пароль" required>
                    </div>
                    <button type="submit" class="btn">Войти</button>
                </form>
            </div>
            
            <!-- Форма регистрации -->
            <div id="register-tab" class="tab-content">
                <form method="POST">
                    <input type="hidden" name="register" value="1">
                    <div class="form-group">
                        <input type="text" name="reg_username" placeholder="Придумайте логин" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="reg_password" placeholder="Пароль (мин. 6 символов)" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="reg_confirm" placeholder="Подтвердите пароль" required>
                    </div>
                    <button type="submit" class="btn">Зарегистрироваться</button>
                </form>
            </div>
            
            <a href="index.php" class="back-link">← Вернуться на главную</a>
        </div>
    </div>
    
    <script>
    function showTab(tab) {
        document.getElementById('login-tab').classList.remove('active');
        document.getElementById('register-tab').classList.remove('active');
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        
        if (tab === 'login') {
            document.getElementById('login-tab').classList.add('active');
            document.querySelectorAll('.tab-btn')[0].classList.add('active');
        } else {
            document.getElementById('register-tab').classList.add('active');
            document.querySelectorAll('.tab-btn')[1].classList.add('active');
        }
    }
    </script>
</body>
</html>