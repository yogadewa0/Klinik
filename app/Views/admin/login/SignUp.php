<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/asset-admin/css/signup.css">

</head>
<body>
    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <div class="error-icon">⚠️</div>
            <h2>Login Error</h2>
            <p id="errorMessage">Username atau password yang Anda masukkan salah.</p>
            <button class="close-btn" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <div class="container">
        <div class="login-box">
            <div class="logo">
                <img src="/asset-admin/img/logo.png" alt="Republik Mantri" srcset="">
            </div>
            <div class="judul"> 
                <label for="judul">
                    Republik <br> Mantri
                </label>
            </div>
            <form action="/login/authenticate" method="post">
                <div class="input-group">
                    <input type="text" id="username" name="username" 
                           placeholder="Username" 
                           value="<?= old('username') ?>">
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" 
                           placeholder="Password">
                </div>
                <input type="submit" class="login-btn" value="Login">
            </form>            
        </div>
    </div>

    <script>
        // Check if there's an error message in the session
        <?php if (session()->getFlashdata('error')): ?>
            showModal();
        <?php endif; ?>

        function showModal() {
            document.getElementById('errorModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('errorModal').style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('errorModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // Preserve form data after failed login attempt
        document.addEventListener('DOMContentLoaded', function() {
            const username = "<?= old('username') ?>";
            if (username) {
                document.getElementById('username').value = username;
                document.getElementById('password').focus();
            }
        });
    </script>
</body>
</html>