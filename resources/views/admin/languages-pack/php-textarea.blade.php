<div class="form-group">
    <label>PHP content file ('{{ $lang->name }}') <span id="total-translations-{{ $lang->abbr }}"></span></label>
    <textarea name="php_lang[{{  $lang->abbr }}]" id="{{ $lang->abbr }}" placeholder="{{ view('admin.languages-pack.php-textarea-placeholder') }}"
        class="form-control" rows="10" style="background-color: black;color: white;"></textarea>
</div>
<script>
    document.getElementById('{{ $lang->abbr }}').addEventListener('change', function() {
        //this.value
        let countTranslations = 0;
        let formatText = '';
        let lines = this.value.replace(/(^[ \t]*\n)/gm, "").split('\n');
        for (var j = 0; j < lines.length; j++) {
            formatText += lines[j].trim() + "\n";
            countTranslations++;
        }
        document.getElementById("total-translations-{{ $lang->abbr }}").innerHTML = "- Total texts found: " + (countTranslations - 1);
        this.value = formatText;
    });
</script>
