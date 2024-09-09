@extends("layouts.main")



@section("content")

    <h2>Render Markdown Text</h2>

    <div class="row">
        <div class="col-6">
            <label class="col-form-label" for="input">Input:</label>
            <textarea
                class="form-control font-monospace"
                id="input"
                rows="15"
            ></textarea>
        </div>

        <div class="col-6">
            <div id="output" />
        </div>
    </div>



    <button class="btn btn-primary mt-4" onclick="convert()">convert</button>

    <script>



        function convert(){
            $('#output').html(DOMPurify.sanitize(marked.parse($('#input').val())));
        }
    </script>

@endsection



















