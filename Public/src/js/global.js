$(document).ready(function () {
    tinymce.init({
        selector : "textarea",
        theme: "modern",
        height: 200,
        width: "100%",
        plugins: [  "advlist autolink link image lists charmap print preview hr anchor pagebreak" +
        " searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking table contextmenu" +
        " contextmenu directionality emoticons paste textcolor responsivefilemanager code"],
        toolbar1: " formatselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist" +
        " numlist outdent indent |responsivefilemanager | link unlink anchor | image media | forcolor backcolor |" +
        "preview code | caption",
        menubar: false,
        image_caption: true,
        image_advtab: true,
        external_filemanager_path: "/Blog_de_JFR/Public/src/filemanager/",
        filemanager_title: "MyPHPnotes",
        external_plugins: { "filemanager":"/Blog_de_JFR/Public/src/filemanager/plugin.min.js" },
        visualblocks_default_state: true,
        style_formats_autohide: true,
        style_formats_merge: true
    })
})
