<?php

namespace fpcm\modules\nkorg\example\events\comments;

final class update extends \fpcm\modules\nkorg\example\events\eventBase {

    public function run()
    {
        $this->data['name'] = $this->data['name'].' '. microtime(true).' '.$this->getModuleKey().' '. get_class($this);
        return $this->data;
    }

}
