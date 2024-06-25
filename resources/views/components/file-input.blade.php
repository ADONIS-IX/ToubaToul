@props(['label', 'name'])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="file" id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" accept=".pdf,.jpg,.jpeg,.png">
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
