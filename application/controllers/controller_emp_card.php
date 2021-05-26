<?php


class Controller_emp_card extends Controller
{
    function __construct()
    {
        $this->model = new Model_emp_card;
        $this->view = new View();
    }

    public function action_index()
    {
        $id = null;
        if (isset($_GET['id']) && empty($_POST)) {

            $id = (int)$_GET['id'];
            $data = $this->model->get_emp($id);
            $this->view->generate('emp_card_form_view.php', 'template_view.php', $data);
        }
    }

    public function action_create()
    {
        $id = null;
        if (isset($_GET['id']) && empty($_POST)) {
            $data = $this->model->get_emp((int)$_GET['id']);
            $this->view->generate('emp_job_card_view.php', 'template_view.php', $data, $alert = null);
        }

        if (!empty($_POST)) {
            $validate = $this->model->validate($_POST);
            if (!$validate) {
                $data = $this->model->get_emp((int)$_GET['id']);
                $alert['error'] = 'Поля не могут быть пустыми';
                $this->view->generate('emp_job_card_view.php', 'template_view.php', $data, $alert);
                exit();
            }

            $res = $this->model->save_work_place($_POST);

            if ($res) {
                setcookie("alert", "Запись добавлена", time() + 1, "/");
            }
            $id = (int)$_POST['id'];
            header("Location: /emp_card/index/?id=$id");
        }
    }

    public function action_update_work()
    {
        $id = null;
        if (isset($_GET['id']) && empty($_POST)) {

            $id = (int)$_GET['id'];
            $data = $this->model->get_work_place($id);
            $this->view->generate('emp_work_edit_view_form.php', 'template_view.php', $data);
        }

        if (!empty($_POST)) {
            $id = (int)$_POST['id'];
            $validate = $this->model->validate($_POST);

            if (!$validate) {
                $data = $_POST;
                $alert['error'] = 'Поля не могут быть пустыми';
                $this->view->generate('emp_work_edit_view_form.php', 'template_view.php', $data, $alert);
                exit();
            }

            $res = $this->model->update_work_place($_POST);
            $data = $this->model->get_work_place($id);
            if ($res) {
                setcookie("update", "Данные применены", time() + 1, "/");
                $alert['ok'] = 'Данные рабочего места сотрудника обновлены';
                $this->view->generate('emp_work_edit_view_form.php', 'template_view.php', $data, $alert);
            }
        }

    }

    public function action_delete_work()
    {
        $id = null;
        $emp_id = null;
        if (isset($_GET['id']) && isset($_GET['emp_id'])) {
            $id = (int)$_GET['id'];
            $emp_id = (int)$_GET['emp_id'];
        }
        $res = $this->model->del_work_place($id);
        if ($res) {
            setcookie("alert", "Запись c id-$id удалена", time() + 1, "/");
            header("Location: /emp_card/index/?id=$emp_id");
        }
    }
}