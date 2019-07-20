<?php

namespace fpcm\modules\nkorg\polls\controller;

final class deleteentry extends \fpcm\controller\abstracts\module\ajaxController {

    public function request()
    {
        $id = $this->getRequestVar('id', [
            \fpcm\classes\http::FILTER_CASTINT
        ]);

        if (!$id) {
            $this->returnData = 0;
            $this->getSimpleResponse();
        }

        $this->returnData = (new \fpcm\modules\nkorg\polls\models\counter())->deleteLinkEntry($id) ? 1 : 0;
        $this->getSimpleResponse();
        return true;
    }

}
