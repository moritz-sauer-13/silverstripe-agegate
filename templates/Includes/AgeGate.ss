<% if $ShowAgeGate && $URLSegment != $Security %>
<div class="AgeGate">
    <div class="overlay">
        <div class="content">
            <% if $AgeGateContentOverride %>
                $AgeGateContentOverride
            <% else %>
                $SiteConfig.AgeGateContent
            <% end_if %>
            $AgeGateForm
        </div>
    </div>
</div>
<% require css("moritz-sauer-13/silverstripe-agegate:css/agegate.css") %>
<% require javascript("moritz-sauer-13/silverstripe-agegate:javascript/agegate.js") %>
<% end_if %>