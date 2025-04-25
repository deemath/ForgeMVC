<?php 

/**
 * Login class
 */
class Login
{
    use Controller;

    public function index()
    {   
        $this->view('login');
    }

    public function Login()
    {
        $data = [];


        //session_unset();
        //session_destroy();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $email = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            $loginauth = new AuthModel;

            if (empty($role) || !in_array($role, ['user', 'coordinator'])) {
                $data['errors'][] = "Invalid role selected.";
                return $this->view('login', $data);
            }

            $arr = ['email' => $email, 'password' => $password];

            // Validate login input (generic validation)
            if ($loginauth->Loginvalidation($arr)) {
                $data['errors'] = $loginauth->errors;
                return $this->view('login', $data);
            }

            // Check login against the selected role's table
            $result = $loginauth->PasswordValidationByRole($arr, $role);

            if ($result) {
                session_start();
                
                if ($role === 'user') {
                    $_SESSION['user_id'] = $result;
                    header("Location: " . ROOT . "/reguser/commonInterface");
                    exit();
                } elseif ($role === 'coordinator') {
                    //$_SESSION['coordinator_image'] = $getCoordInfo->image;
                    $_SESSION['coordinator_id'] = $result;
                    header("Location: " . ROOT . "/coordinator/dashboard");
                    exit();
                }

            } else {
                $data['errors'] = $loginauth->errors;
                //echo "dfdfg";
                return $this->view('login', $data);
            }
        } else {
            return $this->view('_404');
        }
    }

    public function loginAs()
    {
        return $this->view('loginAs');
    }
}
