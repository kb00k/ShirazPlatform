<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
    @foreach($editors as $editor)
    CKEDITOR.replace('{{$editor}}',{
        language: 'fa',
        filebrowserImageUploadUrl: '/browser/browse.php',
        contentsCss: "body {font-family: Vazir,Tahoma;}"
    });
    @endforeach
</script>