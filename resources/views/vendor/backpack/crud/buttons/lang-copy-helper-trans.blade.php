<button class="btn btn-sm btn-link" data-helper="{{ $entry->helper }}"
    id="copy-to-clipboard-{{ $entry->getKey() }}">
    <i class="lar la-copy"></i> {{ trans('translationsystem.copy_helper') }}
</button>

<script>
    (function() {
        let copyToClipboardButton = document.getElementById("copy-to-clipboard-{{ $entry->getKey() }}");
        copyToClipboardButton.addEventListener("click", function() {
            navigator.clipboard.writeText(this.getAttribute('data-helper'));
            new Noty({
                type: "success",
                text: "<strong>Helper copiado</strong><br>El helper se ha copiado a portapapeles correctamente."
            }).show();
        });
    })();
</script>
