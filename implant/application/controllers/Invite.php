<?php

class Invite extends FrontController
{
    protected $_modelInvite;

    public function __construct()
    {
        parent::__construct();
        $this->_modelInvite = CModel::make('invite_model');
    }

    public function index()
    {
        $page = (int)$this->input->get('page');
        if ($page <= 0) $page = 1;
        $limit = array('page' => $page, 'rows' => 0);
        $data['jobs'] = $this->_modelInvite->jobs($limit);
        CView::show('invite/index', $data);
    }


    public function append()
    {
        if (REQUEST_METHOD == 'POST') {
            $post = $this->input->post();
            $id = $this->_modelInvite->append($post);
            CView::show('message/result');
        } else {
            $data = array('type' => 'new', 'job' => null);
            CView::show('invite/edit', $data);
        }
    }


    public function edit()
    {
        if (REQUEST_METHOD == 'POST') {
            $post = $this->input->post();
            $this->_modelInvite->edit($post);
            CView::show('message/result');
        } else {
            $id = (int)$this->input->get('id');
            if ($id > 0) {
                $job = $this->_modelInvite->job($id);
                if ($job) {
                    CView::show('invite/edit', array('job' => $job));
                }
            }
        }
    }


    public function jobs()
    {
        $tag = $this->input->get('t');
        $tagArr = array('campus' => 1, 'public' => 0);
        if (array_key_exists($tag, $tagArr)) {
            $page = (int)$this->input->get('page');
            if ($page <= 0) $page = 1;
            $type = $tagArr[$tag];
            $limit = array('page' => $page, 'rows' => 0);
            $data['jobs'] = $this->_modelInvite->jobs($type, $limit);
        }
    }

    public function show()
    {
        $id = $this->input->get('id');
        $data['job'] = $job = $this->_modelInvite->detail($id);
        if ($job)
            CView::show('invite/detail', $data);
    }

    public function active()
    {
        $route = $this->input->get('r');
        $actArr = array('list', 'show');
        if (in_array($route, $actArr)) {
            CView::show('invite/active_' . $actArr[$route]);
        }
    }

    public function contact()
    {
        CView::show('invite/contact');
    }

    public function drop()
    {
        $ids = $this->input->post('id');
        if ($ids && is_array($ids)) {
            $return = $this->_modelInvite->drop($ids);
            CAjax::result($return);
        }
    }
}