<?php

namespace app\controllers;

use lithium\storage\Session;
use lithium\core\Environment;

class FileExploreController extends \lithium\action\Controller {

	public function index() {

        $act = @$this->request->query["act"];

        if ($act == "UP") {
            $dir = $this->up();
            return $this->scanfiles($dir);
        }
        if ($act == "LINK") {
            $dir = $this->link($this->request->query["file"]);
            return $this->scanfiles($dir);
        }
        if ($act == "DOWNLOAD") {
            Session::write("file",$this->request->query["file"]);
            $this->redirect('download');
        }
        if ($act == "STAY") {
            return $this->scanfiles(Session::read("pwd"));
        }

        $sess = Session::read("pwd");
        if (strlen($sess)) {
            $pwd = $sess;
        } else {
            $pwd = Environment::get("dir_top");
        }
        return $this->scanfiles($pwd);

	}

    public function download() {
        $file = Session::read("file");
        $pwd = Session::read("pwd");

        $top = Environment::get("dir_top");
        $top_link = Environment::get("dir_top_link");

        $pwd = str_replace($top, $top_link,$pwd);

        return ["pwd"=> $pwd,"path"=>$pwd.DIRECTORY_SEPARATOR.urldecode($file)];
    }

    private function up() {
        $sess = Session::read("pwd");
        $up = dirname($sess);
        if ( strlen($up) < strlen(Environment::get("dir_top")) ) {
            return Environment::get("dir_top");
        }
        return $up;
    }

    private function link($file)
    {
        $sess = Session::read("pwd");
        $dirpath = $sess.DIRECTORY_SEPARATOR.urldecode($file);
        $is_dir = is_dir($dirpath);
        if ($is_dir){
            return $dirpath;
        }
        return $sess;
    }

    private function scanfiles($pwd) {

        $is_top_dir = ($pwd == Environment::get("dir_top"));
        $files = scandir($pwd);
        $ret_files = [];
        foreach ($files as $file) {
            if (strpos($file, ".") === 0) {
                continue;
            }
            $path = $pwd . DIRECTORY_SEPARATOR . $file;
            $ret_files[] = ["name" => $file, "is_dir" => is_dir($path)];
        }
        Session::write("pwd", $pwd);
        $top = Environment::get("dir_top");
        $top_link = Environment::get("dir_top_link");
        $pwd2 = str_replace($top, $top_link, $pwd);
        $this->set(["pwd" => $pwd2]);

        return [
            "is_top_dir" => $is_top_dir,
            "files" => $ret_files
        ];
    }
}
?>
