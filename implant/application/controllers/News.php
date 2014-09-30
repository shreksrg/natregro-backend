<?php


class News extends FrontController
{
    protected $_typeArr = array('news', 'slide');

    public function __construct()
    {
        parent::__construct();
        $this->_modelNews = CModel::make('news_model');
    }


    public function index()
    {
        $route = $this->input->get('r');
        if (method_exists($this, $route)) {
            $this->{$route}();
        }
    }

    /**
     * 翻阅新闻
     */
    public function turns()
    {
        $actArr = array('prev' => '>', 'next' => '<');
        $type = $this->input->get('t');
        $id = (int)$this->input->get('id');
        $action = $this->input->get('do');
        if (in_array($type, $this->_typeArr) && isset($actArr[$action])) {
            $id = $this->_modelNews->turns($id, $actArr[$action]);
            CAjax::show(0, 'successful', $id);
        }
    }

    public function show()
    {
        $id = (int)$this->input->get('id');
        $route = $this->input->get('r');
        $type = $this->input->get('t');
        $tag = $this->input->get('c');
        if (method_exists($this, $route) && in_array($type, $this->_typeArr)) {
            $data['route'] = $route;
            $data['type'] = $type;
            $data['tag'] = $tag;
            $data['news'] = $this->_modelNews->{$type . 'detail'}($id);
            if ($data['news'])
                CView::show('news/detail', $data);
        }
    }

    /**
     * 集团介绍
     */
    public function group()
    {
        $tag = (int)$this->input->get('tag');
        if ($tag <= 0) $tag = 1;
        CView::show('news/group', array('tag' => $tag));
    }

    /**
     * 企业文化
     */
    public function culture()
    {
        CView::show('news/culture');
    }

    /**
     * 新闻公告
     */
    public function announce()
    {

        $page = (int)$this->input->get('page');
        if ($page <= 0) $page = 1;
        $catId = 2;
        $limit = array('page' => $page, 'rows' => 6);
        $data['news'] = $this->_modelNews->news($catId, $limit);

        $limit = array('page' => 1, 'rows' => 3);
        $data['slides'] = $this->_modelNews->slides($catId, $limit);
        CView::show('news/announce', $data);
    }

    /**
     * 品牌
     */
    public function brands()
    {
        $tagArr = array('intro', 'logo', 'vision', 'value', 'story');
        $tag = $this->input->get('tag');
        if (in_array($tag, $tagArr)) {
            CView::show('brand/' . $tag);
        }
    }

    /**
     * 产业链
     */
    public function chain()
    {
        $tag = (int)$this->input->get('tag');
        if ($tag <= 0) $tag = 5;
        CView::show('news/chain', array('tag' => $tag));
    }

    /**
     * 诚信曝光
     */
    public function exposure()
    {
        $tag = $this->input->get('c');
        $page = (int)$this->input->get('page');
        if ($page <= 0) $page = 1;
        $tagArr = array('self' => 2, 'line' => 1, 'feed' => 0);
        if (isset($tagArr[$tag])) {
            $data['tag'] = $tag;
            $data['selIndex'] = $tagArr[$tag];
            if ($tag == 'feed') {
                $view = 'form';
            } else {
                $view = 'index';
                if ($tag == 'self') $catId = 9; //菊爆
                if ($tag == 'line') $catId = 10; //行曝
                $limit = array('page' => $page, 'rows' => 6);
                $data['news'] = $this->_modelNews->news($catId, $limit);
                $limit = array('page' => 1, 'rows' => 3);
                $data['slides'] = $this->_modelNews->slides($catId, $limit);
            }
            CView::show("exposure/$view", $data);
        }
    }

    /**
     * sns链接
     */
    public function sns()
    {
        $route = $this->input->get('r');
        $tagArr = array('wx' => 0, 'wb' => 1, 'app' => 2);
        if (isset($tagArr[$route])) {
            $view = $route == 'feed' ? 'form' : 'index';
            CView::show("sns/index", array('route' => $route, 'selIndex' => $tagArr[$route]));
        }
    }

    public function formatNews()
    {

    }
}