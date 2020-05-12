<?php
    class Controller
    {
        var $vars = [];
        var $layout = "default";

        public function set($d)
        {
            $this->vars = array_merge($this->vars, $d);
        }

        public function render($fileName)
        {
            extract($this->vars);
            ob_start();
            require(ROOT."views/".str_replace('Controller', '', get_class($this))).'/'.$fileName.'php';
            $content_for_layout = ob_get_clean();

            if($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT."views/layouts/".$this->layout.'php');
            }
        }

        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        protected function secure_form($form)
        {
            foreach($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }
    }
?>