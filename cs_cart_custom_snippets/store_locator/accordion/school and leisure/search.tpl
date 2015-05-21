{assign var="map_provider" value=$addons.store_locator.map_provider}
{assign var="map_provider_api" value="`$map_provider`_map_api"}
{assign var="map_customer_templates" value="C"|fn_get_store_locator_map_templates}
{assign var="map_container" value="map_canvas"}

{if $store_locations}
    {if $map_customer_templates && $map_customer_templates.$map_provider}
        {include file=$map_customer_templates.$map_provider}
    {/if}

    <div class="ty-store-location">
        <div class="ty-float-left ty-store-location__map-wrapper" id="{$map_container}"></div>
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        <div class="ty-wysiwyg-content ty-store-location__locations-wrapper" id="stores_list_box">
            {foreach from=$store_locations item=loc key=num}
                <div class="ty-store-location__item" id="loc_{$loc.store_location_id}"  data-location="{$loc.name}">
                    <h3 class="ty-store-location__item-title">{$loc.name}</h3>
                    
                    <span class="ty-store-location__item-desc">{$loc.description nofilter}</span>

                    {if $loc.city || $loc.country_title}
                        <span class="ty-store-location__item-country">{if $loc.city}{$loc.city}, {/if}{$loc.country_title}</span>
                    {/if}
                    
                    <div class="ty-store-location__item-view">
                        {include file="buttons/button.tpl" but_role="text" but_meta="cm-map-view-location ty-btn__tertiary" but_text=__("view_on_map") but_extra="data-ca-latitude={$loc.latitude} data-ca-longitude={$loc.longitude}"}
                    </div>
                </div>
                {if $store_locations|count > 1}
           
                {/if}
            {/foreach}

           
        </div>
    </div>



   {*Custom Accordian - Steven Jackson*}
<div class="content white">
    <div class="accordion-container">
        <a class="accordion-toggle">Wynberg<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="wynberg">

        </div>
        <!--/.accordion-content-->
    </div>

     <div class="accordion-container">
        <a  class="accordion-toggle">Boksburg<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="boksburg">

        </div>
        
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Cresta<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="cresta">
        </div>
        
        <!--/.accordion-content-->
    </div>

     <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Rondebosch<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="rondebosch">
        </div>
        
        <!--/.accordion-content-->
    </div>

     <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Willowbridge<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="willowbridge">
        </div>
        
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">All Stores<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="windhoek">
            {if $store_locations|count > 1}
                <div class="store-location-item">
                    <h2>{__("all_stores")}</h2>
                    <div>{include file="buttons/button.tpl" but_role="text" but_meta="cm-map-view-locations" but_text=__("view_on_map")}</div>
                </div>
            {/if}
        </div>
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->

  
</div>
<!-- Accordian End -->


{else}
    <p class="ty-no-items">{__("no_data")}</p>
{/if}

{capture name="mainbox_title"}{__("store_locator")}{/capture}