
<!-- content.php -->
<!-- BEGIN row -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <article>
                <div class="allgemein">
                    <div class="entry row">
                        <div class="col-sm-3 col-xs-12 vpic">
                            ${material_screenshot}

                        </div>
                        <div class="col-sm-9 col-xs-12 info">
                            <div class="subtitle">${material_title}</div>
                            <p>${material_kurzbeschreibung}<br>
                                ${material_beschreibung}</p>
                            <!-- IF '${material_autoren}' != '' -->
                            <p>Artikel von ${material_autoren}</p>
                            <!-- END IF -->
                            <!-- IF '${material_medientyp}' != '' -->
                            <p>Medientyp: ${material_medientyp}</p>
                            <!-- END IF -->
                            <!-- IF '${material_schlagworte}' != '' -->
                            <p>Schlagworte: ${material_schlagworte}</p>
                            <!-- END IF -->
                            <p>
                            <a href='${material_url}'>Artikel lesen</a> · <a href='${material_review_url}'>Mehr dazu im rpi-virtuell Materialpool</a>
                            </p>

                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
<!-- END row -->
