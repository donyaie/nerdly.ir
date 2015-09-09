<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Title Here</title>
        <?php //echo $head ?><!-- Place inside the <head> of your HTML -->
        <script type="text/javascript" src="<?php echo base_url(); ?>themes/lib/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>themes/lib/js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>themes/lib/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea#elm1",
                theme: "modern",
                directionality: 'rtl',
                theme_advanced_toolbar_align: "right",
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker ",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor colorpicker bbcode image " 
                ],
                content_css: "css/content.css",
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        </script>

    </head>
    <body>
        <?php // echo $mce  ?>
        <form method="post">

            <textarea id="elm1" name="area"></textarea>
        </form>
    </body>
</html>  