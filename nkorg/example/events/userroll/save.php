<?php

namespace fpcm\modules\nkorg\example\events\userroll;

final class save extends \fpcm\modules\nkorg\example\events\eventBase {

    public function run()
    {
        return $this->data.' '. microtime(true).' '.$this->getModuleKey().' '. get_class($this);
    }

}
