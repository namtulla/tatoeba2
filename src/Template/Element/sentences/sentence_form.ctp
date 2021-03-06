<form layout="column" layout-margin ng-if="vm.visibility.sentence_form">

<div ng-if="vm.sentence.audios && vm.sentence.audios.length > 0">
    <p><?= __('You cannot edit this sentence because it has audio.'); ?>

    <div layout="row" layout-align="end center">
        <md-button class="md-raised" ng-click="vm.cancelEdit()">
            <?= __('Close') ?>
        </md-button>
    </div>
</div>

<div layout="column" ng-if="!(vm.sentence.audios && vm.sentence.audios.length > 0)">
    <div layout="row" layout-align="start center">
        <md-input-container flex="50">
            <label><?= __('Language') ?></label>
            <md-select ng-model="vm.sentence.lang">
                <md-option value="unknown"><?= __('Other language') ?></md-option>
                <md-option ng-repeat="(code, name) in vm.userLanguages" ng-value="code">
                    {{name}}
                </md-option>
            </md-select>
        </md-input-container>
        
        <div class="language-icon-div">
            <img ng-src="/img/flags/{{vm.sentence.lang}}.svg"
                 width="30" height="20" class="language-icon"/>
        </div>
    </div>

    <md-input-container>
        <label><?= __('Sentence') ?></label>
        <textarea ng-attr-id="sentence-form-{{vm.sentence.id}}" ng-model="vm.sentence.text" 
                  ng-enter="vm.editSentence()" ng-escape="vm.cancelEdit()"></textarea>
    </md-input-container>

    <div layout="row" layout-align="end center">
        <md-button class="md-raised" ng-click="vm.cancelEdit()">
            <?= __('Cancel') ?>
        </md-button>
        <md-button class="md-raised md-primary" ng-click="vm.editSentence()">
            <?= __('Save') ?>
        </md-button>
    </div>
</div>

</form>