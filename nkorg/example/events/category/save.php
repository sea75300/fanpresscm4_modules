<?php

namespace fpcm\modules\nkorg\example\events\category;

final class save extends \fpcm\modules\nkorg\example\events\eventBase {

    public function run()
    {
        $this->data['name'] = $this->data['name'].' '. microtime(true).' '.$this->getModuleKey().' '. get_class($this);
        return $this->data;
    }

}
