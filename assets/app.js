import './bootstrap.js';
import 'bootstrap'
import 'summernote/dist/summernote-bs4.css';
import 'summernote/dist/summernote-bs4.min.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
$(document).ready(function() {
    // Initialiser Summernote sur l'élément textarea
    $('#article_discriptiondetaille').summernote({
        height: 300,  // hauteur de l'éditeur
        placeholder: 'Écrivez votre description ici...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
        ]
    });
    $('form').on('submit', function() {
        var summernoteContent = $('.summernote').summernote('code');
        $('textarea[name="article[discriptiondetaille]"]').val(summernoteContent);
    });

});