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

    public function changePassword() {
        $this->render('admin.change_password');
    }

    public function postChangePassword() {
        $oldPassword = isset($_POST['old_password']) ? trim($_POST['old_password']) : '';
        $newPassword = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
        $confirmPassword = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

        if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            flash('errors', 'Vui lòng điền đầy đủ tất cả các trường.', 'change-password');
        }

        if ($newPassword !== $confirmPassword) {
            flash('errors', 'Mật khẩu mới và xác nhận mật khẩu không khớp.', 'change-password');
        }

        if (strlen($newPassword) < 6) {
            flash('errors', 'Mật khẩu mới phải có ít nhất 6 ký tự.', 'change-password');
        }

        $userId = $_SESSION['user']['id'];
        $userModel = new UserModel();
        $user = $userModel->getById($userId);

        if ($user && md5($oldPassword) === $user->password) {
            $newPasswordHash = md5($newPassword);
            $userModel->updatePassword($userId, $newPasswordHash);
            flash('success', 'Đổi mật khẩu thành công!', 'admin');
        } else {
            flash('errors', 'Mật khẩu cũ không chính xác.', 'change-password');
        }
    }
}
