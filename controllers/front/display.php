<?php
class qdtestimonialsdisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('display.tpl');
        $result = $this->get_posts();
        foreach ($result as $post) {
            $testimonials_post[] = $post;
        }
        $this->context->smarty->assign("posts", $testimonials_post);
    }
    public function get_posts()
    {
        $posts = new DbQuery();
        $posts->select('*');
        $posts->from('qdtestimonials');
        return Db::getInstance()->executeS($posts);
    }
}
