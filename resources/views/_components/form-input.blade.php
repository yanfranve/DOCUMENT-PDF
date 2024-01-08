{{-- resources/views/_components/form-input.blade.php --}}
@props(['label', 'id', 'name', 'type' => 'text', 'required' => false])

<div class="form-group">
    <label for="{{ $id }}">{{ $label }}:</label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}" @if($required) required @endif>
</div>
