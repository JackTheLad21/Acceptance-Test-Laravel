var counter;

function galleryInit(gallery) {
    counter = gallery.length + 1;
    addNew();
}

function deleteMe(id) {
    var galleryImage = $("#addedGalleryContainer" + id);
    var galleryTitle = $("#addedGalleryContainerTitle" + id);

    var galleryModelId = galleryImage.attr("data-value");

    galleryImage.remove();
    galleryTitle.remove();

    if (galleryModelId) {
        var removed = $("#gallery_remove").val();
        var ids = $("#gallery_remove").val().split(",");
        if (!removed || isEmptyOrSpaces(removed)) {
            ids = [];
        }
        ids.push(galleryModelId);
        $("#gallery_remove").val(ids.join(","));
    }
}

function addNew() {
    var galleryDivInit = $("#galleryTemplateContainer")
        .clone()
        .attr("id", "addedGalleryContainer" + counter)
        .show();

    var galleryImageContainer = $("#galleryTemplateImageContainer")
        .clone()
        .attr("id", "galleryTemplateImageContainerCreated" + counter)
        .show();

    var galleryImage = $("#galleryTemplateImg")
        .clone()
        .attr("id", "image_galley_" + counter);

    var galleryLabel = $("#galleryTemplateLabel")
        .clone()
        .attr("id", "galleryTemplateLabel" + counter)
        .attr("for", "gallery_" + counter);

    /* var galleryDelete = $("#galleryTemplateLabelDelete")
        .clone()
        .attr("id", "galleryTemplateLabelDelete" + counter)
        .attr("onclick", "deleteMe(" + counter + ")"); */

    galleryImageContainer.append(galleryImage);

    var galleryInput = $("#galleryTemplateInput")
        .clone()
        .attr("id", "gallery_" + counter)
        .attr("name", "gallery[" + counter + "]")
        .attr("onchange", "return handleAddImage(" + counter + ");");

    galleryDivInit.append(galleryImageContainer).append(galleryInput);

    var galleryTitleInit = $("#galleryTemplateContainer")
        .clone()
        .attr("id", "addedGalleryContainerTitle" + counter)
        .attr("class", "col-10 ")
        .show();

    var galleryTitleLabel = $("#galleryTemplateTitleLabel")
        .clone()
        .attr("id", "galleryTemplateTitleLabel" + counter);

    var galleryTitleInput = $("#galleryTemplateTitleInput")
        .clone()
        .attr("id", "galleryTemplateTitleInput" + counter)
        .attr("name", "gallery_titles[" + counter + "]");

    galleryTitleInit
        .append(galleryTitleLabel)
        .append(galleryTitleInput)
        .append("<br>")
        /* .append(galleryDelete) */
        .append(galleryLabel);

    $("#galleryList").append(galleryDivInit).append(galleryTitleInit);
    counter += 1;
}

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#image_galley_" + id).attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

function handleAddImage(id) {
    var input = $("#gallery_" + id);
    if (input && input[0]) {
        readURL(input[0], id);
    }

    var galleryImageEditIcon = $("#galleryTemplateLabel" + id);
    galleryImageEditIcon.remove();

    var galleryTitleInput = $("#galleryTemplateTitleInput" + id);
    galleryTitleInput.prop("required", "true");

    var galleryTitleInit = $("#addedGalleryContainerTitle" + id);

    var galleryDelete = $("#galleryTemplateLabelDelete")
        .clone()
        .attr("id", "galleryTemplateLabelDelete" + id)
        .attr("onclick", "deleteMe(" + id + ")");

    galleryTitleInit.append(galleryDelete);

    addNew();
}

function isEmptyOrSpaces(str) {
    return str === null || str.match(/^ *$/) !== null;
}
