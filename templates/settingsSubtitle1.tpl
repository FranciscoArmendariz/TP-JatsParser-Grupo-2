 {**
 * plugins/generic/JATSParserPlugin/settingsForm.tpl
 *
 * Copyright (c) 2017-2018 Vitalii Bezsheiko
 * Distributed under the GNU GPL v3.
 *
 * JATSParserPlugin plugin settings
 *
 *}
 <script>
     $(function() {ldelim}
     // Attach the form handler.
     $('#jatsParserSettingsSubtitle').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
     {rdelim});
 </script>

 <form class="pkp_form" id="jatsParserSettingsSubtitle" method="post"
     action="{url router=$smarty.const.ROUTE_COMPONENT op="manage" category="generic" plugin=$pluginName verb="showTab" tab="subtitle1" save=true}">
     <p>This is the subtitles styling tab</p>


</form>
