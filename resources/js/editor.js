import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
    .create( document.querySelector('#description') )
    .catch( error => {
        console.log(error);
    });
