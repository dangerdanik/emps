<?php

class Controller_emp extends Controller
{

    function __construct()
    {
        $this->model = new Model_emp();
        $this->view = new View();
    }

    public function action_create()
    {

        if (!empty($_POST)) {
            $validate = $this->model->validate($_POST);

            if (!$validate) {
                $alert['error'] = 'Поля не могут быть пустыми';
                $this->view->generate('emp_form_view.php', 'template_view.php', $data = null, $alert);
                exit();
            }

            $res = $this->model->save_emp($_POST);

            if ($res) {
                setcookie("alert", "Запись добавлена", time() + 1, "/");
                unset($_POST);
            }

            header("Location: /");
        }
        $_SESSION['alert'] = true;
        $this->view->generate('emp_form_view.php', 'template_view.php');

    }

    public function action_update()
    {
        $id = null;
        if (isset($_GET['id']) && empty($_POST)) {

            $id = (int)$_GET['id'];
            $data = $this->model->get_emp($id);
            $this->view->generate('emp_form_edit_view.php', 'template_view.php', $data, $alert = null);
        }

        if (!empty($_POST)) {
            $id = (int)$_POST['id'];
            $validate = $this->model->validate($_POST);

            if (!$validate) {
                $data = $_POST;
                $alert['error'] = 'Поля не могут быть пустыми';
                $this->view->generate('emp_form_edit_view.php', 'template_view.php', $data, $alert);
                exit();
            }

            $res = $this->model->update_emp($_POST);
            $data = $this->model->get_emp($id);
            if ($res) {
                setcookie("update", "Данные применены", time() + 1, "/");
                $alert['ok'] = 'Данные сотрудника обновлены';
                $this->view->generate('emp_form_edit_view.php', 'template_view.php', $data, $alert);
            }
        }

    }

    public function action_delete()
    {

        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
        }
        $res = $this->model->del_emp($id);
        if ($res) {
            setcookie("alert", "Запись c id-$id удалена", time() + 1, "/");
            header("Location: /");
        }
    }

}
