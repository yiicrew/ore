<?php

use app\models\Listing;
use app\widgets\ImageWidget;

function issetModule($value)
{
    return false;
}

function param($key)
{
    return null;
}

?>

<div class="listing-description">
<?php if ($listing->is_special_offer): ?>
    <div class="offer offer-lg">
        <h4><?= Yii::t('app', 'Special offer!') ?></h4>
        <?php if (!empty($listing->is_free_to)): ?>
        <p>
            <?= Yii::t('app', 'Is avaliable') . ' ' . Yii::t('app', 'to') . ' ' . Booking::getDate($listing->is_free_to, 1) ?>
        </p>
        <?php endif ?>
    </div>
<?php endif ?>
        
        <?php if (issetModule('paidservices') && param('useUserads')):?>
            <?php
                $wantTypes = HApartment::getI18nTypesArray();
                $typeName = (isset($wantTypes[$listing->type]) && isset($wantTypes[$listing->type]['current'])) ? mb_strtolower($wantTypes[$listing->type]['current'], 'UTF-8') : '';
            ?>
            <?php if ($typeName) :?>
                <div class="promotion-paidservices-in-apartment">
                    <div class="paidservices-promotion-title"><?php echo tt('Is it your listing?', 'apartments');?></div>
                    <div class="paidservices-promotion-title-promotion-title"><?php echo tt('Would you like to', 'apartments');?>&nbsp;<?php echo $typeName;?>&nbsp;<?php echo tt('quicker?', 'apartments');?></div>
                    <div class="paidservices-promotion-description">
                        <i class="i-paidservices-promotion"></i>
                        <span>
                            <?php echo tt('Try to', 'apartments');?>&nbsp;
                            <?php echo CHtml::link(tt('apply paid services', 'apartments'), Yii::app()->createUrl('/userads/main/update', array('id' => $listing->id, 'show' => 'paidservices')), array('target'=>'_blank'));?>
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php endif;?>
        <?php endif;?>

        <?php if (param('useShowUserInfo')): ?>
        <div class="listing-user user">
            <?php $this->render('//modules/apartments/views/_user_info', ['data' => $listing]); ?>
        </div>
        <?php endif ?>
        <div class="viewapartment-left">
            <div class="listing-preview">
                <div class="listing-type"><?= $listing->type ?></div>
                <?= $listing->image ?>
            </div>

            <div class="viewapartment-description-top">
                <?php if ($listing->deleted): ?>
                    <div class="badge badge-danger"><?= Yii::t('app', 'Listing is deleted') ?></div>
                <?php endif ?>
                <div>
                    <strong>
                    <?= ($listing->category) ?>
                    <?php
                        if ($listing->room_count) {
                            echo ',&nbsp;';
                            echo Yii::t('app', '{n} bedroom|{n} bedrooms', [$listing->room_count]);
                        }
                        if (issetModule('location')) {
                            if ($listing->locCountry || $listing->locRegion || $listing->locCity) {
                                echo "<br>";
                            }

                            if ($listing->locCountry) {
                                echo $listing->locCountry->getStrByLang('name');
                            }
                            if ($listing->locRegion) {
                                if ($listing->locCountry) {
                                    echo ',&nbsp;';
                                }
                                echo $listing->locRegion->getStrByLang('name');
                            }
                            if ($listing->locCity) {
                                if ($listing->locCountry || $listing->locRegion) {
                                    echo ',&nbsp;';
                                }
                                echo $listing->locCity->getStrByLang('name');
                            }
                        } elseif (isset($listing->city) && isset($listing->city->name)) {
                            echo $listing->city->name;
                        }
                    ?>
                    </strong>
                </div>

                <p class="price padding-bottom10">
                    <?= $listing->defaultPrice ?>
                </p>

                <div class="overflow-auto">
                    <?php
                        if (($listing->owner_id != Yii::$app->user->id) && $listing->type == Listing::TYPE_RENT && !$listing->deleted) {
                            echo '<div>'.CHtml::link(tt('Booking'), array('/booking/main/bookingform', 'id' => $listing->id), array('class' => 'apt_btn fancy mgp-open-ajax')).'</div><div class="clear"></div>';
                        }


                        if (issetModule('apartmentsComplain')) {
                            if (($listing->owner_id != Yii::app()->user->getId())) { ?>
                                <div>
                                    <?php echo CHtml::link(tt('do_complain', 'apartmentsComplain'), $this->createUrl('/apartmentsComplain/main/complain', array('id' => $listing->id)), array('class' => 'fancy mgp-open-ajax')); ?>
                                </div>
                                <?php
                            }
                        }
                    ?>

                    <?php if (issetModule('comparisonList')):?>
                        <div class="clear"></div>
                        <?php
                        $inComparisonList = false;
                        if (in_array($listing->id, Yii::$app->controller->apInComparison)) {
                            $inComparisonList = true;
                        }
                        ?>
                        <div class="compare-check-control view-apartment" id="compare_check_control_<?= $listing->id ?>">
                            <input type="checkbox" name="compare-<?= $listing->id ?>" class="compare-check compare-float-left" 
                                id="compare-check-<?= $listing->id ?>" <?= $inComparisonList ? ' checked' : '' ?>>

                            <a href="<?= $inComparisonList ? Url::to('comparisonList/main/index') : 'javascript:void(0);' ?>" 
                                data-rel-compare="<?= $inComparisonList ? 'true' : 'false' ?>" id="compare-label-<?= $listing->id ?>" class="compare-label">
                                <?= $inComparisonList ? tt('In the comparison list', 'comparisonList') : tt('Add to a comparison list ', 'comparisonList') ?>
                            </a>
                        </div>
                    <?php endif;?>
                </div>
            </div>

            <?= ImageWidget::widget([
                'images' => $listing->images,
                'objectId' => $listing->id,
                'useFotorama' => false
            ]) ?>

        </div>

    </div>

    <div class="listing-description">
        <?php
            // $listing->references = HApartment::getFullInformation($listing->id, $listing->type);
            $generalContent = $this->render('_general', array(
                'data'=>$listing,
            ), true);

            if ($generalContent) {
                $items[Yii::t('app', 'General')] = array(
                    'content' => $generalContent,
                    'id' => 'tab_1',
                );
            }

            if (issetModule('bookingcalendar') && $listing->type == Apartment::TYPE_RENT) {
                Bookingcalendar::publishAssets();

                $items[tt('The periods of booking apartment', 'bookingcalendar')] = array(
                    'content' => $this->renderPartial('//modules/bookingcalendar/views/calendar', array(
                        'apartment'=>$listing,
                    ), true),
                    'id' => 'tab_2',
                );
            }

            // $additionFields = HFormEditor::getExtendedFields();
            $existValue = false; //HFormEditor::existValueInRows($additionFields, $listing);

            if ($existValue) {
                $items[tc('Additional info')] = array(
                    'content' => $this->renderPartial('//modules/apartments/views/_tab_addition', array(
                        'data'=>$listing,
                        'additionFields' =>$additionFields
                    ), true),
                    'id' => 'tab_3',
                );
            }

            if ($listing->panorama) {
                $items[tc('Panorama')] = array(
                    'content' => $this->renderPartial('//modules/apartments/views/_tab_panorama', array(
                        'data'=>$listing,
                    ), true),
                    'id' => 'tab_7',
                );
            }

            if (isset($listing->video) && $listing->video) {
                $items[tc('Videos for listing')] = array(
                    'content' => $this->renderPartial('//modules/apartments/views/_tab_video', array(
                        'data'=>$listing,
                    ), true),
                    'id' => 'tab_4',
                );
            }


            /*if(!Yii::app()->user->checkAccess('backend_access') && (Yii::app()->user->hasFlash('newComment') || $comment->getErrors())){
                Yii::app()->clientScript->registerScript('comments','
                setTimeout(function(){
                    $("a[href=#tab_5]").click();
                }, 0);
                scrollto("comments");
            ',CClientScript::POS_READY);
            }*/


            if (param('enableCommentsForApartments', 1)) {
                if (!isset($comment)) {
                    $comment = null;
                }

                $items[Yii::t('module_comments', 'Comments').' ('.Comment::countForModel('Apartment', $listing->id).')'] = array(
                    'content' => $this->renderPartial('//modules/apartments/views/_tab_comments', array(
                        'model' => $listing,
                    ), true),
                    'id' => 'tab_5',
                );
            }
            
            if (isset($listing->apDocuments) && count($listing->apDocuments)) {
                $items[tc('Documents')] = array(
                    'content' => $this->renderPartial('//modules/apartments/views/__table_documents_view', array(
                            'apartment' => $listing,
                        ), true),
                    'id' => 'tab_8',
                );
            }

            if ($listing->type != Listing::TYPE_BUY && $listing->type != Listing::TYPE_RENTING) {
                if ($listing->lat && $listing->lon) {
                    if (param('useGoogleMap', 1) || param('useYandexMap', 1) || param('useOSMMap', 1)) {
                        $items[tc('Map')] = array(
                            'content' => $this->renderPartial('//modules/apartments/views/_tab_map', array(
                                'data' => $listing,
                            ), true),
                            'id' => 'tab_6',
                        );
                    }
                }
            }

            /*$this->widget('zii.widgets.jui.CJuiTabs', array(
                'tabs' => $items,
                'htmlOptions' => array('class' => 'info-tabs'),
                'headerTemplate' => '<li><a href="{url}" title="{title}" onclick="reInitMap(this);">{title}</a></li>',
                'options' => array(
                ),
            ));*/
        ?>
    </div>

    <?php
        if (!Yii::$app->user->can('backend_access')) {
            if (issetModule('similarads') && param('useSliderSimilarAds') == 1) {
                Yii::import('application.modules.similarads.components.SimilarAdsWidget');
                $ads = new SimilarAdsWidget;
                $ads->viewSimilarAds($listing);
            }
        }

    ?>

<script>
var useYandexMap = '<?= param('useYandexMap', 1) ?>';
var useGoogleMap = '<?= param('useGoogleMap', 1) ?>';
var useOSMap = '<?= param('useOSMMap', 1) ?>';

function reInitMap(elem) {
    if($(elem).attr("href") == "#tab_6"){
        // place code to end of queue
        if (useGoogleMap) {
            setTimeout(function(){
                var tmpGmapCenter = mapGMap.getCenter();

                google.maps.event.trigger($("#googleMap")[0], "resize");
                mapGMap.setCenter(tmpGmapCenter);

                if (($("#gmap-panorama").length > 0)) {
                    initializeGmapPanorama();
                }
            }, 0);
        }

        if (useYandexMap) {
            setTimeout(function(){
                ymaps.ready(function () {
                    globalYMap.container.fitToViewport();
                    globalYMap.setCenter(globalYMap.getCenter());
                });
            }, 0);
        }

        if (useOSMap) {
            setTimeout(function(){
                L.Util.requestAnimFrame(mapOSMap.invalidateSize,mapOSMap,!1,mapOSMap._container);
            }, 0);
        }
    }
}
</script>
