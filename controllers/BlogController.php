<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class BlogController extends AbstractController
{
    public function home() : void
    {
        $this->render("home", []);
    }

    public function category(string $categoryId) : void
    {
        // si la catégorie existe
        if (isset($categoryId)) {
            $this->render("category", []);
            // sinon
        } else {
            $this->redirect("index.php");
        }
    }

    public function post(string $postId) : void
    {
        // si le post existe
        if (isset($postId)) {
            $this->render("post", []);
            // sinon
        } else {
            $this->redirect("index.php");
        }
    }

    public function checkComment() : void
    {
        $this->redirect("index.php?route=post&post_id={$_POST["post_id"]}");
    }
}