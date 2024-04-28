@props(['name'])

<textarea id="basic-example" name="{{ $name }}">
</textarea>
<script src="https://cdn.tiny.cloud/1/cj5w9rm866ciuyqrlqkbnh98ho8d9aslff26icv8sqtj1wn7/tinymce/7/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea#basic-example',
    height: 500,
    min_chars: 100,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
</script>