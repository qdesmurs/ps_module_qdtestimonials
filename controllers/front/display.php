<?php
class qdtestimonialsdisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('display.tpl');
        $result = $this->get_posts();
        foreach ($result as $post) {
            $post["link"] = $this->context->link->getModuleLink(
                'qdtestimonials',
                'details',
                array(
                'id' => $post["id_qdtestimonials"]
                )
            );
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
