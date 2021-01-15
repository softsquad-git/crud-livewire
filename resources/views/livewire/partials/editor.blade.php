<div wire:ignore>
    <textarea id="description" wire:key="ckeditor-1">{{ $description }}</textarea>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.instances.description.on('change', function() {
        @this.set('description', this.getData());
        });
    </script>
</div>
