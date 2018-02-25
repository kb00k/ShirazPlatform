<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
    var csrf = '{{csrf_token()}}';
    @foreach($editors as $editor)
    CKEDITOR.replace('{{$editor}}',{
        language: 'fa',
        filebrowserImageUploadUrl: '{{route('image-upload',['_token' => csrf_token() ])}}',
        contentsCss: "body {font-family: Vazir,Tahoma;}",
    });
    @endforeach
</script>