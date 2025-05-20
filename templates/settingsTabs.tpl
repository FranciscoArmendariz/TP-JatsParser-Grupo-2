{**
 * templates/settingsTabs.tpl
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file LICENSE.
 *
 * The setting tabs for the AddThis plugin.
 *}

<script>
    $(function() {ldelim}
    // Attach the form handler.
    $('#jatsParserSettingsTabs').pkpHandler('$.pkp.controllers.TabHandler');
    {rdelim});
</script>

<div id="jatsParserSettingsTabs" class="pkp_controllers_tab">
    <ul>
        <li><a
                href="{url router=$smarty.const.ROUTE_COMPONENT component="grid.settings.plugins.SettingsPluginGridHandler" op="manage" category="generic" plugin=$pluginName verb="showTab" tab="settings" escape=false}">{translate key="plugins.generic.jatsParser.workflow.tab.settings"}</a>
        </li>
        <li {if !$statsConfigured}class="ui-state-default ui-corner-top ui-state-disabled" {/if}>
            <a
                href="{url router=$smarty.const.ROUTE_COMPONENT component="grid.settings.plugins.SettingsPluginGridHandler" op="manage" category="generic" plugin=$pluginName verb="showTab" tab="subtitle1" escape=false}">{translate key="plugins.generic.jatsParser.workflow.tab.subtitle1"}</a>
        </li>
    </ul>
</div>
