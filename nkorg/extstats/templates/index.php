<?php /* @var $theView fpcm\view\viewVars */ ?>
<div class="fpcm-content-wrapper">
    <div class="fpcm-ui-tabs-general">

        <ul>
            <li><a href="#maintab"><?php $theView->write($sourceStr); ?><?php if ($modeStr) : ?> <?php $theView->write('MODULE_NKORGEXTSTATS_BY' . $modeStr); ?><?php endif; ?></a></li>
        </ul>

        <div id="maintab">

            <div class="row no-gutters" id="fpcm-nkorg-extendedstats-dateform"<?php if ($showDate) : ?> style="display:none;"<?php endif; ?>>
                <div class="col-12 fpcm-ui-padding-lg-bottom">
                    <?php $theView->textInput('dateFrom')->setValue($start)->setClass('fpcm-ui-datepicker')->setWrapperClass('fpcm-ui-datepicker-inputwrapper')->setText('ARTICLE_SEARCH_DATE_FROM')->setPlaceholder(true); ?>
                    <?php $theView->textInput('dateTo')->setValue($stop)->setClass('fpcm-ui-datepicker')->setWrapperClass('fpcm-ui-datepicker-inputwrapper')->setText('ARTICLE_SEARCH_DATE_TO')->setPlaceholder(true); ?>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12">
                    <canvas id="fpcm-nkorg-extendedstats-chart"></canvas>
                </div>
            </div>

            <h3<?php if (!$showDate) : ?> style="display:none;"<?php endif; ?>><?php $theView->write('MODULE_NKORGEXTSTATS_HITS_LIST'); ?></h3>
            
            <div id="fpcm-nkorg-extendedstats-list" class="row no-gutters fpcm-ui-padding-lg-top">
                <div class="col-10"></div>
                <div class="col-2"></div>
            </div>

        </div>
    </div>
</div>