<!-- content.php -->
<!-- BEGIN row -->
<div class="material-result-flex-container">
	<div class="material-result-flex-col material-result-image" >

		${material_screenshot}
	</div>
    <div class="material-result-flex-col material-result-content">
        <a href="${material_review_url}">
              <h3>${material_title}</h3>
        </a>
        <div class="wp-block-latest-posts__post-author">von ${material_autoren}</div>
        <time datetime="2017-10-11T13:08:26+02:00" class="wp-block-latest-posts__post-date">${material_date}</time>
        <div class="wp-block-latest-posts__post-excerpt">
            <p>
                <strong>${material_kurzbeschreibung}</strong><br>
                ${material_beschreibung}
            </p>

            <a class="button" href="${material_url}" rel="noopener noreferrer" target="_blank">Material öffnen</a>
        </div>
    </div>
</div>
<!-- END row -->
