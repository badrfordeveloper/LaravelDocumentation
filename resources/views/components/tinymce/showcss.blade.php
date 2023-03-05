<link rel="stylesheet" type="text/css" href="{{ asset('js/tinymce/skins/content/dark/content.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('js/prism.css') }}">
<style>
    /* For other boilerplate styles, see: /docs/general-configuration-guide/boilerplate-content-css/ */
    /*
    * For rendering images inserted using the image plugin.
    * Includes image captions using the HTML5 figure element.
    */

    figure.image {
        display: inline-block;
        border: 1px solid gray;
        margin: 0 2px 0 1px;
        background: #f5f2f0;
    }

    figure.align-left {
        float: left;
    }

    figure.align-right {
        float: right;
    }

    figure.image img {
        margin: 8px 8px 0 8px;
    }

    figure.image figcaption {
        margin: 6px 8px 6px 8px;
        text-align: center;
    }


    /*
    Alignment using classes rather than inline styles
    check out the "formats" option
    */

    img.align-left {
        float: left;
    }

    img.align-right {
        float: right;
    }

    /* Basic styles for Table of Contents plugin (toc) */
    .mce-toc {
        border: 1px solid gray;
    }

    .mce-toc h2 {
        margin: 4px;
    }

    .mce-toc li {
        list-style-type: none;
    }
</style>
