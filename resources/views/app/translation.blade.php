@extends("layouts.main")



@section("content")

    <h2>Create Translation JSON from Migration File (laravel)</h2>

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
            <label class="col-form-label" for="output">Output:</label>
            <textarea
                class="form-control font-monospace"
                id="output"
                rows="15"
            ></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label for="libretranslate" class="col-form-label">Link to Libretranslate</label>
            <input type="text" class="form-control" id="libretranslate" value="http://localhost:5000/translate">
        </div>

    </div>

    <button class="btn btn-primary mt-4" onclick="convert()">convert</button>

    <script>

            let input = $('#input').val();

            let output = [];
            function convert(){
                console.log("convert");
                let input_split = input.split("\n");
                for(let i = 0; i < input_split.length; i++){
                    let line = input_split[i];
                    let match = line.match(/(\$table->\w+\(['"])([A-z]+)(['"])/);
                    translate(match[2]);
                   output[match[2]] = "";
                }

                $('#output').val(output);
            }

            async function translate(input){
                let libretranslate = $('#libretranslate').val();
                console.log("Translating: " + input);
                const res = await fetch(libretranslate, {
                    method: "POST",
                    body: JSON.stringify({
                        q: input,
                        source: "en",
                        target: "de",
                        format: "text",
                        alternatives: 3,
                        api_key: ""
                    }),
                    headers: { "Content-Type": "application/json" }
                });

                let result = await res.json();
                output[input] = result.translatedText;
                console.log(result.translatedText);
                update_output(result.translatedText);
            }

            function update_output(unused){
                let output_string = "";
                for( let key in output){
                    console.log(key + "->" + output[key])
                    output_string += "\"" + key + "\" : \"" + output[key] + "\",\n";
                }
                $('#output').val(output_string);
            }
    </script>

@endsection



















