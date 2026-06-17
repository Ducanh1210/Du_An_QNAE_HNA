<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController {
    
    public function login() {
        // Nếu đã đăng nhập rồi thì redirect thẳng về dashboard
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
        $this->render('admin.login');
    }

    public function postLogin() {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (empty($username) || empty($password)) {
            flash('errors', 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.', 'login');
        }

        $userModel = new UserModel();
        $user = $userModel->getByUsername($username);

        if ($user && md5($password) === $user->password) {
            $_SESSION['user'] = [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role
            ];
            flash('success', 'Chào mừng quay trở lại, ' . $user->username . '!', 'admin');
        } else {
            flash('errors', 'Tên đăng nhập hoặc mật khẩu không chính xác.', 'login');
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        flash('success', 'Đăng xuất thành công!', 'login');
    }
}
