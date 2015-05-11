<link href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>

{assign var="map_provider" value=$addons.store_locator.map_provider}
{assign var="map_provider_api" value="`$map_provider`_map_api"}
{assign var="map_customer_templates" value="C"|fn_get_store_locator_map_templates}
{assign var="map_container" value="map_canvas"}

{if $store_locations}
    {if $map_customer_templates && $map_customer_templates.$map_provider}
        {include file=$map_customer_templates.$map_provider}
    {/if}

    <div class="store-location">
        <div class="float-left store-location-wrapper" id="{$map_container}"></div>



        <div class="wysiwyg-content" id="stores_list_box">
            {foreach from=$store_locations item=loc key=num}
                <div class="store-location-item" id="loc_{$loc.store_location_id}" data-location="{$loc.city}">
                    <h2>{$loc.name}</h2>
                    {$loc.description nofilter}

                    {if $loc.city || $loc.country_title}{if $loc.city}{$loc.city}, {/if}{$loc.country_title}{/if}
                    <div>{include file="buttons/button.tpl" but_role="text" but_meta="cm-map-view-location" but_text=__("view_on_map") but_extra="data-ca-latitude={$loc.latitude} data-ca-longitude={$loc.longitude} "}</div>
                </div>
                {if $store_locations|count > 1}
                    <hr />
                {/if}
            {/foreach}

            {if $store_locations|count > 1}
                <div class="store-location-item">
                    <h2>{__("all_stores")}</h2>
                    <div>{include file="buttons/button.tpl" but_role="text" but_meta="cm-map-view-locations" but_text=__("view_on_map")}</div>
                </div>
            {/if}
        </div>
    </div>

    <!-- Custom Accordian -->
<div class="content white">
    <div class="accordion-container">
        <a class="accordion-toggle">Western Cape <span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="western-cape">

        </div>
        <!--/.accordion-content-->
    </div>

     <div class="accordion-container">
        <a  class="accordion-toggle">Gauteng<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="gauteng">

        </div>
        
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Gauteng PTA<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="gauteng-pta">
            <strong>PTA Location</strong>
        </div>
        
        <!--/.accordion-content-->
    </div>

     <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Gauteng JHB<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="gauteng-jhb">
        </div>
        
        <!--/.accordion-content-->
    </div>

     <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Gauteng South<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="gauteng-south">
        </div>
        
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Eastern Cape <span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="eastern-cape">
           Location
        </div>
        <!--/.accordion-content-->
    </div>
    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Mpumalanga<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
        <div class="accordion-content" id="mpumalanga">
             Location
        </div>
        <!--/.accordion-content-->
    </div>
    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Limpopo<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="limpopo">
            Location
        </div>
        <!--/.accordion-content-->
    </div>

<!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Northern Cape<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="northern-cape">
            Location
        </div>
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Free State<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="free-state">
            Location
        </div>
        <!--/.accordion-content-->
    </div>


    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">North West<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="north-west">
            Location
        </div>
        <!--/.accordion-content-->
    </div>

 <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">KZN<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="kzn">
            Location
        </div>
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
    <div class="accordion-container">
        <a  class="accordion-toggle">Windhoek<span class="toggle-icon"><i class="fa fa-plus-circle"></i></span></a>
       <div class="accordion-content" id="windhoek">
            Location
        </div>
        <!--/.accordion-content-->
    </div>

    <!--/.accordion-container-->
</div>
<!-- Accordian End -->

{else}
    <p class="no-items">{__("no_data")}</p>
{/if}

{capture name="mainbox_title"}{__("store_locator")}{/capture}