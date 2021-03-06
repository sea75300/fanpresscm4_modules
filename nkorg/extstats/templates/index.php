<?php /* @var $theView fpcm\view\viewVars */ ?>
<div class="fpcm-content-wrapper">
    <div class="fpcm-ui-tabs-general">

        <ul>
            <li><a href="#maintab"><?php $theView->write($sourceStr); ?><?php if ($modeStr) : ?> <?php $theView->write('MODULE_NKORGEXTSTATS_BY' . $modeStr); ?><?php endif; ?></a></li>
        </ul>

        <div id="maintab">

            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-6 p-0">
                    <fieldset>
                        <legend><?php $theView->write('ARTICLES_SEARCH'); ?></legend>
                        
                        <div class="row my-2">
                        <?php $theView->textInput('dateFrom')->setValue($start)->setClass('fpcm-ui-datepicker')->setWrapperClass('fpcm-ui-datepicker-inputwrapper')->setText('ARTICLE_SEARCH_DATE_FROM')->setDisplaySizesDefault(); ?>
                        </div>
                        
                        <div class="row my-2">
                        <?php $theView->textInput('dateTo')->setValue($stop)->setClass('fpcm-ui-datepicker')->setWrapperClass('fpcm-ui-datepicker-inputwrapper')->setText('ARTICLE_SEARCH_DATE_TO')->setDisplaySizesDefault(); ?>
                        </div>
                        
                        
                        <div class="row my-2">
                            
                            <div class="col">
                                <div class="<?php if ($isLinks) : ?>fpcm ui-hidden<?php endif; ?>">
                                    <?php $theView->select('chartMode')->setClass('fpcm-ui-input-select-articleactions ')->setOptions($chartModes)->setSelected($chartMode)->setFirstOption(\fpcm\view\helper\select::FIRST_OPTION_DISABLED); ?>
                                </div>
                            </div>
                            <div class="col">
                                <?php $theView->select('chartType')->setClass('fpcm-ui-input-select-articleactions')->setOptions($chartTypes)->setSelected($chartType)->setFirstOption(\fpcm\view\helper\select::FIRST_OPTION_DISABLED); ?>
                            </div>
                            <div class="col">
                                <div class="<?php if (!$isLinks) : ?>fpcm ui-hidden<?php endif; ?>">
                                    <?php $theView->select('sortType')->setOptions($sortTypes)->setSelected($sortType)->setFirstOption(\fpcm\view\helper\select::FIRST_OPTION_DISABLED); ?>
                                </div>
                            </div>

                        </div>

                    </fieldset>
                </div>
            </div>            

            <div class="row no-gutters align-self-center align-content-center justify-content-center">
                <div class="col-12<?php if (!$notfound) : ?> col-md-10 col-lg-7 mb-3<?php endif; ?>">
                <?php if ($notfound) : ?>
                    <p class="fpcm-ui-padding-none fpcm-ui-margin-none"><?php $theView->icon('images', 'far')->setStack('ban fpcm-ui-important-text')->setSize('lg')->setStackTop(true); ?> <?php $theView->write('GLOBAL_NOTFOUND2'); ?></p>
                <?php else : ?>
                    <?php print $chart; ?>
                <?php endif; ?>
                </div>
            </div>

        <?php if (!$notfound) : ?>
            <?php if ($isLinks) : ?>
                <h3><?php $theView->write('MODULE_NKORGEXTSTATS_HITS_LIST'); ?></h3>
               
            
                <div id="fpcm-dataview-extendedstats-list-spinner" class="row no-gutters align-self-center fpcm-ui-inline-loader fpcm ui-background-white-50p">
                    <div class="col-12 fpcm-ui-center align-self-center">
                        <?php $theView->icon('spinner fa-inverse')->setSpinner('pulse')->setStack('circle')->setSize('2x'); ?>
                    </div>
                </div>  

                <div id="fpcm-dataview-extendedstats-list" class="fpcm-ui-padding-lg-top"></div>
            <?php endif; ?>
        <?php endif; ?>

        </div>
    </div>
</div>