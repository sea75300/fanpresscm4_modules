<?php

namespace fpcm\modules\nkorg\example\events\navigation;

final class add extends \fpcm\modules\nkorg\example\events\eventBase {

    public function run()
    {
        $item = (new \fpcm\model\theme\navigationItem())->setDescription('Example Module')->setIcon('fa fa-bullhorn fa-fw')->setUrl('example/test');        
        $this->data->add(\fpcm\model\theme\navigationItem::AREA_AFTER, $item);
        return $this->data;

    }

}
