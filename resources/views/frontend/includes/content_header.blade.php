<div class="panel panel-default" id="header_background">
    <div class="panel-heading" id="header_background" style="font-size:20px;"> <strong> {{ $header_text or 'Search'  }} </strong> </div>
</div><!-- panel -->

<div class="content_menu" style="margin-top:-10px;font-size:16px;">

    <?php
        if(\Menu::get('ContentMenu')) {
            echo \Menu::get('ContentMenu')->asUl([ 'class' => 'list-inline' ]);
        }
    ?>
</div>