<?php

class Feedback extends FrontController
{
    protected $_modelInvite;

    public function __construct()
    {
        parent::__construct();
        $this->_modelFeed = CModel::make('feedback_model');
    }

    public function index()
    {
        $page = (int)$this->input->get('page');
        if ($page <= 0) $page = 1;
        $limit = array('page' => $page, 'rows' => 0);
        $data['feedback'] = $this->_modelFeed->feedback($limit);
        CView::show('exposure/feedback_list', $data);
    }

    public function show()
    {
        $id = $this->input->get('id');
        $data['feedback'] = $feedback = $this->_modelFeed->detail($id);
        if ($feedback)
            CView::show('exposure/feedback_detail', $data);
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