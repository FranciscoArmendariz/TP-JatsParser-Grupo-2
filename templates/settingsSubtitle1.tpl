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
     {csrf}

     {literal}
         <link
             href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic|Roboto+Slab:400,700|Droid+Serif:400,400i,700,700i|Julius+Sans+One|Lato:400,400i,900,900i&display=swap"
             rel="stylesheet">
     {/literal}


     {fbvFormArea id="jatsParserSettingsFormArea" title="plugins.generic.jatsParser.subtitle1.description"}

     <div id="sampleTextPreview"
         style="border: 1px solid #ccc; padding: 1rem; margin: 1rem 0; font-size: {$fontSize}rem; line-height: {$lineHeight}; color: {$textColor}; font-family: {$fontFamily}; font-weight: {$fontWeight};">
         {translate key="plugins.generic.jatsParser.subtitle1.sampleText"}
     </div>

     {fbvFormSection   description="plugins.generic.jatsParser.subtitle1.color"}
     <input type="color" id="textColor" name="textColor" value="{$textColor|escape}">
     {/fbvFormSection}

     {fbvFormSection   description="plugins.generic.jatsParser.subtitle1.font.size"}
     <div style='display:flex; flex-direction: row; align-items: center; gap: 4px;'>
         <input style="width:5rem" min='0.5' step='0.1' required uni type="number" id="fontSize" name="fontSize"
             value="{$fontSize|escape}">
         <span>{translate key="plugins.generic.jatsParser.subtitle1.rem"}</span>
     </div>
     {/fbvFormSection}

     {fbvFormSection   description="plugins.generic.jatsParser.subtitle1.line.height"}
     <input style="width:5rem" min='0.5' step='0.1' required type="number" id="lineHeight" name="lineHeight"
         value="{$lineHeight|escape}">
     {/fbvFormSection}

     {fbvFormSection   description="plugins.generic.jatsParser.subtitle1.font.family"}
     {fbvElement size="MEDIUM" from=$fontFamilies selected=$fontFamily translate=false type="select" id="fontFamily" name="fontFamily"}
     {/fbvFormSection}

     {fbvFormSection   description="plugins.generic.jatsParser.subtitle1.font.weight"}
     {fbvElement size="SMALL" from=$fontWeights selected=$fontWeight translate=false type="select" id="fontWeight" name="fontWeight"}
     {/fbvFormSection}

     {/fbvFormArea}

     {fbvFormButtons}
     <p><span class="formRequired">{translate key="common.requiredField"}</span></p>

 </form>
 <script>
     function updateSamplePreview() {
         const color = document.getElementById('textColor').value;
         const fontSize = document.getElementById('fontSize').value;
         const lineHeight = document.getElementById('lineHeight').value;
         const fontFamily = document.getElementById('fontFamily').value;
         const fontWeight = document.getElementById('fontWeight').value

         const sample = document.getElementById('sampleTextPreview');
         sample.style.color = color;
         sample.style.fontSize = fontSize + 'rem';
         sample.style.lineHeight = lineHeight;
         sample.style.fontFamily = fontFamily;
         sample.style.fontWeight = fontWeight;
     }

     ['textColor', 'fontSize', 'lineHeight', 'fontFamily', 'fontWeight'].forEach(id => {
         const elementId = document.getElementById(id);
         if (elementId) {
             elementId.addEventListener('input', updateSamplePreview);
             elementId.addEventListener('change', updateSamplePreview);
         }
     });
</script>
