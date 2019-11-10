<?php

namespace fpcm\modules\nkorg\polls\controller;

final class polledit extends pollbase {

    public function request()
    {
        $id = $this->getRequestVar('id', [
            \fpcm\classes\http::FILTER_CASTINT
        ]);
        
        if (!$id) {
            return false;
        }

        $this->poll = new \fpcm\modules\nkorg\polls\models\poll($id);
        if (!$this->poll->exists()) {
            $this->view->addErrorMessage($this->addLangVarPrefix('MSG_PUB_NOTFOUND'));
        }
        
        if ($this->buttonClicked('save') && $this->save()) {
            $this->view->addNoticeMessage($this->addLangVarPrefix('MSG_SUCCESS_SAVEPOLL'));
            return true;
        }
        
        return true;
    }

    public function process()
    {
        $this->view->setFormAction('polls/edit&id='.$this->poll->getId());
        
        $replies = $this->poll->getReplies();
        $this->view->assign('replies', $replies);
        $this->view->addJsVars([
            'replyOptionsStart' => count($replies),
            'pollChartData' => $this->getChartData(),
            'voteSum' => $this->poll->getVotessum()
        ]);

        $this->view->addButtons([
            (new \fpcm\view\helper\linkButton('backList'))->setUrl(\fpcm\classes\tools::getControllerLink('polls/list')) ->setText($this->addLangVarPrefix('GUI_GOTO_LIST'))->setIcon('arrow-circle-left'),
        ]);
        
        parent::process();
    }
    
    private function getChartData()
    {
        if (!$this->poll->getId()) {
            return null;
        }

        $chart = new \fpcm\components\charts\chart($this->config->module_nkorgpolls_chart_type, 'fpcm-nkorg-polls-chart');
        
        $this->view->addJsFiles($chart->getJsFiles());

        $labels = [];
        $data = [];
        $colors = [];

        /* @var $reply \fpcm\modules\nkorg\polls\models\poll_reply */
        foreach ($this->poll->getReplies() as $reply) {
            
            $labels[] = $reply->getText().' ('.$reply->getPercentage($this->poll->getVotessum()).'%)';
            $data[] = $reply->getVotes();
            $colors[] = \fpcm\components\charts\chartItem::getRandomColor();
        }
        
        $chart->setLabels($labels);
        $chart->setValues((new \fpcm\components\charts\chartItem($data, $colors))->setFill(true));

        return $chart;
    }

    private function getRandomColor()
    {
        $colStr = '#' . dechex(mt_rand(0, 255)) . dechex(mt_rand(0, 255)) . dechex(mt_rand(0, 255));
        return strlen($colStr) === 7 ? $colStr : str_pad($colStr, 7, dechex(mt_rand(0, 16)));
    }

}
